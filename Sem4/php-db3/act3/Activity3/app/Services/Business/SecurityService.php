<?php
namespace App\Services\Business;

use App\Models\UserModel;
use App\Services\Data\SecurityDAO;

class SecurityService
{
    private $verifyCred;
    
    public function login(UserModel $cred)
    {
        $this->verifyCred = new SecurityDAO();
        
        return $this->verifyCred->findByUser($cred);
    }
}