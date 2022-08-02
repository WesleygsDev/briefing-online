<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <title>Login | Briefingonline</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<head>
    <style>
        .bg-gradient-primary{
            background-image: none!important;
            background-color:#fff!important;
        }
        
        .bg-gradient-primary{background-color:none!important;}
        
        form.user .form-control-user
        {
                border-radius: 10px;
                padding: 27px;
                border: solid 1px #b3b3b3;
                font-family: montserrat;
                font-size: 17px;
                font-weight: 400;
                color: #000!important;
        }
        
        .btn-primary 
        {
            color: #fff;
            background-color: #4e73df;
            border-color: #4e73df;
            border-radius: 6px!important;
            padding: 15px!important;
            font-size: 16px!important;
            font-weight: bold;
        }
        
        .bg-gradient-primary a{color:#585858!important; font-weight: 500;}
        
        body{font-family: montserrat;}
    </style>
</head>
    
    <script>
    
    </script>
</head>

<body class="bg-gradient-primary">

    <div class="container">
        
        



        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="img/logo.png">
                                        <h1 class="h4 text-gray-900 mb-4"><br>Faça login em sua conta</h1>
                                    </div>
                                    <form class="user" method="post" action="processos/processo-login.php">
                                        <div class="form-group">
                                            <input type="email" id="email" class="form-control form-control-user"
                                                 aria-describedby="emailHelp"
                                                placeholder="Digite seu E-mail..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="senha" class="form-control form-control-user"
                                                 placeholder="Digite sua senha..." name="senha">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Lembrar-me</label>
                                            </div>
                                        </div>
                                        <button  type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Entrar" id="entrar">Entrar</button>
                                        <hr>
                                        <!--<a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login com o Google 
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login com Facebook
                                        </a>-->
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Esqueceu sua senha?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Criar conta grátis!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <center><span style="font-size:12px;">Todos os Direitos Reservados | Briefingonline 2022</span></center><br>
    </div>
    <!-- Bootstrap core JavaScript-->
    

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>