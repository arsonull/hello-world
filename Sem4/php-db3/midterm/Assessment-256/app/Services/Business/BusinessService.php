<?php
namespace App\Services\Business;

use App\Models\QuestionnaireModel;

class BusinessService
{
    private $verifyCred;
    
    public function compare(QuestionnaireModel $cred)
    {
        if ($cred->getFood() == 'CST-256' || $cred->getColor() == 'CST-256' || $cred->getMovie() == 'CST-256' || $cred->getBook() == 'CST-256')
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
}