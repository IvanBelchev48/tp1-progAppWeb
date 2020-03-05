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
