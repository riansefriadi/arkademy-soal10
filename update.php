
<?php 
require_once 'asset/app.php';
$Lib = new Library();
if(isset($_GET['kode'])){
	$add= $Lib->edit(abs((int)$_GET['kode']));
	$data=$add->fetch(PDO::FETCH_ASSOC); } 
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
					<div class="card-header text-center font">UPDATE PRODUK</div>
					<div class="card-body">
						<form action="" method="POST">
				      		<div class="form-group">
				      			<label for="exampleInputEmail1">Produk</label>
				      			<input type="text" name="nama_produk" value="<?= $data['nama_produk']  ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
				      		</div>

				      		<div class="form-group">
				      			<label for="exampleInputEmail1">Keterangan</label>
				      			<input type="text" value="<?= $data['keterangan']  ?>" name="keterangan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
				      		</div>

				      		<div class="form-group">
				      			<label for="exampleInputEmail1">Harga</label>
				      			<input type="text" name="harga" value="<?= $data['harga'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
				      		</div>

				      		<div class="form-group">
				      			<label for="exampleInputEmail1">Jumlah</label>
				      			<input type="text" value="<?= $data['jumlah']?>" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
				      		</div>
				      		
				      		<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
				      </div>
				      <div class="modal-footer">
				        <button type="submit" class="btn btn-outline-primary" name="kirim">Save</button>
				      	</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	<?php if(isset($_POST['kirim'])){
		$id = $data['id'];
		$nama_produk=strip_tags($_POST['nama_produk']);
		$keterangan=strip_tags($_POST['keterangan']);
		$harga=strip_tags($_POST['harga']);
		$jumlah=strip_tags($_POST['jumlah']);
		$Lib = new Library();
		$add=$Lib->updateProduk($id,$nama_produk,$keterangan,$harga,$jumlah);
		if($add=='sukses'){
			echo "<script>alert('sukses update produk');</script>";
			echo "<script>location='index.php';</script>";
		}
	} ?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>