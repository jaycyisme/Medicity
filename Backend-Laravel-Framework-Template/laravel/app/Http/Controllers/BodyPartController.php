<?php

namespace App\Http\Controllers;

use App\Models\BodyPart;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class BodyPartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.bodypart.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bodypart.create');
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
            $fileName = 'bodypart_image_' . uniqid() . '.webp';

            // Xử lý ảnh với Intervention Image
            $manager = new ImageManager(new Driver());
            $binaryData = file_get_contents($file->getRealPath());
            $image = $manager->read($binaryData);

            // Resize ảnh để chiều rộng tối đa là 1920px
            $image->scale(width: 1920);

            // Encode ảnh sang định dạng webp với chất lượng 80%
            $encoded = $image->toWebp(70);

            // Lưu ảnh vào storage
            Storage::put('public/BodyPart/' . $fileName, $encoded);

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
            'name' => 'required|string|max:255|unique:body_parts,name',
            'image' => 'nullable|image',
            'description' => 'nullable|string'
        ]);

        $bodypart = new BodyPart();
        $bodypart->name = $request->name;
        $bodypart->image_url = $request->image_url;
        $bodypart->description = $request->description;

        $bodypart->save();
        return redirect()->route('bodypart.index')->with('success', 'Body Part is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bodypart = BodyPart::findOrFail($id);
        return view('admin.bodypart.show', compact('bodypart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bodypart = BodyPart::findOrFail($id);
        return view('admin.bodypart.edit', compact('bodypart'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:body_parts,name,' . $id,
            'image' => 'nullable|image',
            'description' => 'nullable|string'
        ]);

        $bodypart = BodyPart::findOrFail($id);
        $bodypart->name = $request->name;
        $bodypart->image_url = $request->image_url;
        $bodypart->description = $request->description;

        $bodypart->save();
        return redirect()->route('bodypart.index')->with('success', 'Body Part is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bodypart = BodyPart::findOrFail($id);
        $bodypart->delete();
        return redirect()->route('bodypart.index')->with('success','Body Part is deleted');
    }
}
