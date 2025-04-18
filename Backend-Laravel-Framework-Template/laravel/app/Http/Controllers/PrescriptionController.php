<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.prescription.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            $fileName = 'prescription_image_' . uniqid() . '.webp';

            // Xử lý ảnh với Intervention Image
            $manager = new ImageManager(new Driver());
            $binaryData = file_get_contents($file->getRealPath());
            $image = $manager->read($binaryData);

            // Resize ảnh để chiều rộng tối đa là 1920px
            $image->scale(width: 1920);

            // Encode ảnh sang định dạng webp với chất lượng 80%
            $encoded = $image->toWebp(70);

            // Lưu ảnh vào storage
            Storage::put('public/Prescription/' . $fileName, $encoded);

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
            'image' => 'image',
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $prescription = new Prescription();
        $prescription->image_url = $request->image_url;
        $prescription->customer_name = $request->customer_name;
        $prescription->phone = $request->phone;
        $prescription->note = $request->note;

        $prescription->save();
        return redirect()->route('index')->with('success', 'Prescription is sent to pharmacist successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('admin.prescription.show', compact('prescription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('admin.prescription.edit', compact('prescription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image',
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $prescription = Prescription::findOrFail($id);
        $prescription->image_url = $request->image_url;
        $prescription->customer_name = $request->customer_name;
        $prescription->phone = $request->phone;
        $prescription->note = $request->note;

        $prescription->save();
        return redirect()->route('prescription.index')->with('success', 'Prescription is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->delete();
        return redirect()->route('prescription.index')->with('success','Prescription is deleted');
    }
}
