<?php
include "../connect.php";
session_start();
if($_SESSION['level']==""){
    header("location:../index.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Form Edit Transaksi</title>
</head>
<body>
    <!-- make beautiful card with tailwindcss -->
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white rounded-lg shadow-xl p-10">
            <h1 class="text-3xl font-bold mb-10">Form Edit Transaksi</h1>
            <form action="edit-transaksi.php" method="POST">
                <?php
                $id_transaksi = $_GET['id_transaksi'];
                $data = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
                while($d = mysqli_fetch_array($data)){
                ?>
                <div class="mb-5">
                    <label for="id" class="block mb-2 text-sm text-gray-600">ID Transaksi</label>
                    <input type="text" name="id_transaksi" id="id" value="<?php echo $d['id_transaksi']; ?>" class="border border-gray-300 p-2 w-full rounded" readonly>
                </div>
                <div class="mb-5">
                    <label for="nama" class="block mb-2 text-sm text-gray-600">Nama Customer</label>
                    <input type="text" name="nama_customer" id="nama" value="<?php echo $d['nama_customer']; ?>" class="border border-gray-300 p-2 w-full rounded">
                </div>
                <div class="mb-5">
                    <label for="tgl" class="block mb-2 text-sm text-gray-600">Tanggal Diterima</label>
                    <input type="date" name="tanggal_transaksi" id="tgl" value="<?php echo $d['tanggal_transaksi']; ?>" class="border border-gray-300 p-2 w-full rounded">
                </div>
                <div class="mb-5">
                    <label for="status" class="block mb-2 text-sm text-gray-600">Status</label>
                    <select name="status" id="status" class="border border-gray-300 p-2 w-full rounded">
                        <option value="proses">Diproses</option>
                        <option value="pencucian">Pencucian</option>
                        <option value="pengeringan">Pengeringan</option>
                        <option value="setrika">Disetrika</option>
                        <option value="selesai">Selesai</option>
                    </select> 
                </div>
                <div class="mb-5">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium w-full" name="update">Update</button>
                </div>
                <?php
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
<?php
include "../connect.php";
if(isset($_POST['update'])){
    $id_transaksi = $_POST['id_transaksi'];
    $nama_customer = $_POST['nama_customer'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $status = $_POST['status'];
    $update = mysqli_query($koneksi,"UPDATE transaksi SET nama_customer='$nama_customer', tanggal_transaksi='$tanggal_transaksi', status='$status' WHERE id_transaksi='$id_transaksi'");  
    if($update){
        header("location:transaksi.php");
    }else{
        echo "Gagal";
    }
}
?>