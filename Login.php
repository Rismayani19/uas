<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Fashion Queen : Beranda</title>
    <style type="text/css">
        .navbar-expand-lg {
            background-color: #DEB887;
            font-size:18px;
        }
	  .btn{
	    background-color: #008B8B;
	    color: #ffffff;
	    width: 100%;
	    font-weight: bold;
	  }
	  .btn:hover{
	    background-color: #ffffff;
	    border: 2px solid #008B8B;
	    color: #008B8B;
	  }
	  .card{
	    background-color: #F5F5F5;
	    border-radius: 8px;
	  }
	</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Fashion Queen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="Beranda.php">Beranda</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Katalog.php">Katalog</a>
                    </li>
                    <?php
                        if (isset($_SESSION["pengguna"])){
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="?page=logout">Logout</a>
                    </li>
                    <?php
                        } else {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="Login.php">Login</a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
	<?php 
		$username = isset($_POST["username"]) ? $_POST["username"] : "";
		$password = isset($_POST["password"]) ? $_POST["password"] : "";
		$cmdLogin = isset($_POST["cmdLogin"]) ? $_POST["cmdLogin"] : "";
		$notifikasi = "";
		
		if ($cmdLogin AND $username != "" AND $password != ""){
			$nama_pengguna = "Risma";
		  	$kata_sandi = "20192115012";
		  	if ($username == $nama_pengguna AND $password == $kata_sandi){
		   		$_SESSION["pengguna"]["namapengguna"] = $nama_pengguna; 
			} else {
				$notifikasi = "Nama Pengguna atau Kata Sandi Tidak Sesuai";
		  	}
		}
		if (isset($_SESSION["pengguna"])){
			header("Location: Dashboard.php");
		}
	?>
	<div class="container">
	  <div class="my-5">
	    <div class="row justify-content-center">
	      <div class="col-sm-5">
	        <div class="card">
	          <div class="card-header text-white text-center" style="background-color: #F08080; height: 50px">
	          <h4 style="font-family: sans-serif"> Login your account</h4>
	          </div>
	            <div class="card-body text-dark">
				<form action="Login.php" method="post">
				<div class="mb-3">
						<label class="form-label">Username</label>
						<input type="text" class="form-control" name="username" required="">
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="password" class="form-control" required="">
					</div>
					<div class="mb-3">
						<button type="submit" name="cmdLogin" value="Login" class="btn btn-primary">Login</button>
					</div>
				</form>
				</div>
			</form>
			</div> 
	        </div>
	      </div>
	    </div> 
	  </div>
	</div>
	<?php
		if ($notifikasi != ""){
	?>
			<script type="text/javascript">alert("<?php echo $notifikasi; ?>")</script>
	<?php

		}
	?>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>