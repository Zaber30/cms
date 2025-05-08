<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    
    public function index():View
    {    // $now=Carbon::now();
          //dump($now);
         $users=User::with('pictures')->simplePaginate(2);
        return view('dashboard',compact('users'));
        

    }

}
