<?php
session_start();
include "../connect.php";
// if user is not have session then redirect to login page
if (!isset($_SESSION['username'])) {
    header("location:../security/form-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Transaksi Selesai</title>
</head>
<body>
    <div class="flex">
        <div class="w-1/5 bg-gray-800 h-screen">
            <div class="flex items-center justify-center h-20">
                <div class="flex items-center">
                    <!-- <img src="../images/logo.png" alt="logo" class="h-10"> -->
                    <span class="text-white font-semibold text-2xl">Karyawan</span>
                </div>
            </div>
            <nav class="text-white text-base font-semibold pt-3">
                <a href="index.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="transaksi-selesai.php" class="flex items-center text-white py-4 pl-6 nav-item">
                    <i class="fas fa-users mr-3"></i>
                    Transaksi Selesai
                </a>
                <a href="transaksi-belumselesai.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-list mr-3"></i>
                    Transaksi Belum Selesai
                </a>
                <a href="pengaturan.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-utensils mr-3"></i>
                    Pengaturan
                </a>
                <a href="../security/logout.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Logout
                </a>
            </nav>
        </div>  
        <div class="w-4/5">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-semibold items-center justify-center" align="center">Transaksi Selesai</h1>
            <br>
            <br>
            <br>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="w-full bg-white">
                <thead>
                    <tr class="text-gray-800 border border-b-0">
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">ID Transaksi</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Customer</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal Transaksi</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Total Transaksi</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status Pesanan</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal Masuk</th>  
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE status = 'Selesai'");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr class="border border-b-0">
                            <td class="text-left py-3 px-4"><?php echo $no++; ?></td>
                            <td class="text-left py-3 px-4"><?php echo $data['id_transaksi']; ?></td>
                            <td class="text-left py-3 px-4"><?php echo $data['nama_customer']; ?></td>
                            <td class="text-left py-3 px-4"><?php echo $data['tanggal_transaksi']; ?></td>
                            <td class="text-left py-3 px-4"><?php echo $data['total_transaksi']; ?></td>
                            <td class="text-left py-3 px-4"><?php echo $data['status']; ?></td>
                            <td class="text-left py-3 px-4"><?php echo $data['tanggal_transaksi']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
