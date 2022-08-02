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
<form action="processos/processo-cadastro-briefing.php" method="post">
   <div class="container-fluid">
      <!-- Page Heading -->
      <!-- Content Row -->
      <div class="row">
         <!-- Area Chart -->
         <div class="col-xl-12 col-lg-12">
            <div class="">
               <!-- Card Header - Dropdown -->
               
               <div class="card-body">
                  <div class="chart-area">
                     <div class="container containerFild">
                        
                        <div class="container">
                           <br/>
                           <?php 
                                include 'processos/config.php';
                                $link_ref = $_GET['link_ref'];
                                $select = "SELECT * FROM respostas WHERE link_ref='$link_ref'";
                                $exe = mysqli_query($con, $select);
                                while($dado=mysqli_fetch_array($exe)){
                                    
                                    $titulobriefing = $dado['titulo_briefing'];
                                    echo "<center><a href='index.php' class='btn btn-default' style='border:solid 1px #ccc;'>Fechar visualização</a></center><br>";
                                    echo "<center><h1>$titulobriefing</h1></center><br>";
                                    $lista = "<strong>".$dado['resposta']."</strong>";
                                    $lista = explode(",", $lista);
                                    // Aqui lista passou a ser um array("item1", "item2", "item3");
                                    
                                    $htmlLista = "<div>";
                                    foreach ($lista as $item) {
                                       $htmlLista .= "<div class='boxFilds'>".$item."</div>";
                                    }
                                    
                                    
                                    
                                    $htmlLista .= "<div>";
                                    echo $htmlLista;
                                    
                                }
                            
                            
                            ?>  
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
         
      </div>
   </div>
</form>