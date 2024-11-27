<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientMealResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'meal' => [
                'id' => $this->meal->id,
                'name' => $this->meal->name,
                'price' => $this->meal->price,
                'image' => $this->meal->image,
                'rice' => optional($this->rice)->name,
                'bread' => optional($this->bread)->name,
                'salad' => optional($this->salad)->name,
                'drink' => optional($this->drink)->name,
            ],
            'quantity' => $this->quantity,
            'customizations' => [
                'rice' => optional($this->customizations)->rice ? $this->customizations->rice->name : null,
                'bread' => optional($this->customizations)->bread ? $this->customizations->bread->name : null,
                'salad' => optional($this->customizations)->salad ? $this->customizations->salad->name : null,
                'drink' => optional($this->customizations)->drink ? $this->customizations->drink->name : null,
            ]
        ];
    }
}
