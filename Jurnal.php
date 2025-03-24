<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan user MySQL kamu
$password = ""; // Kosongkan jika tidak ada password
$dbname = "db_kampus";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel mahasiswa
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
        </tr>
        <?php
        $no = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$row['nim']}</td>
                        <td>{$row['nama']}</td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
