<?php include'header.php';?>
<style>
    .input-group{top: -14px!important;}
    .fa-bell:before{top: 26px;position: relative!important;}
    .badge-danger{top: 23px;position: relative;left: -5px;}
</style> 
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form action="resultado.php" method="post">
                        <div clas class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"></div>
                        <div class="input-group">
                            <input type="text" name="procurar" class="form-control bg-light border-0 small" placeholder="Didite o nome do Briefing... "
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <input type="submit" type="submit" class="btn btn-primary" type="button" value="Pesquisar">
                                   
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        
                            <?php 
                            include 'processos/config.php';
                                $id = $_SESSION['id'];
                              $total = 0;
                              $n = 1;
                              $sql = "SELECT count(*) as estado FROM briefing WHERE estado='2' AND id_usuario='$id'";
                              $sql = $con->query($sql);
                              $sql = $sql->fetch_assoc();
                              $total = $sql['estado'];
                            
                            echo "<li class='nav-item dropdown no-arrow mx-1'><a class='av-link dropdown-toggle' href='#' id='alertsDropdown' role='button'
                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='fas fa-bell fa-fw'></i>
                                <!-- CONTADOR DE ALERT FAZER EM PHP -->
                                
                                <span class='badge badge-danger badge-counter'>$total</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class='dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in'
                                aria-labelledby='alertsDropdown'>
                                <h6 class='dropdown-header'>
                                    Notificações
                                </h6>
                                <a class='dropdown-item d-flex align-items-center' href='#'>
                                    <div class='mr-3'>
                                        <div class='icon-circle bg-primary'>
                                            <i class='fas fa-file-alt text-white'></i>
                                        </div>
                                    </div>
                                    <div>
                                        <!-- AQUI VOU LISTAR A DATA EM PHP -->
                                        <div class='small text-gray-500'>December 12, 2019</div>
                                        <span class='font-weight-bold'>A new monthly report is ready to download!</span>
                                    </div>
                                </a>";
                        ?>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php 
                                    include 'processos/config.php';                                    
                                    $id = $_SESSION['id'];
                                    $selectUser = "SELECT * FROM usuario WHERE id='$id'";
                                    $exe = mysqli_query($con, $selectUser);
                                    while($dados=mysqli_fetch_array($exe)){?>
                                    
                                    <?php echo $dados['nome'];?>
                                    
                                    <?php
                                        }
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                               
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Minha conta
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="exit.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    