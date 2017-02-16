<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class APITest extends TestCase
{
    /**
     * Test to check Authenticate API exist or not
     *
     * @return void
     */
    
    public function testAuthenticateNoParams()
    {   
    	$response = $this->post('/api/v1/authenticate');
    	$response->assertStatus(500); 
    }

     /**
     * Test Authenticate API with parameters( Registered User )
     *
     * @return void
     */
    
    public function testAuthenticateParams()
    {   
    	$token ='Random Token';
    	$data = ["email"=>"ramesh@clerisysolutions.com","password"=>"123456"];
    	$response = $this->post('/api/v1/authenticate',$data,['HTTP_Authorization' => 'Bearer' . $token]);
    	$response->assertStatus(500);
    }

    /**
     * Test Authenticate API with parameters ( Not Registered User )
     *
     * @return void
     */
    
    public function testAuthenticateWrongParams()
    {   
    	$token ='Random Token';
    	$data = ["email"=>"wrong@clerisysolutions.com","password"=>"password" ];
    	$response = $this->post('/api/v1/authenticate',$data,['HTTP_Authorization' => 'Bearer'. $token]);
    	$response->assertStatus(500);
    }

    /**
     * Test to check Forgot Password API exist or not
     *
     * @return void
     */

    public function testForgotPasswordNoParams()
    {
    	$response = $this->post('/api/v1/forgotPassword');
    	$response->assertStatus(500);
    }

    /**
     * Test to check Forgot Password API With parameters
     *
     * @return void
     */

    public function testForgotPasswordParams()
    {   
        $data = [ "email" => "ramesh@clerisysolutions.com" ]; 
        $response = $this->post('/api/v1/forgotPassword');
        $response->assertStatus(500);
    }

    /**
     * Test to check Forgot Password API With Wronng parameters
     *
     * @return void
     */

    public function testForgotPasswordWrongParams()
    {   
        $data = [ "email" => "Wrong@clerisysolutions.com" ]; 
        $response = $this->post('/api/v1/forgotPassword');
        $response->assertStatus(500);
    }

    /**
     * Test to check Register API Exist
     *
     * @return void
     */

    public function testRegisterNoParams()
    {   
        $response = $this->post('/api/v1/register');
        $response->assertStatus(500);
    }

    /**
     * Test to check Register API With Parameters
     *
     * @return void
     */

    public function testRegisterParams()
    {   
        $data = [ "username" => "test user", "email" => "test@user.com", "password" => "123456", "dob" => "27/02/2017", "gender" => "male"];    
        $response = $this->post('/api/v1/register', $data);
        $response->assertStatus(500);
    }

    /**
     * Test to check Register API With Existing email user
     *
     * @return void
     */

    public function testRegisterExistingUser()
    {   
        $data = [ "username" => "female", "email" => "test@user.com", "password" => "123456", "dob" => "27/02/2015", "gender" => "female"];    
        $response = $this->post('/api/v1/register', $data);
        $response->assertStatus(100);
    }            
}
