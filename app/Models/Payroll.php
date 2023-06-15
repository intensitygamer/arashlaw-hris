<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'note', 'from_date', 'to_date', 'payroll_type', 'created_by_id', 'status'
    ];

    protected $table= 'payroll';

    public function created_by(){
        return $this->hasOne(User::class, 'id', 'created_by_id');
    }

    public function total_gross(){
        
    }
    
    public function salaries(){
        return $this->hasMany(Salary::class);
    }
}
