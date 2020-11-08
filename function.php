<?php

//Koneksi Ke Database

$conn = mysqli_connect("localhost", "root", "", "phpdasar");

//query
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;
    $Nama = htmlspecialchars($data["Nama"]);
    $Asal = htmlspecialchars($data["Asal"]);
    $Kelas = htmlspecialchars($data["Kelas"]);
    $Email = htmlspecialchars($data["Email"]);
    $Facebook = htmlspecialchars($data["Facebook"]);
    //uploa gambar
    $Gambar = upload();
    if (!$Gambar) {
        return false;
    }
    $Jurusan = htmlspecialchars($data["Jurusan"]);

    $query = "INSERT INTO temanonline VALUES ('', '$Nama', '$Asal', '$Kelas', '$Email', '$Facebook', '$Gambar', '$Jurusan')
";
    mysqli_query($conn, $query);
}

function upload()
{
    $namaFile = $_FILES['Gambar']['name'];
    $ukuranFile = $_FILES['Gambar']['size'];
    $error = $_FILES['']['error'];
    $tmpName = $_FILES['Gambar']['tmp_name'];
    //cek apakah gambar tidak ada yang diupload
    if ($error === 4) {
        echo "<script>

alert('pilih gambar terlebih dahulu');

        </script>
        
        
        ";
        return false;
    }

    //cek yg diupload gambar atau bukan
    $ekstenssiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstenssiGambarValid)) {
        echo "<script>

alert('yang anda upload bukan gambar');

        </script>
        
        
        ";
        return false;
    }

    //cekl jika ukurannya terlalu besar 
    if ($ukuranFile > 10000000) {
        echo "<script>

alert('Ukuran Gambar Terlalu Besar !');

        </script>
        
        
        ";
        return false;
    }

    //loloskan pengecekan gambar siap di upload
    move_uploaded_file($tmpName, 'img/' . $namaFile);

    return $namaFile;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM temanonline WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $Nama = htmlspecialchars(["Nama"]);
    $Asal = htmlspecialchars($data["Asal"]);
    $Kelas = htmlspecialchars($data["Kelas"]);
    $Email = htmlspecialchars($data["Email"]);
    $Facebook = htmlspecialchars($data["Facebook"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $Jurusan = htmlspecialchars($data["Jurusan"]);

    //cek apakah user pilih gambar atau tidak
    if ($_FILES['Gambar']['error'] === 4) {
        $Gambar = $gambarLama;
    } else {
        $gambar = upload();
    }







    $query = "UPDATE temanonline SET 
    Nama = '$Nama',
    Asal = '$Asal',
    Kelas = '$Kelas',
    Email = '$Email',
    Facebook = '$Facebook',
    Gambar = '$Gambar',
    Jurusan = '$Jurusan'
WHERE id = $id

       
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if ($password !== $password2) {

        echo "

    <script>
    alert('Konfirmais Password Tidak Sesuai);
    </script>";

        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru kedalam database

    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}
