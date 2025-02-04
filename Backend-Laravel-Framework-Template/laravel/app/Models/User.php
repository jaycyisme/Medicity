<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'speciality_id',
        'consultation_type_id',
        'doctor_bio',
        'business_hours',
    ];

    public function speciality()
    {
        return $this->belongsTo(Category::class, 'speciality_id');
    }

    public function consultationType()
    {
        return $this->belongsTo(Category::class, 'consultation_type_id');
    }



    public function doctorExperiences()
    {
        return $this->hasMany(DoctorExperience::class)->withTrashed();
    }

    public function doctorInsurances()
    {
        return $this->hasMany(DoctorInsurance::class)->withTrashed();
    }

    public function doctorServices()
    {
        return $this->hasMany(DoctorService::class)->withTrashed();
    }

    public function serviceFeedbacks()
    {
        return $this->hasMany(ServiceFeedback::class)->withTrashed();
    }

    public function doctorClinics()
    {
        return $this->hasMany(DoctorClinic::class)->withTrashed();
    }

    public function doctorMemberships()
    {
        return $this->hasMany(DoctorMembership::class)->withTrashed();
    }

    public function doctorAwards()
    {
        return $this->hasMany(DoctorAward::class)->withTrashed();
    }

    public function doctorSocialMedias()
    {
        return $this->hasMany(DoctorSocialMedia::class)->withTrashed();
    }

    public function deseaseDoctors()
    {
        return $this->hasMany(DiseaseDoctor::class)->withTrashed();
    }

    public function doctorFeedbacks()
    {
        return $this->hasMany(DoctorFeedback::class)->withTrashed();
    }

    public function doctorSpecialities()
    {
        return $this->hasMany(DoctorSpeciality::class)->withTrashed();
    }

    public function addresses()
    {
        return $this->hasMany(Address::class)->withTrashed();
    }

    public function calculateResults()
    {
        return $this->hasMany(CalculateResult::class)->withTrashed();
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class)->withTrashed();
    }

    public function doctorFavourites()
    {
        return $this->hasMany(DoctorFavourite::class)->withTrashed();
    }

    public function patientDependants()
    {
        return $this->hasMany(PatientDependant::class)->withTrashed();
    }

    public function productFeedbacks()
    {
        return $this->hasMany(ProductFeedback::class)->withTrashed();
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class)->withTrashed();
    }

    public function orders()
    {
        return $this->hasMany(Order::class)->withTrashed();
    }


    public function chatsSent()
    {
        return $this->hasMany(Chat::class, 'sender_id');
    }

    public function chatsReceived()
    {
        return $this->hasMany(Chat::class, 'receiver_id');
    }







    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


}
