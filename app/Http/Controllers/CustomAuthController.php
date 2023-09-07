<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomAuthController extends Controller
{

    public function loginPage()
    {
        return view('custom_view.login');
    }

    public function signUpUser()
    {
        return view('custom_view.register');
    }

    public function userRegister(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'mobile' => 'nullable|numeric|digits:10',
                'password' => 'required|min:8',
                'c_password' => 'required|same:password',
                'dob' => 'required',
                'gender' => 'required',
                'address' => 'nullable|min:20',
            ], [
                'c_password.required' => 'Confirmation password is required',
                'c_password.same' => 'Your password and confirmation password do not match',
                'dob.required' => 'Date of birth is required'
            ]);

            if ($validate->fails()) {
                return redirect()->back()->withInput()->withErrors($validate);
            }

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
                'dob' => $request->dob,
                'gender' => $request->gender,
                'address' => $request->address,
            ]);

            Session::flash('message', 'User registration successfully. You can Login');
            return redirect()->back();

        } catch (\Throwable $th) {
            $message = $th->getMessage();
            echo "Something went wrong " . $message;
        }

    }

    public function userLogin(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);

            if ($validate->fails()) {
                return redirect()->back()->withInput()->withErrors($validate);
            }

            $loginCredentials = $request->only('email', 'password');
            if (Auth::attempt($loginCredentials)) {
                return redirect('/dashboard-panel');
            }else{
                Session::flash('danger', 'Email id or password is incorrect');
                return redirect()->back();
            }

        } catch (\Throwable $th) {
            $message = $th->getMessage();
            echo "Something went wrong " . $message;
        }
    }




}