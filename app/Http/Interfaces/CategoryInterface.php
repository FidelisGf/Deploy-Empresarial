<?php
namespace App\Http\interfaces;

use App\Http\Requests\StoreCategoryValidator;
use Illuminate\Http\Request;

interface CategoryInterface{
    public function index();
    public function store(StoreCategoryValidator $request);
    public function findCategoryWithProductsIn();
    public function show($id);
    public function update(Request $request, $id);
}
