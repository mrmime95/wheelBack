<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'address'=> $this->address,
            'bank'=> $this->bank,
            'comments'=> $this->comments,
            'deliveryMethod'=> $this->deliveryMethod,
            'email'=> $this->email,
            'firstName'=> $this->firstName,
            'iban'=> $this->iban,
            'name'=> $this->name,
            "personType"=>$this->personType,
            'paymentMethod'=> $this->paymentMethod,
            'registrationNumber'=> $this->registrationNumber,
            'termsAgree'=> $this->termsAgree,
            'date'=>$this->date,
            'user' => $this->user,
            'products' => $this->products,
        ];
    }
}
