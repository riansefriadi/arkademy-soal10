<?php 
require_once 'asset/app.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>arkademy</title>
    <style>
    	.mt{
    		margin-top: 30px;
    	}
    	.font{
    		font-weight: bold;
    	}
    	.button-custom{
    		margin-bottom: 20px;
    	}
    	.card-btm{
    		margin-bottom: 30px;
    	}
    </style>
  </head>
  <body>
	<div class="container-fluid card-btm">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt">
				<div class="card">
					<div class="card-header text-center font">PRODUK</div>
					<div class="card-body">
						<button type="button" class="btn btn-outline-primary btn-sm button-custom" data-toggle='modal' data-target='#add'>
								Tambah Produk
						</button>
							
						<table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col" class="text-center">ID</th>
						      <th scope="col">NAMA PRODUK</th>
						      <th scope="col">KETERANGAN</th>
						      <th scope="col">HARGA</th>
						      <th scope="col">JUMLAH</th>
						      <th scope="col">OPSI</th>
						      <th scope="col">OPSI</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php $Lib = new Library();
						  	$show= $Lib->showProduk(); ?>
						  	<?php foreach ($show as $data) : ?>
						    <tr>
						      <th class="text-center"><?= $data['id']; ?></th>
						      <td><?= $data['nama_produk']; ?></td>
						      <td><?= $data['keterangan']; ?></td>
						      <td><?= number_format($data['harga']); ?></td>
						      <td><?= $data['jumlah']; ?></td>
						      <td>
						      	<a href="update.php?kode=<?= $data['id']; ?>">
						      		<button class="btn btn-outline-primary btn-sm">EDIT</button>
						      	</a>
						  	  </td>
							  <td>
							  	<a href="index.php?kode=<?= $data['id']; ?>">
							  		<button class="btn btn-outline-danger btn-sm">DELETE</button>	
							   	</a>
							  </td>
						    </tr>
						    <?php endforeach ?>
						  </tbody>
						  <?php $Lib = new Library();
						  if(isset($_GET['kode'])){
						  	$delet = $Lib->deletProduk(abs((int)$_GET['kode']));
						  	if($delet=='sukses'){
						  		echo "<script>alert('sukses delet produk');</script>";
						  		echo "<script>location='index.php';</script>";
						  	} }
						  	?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH PRODUK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" method="POST">
      		<div class="form-group">
      			<label for="exampleInputEmail1">Produk</label>
      			<input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
      		</div>

      		<div class="form-group">
      			<label for="exampleInputEmail1">Keterangan</label>
      			<input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
      		</div>

      		<div class="form-group">
      			<label for="exampleInputEmail1">Harga</label>
      			<input type="text" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
      		</div>

      		<div class="form-group">
      			<label for="exampleInputEmail1">Jumlah</label>
      			<input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
      		</div>
      		
      		<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-primary" name="kirim">Save</button>
      	</form>
      </div>
    </div>
  </div>
</div>

<?php if(isset($_POST['kirim'])){
		$nama_produk=strip_tags($_POST['nama_produk']);
		$keterangan=strip_tags($_POST['keterangan']);
		$harga=strip_tags($_POST['harga']);
		$jumlah=strip_tags($_POST['jumlah']);
		$Lib = new Library();
		$add=$Lib->addProduk($nama_produk,$keterangan,$harga,$jumlah);
		if($add=='sukses'){
			echo "<script>alert('sukses tambah produk');</script>";
			echo "<script>location='index.php';</script>";
		}
	} ?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>




