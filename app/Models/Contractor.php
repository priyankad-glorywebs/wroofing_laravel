<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Contractor extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    protected $table = "contractors";
    protected $casts = [
        'contractor_portfolio' => 'array','email_verified_at' => 'datetime',

    ];
    
    protected $fillable = [
        'name', 'email', 'password', 'contact_no', 'zipcode', 'profile_image', 'contractor_portfolio','company_name','banner_image'
    ];

    


    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\CustomVerifyEmailNotification);
    }
}