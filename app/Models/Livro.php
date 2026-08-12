<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\ModelStatus\HasStatuses;
use App\Models\Livro;

use OwenIt\Auditing\Contracts\Auditable;

class Livro extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasStatuses;

    protected $fillable = [
        'titulo',
        'autor',
        'ano',
        'user_id',
        'imagem'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}