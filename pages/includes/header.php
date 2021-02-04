<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="site de republicas">
    <meta name="author" content="devxyz">

    <title>DevRepublicas</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/logo.png" />

    <!-- Bootstrap CSS atualizado -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Fontes customs -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <!-- CSS customizado compactado -->
    <link href="../css/devrep.min.css" rel="stylesheet">
    <link rel="text/css" href="../css/estilo.css">


    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="../css/principal.css">

</head>

<body id="page-top">

    <?php
        $page_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $path = parse_url($page_url, PHP_URL_PATH); 
        if(strpos($path, "login") || strpos($path, "Excluir")){
            return;
        }
    ?>

    <!-- Cabecalho -->
    <a class="menu-toggle rounded" href="">
        <i class="fas fa-bars"></i>
    </a>

    <div class="row fixed-top" style="margin-left: 1vw; margin-top:1vh; z-index: 50;">
        <div class="col-dm-4">
            <div class="col-dm-6 float-left">
                <?php
                    if($_SESSION['user']=='admin'){
                        echo "<img  width='50' height='50' name='userPhoto' id='userPhoto' class='rounded-circle' src='../img/admin.png'/>";
                    }else{
                        echo "<img  width='50' height='50' name='userPhoto' id='userPhoto' class='rounded-circle' style='object-fit: cover;' src='../img/users/$objMorador->foto?'/>";
                    }
                ?>
            </div>
        </div>
        <div class="col-md-6 float-right">
            <button onclick="javascript: location.href='plugins/logout';">
                <i class="fas fa-sign-out-alt" style="font-size:48px;color:red;"></i>
            </button>
        </div>
    </div>
    <nav id="sidebar-wrapper" style="z-index: 100;">
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item" >
                <a class="js-scroll-trigger" href="index">Dev Republicas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" id="navbarDropdown" >
                    Moradores
                </a>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="moradorForm">Cadastro</a></li>
                </ul>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="moradorTabela">Tabela</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" id="navbarDropdown" >
                    Tipos de contas
                </a>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="tipoContaForm">Cadastro</a></li>
                </ul>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="tipoContaTabela">Tabela</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" id="navbarDropdown" >
                    Contas
                </a>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="contaForm">Cadastro</a></li>
                </ul>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="contaTabela">Tabela</a></li>
                </ul>
            </li>
            <li>
                <p class="fixed-bottom" style="color: white; margin-left: 0.5vw;">
                    Deseja fazer logout? Clique <u><a href="javascript: location.href='plugins/logout';">aqui</a></u> ou no botão no <strong>canto superior esquerdo</strong>
                </p>
            </li>
        </ul>
    </nav>