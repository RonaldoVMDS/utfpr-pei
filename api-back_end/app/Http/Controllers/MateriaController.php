<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){
        try {
            $validated = $request->validate([
                'DESCRICAO' => 'required|max:100|unique:materias,DESCRICAO',
                'STATUS' => 'nullable|in:A,I',
            ]);

            $materia = Materia::create($validated);
            return response()->json(['message' => 'Cadastro bem-sucedido!', "status"=> 200], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        }
    }


    public function getMaterias() {
        try {
            $materias = Materia::where('STATUS', 'A')->get(['CODMAT', 'DESCRICAO']);
            return response()->json($materias);    
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao obter as materias'], 500);
        }
    }

    public function getMateriaById($id){
        try {
            $materia = Materia::findOrFail($id);
            return response()->json($materia, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Matéria não encontrada.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar a matéria.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id){
        try {
            $validated = $request->validate([
                'DESCRICAO' => 'required|max:100|unique:materias,DESCRICAO,' . $id. ',CODMAT',
                'STATUS' => 'nullable|in:A,I',
            ]);
    
            $materia = Materia::findOrFail($id);
            $materia->update($validated);
    
            return response()->json(['message' => 'Atualização bem-sucedida!', "status" => 200], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar a matéria.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($id){
        try {
            $materia = Materia::findOrFail($id);

            $materia->update(['STATUS' => 'I']);

            return response()->json(['message' => 'Matéria desativada com sucesso!', "status" => 200], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Matéria não encontrada.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao desativar a matéria.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        //
    }
}
