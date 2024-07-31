<?php ?>
<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Teste Umentor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6ac77c14e0.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Lista de Usuários Cadastrados</h2>

        <div class="row mb-3">
            <div class="d-grid gap-2 d-md-block">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#inserUserModal"
                    id="addUserModalBtn">
                    <i class="fa-solid fa-plus"></i> Adicionar Usuário
                </button>
                <button class="btn btn-secondary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
                    <i class="fa-solid fa-filter"></i> Filtrar
                </button>
            </div>
        </div>
        
        <div class="collapse" id="collapseFilter">
            <div class="card card-body mb-3">
                <form class="row" id="filter-form">
                    <h6 class="text-center text-danger">Basta preencher ou selecionar e o filtro será aplicado automaticamente.</h6>
                    <hr>
                    <div class="col-sm-12 col-md-4 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control filter-fields" name="email" oninput="filter()">
                    </div>
                    <div class="col-sm-12 col-md-3 mb-3">
                        <label for="situacao" class="form-label">Situação</label>
                        <select class="form-select filter-fields" name="situacao" onchange="filter()">
                            <option value="*">Qualquer</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-3 mb-3">
                        <label for="data_admissao" class="form-label">Data de Admissão</label>
                        <input type="date" class="form-control filter-fields" name="data_admissao" onchange="filter()">
                    </div>
                    <div class="col-sm-12 col-md-2 mb-3 d-grid gap-2">
                        <button class="btn btn-primary" type="button" onclick="clearFilter()">
                            <i class="fa-solid fa-erase"></i> Limpar Filtro
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <table id="users_list" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Situação</th>
                    <th>Dt. Emissão</th>
                    <th>Cadastro em</th>
                    <th>Atualizado em</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <div class="modal fade" id="inserUserModal" tabindex="-1" aria-labelledby="inserUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="form_user">
                    <div class="modal-header">
                        <h5 class="modal-title">Registro de Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <input hidden id="id" name="id">
                        <div class="col-sm-12 col-md-7 mb-3">
                            <label for="nome" class="form-label">Nome <small class="text-danger">*</small></label>
                            <input type="text" class="form-control validate-field" id="nome" name="nome" required>
                            <div class="invalid-feedback">Campo Obrigatório.</div>
                        </div>
                        <div class="col-sm-12 col-md-5 mb-3">
                            <label for="situacao" class="form-label">Situação <small class="text-danger">*</small></label>
                            <select class="form-select validate-field" id="situacao" name="situacao" required>
                                <option selected disabled>Selecione...</option>
                                <option value="Ativo">Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                            <div class="invalid-feedback">Seleção Obrigatória.</div>
                        </div>
                        <div class="col-sm-12 col-md-7 mb-3">
                            <label for="email" class="form-label">Email <small class="text-danger">*</small></label>
                            <input type="email" class="form-control validate-field" id="email" name="email" required>
                            <div class="invalid-feedback">Campo Obrigatório.</div>
                        </div>
                        <div class="col-sm-12 col-md-5 mb-3">
                            <label for="data_admissao" class="form-label">Data de Admissão <small class="text-danger">*</small></label>
                            <input type="date" class="form-control validate-field" id="data_admissao" name="data_admissao" required>
                            <div class="invalid-feedback">Necessário informar a data de admissão.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelBtnModal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="addUserBtn">Gravar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/global.js"></script>

    <script>
        // Chama a função para buscar dados via AJAX
        updateUsersTable();

        //Chama função para validar formulário
        formValidate();

        //Cria função para controlar botão de envio de dados de novo usuario e atualizações
        document.querySelector('#addUserBtn').addEventListener("click", function (){
            addUserButtonControl();
        });
    </script>
</body>
</html>