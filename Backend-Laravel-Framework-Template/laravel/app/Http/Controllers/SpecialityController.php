<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.speciality.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.speciality.create');
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
            $fileName = 'speciality_image_' . uniqid() . '.webp';

            // Xử lý ảnh với Intervention Image
            $manager = new ImageManager(new Driver());
            $binaryData = file_get_contents($file->getRealPath());
            $image = $manager->read($binaryData);

            // Resize ảnh để chiều rộng tối đa là 1920px
            $image->scale(width: 1920);

            // Encode ảnh sang định dạng webp với chất lượng 80%
            $encoded = $image->toWebp(70);

            // Lưu ảnh vào storage
            Storage::put('public/Speciality/' . $fileName, $encoded);

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
            'name' => 'required|string|max:255|unique:categories,name',
            'image_url' => 'nullable|string',
            'sub_image_url' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        $speciality = new Speciality();
        $speciality->name = $request->name;
        $speciality->image_url = $request->image_url;
        $speciality->sub_image_url = $request->sub_image_url;
        $speciality->description = $request->description;

        $speciality->save();
        return redirect()->route('speciality.index')->with('success', 'Speciality is created successfuly.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $speciality = Speciality::findOrFail($id);
        return view('admin.speciality.show', compact('speciality'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $speciality = Speciality::findOrFail($id);
        return view('admin.speciality.edit', compact('speciality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'image_url' => 'nullable|string',
            'sub_image_url' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        $speciality = Speciality::findOrFail($id);
        $speciality->name = $request->name;
        $speciality->image_url = $request->image_url;
        $speciality->sub_image_url = $request->sub_image_url;
        $speciality->description = $request->description;

        $speciality->save();
        return redirect()->route('speciality.index')->with('success', 'Speciality is updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $speciality = Speciality::findOrFail($id);
        $speciality->delete();
        return redirect()->route('speciality.index')->with('success','Speciality is deleted successfuly.');
    }
}
