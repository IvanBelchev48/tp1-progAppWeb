<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $successStatus = 200;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|max:50',
            'password' => 'required|max:50',
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
            'last_name' => 'required|max:50',
            'first_name' => 'required|max:50',
            'role_id' => 'required|max:11',

        ]);

        $request->user()->create([
            'login' => $request->login,
            'password' => $request->password,
            'email' => $request->email,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'role_id' => $request->role_id,
        ]);

        return response()->json($request->user()->toArray(), 200);
    }

    public function updateInfo(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|max:50',
            'password' => 'required|max:50',
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
            'last_name' => 'required|max:50',
            'first_name' => 'required|max:50',
            'role_id' => 'required|max:11',

        ]);

        $request->user()->update([
            'login' => $request->login,
            'password' => $request->password,
            'email' => $request->email,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'role_id' => $request->role_id,
        ]);

        return response()->json($request->user()->toArray(), 200);
    }

    /**
     * Details API
     *
     * @return Response
     */
    public function userDetails() {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
