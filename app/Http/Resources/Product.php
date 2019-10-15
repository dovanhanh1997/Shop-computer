<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return [
            'id' => $this->id,
            'productName'=>$this->productName,
            'productPrice' => $this->productPrice,
            'image' => $this->image,
            'bills' => $this->bills,
        ];
    }

    public function with($request)
    {
        return [
            'version' => '6.0.0',
            'author' => url('https://laravel.com/docs/5.8/eloquent-resources')
        ];
    }
}
