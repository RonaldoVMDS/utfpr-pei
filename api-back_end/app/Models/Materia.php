<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materia extends Model
{
    use HasFactory, HasApiTokens;
    
    protected $table = 'materias';
    protected $primaryKey = 'CODMAT';
    protected $fillable = ['DESCRICAO', 'STATUS'];
}
