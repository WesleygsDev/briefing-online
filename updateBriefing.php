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
       
       @media only screen and (min-width:500px)
      {
        
      .boxFilds2{margin: auto;
      position: relative;
      width: 580px;
      margin-bottom: 10px;
      padding: 23px;
      border-radius: 6px;
      background-color: #fff;
      -webkit-box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);
      -moz-box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);
      box-shadow: 0px 0px 19px -14px rgba(0,0,0,0.75);
      border-bottom:solid 3px #e3790e;
      }
      }
      @media only screen and (min-width:500px)
      {
      .boxBtupdate{margin: auto;
      position: relative;
      width: 580px;
      margin-bottom: 10px;
      padding: 23px;
      border-radius: 6px;
      margin-bottom: 100px;
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
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
          <center>
              <a href="index.php"><div class="btn btn-default" style="border:solid 1px #bcbcbc">Cancelar atualização</div></a>
          </center>
       <form action="processos/processo-atualizacao-briefing.php" method="post">
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
            <br/>
            <?php 
               include 'processos/config.php';
               $getBriefing = $_GET['id_briefing'];
               $select = "SELECT * FROM briefing WHERE id_briefing='$getBriefing'";
               $exe = mysqli_query($con, $select);
               while($dado=mysqli_fetch_array($exe)){
                   
                   $titulobriefing = $dado['titulo_briefing'];
                   
                   echo "<center><h1>$titulobriefing</h1></center><br>";
                   
                   
                   //LOOP PARA O TÍTULO DO BRIEFING DO IMPUT DO TIPO TEXTO
                   $titulo = $dado['titulo_briefing'];
                   $titulo = explode(",", $titulo);
                   
                   $htmlListaTitulo = "<div>";
                   foreach ($titulo as $dadosTituloBriefing) {
                      $htmlListaTitulo .= "
                      
                      <input type='hidden' value='$getBriefing' name='id_briefing'>
                      <div class='boxFilds2'><strong>* Título</strong><br><input name='titulo_briefing' type='text' style='border:none;' class='form-control-lg btn-block' value='$dadosTituloBriefing' placeholder='Título do Briefing'></div>";
                   }
                   $htmlListaTitulo .= "<div>";
                   echo $htmlListaTitulo;
                   //FIM DO LOOP
                   
                   
               
                   //LOOP PARA AS PERGUNTAS DENTRO DO INPUT DO TIPO TEXTO
                   $lista = $dado['perguntas'];
                   $lista = explode(",", $lista);
                   
                   $htmlLista = "<div>";
                   foreach ($lista as $item) {
                      $htmlLista .= "<div class='boxFilds'><strong>* Pergunta</strong><br><input name='pergunta[]' type='text' style='border:none;' class='form-control-lg btn-block' value='$item'></div>";
                   }
                   $htmlLista .= "<div>";
                   echo $htmlLista;
                   //FIM DO LOOP
                   
                   
                   
                   
                   echo "<div id='dynamicDiv'></div>
               <div class='container boxBtupdate'>
               <div class='row'>
               <div class='col-sm-6'>
                   <center>
               <a class='btn btn-primary btn-block' href='javascript:void(0)' id='addInput'>
               <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>
               Adicionar nova pergunta
               </a>            
               </center>
               </div>
               
               <div class='col-sm-6'>
                   <center>
               <input type='submit' value='Atualizar' class='btn btn-success btn-block' href='' id=''>
               <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>
               
                         
               </center>
               </div>
               
               </div>
                </div>
               <br/>
               <script>
               $(function () {
                 var scntDiv = $('#dynamicDiv');
               
                 $(document).on('click', '#addInput', function () {
                     $('<p class='boxFilds'><strong>* Título</strong><br>'+
                    		'<input type='text' required name='pergunta[]' class='form-control-lg btn-block' id='inputeste'' size='20 value='' placeholder='Digite a nova pergunta' / style='border:none;'> '+
                    		'<a  href='javascript:void(0)' id='remInput'>'+
               		'<span class='glyphicon glyphicon-minus' aria-hidden='true'></span> '+
               		'<i class='far fa-trash-alt text'></i>'+ 
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
               </div>";}
               ?>
       
         
         

</form>
       </div>
   </div>
</div>





