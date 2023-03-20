<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function createForm(Request $request)
    {
        $students = Student::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('score.create', compact(['students', 'teachers', 'subject']));
    }
}
