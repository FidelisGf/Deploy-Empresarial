<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        //return parent::toArray($request);
        return [
            'ID' => $this->ID_PRODUTO,
            'NOME' => $this->NOME,
            'DESC' => $this->DESC,
            'VALOR' => $this->VALOR,
            'CATEGORIA' => $this->ID_CATEGORIA,
            'CREATED_AT' => $this->CREATED_AT,
            'UPDATED_AT' => $this->UPDATED_AT,
            'DELETED_AT' => $this->DELETED_AT
        ];
    }
}
