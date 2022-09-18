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
    <title>Sign Up</title>
</head>
<body>
</body>
<!-- make sign up page -->
<div class="flex justify-center items-center h-screen">
    <div class="w-1/3 bg-white rounded shadow p-6 m-4">
        <h1 class="text-2xl border-b pb-3 mb-20">Sign Up</h1>
        <form action="signup-auth.php" method="POST">
            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
            <div class="mb-4">
                <label for="username" class="sr-only">Nama Lengkap</label>
                <input type="text" name="nama_user" id="username" placeholder="Nama Lengkap" class="border-2 border-gray-300 p-4 w-full rounded-lg">
            </div>
            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>
            <div class="mb-4">
                <label for="confirm_password" class="sr-only">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>
            <div>
                <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Sign Up</button>
            </div>
            <p class="text-center mt-4">Already have an account? <a href="form-login.php" class="text-blue-500">Login</a></p>
        </form>
    </div>
</div>
</html>