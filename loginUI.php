<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="registerUI.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
    <!-- external icons -->
    <style>
      .error-message {
        color: white;
        margin: 0px 0px 30px 0px;
        display: none;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="register-interface">
      <form action="login.php" method="POST">
        <p class="back-icon"><a href="home.php">X</a></p>
        <h1 style="color:black">Login</h1>

        <div class="input-form">
          <input
            type="email"
            placeholder="Enter your email"
            name="customerEmail"
            id="customerEmail"
            required
          />
        </div>

        <div class="input-form">
          <input
            type="password"
            placeholder="Enter your password"
            name="customerPass"
            id="customerPass"
            required
          />
        </div>

        <div class="error-message" id="errorMessage">
          <?php
          if (isset($_GET['error'])) {
              echo htmlspecialchars($_GET['error']);
          }
          ?>
        </div>

        <div class="remember-me">
          <label><input type="checkbox" />Remember me</label>
          <a href="">forget password</a>
        </div>

        <input type="submit" class="register-btn" value="Login" name="submit" />

        <div class="login-link">
          <p class="white-para">
            Don't have an account? <a href="registerUI.php">Register</a>
          </p>
        </div>
      </form>
    </div>

    <script>
      // Display the error message if it exists
      window.onload = function() {
        var errorMessage = document.getElementById("errorMessage");
        if (errorMessage.innerHTML !== "") {
          errorMessage.style.display = "block";
        }
      }
    </script>
  </body>
</html>
