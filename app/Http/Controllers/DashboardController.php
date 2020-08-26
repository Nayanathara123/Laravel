<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\student;
use App\teacher;
//use App\role_permission;
use App\form;
use DB;
use Auth;
use Session;

class DashboardController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewStudentIndex()
    {   
    	$student_details = student::all()->where('active',1);

        return view('studentList', compact('student_details'));
    }

    public function viewTeacherIndex()
    {   
    	$teacher_details = teacher::all()->where('active',1);

        return view('teacherList', compact('teacher_details'));
    }
}
