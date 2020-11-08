<?php
require 'function.php';
$temanonline = query("SELECT * FROM temanonline");
$result = mysqli_query($conn, "SELECT * FROM temanonline");

//tombol cari di klik
if ( isset($_POST["cari"])){
	$temanonline = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teman Onlen KU :v</title>
</head>
<body>

<h1>Daftar Teman Online</h1>

<a href="database.php">Tambah Data Teman (Klik Ini y telaso klo mau namanya mncl di kolom ;v)</a>
<br></br>

<form action="" method="post">

<input type="text" name="keyword" size="40" autofocus
 placeholder="Cari Nama Anda :v" autocomplete="off">
<button type="submit" name="cari">!Cari</button>

<br></br>

</form>
<table border="1" cellpadding="10" cellspacing="0">
	
<tr>
	

<th>No.</th>
<th>Aksi</th>
<th>Nama</th>
<th>Asal</th>
<th>Kelas</th>
<th>Email</th>
<th>Facebook</th>
<th>Gambar</th>
<th>Jurusan</th>

</tr>
<?php while( $row = mysqli_fetch_assoc($result) ) : ?>
<tr>
	
	<td>1</td>
	<td>
		<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
		<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
	</td>
		<td><?= $row["Nama"]; ?></td>
		<td><?= $row["Asal"]; ?></td>
		<td><?= $row["Kelas"]; ?></td>
		<td><?= $row["Email"]; ?></td>
		<td><?= $row["Facebook"]; ?></td>
		<td><img src="img/<?php echo $row["Gambar"] ?>"width="150"></td>
		<td><?= $row["Jurusan"]; ?></td>

	
</tr>
<?php endwhile; ?>
</table>
</body>
</html>


