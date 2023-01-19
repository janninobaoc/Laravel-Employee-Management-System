<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_name',
        'company_address'
    ];
    use HasFactory;
    // public function employee()
    // {
    //     return $this->hasOne(Employee::class);
    // }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
