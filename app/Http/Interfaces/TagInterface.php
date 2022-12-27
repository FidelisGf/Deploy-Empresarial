<?php
namespace App\Http\interfaces;

use App\Http\Requests\StoreTagValidator;
use Illuminate\Http\Request;

interface TagInterface{
    public function index();
    public function store(StoreTagValidator $request);
}
