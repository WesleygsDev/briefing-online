<?php include'header.php';?>
<head>
   <style>
      @media only screen and (min-width:500px)
      {
      .boxFilds{margin: auto;
      position: relative;
      width: 580px;
      margin-bottom: 10px;
      padding: 23px;
      border-radius: 6px;
      background-color: #fff;
      -webkit-box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);
      -moz-box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);
      box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);
      border-bottom:solid 3px #2e55c7;
      }
      }
      .fa-trash-alt{font-size: 24px;}
      @media only screen and (min-width:500px)
      {
      .fa-trash-alt{left:160px;
      top:5px;
      position:relative;
      }
      }   
      .boxLink
      {
      background-color: #fff;
      -webkit-box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);
      -moz-box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);
      box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);
      border-bottom:solid 1px #ccc;
      border-radius: 5px;
      }
   </style>
</head>
<div class="row">
   <!-- Area Chart -->
   <div class="col-xl-12 col-lg-12">
      <div class="">
         <br>
         <div class="container">
    <div class="row">
        <div class="col-sm-6"><h1 class="h3 mb-0 text-gray-800">Resultado de pesquisa</h1></div>
        <div class="col-sm-6 text-right"><a href="new-briefing.php" ><div class="btn btn-success btn-lg"> + Iniciar novo Briefing</div></a></div>
    </div>
   
    
</div><br>
         <!-- Card Body -->
         <div class="card-body">
            <div class="chart-area">
               <table class="table boxLink">
                  <thead>
                     <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo do Briefing</th>
                        <th scope="col">Link de compartilhamento</th>
                        <th scope="col">Status</th>
                        <th scope="col">Respostas</th>
                        <th scope="col">Ações</th>
                     </tr>
                  </thead>
                   
                  <?php 
                    session_start();
                     include 'processos/config.php';
                     $procura = $_POST['procurar'];
                     $id_usuario = $_SESSION['id'];
                     $listLink = "SELECT * FROM briefing WHERE titulo_briefing LIKE '%$procura%'  AND id_usuario='$id_usuario'";
                     $exe = mysqli_query($con,$listLink);
                     $row = mysqli_num_rows($exe);
                    if($row == 0)
                    {
                        echo "<center><h2>Nenhum resultado encontrado!</h2></center>";
                        echo "<style>.table{display:none;}</style>";
                    } 
                     while($dados=mysqli_fetch_array($exe)){?>
                  <tbody>
                     <tr>
                        <th scope="row"><?php echo $dados['id_briefing'];?></th>
                        <td><?php echo $dados['titulo_briefing'];?></td>
                        <td>
                            
                            
                            <a href='https://briefingonline.com.br/<?php echo $dados['link_ref'];?>s<?php echo $dados['id_usuario'];?>' target="_blank">https://briefingonline.com.br/<?php echo $dados['link_ref'];?>s<?php echo $dados['id_usuario'];?></a>
                         
                         
                         </td>
                        <td>
                           <?php
                              if($dados['estado']==1)
                              {
                                  echo "<span style='color:orange;'><strong>Pendente</strong></span>";
                              }else
                              {
                                  echo "<span style='color:green;'><strong>Respondido</strong></span><br>";
                              }
                        
                              ?>
                        </td>
                         
                       
                         
                         
                        <td>
                            
                            <?php
                              if($dados['estado']==1)
                              {
                                  echo "<span>Nenhuma resposta</span>";
                              }else
                              {
                                  echo "<a href='respostas.php?link_ref=$dados[link_ref]'><div class='btn btn-default btn-sm' style='font-weight:bold; border:solid 2px #ccc;'> Ver respostas</div></a>";
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
                                       <br> <?php echo "<br><h2><strong>". $dados['titulo_briefing']."</strong></h2>";?>
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
                            echo "<center><p>Clique no botão <strong>Iniciar novo Briafing</strong> para começar</p></center>";
                            echo "";
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