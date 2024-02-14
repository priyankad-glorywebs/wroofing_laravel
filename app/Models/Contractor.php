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
        'contractor_portfolio' => 'array',
    ];
    
    protected $fillable = [
        'name', 'email', 'password', 'contact_no', 'zipcode', 'profile_image', 'contractor_portfolio','company_name'
    ];

    
    // public function getAuthIdentifierName()
    // {
    //     return 'id';
    // }

    // public function getAuthIdentifier()
    // {
    //     return $this->getKey();
    // }

    // public function getAuthPassword()
    // {
    //     return $this->password;
    // }

    // public function getRememberToken()
    // {
    //     return $this->remember_token;
    // }

    // public function setRememberToken($value)
    // {
    //     $this->remember_token = $value;
    // }

    // public function getRememberTokenName()
    // {
    //     return 'remember_token';
    // }
}