<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Models\Classes\StudentClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function get(Request $request, int $id)
    {
        $token = $request->header("token");
        $studentDB = Student::where("token", $token)->first();
        if (isset($studentDB))
        {
            $student = StudentClass::getStudent($studentDB);
            return response()->json($student);
        }
        else
        {
            $array = [
                'error' => 'Ошибка доступа или неверный токен'
            ];
            return response()->json($array);
        }

    }
}
