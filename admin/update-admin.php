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
    <title>Ubah Data Karyawan</title>
</head>
<body>
    <!-- make beautiful form with tailwindcss -->
    <div class="flex justify-center items-center h-screen">
        <div class="w-1/3 bg-white p-10 rounded-lg shadow-2xl">
            <h1 class="text-3xl font-bold mb-10 text-center">Ubah Data Karyawan</h1>
            <form action="" method="POST">
                <?php
                $id = $_GET['id_karyawan'];
                $sql = "SELECT * FROM karyawan WHERE id_karyawan = $id";
                $res = mysqli_query($koneksi, $sql);
                $count = mysqli_num_rows($res);
                if ($count == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $full_name = $row['nama_karyawan'];
                } else {
                    header('location:admin/manage-admin.php');
                }
                ?>
                <div class="mb-5">
                    <label for="full_name" class="block mb-2 text-sm text-gray-600">Nama Lengkap</label>
                    <input type="text" name="nama_karyawan" id="full_name" value="<?php echo $full_name; ?>" class="border border-gray-400 p-2 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="id_karyawan" class="block mb-2 text-sm text-gray-600">ID Karyawan</label>
                    <input type="text" name="id_karyawan" id="id_karyawan" value="<?php echo $id; ?>" class="border border-gray-400 p-2 w-full rounded-lg" readonly>
                </div>
                <div class="mb-5">
                    <label for="akses" class="block mb-2 text-sm text-gray-600">Akses</label>
                    <select name="akses" id="akses" class="border border-gray-400 p-2 w-full rounded-lg">
                        <option value="admin">Admin</option>
                        <option value="karyawan">Karyawan</option>
                    </select>
                </div>
                <div class="mb-5">
                    <input type="submit" name="submit" value="Ubah Data" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $akses = $_POST['akses'];
    $sql2 = "UPDATE karyawan SET nama_karyawan = '$nama_karyawan', akses = '$akses' WHERE id_karyawan = $id";
    $res2 = mysqli_query($koneksi, $sql2);
    if ($res2 == true) {
        $_SESSION['update'] = "<div class='success'>Data Karyawan Berhasil Diubah.</div>";
        header('location:admin/manage-admin.php');
    } else {
        $_SESSION['update'] = "<div class='error'>Data Karyawan Gagal Diubah.</div>";
        header('location:admin/manage-admin.php');
    }
}
?>