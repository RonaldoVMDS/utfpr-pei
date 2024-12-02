<?php
defined('CONTROL') or die('Acesso inválido');
?>
<div class="container" id="home-page">
    <h1 class="text-center my-2 text-dark" id="admin-title">Painel de Alunos</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="?route=gerenciar" class="btn btn-info me-2">Gerenciar</a>
        <button class="btn btn-dark me-2" data-bs-toggle="modal" data-bs-target="#addMateriaModal"><strong>+</strong> Matéria</button>
        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addAlunoModal"><strong>+</strong> Aluno</button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProfessorModal"><strong>+</strong> Professor</button>
    </div>

    <div class="accordion" id="alunosAccordion">
        <!-- Alunos serão carregados dinamicamente -->
    </div>
</div>

<!-- Modal: Adicionar Aluno -->
<div class="modal fade" id="addAlunoModal" tabindex="-1" aria-labelledby="addAlunoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAlunoModalLabel">Adicionar Aluno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nomeAluno" class="form-label">Nome do Aluno</label>
                        <input type="text" class="form-control" id="nomeAluno" placeholder="Insira o nome do aluno">
                    </div>
                    <div class="mb-3">
                        <label for="selectMateriaAluno" class="form-label">Disciplina</label>
                        <select id="selectMateriaAluno" class="form-control"></select>
                    </div>
                    <button type="submit" class="btn btn-warning" id="btnAddAluno">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Adicionar Matéria -->
<div class="modal fade" id="addMateriaModal" tabindex="-1" aria-labelledby="addMateriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMateriaModalLabel">Adicionar Matéria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addMateriaForm">
                    <div class="mb-3">
                        <label for="nomeMateria" class="form-label">Nome da Matéria</label>
                        <input type="text" class="form-control" id="nomeMateria" placeholder="Insira o nome da Matéria">
                    </div>
                    <button type="submit" id="btnAddMateria" class="btn btn-warning">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Adicionar Professor -->
<div class="modal fade" id="addProfessorModal" tabindex="-1" aria-labelledby="addProfessorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProfessorModalLabel">Adicionar Professor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nomeProfessor" class="form-label">Nome do Professor</label>
                        <input type="text" class="form-control" id="nomeProfessor" placeholder="Insira o nome do professor">
                    </div>
                    <div class="mb-3">
                        <label for="emailProfessor" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailProfessor" placeholder="Insira o e-mail">
                    </div>
                    <div class="mb-3">
                        <label for="selectMateriaProfessor" class="form-label">Disciplina</label>
                        <select id="selectMateriaProfessor" class="form-control"></select>
                    </div>
                    <button type="submit" class="btn btn-warning" id="btnAddProfessor">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Funções para carregar dados dinâmicos
    async function loadMaterias(selectElementId) {
        try {
            var response = await fetch('http://localhost:8000/api/materia');
            if (!response.ok) throw new Error('Erro ao carregar matérias.');

            var data = await response.json();
            var select = document.getElementById(selectElementId);
            select.innerHTML = '<option value="">Selecione uma Disciplina</option>';
            data.forEach(materia => {
                var option = document.createElement('option');
                option.value = materia.CODMAT;
                option.textContent = materia.DESCRICAO;
                select.appendChild(option);
            });
        } catch (error) {
            console.error('Erro:', error);
        }
    }

    async function loadAlunos() {
        try {
            var response = await fetch('http://localhost:8000/api/alunos'); // Alteração aqui
            if (!response.ok) throw new Error('Erro ao carregar alunos.');

            var data = await response.json();
            var accordion = document.getElementById('alunosAccordion');
            accordion.innerHTML = '';
            data.forEach(aluno => {
                var item = `
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button">
                            ${aluno.NOME} - ${aluno.STATUS === 'A' ? 'Ativo' : 'Inativo'}
                        </button>
                    </h2>
                </div>`;
                accordion.innerHTML += item;
            });
        } catch (error) {
            console.error('Erro ao carregar alunos:', error);
        }
    }

    document.querySelector('#addAlunoModal form').addEventListener('submit', async function(event) {
        event.preventDefault();

        var nomeAluno = document.getElementById('nomeAluno').value.trim();
        var codMateria = document.getElementById('selectMateriaAluno').value;

        if (!nomeAluno || !codMateria) {
            Swal.fire('Erro!', 'Preencha todos os campos obrigatórios.', 'warning');
            return;
        }

        try {
            var response = await fetch('http://localhost:8000/api/alunos', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    NOME: nomeAluno,
                    CODMAT: codMateria
                })
            });

            if (response.ok) {
                Swal.fire('Sucesso!', 'Aluno adicionado com sucesso!', 'success');
                loadAlunos();
            } else {
                Swal.fire('Erro!', 'Não foi possível adicionar o aluno.', 'error');
            }
        } catch (error) {
            console.error('Erro:', error);
            Swal.fire('Erro!', 'Erro na comunicação com o servidor.', 'error');
        }
    });

    async function loadProfessores() {
        // Similar à função `loadAlunos` para carregar professores
    }

    // Lidar com envios de formulários
    document.querySelector('#addMateriaForm').addEventListener('submit', async function(event) {
        event.preventDefault();
        var descricao = document.getElementById('nomeMateria').value.trim();
        if (!descricao) {
            Swal.fire('Erro!', 'Preencha o nome da matéria.', 'warning');
            return;
        }

        try {
            var response = await fetch('http://localhost:8000/api/materia/cadastrar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    DESCRICAO: descricao
                })
            });

            if (response.ok) {
                Swal.fire('Sucesso!', 'Matéria cadastrada com sucesso!', 'success');
                loadMaterias('selectMateriaAluno');
                loadMaterias('selectMateriaProfessor');
            } else {
                Swal.fire('Erro!', 'Não foi possível cadastrar a matéria.', 'error');
            }
        } catch (error) {
            console.error('Erro:', error);
            Swal.fire('Erro!', 'Erro na comunicação com o servidor.', 'error');
        }
    });
    document.querySelector('#addProfessorModal form').addEventListener('submit', async function(event) {
        event.preventDefault();

        var nomeProfessor = document.getElementById('nomeProfessor').value.trim();
        var emailProfessor = document.getElementById('emailProfessor').value.trim();
        var codMateria = document.getElementById('selectMateriaProfessor').value;

        if (!nomeProfessor || !emailProfessor || !codMateria) {
            Swal.fire('Erro!', 'Preencha todos os campos obrigatórios.', 'warning');
            return;
        }

        try {
            var response = await fetch('http://localhost:8000/api/professores/cadastrar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    NOME: nomeProfessor,
                    EMAIL: emailProfessor,
                    CODMAT: codMateria,
                    STATUS: 'A' 
                })
            });

            if (response.ok) {
                Swal.fire('Sucesso!', 'Professor adicionado com sucesso!', 'success');
                loadProfessores();
            } else {
                Swal.fire('Erro!', 'Não foi possível adicionar o professor.', 'error');
            }
        } catch (error) {
            console.error('Erro:', error);
            Swal.fire('Erro!', 'Erro na comunicação com o servidor.', 'error');
        }
    });


    // Inicializar dados ao carregar a página
    document.addEventListener('DOMContentLoaded', () => {
        loadMaterias('selectMateriaAluno');
        loadMaterias('selectMateriaProfessor');
        loadAlunos();
        loadProfessores();
    });
</script>