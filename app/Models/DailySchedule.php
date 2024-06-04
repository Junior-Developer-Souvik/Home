<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySchedule extends Model
{
    use HasFactory;

    protected $table ="daily_schedules";
    function ClassData(){
        return $this->belongsTo('App\Models\StudentClass', 'class_id', 'id');
    }
    
    function ScheduleData(){
        return $this->hasMany('App\Models\Schedule', 'daily_schedule_id', 'id');
    }
}
