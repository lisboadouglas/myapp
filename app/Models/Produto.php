<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'produtos';
    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id'
    ];
}