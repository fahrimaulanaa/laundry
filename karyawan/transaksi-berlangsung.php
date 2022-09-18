<?php
session_start();
include "../connect.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Transaksi Berlangsung</title>
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
            <hr class="border-white">
            <nav class="text-white text-base font-semibold pt-3 ">
                <a href="transaksi-berlangsung.php" class=" font-bold flex items-center text-white opacity-100 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Transaksi Berlangsung
                </a>
                <a href="transaksi-selesai.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-users mr-3"></i>
                    Transaksi Selesai
                </a>
                <a href="transaksi-dibatalkan.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-list mr-3"></i>
                    Transaksi Dibatalkan
                </a>
                <a href="manage-food.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-utensils mr-3"></i>
                    Transaksi Belum Diproses
                </a>
                <a href="../security/logout.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Logout
                </a>
            </nav>
        </div>  
        <div class="w-4/5 bg-gray-200">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-semibold items-center justify-center" align="center">Transaksi Berlangsung</h1>
            <br>
            <br>
            <br>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="w-full bg-white">
                <thead class="border-b bg-gray-800">
                    <tr class="text-white text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            No
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Id Transaksi
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Nama Customer
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Harga
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Tanggal
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Status
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    $sql = "SELECT * FROM transaksi WHERE status = 'diproses' OR status = 'diantar' OR status = 'pencucian' OR status = 'pengeringan'";
                    $result = mysqli_query($koneksi, $sql);
                    $no = 1;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td class="px-6 py-4">
                                    <?php echo $no++; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row['id_transaksi']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row['nama_customer']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row['total_transaksi']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row['tanggal_transaksi']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row['status']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="selesaikan-transaksi.php?id_transaksi=<?php echo $row['id_transaksi']; ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Selesai</a>
                                </td>
                            </tr>
                    <?php
                            $no++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</body>
</html>
