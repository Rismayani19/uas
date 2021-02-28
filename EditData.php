<?php
	include "Koneksi.php";
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
	$kode = isset($_POST["kode"]) ? $_POST["kode"] : "";
	$nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
	$harga = isset($_POST["harga"]) ? $_POST["harga"] : "";
	$simpan = isset($_POST["simpan"]) ? $_POST["simpan"] : "";
	if ($simpan AND $id != "" AND $kode != "" AND $nama != "" AND $harga != "")
	{
	 try {
	  $query = $koneksi->prepare("UPDATE barang SET kode_barang=:kode, nama_barang=:nama, harga_satuan=:harga WHERE id=:id");
	  	$query->bindParam(":id", $id);
	    $query->bindParam(":kode", $kode);
	    $query->bindParam(":nama", $nama); 
	    $query->bindParam(":harga", $harga);
	  if($query->execute()){
	    echo "<script>alert('Data Berhasil Di Perbaharui')</script>";
	  } else {
	    echo "<script>alert('Gagal Perbaharui Data')</script>";
	  }
	 }catch(PDOException $e){
		echo $e->getMessage();
	 }
	}

	/** Proses memilih data */
	if ($id != "")
	{
		try{
		 $query = $koneksi->prepare("SELECT * FROM barang WHERE id=:id");
		 $query->bindParam(":id", $id);
		 $query->execute();
		 $data = $query->fetch(PDO::FETCH_OBJ);
		 }catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>
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
          .btn{
		    background-color: #BDB76B;
		    color: #ffffff;
		    width: 100%;
		    font-weight: bold;
		  }
		  .btn:hover{
		    background-color: #ffffff;
		    border: 2px solid #BDB76B;
		    color: #BDB76B;
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
                        <a class="nav-link" href="Dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="KatalogAdmin.php">Katalog</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Beranda.php">Logout</a>
                    </li>
                </ul>
            </div>
    </nav>
	<div class="container">
		<div class="my-5">
	 		<div class="row justify-content-center">
	 			<div class="col-md-10">
	 				<div class="card">
	 					<div class="card-header text-center text-white" style="background-color:#E9967A; height: 45px">
	              			<h5 class="font-monospace fw-bold fs-4"> EDIT DATA BARANG</h5>
	              		</div>
	              		<div class="card-body bg-light">
							<form action="EditData.php" method="post">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
			                    <div class="mb-3 row">
			            	        <label class="col-sm-2 col-form-label">Kode Barang</label>
			                	    <div class="col-sm-10">
			                    		<input type="text" name="kode" class="form-control" placeholder="Kode Barang" value="<?php echo $data->kode_barang; ?>" required="">
			                    	</div>
			                    </div>
			                    <div class="mb-3 row">
			                    	<label class="col-sm-2 col-form-label">Nama Barang</label>
			                    	<div class="col-sm-10">
			                    		<input type="text" name="nama" class="form-control" placeholder="Nama Barang" value="<?php echo $data->nama_barang; ?>"required="">
			                    	</div>
			                    </div>
								<div class="mb-3 row">
			                    	<label class="col-sm-2 col-form-label">Harga Satuan</label>
			                    	<div class="col-sm-10">
			                    		<input type="text" name="harga" class="form-control" placeholder="Harga Satuan (Rp)" value="<?php echo $data->harga_satuan; ?>" required="">
			                    	</div>
			                    </div>
								<div class="mb-3 row">
	                    			<label class="col-sm-2 col-form-label">Gambar</label>
	                    			<div class="col-sm-10">
	                 			   		<input type="file" name="foto" class="form-control">
	                    			</div>
	                    		</div> 
			 					<br />
								<div class="mb-3">
		               				 <button type="submit" name="simpan" value="Simpan" class=" btn">Simpan</button>
		            			</div>
			 				</form>
				 		</div>
				 	</div>
				 </div>
			</div>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>