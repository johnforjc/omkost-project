<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request){
		return view('home');
	}

	public function admin(Request $request){
		if ($request->cookie('admin')){
            return view('admindashboard');
        } else {
			return redirect('/');
		}
	}

	public function dashboard(Request $request){
		if ($request->cookie('admin')){
            return redirect('/admindashboard');
        } else if($request->cookie('nama')){
			return view('dashboard');
		} else {
			return redirect('/');
		}
	}
	
	public function profil(Request $request){
		if($request->cookie('nama')) return view('profil');
		else return redirect('/');
	}

	public function iklan(Request $request){
		if($request->cookie('nama')) return view('iklan');
		else return redirect('/');
	}

	public function manajemen(Request $request){
		if($request->cookie('nama')) return view('manajemen');
		else return redirect('/');
	}
}
