<?php
// Database connection would be established here in a real application
$conn = new mysqli('localhost', 'root', '', 'luxe_blossom');

// Form processing logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $countryCode = $_POST['countryCode'];
    $password = $_POST['password'];                       
    $confirmPwd = $_POST['confirmpwd'];

    // Validation checks would go here
    // Check if username exists
    // Email format validation
    // Password matching validation
    
    
    if (empty($errors)) {
        $success = "Registration successful! Welcome to Luxe Blossom.";
    }
}

?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Blossom | Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://placehold.co/200x80?text=Luxe+Blossom&font=Playfair+Display" alt="Luxe Blossom luxury perfume brand logo with elegant typography" />
        </div>
        
        <?php if (!empty($success)): ?>
            <div class="success-message" style="display: block;"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <h1>Create Your Account</h1>
        
        <form id="registrationForm" method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Choose a unique username">
                <div class="error" id="usernameError">Username already taken</div>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="your@email.com">
                <div class="error" id="emailError">Please enter a valid email address</div>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <div class="input-with-select">
                    <select id="countryCode" name="countryCode" class="country-code">
                        <option value="91">+91 (India)</option>
                        <option value="1">+1 (USA)</option>
                        <option value="44">+44 (UK)</option>
                        <option value="33">+33 (France)</option>
                        <option value="49">+49 (Germany)</option>
                        <option value="39">+39 (Italy)</option>
                        <option value="971">+971 (UAE)</option>
                        <option value="81">+81 (Japan)</option>
                        <option value="82">+82 (South Korea)</option>
                        <option value="65">+65 (Singapore)</option>
                        <option value="60">+60 (Malaysia)</option>
                        <option value="86">+86 (China)</option>
                        <option value="61">+61 (Australia)</option>
                        <option value="64">+64 (New Zealand)</option>
                        <option value="52">+52 (Mexico)</option>
                        <option value="55">+55 (Brazil)</option>
                        <option value="7">+7 (Russia)</option>
                        <option value="20">+20 (Egypt)</option>
                        <option value="27">+27 (South Africa)</option>
                        <option value="90">+90 (Turkey)</option>
                    </select>
                    <input type="tel" id="phone" name="phone" class="phone-input" required placeholder="1234567890" maxlength="10">
                </div>
                <div class="error" id="phoneError">Please enter a valid phone number</div>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Create a password">
                <span class="field-icon" id="togglePassword">👁️</span>
                <div class="error" id="passwordError">Password must be at least 8 characters long</div>
            </div>
            
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="Confirm your password">
                <span class="field-icon hidden-icon" id="toggleConfirmPassword">👁️</span>
                <div class="error" id="confirmPasswordError">Passwords do not match</div>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn-primary" id="submitBtn">Create Account</button>
                <button type="reset" class="btn-secondary" id="clearBtn">Clear</button>
            </div>
            
            <div class="login-link">
                Already a customer? <a href="login.php">Login here</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password visibility toggle
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPwd');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.textContent = type === 'password' ? '👁️' : '👁️';
            });
            
            if (toggleConfirmPassword) {
                toggleConfirmPassword.classList.remove('hidden-icon');
                toggleConfirmPassword.addEventListener('click', function() {
                    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                    confirmPassword.setAttribute('type', type);
                    this.textContent = type === 'password' ? '👁️' : '👁️';
                });
            }

            // Form validation
            const form = document.getElementById('registrationForm');
            const submitBtn = document.getElementById('submitBtn');
            
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                // Username validation (simulated)
                const username = document.getElementById('username').value.trim();
                if (username.length < 4) {
                    document.getElementById('usernameError').textContent = 'Username must be at least 4 characters';
                    document.getElementById('usernameError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('usernameError').style.display = 'none';
                }
                
                // Email validation
                const email = document.getElementById('email').value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    document.getElementById('emailError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('emailError').style.display = 'none';
                }
                
                // Phone validation
                const phone = document.getElementById('phone').value.trim();
                const phoneRegex = /^\d{10,15}$/;
                if (!phoneRegex.test(phone)) {
                    document.getElementById('phoneError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('phoneError').style.display = 'none';
                }
                
                // Password validation
                const passwordValue = password.value;
                if (passwordValue.length < 8) {
                    document.getElementById('passwordError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('passwordError').style.display = 'none';
                }
                
                // Confirm password validation
                if (passwordValue !== confirmPassword.value) {
                    document.getElementById('confirmPasswordError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('confirmPasswordError').style.display = 'none';
                }
                
                if (!isValid) {
                    e.preventDefault();
                } else {
                    // In a real application, you would submit the form here
                    sub mitBtn.disabled = true;
                    submitBtn.textContent = 'Creating Account...';
                }
            });
            
            // Real-time validation
            document.getElementById('username').addEventListener('input', function() {
                if (this.value.length >= 4) {
                    document.getElementById('usernameError').style.display = 'none';
                }
            });
            
            document.getElementById('email').addEventListener('input', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                document.getElementById('emailError').style.display = emailRegex.test(this.value) ? 'none' : 'block';
            });
            
            document.getElementById('phone').addEventListener('input', function() {
                const phoneRegex = /^\d{10,15}$/;
                document.getElementById('phoneError').style.display = phoneRegex.test(this.value) ? 'none' : 'block';
            });
            
            password.addEventListener('input', function() {
                document.getElementById('passwordError').style.display = this.value.length >= 8 ? 'none' : 'block';
            });
            
            confirmPassword.addEventListener('input', function() {
                document.getElementById('confirmPasswordError').style.display = this.value === password.value ? 'none' : 'block';
            });
        });
    </script>
</body>
</html>
