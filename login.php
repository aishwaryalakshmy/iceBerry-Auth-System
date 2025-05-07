<?php
session_start();

$errors = [
  'login' => isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '',
  'register' => isset($_SESSION['register_error']) ? $_SESSION['register_error'] : ''
];
$activeForm = isset($_SESSION['active_form']) ? $_SESSION['active_form'] : 'login';

session_unset();

function showError($error) {
  return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
  return $formName === $activeForm ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>iceBerry | Login & Register</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="login-container">

    <!-- Login Form -->
    <form class="form-box <?= isActiveForm('login', $activeForm); ?>" id="loginForm" action="login_register.php" method="post">
      <h2>Login to iceBerry</h2>
      <?= showError($errors['login']); ?>
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit" name="login">Login</button>
      <p class="redirect-link">Don't have an account? <a href="#" onclick="toggleForm('registerForm')">Register</a></p>
    </form>

    <!-- Register Form -->
    <form class="form-box <?= isActiveForm('register', $activeForm); ?>" id="registerForm" action="login_register.php" method="post">
      <h2>Create Your iceBerry Account</h2>
      <?= showError($errors['register']); ?>
      <input type="text" name="name" placeholder="Username" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <select name="role" required>
        <option value="">--Select role--</option>
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
      <button type="submit" name="register">Register</button>
      <p class="redirect-link">Already have an account? <a href="#" onclick="toggleForm('loginForm')">Login</a></p>
    </form>

  </div>

  <script>
    function toggleForm(formId) {
      document.getElementById('loginForm').classList.remove('active');
      document.getElementById('registerForm').classList.remove('active');
      document.getElementById(formId).classList.add('active');
    }
  </script>
</body>
</html>
