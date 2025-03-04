<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'completed', 'user_id'];  // Asegúrate de incluir 'user_id'

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);  // Una tarea pertenece a un usuario
    }
}
