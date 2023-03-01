<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $category = Category::find($this->category_id);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'category_name'=>$category->name ?? 'Category',
            'category_id'=>$this->category_id,
            'description'=>$this->description,
        ];
    }
}
