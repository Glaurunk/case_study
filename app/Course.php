<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $guarded = [];

  public function teacher()
  {
      return $this->belongsTo('App\Teacher');
  }

  public function students()
  {
      return $this->belongsToMany('App\Student')->withPivot('grade');
  }

  public function dateFormated()
  {
      return date('d M Y', strtotime($this->date));
  }

  public function start_timeFormated()
  {
      return date('H:i', strtotime($this->start_time));
  }

  public function end_timeFormated()
  {
      return date('H:i', strtotime($this->end_time));
  }
}
