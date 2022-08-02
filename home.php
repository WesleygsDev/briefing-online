<?php include'header.php';?>
<head>
   <style>
      #foo{
      width:300px;text-align:center;border-radius:10px;z-index:10000; background-color:#1dc71d; color:#fff;padding:15px; font-size:15px;font-family:montserrat; position:relative; left:50px;
      }
   </style>
</head>
<div class="container-fluid">
<!-- Page Heading -->
<div class="container">
    <div class="row ">
        <div class="col-sm-6"><h1 class="h3 mb-0 text-gray-800">Página Inicial</h1></div>
        <div class="col-sm-6 text-right"><a href="new-briefing" ><div class="btn btn-success btn-lg"> + Iniciar novo Briefing</div></a></div>
    </div>
   
    
</div><br>
<!-- Content Row -->
<div class="row">
   <!-- Earnings (Monthly) Card Example -->
   <?php 
      $id = $_SESSION['id'];
      $total = 0;
      $n = 1;
      $sql = "SELECT count(*) as t FROM briefing WHERE id_usuario='$id'";
      $sql = $con->query($sql);
      $sql = $sql->fetch_assoc();
      $total = $sql['t'];
      
      echo"
      <div class='col-xl-3 col-md-6 mb-4'>
      <div class='card border-left-primary shadow h-100 py-2'>
          <div class='card-body'>
              <div class='row no-gutters align-items-center'>
                  <div class='col mr-2'>
                      <div class='text-xs font-weight-bold text-primary text-uppercase mb-1'>
                          Total de Briefings</div>
                      <div class='h5 mb-0 font-weight-bold text-gray-800'>$total</div>
                  </div>
                  <div class='col-auto'>
                      <i class='fas fa-sticky-note fa-2x text-gray-300'></i>
                  </div>
              </div>
          </div>
      </div>
      </div>
      ";
      ?>
   <?php 
      $id = $_SESSION['id'];
      $total = 0;
      $n = 1;
      $sql = "SELECT count(*) as estado FROM briefing WHERE estado='2' AND id_usuario='$id'";
      $sql = $con->query($sql);
      $sql = $sql->fetch_assoc();
      $total = $sql['estado'];
      
      echo "<div class='col-xl-3 col-md-6 mb-4'>
      <div class='card border-left-success shadow h-100 py-2'>
          <div class='card-body'>
              <div class='row no-gutters align-items-center'>
                  <div class='col mr-2'>
                      <div class='text-xs font-weight-bold text-success text-uppercase mb-1'>
                          Briefings Respondidos</div>
                      
                      <div class='h5 mb-0 font-weight-bold text-gray-800'>$total</div>
                  </div>
                  <div class='col-auto'>
                      <i class='far fa-check-circle fa-2x text-gray-300'></i>
                  </div>
              </div>
          </div>
      </div>
      </div>  
      ";
      ?>
   <?php 
      $id = $_SESSION['id'];
      $total = 0;
      $n = 1;
      $sql = "SELECT count(*) as estado FROM briefing WHERE estado='1' AND id_usuario='$id'";
      $sql = $con->query($sql);
      $sql = $sql->fetch_assoc();
      $total = $sql['estado'];
      
      echo "
      <div class='col-xl-3 col-md-6 mb-4'>
      <div class='card border-left-warning shadow h-100 py-2'>
          <div class='card-body'>
              <div class='row no-gutters align-items-center'>
                  <div class='col mr-2'>
                      <div class='text-xs font-weight-bold text-warning text-uppercase mb-1'>
                          Briefing Pendentes</div>
                      <div class='h5 mb-0 font-weight-bold text-gray-800'>$total</div>
                  </div>
                  <div class='col-auto'>
                      <i class='fas fa-exclamation fa-2x text-gray-300'></i>
                  </div>
              </div>
          </div>
      </div>
      </div>
      ";
      
      ?>
   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Clientes
                  </div>
                  <div class="row no-gutters align-items-center">
                     <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">10</div>
                     </div>
                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Pending Requests Card Example -->
</div>
<!-- Content Row -->
<div class="row">
   <!-- Area Chart -->
   <div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
         <!-- Card Header - Dropdown -->
         <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Briefing recentes</h6>
         </div>
         <!-- Card Body -->
         <div class="card-body">
            <div class="chart-area">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo do Briefing</th>
                        <th scope="col">Briefing</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                     </tr>
                  </thead>
                  <?php 
                     include 'processos/config.php';
                     $id_usuario = $_SESSION['id'];
                     $listLink = "SELECT * FROM briefing WHERE id_usuario='$id_usuario' LIMIT 4";
                     $exe = mysqli_query($con,$listLink);
                     while($dados=mysqli_fetch_array($exe)){?>
                  <tbody>
                     <tr>
                        <th scope="row"><?php echo $dados['id_briefing'];?></th>
                        <td><?php echo $dados['titulo_briefing'];?></td>
                        <td><a href='http://briefingonline.com.br/<?php echo $dados['link_ref'];?>s<?php echo $dados['id_usuario'];?>' target="_blank">https://briefingonline.com.br/<?php echo $dados['link_ref'];?>s<?php echo $dados['id_usuario'];?></a></td>
                        <td>
                           <?php
                              if($dados['estado']==1)
                              {
                                  echo "<span style='color:orange;'><strong>Pendente</strong></span>";
                              }else
                              {
                                  echo "<span style='color:green;'><strong>Respondido</strong></span><br>";
                                  echo "<a href='respostas.php?link_ref=$dados[link_ref]'><div class='btn btn-default btn-sm' style='font-weight:bold; border:solid 2px #ccc;'> Ver respostas</div></a>";
                              }
                                                            
                                       
                                // PARA PEGAR O GET NO VISUALIZAR | POR CONTA DO URL AMIGÁVEL CONFIGURADO NO .HTACSS                            
                                if ($_GET) {
                                    @$url = explode('/', $_GET['url']); 
                                    @require_once $url[0].'.php';
                                }                            
                        
                              ?>
                        </td>
                         
                         
                         
                       
                         
                         
                        <td>
                           <div class="dropdown no-arrow">
                              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-h"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                 <div class="dropdown-header">Ação:</div>
                                 <a class="dropdown-item" href="edit-briefing.php?id_briefing=<?php echo $dados['id_briefing'] ?>"><i class="far fa-edit"></i> Editar</a>
                                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-trash"></i> Excluir</a>
                                 <a class="dropdown-item" target='_blanck' href="http://briefingonline.com.br/<?php echo $dados['link_ref'];if ($_GET) {
                                    @$url = explode('/', $_GET['url']); 
                                    @require_once $url[0].'.php';
                                }?>"><i class="fas fa-eye"></i> Visualizar</a>
                                 <div class="dropdown-divider"></div>
                                 <div class="dropdown-header">Compatilhamento:</div>
                                  
                                <!-- <a class="dropdown-item" href="https://web.whatsapp.com/send?text=briefing.php?link_ref=<//?php echo $dados['link_ref'];?>s<//?php echo $_SESSION['id'];?>"><i class="fab fa-whatsapp"></i> Enviar por Whatsapp</a>
                                 <a class="dropdown-item" href="mailto:?body=Olá, segue o link do Briefing<//?php echo $dados['link_ref'];?>s<//?php echo $_SESSION['id'];?>"><i class="far fa-envelope"></i> Enviar por E-mail</a>-->
                                  
                                  <a class="dropdown-item" href="https://web.whatsapp.com/send?text=briefing.php?link_ref=<?php echo $dados['link_ref'];?>s<?php echo $_SESSION['id'];?>"><i class="fab fa-whatsapp"></i> Enviar por Whatsapp</a>
                                 <a class="dropdown-item" href="mailto:?body=http://briefingonline.com.br/<?php echo $dados['link_ref'];?>s<?php echo $_SESSION['id'];?>"><i class="far fa-envelope"></i> Enviar por E-mail</a>
                                  
                              </div>
                           </div>
                            
                           <!-- Button trigger modal -->
                           <!-- Modal -->
                           <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header"></center></h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body text-center">
                                       Você está preste a excluir o Briefing
                                       <br> <?php echo "<br><h2><strong>".$dados['titulo_briefing']."</strong></h2>";?>
                                       <center>
                                       Todos os dados vinculado a esse briafing serão removidos <br>deseja continuar?
                                       <center>
                                    </div>
                                    <form action="" method="post" id="delBriefing">
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal" style="border:solid 1px red;color:red;">Cancelar</button>
                                          <input type="hidden" name='id_briefing' id="id_briefing" value="<?php echo $dados['id_briefing'];?>">
                                          <input type="button" class="btn btn-danger" value="Estou ciente desejo continuar" id="salvar">
                                    </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                            
                           <script type="text/javascript" language="javascript">
                              $(document).ready(function() {
                                  /// Quando usuário clicar em salvar será feito todos os passo abaixo
                                  $('#salvar').click(function() {
                              
                                      var dados = $('#delBriefing').serialize();
                              
                                      $.ajax({
                                          type: 'POST',
                                          dataType: 'json',
                                          url: 'processos/processo-deletar-briefing.php',
                                          async: true,
                                          data: dados,
                                          success: function(response) {
                                          
                                            $(document).ready(function(){ 
                                                $(".modal-content").hide();
                                                $(".modal-backdrop.show").hide();
                                                setTimeout(function() {
                                                  window.location.href = "index.php";
                                              }, 2500);
                                                $( "#foo" ).fadeIn( 500 ).delay( 1500 ).fadeOut( 400 );
                                              }); 
                                          
                                              
                                          }
                                      });
                              
                                      return false;
                                  });
                              });  
                              
                              
                           </script>
                           <script>
                              // Iniciará quando todo o corpo do documento HTML estiver pronto.
                              
                                       
                           </script>
                            
                        </td>
                         
                     </tr>
                      
                  </tbody>
                  
                  <?php
                                                            
                     }
                     ?>
               </table>
                <center><a href='meus-briefings'><div class="btn  btn-default text-center bt-all" style="border:solid 1px #ccc;">Ver todos</div></a></center>
                <br><br><br>
                <?php                              
                        $id_usuario = $_SESSION['id'];
                        $listDados = "SELECT * FROM briefing WHERE id_usuario='$id_usuario'";
                        $exe = mysqli_query($con,$listDados);                                    
                        $row = mysqli_num_rows($exe);                                    
                            if($row==0)
                        {
                            echo "<center><img src='img/icon-briefing.png' width='70'></center>";
                            echo "<center><h3>Você não possui Briefing</h3></center>";
                            echo "<center><p>Clique no botão a baixo para iniciar</p></center>";
                            echo "<center><a href='new-briefing'><div class='btn btn-success'>+ Iniciar novo Briefing</div></a></center>";
                            echo "<style>.table{display:none;}.bt-all{display:none;}</style>";
                        }else
                            {
                                echo "";
                            }
                ?>
            </div>
             
         </div>
          
      </div>
   </div>
    
   <style>
   </style>
   <style>
      #foo{display: none;}
   </style>
   <!-- Pie Chart -->
   <!--<div class="col-xl-12 col-lg-3">
      <div class="card shadow mb-4">
         <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
            <div class="dropdown no-arrow">
               <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                  aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
               <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
               <span class="mr-2">
               <i class="fas fa-circle text-primary"></i> Direct
               </span>
               <span class="mr-2">
               <i class="fas fa-circle text-success"></i> Social
               </span>
               <span class="mr-2">
               <i class="fas fa-circle text-info"></i> Referral
               </span>
            </div>
         </div>
      </div>
   </div>-->
</div>
