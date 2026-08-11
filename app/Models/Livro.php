<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\ModelStatus\HasStatuses;
use App\Models\Livro;

class Livro extends Model
{
    use HasStatuses;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}