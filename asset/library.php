<?php
/**
 * Library
 */
require_once'app.php';
class Library extends Koneksi
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function showProduk(){
		$this->stmt=$this->dbh->prepare("SELECT * FROM produk ORDER BY id DESC");
		$this->stmt->execute();
		return $this->stmt;
	}
	public function addProduk($nama_produk,$keterangan,$harga,$jumlah){
		$sql="INSERT INTO produk (id,nama_produk,keterangan,harga,jumlah) VALUES (0,'$nama_produk','$keterangan','$harga','$jumlah')";
		$this->stmt=$this->dbh->prepare($sql);
		$query=$this->stmt->execute(array($nama_produk,$keterangan,$harga,$jumlah));

		if(!$query){
			return'failed';
		}else{
			return'sukses';
		}
	}

	public function edit($id){
		$this->stmt=$this->dbh->prepare("SELECT* FROM produk WHERE id='$id'");
		$this->stmt->execute();
		return $this->stmt;
	}

	public function updateProduk($id,$nama_produk,$keterangan,$harga,$jumlah){
		$sql="UPDATE produk SET nama_produk = '$nama_produk', keterangan ='$keterangan', harga='$harga',jumlah='$jumlah' WHERE id='$id'";
		$this->stmt=$this->dbh->prepare($sql);
		$query=$this->stmt->execute(array($id,$nama_produk,$keterangan,$harga,$jumlah));

		if(!$query){
			return'failed';
		}else{
			return'sukses';
		}
	}


	public function deletProduk($id){
		$this->stmt=$this->dbh->prepare("DELETE FROM produk WHERE id='$id'");
		$query=$this->stmt->execute();
		if(!$query){
			return 'failed';
		}else{
			return 'sukses';
		}
	}

	// end class
}