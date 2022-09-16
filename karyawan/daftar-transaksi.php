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
    <br>
    <div class="flex flex-wrap justify-center" id="transaksi-beralngsung">
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
                    $sql = "SELECT * FROM  transaksi WHERE status = 'batal'";
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
                    $sql = "SELECT * FROM  transaksi WHERE status = 'belum diproses' OR status = ''";
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
    <!-- transaksi masuk dan belum diproses -->
    <div class="flex flex-wrap justify-center" id="transaksi-masuk">
        <div class="w-full p-4">
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Transaksi Masuk</h5>
                </div>
                <div class="p-5">
                    <table class="w-full p-5 text-gray-700" rowspan="7" colspan="7">
                        <thead>
                            <tr>
                                <th class="text-left text-blue-900">No</th>
                                <th class="text-left text-blue-900">Nama Customer</th>
                                <th class="text-left text-blue-900">ID Transaksi</th>
                                <th class="text-left text-blue-900">Tanggal Transaksi</th>
                                <th class="text-left text-blue-900">Harga</th>
                                <th class="text-left text-blue-900">Status</th>
                                <th class="text-left text-blue-900">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../connect.php";
                            $sql = "SELECT * FROM transaksi WHERE status = 'belum diproses' OR status = '' ";
                            $result = mysqli_query($koneksi, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            if ($resultCheck > 0) {
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $no . "</td>";
                                    echo "<td>" . $row['nama_customer'] . "</td>";
                                    echo "<td>" . $row['id_transaksi'] . "</td>";
                                    echo "<td>" . $row['tanggal_transaksi'] . "</td>";
                                    echo "<td>" . $row['total_transaksi'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "<td><a href='daftar-transaksi.php?id_transaksi=" . $row['id_transaksi'] . "' class=' text-black font-bold py-2 px-4 rounded-full' target='blank'>Proses</a></td>";
                                    echo "</tr>";
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
<?php
include "../connect.php";

if(isset($_GET['id_transaksi'])){
    $id_transaksi = $_GET['id_transaksi'];
    $sql = "UPDATE transaksi SET status = 'diproses' WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($koneksi, $sql);
    if($result){
        echo "<script>alert('Transaksi berhasil diproses');window.location.href='daftar-transaksi.php';</script>";
    }else{
        echo "<script>alert('Transaksi gagal diproses');window.location.href='daftar-transaksi.php';</script>";
    }
}
?>