<?php

namespace App\Http\Controllers;

use Input;
use Hash;
use App\User;
use Illuminate\Http\Request;
use App\Classes\ResponseClass;

class RegisterController extends Controller
{
    public function __construct()
    {
	    //
    }
	
    //Register new User
    public function register() {
	    $userData = Input::except('confirm');
        $userDetails = User::where('email', '=', $email)->first();
        if(!isset($userDetails)) {
            return ResponseClass :: PrepareResponse('', 'success', 'User is already exist.');
        }
        $userData['password'] = Hash::make($userData['password']);
        $userData['dob'] = date('Y-m-d', strtotime($userData['dob']));
        $userData['status'] = '0';
        if(User::create($userData)) {
            return ResponseClass :: PrepareResponse('', 'success', 'User has been registered successfully.');
        } else {
            return ResponseClass :: PrepareResponse('', 'success', 'User has not registered, Please try again.');
        }
	}
}
