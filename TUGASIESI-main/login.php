<?php
session_start();
include 'header.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // For testing purposes, allow any login to redirect to home.php
    $_SESSION['user_id'] = 1;
    $_SESSION['username'] = $username;
    
    header('Location: home.php');
    exit;

    /* Uncomment this for actual database validation
    try {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: home.php');
            exit;
        } else {
            $error = 'Username atau password salah.';
        }
    } catch (PDOException $e) {
        $error = 'Database error: ' . $e->getMessage();
    }
    */
}
?>

<main class="flex justify-center items-center min-h-[calc(100vh-56px)] px-4 bg-cover bg-center" style="background-image: url('assets/UIN.jpeg');">
  <div class="bg-white bg-opacity-90 border border-green-800 rounded-lg p-8 max-w-md w-full shadow-md">
    <?php if ($error): ?>
      <div class="mb-4 text-red-600 font-semibold">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>
    <form method="POST" class="space-y-6">
      <div>
        <label for="username" class="block text-green-800 font-semibold mb-1">
          Username
        </label>
        <input
          type="text"
          id="username"
          name="username"
          placeholder="Masukkan username"
          required
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600"
        />
      </div>
      <div>
        <label for="password" class="block text-green-800 font-semibold mb-1">
          Password
        </label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Masukkan password"
          required
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600"
        />
      </div>
      <button
        type="submit"
        class="w-full bg-green-800 hover:bg-green-900 text-white font-semibold py-2 rounded-md"
      >
        Login
      </button>
    </form>
  </div>
</main>

<?php include 'footer.php'; ?>
