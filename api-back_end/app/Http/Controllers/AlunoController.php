<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Aluno::all(), 200);
    }

    public function getAlunos()
    {
        try {
            $aluno = Aluno::where('STATUS', 'A')->get(['CODALU', 'NOME', 'EMAIL']);
            return response()->json($aluno);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao obter aluno'], 500);
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
            'NOME' => 'required|max:100|unique:alunos,NOME',
            'RA' => 'nullable|max:7|unique:alunos,RA',
            'STATUS' => 'nullable|in:A,I',
            'EMAIL' => 'nullable|email|max:250',
        ]);

        $aluno = Aluno::create($validated);

        return response()->json($aluno, 201);
    }

    /**
     * Display the specified resource.
     */
    public function getAlunoById($id)
    {
        try {
            $aluno = Aluno::findOrFail($id);
            return response()->json($aluno, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'aluno não encontrado.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar o aluno.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        $validated = $request->validate([
            'NOME' => 'required|max:100|unique:alunos,NOME,' . $id . ',CODALU',
            'RA' => 'nullable|max:7|unique:alunos,RA,' . $id . ',CODALU',
            'STATUS' => 'nullable|in:A,I',
            'EMAIL' => 'nullable|email|max:250',
        ]);

        $aluno->update($validated);
        return response()->json($aluno, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $aluno = Aluno::findOrFail($id);

            $aluno->update(['STATUS' => 'I']);

            return response()->json(['message' => 'aluno desativado com sucesso!', "status" => 200], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'aluno não encontrado.',
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao desativar o aluno.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
