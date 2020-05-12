<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;

use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->user()->id){
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        $products = Product::filter($request->all())->get()->groupBy("brand");

        return $products;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        if(!$request->user()->id){
            return response()->json(['error' => 'Unauthorized.'], 401);
        }
        
        return $product;
    }

    public function getAProductWithPromotion(Request $request)
    {
        if(!$request->user()->id){
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        return Product::where("oldPrice","!=", null)->inRandomOrder()->first();;
    }
}
