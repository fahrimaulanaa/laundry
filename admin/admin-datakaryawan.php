<?php
session_start();
include "../connect.php";

if ($_SESSION['level'] == "admin") {
    header("location:../admin/dashboard.php");
}else if($_SESSION['level'] == "karyawan"){
    header("location:../karyawan/daftar-transaksi.php");
}else if($_SESSION['level'] == "user"){
    header("location:../client/dashboard.php");
}else{
    echo "<script>alert('Username atau Password salah!');window.location.href='../security/form-login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Page</title>
</head>

<body>
    <div class="flex">
        <div class="w-1/5 bg-gray-800 h-screen">
            <div class="flex items-center justify-center h-20">
                <div class="flex items-center">
                    <!-- <img src="../images/logo.png" alt="logo" class="h-10"> -->
                    <span class="text-white font-semibold text-2xl">Admin</span>
                </div>
            </div>
            <nav class="text-white text-base font-semibold pt-3">
                <a href="index.php" class="flex items-center text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="manage-admin.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-users mr-3"></i>
                    Atur Karyawan
                </a>
                <a href="manage-category.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-list mr-3"></i>
                    Atur Transaksi
                </a>
                <a href="manage-food.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
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
            <h1 class="text-3xl font-semibold items-center justify-center" align="center">Data Karyawan</h1>
            <br>
            <br>
            <br>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="w-full bg-white">
                <thead>
                    <tr class="text-left border-b-2 border-gray-300">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Posisi</th>
                        <th class="px-4 py-3">Hak Akses</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM karyawan";
                    $res = mysqli_query($koneksi, $sql);
                    $count = mysqli_num_rows($res);
                    $no = 1;
                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id_karyawan'];
                            $full_name = $row['nama_karyawan'];
                            $posisi = $row['posisi_karyawan'];
                    ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="px-4 py-3"><?php echo $no++; ?></td>
                                <td class="px-4 py-3"><?php echo $full_name; ?></td>
                                <td class="px-4 py-3"><?php echo $posisi; ?></td>
                                <td class="px-4 py-3"><?php echo $row['akses']; ?></td>
                                <td class="px-4 py-3">
                                    <a href="update-admin.php?id_karyawan=<?php echo $id; ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ubah</a>
                                    <a href="delete-admin.php?id=<?php echo $id; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>