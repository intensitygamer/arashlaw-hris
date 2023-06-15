<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Attendance extends Model
{
    use HasFactory;

    protected $table= 'attendance';

    protected $fillable = ['employee_id',   
                            'time_in',
                            'time_out',
                            'attendance_date',
                            'sched_status',
                            'in_status',
                            'out_status',
                            'notes',
                        ];

    protected $guarded = [];


    public function schedDateFormat(){        
        return Carbon::parse($this->attendance_date)->format('M d, Y');
    }

    
    public function timeFormat($date){        
        return Carbon::parse($date)->format('H:i A');
    }
 
    public function timeInFormat(){        
        return Carbon::parse($this->sched_time_in)->format('h:i A') ? : '';
    }
    public function timeOutFormat(){        
        return Carbon::parse($this->sched_time_out)->format('h:i A') ? : '' ;
    }


}
