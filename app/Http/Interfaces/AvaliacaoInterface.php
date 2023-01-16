<?php
namespace App\Http\interfaces;

use Illuminate\Http\Request;

interface AvaliacaoInterface{
    public function store(Request $request);
}
