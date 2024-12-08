<img src="img/boschbar.png" width=100% height=28px>
<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../maze"><img src="img/BOSCH_RGB.svg" alt="Bosch" height="24"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if($log=='in'){?>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if($cat>=1){?>
                <li class="nav-item">
                    <a class="nav-link <?php if($pag == 'pedido'){echo 'active" aria-current="page"';} ?>" href="pedido">Abastecimento</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link <?php if($pag == 'bata'){echo 'active" aria-current="page"';} ?>" href="bata">Batas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($pag == 'bota'){echo 'active" aria-current="page"';} ?>" href="bota">Calçado</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pedir</a>
                    <ul class="dropdown-menu">
                        <?php if($cat>=1){?>
                        <li><a class="dropdown-item" href="addpedido">Abastecimento</a></li>
                        <?php }?>
                        <li><a class="dropdown-item" href="addbatas">Batas</a></li>
                        <li><a class="dropdown-item" href="addbotas">Calçado</a></li>
                    </ul>
                </li>
                <?php if($cat>=3){?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Saidas</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?php if($pag == 'saida'){echo 'active" aria-current="page"';} ?>" href="saida">Maze</a></li>
                        <li><a class="dropdown-item <?php if($pag == 'baixapedidos'){echo 'active" aria-current="page"';} ?>" href="baixapedidos">Abastecimento</a></li>
                    </ul>
                </li>
                <?php }?>
            </ul>
            <ul class="d-flex navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill"></i> <?php echo $username;?></a>
                    <ul class="dropdown-menu">
                        <?php if($cat==3){?>
                        <li><a class="dropdown-item" href="guser">Utilizadores</a></li>
                        <li><a class="dropdown-item" href="departamento">Departamentos</a></li>
                        <li><a class="dropdown-item" href="linha">Linhas</a></li>
                        <li><a class="dropdown-item" href="equipamento">Equipamentos</a></li>
                        <li><a class="dropdown-item" href="materia">Materiais</a></li>
                        <?php }else{ ?>
                        <li><a class="dropdown-item" href="guser">Perfil</a></li>
                        <?php } ?>
                        <li><a class="dropdown-item" href="includes/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php }else{?>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <ul class="d-flex navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if($pag == 'regist'){echo 'active" aria-current="page"';} ?>" href="regist"><i class="bi bi-person-plus-fill"></i> Registar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($pag == 'log'){echo 'active" aria-current="page"';} ?>" href="log"><i class="bi bi-door-open-fill"></i> Entrar</a>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </div>
</nav>