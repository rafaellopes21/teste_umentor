//Função que chama a API de listagem de usuários
function updateUsersTable() {
    let tableUser = '#users_list';
    if ($.fn.dataTable.isDataTable(tableUser)) {
        $(tableUser).DataTable().destroy();
    }

    $.ajax({
        url: '/api/users',
        method: 'GET',
        dataType: 'json',

        success: function(data) {
            let tbody = $('#users_list tbody');
            tbody.empty();

            if(data.error){
                showSwalAlert('Erro!', data.message, 'error', 'Ok');
                return false;
            }

            data['response'].forEach(function(user) {
                tbody.append(`
                    <tr>
                        <td>${user.id}</td>
                        <td>${user.nome}</td>
                        <td>${user.email}</td>
                        <td>${user.situacao}</td>
                        <td>${user.data_admissao}</td>
                        <td>${user.created_at}</td>
                        <td>${user.updated_at}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button class="btn btn-primary" type="button" title="Editar" onclick="editUser(${user.id})">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn btn-danger" type="button" title="Excluir" onclick="deleteUser(${user.id})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>`
                );
            });

            formatTable(tableUser);
        },
        error: function(xhr, status, error) {
            showSwalAlert('Erro!', 'Não foi possível carregar os dados.', 'error', 'Ok');
        }
    });
}

//Função responsável por formatar a tabela (Datatable)
function formatTable(tableUsers){
    $(tableUsers).DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "lengthChange": false,
        "pageLength": 10,
        "language": {
            "lengthMenu": "Exibir _MENU_ registros por página",
            "zeroRecords": "Nada Registrado",
            "infoEmpty": "Nenhum registro encontrado",
            "infoFiltered": "(_MAX_ registros no total foram filtrados)",
            "info": "Exibindo página _PAGE_ de _PAGES_",
            "search": "Buscar:",
            "paginate": {
                "first": "Primeiro",
                "last": "Último",
                "next": "Próximo",
                "previous": "Anterior"
            }
        }
    });
}

//Função responsável por validar os dados do formulário
function formValidate(){
    let fields = document.querySelectorAll('.validate-field');

    fields.forEach(field => {
        field.addEventListener("blur", function (){
            validateField(field);
        });
        field.addEventListener("change", function (){
            validateField(field);
        });
    });
}

//Função responsável por adicionar validadores nos inputs de formulário
function validateField(field){
    field.classList.remove("is-valid");
    field.classList.remove("is-invalid");

    if(field.value.trim().length > 0 && field.value != "Selecione..."){
        field.classList.add("is-valid");
        return true;
    } else {
        field.classList.add("is-invalid");
        return false;
    }
}

//Função para controlar o botão de enviar formulário
function addUserButtonControl(){
    let formFields = document.querySelectorAll('#form_user [required]');
    let filledCount = 0;

    formFields.forEach(field => {
        filledCount = validateField(field) ? filledCount + 1 : filledCount - 1;
    });

    //Se os campos estiverem preenchidos corretamente salva no servidor, caso contrário erro em tela
    if(filledCount !== formFields.length){
        showSwalAlert('Ops!', 'Alguns campos precisam ser revistos.', 'error', 'Verificar');
    } else {
        $.ajax({
            url: '/api/user/insert',
            type: 'POST',
            data: new FormData(document.querySelector('#form_user')),
            contentType: false,
            processData: false,
            success: function(data) {
                //Se não ocorrer erros, atualiza a tabela e limpa os dados
                if(!data.error){
                    showSwalAlert('Sucesso!', data.message, 'success', 'Ok');
                    updateUsersTable();
                    formFields.forEach(field => {
                        if(field.nodeName == "SELECT"){
                            field.selectedIndex = 0;
                        } else {
                            field.value = "";
                        }
                        field.classList.remove("is-valid");
                    });
                    document.querySelector("#cancelBtnModal").click();
                } else {
                    showSwalAlert('Ops!', data.message ?? "Um erro inesperado ocorreu!", 'error', 'Ok');
                }
            },
            error: function(xhr, status, error) {
                showSwalAlert('Erro!', 'Ocorreu um erro ao enviar os dados.', 'error', 'Ok');
            }
        });
    }
}

//Função responsável por editar o registro na tabela
function editUser(id){
    console.log(id);
}

//Função responsável por excluir o registro da tabela
function deleteUser(id){
    Swal.fire({
        title: "Cuidado!",
        text: "Tem certeza que deseja excluir este usuário?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/api/user/delete/'+id,
                type: 'POST',
                success: function(data) {
                    if(!data.error){
                        showSwalAlert('Excluído!', data.message, 'success', 'Ok');
                        updateUsersTable();
                    } else {
                        showSwalAlert('Ops!', data.message ?? "Um erro inesperado ocorreu ao excluir!", 'error', 'Ok');
                    }
                },
                error: function(xhr, status, error) {
                    showSwalAlert('Erro!', 'Ocorreu um erro ao excluir o registro.', 'error', 'Ok');
                }
            });
        }
    });
}

//Função responsável por exibir mensagens do SwalAlert em tela
function showSwalAlert(title, text, icon, btnName){
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonText: btnName
    });
}