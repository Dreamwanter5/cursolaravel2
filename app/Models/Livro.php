<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Livro;

class Livro extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}