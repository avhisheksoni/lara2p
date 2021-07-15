<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardcontroller extends Controller
{
   

   public function index(){
          if(Auth::user()->hasRole('user')){
          	return view('user.dashboard');
          }elseif(Auth::user()->hasRole('manager')){
          	return view('user.manager');
          }elseif(Auth::user()->hasRole('admin')){
          	return view('user.admin_dashboard');
          }elseif(Auth::user()->hasRole('superadmin')){
          	return view('user.superadmin');
          }
   	     
   }

  public function create(){

     return "create method";
  }
   public function Profile(){

   	   return view('user.profile');
   }

   public function notification(){

        return view('notification');
   }

   public function sampleform(){

     return "gitpower";
   }
}
