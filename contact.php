<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css" />
  </head>
  <body
    style="
      background-image: url(img/contact\ us\ 1.jpg);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    "
  >
    <div class="container">
      <nav>
        <a href="index.html"><img src="img/logo.jpeg" class="logo" /></a>
        <ul>
          <li><a href="index.html" class="active">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="services.html">Services</a></li>
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Support</a>
            <div class="dropdown-content">
              <a href="privacy.html">Privacy Policy</a>
              <a href="terms.html">Terms and Conditions</a>
              <a href="Refund Policy.html">Refund Policy</a>
            </div>
          </li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="signup.html" class="getstarted">Sign In</a></li>
        </ul>
      </nav>

      <?php
        session_start();

        // Retrieve errors from the session
        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : array();
        unset($_SESSION['errors']); // Clear the session variable
      ?>

      <form
        id="contact-form"
        action="contactActions.php"
        method="post"
        enctype="multipart/form-data"
        novalidate
      >
        <h1>Contact Us Form</h1>
        <div class="form-group">
          <input
            type="text"
            name="firstName"
            id="firstName"
            placeholder="First Name"
            required
          />
          <span class="error" id="firstNameError"
            ><?php echo isset($errors['firstName']) ? $errors['firstName'] : ''; ?></span
          >
        </div>

        <div class="form-group">
          <input
            type="text"
            name="lastName"
            id="lastName"
            placeholder="Last Name"
            required
          />
          <span class="error" id="lastNameError"><?php echo isset($errors['lastName']) ? $errors['lastName'] : ''; ?></span>
        </div>

        <div class="form-group">
          <input
            type="text"
            name="email"
            id="email"
            placeholder="Email"
            required
          />
          <span class="error" id="emailError"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
        </div>

        <div class="form-group">
          <input
            type="text"
            name="mobile"
            id="mobile"
            placeholder="Mobile"
            required
          />
          <span class="error" id="mobileError"><?php echo isset($errors['mobile']) ? $errors['mobile'] : ''; ?></span>
        </div>

        <div class="form-group">
          <textarea
            type="text"
            name="message"
            id="message"
            placeholder="Message"
            required
          ></textarea>
          <span class="error" id="messageError"><?php echo isset($errors['message']) ? $errors['message'] : ''; ?></span>
        </div>

        <input
          type="submit"
          class="contact-button-default contact-button"
          href="index.html"
        />
      </form>
    </div>
    <footer class="footer-distributed">
      <div class="footer-left">
        <h3>Jewel Aura</h3>

        <p class="footer-links">
          <a href="#" class="link-1">Home</a>

          <a href="#">Services</a>

          <a href="#">Pricing</a>

          <a href="#">About</a>

          <a href="#">FAQ</a>

          <a href="#">Contact</a>
        </p>

        <p class="footer-company-name">jewelAura © 2023</p>
      </div>

      <div class="footer-center">
        <div>
          <i class="fa fa-map-marker"></i>
          <p><span> NSBM Green University,</span>Sri lanka</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>+94 589 55488 55</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p>
            <a href="mailto:hellojewelaura@email.com"
              >hellojewelaura@email.com</a
            >
          </p>
        </div>
      </div>

      <div class="footer-right">
        <p class="footer-company-about">
          <span>About Jewel Aura</span>
          The gold bought by Jewel Aurais refined and sold back to the domestic
          market as 24kt gold, that is used to make fine gold jewellery. This
          helps the Srilankan gold market not to overly depend on eternal gold
          imports. Another portion is sold as gold jewellery in our outlets
          without the price of workmanship.
        </p>

        <div class="footer-icons">
          <a href="https://www.facebook.com/"
            ><i class="fab fa-facebook-f"></i
          ></a>
          <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
          <a href="https://www.linkedin.com/"
            ><i class="fab fa-instagram"></i
          ></a>
          <a href="https://www.github.com/"><i class="fab fa-pinterest"></i></a>
        </div>
      </div>
    </footer>

    <script>
        // Clear form fields when the page loads
        window.onload = function () {
            var form = document.getElementById("contact-form");
            if (form) {
                form.reset();
            }
        };
    </script>
  </body>
</html>
