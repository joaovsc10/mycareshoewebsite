
<?php  
			session_start();
			if(!isset($_SESSION['id']))
			{
			    // restrição para o caso de inserir o endereço sem ter feito login
			    header('Location: log_in.html');
			    exit();
			}
			 $connect = mysqli_connect("localhost", "root", "", "telesaude");
			 $id_paciente=$_SESSION['id'];
			 $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			 $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_STRING);
			 $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			 $funcao_id = filter_input(INPUT_POST, 'funcao_id', FILTER_SANITIZE_STRING);
			 $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			 $password=sha1($password);
			 if(isset($_POST["insert1"]))  
			 {      
			      $query = "UPDATE login_signup SET nome='$nome', email='$email', idade='$idade', username='$username', password='$password', modified=NOW() WHERE id='$id_paciente' ";  
			      if(mysqli_query($connect, $query))  
			      {
			      		$_SESSION['username'] = $username; 
			      		$_SESSION['password'] = $password;  
			           header("location: index.php");   
			      }
			      
			     
			 }  
			 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Telesaude">
    <meta name="author" content="Telesaude">
    <meta name="keywords" content="Telesaude">

    <!-- Title Page-->
    <title>Mudança de informações pessoais</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main_1.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Mudança de informações pessoais</h2>
                    <form form method="POST" >
                        
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NOME COMPLETO" name="nome">
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="IDADE" name="idade">
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="USERNAME" name="username">
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="E-MAIL" name="email">
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="PASSWORD" name="password">
                        </div>
                        
                        
                        <div class="p-t-20">
                            <input type="submit" name="insert1" id="insert1" value="Alterar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>