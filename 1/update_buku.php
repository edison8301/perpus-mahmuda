<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$tahun_terbit = $_POST['tahun_terbit'];
$sinopsis = $_POST['sinopsis'];

$fileinfo=PATHINFO($_FILES["sampul"]["name"]);
$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
move_uploaded_file($_FILES["sampul"]["tmp_name"],"sampul/" . $newFilename);
$location="sampul/" . $newFilename; 

$lokasi_file = $_FILES['berkas']['tmp_name'];
		$nama_file   = $_FILES['berkas']['name'];
		$folder = "berkas/$nama_file";

		if (move_uploaded_file($lokasi_file,"$folder")){
			mysqli_query($koneksi,"update buku set nama='$nama', tahun_terbit='$tahun_terbit', sinopsis='$sinopsis', sampul='$location', berkas='$folder'");
	    	print "<script>alert(\"Data Berhasil Diupdate\"); location.href = \"buku.php\"; </script>";
		}
		else{
			echo "File gagal di upload";
		}
 
?>