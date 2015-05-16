<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">File Manager</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <?php
                if(isset($_SESSION))
                {
                 if(isset($_SESSION['permisos']))
                 {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" aria-expanded="false">Archivos</span></a>

                    </li>
                    <?php
                    if($_SESSION['permisos']=='Admin')
                    { 
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tipo Usuario<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="TipoUsuarios.php">Agregar</a></li>
                                <li class="divider"></li>

                                <li><a href="MostrarTUsuario.php?opc=modificar">Modificar</a></li>
                                <li class="divider"></li>
                                <li><a href="MostrarTUsuario.php?opc=eliminar">Eliminar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tipo Servicio <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="TipoServicio.php">Agregar</a></li>
                                <li class="divider"></li>
                                <li><a href="MostrarTServicio.php?opc=modificar">Modificar</a></li>
                                <li class="divider"></li>
                                <li><a href="MostrarTServicio.php?opc=eliminar">Eliminar</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    else
                    {

                    }
                    ?>

                    <li class="dropdown">
                        <a href="editarPerfil.php"  role="button" aria-expanded="false">Cuenta</a>

                    </li>
                    <li class="dropdown">
                        <a href="Salir.php"  aria-expanded="false">Salir</span></a>
                    </li>

                    <?php
                }
                else
                {
                    ?>
                   <li class="dropdown">
                            <a href="Login.php" role="button" aria-expanded="false">Login</span></a>
                        </li>
                    <li class="dropdown">
                        <a href="Registrarse.php"  role="button" aria-expanded="false">Registrarse</span></a>

                    </li>
                    
                   
                    <?php
                }
            }
            ?>









        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

