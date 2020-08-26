<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Request;//use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\student;
use App\teacher;
//use App\role_permission;
use App\form;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StudentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function editStudentView($id)
    {   
    	$student_data = student::all()->where('id',$id);

        return view('studentEdit', compact('student_data'));
    }

    public function editStudent(Request $request)
    {   
    	$stdID = Request::input('stdId');

        $edit_std = student::find($stdID);

        $edit_std->name=Request::input('stdName');
        $edit_std->Address=Request::input('stdAddress');
        $edit_std->email=Request::input('email');
        $edit_std->DOB=Request::input('dob');

        $edit_std->save();

        if($edit_std->save()){

            Session::flash('flash_message', 'Student edited successfully!');
            return redirect()->back();
        }
        else{
            Session::flash('flash_message_error', 'Student not edited successfully!');
            return redirect()->back();
        }
    }

    public function addStudentView()
    {   
        return view('studentAdd');
    }

    public function addStudent(Request $request)
    {   
        $edit_std = new student;

        $edit_std->name=Request::input('stdName');
        $edit_std->Address=Request::input('stdAddress');
        $edit_std->email=Request::input('email');
        $edit_std->DOB=Request::input('dob');

        $edit_std->save();

        if($edit_std->save()){

            Session::flash('flash_message', 'Student added successfully!');
            return redirect()->back();
        }
        else{
            Session::flash('flash_message_error', 'Student not added successfully!');
            return redirect()->back();
        }
    }

    public function deleteStudent($id)
    {   
        $edit_std = student::find($id);

        $edit_std->active=0;

        $edit_std->save();

        if($edit_std->save()){

            Session::flash('flash_message', 'Student deleted successfully!');
            return redirect()->back();
        }
        else{
            Session::flash('flash_message_error', 'Student not deleted successfully!');
            return redirect()->back();
        }
    }

    
}
