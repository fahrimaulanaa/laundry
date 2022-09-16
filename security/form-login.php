<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>

<body>
    <script src="../javascript/index.js"></script>
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white rounded-lg shadow-xl p-10">
            <h1 class="text-3xl font-bold mb-10">Login</h1>
            <form action="login-auth.php" method="POST">
                <div class="mb-5">
                    <label for="username" class="block mb-2 text-sm text-gray-600">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="border border-gray-300 p-2 w-full rounded">
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm text-gray-600">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="border border-gray-300 p-2 w-full rounded">
                    <br>
                    <br>
                    <input type="checkbox" onclick="showPassword()">Show Password
                </div>
                <div class="mb-5">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium w-full" name="login">Login</button>
                </div>
                <hr>
                <p class="mt-5">Don't have an account? <a href="register.php" class="text-blue-700 font-bold">Register</a></p>
            </form>
        </div>
    </div>
</body>

</html>