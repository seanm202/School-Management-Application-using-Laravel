<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Models\Batch;
use Auth;
use DB;

class DashboardController extends Controller
{

  public function logout(Request $request) {
    Auth::logout();
    return redirect()->route('logout');
  }

  public function chooseDashboard()
  {
    $roles =  DB::table('users')
    ->select('role')
    ->where('userId','=',Auth::user()->userId)
    ->first();
    if($roles->role==4)
    {
      return redirect()->route('Studentdashboard');
    }
    else if($roles->role==3)
    {
      return redirect()->route('Admindashboard');
    }
    else if($roles->role==2)
    {
      return redirect()->route('Teacherdashboard');
    }
    else {
    return redirect()->route('dashboard');
  }
  }
}
