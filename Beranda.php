<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Fashion Queen</title>
    <style type="text/css">
        .navbar-expand-lg {
            background-color: #DEB887;
            font-size:18px;
        }
        .ftprofil{
         width: 200px;
         height: 200px;
         border-radius: 100%;
         margin-left:auto;
         margin-right:auto;
         display:block;
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
	<div class="container">
	   <div class="my-5">
           <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card-body text-center text-white" style="background-color:#E9967A ;border-radius: 8px">
    				<h2>Welcome, Fashion Queen</h2><br />
                    <img src="Logo.jpg" class="ftprofil" /><br />
    				<p>Fashion Queen adalah Online Shop yang menjual Fashion wanita seperti Rok Lipit Modern, Baju Gamis serta Hoodie pun kami jual. Shop ini merupakan tugas pengganti 
    				Ujian Akhir Semester pada Mata Kuliah Pemrograman Web 2.</p>
    				<p>Aplikai Ini dikembangkan oleh :<br>20192115012- Rismayani</p>
    				
    				<p>Terima kasih telah membuka website kami</p>
                </div>
              </div>
			</div>
		</div>
	 </div>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>