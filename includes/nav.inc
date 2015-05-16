<header class="navbar navbar-fixed-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand sitename" href="#">File Manager</a>		
        </div>
        <nav class="sitenav collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <?php
                if(isset($_SESSION))
                {
                    if(isset($_SESSION['permisos']))
                    {
                        if($_SESSION['permisos']=='admin')
                        {
                            ?>
                            <li>Tipo Usuario
                                <ul>
                                    <li><a href="TipoUsuarios.php">Nuevo Tipo Usuario</a>
                                        <li><a href="MostrarTUsuario.php?opc=modificar" target="_self" title="Modificar Tipo Usuario">Modificar Tipo Usuario</a>
                                        </li>
                                        <li><a href="MostrarTUsuario.php?opc=eliminar" target="_self" title="Eliminar Tipo Usuario">Eliminar Tipo Usuario</a>
                                        </li>
                                    </ul>
                                </li>
                            </li>
                            <li>Tipo Servicio
                                <ul>
                                    <li><a href="TipoServicio.php">Nuevo Tipo servicio</a>
                                        <li><a href="MostrarTServicio.php?opc=modificar" target="_self" title="Modificar Tipo Servicio">Modificar Tipo Servicio</a>
                                            <li><a href="MostrarTServicio.php?opc=eliminar" target="_self" title="Eliminar Tipo Servicio">Eliminar Tipo Servicio</a>   
                                            </li>
                                        </li>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Archivos</a></li>
                            <?php
                        }
                        else
                        {
                            ?>

                            <?php
                        }
                        ?>
                        <li><a href="editarPerfil.php">Cuenta</a></li>
                        <li><a href="Salir.php">Salir</a></li>
                        <?php
                    }
                    else
                    {
                        ?>
                        <li><a href="Registrarse.php">Registrarse</a></li>
                        <li><a href="Login.php">Login</a></li>
                        <?php
                    }
                }
                ?>

                <li><a href="#">Archivos</a></li>
            </ul>
        </nav>
    </div>
</header>