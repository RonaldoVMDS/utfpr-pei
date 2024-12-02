<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\GesusuController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;

// Alunos
Route::get('alunos', [AlunoController::class, 'getAlunos']);
Route::get('alunos/{id}', [AlunoController::class, 'getAlunoById']);
Route::post('alunos/cadastrar', [AlunoController::class, 'create']);
Route::post('editar/alunos/{id}', [AlunoController::class, 'edit']);
Route::post('delete/alunos/{id}', [AlunoController::class, 'delete']);

// Professores
Route::get('professores', [ProfessorController::class, 'getProfessores']);
Route::get('professores/{id}', [ProfessorController::class, 'getProfessorById']);
Route::post('professores/cadastrar', [ProfessorController::class, 'create']);
Route::post('editar/professores/{id}', [ProfessorController::class, 'edit']);
Route::post('delete/professores/{id}', [ProfessorController::class, 'delete']);

// Matérias
Route::get('materia', [MateriaController::class, 'getMaterias']);
Route::get('materias/{id}', [MateriaController::class, 'getMateriaById']);
Route::post('materia/cadastrar', [MateriaController::class, 'create']);
Route::post('editar/materia/{id}', [MateriaController::class, 'edit']);
Route::post('delete/materia/{id}', [MateriaController::class, 'delete']);

// Usuários
Route::post('usuarios/login', [GesusuController::class, 'login']);
Route::post('usuarios/cadastrar', [GesusuController::class, 'create']);

// Middleware para rotas protegidas
Route::middleware('auth')->group(function () {
    // Rotas protegidas aqui
});
