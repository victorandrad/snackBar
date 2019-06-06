<?php
include('controles/session.php');

$query = "SELECT * FROM cardapio";
$result = mysqli_query($db, $query);

$query2 = "SELECT * FROM cardapio";
$result2 = mysqli_query($db, $query2);

function categoria($is)
{
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die("Erro ao conectar ao banco");
    mysqli_set_charset($db, 'utf8');
    $query = "SELECT * FROM categoria WHERE id = '" . $is . "'";
    $result = mysqli_query($db, $query);
    $res = mysqli_fetch_assoc($result);
    return $res['nome'];
}

?>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teste Back-End NanoIncub</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/template.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand">Snack Bar - Painel</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> Bem-vindo <?php echo $login_session ?> <i
                            class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">

                    <li><a href="index.php"><i class="fa fa-backward fa-fw"></i> Voltar</a>
                    <li><a href="controles/logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-product-hunt fa-fw"></i> Produtos</a>
                    </li>
                </ul>
            </div>

        </div>

    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <div class="col-lg-9">Produtos</div>
                    <a class="btn btn-lg btn-primary btn-xl" data-backdrop="static" data-toggle="modal"
                       data-target="#novo_produto"><i class="fa fa-plus"></i> Cadastrar Produto</a></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <input id="nome_produto" class="form-control" placeholder="Nome do Produto">
            </div>
            <div class="col-lg-2">
                <button id="search" type="button" class="btn btn-primary">Pesquisar</button>
            </div>
        </div>

        <div class="panel-body">
            <table id="tabelas" width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row1 = mysqli_fetch_array($result2)) { ?>
                    <tr>
                        <td><?php echo $row1['cod_produto']; ?></td>
                        <td><?php echo $row1['nome_produto']; ?></td>
                        <td><?php echo 'R$ ' . number_format(substr(preg_replace('/[^\d+]/', null, $row1['valor_prod']), 0, -2), 2, ',', '.'); ?></td>
                        <td>
                            <div class="tooltip-tabela">
                                <button type="button" class="btn btn-primary" data-tt="tooltip" data-toggle="modal"
                                        data-target="#modalEdita" data-placement="top" title="Editar"
                                        data-idp="<?php echo $row1['cod_produto']; ?>"
                                        data-nomep="<?php echo $row1['nome_produto']; ?>"
                                        data-precop="<?php echo number_format(substr(preg_replace('/[^\d+]/', null, $row1['valor_prod']), 0, -2), 2, ',', '.'); ?>"
                                        data-quantidadep="<?php echo $row1['quantidade']; ?>"
                                        data-datap="<?php echo $row1['data_alteracao']; ?>"><i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-tt="tooltip" data-toggle="modal"
                                        data-target="#modalDeleta" data-placement="top" title="Deletar"
                                        data-idp="<?php echo $row1['cod_produto']; ?>"><i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="novo_produto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Novo Produto</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="controles/novo_produto.php">

                    <div class="row">
                        <div class="col-lg-6">
                            <input class="form-control" name="nome_produto" placeholder="Nome do Produto">
                        </div>
                    </div>
                    <div class="row"><p></p></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <input id="preco" class="form-control dinheiro" name="preco_produto"
                                   placeholder="Preço do produto">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row">

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary" onClick="location.href=location.href">Salvar
                        </button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Produto</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="controles/edita_produto.php">

                    <div class="row">
                        <div class="col-lg-6">
                            <input class="form-control" name="id_produto" type="hidden" id="id-pd">
                            <input class="form-control" name="nome_produto" placeholder="Nome do Produto" id="nome-pd">
                        </div>
                    </div>
                    <div class="row"><p></p></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <input id="preco-pd" class="form-control dinheiro" name="preco_produto"
                                   placeholder="Preço do produto">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row">

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDeleta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Deletar Produto</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="controles/apaga_produto.php">
                    <input name="id" type="hidden" class="form-control" id="id-prod">
                    Tem certeza que deseja excluir esse registro?

            </div>

            <div class="modal-footer">
                <a class="btn btn-danger" data-dimiss="close" aria-hidden="true"
                   onclick="$('#modalDeleta').modal('hide')">Não</a>
                <button type="submit" class="btn btn-success">Sim</button>

            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.mask.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

<script>
    $(document).ready(function () {
        var tables = $('#tabelas').DataTable({
            "oLanguage": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Mostrando _MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });

        $('#search').click(function () {
            var dropdown = document.getElementById("categoria");

            var textinput = document.getElementById("nome_produto").value;

            tables.columns(1).search(textinput, true, false).draw();
        });
        $('.dinheiro').mask('#.##0,00', {reverse: true});
        $('.quantidade').mask('#', {reverse: true});
    });
</script>

<script>
    $("[data-tt=tooltip]").tooltip();
    // tooltip demo
    $('.tooltip-tabela').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    // popover demo
    $("[data-toggle=popover]")
        .popover()
</script>

<script>
    $('#modalEdita').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('idp');
        var nome = button.data('nomep');
        var categoria = button.data('categoriap');
        var preco = button.data('precop');
        var quantidade = button.data('quantidadep');

        var modal = $(this);
        modal.find('#id-pd').val(id);
        modal.find('#nome-pd').val(nome);
        modal.find('#categoria-pd').val(categoria);
        modal.find('#preco-pd').val(preco);
        modal.find('#quantidade-pd').val(quantidade);

    });
    $('#modalDeleta').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('idp');

        var modal = $(this);
        modal.find('#id-prod').val(id);
    });
</script>

</body>

</html>
