<?php

namespace App\Http\Controllers;

use App\Models\SeasonalDisease;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class SeasonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.seasonal.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.seasonal.create');
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
            $fileName = 'seasonal_image_' . uniqid() . '.webp';

            // Xử lý ảnh với Intervention Image
            $manager = new ImageManager(new Driver());
            $binaryData = file_get_contents($file->getRealPath());
            $image = $manager->read($binaryData);

            // Resize ảnh để chiều rộng tối đa là 1920px
            $image->scale(width: 1920);

            // Encode ảnh sang định dạng webp với chất lượng 80%
            $encoded = $image->toWebp(70);

            // Lưu ảnh vào storage
            Storage::put('public/Seasonal/' . $fileName, $encoded);

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
            'description' => 'nullable|string',
            'start_at' => 'required|string',
            'end_at' => 'required|string',
        ]);

        $seasonal = new SeasonalDisease();
        $seasonal->name = $request->name;
        $seasonal->image_url = $request->image_url;
        $seasonal->description = $request->description;
        $seasonal->start_at = $request->start_at;
        $seasonal->end_at = $request->end_at;

        $seasonal->save();
        return redirect()->route('seasonal.index')->with('success', 'Seasonal Disease is created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seasonal = SeasonalDisease::findOrFail($id);
        return view('admin.seasonal.show', compact('seasonal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $seasonal = SeasonalDisease::findOrFail($id);
        return view('admin.seasonal.edit', compact('seasonal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:target_groups,name,' . $id,
            'image' => 'nullable|image',
            'description' => 'nullable|string',
            'start_at' => 'required|string',
            'end_at' => 'required|string',
        ]);

        $seasonal = SeasonalDisease::findOrFail($id);
        $seasonal->name = $request->name;
        $seasonal->image_url = $request->image_url;
        $seasonal->description = $request->description;
        $seasonal->start_at = $request->start_at;
        $seasonal->end_at = $request->end_at;

        $seasonal->save();
        return redirect()->route('seasonal.index')->with('success', 'Seasonal Disease is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seasonal = SeasonalDisease::findOrFail($id);
        $seasonal->delete();
        return redirect()->route('seasonal.index')->with('success','Seasonal Disease is deleted');
    }
}
