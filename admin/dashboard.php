<?php
session_start();
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
    <title>Halaman Dashboard Admin</title>
</head>

<body>
    <div class="flex flex-col md:flex-row h-screen w-full">
        <div class="bg-gray-800 text-gray-100 flex justify-between md:hidden">
            <a href="#" class="block p-4 text-white font-bold">Admin Panel</a>
            <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                    <path class="hidden" fill-rule="evenodd" clip-rule="evenodd" d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z"></path>
                    <path class="block" fill-rule="evenodd" clip-rule="evenodd" d="M3 6a1 1 0 011-1h16a1 1 0 110 2H4a1 1 0 01-1-1zm0 5a1 1 0 011-1h16a1 1 0 110 2H4a1 1 0 01-1-1zm0 5a1 1 0 011-1h16a1 1 0 110 2H4a1 1 0 01-1-1z"></path>
                </svg>
            </button>
        </div>
        <div class="sidebar bg-gray-800 text-gray-100 w-64 space-y-6 py-7 px-2 hidden md:block">
            <a href="dashboard.php" class="text-white block p-4 font-bold">Admin Panel</a>
            <a href="#" class="text-white opacity-100 block p-4 hover:bg-gray-700 hover:text-white transition duration-300 ease-in-out font-bold">Dashboard</a>
            <a href="#" class="block p-4 hover:bg-gray-700 hover:text-white transition duration-300 ease-in-out">Users</a>
            <a href="#" class="block p-4 hover:bg-gray-700 hover:text-white transition duration-300 ease-in-out">Products</a>
            <a href="#" class="block p-4 hover:bg-gray-700 hover:text-white transition duration-300 ease-in-out">Orders</a>
            <a href="#" class="block p-4 hover:bg-gray-700 hover:text-white transition duration-300 ease-in-out">Settings</a>
        </div>
        <div class="w-full p-4 flex flex-col">
            <div class="flex-1 p-10 overflow-hidden">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold">Dashboard Admin</h1>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/3 p-2">
                        <div class="bg-white rounded shadow p-5 h-full">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-green-600"><svg class="h-6 w-6 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M5 13l4 4L19 7"></path>
                                        </svg></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <?php
                                    include "../connect.php";
                                    $query = mysqli_query($koneksi, "SELECT * FROM transaksi");
                                    $count = mysqli_num_rows($query);

                                    ?>
                                    <h5 class="font-bold uppercase text-gray-500">Total Transaksi</h5>
                                    <h3 class="font-bold text-3xl"><?php echo $count; ?> <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 p-2">
                        <div class="bg-white rounded shadow p-5 h-full">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-yellow-600"><svg class="h-6 w-6 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <?php
                                    include "../connect.php";
                                    $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE status = 'diproses'");
                                    $result = mysqli_num_rows($query);
                                    ?>
                                    <h5 class="font-bold uppercase text-gray-500">Ongoing Orders</h5>
                                    <h3 class="font-bold text-3xl"><?php echo $result; ?> <span class="text-yellow-600"><i class="fas fa-exchange-alt"></i></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 p-2">
                        <div class="bg-white rounded shadow p-5 h-full">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-red-600"><svg class="h-6 w-6 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M6 18L18 6M6 6l12 12"></path>
                                        </svg></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <?php
                                    include "../connect.php";
                                    $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE status = 'belum diproses'");
                                    $result = mysqli_num_rows($query);
                                    ?>
                                    <h5 class="font-bold uppercase text-gray-500">Unprocessed Order</h5>
                                    <h3 class="font-bold text-3xl"><?php echo $result; ?> <span class="text-red-500"><i class="fas fa-caret-down"></i></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap flex-col md:flex-row mt-2">
                    <div class="w-full md:w-1/2 p-2">
                        <div class="bg-white rounded shadow p-5 h-full">
                            <?php
                            include "../connect.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY id_transaksi ASC LIMIT 5");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                            ?>
                            <h5 class="font-bold uppercase text-gray-500">Recent Orders</h5>
                            <table class="w-full p-5 text-gray-700">
                                <thead>
                                    <tr>
                                        <th class="text-left text-blue-900">No. </th>
                                        <th class="text-left text-blue-900">Nama</th>
                                        <th class="text-left text-blue-900">Berat</th>
                                        <th class="text-left text-blue-900">Total</th>
                                        <th class="text-left text-blue-900">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['id_transaksi']; ?></td>
                                            <td><?php echo $row['nama_customer']; ?></td>
                                            <td><?php echo $row['berat'] . "Kg"; ?></td>
                                            <td><?php echo "Rp." . $row['total_transaksi']; ?></td>
                                            <?php if ($row['status'] == 'selesai') : ?>
                                                <td><span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs"><?php echo $row['status']; ?></span></td>
                                            <?php elseif ($row['status'] == 'diproses') : ?>
                                                <td><span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs"><?php echo $row['status']; ?></span></td>
                                            <?php elseif ($row['status'] == 'dibatalkan') : ?>
                                                <td><span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs"><?php echo $row['status']; ?></span></td>
                                            <?php else : ?>
                                                <td><span class="bg-orange-200 text-orange-500 py-1 px-3 rounded-full text-xs"><?php echo $row['status']; ?></span></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-2">
                        <div class="bg-white rounded shadow p-5 h-full">
                            <h5 class="font-bold uppercase text-gray-500">Recent Users</h5>
                            <?php
                            include "../connect.php";
                            $query = mysqli_query($koneksi, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id_transaksi = user.id_user ORDER BY id_transaksi ASC LIMIT 5");
                            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

                            ?>
                            <table class="w-full p-5 text-gray-700">
                                <thead>
                                    <tr>
                                        <th class="text-left text-blue-900">No. </th>
                                        <th class="text-left text-blue-900">Nama</th>
                                        <th class="text-left text-blue-900">Alamat</th>
                                        <th class="text-left text-blue-900">No. HP</th>
                                        <!-- <th class="text-left text-blue-900">Status</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['id_user']; ?></td>
                                            <td><?php echo $row['nama_customer']; ?></td>
                                            <td><?php echo $row['alamat_customer']; ?></td>
                                            <td><?php echo $row['telefon_customer']; ?></td>
                                            <!-- <td><span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Active</span></td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- make profit panel with svg icon -->
                    <div class="w-full md:w-1/2 p-2">
                        <div class="bg-white rounded shadow p-5 h-full">
                            <h5 class="font-bold uppercase text-gray-500">Make Profit</h5>
                            <div class="flex flex-col">
                                <div class="flex justify-between">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-green-200 rounded-full flex justify-center items-center mr-3">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-gray-600 font-bold text-xl">Total Profit</h3>
                                            <p class="text-gray-500 text-sm">This month</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <?php
                                        include "../connect.php";
                                        $query = mysqli_query($koneksi, "SELECT SUM(total_transaksi) AS total FROM transaksi WHERE tanggal_transaksi BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() AND status = 'selesai'");
                                        $result = mysqli_fetch_assoc($query);
                                        ?>
                                        <h3 class="text-gray-600 font-bold text-xl"><?php echo "Rp." . $result['total']; ?></h3>
                                        <p class="text-gray-500 text-sm">Last 30 days</p>
                                    </div>
                                </div>
                                <div class="flex justify-between mt-6">
                                    <div class="flex items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-2">
                        <div class="bg-white rounded shadow p-5 h-full">
                            <h5 class="font-bold uppercase text-gray-500">Total Orders</h5>
                            <div class="flex flex-col">
                                <div class="flex justify-between">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-orange-200 rounded-full flex justify-center items-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-gray-600 font-bold text-xl">Total Orders</h3>
                                            <p class="text-gray-500 text-sm">This month</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <!-- jumlah order selama bulan ini -->
                                        <?php
                                        include "../connect.php";
                                        $query = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS total FROM transaksi WHERE MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) AND YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE()) AND status = 'selesai'");
                                        $result = mysqli_fetch_assoc($query);
                                        ?>
                                        <h3 class="text-gray-600 font-bold text-xl"><?php echo $result['total']; ?></h3>
                                        <p class="text-gray-500 text-sm">Last 30 days</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-2">
                        <div class="bg-white rounded shadow p-5 h-full">
                            <h5 class="font-bold uppercase text-gray-500">Total Customers</h5>
                            <div class="flex flex-col">
                                <div class="flex justify-between">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-red-200 rounded-full flex justify-center items-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-gray-600 font-bold text-xl">Total Customers</h3>
                                            <p class="text-gray-500 text-sm">This month</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <?php
                                        include "../connect.php";
                                        $query = mysqli_query($koneksi, "SELECT COUNT(id_user) AS total FROM user WHERE MONTH(tanggal_daftar) = MONTH(CURRENT_DATE()) AND YEAR(tanggal_daftar) = YEAR(CURRENT_DATE())");
                                        $result = mysqli_fetch_assoc($query);
                                        ?>
                                        <h3 class="text-gray-600 font-bold text-xl"><?php echo $result['total']; ?></h3>
                                        <p class="text-gray-500 text-sm">Last 30 days</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-2">
                        <div class="bg-white rounded shadow p-5 h-full">
                            <h5 class="font-bold uppercase text-gray-500">Total Complain</h5>
                            <div class="flex flex-col">
                                <div class="flex justify-between">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-orange-200 rounded-full flex justify-center items-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-gray-600 font-bold text-xl">Total Complains</h3>
                                            <p class="text-gray-500 text-sm">This month</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <?php
                                        include "../connect.php";
                                        $query = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS total FROM transaksi WHERE MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) AND YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE()) AND status = 'selesai'");
                                        $result = mysqli_fetch_assoc($query);
                                        ?>
                                        <h3 class="text-gray-600 font-bold text-xl"><?php echo $result['total']; ?></h3>
                                        <p class="text-gray-500 text-sm">Last 30 days</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>