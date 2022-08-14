<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Melc extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'description',
    'order',
    'title',
    'weeks',
  ];
}
