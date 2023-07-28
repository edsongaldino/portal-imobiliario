<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    public function cidade()
    {
        return $this->hasOne(Cidade::class, 'id', 'cidade_id');
    }
}
