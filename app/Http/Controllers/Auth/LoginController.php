<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login PagesController
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public $successStatus = 200;

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login API
     *
     * @param Request $request
     * @return Response
     */
    public function login(Request $request){
        var_dump($request->all());

        if(Auth::attempt($request->all())){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return $user->createToken('Token')->accessToken;
        }
        else{
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }
}
