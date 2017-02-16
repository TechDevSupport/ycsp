<?php

namespace App\Http\Controllers;

use Request;
use JWTAuth;
use App\Classes\ResponseClass;
use Tymon\JWTAuth\Exceptions\JWTException;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth');
    }
    
    //User Logout
    public function logout() {
		//~ $authToken = Request::header('authorization'); 
		//~ 
	    //~ JWTAuth::invalidate($authToken);
	    //~ Session :: flush();
	    return ResponseClass :: PrepareResponse('', 'success', '');
	}
}
