<?php

namespace App\Http\Controllers;

use URL;
use Mail;
use Auth;
use View;
use Input;
use Crypt;
use JWTAuth;
use Session;
use App\User;
use App\PasswordResets;
use App\tmap;
use Request;
use App\Classes\ResponseClass;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{
    public function __construct()
    {
	    //
    }
   
    // User Login Process
    public function index() {
	    $data = Input::all();
	    $credentials = array(
		    'email' => $data['email'],
		    'password' => $data['password']
        );
		
        if(Auth::attempt($credentials)) {
		    $userDetails = auth()->user();

		    // Generate Token and update Tmap table
		    try {
                // verify the credentials and create a token for the user
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 401);
                }
            } catch (JWTException $e) {
                // something went wrong
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
            $jwtToken = compact('token');
            $tokenData = array(
			    'ip'    => $_SERVER['REMOTE_ADDR'],
			    'token' => $jwtToken['token'],
			    'created_at' => date('Y-m-d H:i:s')
            );
            tmap::create($tokenData);
			return ResponseClass :: Prepare_Response(array('auth_token' => $jwtToken['token']), 'success', '');
		} else {
			return ResponseClass :: PrepareResponse('', 'failed', '');
		}		
	}
	
	
	/*
	 *  Forgot Password
	 */
    public function forgotPassword()
    {	
	    $email = Input::get('email');
	    $emailExist = User::where('email', $email)->where('status', '1')->first();
	    if(!$emailExist) {
	        return ResponseClass:: PrepareResponse('','error','Email does not exist in database.');
		    exit;
		}
        $userDetails = User::where('email', $email)->first();
        $name = ucfirst($userDetails->name);
        $id = $userDetails->id;
        $email = strtolower($userDetails->email);
        $date = date('y-m-d');
       echo  $token = Crypt::encrypt($date.'/'.$id.'/'.$email);
        $link = URL::to('/').'/resetPassword/'.$token;
        
        // Check forgot email request exist
        $checkRequest = PasswordResets::where('email',$email)->first();
        if($checkRequest) {
            PasswordResets::where('email', $email)->update(['token' => $token, 'created_at' => $date,]);
        } else {
            $resetPassword = [ "email" => $email, "token" => $token, "created_at" => $date];
            PasswordResets::create($resetPassword);
        }
        $subject = 'Reset Password';
        $data = "<div><a href='".$link."'>Reset Email</a></div>";
        $status = Mail::send('forgetpassword', $data, function($message) use ($name,$subject) {
            $message->to($name)->from('noreply@ycsp.com')->subject($subject);
		});
		$status = 1;
        if($status) {
            return ResponseClass:: PrepareResponse('', 'email_sent', "Email sent successfully.");
        } else {		
            return ResponseClass:: PrepareResponse('','Error','Server error.');	
		}
		
	}

	/*
	 *  Reset Password Backend Intiator 
	 */
    public function resetPassword(Request $request)
    { 
    	$token = Request::segment(2);
    	if(isset($token)) {
            $tokenExist = PasswordResets::where('token','=',$token)->first(); 
            if($tokenExist) {   
                $tokenData = Crypt::decrypt($token);
                print_r($tokenData); die;
                $tokenData = explode('/',$tokenId);
                $userData = PasswordResets::where( 'email', $tokenData[2])->first();
                print_r($userData); die;
                if($tokenExist->email == $userData->email) {
                    $request->session()->put('resetEmail', $tokenExist->email);
                    return view::make('resetpassword', ['id' => $userData->id]);
                }
            } else {		
                return ResponseClass:: PrepareResponse('','error','token_expired');		
            }
    	} else {
    	    return ResponseClass:: PrepareResponse('','error','token_not_provided');		
    	}
        
        if($tokenExist) {   
            $tokenId = Crypt::decrypt($token);
            $tokenIdArray = explode('/',$tokenId);
            $userData = User::where( 'id', $tokenIdArray[1])->first();
            if($tokenExist->email == $userData->email) {
                $request->session()->put('resetEmail', $tokenExist->email);
                return view::make('resetpassword', ['id' => $userData->id]);
            }
        } else {		
            echo "Token not Found";	
        }
	}

	/*
	 *  Reset Password Backend Complete Action
	 */
	public function resetPasswordCompleted()
    {
        $newPassword = Hash::make('123456');
        $id = '';
        $result = User::where('id', $id)->update(['password' => $newPassword]);
        if($result) {
            return ResponseClass::PrepareResponse('', 'completed', 'Password has been changed');	
        } else{

        }    
            
	}	
}
