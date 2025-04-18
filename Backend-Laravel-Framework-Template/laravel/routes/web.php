<?php

use Laravel\Fortify\Features;
use Laravel\Fortify\RoutePath;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PageController;
// -- Fortify
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BodyPartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SeasonalController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\LaboratoryTestController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\TargetGroupController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
// -- Jetstream
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\TwoFactorSecretKeyController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
// -- Của mình
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Jetstream\Http\Controllers\Livewire\PrivacyPolicyController;
use Laravel\Jetstream\Http\Controllers\Livewire\TermsOfServiceController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmedTwoFactorAuthenticationController;

//User
Route::get('/', [PageController::class, 'home'])->name('index');
// Route::get('/index.html', function () {
//     return view('medicity.index');
// })->name('index');
Route::get('/pharmacy-index.html', function () {
    return view('medicity.pharmacy-index');
})->name('pharmacy-index');
Route::get('/disease-index.html', function () {
    return view('medicity.disease-index');
})->name('disease-index');
Route::get('/service-index.html', function () {
    return view('medicity.service-index');
})->name('service-index');
Route::get('/doctor-list.html', [UserController::class, 'doctorList'])->name('doctor-list');
Route::get('/doctor-profile-{doctor}.html', [UserController::class, 'doctorProfile'])->name('doctor-profile');
Route::get('/clinic-list.html', [UserController::class, 'clinicList'])->name('medicity.clinic.list');
Route::get('/clinic-{clinic}.html', [UserController::class, 'clinicDetail'])->name('medicity.clinic.detail');
Route::get('/service-list.html', [UserController::class, 'serviceList'])->name('service-list');
Route::get('/service-{service}.html', [UserController::class, 'serviceDetail'])->name('service-detail');
Route::get('/pharmacy-list.html', [UserController::class, 'pharmacyList'])->name('pharmacy-list');
Route::get('/{name}/{id}.html', [UserController::class, 'productDetail'])
    ->where('id', '[0-9]+')
    ->name('product-detail');

Route::get('/cart.html', [UserController::class, 'cart'])->name('cart');
Route::get('/checkout.html', [UserController::class, 'checkout'])->name('checkout');
Route::get('/disease-list.html', [UserController::class, 'diseaseList'])->name('disease-list');
Route::get('/disease-detail-{disease}.html', [UserController::class, 'diseaseDetail'])->name('disease-detail');
Route::get('/disease-by-option.html', [UserController::class, 'diseaseByOption'])->name('disease-by-option');
Route::get('/weight-loss-calculator.html', [UserController::class, 'weightLossCalculator'])->name('weight-loss-calculator');
Route::post('/weight-loss-calculator.html', [CalculatorController::class, 'calculateNutritionProfile'])->name('macro.calculate');
Route::get('/calculator-result.html', [UserController::class, 'calculatorResult'])->name('calculator-result');
Route::get('/prescription.html', [UserController::class, 'prescription'])->name('prescription');
Route::post('/prescription/create.html', [PrescriptionController::class, 'store'])->name('prescription.create');
Route::post('/quan-tri-he-thong/don-thuoc/tai-len-hinh-anh', [PrescriptionController::class, 'uploadImage'])->name('prescription.upload.image');
Route::get('/blog.html', [UserController::class, 'blog'])->name('blog');
Route::get('/blog-{blog}.html', [UserController::class, 'blogDetail'])->name('blog-detail');

Route::get('/doctors-by-service/{service_id}', [UserController::class, 'doctorListByService'])->name('doctors.by.service');


// -- Jetstream
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/admin/fetch-messages', [ChatController::class, 'fetchMessages'])->name('fetchMessages');
    Route::post('/admin/send-message', [ChatController::class, 'sendMessage'])->name('sendMessage');

    Route::get('/doctor/chats', [ChatController::class, 'doctorChats'])->name('doctor.chats');
    Route::get('/user/chats', [ChatController::class, 'userChats'])->name('user.chats');
    Route::get('/chat/with-doctor/{doctorId}', [ChatController::class, 'chatWithDoctor'])->name('chat.withDoctor');
    Route::get('/chat/with-user/{userId}', [ChatController::class, 'chatWithUser'])->name('chat.withUser');


    Route::get('/doctor-booking-{doctor}.html', [BookingController::class, 'doctorBooking'])->name('doctor-booking');
    Route::get('/appointment/{id}/date-time', [BookingController::class, 'appointmentDateTime'])->name('appointment-date-time');
    Route::get('/appointment/{id}/information', [BookingController::class, 'appointmentInfo'])->name('appointment-info');
    Route::get('/appointment/{id}/checkout', [BookingController::class, 'appointmentCheckout'])->name('appointment-checkout');
    Route::get('/appointment/{id}/confirmation', [BookingController::class, 'appointmentConfirmation'])->name('appointment-confirmation');
    Route::post('/upload-appointment-image-by-uppy', [BookingController::class, 'uploadImagesByUppy'])->name('appointment.upload.image.uppy');

    Route::group(['middleware' => ['can:dashboard-access']], function () {
        Route::get('/system-management/control-panel.html', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    // Quyền
    Route::group(['middleware' => ['can:permission-list']], function () {
        Route::get('/system-management/permission.html', [PermissionsController::class, 'index'])->name('permissions.index');
    });
    Route::group(['middleware' => ['can:permission-create']], function () {
        Route::get('/system-management/permission/create.html', [PermissionsController::class, 'create'])->name('permissions.create');
        Route::post('/system-management/permission/create.html', [PermissionsController::class, 'store']);
    });
    Route::group(['middleware' => ['can:permission-edit']], function () {
        Route::get('/system-management/permission/edit-{permission}.html', [PermissionsController::class, 'edit'])->name('permissions.edit');
        Route::post('/system-management/permission/edit-{permission}.html', [PermissionsController::class, 'update']);
    });
    Route::group(['middleware' => ['can:permission-delete']], function () {
        Route::post('/system-management/permission/delete-{permission}.html', [PermissionsController::class, 'destroy'])->name('permissions.destroy');
    });

    // Vai trò
    Route::group(['middleware' => ['can:role-list']], function () {
        Route::get('/system-management/role.html', [RolesController::class, 'index'])->name('roles.index');
        Route::get('/system-management/role/show-{role}.html', [RolesController::class, 'show'])->name('roles.show');
    });
    Route::group(['middleware' => ['can:role-create']], function () {
        Route::get('/system-management/role/create.html', [RolesController::class, 'create'])->name('roles.create');
        Route::post('/system-management/role/create.html', [RolesController::class, 'store']);
    });
    Route::group(['middleware' => ['can:role-edit']], function () {
        Route::get('/system-management/role/edit-{role}.html', [RolesController::class, 'edit'])->name('roles.edit');
        Route::post('/system-management/role/edit-{role}.html', [RolesController::class, 'update']);
    });
    Route::group(['middleware' => ['can:role-delete']], function () {
        Route::post('/system-management/role/delete-{role}.html', [RolesController::class, 'destroy'])->name('roles.destroy');
    });

    //Tài khoản
    Route::group(['middleware' => ['can:users-list']], function () {
        Route::get('/system-management/nguoi-dung.html', [UsersController::class, 'index'])->name('users.index');
        Route::get('/system-management/nguoi-dung/xem-{user}.html', [UsersController::class, 'show'])->name('users.show');
    });
    Route::group(['middleware' => ['can:users-edit']], function () {
        Route::get('/system-management/nguoi-dung/edit-{user}.html', [UsersController::class, 'edit'])->name('users.edit');
        Route::post('/system-management/nguoi-dung/edit-{user}.html', [UsersController::class, 'update']);
    });
    Route::group(['middleware' => ['can:users-delete']], function () {
        Route::post('/system-management/nguoi-dung/delete-{user}.html', [UsersController::class, 'destroy'])->name('users.destroy');
    });


    // Chuyên khoa
    Route::get('/system-management/speciality.html', [SpecialityController::class, 'index'])->name('speciality.index');
    Route::get('/system-management/speciality/xem-{speciality}.html', [SpecialityController::class, 'show'])->name('speciality.show');

    Route::get('/system-management/speciality/create.html', [SpecialityController::class, 'create'])->name('speciality.create');
    Route::post('/system-management/speciality/create.html', [SpecialityController::class, 'store']);

    Route::get('/system-management/speciality/edit-{speciality}.html', [SpecialityController::class, 'edit'])->name('speciality.edit');
    Route::post('/system-management/speciality/edit-{speciality}.html', [SpecialityController::class, 'update']);

    Route::post('/system-management/speciality/delete-{speciality}.html', [SpecialityController::class, 'destroy'])->name('speciality.destroy');

    Route::post('/system-management/speciality/upload-image', [SpecialityController::class, 'uploadImage'])->name('speciality.upload.image');

    // Clinic
    Route::get('/system-management/clinic.html', [ClinicController::class, 'index'])->name('clinic.index');
    Route::get('/system-management/clinic/show-{clinic}.html', [ClinicController::class, 'show'])->name('clinic.show');

    Route::get('/system-management/clinic/create.html', [ClinicController::class, 'create'])->name('clinic.create');
    Route::post('/system-management/clinic/tacreateo.html', [ClinicController::class, 'store']);

    Route::get('/system-management/clinic/update-{clinic}.html', [ClinicController::class, 'edit'])->name('clinic.edit');
    Route::post('/system-management/clinic/update-{clinic}.html', [ClinicController::class, 'update']);

    Route::post('/system-management/clinic/delete-{clinic}.html', [ClinicController::class, 'destroy'])->name('clinic.destroy');


    Route::post('/system-management/clinic/upload-image-by-uppy', [ClinicController::class, 'uploadImagesByUppy'])->name('clinic.upload.image.uppy');
    Route::post('/system-management/clinic/upload-image', [ClinicController::class, 'uploadImage'])->name('clinic.upload.image');
    Route::post('/system-management/clinic/remove-image', [ClinicController::class, 'removeImage'])->name('clinic.remove.image');

    // Service
    Route::get('/system-management/service.html', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/system-management/service/xem-{service}.html', [ServiceController::class, 'show'])->name('service.show');

    Route::get('/system-management/service/tao.html', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/system-management/service/tao.html', [ServiceController::class, 'store']);

    Route::get('/system-management/service/update-{service}.html', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('/system-management/service/update-{service}.html', [ServiceController::class, 'update']);

    Route::post('/system-management/service/delete-{service}.html', [ServiceController::class, 'destroy'])->name('service.destroy');


    Route::post('/system-management/service/upload-image-by-uppy', [ServiceController::class, 'uploadImagesByUppy'])->name('service.upload.image.uppy');
    Route::post('/system-management/service/upload-image', [ServiceController::class, 'uploadImage'])->name('service.upload.image');
    Route::post('/system-management/service/remove-image', [ServiceController::class, 'removeImage'])->name('service.remove.image');
    Route::post('/upload-service-content-image', [ServiceController::class, 'upload'])->name('upload.service.content.image');

    // Appointment
    Route::get('/system-management/appointment.html', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/system-management/appointment/xem-{appointment}.html', [AppointmentController::class, 'show'])->name('appointment.show');

    Route::get('/system-management/appointment/tao.html', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('/system-management/appointment/tao.html', [AppointmentController::class, 'store']);

    Route::get('/system-management/appointment/update-{appointment}.html', [AppointmentController::class, 'edit'])->name('appointment.edit');
    Route::post('/system-management/appointment/update-{appointment}.html', [AppointmentController::class, 'update']);

    Route::post('/system-management/appointment/delete-{appointment}.html', [AppointmentController::class, 'destroy'])->name('appointment.destroy');

    // Category
    Route::get('/system-management/category.html', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/system-management/category/show-{category}.html', [CategoryController::class, 'show'])->name('category.show');

    Route::get('/system-management/category/create.html', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/system-management/category/create.html', [CategoryController::class, 'store']);

    Route::get('/system-management/category/update-{category}.html', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/system-management/category/update-{category}.html', [CategoryController::class, 'update']);

    Route::post('/system-management/category/delete-{category}.html', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::post('/quan-tri-he-thong/danh-muc-san-pham/tai-len-hinh-anh', [CategoryController::class, 'uploadImage'])->name('category.upload.image');

    // Laboratory Test
    Route::get('/system-management/laboratory-test.html', [LaboratoryTestController::class, 'index'])->name('laboratory-test.index');
    Route::get('/system-management/laboratory-test/show-{test}.html', [LaboratoryTestController::class, 'show'])->name('laboratory-test.show');

    Route::get('/system-management/laboratory-test/create.html', [LaboratoryTestController::class, 'create'])->name('laboratory-test.create');
    Route::post('/system-management/laboratory-test/create.html', [LaboratoryTestController::class, 'store']);

    Route::get('/system-management/laboratory-test/update-{test}.html', [LaboratoryTestController::class, 'edit'])->name('laboratory-test.edit');
    Route::post('/system-management/laboratory-test/update-{test}.html', [LaboratoryTestController::class, 'update']);

    Route::post('/system-management/laboratory-test/delete-{test}.html', [LaboratoryTestController::class, 'destroy'])->name('laboratory-test.destroy');

    // Brand
    Route::get('/system-management/brand.html', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/system-management/brand/show-{brand}.html', [BrandController::class, 'show'])->name('brand.show');

    Route::get('/system-management/brand/create.html', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/system-management/brand/create.html', [BrandController::class, 'store']);

    Route::get('/system-management/brand/update-{brand}.html', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/system-management/brand/update-{brand}.html', [BrandController::class, 'update']);

    Route::post('/system-management/brand/delete-{brand}.html', [BrandController::class, 'destroy'])->name('brand.destroy');

    Route::post('/quan-tri-he-thong/thuong-hieu/tai-len-hinh-anh', [BrandController::class, 'uploadImage'])->name('brand.upload.image');

    // Product
    Route::get('/system-management/product.html', [ProductController::class, 'index'])->name('product.index');
    Route::get('/system-management/product/show-{product}.html', [ProductController::class, 'show'])->name('product.show');

    Route::get('/system-management/product/create.html', [ProductController::class, 'create'])->name('product.create');
    Route::post('/system-management/product/create.html', [ProductController::class, 'store']);

    Route::get('/system-management/product/update-{product}.html', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/system-management/product/update-{product}.html', [ProductController::class, 'update']);

    Route::post('/system-management/product/delete-{product}.html', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::post('/quan-tri-he-thong/san-pham/tai-len-hinh-anh-bang-uppy', [ProductController::class, 'uploadImagesByUppy'])->name('product.upload.image.uppy');
    Route::post('/quan-tri-he-thong/san-pham/tai-len-hinh-anh', [ProductController::class, 'uploadImage'])->name('product.upload.image');
    Route::post('/quan-tri-he-thong/san-pham/xoa-hinh-anh', [ProductController::class, 'removeImage'])->name('product.remove.image');

    // Coupon
    Route::get('/system-management/coupon.html', [CouponController::class, 'index'])->name('coupon.index');
    Route::get('/system-management/coupon/show-{coupon}.html', [CouponController::class, 'show'])->name('coupon.show');

    Route::get('/system-management/coupon/create.html', [CouponController::class, 'create'])->name('coupon.create');
    Route::post('/system-management/coupon/create.html', [CouponController::class, 'store']);

    Route::get('/system-management/coupon/update-{coupon}.html', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('/system-management/coupon/update-{coupon}.html', [CouponController::class, 'update']);

    Route::post('/system-management/coupon/delete-{coupon}.html', [CouponController::class, 'destroy'])->name('coupon.destroy');

    // Order
    Route::get('/system-management/order.html', [OrderController::class, 'index'])->name('order.index');
    Route::get('/system-management/order/show-{order}.html', [OrderController::class, 'show'])->name('order.show');

    Route::get('/system-management/order/create.html', [OrderController::class, 'create'])->name('order.create');
    Route::post('/system-management/order/create.html', [OrderController::class, 'store']);

    Route::get('/system-management/order/update-{order}.html', [OrderController::class, 'edit'])->name('order.edit');
    Route::post('/system-management/order/update-{order}.html', [OrderController::class, 'update']);

    Route::post('/system-management/order/delete-{order}.html', [OrderController::class, 'destroy'])->name('order.destroy');

    // Body Part
    Route::get('/system-management/bodypart.html', [BodyPartController::class, 'index'])->name('bodypart.index');
    Route::get('/system-management/bodypart/show-{bodypart}.html', [BodyPartController::class, 'show'])->name('bodypart.show');

    Route::get('/system-management/bodypart/create.html', [BodyPartController::class, 'create'])->name('bodypart.create');
    Route::post('/system-management/bodypart/create.html', [BodyPartController::class, 'store']);

    Route::get('/system-management/bodypart/update-{bodypart}.html', [BodyPartController::class, 'edit'])->name('bodypart.edit');
    Route::post('/system-management/bodypart/update-{bodypart}.html', [BodyPartController::class, 'update']);

    Route::post('/system-management/bodypart/delete-{bodypart}.html', [BodyPartController::class, 'destroy'])->name('bodypart.destroy');

    Route::post('/system-management/bodypart/upload-image', [BodyPartController::class, 'uploadImage'])->name('bodypart.upload.image');

    // Target Group
    Route::get('/system-management/targetgroup.html', [TargetGroupController::class, 'index'])->name('targetgroup.index');
    Route::get('/system-management/targetgroup/show-{targetgroup}.html', [TargetGroupController::class, 'show'])->name('targetgroup.show');

    Route::get('/system-management/targetgroup/create.html', [TargetGroupController::class, 'create'])->name('targetgroup.create');
    Route::post('/system-management/targetgroup/create.html', [TargetGroupController::class, 'store']);

    Route::get('/system-management/targetgroup/update-{targetgroup}.html', [TargetGroupController::class, 'edit'])->name('targetgroup.edit');
    Route::post('/system-management/targetgroup/update-{targetgroup}.html', [TargetGroupController::class, 'update']);

    Route::post('/system-management/targetgroup/delete-{targetgroup}.html', [TargetGroupController::class, 'destroy'])->name('targetgroup.destroy');

    Route::post('/system-management/targetgroup/upload-image', [TargetGroupController::class, 'uploadImage'])->name('targetgroup.upload.image');

    // Seasonal
    Route::get('/system-management/seasonal.html', [SeasonalController::class, 'index'])->name('seasonal.index');
    Route::get('/system-management/seasonal/show-{seasonal}.html', [SeasonalController::class, 'show'])->name('seasonal.show');

    Route::get('/system-management/seasonal/create.html', [SeasonalController::class, 'create'])->name('seasonal.create');
    Route::post('/system-management/seasonal/create.html', [SeasonalController::class, 'store']);

    Route::get('/system-management/seasonal/update-{seasonal}.html', [SeasonalController::class, 'edit'])->name('seasonal.edit');
    Route::post('/system-management/seasonal/update-{seasonal}.html', [SeasonalController::class, 'update']);

    Route::post('/system-management/seasonal/delete-{seasonal}.html', [SeasonalController::class, 'destroy'])->name('seasonal.destroy');

    Route::post('/system-management/seasonal/upload-image', [SeasonalController::class, 'uploadImage'])->name('seasonal.upload.image');

    // Disease
    Route::get('/system-management/disease.html', [DiseaseController::class, 'index'])->name('disease.index');
    Route::get('/system-management/disease/xem-{disease}.html', [DiseaseController::class, 'show'])->name('disease.show');

    Route::get('/system-management/disease/create.html', [DiseaseController::class, 'create'])->name('disease.create');
    Route::post('/system-management/disease/create.html', [DiseaseController::class, 'store']);

    Route::get('/system-management/disease/update-{disease}.html', [DiseaseController::class, 'edit'])->name('disease.edit');
    Route::post('/system-management/disease/update-{disease}.html', [DiseaseController::class, 'update']);

    Route::post('/system-management/disease/delete-{disease}.html', [DiseaseController::class, 'destroy'])->name('disease.destroy');

    Route::post('/system-management/disease/upload-image', [DiseaseController::class, 'uploadImage'])->name('disease.upload.image');
    Route::post('/system-management/doctor/upload-image', [DiseaseController::class, 'doctorUploadImage'])->name('doctor.upload.image');
    Route::post('/upload-disease-content-image', [DiseaseController::class, 'upload'])->name('upload.disease.content.image');

    // Blog Category
    Route::get('/system-management/blogcategory.html', [BlogCategoryController::class, 'index'])->name('blogcategory.index');
    Route::get('/system-management/blogcategory/xem-{blogcategory}.html', [BlogCategoryController::class, 'show'])->name('blogcategory.show');

    Route::get('/system-management/blogcategory/create.html', [BlogCategoryController::class, 'create'])->name('blogcategory.create');
    Route::post('/system-management/blogcategory/create.html', [BlogCategoryController::class, 'store']);

    Route::get('/system-management/blogcategory/update-{blogcategory}.html', [BlogCategoryController::class, 'edit'])->name('blogcategory.edit');
    Route::post('/system-management/blogcategory/update-{blogcategory}.html', [BlogCategoryController::class, 'update']);

    Route::post('/system-management/blogcategory/delete-{blogcategory}.html', [BlogCategoryController::class, 'destroy'])->name('blogcategory.destroy');

    // Blog
    Route::get('/system-management/blog.html', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/system-management/blog/xem-{blog}.html', [BlogController::class, 'show'])->name('blog.show');

    Route::get('/system-management/blog/create.html', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/system-management/blog/create.html', [BlogController::class, 'store']);

    Route::get('/system-management/blog/update-{blog}.html', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/system-management/blog/update-{blog}.html', [BlogController::class, 'update']);

    Route::post('/system-management/blog/delete-{blog}.html', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::post('/system-management/blog/upload-image', [BlogController::class, 'uploadImage'])->name('blog.upload.image');
    Route::post('/system-management/author/upload-image', [BlogController::class, 'authorUploadImage'])->name('author.upload.image');
    Route::post('/upload-blog-content-image', [BlogController::class, 'upload'])->name('upload.blog.content.image');

    // Prescription
    Route::get('/system-management/prescription.html', [PrescriptionController::class, 'index'])->name('prescription.index');
    Route::get('/system-management/prescription/xem-{prescription}.html', [PrescriptionController::class, 'show'])->name('prescription.show');

    Route::get('/system-management/prescription/update-{prescription}.html', [PrescriptionController::class, 'edit'])->name('prescription.edit');
    Route::post('/system-management/prescription/update-{prescription}.html', [PrescriptionController::class, 'update']);

    Route::post('/system-management/prescription/delete-{prescription}.html', [PrescriptionController::class, 'destroy'])->name('prescription.destroy');


    // Doctor
    Route::get('/doctor/dashboard.html', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    // Doctor-Request
    Route::get('/doctor/request.html', [DoctorController::class, 'request'])->name('doctor.request');
    Route::get('/doctor/appointment/{id}/accept', [DoctorController::class, 'acceptRequest'])->name('doctor.acceptRequest');
    Route::get('/doctor/appointment/{id}/decline', [DoctorController::class, 'declineRequest'])->name('doctor.declineRequest');

    Route::get('/doctor/appointment.html', [DoctorController::class, 'appointment'])->name('doctor.appointment');
    Route::get('/doctor/upcoming-appointment-{id}.html', [DoctorController::class, 'upcomingAppointment'])->name('doctor.upcoming.appointment');
    Route::get('/doctor/cancelled-appointment-{id}.html', [DoctorController::class, 'cancelledAppointment'])->name('doctor-cancelled-appointment');
    Route::get('/doctor/completed-appointment-{id}.html', [DoctorController::class, 'completedAppointment'])->name('doctor-completed-appointment');
    Route::get('/doctor/appointment-start-{id}.html', [DoctorController::class, 'appointmentStart'])->name('doctor.appointment.start');

    Route::get('/doctor/available-timing.html', [DoctorController::class, 'availableTiming'])->name('doctor.available-timing');

    Route::get('/doctor/my-patient.html', [DoctorController::class, 'myPatient'])->name('doctor.my-patient');
    Route::get('/doctor/patient-profile.html', [DoctorController::class, 'patientProfile'])->name('doctor.patient-profile');

    Route::get('/doctor/speciality.html', [DoctorController::class, 'speciality'])->name('doctor.speciality');
    Route::get('/doctor/doctor-feedback.html', [DoctorController::class, 'review'])->name('doctor.review');

    Route::get('/doctor/doctor-profile-setting.html', [DoctorController::class, 'doctorProfileSetting'])->name('doctor.doctor-profile-setting');
    Route::get('/doctor/doctor-experience-setting.html', [DoctorController::class, 'doctorExperienceSetting'])->name('doctor.doctor-experience-setting');
    Route::get('/doctor/doctor-education-setting.html', [DoctorController::class, 'doctorEducationSetting'])->name('doctor.doctor-education-setting');
    Route::get('/doctor/doctor-award-setting.html', [DoctorController::class, 'doctorAwardSetting'])->name('doctor.doctor-award-setting');
    Route::get('/doctor/doctor-insurance-setting.html', [DoctorController::class, 'doctorInsuranceSetting'])->name('doctor.doctor-insurance-setting');
    Route::get('/doctor/doctor-clinic-setting.html', [DoctorController::class, 'doctorClinicSetting'])->name('doctor.doctor-clinic-setting');
    Route::get('/doctor/doctor-business-setting.html', [DoctorController::class, 'doctorBusinessSetting'])->name('doctor.doctor-business-setting');

    Route::get('/doctor/doctor-media-setting.html', [DoctorController::class, 'doctorSocialMedia'])->name('doctor.doctor-media-setting');
    Route::get('/doctor/doctor-change-password.html', [DoctorController::class, 'doctorChangePassword'])->name('doctor.doctor-change-password');


    // Patient
    Route::get('/patient/dashboard.html', [PatientController::class, 'dashboard'])->name('patient.dashboard');

    Route::get('/patient/appointment.html', [PatientController::class, 'appointment'])->name('patient.appointment');
    Route::get('/patient/upcoming-appointment.html', [PatientController::class, 'upcomingAppointment'])->name('patient.upcoming.appointment');
    Route::get('/patient/cancelled-appointment-{id}.html', [PatientController::class, 'cancelledAppointment'])->name('patient-cancelled-appointment');
    Route::get('/patient/completed-appointment-{id}.html', [PatientController::class, 'completedAppointment'])->name('patient-completed-appointment');

    Route::get('/patient/medical-record.html', [PatientController::class, 'medicalRecord'])->name('patient.medical-record');
    Route::get('/patient/invoice.html', [PatientController::class, 'invoice'])->name('patient.invoice');
    Route::get('/patient/profile-setting.html', [PatientController::class, 'profileSetting'])->name('patient.profile-setting');
    Route::get('/patient/change-password.html', [PatientController::class, 'changePassword'])->name('patient.change-password');

});

Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
    if (Jetstream::hasTermsAndPrivacyPolicyFeature()) {
        Route::get('/dieu-khoan-dich-vu.html', [TermsOfServiceController::class, 'show'])->name('terms.show');
        Route::get('/chinh-sach-bao-mat.html', [PrivacyPolicyController::class, 'show'])->name('policy.show');
    }

    $authMiddleware = config('jetstream.guard') ? 'auth:'.config('jetstream.guard') : 'auth';
    $authSessionMiddleware = config('jetstream.auth_session', false) ? config('jetstream.auth_session') : null;

    Route::group(['middleware' => array_values(array_filter([$authMiddleware, $authSessionMiddleware]))], function () {
        // User & Profile...
        Route::get('/admin-profile/information.html', [UserProfileController::class, 'show'])->name('profile.show');

        Route::group(['middleware' => 'verified'], function () {
            // API...
            if (Jetstream::hasApiFeatures()) {
                Route::get('/ho-so-ca-nhan/api.html', [ApiTokenController::class, 'index'])->name('api-tokens.index');
            }

            // Teams...
            if (Jetstream::hasTeamFeatures()) {
                Route::get('/nhom/tao.html', [TeamController::class, 'create'])->name('teams.create');
                Route::get('/nhom/{team}.html', [TeamController::class, 'show'])->name('teams.show');
                Route::put('/nhom/thong-tin.html', [CurrentTeamController::class, 'update'])->name('current-team.update');
                Route::get('/nhom/loi-moi-{invitation}.html', [TeamInvitationController::class, 'accept'])->middleware(['signed'])->name('team-invitations.accept');
            }
        });
    });
});

// -- Fortify
Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    $enableViews = config('fortify.views', true);
    $limiter = config('fortify.limiters.login');
    $twoFactorLimiter = config('fortify.limiters.two-factor');
    $verificationLimiter = config('fortify.limiters.verification', '6,1');

    if ($enableViews) {
        Route::get(RoutePath::for('login', '/login.html'), [AuthenticatedSessionController::class, 'create'])->middleware(['guest:'.config('fortify.guard')])->name('login');
    }

    Route::post(RoutePath::for('login', '/login.html'), [AuthenticatedSessionController::class, 'store'])->middleware(array_filter([
        'guest:'.config('fortify.guard'),
        $limiter ? 'throttle:'.$limiter : null,
    ]));

    Route::post(RoutePath::for('logout', '/dang-xuat.html'), [AuthenticatedSessionController::class, 'destroy'])->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])->name('logout');

    if (Features::enabled(Features::resetPasswords())) {
        if ($enableViews) {
            Route::get(RoutePath::for('password.request', '/quen-mat-khau.html'), [PasswordResetLinkController::class, 'create'])->middleware(['guest:'.config('fortify.guard')])->name('password.request');
            Route::get(RoutePath::for('password.reset', '/quen-mat-khau-{token}.html'), [NewPasswordController::class, 'create'])->middleware(['guest:'.config('fortify.guard')])->name('password.reset');
        }

        Route::post(RoutePath::for('password.email', '/quen-mat-khau.html'), [PasswordResetLinkController::class, 'store'])->middleware(['guest:'.config('fortify.guard')])->name('password.email');
        Route::post(RoutePath::for('password.update', '/khoi-phuc-mat-khau.html'), [NewPasswordController::class, 'store'])->middleware(['guest:'.config('fortify.guard')])->name('password.update');
    }

    // Registration...
    if (Features::enabled(Features::registration())) {
        if ($enableViews) {
            Route::get(RoutePath::for('register', '/register.html'), [RegisteredUserController::class, 'create'])->middleware(['guest:'.config('fortify.guard')])->name('register');
        }

        Route::post(RoutePath::for('register', '/register.html'), [RegisteredUserController::class, 'store'])->middleware(['guest:'.config('fortify.guard')]);
    }

    // Email Verification...
    if (Features::enabled(Features::emailVerification())) {
        if ($enableViews) {
            Route::get(RoutePath::for('verification.notice', '/email/xac-nhan.html'), [EmailVerificationPromptController::class, '__invoke'])->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])->name('verification.notice');
        }

        Route::get(RoutePath::for('verification.verify', '/email/xac-nhan-{id}-{hash}.html'), [VerifyEmailController::class, '__invoke'])->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'signed', 'throttle:'.$verificationLimiter])->name('verification.verify');
        Route::post(RoutePath::for('verification.send', '/email/gui-email-xac-nhan.html'), [EmailVerificationNotificationController::class, 'store'])->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'throttle:'.$verificationLimiter])->name('verification.send');
    }

    // Profile Information...
    if (Features::enabled(Features::updateProfileInformation())) {
        Route::put(RoutePath::for('user-profile-information.update', '/ho-so-ca-nhan.html'), [ProfileInformationController::class, 'update'])->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])->name('user-profile-information.update');
    }

    // Passwords...
    if (Features::enabled(Features::updatePasswords())) {
        Route::put(RoutePath::for('user-password.update', '/ho-so-ca-nhan/cap-nhat-mat-khau.html'), [PasswordController::class, 'update'])->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])->name('user-password.update');
    }

    // Password Confirmation...
    if ($enableViews) {
        Route::get(RoutePath::for('password.confirm', '/ho-so-ca-nhan/xac-nhan-mat-khau.html'), [ConfirmablePasswordController::class, 'show'])
            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')]);
    }

    Route::get(RoutePath::for('password.confirmation', '/ho-so-ca-nhan/trang-thai-xac-nhan-mat-khau.html'), [ConfirmedPasswordStatusController::class, 'show'])->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])->name('password.confirmation');
    Route::post(RoutePath::for('password.confirm', '/ho-so-ca-nhan/trang-thai-xac-nhan-mat-khau.html'), [ConfirmablePasswordController::class, 'store'])->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])->name('password.confirm');

    // Two Factor Authentication...
    if (Features::enabled(Features::twoFactorAuthentication())) {
        if ($enableViews) {
            Route::get(RoutePath::for('two-factor.login', '/bao-mat-hai-lop.html'), [TwoFactorAuthenticatedSessionController::class, 'create'])->middleware(['guest:'.config('fortify.guard')])->name('two-factor.login');
        }

        Route::post(RoutePath::for('two-factor.login', '/bao-mat-hai-lop.html'), [TwoFactorAuthenticatedSessionController::class, 'store'])->middleware(array_filter([
            'guest:'.config('fortify.guard'),
            $twoFactorLimiter ? 'throttle:'.$twoFactorLimiter : null,
        ]));

        $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword') ? [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'password.confirm'] : [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')];

        Route::post(RoutePath::for('two-factor.enable', '/ho-so-ca-nhan/kich-hoat-bao-mat-hai-lop.html'), [TwoFactorAuthenticationController::class, 'store'])->middleware($twoFactorMiddleware)->name('two-factor.enable');
        Route::post(RoutePath::for('two-factor.confirm', '/ho-so-ca-nhan/xac-nhan-bao-mat-hai-lop.html'), [ConfirmedTwoFactorAuthenticationController::class, 'store'])->middleware($twoFactorMiddleware)->name('two-factor.confirm');
        Route::delete(RoutePath::for('two-factor.disable', '/ho-so-ca-nhan/tat-bao-mat-hai-lop.html'), [TwoFactorAuthenticationController::class, 'destroy'])->middleware($twoFactorMiddleware)->name('two-factor.disable');
        Route::get(RoutePath::for('two-factor.qr-code', '/ho-so-ca-nhan/qr-code-bat-mat-hai-lop.html'), [TwoFactorQrCodeController::class, 'show'])->middleware($twoFactorMiddleware)->name('two-factor.qr-code');
        Route::get(RoutePath::for('two-factor.secret-key', '/ho-so-ca-nhan/ma-khoa-bao-mat-hai-lop.html'), [TwoFactorSecretKeyController::class, 'show'])->middleware($twoFactorMiddleware)->name('two-factor.secret-key');
        Route::get(RoutePath::for('two-factor.recovery-codes', '/ho-so-ca-nhan/ma-khoi-phuc-bao-mat-hai-lop.html'), [RecoveryCodeController::class, 'index'])->middleware($twoFactorMiddleware)->name('two-factor.recovery-codes');
        Route::post(RoutePath::for('two-factor.recovery-codes', '/ho-so-ca-nhan/ma-khoi-phuc-bao-mat-hai-lop.html'), [RecoveryCodeController::class, 'store'])->middleware($twoFactorMiddleware);
    }
});
