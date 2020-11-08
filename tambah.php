<?php
require 'function.php';
//cek apakah data berhasil ditambahkan
if( isset($_POST["submit"]) ){

	if( tambah($_POST) > 0 ) {
		echo "
		
		<script>

		alert('selamat kamu jdi teman onlen kuh ;v');
		document.location.href = 'index.php';
		</script>
		
		
		";
	} else {
		echo "<script>

		alert('selamat kamu jdi teman onlen kuh ;v');
		document.location.href = 'index.php';
		</script>";
	}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Isi Forum Nya k1 ;'v</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
<div align="center">
<h1>Silahkan Isi Forumnya k1 ;'v</h1>
<form action="" method="post" enctype="multipart/form-data">
	<ul>
<li>
	
<label for="Nama">Nama :</label>

	<input type="text" name="Nama" id="Nama" required>
</li>

<li>
	
<label for="Asal">Asal :</label>

	<input type="text" name="Asal" id="Asal">


</li>

<li>
<label for="Kelas">Kelas :</label>

	<input type="text" name="Kelas" id="Kelas">

</li>

<li>
	


	<label for="Email">Email :</label>

	<input type="text" name="Email" id="Email">
</li>

<li>
	

<label for="Facebook">Facebook :</label>

	<input type="text" name="Facebook" id="Facebook">

</li>

<li>
	
<label for="Gambar">Gambar :</label>

	<input type="file" name="Gambar" id="Gambar">
</li>

<li>
	

	<label for="Jurusan">Jurusan :</label>

	<input type="text" name="Jurusan" id="Jurusan">
</li>
<li>
	
	<button type="submit" name="submit">Tombol Submit</button>
</li>
	</ul>


</form>
</body>
</html>
