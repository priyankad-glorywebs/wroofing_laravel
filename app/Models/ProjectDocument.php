<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class ProjectDocument extends Model
{
    use HasFactory;
    protected $table="project_documents";
    protected $fillable = [
       'project_id','document_name','document_file','created_by','updated_by','file_keys'
   ];
// protected $fillable = ['user_id', 'created_by', 'updated_by'];


   public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

}
