<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class BookingController extends Controller
{
    public function doctorBooking($id)
    {
        $id = $id;

        return view('medicity.doctor.doctor-booking', compact(
            'id',
        ));
    }

    public function appointmentDateTime($id)
    {
        $id = $id;

        return view('medicity.doctor.booking-datetime', compact('id'));
    }

    public function appointmentInfo($id)
    {
        $id = $id;

        return view('medicity.doctor.booking-information', compact('id'));
    }

    public function appointmentCheckout($id)
    {
        $id = $id;

        return view('medicity.doctor.booking-checkout', compact('id'));
    }

    public function appointmentConfirmation($id)
    {
        $id = $id;

        return view('medicity.doctor.booking-confirmation', compact('id'));
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
                $fileName = 'appointment_image_' . uniqid() . '.webp';

                // Xử lý ảnh với Intervention Image
                $manager = new ImageManager(new Driver());
                $binaryData = file_get_contents($file->getRealPath());
                $image = $manager->read($binaryData);

                // Resize ảnh để chiều rộng tối đa là 1920px
                $image->scale(width: 1920);

                // Encode ảnh sang định dạng webp với chất lượng 80%
                $encoded = $image->toWebp(70);

                // Lưu ảnh vào storage
                Storage::put('public/Appointment/' . $fileName, $encoded);

                // Lưu đường dẫn ảnh
                $uploadedUrls[] = [
                    'name' => $file->getClientOriginalName(),
                    'image_url' => $fileName,
                    'url' => Storage::url('public/Appointment/' . $fileName),
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
}
