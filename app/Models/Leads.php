<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $table = 'leads';

    public function anuncio()
    {
        return $this->hasOne(Anuncio::class, 'id', 'anuncio_id');
    }

}
