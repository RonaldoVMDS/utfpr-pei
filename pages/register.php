<?php
// Código PHP do register.php
defined('CONTROL') or die('Acesso inválido');
$error = null;  // Variável para armazenar erro

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../inc/apiConsumer.js"></script> <!-- Link do seu arquivo JS -->
    <link rel="stylesheet" href="../css/styles.css">
    <title>UTFPR - Cadastro</title>
</head>

<body>
    <section class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container">
            <script>
                async function handleRegister(event) {
                    event.preventDefault();

                    const user = document.getElementById('user').value;
                    const email = document.getElementById('email').value;
                    const password = document.getElementById('password').value;

                    const result = await register(user, password, email);

                    if (result.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sucesso!',
                            text: result.message,
                            confirmButtonColor: '#198754',
                        }).then(() => {
                            window.location.href = '?route=login';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            text: result.message,
                            confirmButtonColor: '#dc3545',
                        });
                    }
                }
            </script>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border border-light-subtle rounded-3 shadow">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-3">
                                <a href="#">
                                    <img src="../img/UTFPR_logo.png" alt="Logo UTFPR" width="250" height="96">
                                </a>
                            </div>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Olá, por favor, crie uma conta para começar</h2>
                            <form onsubmit="handleRegister(event)" class="mb-2">
                                <div class="row gy-2 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="user" id="user" placeholder="nome" required>
                                            <label for="user" class="form-label">Usuário</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="nome@exemplo.com" required>
                                            <label for="email" class="form-label">E-mail</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Senha" required>
                                            <label for="password" class="form-label">Senha</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-warning btn-md text-white" type="submit">Cadastrar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <a href="?route=login" class="text-secondary auth-link-custom"><small>Já tem uma conta? Entre por aqui!</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>