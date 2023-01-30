<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingsModel extends Model
{
  use HasFactory;

  protected $table = 'Buildings';
  protected $fillable = ['name', 'location', 'description'];
}
