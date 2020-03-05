<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth;

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
        //$this->middleware('api:auth');
        //$this->user =  \Auth::user();
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
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return $user->createToken('Token')->accessToken;
        }
        else{
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }
}
