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
    <title>Tambah Laundry</title>
</head>

<body>
    <script src="../javascript/index.js"></script>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-white font-bold text-lg">Sipaling Laundry</h1>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="dashboard.php" class=" text-gray-300 px-3 py-2 rounded-md text-sm font-medium" >Dashboard</a>
                            <a href="form-tambah-laundry.php" class="bg-gray-900 text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Tambah Laundry</a>
                            <a href="data.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Tambah Transaksi</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="ml-3 relative">
                            <div>
                                <button class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true" onclick="showSettings()">
                                    <img class="h-8 w-8 rounded-full" src="../assets/user-icon.png" alt="">
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
        </div>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <h1 class="text-3xl font-bold text-green-700 pb-6" align="center">Tambah Laundry</h1>
                <div class="border-4 border-dashed border-gray-200 rounded-lg h-96">
                    <form action="tambah-laundry.php" method="POST">
                        <div class="flex flex-col">
                            <label for="alamat" class="pb-2">Alamat</label>
                            <input type="text" name="alamat_customer" id="alamat" class="border-2 border-gray-300 p-2 rounded-lg form-input" placeholder="Masukkan alamat pelanggan">
                        </div>
                        <div class="flex flex-col">
                            <label for="nohp" class="pb-2">No. HP</label>
                            <input type="text" name="telefon_customer" id="nohp" class="border-2 border-gray-300 p-2 rounded-lg form-input" placeholder="Masukkan no. hp pelanggan">
                        </div>
                        <div class="flex flex-col">
                            <label for="berat" class="pb-2">Berat</label>
                            <input type="text" name="berat" id="berat" class="border-2 border-gray-300 p-2 rounded-lg form-input" placeholder="Masukkan berat laundry">
                        </div>
                        <div class="flex flex-col">
                            <label for="harga" class="pb-2">Harga</label>
                            <input type="text" name="total_transaksi" id="harga" class="border-2 border-gray-300 p-2 rounded-lg form-input" placeholder="Harga" readonly>
                        </div>
                        <br>
                        <div class="flex flex-row">
                            <button type="submit" name="submit" class="bg-green-500 text-white px-3 py-2 rounded-md text-sm font-medium">Tambah</button>
                            <button type="button" onclick="cekHarga()" class="bg-red-500 text-white px-3 py-2 rounded-md text-sm font-medium">Cek Harga</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function cekHarga() {
                var berat = document.getElementById('berat').value;
                var harga = berat * 3000;
                document.getElementById('harga').value = "Rp. " + harga;
            }
        </script>
</body>

</html>