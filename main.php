<?php

	$tokenUsuario = sha1(sha1('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));

    if(isset($_GET['loggout'])) {
        Cliente::loggout();
    }else if($_SESSION['token'] != $tokenUsuario) {
        Cliente::loggout();
    }

?>

<!DOCTYPE html>
<html>
<head>
    <base base="<?php echo INCLUDE_PATH_PORTAL; ?>" />
	<link rel="icon" href="<?php echo INCLUDE_PATH_PORTAL ?>favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ESTILO -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PORTAL ?>css/style.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PORTAL ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PORTAL ?>css/responsivo.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PORTAL ?>css/datatables.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PORTAL ?>css/mCustomScrollbar.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- JAVASCRIPT -->
    <script src="<?php echo INCLUDE_PATH_PORTAL ?>js/jquery.min.js"></script>
    <script src="<?php echo INCLUDE_PATH_PORTAL ?>js/bootstrap.min.js"></script>
    <script src="<?php echo INCLUDE_PATH_PORTAL ?>js/datatables.js"></script>
    <script src="<?php echo INCLUDE_PATH_PORTAL ?>js/constants.js"></script>

	<title>Portal | PLL</title>
</head>
<body>    

    <div class="overlay-loading">
        <img src="<?php echo INCLUDE_PATH_PORTAL ?>loader/loader-200.gif" />
    </div><!--overlay-loading-->

        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <div class="box-usuario">
    				<div class="avatar-usuario">
    					<i style="font-size: 35px; margin-top: 30%; margin-left: 33%;" class="fa fa-user"></i>
    				</div><!--avatar-usuario-->
                </div><!--box-usuario-->
            </div>

            <ul class="list-unstyled components">

                <p><?php echo $_SESSION['nome']; ?></p>

                <li>
                    <a href="#relatorioMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i style="margin-right: 5px;" class="fas fa-chart-area"></i>  RELATÓRIOS</a>
                    <ul class="collapse list-unstyled" id="relatorioMenu">
                        <li>
                            <a href="<?php echo INCLUDE_PATH_PORTAL ?>buscar-ticket">Tícket Médio</a>
                        </li>
                        <li>
                            <a href="<?php echo INCLUDE_PATH_PORTAL ?>top-ticket">Top 100</a>
                        </li>
                    </ul>
                </li>                
            </ul><!-- list-unstyled components -->

            <div class="itens-menu-sidebar float-left">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH_PORTAL ?>home"><i class="fas fa-home" title="Home"></i></a></li>
                    <li><a href="<?php echo INCLUDE_PATH_PORTAL ?>?loggout"><i title="Sair" class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </div><!--itens-menu-sidebar-->

            <ul class="list-unstyled CTAs">
                <li>
                    <img src="<?php echo INCLUDE_PATH_PORTAL ?>imagens/logo-pll.png">
                </li>
            </ul><!-- list-unstyled CTAs -->
        </nav>

        <div id="content">
            <nav class="navbar fixed-top">                

                <div class="menu-img">
                    <img class="float-left" src="<?php echo INCLUDE_PATH_PORTAL ?>imagens/logo-pll.png">

                    <button type="button" id="sidebarCollapse" class="btn btn-info float-right">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                </div><!--menu-img-->

                <div class="itens-menu float-left">
                    <ul>
                        <li><a href="<?php echo INCLUDE_PATH_PORTAL ?>home"><i title="Home" class="fas fa-home"></i></a></li>
                        <li><a href="<?php echo INCLUDE_PATH_PORTAL ?>?loggout"><i title="Sair" class="fas fa-sign-out-alt"></i></a></li>
                    </ul>
                </div><!--itens-menu-->
            </nav><!-- navbar -->

    <div class="overlay"></div>

    <div class="container">
    	<?php
            if(Cliente::logado() == true) {
                loadPage();
            }else {
                redirect(INCLUDE_PATH_PORTAL);
            }
            
        ?>
    </div><!--container-->

<!--JAVASCRIPT BOOTSTRAP-->

<script src="<?php echo INCLUDE_PATH_PORTAL ?>js/main.js"></script>
<script src="<?php echo INCLUDE_PATH_PORTAL ?>js/mCustomScrollbar.js"></script>
<script src="<?php echo INCLUDE_PATH_PORTAL ?>js/jquery.mask.js"></script>
</body>
</html>