

    <?php
    	include('../config/koneksi.php');
    	
    	$nama 			= $_POST['nama'];
		$tahun_terbit 	= $_POST['tahun_terbit'];
		$penulis		= $_POST['penulis'];
		$penerbit		= $_POST['penerbit'];
		$kategori		= $_POST['kategori'];
		$sinopsis 		= $_POST['sinopsis'];

    	$fileinfo		=PATHINFO($_FILES["sampul"]["name"]);
    	$newFilename	=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    	move_uploaded_file($_FILES["sampul"]["tmp_name"],"sampul/" . $newFilename);
    	$location		="sampul/" . $newFilename; 

    	$lokasi_file	= $_FILES['berkas']['tmp_name'];
		$nama_file 		= $_FILES['berkas']['name'];
		$folder 		= "berkas/$nama_file";

		if (move_uploaded_file($lokasi_file,"$folder")){
			mysqli_query($koneksi,"insert into buku (nama, tahun_terbit, id_penulis, id_penerbit, id_kategori, sinopsis, sampul, berkas) values ('$nama', '$tahun_terbit', $penulis, $penerbit, '$kategori', '$sinopsis', '$location', '$folder')");
			print "<script>alert(\"Sukses Input Data\"); location.href = \"buku.php\"; </script>";
	    	// header('location:buku.php');
		}
		else{
			echo "File gagal di upload";
		}
    ?>