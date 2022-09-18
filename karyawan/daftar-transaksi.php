<?php
session_start();
include "../connect.php";
include "header.php";

// if user is not have session, redirect to login page
if (!isset($_SESSION['username'])) {
    header('location:../security/form-login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Daftar Transaksi</title>
</head>

<body>
    <script src="../javascript/index.js"></script>
    <br>
    <div class=" flex flex-wrap justify-center" id="transaksi-berlangsung">
        <div class="w-1/4 p-4">
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Transaksi Berlangsung</h5>
                </div>
                <div class="p-5">
                    <?php
                    include "../connect.php";
                    $sql = "SELECT * FROM  transaksi WHERE status = 'diproses' or status = 'pencucian' or status = 'pengeringan' or status = 'setrika'";
                    $result = mysqli_query($koneksi, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    ?>
                    <h3 class="text-3xl text-gray-700 font-bold leading-none mb-3"><?php echo $resultCheck; ?></h3>
                    <div class="text-sm text-gray-600">
                        <span class="text-green-500 pr-1"><i class="fas fa-caret-up"></i> 3.55%</span>
                        <span class="whitespace-no-wrap">Since last month</span>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <a href="transaksi-berlangsung.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" target="blank">Cek Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 p-4">
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Transaksi Selesai</h5>
                </div>
                <div class="p-5">
                    <?php
                    include "../connect.php";
                    $sql = "SELECT * FROM  transaksi WHERE status = 'selesai'";
                    $result = mysqli_query($koneksi, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    ?>
                    <h3 class="text-3xl text-gray-700 font-bold leading-none mb-3"><?php echo $resultCheck; ?></h3>
                    <div class="text-sm text-gray-600">
                        <span class="text-green-500 pr-1"><i class="fas fa-caret-up"></i> 3.55%</span>
                        <span class="whitespace-no-wrap">Since last month</span>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <a href="transaksi-selesai.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" target="blank">Lihat Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 p-4">
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Transaksi Dibatalkan</h5>
                </div>
                <div class="p-5">
                    <?php
                    include "../connect.php";
                    $sql = "SELECT * FROM  transaksi WHERE status = 'dibatalkan'";
                    $result = mysqli_query($koneksi, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    ?>
                    <h3 class="text-3xl text-gray-700 font-bold leading-none mb-3"><?php echo $resultCheck; ?></h3>
                    <div class="text-sm text-gray-600">
                        <span class="text-green-500 pr-1"><i class="fas fa-caret-up"></i> 3.55%</span>
                        <span class="whitespace-no-wrap">Since last month</span>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <a href="tambah.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" target="blank">Lihat Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 p-4">
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Transaksi Belum Diproses</h5>
                </div>
                <div class="p-5">
                    <?php
                    include "../connect.php";
                    $sql = "SELECT * FROM  transaksi WHERE status = 'belum diproses' OR status = '' ";
                    $result = mysqli_query($koneksi, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    ?>
                    <h3 class="text-3xl text-gray-700 font-bold leading-none mb-3"><?php echo $resultCheck; ?></h3>
                    <div class="text-sm text-gray-600">
                        <span class="text-green-500 pr-1"><i class="fas fa-caret-up"></i> 3.55%</span>
                        <span class="whitespace-no-wrap">Since last month</span>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <a href="tambah.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" target="blank">Proses Transaksi</a>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <br>
    <br>
    <hr>
    <div class="flex flex-wrap justify-center" id="transaksi-masuk">
        <div class="w-full p-4">
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Transaksi Masuk</h5>
                </div>
                <div class="p-5">
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
                            Alamat
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
                    $sql = "SELECT * FROM transaksi WHERE status = '' OR status = 'belum diproses' ORDER BY id_transaksi DESC";
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
                                    <?php echo $row['alamat_customer']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row['total_transaksi']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row['tanggal_transaksi']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $row['status'] == '' ? 'Belum Diproses' : $row['status']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="tambah-transaksi.php?id=<?php echo $row['id_transaksi'];?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" target="blank">Proses</a>
                                    <a href="batal.php?id=<?php echo $row['id_transaksi']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" target="blank">Batalkan</a>
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
    </div>
</body>
</html>