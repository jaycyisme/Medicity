<?php

namespace App\Livewire\Doctor\Profile;

use App\Models\ConsultationType;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DoctorMembership;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class DoctorProfileSetting extends Component
{

    use WithFileUploads;

    public $name, $designation, $phone_number, $languages, $profile_image, $doctor_bio, $gender;
    public $memberships = [];
    public $newTitle, $newDescription;
    public $doctor;
    public $consultationTypes;
    public $selectedConsultationTypeId;

    public function mount()
    {
        $this->doctor = Auth::user();
        $this->name = $this->doctor->name;
        $this->designation = $this->doctor->designation ?? '';
        $this->phone_number = $this->doctor->phone_number ?? '';
        $this->languages = $this->doctor->languages ?? '';
        $this->doctor_bio = $this->doctor->doctor_bio ?? '';
        $this->gender = $this->doctor->gender ?? null;

        $this->memberships = $this->doctor->doctorMemberships()->get()->toArray();
        $this->selectedConsultationTypeId = $this->doctor->consultation_type_id ?? null;
        $this->consultationTypes = ConsultationType::all();
    }

    public function toggleConsultationType($consultationTypeId)
    {
        $doctor = Auth::user();

        if ($this->selectedConsultationTypeId === $consultationTypeId) {
            $doctor->update(['consultation_type_id' => null]);
            $this->selectedConsultationTypeId = null;
        } else {
            $doctor->update(['consultation_type_id' => $consultationTypeId]);
            $this->selectedConsultationTypeId = $consultationTypeId;
        }
    }

    public function toggleGender($gender)
    {
        $this->gender = $gender; // Directly update the component's property
        $this->doctor->update(['gender' => $gender]); // Save the change to the database
    }

    public function addMembership()
    {
        if (!empty($this->newTitle)) {
            $this->memberships[] = [
                'title' => $this->newTitle,
                'description' => $this->newDescription ?? '',
            ];
            $this->newTitle = '';
            $this->newDescription = '';
        }
    }

    public function removeMembership($index)
    {
        unset($this->memberships[$index]);
        $this->memberships = array_values($this->memberships);
    }

    public function saveProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:20',
            'languages' => 'nullable|string|max:255',
            'doctor_bio' => 'nullable',
            'profile_image' => 'nullable|image|max:4096',
        ]);

        if ($this->profile_image) {
            // Tạo tên file duy nhất
            $fileName = 'profile-photos/profile_photo_image_' . uniqid() . '.webp';

            // Xử lý ảnh với Intervention Image
            $manager = new ImageManager(new Driver());
            $binaryData = file_get_contents($this->profile_image->getRealPath());
            $image = $manager->read($binaryData);

            // Resize ảnh để chiều rộng tối đa là 1920px
            $image->scale(width: 1920);

            // Encode ảnh sang định dạng webp với chất lượng 80%
            $encoded = $image->toWebp(70);

            // Lưu ảnh vào storage
            Storage::put('public/' . $fileName, $encoded);
            $this->doctor->profile_photo_path = $fileName;
            $this->doctor->save();
        }

        $this->doctor->update([
            'name' => $this->name,
            'designation' => $this->designation,
            'phone_number' => $this->phone_number,
            'languages' => $this->languages,
            'doctor_bio' => $this->doctor_bio,
            'profile_photo_path' => $this->profile_image,
        ]);

        DoctorMembership::where('doctor_id', $this->doctor->id)->delete();

        // Nếu người dùng nhập dữ liệu vào newTitle và newDescription, tự động thêm vào danh sách memberships
        if (!empty($this->newTitle)) {
            $this->memberships[] = [
                'title' => $this->newTitle,
                'description' => $this->newDescription ?? '',
            ];
            $this->newTitle = '';
            $this->newDescription = '';
        }

        // Lưu memberships mới
        foreach ($this->memberships as $membership) {
            if (!empty($membership['title'])) {
                DoctorMembership::create([
                    'doctor_id' => $this->doctor->id,
                    'title' => $membership['title'],
                    'description' => $membership['description'] ?? '',
                ]);
            }
        }

        session()->flash('success', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.doctor.profile.doctor-profile-setting');
    }
}
