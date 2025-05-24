<?php
session_start();
require_once 'koneksi.php';
include 'header.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $login_type = $_POST['login_type'] ?? 'user'; // New: Check login type

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user) {
            // Special case for admin and manager first login
            if (($username === 'admin' && $password === 'admin123' && $user['role'] === 'admin') ||
                ($username === 'manager' && $password === 'manager123' && $user['role'] === 'manager')) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header('Location: ' . ($user['role'] === 'admin' ? 'admin_dashboard.php' : 'manager_dashboard.php'));
                exit;
            }
            
            // Regular password verification for all users
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                // Redirect based on login type and role
                if ($login_type === 'admin' && $user['role'] === 'admin') {
                    header('Location: admin_dashboard.php');
                } else if ($login_type === 'manager' && $user['role'] === 'manager') {
                    header('Location: manager_dashboard.php');
                } else if ($login_type === 'user' && $user['role'] === 'user') {
                    header('Location: home.php');
                } else {
                    $error = 'Tipe login tidak sesuai dengan role anda';
                }
                exit;
            } else {
                $error = 'Username atau password salah';
            }
        } else {
            $error = 'Username tidak ditemukan';
        }
    } catch(PDOException $e) {
        $error = 'Database error: ' . $e->getMessage();
    }
}
?>

<div class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-br from-green-50 to-green-100">
    <div class="bg-white bg-opacity-90 p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-8 border border-green-200">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-green-800 mb-2">Welcome Back!</h2>
            <p class="text-green-600">Login to access UKM System</p>
        </div>
        
        <?php if ($error): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
                <p class="text-red-700"><?= htmlspecialchars($error) ?></p>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-6">
            <div>
                <label for="username" class="block text-sm font-medium text-green-700 mb-2">
                    Username
                </label>
                <div class="relative">
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        required 
                        class="w-full px-4 py-3 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 bg-white bg-opacity-90"
                        placeholder="Enter your username"
                    >
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-green-700 mb-2">
                    Password
                </label>
                <div class="relative">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="w-full px-4 py-3 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 bg-white bg-opacity-90"
                        placeholder="Enter your password"
                    >
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <!-- Regular Login Button -->
                <button 
                    type="submit"
                    name="login_type"
                    value="user"
                    class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-200 font-medium text-lg shadow-lg hover:shadow-xl"
                >
                    Login as User
                </button>

                <!-- Manager Login Button -->
                <button 
                    type="submit"
                    name="login_type"
                    value="manager"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 font-medium text-lg shadow-lg hover:shadow-xl"
                >
                    Login as Manager
                </button>

                <!-- Admin Login Button -->
                <button 
                    type="submit"
                    name="login_type"
                    value="admin"
                    class="w-full bg-gray-800 text-white py-3 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition duration-200 font-medium text-lg shadow-lg hover:shadow-xl"
                >
                    Login as Admin
                </button>
            </div>
        </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
