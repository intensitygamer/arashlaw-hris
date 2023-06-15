<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    
    protected $fillable = ['first_name',   
                            'last_name',
                            'middle_name',
                            'birth_date',
                            'gender',
                            'personal_email',
                            'mobile_no',
                            'address',
                            'company_email',
                            'job_title_id',
                            'department_id',
                            'work_shift_time_in',
                            'work_shift_time_out',
                            'work_shift_id',
                            'hired_date',
                            'start_date',
                            'pagibig_id',
                            'philhealth_id',
                            'last_login_date',
                            'last_login_ip',
                            'pc_ip_addr',
                            'last_attendance_log',
                            'last_log_attendance_at',
                            'user_id'
                        ];

                        
    public function getFullName(){
        return "{$this->first_name} {$this->last_name}";
    }   
 

    public function job_position(){
        return $this->hasOne(JobPositions::class, 'id', 'job_position_id');
    }

    public function department(){
        return $this->hasOne(Departments::class, 'id', 'department_id');
    }

    // public function headers(){
    //     return $this->hasOne(JobPositions::class, 'id', 'job_position_id');
    // }

}
