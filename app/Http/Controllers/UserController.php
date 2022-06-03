<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Purchase;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request){
        $user = User::find(auth()->user()->id);
        // dd($user);
        return view('user.profile',compact('user'));
    }

    public function edit(Request $request){
        // dd($request);

        if($request->picture != null){
            $fileName = $request->id . '-' . $request->name . '-' . time() . $request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->move('pictures',$fileName,'public');
            User::where('id',$request->id)->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "address" => $request->address,
                "picture" =>  $path,
                "updated_at" => now()
            ]);
            return redirect()->back();
        }
        else{
            User::where('id',$request->id)->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "address" => $request->address,
                "updated_at" => now()
            ]);
            return redirect()->back();
        }

    }

    public function indexProducts(){
        $user = User::find(auth()->user()->id);
        $i = 0;
        $purchases = DB::table('products')->join('purchases', 'products.id', '=', 'purchases.product_id')->join('users', 'users.id', '=', 'purchases.user_id')->where('user_id', auth()->user()->id)->select('products.id', 'products.name', 'products.price', 'products.picture', 'purchases.created_at', 'purchases.updated_at')->get();
        return view('user.purchases', compact('purchases', 'i', 'user'));

    }

    public function buy(Request $request){
        $purchase = new Purchase();
        $purchase->user_id = auth()->user()->id;
        $purchase->product_id = $request->id;
        $purchase->created_at = now();
        $purchase->save();
        return redirect()->back();
    }
}
