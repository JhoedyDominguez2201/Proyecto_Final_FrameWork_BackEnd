<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $table = "participants";
    protected $fillable = [
        'nombres',
        'apellidopaterno',
        'apellidomaterno',
        'genero',
        'email'
    ];

    //Relacion muchos a muchos
    public function eventos()
    {
        return $this->belongsToMany(Task::class);
    }
}
