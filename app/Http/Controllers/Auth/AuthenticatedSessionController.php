<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $role =  DB::table('users')
        ->select('role')
        ->where('email','=',$request->email)
        ->first();
        if($role->role==4)
        {
          return redirect(RouteServiceProvider::STUDENT);
        }
        else if($role->role==3)
        {
          return redirect()->route('Admindashboard');
        }
        else if($role->role==2)
        {
          return redirect(RouteServiceProvider::TEACHER);
        }
        else {
        return redirect()->route('dashboard');
      }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
