<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\user;
use App\role;
use App\role_permission;
use App\form;
use DB;
use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class loginController extends Controller
{
    
    public function log_user(Request $request)
    {
        $current_user = $request->session()->get('user_name');

        $user_details = user::all()->where('user_name', $current_user)->where('status',1);

        return view('dashboard', compact('user_details'));
    }

    /* display user mgt view */
    public function manage_user(Request $request)
    {
            $sessionUser = Session::get('user_name');

            $current_user = $request->session()->get('user_name');

            $user_details = user::all()->where('user_name', $current_user)->where('status',1);

            $userDetails = user::all();
            $roleData = role::all();
            $formData = form::all();
           
            return view('user_mgt/user_mgt', compact('userDetails','roleData','formData','sessionUser','user_details'));
    }

    /* store new user record */
    public function store(Request $request) 
    {
    	date_default_timezone_set('Asia/Colombo');
    	$current_time = Carbon::now();

        $exist_user_name = user::where('user_name', Input::get('uname'))->where('status',1)->first();
        $exist_email = user::where('email', Input::get('email'))->first();

        if(empty($exist_user_name) && empty($exist_email)){

            if(Input::get('password') == Input::get('cpassword')) {

                $add_user = new user;
                $add_user->user_name=Input::get('uname');
                $add_user->email=Input::get('email');
                $add_user->password=sha1(Input::get('password'));
                $add_user->created_at=$current_time;
                $add_user->user_role=Input::get('role');
                $add_user->status=1;

                $add_user->save();

                Session::flash('flash_message', 'User saved successfully!');

                return redirect()->back();
            }
            else {
                Session::flash('flash_message_password', 'Confirm password and password should be same!');
                return redirect()->back();
            }
        }
        else{
            Session::flash('flash_message_error', 'User can not save. User name or email already exist!');
             return redirect()->back();
        }
        
    }

    /* login authentication and navigate to dashboard */
    public function doLogin(Request $request)
    { 
       $username = $request->get('username');
       $password = $request->get('password');

       $checkuser = user::selectRaw("Count(*) as Total")->where('user_name','=',$username)->where('status',1)->first();

        if(intval($checkuser->Total)>0){

        $getPassword = user::select("password")->where('user_name','=',$username)->first();

            if(sha1($password) == $getPassword->password){

                $request->session()->put('user_name',$username);

                $current_user = $request->session()->get('user_name');
                $user_details = user::all()->where('user_name', $current_user)->where('status',1);

                return view('dashboard',compact('user_details'));
            }
            else{
                Session::flash('flash_message_error', 'Invalid password!');
                return redirect()->back();
            }
        }
        else{
            Session::flash('flash_message_error', 'Invalid username!');
            return redirect()->back(); 
        }   
    }

    /* Function to logout */
    public function logout(Request $request){

        $request->session()->flush();
            return redirect('/');
    }

    /* display selected user related edit form */
    public function display_user_edit(Request $request,$user_id){

        $current_user = $request->session()->get('user_name');
        $user_details = user::all()->where('user_name', $current_user)->where('status',1);

        $user_data = user::all()->where('user_id', $user_id);

        return view('user_mgt/user_edit', compact('user_data', 'user_details'));
    }

    /* update the selected user data */
    public function update(Request $request){

        $userID = (int)Input::get('uid');

        $user = user::find($userID);
        
            $user->user_name  = Input::get('uname');
            $user->email = Input::get('email');
            $user->user_role = Input::get('role');
            $user->save();

            Session::flash('flash_message', 'User edited successfully!');

            return redirect()->back();
    }

    /* Delete a selected user */
    public function delete(){

        $userID = Input::get('uid');
        $user = user::find($userID);

        $user->status = 0;
        $user->save();

        Session::flash('flash_message', 'User deleted successfully!');

        return redirect()->back();
    }


    /* Display access denied view when a user going to access the user management part */
    public function display_access_denied(Request $request)
    {
        $current_user = $request->session()->get('user_name');

        $user_details = user::all()->where('user_name', $current_user)->where('status',1);

        return view('access_denied', compact('user_details'));
    }

    /* Redirect back to the main dashboard from access denied page */
    public function redirect_access_denied(Request $request)
    {
        return redirect('/log_user');
    }
    

    

}
