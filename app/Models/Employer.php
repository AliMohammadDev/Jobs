<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
  /** @use HasFactory<\Database\Factories\EmployerFactory> */
  use HasFactory;

  protected $fillable = ['user_id', 'name', 'logo'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function jobs()
  {
    return $this->hasMany(Job::class);
  }

  protected static function booted()
  {
    static::deleting(function ($employer) {
      $employer->jobs()->each(function ($job) {
        if ($job->image && Storage::exists('public/' . $job->image)) {
          Storage::delete('public/' . $job->image);
        }
        $job->delete();
      });
    });
  }
}
