<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicativo extends Model
{
    use HasFactory;

    protected $table = 'indicativos';

    protected $fillable = [
        'data_publicacao',
        'mes',
        'ano',
        'tipo',
        'arquivo'
    ];
}
