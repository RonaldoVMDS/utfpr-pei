<?php
defined('CONTROL') or die('Acesso inválido')

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
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingAluno1">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAluno1" aria-expanded="false" aria-controls="collapseAluno1">
                    João Silva - Análise e Desenvolvimento de Sistemas
                </button>
            </h2>
            <div id="collapseAluno1" class="accordion-collapse collapse" aria-labelledby="headingAluno1" data-bs-parent="#alunosAccordion">
                <div class="accordion-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex">
                            Ana Souza - Desenvolvimento de Software
                            <div class="ms-auto">
                                <a class="btn btn-sm">
                                    Ciente &nbsp <i class="fa-solid fa-circle-check text-success"></i>
                                </a>
                            </div>
                        </li>
                        <li class="list-group-item d-flex">
                            Carlos Andrade - Qualidade de Software
                            <div class="ms-auto">
                                <button class="btn btn-sm">
                                    Pendente &nbsp <i class="fa-solid fa-circle-exclamation text-warning"></i>
                                </button>
                            </div>
                        </li>
                        <li class="list-group-item d-flex">
                            Ruan Silva - Algoritmos
                            <div class="ms-auto">
                                <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="" onclick="setStudentId('2')">
                                    <i class="fas fa-paper-plane">&nbsp</i>Enviar PEI
                                </button>
                            </div>
                        </li>
                    </ul>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#uploadDocumentModal" onclick="setStudentId('id')">Anexar PEI</button>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingAluno2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAluno2" aria-expanded="false" aria-controls="collapseAluno2">
                    Maria Oliveira - Ciência da computação
                </button>
            </h2>
            <div id="collapseAluno2" class="accordion-collapse collapse" aria-labelledby="headingAluno2" data-bs-parent="#alunosAccordion">
                <div class="accordion-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex">
                            Beatriz Costa - Algorítmos
                            <div class="ms-auto">
                                <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="" onclick="setStudentId('2')">
                                    <i class="fas fa-paper-plane">&nbsp</i>Enviar PEI
                                </button>
                            </div>
                        </li>
                        <li class="list-group-item d-flex">
                            Ricardo Pereira - Desenvolvimento Web Cliente
                            <div class="ms-auto">
                                <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="" onclick="setStudentId('2')">
                                    <i class="fas fa-paper-plane">&nbsp</i>Enviar PEI
                                </button>
                            </div>
                        </li>
                    </ul>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#uploadDocumentModal" onclick="setStudentId('id')">Anexar PEI</button>
                </div>
            </div>
        </div>

    </div>
</div>

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
                        <label for="nomeMateriaAluno" class="form-label">Disciplina</label>
                        <select id="selectMateriaAluno" class="form-control">

                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
                        <label for="nomeMateriaProfessor" class="form-label">Disciplina</label>
                        <select id="selectMateriaProfessor" class="form-control">

                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadDocumentModal" tabindex="-1" aria-labelledby="uploadDocumentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadDocumentLabel">Anexar PEI ao Aluno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="studentId" class="form-label d-none">ID do Aluno</label>
                        <input type="text" class="form-control d-none" id="studentId" name="studentId" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="document" class="form-label">Selecione o documento (PDF)</label>
                        <input type="file" class="form-control" id="document" name="document" accept=".pdf" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Anexar Documento</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function setStudentId(id) {
        document.getElementById('studentId').value = id;
    }

    async function loadMateriasAluno() {
        try {
            var response = await fetch('http://localhost:8000/api/materia', {
                method: 'GET',
            });

            // Verifica se a resposta foi bem-sucedida
            if (!response.ok) {
                throw new Error(`Erro na requisição: ${response.status} ${response.statusText}`);
            }
            var data = await response.json();

            var selectMateriaAluno = document.getElementById('selectMateriaAluno');
            
            selectMateriaAluno.innerHTML = '';

            var defaultOption = document.createElement('option');
            defaultOption.textContent = 'Selecione uma Disciplina';
            defaultOption.value = '';
            selectMateriaAluno.appendChild(defaultOption);

            data.forEach(materia => {
                var option = document.createElement('option');
                option.value = materia.CODMAT;
                option.textContent = materia.DESCRICAO;
                selectMateriaAluno.appendChild(option);
            });
        } catch (error) {
            console.error('Erro ao carregar disciplinas:', error);
        }
    }

    async function loadMateriasProfessor() {
        try {
            var response = await fetch('http://localhost:8000/api/materia', {
                method: 'GET',
            });

            // Verifica se a resposta foi bem-sucedida
            if (!response.ok) {
                throw new Error(`Erro na requisição: ${response.status} ${response.statusText}`);
            }
            var data = await response.json();

            var selectMateriaProfessor = document.getElementById('selectMateriaProfessor');
            
            selectMateriaProfessor.innerHTML = '';

            var defaultOption = document.createElement('option');
            defaultOption.textContent = 'Selecione uma Disciplina';
            defaultOption.value = '';
            selectMateriaProfessor.appendChild(defaultOption);

            data.forEach(materia => {
                var option = document.createElement('option');
                option.value = materia.CODMAT;
                option.textContent = materia.DESCRICAO;
                selectMateriaProfessor.appendChild(option);
            });
        } catch (error) {
            console.error('Erro ao carregar disciplinas:', error);
        }
    }

    var addMateriaModal = document.getElementById('addMateriaModal');
    addMateriaModal.addEventListener('shown.bs.modal', function () {
        document.getElementById('nomeMateria').value = '';

        var descricao = document.getElementById('nomeMateria')
        descricao.classList.remove('is-invalid');

    });

    var form = document.getElementById('addMateriaForm');
    form.addEventListener('submit', async function (event) {
        event.preventDefault();

        var descricao = document.getElementById('nomeMateria').value.trim();

        // Validação: Verifica se os campos estão preenchidos
        if (!descricao) {
            var descricao = document.getElementById('nomeMateria')

            descricao.classList.add('is-invalid');
            Swal.fire({
                title: 'Campos Obrigatórios!',
                text: `Por favor, preencha os campos obrgatórios`,
                icon: 'warning',
                timer: 1500,
                showConfirmButton: false,
            });
            return; 
        }

        var data = {
            DESCRICAO: descricao,
        };

        try {
            var response = await fetch('http://localhost:8000/api/materia/cadastrar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            });

            var result = await response.json();

            if (response.ok) {
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Matéria cadastrada com sucesso!',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false,
                });

                const modal = document.getElementById('addMateriaModal');
                if (modal) {
                    modal.classList.remove('show');
                    document.body.classList.remove('modal-open');
                    const backdrop = document.querySelector('.modal-backdrop');
                    if (backdrop) backdrop.remove();
                }

            } else if (response.status === 422) {
                console.error('Erros de validação:', result.errors);

                if (result.errors.DESCRICAO) {
                    Swal.fire({
                        title: 'Atenção!',
                        text: 'Já existe uma matéria com essa descrição.',
                        icon: 'error',
                        timer: 1500,
                        showConfirmButton: false,
                    });
                }
            } else {
                console.error('Erro inesperado:', result);
                Swal.fire({
                    title: 'Atenção!',
                    text: 'Erro inesperado ao cadastrar a matéria. Tente novamente mais tarde.',
                    icon: 'error',
                    timer: 1500,
                    showConfirmButton: false,
                });
            }
        } catch (error) {
            console.error('Erro na requisição:', error);
            Swal.fire({
                title: 'Atenção!',
                text: 'Erro ao tentar cadastrar a matéria. Por favor, tente novamente.',
                icon: 'error',
                timer: 1500,
                showConfirmButton: false,
            });
        }
    });


    document.addEventListener('DOMContentLoaded', loadMateriasAluno);
    document.addEventListener('DOMContentLoaded', loadMateriasProfessor);

</script>