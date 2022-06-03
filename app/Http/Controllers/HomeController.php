<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Categorie::all();
        $products = Product::all();
        if(auth()->check())
            {
                $user = User::find(auth()->user()->id);
                return view('user.index',compact('categories','user','products'));
            }else{
                return view('user.index',compact('categories','products'));
            }
    }
}
