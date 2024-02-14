<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;

    protected $table = "contractors";
    protected $casts = [
        'contractor_portfolio' => 'array',
    ];
    
    protected $fillable = [
        'name', 'email', 'password', 'contact_number', 'zip_code', 'profile_image', 'contractor_portfolio','company_name'
    ];


}
