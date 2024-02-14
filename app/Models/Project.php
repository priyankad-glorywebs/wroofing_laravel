<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";

    // protected $casts = [
    //     'project_image' => 'array',
    // ];
    
    protected $fillable = [
        'title',
        'address',
        'insurance_company',
        'insurance_agency',
        'billing',
        'mortgage_company',
        'user_id',
        
        'project_image',
        'roofandgutterdesign',
        'rooftypeandrating',
        'guttertypeaccessories',
        'guttertypeaccessories1',
        'created_by',
        'updated_by'
    ];
    public $timestamps = true;

}
