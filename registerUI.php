<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="registerUI.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
    <!-- external icons -->
    <style>
      .error-message {
        color: white;
        margin: 0px 0px 10px 0px;
        display: none;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="register-interface">
      <form action="register.php" method="POST" onsubmit="return validateForm()">
        <p class="back-icon"><a href="home.php">X</a></p>
        <h1 style="color:black">Register</h1>

        <div class="input-form">
          <input
            type="text"
            placeholder="Enter your name"
            name="customerName"
            id="customerName"
            required
          />
        </div>

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
            type="text"
            placeholder="Enter your contact"
            name="customerContact"
            id="customerContact"
            required
          />
        </div>

        <div class="input-form">
          <input
            type="password"
            placeholder="Create a password"
            name="customerPass"
            id="customerPass"
            minlength="5"
            maxlength="10"
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

        <button class="register-btn" name="register">Register</button>

        <button class="google">
          <i class="fa-brands fa-google"></i>Continue with Google
        </button>

        <div class="login-link">
          <p class="white-para">
            Already have an account? <a href="loginUi.php">Login</a>
          </p>
        </div>
      </form>
    </div>

    <script>
      function validateForm() {
        var password = document.getElementById("customerPass").value;
        var confirmPassword = document.getElementById("customerPassValidate").value;
        var errorMessage = document.getElementById("errorMessage");

        if (password != confirmPassword) {
          errorMessage.innerHTML = "Passwords do not match!";
          errorMessage.style.display = "block";
          return false;
        }
        return true;
      }

      window.onload = function() {
        var errorMessage = document.getElementById("errorMessage");
        if (errorMessage.innerHTML !== "") {
          errorMessage.style.display = "block";
        }
      }
    </script>
  </body>
</html>
