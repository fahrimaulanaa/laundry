<?php
include "../connect.php";

$query = "SELECT id_transaksi, nama_customer, berat FROM transaksi
LEFT JOIN karyawan USING (id_karyawan) ORDER BY id_transaksi DESC";
$result = mysqli_query($koneksi, $query);
$num = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Matakuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Dosen Pengajar</th>
            <th>Aksi</th>
        </tr>
    </table>
</body>
</html>

<?php
include "../connect.php";
if($num > 0){
    $no = 1;
    while($data = mysqli_fetch_assoc($result)){
        //make table
        echo "<table border = '1'>";
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td>".$data['id_transaksi']."</td>";
        echo "<td>".$data['nama_customer']."</td>";
        echo "<td>".$data['berat']."</td>";
        echo "<td>".$data['id_karyawan']."</td>";
        echo "<td>".$data['nama_karyawan']."</td>";
        echo "</tr>";
        echo "</table>";
        $no++;
    }
}
?>