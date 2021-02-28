<?php
include "Koneksi.php";
$kode = isset($_POST["kode"]) ? $_POST["kode"] : "";
$nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
$harga = isset($_POST["harga"]) ? $_POST["harga"] : "";
$simpan = isset($_POST["simpan"]) ? $_POST["simpan"] : "";
if ($simpan AND $kode != "" AND $nama != "" AND $harga != "")
{
  $file_name = $_FILES['foto']['name'];
  $file_temp = $_FILES['foto']['tmp_name'];
  $allowed_ext = array("jpg", "jpeg", "gif", "png");
  $exp = explode(".", $file_name);
  $ext = end($exp);
  $path = "foto/".$file_name;
  if(in_array($ext, $allowed_ext)){
    if(move_uploaded_file($file_temp, $path)){
      try {
        $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $koneksi->prepare("INSERT INTO barang (kode_barang, nama_barang, harga_satuan, foto) VALUES (:kode, :nama, :harga, :file_name)");
        $query->bindParam(":kode", $kode);
        $query->bindParam(":nama", $nama);
        $query->bindParam(":harga", $harga);
        $query->bindParam(":file_name", $file_name);
        if ($query->execute())
        {
          echo "<script>alert('Data berhasil disimpan')</script>";
        }
        else
        {
          echo "<script>alert('Data gagal disimpan')</script>";
        }
      }
      catch(PDOExcaption $e){
        echo $e->getMessage();
      }
    }
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
            width: 100%;
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header text-center text-white" style="background-color: #E9967A; height: 45px">
                <h5 class="font-monospace fw-bold fs-4"> INPUT DATA BARANG</h5></div>
                  <div class="card-body bg-light">
                    <form action="Input_Barang.php" method="post" enctype="multipart/form-data">
                      <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Kode Barang</label>
                         <div class="col-sm-10">
                            <input type="text" name="kode" class="form-control" placeholder="Kode Barang">
                          </div>
                        </div>
                          <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                              <input type="text" name="nama" class="form-control" placeholder="Nama Barang">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Harga Barang</label>
                            <div class="col-sm-10">
                              <input type="text" name="harga" class="form-control" placeholder="Harga Barang">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                              <input type="file" name="foto" class="form-control" placeholder="File Foto">
                            </div>
                          </div>
                          <br />
                          <div class="mb-3">
                            <button type="submit" name="simpan" value="Simpan" class=" btn btn" style="background-color: #BDB76B; color: white">Simpan</button>
                          </div>
                          <div class="mb-3">
                              <a href="KatalogAdmin.php" class="form-control btn" style="background-color: #66CDAA; color: white">Lihat Katalog</a>
                          </div>
                      </form>
                  </div>
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