<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FakeProduct extends Model
{
    protected $fillable = ['id', 'nome', 'quantidade',
                          'valor', 'medida'];
}
