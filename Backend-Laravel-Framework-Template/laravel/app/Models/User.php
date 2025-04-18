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
        // 'speciality_id',
        'consultation_type_id',
        'doctor_bio',
        'business_hours',
        'languages',
        'designation',
        'phone_number',
        'price_per_session'
    ];

    // public function speciality()
    // {
    //     return $this->belongsTo(Category::class, 'speciality_id');
    // }

    public function getUnreadMessagesAttribute()
    {
        return Chat::where('receiver_id', $this->id)
            ->where('seen', false)
            ->count();
    }

    public function consultationType()
    {
        return $this->belongsTo(ConsultationType::class, 'consultation_type_id');
    }



    public function doctorExperiences()
    {
        return $this->hasMany(DoctorExperience::class, 'doctor_id');
    }

    public function doctorInsurances()
    {
        return $this->hasMany(DoctorInsurance::class, 'doctor_id');
    }

    public function doctorServices()
    {
        return $this->hasMany(DoctorService::class, 'doctor_id');
    }

    public function serviceFeedbacks()
    {
        return $this->hasMany(ServiceFeedback::class)->withTrashed();
    }

    public function doctorClinics()
    {
        return $this->hasMany(DoctorClinic::class, 'doctor_id');
    }

    public function doctorMemberships()
    {
        return $this->hasMany(DoctorMembership::class, 'doctor_id');
    }

    public function doctorAwards()
    {
        return $this->hasMany(DoctorAward::class, 'doctor_id');
    }

    public function doctorSocialMedias()
    {
        return $this->hasMany(DoctorSocialMedia::class, 'doctor_id');
    }

    public function deseaseDoctors()
    {
        return $this->hasMany(DiseaseDoctor::class, 'doctor_id');
    }

    public function doctorFeedbacks()
    {
        return $this->hasMany(DoctorFeedback::class, 'doctor_id');
    }

    public function patientFeedbacks()
    {
        return $this->hasMany(DoctorFeedback::class, 'patient_id');
    }

    public function doctorSpecialities()
    {
        return $this->hasMany(DoctorSpeciality::class, 'doctor_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function calculateResults()
    {
        return $this->hasMany(CalculateResult::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class, 'patient_id');
    }

    public function doctorFavourites()
    {
        return $this->hasMany(DoctorFavourite::class, 'doctor_id');
    }

    public function patientFavourites()
    {
        return $this->hasMany(DoctorFavourite::class, 'patient_id');
    }

    public function patientDependants()
    {
        return $this->hasMany(PatientDependant::class, 'patient_id');
    }

    public function productFeedbacks()
    {
        return $this->hasMany(ProductFeedback::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function doctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
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
