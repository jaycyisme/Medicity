<?php

namespace App\Http\Controllers;

use App\Models\TargetGroup;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class TargetGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.targetgroup.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.targetgroup.create');
    }

    public function uploadImage(Request $request) {
        try {
            // Kiểm tra file upload
            if (!$request->hasFile('upload')) {
                return response()->json([
                    'error' => 'No file uploaded'
                ], 400);
            }

            $file = $request->file('upload');

            // Tạo tên file duy nhất
            $fileName = 'targetgroup_image_' . uniqid() . '.webp';

            // Xử lý ảnh với Intervention Image
            $manager = new ImageManager(new Driver());
            $binaryData = file_get_contents($file->getRealPath());
            $image = $manager->read($binaryData);

            // Resize ảnh để chiều rộng tối đa là 1920px
            $image->scale(width: 1920);

            // Encode ảnh sang định dạng webp với chất lượng 80%
            $encoded = $image->toWebp(70);

            // Lưu ảnh vào storage
            Storage::put('public/TargetGroup/' . $fileName, $encoded);

            // Trả về URL của ảnh
            return response()->json([
                'url' => $fileName,
                'success' => true
            ]);
        } catch (\Exception $e) {
            // Trả về lỗi nếu có vấn đề trong quá trình xử lý
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:target_groups,name',
            'image' => 'nullable|image',
            'description' => 'nullable|string'
        ]);

        $targetgroup = new TargetGroup();
        $targetgroup->name = $request->name;
        $targetgroup->image_url = $request->image_url;
        $targetgroup->description = $request->description;

        $targetgroup->save();
        return redirect()->route('targetgroup.index')->with('success', 'Target Group is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $targetgroup = TargetGroup::findOrFail($id);
        return view('admin.targetgroup.show', compact('targetgroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $targetgroup = TargetGroup::findOrFail($id);
        return view('admin.targetgroup.edit', compact('targetgroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:target_groups,name,' . $id,
            'image' => 'nullable|image',
            'description' => 'nullable|string'
        ]);

        $targetgroup = TargetGroup::findOrFail($id);
        $targetgroup->name = $request->name;
        $targetgroup->image_url = $request->image_url;
        $targetgroup->description = $request->description;

        $targetgroup->save();
        return redirect()->route('targetgroup.index')->with('success', 'Target Group is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $targetgroup = TargetGroup::findOrFail($id);
        $targetgroup->delete();
        return redirect()->route('targetgroup.index')->with('success','Target Group is deleted');
    }
}
