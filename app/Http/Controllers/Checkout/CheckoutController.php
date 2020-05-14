<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Checkout;
use App\Models\Product;
use App\Http\Resources\CheckoutResource;

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
        if(!$request->user()->id){
            return response()->json(['error' => 'Unauthorized.'], 401);
        } 

        $this->validate($request, [
            'address' => 'required',
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
        $checkout->bank = $request->bank;
        $checkout->comments = $request->comments;
        $checkout->deliveryMethod = $request->deliveryMethod;
        $checkout->email = $request->email;
        $checkout->firstName = $request->firstName;
        $checkout->iban = $request->iban;
        $checkout->name = $request->name;
        $checkout->paymentMethod = $request->paymentMethod;
        $checkout->personType = $request->personType;
        $checkout->termsAgree = $request->termsAgree;
        $checkout->registrationNumber = $request->registrationNumber;
        $checkout->date = now()->timestamp;
        
        $checkout->save();
        foreach ($request->products as $product_id => $amount){
            $product = Product::find($product_id);
            $product->pieceNumber = $product->pieceNumber - $amount;
            $product->save(); 
            $checkout->products()->attach($product_id, array('amount' => $amount));
        }


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
        return new CheckoutResource($checkout);
    }


}
