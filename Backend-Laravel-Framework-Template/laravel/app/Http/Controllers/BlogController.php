<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
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
            $fileName = 'blog_image_' . uniqid() . '.webp';
            // Xử lý ảnh với Intervention Image
            $manager = new ImageManager(new Driver());
            $binaryData = file_get_contents($file->getRealPath());
            $image = $manager->read($binaryData);

            // Resize ảnh để chiều rộng tối đa là 1920px
            $image->scale(width: 1920);

            // Encode ảnh sang định dạng webp với chất lượng 80%
            $encoded = $image->toWebp(70);

            // Lưu ảnh vào storage
            Storage::put('public/Blog/' . $fileName, $encoded);

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

    public function authorUploadImage(Request $request)
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
            $fileName = 'author_image_' . uniqid() . '.webp';
            // Xử lý ảnh với Intervention Image
            $manager = new ImageManager(new Driver());
            $binaryData = file_get_contents($file->getRealPath());
            $image = $manager->read($binaryData);

            // Resize ảnh để chiều rộng tối đa là 1920px
            $image->scale(width: 1920);

            // Encode ảnh sang định dạng webp với chất lượng 80%
            $encoded = $image->toWebp(70);

            // Lưu ảnh vào storage
            Storage::put('public/Blog/' . $fileName, $encoded);

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

    public function upload(Request $request)
    {
        try {
            if(!$request->hasFile('upload')) {
                return response()->json([
                    'error' => 'No file uploaded'
                ], 400);
            }

            $file = $request->file('upload');
            $fileName = 'blog_content_' . uniqid() . '.webp';

            // Optimize và lưu ảnh
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->scale(width: 1200);
            $encoded = $image->toWebp(80);

            Storage::put('public/BlogContent/' . $fileName, $encoded);

            return response()->json([
                'url' => asset('storage/BlogContent/' . $fileName),
                'success' => true
            ]);

        } catch (\Exception $e) {
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = $id;
        return view('admin.blog.edit', compact('id'));
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
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blog.index')->with('success','Blog is deleted successfuly.');
    }
}
