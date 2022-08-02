<?php include'header.php';?>

<head>
    <!-- jquery -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- bootstrap -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- chamada da função -->
<script type="text/javascript">
$(window).load(function() {
    $('#ExemploModalCentralizado').modal('show');
});
</script>
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
       
       @media only screen and (min-width:900px)
       {
           .modal-content{width: 460px; margin: auto;}
       }
       
      
   </style>
</head>

<form action="" method="post">
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
                            
                                
                                // aqui estou pegando o id do briefing e o id do usuário para se caso o cliente quiser efetuar o cadastro armazena o id usuario na tebela clientes.
                            
                                var_dump($_GET);
                                $get = $_GET['link_ref'];

                                $arr = explode("s",$get);
                                print_r($arr);

                                echo $arr[1];
                            
                                $select = "SELECT * FROM briefing WHERE link_ref='$arr[0]'";
                                $exe = mysqli_query($con, $select);
                                while($dado=mysqli_fetch_array($exe)){
                                    
                                    $titulobriefing = $dado['titulo_briefing'];
                                   
                                    echo "<center><h1>$titulobriefing</h1></center><br>";
                                    $lista = $dado['perguntas'];
                                    $lista = explode(",", $lista);
                                    // Aqui lista passou a ser um array("item1", "item2", "item3");
                                    
                                    $htmlLista = "<div>";
                                    foreach ($lista as $pergunta) {
                                       $htmlLista .= "
                                       
                                       <div>
                                       
                                       <form action='processos/processo-resposta-briefing.php'>
                                       <div class='boxFilds'>".$pergunta."<br>
                                       <input type='hidden' name='titulo_briefing' value='$titulobriefing'>
                                       <input type='hidden' name='pergunta' value='$pergunta'>
                                       <input type='hidden' name='status' value='2'>
                                       <input type='hidden' name='link_ref' value='$arr[0]'>
                                       <input type='hidden' name='id_cliente' value='$arr[1]'>
                                       <input typr='text' placeholder='Digite sua resposta' name='resposta'>
                                       
                                       </div>";
                                        
                                    }
                                    $htmlLista .= "<div>";
                                    echo $htmlLista;
                                    
                                }
                            
                            
                            
                            
                            
                            
                            echo "<input type='submit' value='Responder' class='btn btn-success'>
                                       </form>";
                            
                            
                            
                            
                            
                            ?>  
                        </div>
                         
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </div>
</form>


 <form action="" method="post">
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
                            
                                
                                // aqui estou pegando o id do briefing e o id do usuário para se caso o cliente quiser efetuar o cadastro armazena o id usuario na tebela clientes.
                            
                                var_dump($_GET);
                                $get = $_GET['link_ref'];

                                $arr = explode("s",$get);
                                print_r($arr);

                                echo $arr[1];
                            
                                $select = "SELECT * FROM briefing WHERE link_ref='$arr[0]'";
                                $exe = mysqli_query($con, $select);
                                while($dado=mysqli_fetch_array($exe)){
                                    
                                    $titulobriefing = $dado['titulo_briefing'];
                                   
                                    echo "<center><h1>$titulobriefing</h1></center><br>";
                                    $lista = $dado['perguntas'];
                                    $lista = explode(",", $lista);
                                    // Aqui lista passou a ser um array("item1", "item2", "item3");
                                    
                                    $htmlLista = "<div>";
                                    foreach ($lista as $pergunta) {
                                       $htmlLista .= "
                                       
                                       <div>
                                       
                                       <form action='processos/processo-resposta-briefing.php'>
                                       <div class='boxFilds'>".$pergunta."<br>
                                       <input type='hidden' name='titulo_briefing' value='$titulobriefing'>
                                       <input type='hidden' name='pergunta' value='$pergunta'>
                                       <input type='hidden' name='status' value='2'>
                                       <input type='hidden' name='link_ref' value='$arr[0]'>
                                       <input type='hidden' name='id_cliente' value='$arr[1]'>
                                       <input typr='text' placeholder='Digite sua resposta' name='resposta'>
                                       
                                       </div>";
                                        
                                    }
                                    $htmlLista .= "<div>";
                                    echo $htmlLista;
                                    
                                }
                            
                            
                            
                            
                            
                            
                            echo "<input type='submit' value='Responder' class='btn btn-success'>
                                       </form>";
                            
                            
                            
                            
                            
                            ?>  
                        </div>
                         
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </div>
</form>