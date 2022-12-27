<?php

namespace App\Http\Resources;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'ID' => $this->ID_CATEGORIA,
            'NOME' => $this->NOME,
            'CREATED_AT' => $this->CREATED_AT,
            'UPDATED_AT' => $this->UPDATED_AT,
            'DELETED_AT' => $this->DELETED_AT
        ];
    }
}
