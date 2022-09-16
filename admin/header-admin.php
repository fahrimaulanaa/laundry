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
    <!-- make beautiful sidebar with tailwind css and add icon in every element -->
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
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Logout
                </a>
            </nav>
        </div>  
    </div>
</body>

</html>