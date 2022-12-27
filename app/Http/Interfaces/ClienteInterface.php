<?php
namespace App\Http\interfaces;

use App\Http\Requests\StoreClientValidator;
use Illuminate\Http\Request;

interface ClienteInterface{
    public function index();
    public function store(StoreClientValidator $request);
    public function show($id);
}
