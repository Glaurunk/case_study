<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $guarded = [];

  public function teachers()
              {
                  return $this->belongsToMany(Teacher::class);
              }

    public function students()
              {
                  return $this->belongsToMany(Teacher::class);
              }
}
