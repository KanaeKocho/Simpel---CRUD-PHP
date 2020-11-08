<?php
require 'function.php';

//tombol cari di klik
if (isset($_POST["submit"])) {
	$cari = $_POST["cari"];
	$result = mysqli_query($conn, "SELECT * FROM temanonline WHERE Nama LIKE '$cari%'");
} else {
	$result = mysqli_query($conn, "SELECT * FROM temanonline");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Teman Onlen KU :v</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">

<body>
	<div align="center">
		<h1>Daftar Teman Online (ini gabut doang)</h1>

		<a href="tambah.php" style="color: black;">Tambah Data Teman (Klik Ini y telaso klo mau namanya mncl di kolom ;v)</a>
		<br></br>
		<a href="login.php" style="color: black;">Klik Disini Untuk Mengubah Dan Menambahkan Data (Only Admin)</a>
		<br></br>

		<form action="index.php" method="post">

			<input type="text" name="cari" size="40" autofocus placeholder="Cari Nama Anda :v" autocomplete="off">
			<button type="submit" name="submit">!Cari</button>

			<br></br>

		</form>
		<div align="center">
			<table border="1" cellpadding="25" cellspacing="0">
		</div>
		<tr>


			<th>No.</th>
			<th>Nama</th>
			<th>Asal</th>
			<th>Kelas</th>
			<th>Email</th>
			<th>Facebook</th>
			<th>Gambar</th>
			<th>Jurusan</th>

		</tr>
		<?php while ($row = mysqli_fetch_assoc($result)) : ?>
			<tr>

				<td>1</td>
				<td><?= $row["Nama"]; ?></td>
				<td><?= $row["Asal"]; ?></td>
				<td><?= $row["Kelas"]; ?></td>
				<td><?= $row["Email"]; ?></td>
				<td><?= $row["Facebook"]; ?></td>
				<td><img src="img/<?php echo $row["Gambar"] ?>" width="150"></td>
				<td><?= $row["Jurusan"]; ?></td>


			</tr>
		<?php endwhile; ?>
		</table>
</body>

</html>
