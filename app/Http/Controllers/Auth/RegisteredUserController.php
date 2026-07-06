<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Detail;
use App\Models\Batch;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

          $request->validate([
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
              'password' => ['required', 'confirmed', Rules\Password::defaults()],
          ]);


$batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
              $user = User::create([
                  'name' => $request->name,
                  'email' => $request->email,
                  'phone' => 0,
                  'role'=> 5,
                  'password' => Hash::make($request->password),
                  'detailsId' => 0,
                  'batchId'=>$batchId,
              ]);

              event(new Registered($user));
$newUserName=$request->name;
              Auth::login($user);
              $userId = Auth::id();
      $newUserDetails=new Detail;
      $newUserDetails->userId=$userId;
      $newUserDetails->sal = 'Mr.\Ms.';
      $newUserDetails->firstname = $newUserName;
      $newUserDetails->lastname = '',
      $newUserDetails->age = 18;
      $newUserDetails->dob = '2012-02-15';
      $newUserDetails->contactNumber = "9876543212";
      $newUserDetails->alternateContactNumber = "9876543212";
      $newUserDetails->roleId = 4;
      $newUserDetails->address = "45, Fun Street, Day City";
      $newUserDetails->bloodGroup = "O+ve";
      $newUserDetails->identificationMark = "Line";
      $newUserDetails->parentNumber = "9876543212";
      $newUserDetails->homePhoneNumber = "9876543212";
      $newUserDetails->fatherSpouseName =$newUserName." Sr.";
      $newUserDetails->motherName = "Mother";
      $newUserDetails->status = 22; // "Account created!"
      $newUserDetails->guardianName = $newUserName." Sr.";
      $newUserDetails->batchId = $batchId;
      $newUserDetails->save();
      $detailIdOfNewUser=$newUserDetails->detailId;

      $newUserId=User::where('userId','=',$userId);
      $newUserId->role=4;
      $newUserId->save();
      $user =  DB::table('users')
      ->select('role')
      ->where('email','=',$request->email)
      ->first();
    if($user->role==1)
    {
      return redirect()->route(RouteServiceProvider::ADMIN);
    }
    else if($user->role=2)
    {
      return redirect()->route(RouteServiceProvider::TEACHER);
    }
    else if($user->role=3)
      {
      return redirect()->route(RouteServiceProvider::STUDENT);
    }
    else {
      return redirect()->route(RouteServiceProvider::HOME);
    }
  }
}
