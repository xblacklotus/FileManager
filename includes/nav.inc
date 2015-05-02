<header class="navbar navbar-fixed-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand sitename" href="index.php">File Manager</a>      
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
                            <li><a href="MostrarTUsuarios.php">Tipo Usuario</a>
                                <ul>
                                    <li><a href="TipoUsuarios.php">Nuevo Tipo Usuario</a></li>
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
                        <li><a href="Cuenta.php">Cuenta</a></li>
                        <li><a href="Salir.php">Salir</a></li>
                        <?php
                    }
                    else
                    {
                        ?>
                        <li><a href="TipoUsuarios.php">Nuevo Tipo Usuario</a></li>
                        <li><a href="Registrarse.php">Registrarse</a></li>
                        <li><a href="Login.php">Login</a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </nav>
    </div>
</header>