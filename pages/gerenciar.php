<?php
defined('CONTROL') or die('Acesso inválido');
?>

<div class="container mt-4" id="gerenciar-page">
    <h1 class="text-center text-dark mb-4" id="admin-title">Gerenciar Cadastros</h1>
    <div class="inner-container">
        <ul class="nav nav-pills justify-content-center" id="gerenciarTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="professor-tab" data-bs-toggle="pill" href="#professor" role="tab" aria-controls="professor" aria-selected="true">
                    <i class="bi bi-person-bounding-box"></i> Professor
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="aluno-tab" data-bs-toggle="pill" href="#aluno" role="tab" aria-controls="aluno" aria-selected="false">
                    <i class="bi bi-person-lines-fill"></i> Aluno
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="materia-tab" data-bs-toggle="pill" href="#materia" role="tab" aria-controls="materia" aria-selected="false">
                    <i class="bi bi-book"></i> Matéria
                </a>
            </li>
        </ul>

        <div class="tab-content mt-2 " id="gerenciarTabsContent">
            <div class="tab-pane fade show active" id="professor" role="tabpanel" aria-labelledby="professor-tab">
                <h4 class="">Professores Cadastrados</h4>
                <ul class="list-group list-group-flush" id="listaProfessores">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        João Silva
                        <div class="btn-group" role="group">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarProfessorModal" onclick="editarProfessor(1)">
                                <i class="bi bi-pencil"></i> Editar
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deletarItem('professor', 1)">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Maria Souza
                        <div class="btn-group" role="group">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarProfessorModal" onclick="editarProfessor(2)">
                                <i class="bi bi-pencil"></i> Editar
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deletarItem('professor', 2)">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="tab-pane fade" id="aluno" role="tabpanel" aria-labelledby="aluno-tab">
                <h4 class="mb-3">Alunos Cadastrados</h4>
                <ul class="list-group list-group-flush" id="listaAlunos">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Lucas Pereira
                        <div class="btn-group" role="group">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarAlunoModal" onclick="editarAluno(1)">
                                <i class="bi bi-pencil"></i> Editar
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deletarItem('aluno', 1)">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ana Oliveira
                        <div class="btn-group" role="group">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarAlunoModal" onclick="editarAluno(2)">
                                <i class="bi bi-pencil"></i> Editar
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deletarItem('aluno', 2)">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </div>
                    </li>
                </ul>
            </div>

            <<div class="tab-pane fade" id="materia" role="tabpanel" aria-labelledby="materia-tab">
                <h4 class="mb-3">Matérias Cadastradas</h4>
                <ul class="list-group list-group-flush" id="listaMaterias">
                    <!-- lista dinamica -->
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editarProfessorModal" tabindex="-1" aria-labelledby="editarProfessorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarProfessorModalLabel">Editar Professor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form id="editarProfessorForm">
                    <div class="mb-3">
                        <label for="professorNome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="professorNome" required>
                    </div>
                    <div class="mb-3">
                        <label for="professorEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="professorEmail" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editarAlunoModal" tabindex="-1" aria-labelledby="editarAlunoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarAlunoModalLabel">Editar Aluno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form id="editarAlunoForm">
                    <div class="mb-3">
                        <label for="alunoNome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="alunoNome" required>
                    </div>
                    <div class="mb-3">
                        <label for="alunoEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="alunoEmail" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editarMateriaModal" tabindex="-1" aria-labelledby="editarMateriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarMateriaModalLabel">Editar Matéria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarMateria">
                    <input type="hidden" id="materiaId">
                    <div class="mb-3">
                        <label for="materiaNome" class="form-label">Nome da Matéria</label>
                        <input type="text" class="form-control" id="materiaNome" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="salvarMateria()">Salvar</button>
            </div>
        </div>
    </div>
</div>
<style>
    body {
        background-color: #fff;
    }

    .inner-container {
        background-color: white;
        padding: 6px 10px;
        border-radius: 6px;
    }

    .nav-pills .nav-link.active {
        background-color: #f0ad4e !important;
        border-color: #f0ad4e !important;
    }

    .nav-link {
        color: #333;
    }

    .list-group-item {
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .btn-warning {
        background-color: #f0ad4e;
        border-color: #f0ad4e;
    }

    .btn-warning:hover {
        background-color: #ec971f;
        border-color: #d58512;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    function editarProfessor(id) {
        // Preencher os campos do modal com os dados do professor (dados estáticos aqui)
        if (id === 1) {
            document.getElementById('professorNome').value = 'João Silva';
            document.getElementById('professorEmail').value = 'joao@exemplo.com';
        } else {
            document.getElementById('professorNome').value = 'Maria Souza';
            document.getElementById('professorEmail').value = 'maria@exemplo.com';
        }
    }

    function editarAluno(id) {
        // Preencher os campos do modal com os dados do aluno
        if (id === 1) {
            document.getElementById('alunoNome').value = 'Lucas Pereira';
            document.getElementById('alunoEmail').value = 'lucas@exemplo.com';
        } else {
            document.getElementById('alunoNome').value = 'Ana Oliveira';
            document.getElementById('alunoEmail').value = 'ana@exemplo.com';
        }
    }

    function editarMateria(id) {
        fetch(`http://localhost:8000/api/materias/${id}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao buscar matéria');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('materiaNome').value = data.DESCRICAO;
                document.getElementById('materiaId').value = data.CODMAT; // Certifique-se de ter esse campo no modal
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Não foi possível carregar os dados da matéria.');
            });
    }

    function salvarMateria() {
        const id = document.getElementById('materiaId').value; 
        const nome = document.getElementById('materiaNome').value;

        fetch(`http://localhost:8000/api/editar/materia/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ DESCRICAO: nome }),
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao salvar matéria');
                }
                return response.json();
            })
            .then(data => {
                Swal.fire({
                    title: 'Sucesso!',
                    text: `Matéria atualizada com sucesso!`,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false,
                });
                carregarMaterias(); // Atualiza a lista de matérias
                document.getElementById('editarMateriaModal').querySelector('.btn-close').click();
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Não foi possível salvar as alterações.');
            });
    }

    function deletarMateria(id) {
        Swal.fire({
            title: 'Você tem certeza?',
            text: "Esta ação desativará a matéria.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, desativar!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`http://localhost:8000/api/editar/materia/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ STATUS: 'I' }), // Alterar status para "I"
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erro ao desativar matéria');
                        }
                        return response.json();
                    })
                    .then(data => {
                        Swal.fire({
                            title: 'Desativada!',
                            text: 'A matéria foi desativada com sucesso.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false,
                        });
                        carregarMaterias(); // Atualiza a lista de matérias
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                        Swal.fire({
                            title: 'Erro!',
                            text: 'Não foi possível desativar a matéria.',
                            icon: 'error',
                            confirmButtonText: 'Ok',
                        });
                    });
            }
        });
    }


    function deletarItem(tipo, id) {
        if (tipo == 'materia') {
            Swal.fire({
                title: 'Você tem certeza?',
                text: 'Esta ação excluirá a matéria.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, desativar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://localhost:8000/api/delete/materia/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 200) {
                                Swal.fire({
                                    title: 'Desativada!',
                                    text: 'A matéria foi desativada com sucesso.',
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false,
                                });
                                carregarMaterias(); // Atualiza a lista
                            } else {
                                Swal.fire({
                                    title: 'Erro!',
                                    text: data.message || 'Erro ao desativar a matéria.',
                                    icon: 'error',
                                    confirmButtonText: 'Ok',
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Erro:', error);
                            Swal.fire({
                                title: 'Erro!',
                                text: 'Não foi possível realizar a operação.',
                                icon: 'error',
                                confirmButtonText: 'Ok',
                            });
                        });
                }
            });
        }else{
            // Eduardo, acho que essa função não vai ser usada, é mais fácil fazer um if pra cada, pois temos só 3 tipos, e não múltiplos
            if (confirm(`Tem certeza de que deseja excluir este ${tipo}?`)) {
                // Simular exclusão no front-end
                alert(`${tipo} ${id} excluído com sucesso!`);
                // Aqui você poderia remover o item da lista com JS
            }
        }
    }

    function carregarMaterias() {
        fetch('http://localhost:8000/api/materia')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao buscar matérias');
                }
                return response.json();
            })
            .then(data => {
                const listaMaterias = document.getElementById('listaMaterias');
                listaMaterias.innerHTML = ''; // Limpar a lista atual

                data.forEach(materia => {
                    const item = document.createElement('li');
                    item.className = 'list-group-item d-flex justify-content-between align-items-center';
                    item.innerHTML = `
                        ${materia.DESCRICAO}
                        <div class="btn-group" role="group">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarMateriaModal" onclick="editarMateria(${materia.CODMAT})">
                                <i class="bi bi-pencil"></i> Editar
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deletarItem('materia', ${materia.CODMAT})">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </div>
                    `;
                    listaMaterias.appendChild(item);
                });
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Não foi possível carregar as matérias.');
            });
    }

    document.addEventListener('DOMContentLoaded', carregarMaterias);

</script>
