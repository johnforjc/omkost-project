<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
		return view('home');
	}

	public function dashboard(){
		return view('dashboard');
	}
	
	public function profil(){
		return view('profil');
	}

	public function iklan(){
		return view('iklan');
	}

	public function manajemen(){
		return view('manajemen');
	}
}
