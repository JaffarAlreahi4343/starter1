<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
    public function showUserName(){
        return 'jaffar reahi';
    }

    public function getIndex(){
        // $data=[];
        // $data['id']=5;
        // $data['name']='jaffar';

        $data = ['jaffar','reahi'];
        // dd($data);
        return view('welcome',compact('data'));
    }
}
