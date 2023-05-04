<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    use HasFactory;
    protected $table = "contatos";
    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'motivo_contatos_id',
        'mensagem'
    ];
    
}
