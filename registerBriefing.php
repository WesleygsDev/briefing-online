<?php include'header.php';?>
<head>
   <!-- Entire bundle -->
      <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.13/lib/draggable.bundle.js"></script>
      <!-- legacy bundle for older browsers (IE11) -->
      <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.13/lib/draggable.bundle.legacy.js"></script>
      <!-- Draggable only -->
      <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.13/lib/draggable.js"></script>
      <!-- Sortable only -->
      <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.13/lib/sortable.js"></script>
      <!-- Droppable only -->
      <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.13/lib/droppable.js"></script>
      <!-- Swappable only -->
      <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.13/lib/swappable.js"></script>
      <!-- Plugins only -->
      <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.13/lib/plugins.js"></script>
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
<form action="http://briefingonline.com.br/processos/processo-cadastro-briefing.php" method="post">
   <div class="container-fluid">
      <!-- Page Heading -->
      <!-- Content Row -->
      <div class="row">
         <!-- Area Chart -->
         <div class="col-xl-8 col-lg-8">
            <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div
                  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Iniciar novo Briefing</h6>
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
               <div class="card-body" style="background-color:#edeef1;">
                  <div class="chart-area">
                     <div class="container containerFild">
                        <div class="container">
                           <div class="row">
                              <div class="col text-center">
                                 <input type="text" name="titulo_briefing" required value="Briefing sem título..." class="form-control" style="border:none; border-left:solid 5px orange;"><br>
                              </div>
                           </div>
                        </div>
                        <div class="container">
                           <center>
                              <a class="btn btn-primary" href="javascript:void(0)" id="addInput">
                              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                              Adicionar nova pergunta
                              </a>            
                           </center>
                           <br/>
                           
                           <div id="dynamicDiv" onclick="click();" class="StackedList StackedList--hasScroll">
                              <p class="boxFilds" draggable="true" >
                                 <input type="text" required name="pergunta[]" id="inputeste" class="form-control-lg"  placeholder="Digite a pergunta aqui..." style="border:none;">
                                 <a  href="javascript:void(0)" id="remInput">
                                 <i class="far fa-trash-alt text"></i>
                                 </a>
                              </p>
                           </div>
                           <script>
                              $(function () {
                                  var scntDiv = $('#dynamicDiv');
                              
                                  $(document).on('click', '#addInput', function () {
                                      $('<p class="boxFilds">'+
                                     		'<input type="text" required name="pergunta[]" class="form-control-lg" id="inputeste" size="20" value="" placeholder="Digite a nova pergunta" / style="border:none;"> '+
                                     		'<a  href="javascript:void(0)" id="remInput">'+
                              				'<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
                              				'<i class="far fa-trash-alt text"></i>'+ 
                                     		'</a>'+
                              		'</p>').appendTo(scntDiv);
                                      return false;
                                  });
                                  $(document).on('click', '#remInput', function () {
                                         $(this).parents('p').remove();
                                      return false;
                                  });
                              });
                                          
                                           
                           </script>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Todos os Briefing</h6>
               <br>
            </div>
            <?php 
               include 'processos/config.php';
               $id_usuario = $_SESSION['id'];
               $listLink = "SELECT * FROM briefing WHERE id_usuario='$id_usuario' LIMIT 4";
               $exe = mysqli_query($con,$listLink);
                $row = mysqli_num_rows($exe);
             
             if($row == 0)
             {
                 echo "<div class='' style='padding:20px;'><center><i class='fas fa-exclamation fa-2x '></i></center><br><center>Você ainda não possui <strong>Briefing</strong><br>Adicione perguntas e crie o seu</center></div>
                 <center><img src='img/seta.gif' width='100'></center>
                 
                 ";
             }else
             {
                 // AQUI IREI CRIAR ALGUMA TELA DE SUCESSO//
                 echo "";
             }

             
               while($dados=mysqli_fetch_array($exe)){?>
            <div class='boxLink' style=" margin:10px;padding:10px;">
               <div class="container" style="padding-left:0!important; font-size:14px;">
                  <div class="row">
                      
                     <div class="col-sm-10 text-left">
                         <strong><?php echo $dados['titulo_briefing'];?></strong>
             
                         <a href="https://briefingonline.com.br/<?php echo $dados['link_ref'];?>">
                        https://briefingonline.com.br/<?php echo $dados['link_ref'];?>
                        </a>
                     </div>
                     <div class="colsm-2 text-right">
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
                     </div>
                  </div>
               </div>
            </div>
            <?php
               }
               ?>
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <input type="submit" class="btn btn-success btn-block btn-lg" value="Salvar novo briefing">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>