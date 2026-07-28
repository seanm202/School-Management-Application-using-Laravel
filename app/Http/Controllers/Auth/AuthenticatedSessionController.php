<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
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
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();
    //     $role =  DB::table('users')
    //     ->select('role')
    //     ->where('email','=',$request->email)
    //     ->first();
    //     if($role->role==1)
    //     {
    //       return redirect(RouteServiceProvider::ADMIN);
    //     }
    //     else if($role->role==2)
    //     {
    //       return redirect(RouteServiceProvider::TEACHER);
    //     }
    //     else if($role->role==3)
    //     {
    //       return redirect(RouteServiceProvider::STUDENT);
    //     }
    //     else {
    //     return redirect()->route('dashboard');
    //   }
    // }


public function store(LoginRequest $request)
{
    try {
        $request->authenticate();
    } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Incorrect email or password.'
        ], 422);
    }

    $request->session()->regenerate();

    $role = DB::table('users')
        ->where('email', $request->email)
        ->value('role');

    switch ($role) {
        case 1:
            $redirect = route('Admindashboard');
            break;

        case 2:
            $redirect = route('Teacherdashboard');
            break;

        case 3:
            $redirect = route('Studentdashboard');
            break;

        default:
            $redirect = route('dashboard');
    }

    return response()->json([
        'success' => true,
        'redirect' => $redirect
    ]);
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
