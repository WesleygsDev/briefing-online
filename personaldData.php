<?php include'header.php';?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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
       
       .card-body{background-color: #fff; margin: 20px;}
       
   </style>
</head>

<div class="row">
   <!-- Area Chart -->
   <div class="col-xl-12 col-lg-12">
      <div class="">
         <br>
         <div class="container">
    <div class="row">
        <div class="col-sm-6"><h1 class="h3 mb-0 text-gray-800">Dados Pessoais </h1></div>
        <div class="col-sm-6 text-right"><a href="new-briefing.php" ><div class="btn btn-success btn-lg"> + Iniciar novo Briefing</div></a></div>
    </div>
   
    
</div><br>
         <!-- Card Body -->
         <div class="card-body">
             
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalToggleLabel">Atualize Seu Nome
</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <?php include 'processos/config.php';
                     $id_usuario = $_SESSION['id'];
                     $listLink = "SELECT * FROM usuario WHERE id='$id_usuario'";
                     $exe = mysqli_query($con,$listLink);
                     while($dados=mysqli_fetch_array($exe)){?>
          
          
            <div class="h-px-40"><div class="inline-field"><div class="inline-field__main-wrapper"><div class="input-wrapper"><div class="label-holder label-holder--filled label-holder--undefined"><label for="firstName1" dir="ltr" class=" label-holder__label"><span> Seu nome completo </span><sup class="form__required-label">*</sup><!----></label></div><input id="nome" value="<?php echo $dados['nome'];?>" required="required" type="text" class="form-control"></div><!----><!----></div></div></div>
          <div id="dados"></div>
          
      </div>
      <div class="modal-footer">
        <button class="btn-link btn-close" data-bs-dismiss="modal" aria-label="Close" style="border:solid 1px #ccc; background:none;border:none;">Fechar</button>
        <button class="btn btn-primary" id="atualizar">Salvar alterações</button>
        <?php
            }
          ?>  
          
          <script>
            function atualizar(nome)
            {
                //O método $.ajax(); é o responsável pela requisição
                $.ajax
                        ({
                            //Configurações
                            type: 'POST',//Método que está sendo utilizado.
                            dataType: 'html',//É o tipo de dado que a página vai retornar.
                            url: 'https://briefingonline.com.br/processos/dados-pessoais/processo-atualizar-nome.php',//Indica a página que está sendo solicitada.
                            //função que vai ser executada assim que a requisição for enviada
                            beforeSend: function () {
                                $("#dados").html("Carregando...");
                            },
                            data: {nome: nome},//Dados para consulta
                            //função que será executada quando a solicitação for finalizada.
                            success: function (msg)
                            {
                                $("#dados").html(msg);
                                
                            }
                        });
            }
            
            
            $('#atualizar').click(function () {
                atualizar($("#nome").val())
            });
        </script>
      </div>
    </div>
  </div>
</div>
             
<!-- MODAL PARA ATUALIZAR E-MAIL-->             
<div class="modal fade" id="exampleModalToggle-email" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalToggleLabel"><center>Atualize Seu Endereço de Email</center></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <?php include 'processos/config.php';
                     $id_usuario = $_SESSION['id'];
                     $listLink = "SELECT * FROM usuario WHERE id='$id_usuario'";
                     $exe = mysqli_query($con,$listLink);
                     while($dados=mysqli_fetch_array($exe)){?>
          <form id="formAcao">
            <div class="h-px-40" style="margin-bottom:10px;"><div class="inline-field"><div class="inline-field__main-wrapper">
                <div class="input-wrapper"><div class="label-holder label-holder--filled label-holder--undefined"><label for="firstName1" dir="ltr" class=" label-holder__label"><span> E-mail </span><sup class="form__required-label">*</sup><!----></label></div><input id="email" value="<?php echo $dados['email'];?>" required="required" type="text" class="form-control" name="email">
                </div><!----><!----></div></div>
          </div> 
          <div class="h-px-40"><div class="inline-field"><div class="inline-field__main-wrapper">
                <div class="input-wrapper"><div class="label-holder label-holder--filled label-holder--undefined"><label for="firstName1" dir="ltr" class=" label-holder__label"><span> Senha </span><sup class="form__required-label">*</sup><!----></label></div>
                    <input id="senhaantiga"  name="senhaantiga" value="<?php echo $dados['senha'];?>" required="required" type="hidden" class="form-control form-control-user">
                    
                    <input id="senhaatual"   required="required" type="password" class="form-control form-control-user" name="senhaatual">
                    
                </div><!----><!----></div></div>
          </div>
          <div id="dados2"></div>
          </form>
            
          
      </div>
      <div class="modal-footer">
        <button class="btn-link btn-close" data-bs-dismiss="modal" aria-label="Close" style="border:solid 1px #ccc; background:none;border:none;">Fechar</button>
        <button class="btn btn-primary" onclick="atualizaremail()">Salvar alterações</button>
        <?php
            }
          ?>  
          
          <script>
            function atualizaremail()
            {
                var i = $('#formAcao').serialize();
                
                //O método $.ajax(); é o responsável pela requisição
                $.ajax
                        ({
                            //Configurações
                            type: 'POST',//Método que está sendo utilizado.
                            dataType: 'html',//É o tipo de dado que a página vai retornar.
                            url: 'https://briefingonline.com.br/processos/dados-pessoais/processo-atualizar-email.php',//Indica a página que está sendo solicitada.
                            //função que vai ser executada assim que a requisição for enviada
                            beforeSend: function () {
                                $("#dados2").html("Carregando...");
                            },
                            data:i, //Dados para consulta
                            //função que será executada quando a solicitação for finalizada.
                            success: function (msg)
                            {
                                $("#dados2").html(msg);
                                
                            }
                        });
            }
            
            
            $('#atualizaremail').click(function () {
                atualizaremail($("#email").val())
            });
        </script>
          
      </div>
    </div>
  </div>
</div>
             
             
             


                <?php 
                     include 'processos/config.php';
                     $id_usuario = $_SESSION['id'];
                     $listLink = "SELECT * FROM usuario WHERE id='$id_usuario'";
                     $exe = mysqli_query($con,$listLink);
                     while($dados=mysqli_fetch_array($exe)){?>
<div class='container dados' style="background-color:#fff; padding:0px;">
<div class="container-fluid" style="padding:0px;">
    <div class="row">
        <div class="col-sm-12" style="padding: 0px;  1px green; margin:5px;">
            <strong><img src="https://hpanel-main.hostinger.com/img/person.svg">Informações de perfil</strong><br><br>

            <a class="btn btn-default btn-block " style='border:solid 1px #ccc; padding:15px;  background-color: #fff;
}' data-bs-toggle="modal" href="#exampleModalToggle" role="button">
               <div class="row">
                   
                     <div class="col-sm-4 text-left">Nome</div> 
                <div class="col-sm-4 text-left"><?php echo $dados['nome'];?></div> 
                <div class="col-sm-4 text-right"><img src="https://hpanel-main.hostinger.com/img/right-angle-bracket.svg"></div> 
                </div>
            </a>
        </div>
    </div>
        
</div>
    <div class="container-fluid" style="padding:0px;">
    <div class="row">
        <div class="col-sm-12" style="padding: 0px; margin:5px;">
            <a class="btn btn-default btn-block " style='border:solid 1px #ccc; padding:15px;  background-color: #fff;' data-bs-toggle="modal" href="#exampleModalToggle-email" role="button">
               <div class="row">
                     <div class="col-sm-4 text-left">E-mail</div> 
                <div class="col-sm-4 text-left"><?php echo $dados['email'];?></div> 
                <div class="col-sm-4 text-right"><img src="https://hpanel-main.hostinger.com/img/right-angle-bracket.svg"></div> 
                </div>
            </a>
        </div>
    </div>
</div>
    
    
    <div class="container-fluid" style="padding:0px;">
    <div class="row">
        <div class="col-sm-12" style="padding: 0px; margin:5px;">
            <a class="btn btn-default btn-block " style='border:solid 1px #ccc; padding:15px;  background-color: #fff;' data-bs-toggle="modal" href="#exampleModalToggle" role="button">
               <div class="row">
                     <div class="col-sm-4 text-left">Celular</div> 
                <div class="col-sm-4 text-left">
                    <?php 
                        if($dados['celular'] == 0)
                        {
                            echo "Não informado clique para atualizar";
                        }else
                        {
                            echo $dados['celular'];
                        }
                    ?>
                </div> 
                <div class="col-sm-4 text-right"><img src="https://hpanel-main.hostinger.com/img/right-angle-bracket.svg"></div> 
                </div>
            </a>
        </div>
    </div>
</div>
    
    
             
             <?php
              }
             ?>
         
          
      </div>
             
   </div>
          
          
           <div class="card-body">
             
<div class="modal fade" id="exampleModalToggle-senha" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Alterar senha</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Show a second modal and hide this one with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
      </div>
    </div>
  </div>
</div>


                <?php 
                     include 'processos/config.php';
                     $id_usuario = $_SESSION['id'];
                     $listLink = "SELECT * FROM usuario WHERE id='$id_usuario'";
                     $exe = mysqli_query($con,$listLink);
                     while($dados=mysqli_fetch_array($exe)){?>
<div class='container dados' style="background-color:#fff; padding:0px;">
<div class="container-fluid" style="padding:0px;">
    <div class="row">
        <div class="col-sm-12" style="padding: 0px;  1px green; margin:5px;">
            <strong><img src="https://hpanel-main.hostinger.com/img/lock-section.svg">Informações de segurança</strong><br><br>

            <a class="btn btn-default btn-block " style='border:solid 1px #ccc; padding:15px;  background-color: #fff;
}' data-bs-toggle="modal" href="#exampleModalToggle-senha" role="button">
               <div class="row">
                   
                     <div class="col-sm-4 text-left">Senha</div> 
                <div class="col-sm-4 text-left"><input type="password" value="<?php echo $dados['senha']?>" style="border:none;"></div> 
                <div class="col-sm-4 text-right"><img src="https://hpanel-main.hostinger.com/img/right-angle-bracket.svg"></div> 
                </div>
            </a>
        </div>
    </div>
</div>

    
    
             
             <?php
              }
             ?>
         
          
      </div>
             
   </div>