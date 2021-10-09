<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Noticia extends Model
{
    use HasFactory;

    const STATUS_ATIVO = 'A';
    const STATUS_INATIVO = 'I';

    protected $table = 'noticias';
    // protected $fillable = ['titulo', 'conteudo']; // Colunas que serão preenchidas
    protected $guarded = ['id', 'created_at', 'updated_at']; // Colunas que serão preenchidas automaticamente
    protected $dates = ['data_publicacao', 'created_at', 'updated_at'];

    public function getStatusFormatadoAttribute() // Accessor
    {
        if ($this->status == "A") {
            return "Ativo";
        } else if ($this->status == "I") {
            return "Inativo";
        }
    }

    public function setTituloAttribute($valorDigitado)
    {
        $this->attributes['titulo'] = mb_strtoupper($valorDigitado); // Salva no banco de dados o valor do campo com letra MAIUSCULA
    }

    public function setDataPublicacaoAttribute($valorDigitado) // Mutator
    {
        $this->attributes['data_publicacao'] = Carbon::createFromFormat("d/m/Y", $valorDigitado)->format("Y-m-d");
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'noticias_categorias');
    }

}
