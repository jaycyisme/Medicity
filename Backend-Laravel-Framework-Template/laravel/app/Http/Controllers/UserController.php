<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Clinic;
use App\Models\ConsultationType;
use App\Models\Disease;
use App\Models\Service;
use App\Models\Speciality;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function doctorList(Request $request) {
        $doctors = User::role('Doctor')->with([
            'doctorExperiences',
            'doctorFeedbacks',
            'doctorServices.service',
            'consultationType',
            'doctorSpecialities.speciality',
            'doctorClinics.clinic'
        ]);

        if ($request->filled('gender')) {
            $doctors->where('gender', $request->gender);
        }

        if ($request->filled('experience')) {
            $doctors->whereHas('doctorExperiences', function ($query) use ($request) {
                $query->havingRaw('SUM(year_of_experience) >= ?', [$request->experience]);
            });
        }

        if ($request->filled('consultation_type')) {
            $doctors->whereHas('consultationType', function ($query) use ($request) {
                $query->where('name', $request->consultation_type);
            });
        }

        if ($request->filled('speciality')) {
            $doctors->whereHas('doctorSpecialities.speciality', function ($query) use ($request) {
                $query->where('id', $request->speciality);
            });
        }

        if ($request->filled('clinic')) {
            $doctors->whereHas('doctorClinics.clinic', function ($query) use ($request) {
                $query->where('id', $request->clinic);
            });
        }

        if ($request->filled('service')) {
            $doctors->whereHas('doctorServices.service', function ($query) use ($request) {
                $query->where('id', $request->service);
            });
        }

        if ($request->filled('star')) {
            $doctors->whereHas('doctorFeedbacks', function ($query) use ($request) {
                $query->havingRaw('AVG(star) >= ?', [$request->star]);
            });
        }

        $doctors = $doctors->get();

        $specialities = Speciality::all();
        $clinics = Clinic::all();
        $consultationTypes = ConsultationType::all();
        $services = Service::all();

        $maleDoctorCount = User::role('Doctor')->where('gender', 'Male')->count();
        $femaleDoctorCount = User::role('Doctor')->where('gender', 'Female')->count();

        return view('medicity.doctor.doctor-list', compact(
            'doctors',
            'specialities',
            'clinics',
            'consultationTypes',
            'maleDoctorCount',
            'femaleDoctorCount',
            'services'
        ));
    }

    public function doctorProfile($id)
    {
        $doctor = User::with([
            'doctorClinics.clinic',
            'doctorFeedbacks',
            'appointments',
            'doctorExperiences',
            'doctorAwards',
            'doctorInsurances',
            'doctorSpecialities',
            'doctorServices',
            'doctorMemberships'
        ])->findOrFail($id);
        $currentDay = now()->format('l');
        $currentTime = now()->format('H:i');

        $businessHours = json_decode($doctor->business_hours, true);

        $isAvailableToday = isset($businessHours[$currentDay]) &&
                            $businessHours[$currentDay]['start'] &&
                            $businessHours[$currentDay]['end'] &&
                            ($currentTime >= $businessHours[$currentDay]['start'] && $currentTime <= $businessHours[$currentDay]['end']);

        $averageStars = $doctor->doctorFeedbacks->avg('star') ?? 0;
        $reviewCount = $doctor->doctorFeedbacks->count();

        $appointmentCount = $doctor->appointments->where('doctor_id', $id)->count();

        $totalExperience = $doctor->doctorExperiences->sum('year_of_experience');

        $awardCount = $doctor->doctorAwards->count();

        return view('medicity.doctor.doctor-profile', compact(
            'doctor',
            'isAvailableToday',
            'averageStars',
            'reviewCount',
            'appointmentCount',
            'totalExperience',
            'awardCount'
        ));
    }



    public function clinicList() {
        return view('medicity.clinic.clinic-list');
    }

    public function clinicDetail($id) {
        $clinic = Clinic::with(['clinicImages', 'pharmacyAward', 'services', 'pharmacyReviews' => function($query) {
            $query->where('is_active', true)->latest();
        }])->findOrFail($id);

        $averageStars = $clinic->pharmacyReviews->avg('star') ?? 0;
        $reviewCount = $clinic->pharmacyReviews->count();

        return view('medicity.clinic.clinic-detail', compact('clinic', 'averageStars', 'reviewCount'));
    }

    public function serviceList() {
        return view('medicity.service.service-list');
    }

    public function serviceDetail($id) {
        $service = Service::with(['serviceImages', 'clinic.clinicImages', 'clinic.pharmacyReviews'])->findOrFail($id);

        $averageStars = $service->serviceFeedbacks->avg('star') ?? 0;
        $reviewCount = $service->serviceFeedbacks->count();

        $averageStarsClinic = $service->clinic->pharmacyReviews->avg('star') ?? 0;
        $reviewCountClinic = $service->clinic->pharmacyReviews->count();

        return view('medicity.service.service-detail', compact('service', 'averageStars', 'reviewCount', 'averageStarsClinic', 'reviewCountClinic'));
    }

    public function doctorListByService($service_id, Request $request) {
        // Lấy danh sách bác sĩ có cung cấp dịch vụ này
        $doctors = User::role('Doctor')->whereHas('doctorServices', function ($query) use ($service_id) {
            $query->where('service_id', $service_id);
        })->with([
            'doctorExperiences',
            'doctorFeedbacks',
            'doctorServices.service',
            'consultationType',
            'doctorSpecialities.speciality',
            'doctorClinics.clinic'
        ]);

        // Lọc theo giới tính
        if ($request->filled('gender')) {
            $doctors->where('gender', $request->gender);
        }

        // Lọc theo số năm kinh nghiệm
        if ($request->filled('experience')) {
            $doctors->whereHas('doctorExperiences', function ($query) use ($request) {
                $query->havingRaw('SUM(year_of_experience) >= ?', [$request->experience]);
            });
        }

        // Lọc theo loại tư vấn
        if ($request->filled('consultation_type')) {
            $doctors->whereHas('consultationType', function ($query) use ($request) {
                $query->where('name', $request->consultation_type);
            });
        }

        // Lọc theo chuyên khoa (Speciality)
        if ($request->filled('speciality')) {
            $doctors->whereHas('doctorSpecialities.speciality', function ($query) use ($request) {
                $query->where('id', $request->speciality);
            });
        }

        // Lọc theo phòng khám (Clinic)
        if ($request->filled('clinic')) {
            $doctors->whereHas('doctorClinics.clinic', function ($query) use ($request) {
                $query->where('id', $request->clinic);
            });
        }

        // Lọc theo dịch vụ (Service)
        if ($request->filled('service')) {
            $doctors->whereHas('doctorServices.service', function ($query) use ($request) {
                $query->where('id', $request->service);
            });
        }

        // Lọc theo đánh giá sao
        if ($request->filled('star')) {
            $doctors->whereHas('doctorFeedbacks', function ($query) use ($request) {
                $query->havingRaw('AVG(star) >= ?', [$request->star]);
            });
        }

        $doctors = $doctors->get();

        // Dữ liệu bộ lọc
        $specialities = Speciality::all();
        $clinics = Clinic::all();
        $consultationTypes = ConsultationType::all();
        $services = Service::all();

        $maleDoctorCount = User::role('Doctor')->where('gender', 'Male')->count();
        $femaleDoctorCount = User::role('Doctor')->where('gender', 'Female')->count();

        return view('medicity.doctor.doctor-list-by-service', compact(
            'doctors',
            'specialities',
            'clinics',
            'consultationTypes',
            'maleDoctorCount',
            'femaleDoctorCount',
            'services',
            'service_id'
        ));
    }

    public function pharmacyList() {
        $products = Product::all();
        $categories = Category::all();
        $specialities = Speciality::all();
        $brands = Brand::all();
        return view('medicity.pharmacy.pharmacy-list', compact('products', 'categories', 'specialities', 'brands'));
    }

    public function productDetail($name, $id) {
        $id = $id;
        $name = $name;
        return view('medicity.pharmacy.product-detail', compact('id', 'name'));
    }

    public function cart() {
        return view('medicity.cart.cart');
    }

    public function checkout() {
        return view('medicity.checkout.checkout');
    }

    public function diseaseList() {
        return view('medicity.disease.disease-list');
    }

    public function diseaseDetail($id) {
        $disease = Disease::findOrFail($id);
        $specialityId = $disease->speciality_id;
        $doctors = User::role('Doctor')
                        ->whereHas('doctorSpecialities.speciality', function($query) use ($specialityId) {
                            $query->where('id', $specialityId);
                        })
                        ->get();
        return view('medicity.disease.disease-detail', compact('disease', 'doctors'));
    }

    public function diseaseByOption() {
        return view('medicity.disease.disease-by-option');
    }

    public function weightLossCalculator() {
        return view('medicity.calculator.weight-loss-calculator');
    }

    public function calculatorResult() {
        return view('medicity.calculator.calculator-result');
    }

    public function prescription() {
        return view('medicity.prescription.index');
    }

    public function blog() {
        return view('medicity.blog.index');
    }

    public function blogDetail($id) {
        $blog = Blog::findOrFail($id);
        return view('medicity.blog.detail', compact('blog'));
    }
}
