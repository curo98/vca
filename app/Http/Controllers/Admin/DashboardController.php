<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{	

	
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	if (Auth::check()) {
    		 return view('backend.paginas.dashboard'); 
    	}
    	return view('auth.login');
    }
}
