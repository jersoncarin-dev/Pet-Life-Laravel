<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        return view('home')->withProducts(Product::latest('id')->paginate(9));
    }
    
    public function show($id)
    {
        if($product = Product::find($id)) {
            return view('product',[
                'product' => $product,
                'appointed' => Appointment::where([
                    'user_id' => Auth::id(),
                    'product_id' => $id
                ])->first()
            ]);
        }

        return abort(404);
    }

    public function appoint(Request $request)
    {
        if(Product::find($request->id)) {
            Appointment::create([
                'user_id' => Auth::id(),
                'product_id' => $request->id
            ]);
        }
      
        return redirect()->back();
    }
}
