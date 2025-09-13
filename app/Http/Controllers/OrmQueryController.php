<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class OrmQueryController extends Controller
{
    
    public function orm()
    {
        // $students = Student::all();
        $students = Student::get();
        // $students = Student::where('roll',311877)->get();
        // $students = Student::where('id',9)->get();

        return view('orm.index', compact('students'));
    }
}
