<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $successStatus = 200;

    /**
     * Details API
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}
