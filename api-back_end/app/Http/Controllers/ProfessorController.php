<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $professores = Professor::all();
            return response()->json($professores, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao listar professores'], 500);
        }
    }


    public function getProfessores()
    {
        try {
            $professores = Professor::where('STATUS', 'A')->get(['CODPROF', 'NOME', 'EMAIL']);
            return response()->json($professores);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao obter professores'], 500);
        }
    }
    public function getProfessorById($id)
    {
        try {
            $professor = Professor::findOrFail($id);
            return response()->json($professor, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Professor não encontrado.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar o professor.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'NOME' => 'required|max:100|unique:professors,NOME',
            'EMAIL' => 'required|email|max:250|unique:professors,EMAIL',
            'STATUS' => 'nullable|in:A,I',
            'CODMAT' => 'nullable|exists:materias,CODMAT'
        ]);

        try {
            $professor = Professor::create($validated);
            return response()->json($professor, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao adicionar professor'], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);

        $validated = $request->validate([
            'NOME' => 'required|max:100|unique:professors,NOME,' . $id . ',CODPROF',
            'EMAIL' => 'required|email|max:250|unique:professors,EMAIL,' . $id . ',CODPROF',
            'STATUS' => 'nullable|in:A,I',
            'CODMAT' => 'nullable|exists:materias,CODMAT'
        ]);

        try {
            $professor->update($validated);
            return response()->json($professor, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar professor'], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $professor = Professor::findOrFail($id);

            $professor->update(['STATUS' => 'I']);

            return response()->json(['message' => 'Professor desativado com sucesso!', "status" => 200], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Professor não encontrado.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao desativar o professor.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
