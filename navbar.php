<img src="img/boschbar.png" width=100% height=28px>
<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="img/BOSCH_RGB.svg" alt="Bosch" height="24"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if($log=='in'){?>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if($pag == 'pedido'){echo 'active" aria-current="page"';} ?>" href="pedido">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($pag == 'materia'){echo 'active" aria-current="page"';} ?>" href="materia">Material</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($pag == 'linha'){echo 'active" aria-current="page"';} ?>" href="linha">Linhas</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pedir
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="addpedido">Abastecimento</a>
                        <a class="dropdown-item" href="addbatas">Batas</a>
                        <a class="dropdown-item" href="addbotas">Botas</a>
                    </div>
                </li>
            </ul>
            <ul class="d-flex navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if($pag == 'guser'){echo 'active" aria-current="page"';} ?>" href="guser"><?php echo $_SESSION['username'];?></a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pedir
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="addpedido">Abastecimento</a>
                        <a class="dropdown-item" href="addbatas">Batas</a>
                        <a class="dropdown-item" href="addbotas">Botas</a>
                    </div>
                </li>
            </ul>
        </div>
        <?php }?>
    </div>
</nav>