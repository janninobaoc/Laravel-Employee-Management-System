<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_name',
    ];
    public function employees()
    {
        return $this->belongsToMany(Employee::class)->withPivot('total_employee','sub_total_employee');
    }


    use HasFactory;
}
