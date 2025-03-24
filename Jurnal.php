<?php
// koneksi.php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_kampus";

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari tabel mahasiswa
$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 2.5px solid black;
            padding: 20px;
            text-align: center;
        }
        th {
            background-color: #B8860B;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data Mahasiswa</h2>
    <table>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['NIM'] . "</td>";
            echo "<td>" . $row['NAMA'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
