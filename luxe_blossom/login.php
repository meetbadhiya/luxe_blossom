<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$db_host = 'localhost';
$db_name = 'luxe_blossom';
$db_user = 'root'; // Change to your DB username
$db_pass = ''; // Change to your DB password

// Initialize variables
$login_error = '';
$username = '';
$password = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validate inputs
    if (empty($username) || empty($password)) {
        $login_error = 'Please enter both username and password';
    } else {
        try {
            // Create database connection
            $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL statement to prevent SQL injection
            $stmt = $conn->prepare("SELECT * FROM userdata WHERE username = :username OR phone_number = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch();
                // Verify password against hashed password in database
                if (password_verify($password, $user['password'])) {
                    // Start session and redirect to dashboard or home page
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    header('Location: dashboard.php');
                    exit();
                } else {
                    $login_error = 'Invalid password';
                }
            } else {
                $login_error = 'User not found';
            }
        } catch(PDOException $e) {
            $login_error = 'Database error: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Luxe Blossom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-container {
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .form-container:hover {
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .input-field:focus {
            border-color: #9f7aea;
            box-shadow: 0 0 0 3px rgba(159, 122, 234, 0.5);
        }
        .btn-login {
            transition: all 0.3s ease;
            background-image: linear-gradient(to right, #667eea, #764ba2);
        }
        .btn-login:hover {
            background-image: linear-gradient(to right, #764ba2, #667eea);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="w-full max-w-md mx-4">
        <div class="bg-white rounded-xl overflow-hidden form-container">
            <!-- Header with logo -->
            <div class="bg-gradient-to-r from-purple-600 to-blue-500 p-6 text-center">
                <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/d4f36d42-b931-4190-803b-81169670f067.png" alt="Luxe Blossom logo in white text on transparent background with elegant floral accents" class="mx-auto h-12">
                <h1 class="text-white text-2xl font-bold mt-4">Welcome Back</h1>
                <p class="text-purple-200">Login to your account</p>
            </div>

            <!-- Error message -->
            <?php if (!empty($login_error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-6 mt-4" role="alert">
                    <span class="block sm:inline"><?php echo htmlspecialchars($login_error); ?></span>
                </div>
            <?php endif; ?>

            <!-- Login form -->
            <form method="POST" action="login.php" class="p-6" id="loginForm">
                <div class="mb-6">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username or Phone Number</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" 
                        class="input-field w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none" 
                        placeholder="Enter username or phone number" required>
                </div>
                
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" 
                        class="input-field w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none" 
                        placeholder="Enter your password" required>
                    <div class="flex justify-end mt-2">
                        <a href="forgot-password.php" class="text-sm text-purple-600 hover:text-purple-800">Forgot Password?</a>
                    </div>
                </div>
                
                <button type="submit" class="btn-login w-full text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                    Login
                </button>
                
                <div class="text-center mt-6">
                    <p class="text-gray-600">Don't have an account? 
                        <a href="registration.php" class="text-purple-600 font-semibold hover:text-purple-800 transition-colors">Create one</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Client-side form validation
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            
            if (!username || !password) {
                event.preventDefault();
                alert('Please fill in all fields');
                return false;
            }
            
            return true;
        });

        // Add animation on field focus
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('animate-pulse');
            });
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('animate-pulse');
            });
        });
    </script>
</body>
</html>

