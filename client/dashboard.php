<?php
session_start();
session_id();
$user = $_SESSION['username'];
include "../connect.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../security/form-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Dashboard</title>
</head>

<body>
    <script src="../javascript/index.js"></script>
    <script src="../node_modules/tw-elements/dist/js/index.min.js"></script>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-white font-bold text-lg">Sipaling Laundry</h1>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="dashboard.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>
                            <a href="form-tambah-laundry.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Tambah Laundry</a>
                            <a href="data.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Tambah Transaksi</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="ml-3 relative">
                            <div>
                                <button class="max-w-xs flex items-center text-sm  text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true" onclick="showSettings()">
                                    <img class="h-8 w-8 rounded" src="../assets/user-icon.png" alt="">
                                </button>
                            </div>
                            <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" id="user-settings">
                                <a href="../security/logout.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <header class="bg-white shadow flex">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Selamat datang <?php echo $_SESSION['username']; ?>
            </h1>
        </div>
    </header>
    <main>
        <br>
        <br>
        <div class="flex flex-wrap justify-start space-x-5 pl-12 sm:block">
            <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
                <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg" src="../assets/progress_icon.jpg" alt="" />
                <div class="p-6 flex flex-col justify-start">
                    <h5 class="text-gray-900 text-xl font-bold mb-2 ">Status Pesanan Terbaru</h5>
                    <p class="text-gray-700 text-base mb-4">
                        <?php
                        $user = $_SESSION['username'];
                        $query = "SELECT * FROM transaksi WHERE nama_customer = '$user' ORDER BY id_transaksi DESC LIMIT 1";
                        $result = mysqli_query($koneksi, $query);
                        $row = mysqli_fetch_assoc($result);
                        if(empty($row)){
                            echo "Tidak ada pesanan";
                        }else if($row['status'] == "diproses"){
                            echo "Pesanan anda sedang dalam proses";
                        }else if($row['status'] == "selesai"){
                            echo "Pesanan anda sudah selesai";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='print-invoice.php' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Print Invoice</a>";
                        }else if($row['status'] == "belum diproses"){
                            echo "Pesanan anda belum diproses, silahkan tunggu";
                        }else{
                            echo "Pesanan anda dibatalkan";
                        }
                        ?>
                    </p>
                    <p class="text-gray-600 text-xs">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        echo "Terakhir Diupdate : " . date(" H:i:s");
                        ?>

                    </p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
                <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg" src="../assets/cucian_numpuk.jpg" alt="" />
                <div class="p-6 flex flex-col justify-start">
                    <h5 class="text-gray-900 text-xl font-bold mb-2 ">Jumlah Pesanan Anda</h5>
                    <p class="text-gray-700 text-base">
                        <?php 
                        $user = $_SESSION['username'];
                        $query = mysqli_query($koneksi, "SELECT * FROM $user");
                        $jumlah = mysqli_num_rows($query);
                        echo "Jumlah Pesanan : " . $jumlah . "<br>";
                        ?>
                    </p>
                    <p class="text-gray-600 text-base">
                        <?php
                        $query = mysqli_query($koneksi, "SELECT SUM(total_transaksi) AS total FROM $user");
                        $data = mysqli_fetch_array($query);
                        echo "Total Transaksi : Rp. " . $data['total'];
                        ?>
                    </p>
                    <p class="text-gray-600 text-base">
                        <?php
                        $query = mysqli_query($koneksi, "SELECT AVG(berat) AS rata FROM $user");
                        $data = mysqli_fetch_array($query);
                        echo "Berat Rata Rata : " . $data['rata'] . "kg";
                        ?>
                    </p>
                    <p class="text-gray-600 text-base mb-4">
                        <?php
                        $query = mysqli_query($koneksi, "SELECT SUM(berat) AS total FROM $user");
                        $data = mysqli_fetch_array($query);
                        echo "Total Berat Dilaundry : " . $data['total'] . "kg";
                        ?>
                    </p>
                    <p class="text-gray-600 text-xs">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        echo "Terakhir Diupdate : " . date(" H:i:s");
                        ?>

                    </p>
                </div>
            </div>
        </div>
        <br>
</body>

</html>
