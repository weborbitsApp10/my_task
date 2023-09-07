<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    
    public function dashboardPanel(){
        $userRecord = User::where('id','!=', Auth::user()->id)->orderBy('id','DESC')->get();
        return view('custom_view.dashboard', compact('userRecord'));
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }



}
