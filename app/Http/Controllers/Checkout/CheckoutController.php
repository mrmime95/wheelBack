<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Checkout;
use App\Models\Product;
use App\Http\Resources\CheckoutResource;
use Log;

class CheckoutController extends Controller
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


        //return CheckoutResource::collection();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->user()->id){
            return response()->json(['error' => 'Unauthorized.'], 401);
        } 

        $this->validate($request, [
            'address' => 'required',
            'checkout_data'=> 'required',
            'products' => 'required',
        ]);

        foreach ($request->products as $product_id => $amount){
            $product = Product::find($product_id);
            if(!$product){
                return response()->json(['error' => 'No product'], 400);
            }
            if($product->pieceNumber < $amount){
                return response()->json(['error' => 'Bad piece number'], 400);
            }
        }

        $checkout = new Checkout;
        $checkout->user_id = $request->user()->id;
        $checkout->address = $request->address;
        $checkout->checkout_data = $request->checkout_data;
        $checkout->date = now()->timestamp;
        

        foreach ($request->products as $product_id => $amount){
            $product = Product::find($product_id);
            $product->pieceNumber = $product->pieceNumber - $amount;
            $product->save(); 
            $product->checkouts()->attach($checkout->id, array('amount' => $amount));
        }

        $checkout->save();


        return new CheckoutResource($checkout);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Checkout $checkout)
    {
        if($request->user()->id != $checkout->user_id){
            return response()->json(['error' => 'Unauthorized.'], 401);
        } 
        Log::info($checkout->address);
        return new CheckoutResource($checkout);
    }


}
