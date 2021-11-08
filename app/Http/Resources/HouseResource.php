<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function houseArray()
    {
        return [
            'address'=> $this->address,
            'room'=> $this->room,
            'kitchen'=> $this->kitchen,
            'garage'=> $this->garage,
            'bathroom'=> $this->bathroom,
            'type_contract'=> $this->type_contract,
            'date'=> $this->date,
            'price_buy'=> $this->price_buy,
            'price_rent'=> $this->price_rent,
            'country'=> $this->country,
        ];
    }
}
