<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;
use App\Services\Business\OrderService;

class Login3Controller extends Controller
{
    public function index (Request $request)
    {
        $cred = new UserModel(request()->get('username'), request()->get('password'));
        /*echo 'working';
        echo $cred->getUsername();
        echo $cred->getPassword();*/
        $this->validateForm($request);
        
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
    
    private function validateForm(Request $request)
    {
        $rules = ['username'=>'Required|Between:4,10|Alpha', 'password'=>'Required|Between:4,10'];
        
        $this->validate($request, $rules);
    }
    
    public function testDAO(Request $request)
    {
        $oServ = new OrderService();
        
        $oServ->createOrder("Carson", "Perry", "RTX 3070");
        
        return view('daotest');
    }
}