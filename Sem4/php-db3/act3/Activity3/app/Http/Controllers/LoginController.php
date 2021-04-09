<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{
    public function index (Request $request)
    {
        $cred = new UserModel(request()->get('username'), request()->get('password'));
        /*echo 'working';
        echo $cred->getUsername();
        echo $cred->getPassword();*/
        
        $serviceLogin = new SecurityService();
        
        $isValid = $serviceLogin->login($cred);
        
        if($isValid)
        {
            return view('loginPassed2', $cred);
        }
        else
        {
            return view('loginFailed');
        }
        $formValues = $request->all();
        
        $userName = request()->get('username');
        
        return $request->all();
    }
}