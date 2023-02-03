<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsModel extends Model
{
  use HasFactory;

  protected $table = 'Students';
  protected $fillable = ['firstName', 'lastName', 'guardianName', 'contactNumber', 'admissionDate'];

  public function getCourse()
  {
    return $this->belongsTo(CoursesModel::class, 'courseId');
  }
}
