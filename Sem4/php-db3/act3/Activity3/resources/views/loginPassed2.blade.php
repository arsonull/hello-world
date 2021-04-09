<?php 
use App\Models\UserModel;
$model = new UserModel(request()->get('username'), request()->get('password'));?>
@if($model->getUsername() == 'spartancamo')
        <h3>Spartan you have logged in successfully.</h3>
    @else
        <h3>Someone besides spartancamo logged in successfully.</h3>
    @endif
