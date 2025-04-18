<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class ProductController extends Controller
{
    use WithFileUploads;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    public function uploadImage(Request $request)
    {
        try {
            //Kiểm tra file upload
            if(!$request->hasFile('upload')) {
                return response()->json([
                    'error' => 'No file uploaded'
                ], 400);
            }

            $file = $request->file('upload');

            // Tạo tên file duy nhất
            $fileName = 'product_image_' . uniqid() . '.webp';
            // Xử lý ảnh với Intervention Image
            $manager = new ImageManager(new Driver());
            $binaryData = file_get_contents($file->getRealPath());
            $image = $manager->read($binaryData);

            // Resize ảnh để chiều rộng tối đa là 1920px
            $image->scale(width: 1920);

            // Encode ảnh sang định dạng webp với chất lượng 80%
            $encoded = $image->toWebp(70);

            // Lưu ảnh vào storage
            Storage::put('public/Product/' . $fileName, $encoded);

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

    public function uploadImagesByUppy(Request $request)
    {
        try {
            if (!$request->hasFile('images')) {
                return response()->json(['error' => 'No files uploaded'], 400);
            }

            $uploadedFiles = $request->file('images');
            $uploadedUrls = [];

            foreach ($uploadedFiles as $file) {
                // Tạo tên file duy nhất
                $fileName = 'product_image_' . uniqid() . '.webp';

                // Xử lý ảnh với Intervention Image
                $manager = new ImageManager(new Driver());
                $binaryData = file_get_contents($file->getRealPath());
                $image = $manager->read($binaryData);

                // Resize ảnh để chiều rộng tối đa là 1920px
                $image->scale(width: 1920);

                // Encode ảnh sang định dạng webp với chất lượng 80%
                $encoded = $image->toWebp(70);

                // Lưu ảnh vào storage
                Storage::put('public/Product/' . $fileName, $encoded);

                // Lưu đường dẫn ảnh
                $uploadedUrls[] = [
                    'name' => $file->getClientOriginalName(),
                    'image_url' => $fileName,
                    'url' => Storage::url('public/Product/' . $fileName),
                ];
            }

            return response()->json([
                'success' => true,
                'files' => $uploadedUrls,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function removeImage(Request $request) {
        $imagePath = 'public/Product/' . $request->image_url;

        if(Storage::exists($imagePath)) {
            $product_image = ProductImage::where('image_url', $request->image_url)->first();
            if ($product_image) {
                $product_image->delete();
            }

            Storage::delete($imagePath);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'error' => 'Ảnh không tồn tại trong storage.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['category', 'variants', 'images'])->findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = $id;
        return view('admin.product.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success','Product is deleted successfully');
    }
}
