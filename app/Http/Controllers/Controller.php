<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Messages;
use App\Models\Categorie;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $i = 0;
        $purchases = DB::table('products')->join('purchases', 'products.id', '=', 'purchases.product_id')->join('users', 'users.id', '=', 'purchases.user_id')->select('products.id', 'products.name as product_name', 'products.price', 'products.picture', 'purchases.created_at', 'purchases.updated_at', 'users.name', 'users.email')->get();
        return view('admin.index', compact('purchases', 'i'));
    }

    public function addProduct()
    {
        $categories = Categorie::all();
        return view('admin.addProduct', compact('categories'));
    }

    public function addCategorie()
    {
        $categories = Categorie::all();
        $i = 0;
        return view('admin.addcategorie', compact('categories', 'i'));
    }

    public function storeProduct(Request $request)
    {
        // $categories = Categorie::all();
        $product = new Product();
        if ($request->picture != null) {
            $fileName = $request->category . '-' . time() . '-' . $request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->move('pictures', $fileName, 'public');
            $product->name = $request->name;
            $product->categorie_id = $request->categorie;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->picture =  $path;
            $product->created_at = now();
            $product->save();
        } else {
            $product->name = $request->name;
            $product->categorie_id = $request->categorie;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->created_at = now();
            $product->save();
        }
        return redirect()->back();
    }

    public function storeCategorie(Request $request)
    {
        $categorie = new Categorie();
        $categorie->name = $request->name;
        $categorie->save();
        return redirect()->back();
    }

    public function messages()
    {
        $messages = Messages::all();
        $i = 0;
        return view('admin.messages', compact('messages', 'i'));
    }

    public function editProductPage(Request $request)
    {
        $product = Product::find($request->id);
        $categories = Categorie::all();
        return view('admin.editProduct', compact('product', 'categories'));
    }

    public function indexProducts()
    {
        $products = Product::all();
        $i = 0;
        return view('admin.all-products', compact('products', 'i'));
    }

    public function editProduct(Request $request)
    {

        if ($request->picture != null) {
            $fileName = $request->category . '-' . time() . '-' . $request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->move('pictures', $fileName, 'public');
            Product::where('id', $request->id)->update([
                "name" => $request->name,
                "categorie_id" => $request->categorie,
                "price" => $request->price,
                "description" => $request->description,
                "picture" => $path,
                "updated_at" => now()
            ]);
        } else {
            Product::where('id', $request->id)->update([
                "name" => $request->name,
                "categorie_id" => $request->categorie,
                "price" => $request->price,
                "description" => $request->description,
                "updated_at" => now()
            ]);
        }
        return redirect()->back();
    }

    public function deleteProduct(Request $request)
    {
        $purchases = Purchase::where('product_id', $request->id);
        if ($purchases == null) {
            Product::where('id', $request->id)->delete();
        } else {
            Purchase::where('product_id', $request->id)->delete();
            Product::where('id', $request->id)->delete();
        }
        return redirect()->back();
    }

    public function editCategoriePage(Request $request)
    {
        $categorieName = Categorie::find($request->id);
        $categories = Categorie::all();
        $i = 0;
        return view('admin.editCategorie', compact('categorieName', 'categories','i'));
    }

    public function editCategorie(Request $request)
    {
        $categories = Categorie::all();
        Categorie::where('id', $request->id)->update([
            "name" => $request->name,
            "updated_at" => now()
        ]);
        $i = 0;
        // return view('admin.addcategorie', compact('categories','i'));
        return redirect()->back();
    }

    public function deleteCategorie($id)
    {
        // dd($id);
        $products = Product::where('categorie_id',$id)->get();
        // dd($products);
        $arr = [0];
        foreach ($products as $product) {
            $arr[] = $product->id;
        }
        if ($products == null) {
            Categorie::where('id', $id)->delete();
        } elseif($products != null ) {
            Product::where('categorie_id', $id)->delete();
            Categorie::where('id', $id)->delete();
        }else{
            Purchase::whereIn('product_id', $products->id)->delete();
            Product::where('categorie_id', $id)->delete();
            Categorie::where('id', $id)->delete();
        }
        return redirect()->back();
    }

}
