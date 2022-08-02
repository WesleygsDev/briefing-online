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
       
       .dynamicDiv{font-size: 18px; font-family: montserrat; background-color: #fff; border-bottom: solid 5px #4e73df; padding: 10px;-webkit-box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);
      -moz-box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);
      box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);}
       
       .fa-whatsapp{color:#10c110; top:10px; padding: 10px; font-size: 25px; border-radius: 30px; border: solid 1px #d4d4d4; width: 50px;height: 50px;}
       
       .fa-facebook{color:#101ec1; top:10px; padding: 10px; font-size: 25px; border-radius: 30px; border: solid 1px #d4d4d4; width: 50px;height: 50px;}
       
       .fa-envelope-open-text{color:#555555; top:10px; padding: 10px; font-size: 25px; border-radius: 30px; border: solid 1px #d4d4d4; width: 50px;height: 50px;}
       
       
       @media only screen and (min-width:500px)
       {
           .icon-share
           {
               width: 450px;
           }
       }
   </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<form action="processos/processo-cadastro-briefing.php" method="post">
   <div class="container-fluid">
      <!-- Page Heading -->
      <!-- Content Row -->
      <div class="row">
         <!-- Area Chart -->
         <div class="col-sm-12 col-lg-12 text-center">
            <img src="img/sucess.gif" width="300">
            <h2>Agora, compartilhe seu link de <br>Briefing como quiser</h2>
            <div class="container">
               <div class="row" style="width:600px; margin:auto;">
                  <?php   
                    include 'processos/config.php';
                    $id = $_SESSION['id'];
                    $query = "SELECT MAX(id_briefing) as maxId FROM briefing";
                    $idBriefing = mysqli_query($con,$query);
                    while($dados=mysqli_fetch_array($idBriefing))
                        
                    //AQUI ESTOU PEGANDO O ÚLTIMO REGISTRO DO BANCO DE DADOS PARA PODER LISTAR DO BANCO O BRIEFING ASSOCIADO AO ID DE USUÁRIO
    
                    {
                        
                        $id_briefing = $dados['maxId'];
                    }
                   
                    $listBriefing = "SELECT * FROM briefing WHERE id_briefing='$id_briefing'";
                    $exe = mysqli_query($con,$listBriefing);
                    while($dadosBri=mysqli_fetch_array($exe))
                    {   
                        
                    //AQUI ESTOU PEGANDO O LINK_REF DO BANCO E ID DE USUÁRIO DA SESSÃO E COLOCANDO UM 'S' ENTRE OS 2 PARA
                        $link_ref = $dadosBri['link_ref'];
                        $id_usuario = $_SESSION['id'];
                        $array = array($link_ref,$id_usuario);
                        
                        $link = implode("s", $array);
                                                
                    }

                    echo "";
                     echo "
                     
                     <input type='text' value='https://briefingonline.com.br/$link' id='url' class='dynamicDiv whatsapp btn btn-block'>
                     <script>
                     $('#url').click(function(){
                     $(this).select();
                     
                     document.execCommand('copy');
                     var copyy = document.execCommand('copy');
                     if(document.execCommand('copy'))
                     {
                     
                     document.getElementById('resultado').innerHTML='Copiado<br>';
                     }
                     })
                     </script>";
         
                     // PARA PEGAR O GET NO VISUALIZAR | POR CONTA DO URL AMIGÁVEL CONFIGURADO NO .HTACSS                            
                    if ($_GET) 
                    {
                        $url_get = explode('/', $_GET['url_get']); 
                        require_once $url_get[0].'.php';
                    }
                     
                     
                     echo "<div id='resultado' style='background-color:#8388ff; color:#fff; border-radius:7px; width:100px; text-align:center;'></div>";
                     ?>
                   
               </div>
                    <?php 
                   echo "
                    <div class='container icon-share'>
                        <div class='row'>
                            <div class='col'>
                                <br><a href='https://web.whatsapp.com/send?text=Olá seu Briefing online já está disponível 😉 

fique a vontade para responder

*Acesse o link a baixo*
https://briefingonline.com.br/$link Sucesso! 🚀🚀' target='_blanck'><i class='fa-brands fa-whatsapp'></i></a><br>Whatsapp
                            </div>
                            <div class='col'>
                                <br><a href='http://www.facebook.com/sharer/sharer.php?u=https://briefingonline.com.br/$link' target='_blanck'><i class='fa-brands fa-facebook'></i></a><br>Facebook
                            </div>
                            <div class='col'>
                                <br><a href='mailto:?body=Seu briefing já está disponível! acesse o link para responder https://briefingonline.com.br/$link'><i class='fa-solid fa-envelope-open-text'></i></a><br>E-mail
                            </div>
                        </div>
                    </div>
                   ";
                    
                     
                    
                   ?>
            </div>
         </div>
      </div>
   </div>
</form>