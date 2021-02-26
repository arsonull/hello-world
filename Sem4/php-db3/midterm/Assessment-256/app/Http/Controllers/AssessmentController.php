<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionnaireModel;
use App\Services\Business\BusinessService;

class AssessmentController extends Controller
{
    public function index (Request $request)
    {
        $cred = new QuestionnaireModel(request()->get('food'), request()->get('color'), request()->get('movie'), request()->get('book'));
        
        $cred->print();
        
        $service = new BusinessService();
        $isClass = $service->compare($cred);
        
        if($isClass)
        {
            echo 'True!!!';
        }
        else
        {
            echo 'False!!';
        }
    }
}