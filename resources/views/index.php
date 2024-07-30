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
    <link href="assets/css/global.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6ac77c14e0.js" crossorigin="anonymous"></script>
</head>
<body>

    <h1>Hello World</h1>
    <div class="container mt-5">
        <h2 class="mb-4">Tabela Responsiva com Paginação</h2>
        <table id="example" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>João</td>
                <td>joao@example.com</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Maria</td>
                <td>maria@example.com</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Carlos</td>
                <td>carlos@example.com</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Ana</td>
                <td>ana@example.com</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pedro</td>
                <td>pedro@example.com</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Lucas</td>
                <td>lucas@example.com</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Fernanda</td>
                <td>fernanda@example.com</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Mateus</td>
                <td>mateus@example.com</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Beatriz</td>
                <td>beatriz@example.com</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Júlia</td>
                <td>julia@example.com</td>
            </tr>
            <tr>
                <td>11</td>
                <td>Rafael</td>
                <td>rafael@example.com</td>
            </tr>
            <tr>
                <td>12</td>
                <td>Gabriel</td>
                <td>gabriel@example.com</td>
            </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/libs/jquery/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/global.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthChange": false,
                "pageLength": 10,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado - desculpe",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primeiro",
                        "last": "Último",
                        "next": "Próximo",
                        "previous": "Anterior"
                    }
                }
            });


            Swal.fire({
                title: 'Bem-vindo!',
                text: 'Sua tabela foi carregada com sucesso.',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        });
    </script>
</body>
</html>