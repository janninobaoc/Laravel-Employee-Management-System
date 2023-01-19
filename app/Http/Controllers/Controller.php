<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Mockery\Generator\Method;

class Controller extends BaseController
{

    public function mm()
    {
        $employee = Employee::find(2);
        $employee->department()->sync([
            1 => ['total_employee' => 200, 'sub_total_employee' => 200],
            2 => ['total_employee' => 200, 'sub_total_employee' => 400],
            3 => ['total_employee' => 300, 'sub_total_employee' => 800],
            4 => ['total_employee' => 400, 'sub_total_employee' => 1000],
            5 => ['total_employee' => 500, 'sub_total_employee' => 1200],
        ]);
        return $employee;
    }


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
