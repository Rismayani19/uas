  <?php
  include "Koneksi.php";
  $id=isset($_POST["id"]) ? $_POST["id"] : "";
  $hapus=isset($_POST["hapus"]) ? $_POST["hapus"] : "";
  if ($hapus AND $id != "")
  {
    try {
        $query = $conn->prepare("DELETE FROM barang WHERE id=:id");
        $query->bindParam(":id", $id);
        if ($query->execute())
        {
        echo "<script>alert('Data berhasil dihapus')</script>";
        }
        else
        {
        echo "<script>alert('Data gagal dihapus')</script>";
        }
    }
      catch(PDOException $e){
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
    <div class="my-4">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <h3 class="text-center">Daftar Barang Fashion Queen</h3>
          <table class="table table-striped table-hover text-center">
            <thead style="background-color:  #E9967A;color: white">
                 <tr>
                   <th>No</th>
                   <th>Kode Barang</th>
                   <th>Nama Barang</th>
                   <th>Harga Satuan (Rp)</th>
                   <th>Gambar</th>
                 </tr>
            </thead>
        <tbody>
             <?php
                try{
                  $query = $koneksi->prepare("SELECT * FROM barang");
                  $query->execute();
                   $no = 1;
                   while ($data = $query->fetch(PDO::FETCH_OBJ))
                   {
                   echo "<form action='Katalog.php' method='post'>";
                   echo "<input type='hidden' name='id' value='".$data->id."'>";
                   echo "<tr>";
                     echo "<td>".$no."</td>";
                     echo "<td>".$data->kode_barang."</td>";
                     echo "<td>".$data->nama_barang."</td>";
                     echo "<td>".$data->harga_satuan."</td>";
                     echo "<td><img src='foto/".$data->foto."' widht='100' height='100'></td>";
                   echo "</tr>";
                   echo "</form>";
                   $no++;
                   }
                }
                catch(PDOException $e){
                  echo $e->getMessage();
                }
             ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>