<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'peminjaman_brg');
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Gagal menampilkan database: " . mysqli_error($connect));

function kuery($kueri)
{
    global $konek;
    $result = mysqli_query($konek, $kueri);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah_barang($data)
{
    global $connect;

    $kode_barang = htmlspecialchars($data['kode_brg']);
    $nama_barang = htmlspecialchars($data['nama_brg']);
    $kategori = htmlspecialchars($data['kategori']);
    $merk = htmlspecialchars($data['merk']);
    $jumlah = htmlspecialchars($data['jumlah']);

    $sql = "INSERT INTO barang (id, kode_brg, nama_brg, kategori, merk, jumlah) VALUES (null, '$kode_barang', '$nama_barang', '$kategori', '$merk', '$jumlah')";

    if (mysqli_query($connect, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        return false;
    }
}

function tambah_peminjaman($data)
{
    global $connect;

    $tgl_pinjam = htmlspecialchars($data['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($data['tgl_kembali']);
    $no_identitas = htmlspecialchars($data['no_identitas']);
    $kode_barang = htmlspecialchars($data['kode_barang']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $keperluan = htmlspecialchars($data['keperluan']);
    $status = htmlspecialchars($data['status']);
    $id_login = htmlspecialchars($data['id_login']);

    $sql = "INSERT INTO peminjaman (id, tgl_pinjam, tgl_kembali, no_identitas, kode_barang, jumlah, keperluan, status, id_login) VALUES (null, '$tgl_pinjam', '$tgl_kembali', '$no_identitas', '$kode_barang', '$jumlah', '$keperluan', '$status', '$id_login')";

    if (mysqli_query($connect, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        return false;
    }
}

function editdata($tablename, $id)
{
    global $connect;
    $sql = mysqli_query($connect, "SELECT * FROM $tablename WHERE id = '$id'");
    return $sql;
}

function get_barang_by_id($id)
{
    global $connect;
    $result = mysqli_query($connect, "SELECT * FROM barang WHERE id = $id");
    return mysqli_fetch_assoc($result);
}
function update($data)
{
    global $connect;
    $hasil = mysqli_query($connect, $data);
    return $hasil;
}

function add($data)
{
    global $connect;

    $note = $data["notes"];

    $query = "INSERT INTO notes (id,note,created_at) VALUES (null,'$note',null)";
    $sql = mysqli_query($connect, $query);
    return $sql;
}

function cek_login($username, $password)
{
    global $connect;
    $uname = $username;
    $upass = $password;

    $hasil = mysqli_query($connect, "select * from user where username ='$uname' and password='$upass'");
    $cek = mysqli_num_rows($hasil);

    if ($cek > 0) {
        $sql = mysqli_fetch_array($hasil);
        $_SESSION['username'] = $sql['username'];
        $_SESSION['role'] = $sql['role'];
        return true;
    } else {
        return false;
    }
}
?>