<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      html {
        font-size: 62.5%;
        font-family: "Roboto", sans-serif;
      }
      main {
        background-image: url(<?= base_url('assets/images/login.jpg') ?>);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .card__wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-items: center;
        gap: 2rem;
      }
      .card {
        background-color: white;
        padding: 3rem 3rem 4rem 3rem;
        box-shadow: 0px 20px 30px 0px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0px 20px 30px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 20px 30px 0px rgba(0, 0, 0, 0.1);
        border-radius: 1rem;
      }
      .sign__in__heading {
        font-size: 4rem;
        font-weight: 800;
        color: #343539;
      }
      .text__body {
        font-size: 1.8rem;
        color: #626262;
      }
      .text__align__center {
        text-align: center;
      }
      .mg__top__1 {
        margin-top: 1.5rem;
      }
      .mg__top__2 {
        margin-top: 2rem;
      }
      .mg__top__3 {
        margin-top: 3rem;
      }
      .input__box {
        display: flex;
        flex-direction: column;
        position: relative;
      }
      .label__input {
        font-size: 1.8rem;
        font-weight: 500;
        color: #545454;
      }
      .input__box input {
        padding: 1.3rem 2rem;
        font-size: 1.8rem;
        border-radius: 1rem;
        border: 1px solid #8c8c8c;
      }
      .sign__in__btn {
        color: white;
        background-color: #0d9275;
        font-size: 1.8rem;
        font-weight: 700;
        border: none;
        padding: 1.4rem 2rem;
        width: 100%;
        text-align: center;
        border-radius: 1rem;
        cursor: pointer;
      }
      .icon__wrapper {
        position: absolute;
        right: 15px;
        bottom: 10px;
        cursor: pointer;
      }
      .icon__wrapper ion-icon {
        font-size: 2.5rem;
        color: #545454;
      }
      /* .img__wrapper {
        width: 100%;
      } */
      .checkbox {
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }
      .checkbox .label__input {
        font-size: 1.6rem;
      }
      .check__forgot__wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .check__forgot__wrapper a {
        font-size: 1.6rem;
        color: #0d9275;
        text-decoration: none;
      }
      .error__handler {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 2rem 2rem;
        gap: 3rem;
        /* max-width: 20rem; */
        background-color: #ffdfdf;
        border-radius: 1rem;
        font-size: 1.6rem;
        font-weight: 600;
      }

      .icon__close {
        width: 2rem;
        height: 2rem;
        cursor: pointer;
      }

      .icon__2rem {
        width: 2rem;
        height: 2rem;
      }
      .error__text {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-weight: 400;
      }

      .error__handler.hide {
        visibility: hidden;
        opacity: 0;
        position: absolute;
      }
    </style>
  </head>
  <body>
    <main>
      <div class="card__wrapper">
        <div class="img__wrapper">
          <img src="<?= base_url('assets/images/logo_barangay.png')?>" alt="logo of barangay" />
        </div>
        <?php if (session()->getFlashdata('error')) : ?>
        <div class="error__handler">
         <p class="error__text" style="color: red;"><ion-icon class="icon__2rem" name="alert-circle-outline"></ion-icon><?= session()->getFlashdata('error') ?></p>
         <ion-icon class="icon__close" name="close-outline"></ion-icon>
        </div>
        <?php endif; ?>
                    <!-- Add this element somewhere on your page, e.g., near the button -->
        <div id="loading-message" style="display: none; margin-top: 10px; color: #333; font-size: 1.8rem;">Sending email...</div>
        <div class="card">
          <div class="heading__card">
            <p class="sign__in__heading text__align__center">Sign In</p>
            <p class="text__body text__align__center mg__top__2">
              Please enter your details to access your account
            </p>
          </div>
          <div class="body__card">
            <form action="<?=base_url('/auth/processLogin')?>" method="POST" class="mg__top__3">
              <div class="input__box">
                <label for="Email" class="label__input">Email</label>
                <input
                  type="email"
                  class="mg__top__1"
                  placeholder="Enter Email"
                  id="usernameInput"
                  name="username"
                />
              </div>

              <div class="input__box mg__top__3">
                <label for="Password" class="label__input">Password</label>

                <input
                  type="password"
                  class="mg__top__1"
                  placeholder="Your Password"
                  id="passwordInput"
                  name="password"
                />
                <div class="icon__wrapper" id="iconBtn">
                  <ion-icon id="toggleIcon" name="eye-off-outline"></ion-icon>
                </div>
              </div>
              <div class="check__forgot__wrapper mg__top__1">
                <div class="checkbox">
                  <input type="checkbox" />
                  <label for="checkbox" class="label__input"
                    >Remember me?</label
                  >
                </div>
                <a href="#" id="forgot-password">Forgot Password?</a>
              </div>

              <button class="sign__in__btn mg__top__3">Sign In</button>
            </form>
          </div>
        </div>
      </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$('#forgot-password').on('click', function(e) {
  e.preventDefault();
  const username = prompt("Enter your email:");
  if (username) {
    $('#loading-message').show(); // Show loading

    $.ajax({
      url: '<?= site_url('admin/reset-password') ?>',
      method: 'POST',
      contentType: 'application/json',
      data: JSON.stringify({ username }),
      success: function(response) {
        alert(response.message);
      },
      error: function(xhr) {
        alert(xhr.responseJSON?.message || 'Something went wrong.');
      },
      complete: function() {
        $('#loading-message').hide(); // Hide loading when done
      }
    });
  }
});

    </script>
    <script>
      document.querySelector('.icon__close').addEventListener("click", function() {
          document.querySelector('.error__handler').classList.add("hide");
      });

      const iconBtn = document.getElementById("iconBtn");
      const togglePassword = function () {
        const passwordInput = document.getElementById("passwordInput");
        const toggleIcon = document.getElementById("toggleIcon");

        if (passwordInput.type === "password") {
          passwordInput.type = "text";
          toggleIcon.setAttribute("name", "eye-outline");
        } else {
          passwordInput.type = "password";
          toggleIcon.setAttribute("name", "eye-off-outline");
        }
      };

      iconBtn.addEventListener("click", togglePassword);
    </script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
