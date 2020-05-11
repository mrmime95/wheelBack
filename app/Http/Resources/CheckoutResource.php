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
            'checkout_data' => $this->checkout_data,
            'date'=>$this->date,
            'user' => $this->user,
            'products' => $this->products,
        ];
    }
}
