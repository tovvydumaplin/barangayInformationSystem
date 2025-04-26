<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barangay Information System</title>
    <link
      rel="preload"
      href="<?= base_url('assets/fonts/Roboto-Regular.ttf') ?>"
      as="font"
      type="font/ttf"
      crossorigin="anonymous"
    />
    <link
      rel="preload"
      href="<?= base_url('assets/fonts/Roboto-Bold.ttf') ?>"
      as="font"
      type="font/ttf"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="<?= base_url('assets/css/general.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/sidebar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/reusables.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard-responsive.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/lending-assets.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/account.css') ?>" />

  </head>
  <body>
    <?= view ('includes/sidebar') ?>
    <main>
    <?= view('includes/header.php') ?>
      <div class="wrapper"></div>
      <div id="createEventModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Add Official</p>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <div class="row">
              <div class="img__box">
                <img src="img__default.png" class="img__profile" />
              </div>
              <div class="input__box__container">
                <div class="input__box margin__bottom__2">
                  <input
                    class="information__input"
                    value=""
                    placeholder="Enter Street"
                    name="street"
                    readonly
                  />
                  <span class="input__title"
                    >Firstname<span class="red__dot">*</span></span
                  >
                  <p class="text-danger"></p>
                </div>
                <div class="input__box">
                  <input
                    class="information__input"
                    value=""
                    placeholder="Enter Street"
                    name="street"
                    readonly
                  />
                  <span class="input__title"
                    >Lastname<span class="red__dot">*</span></span
                  >
                  <p class="text-danger"></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter middlename"
                  readonly
                />
                <span class="input__title"
                  >Middlename<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter middlename"
                  readonly
                />
                <span class="input__title"
                  >Suffix<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  name="street"
                  readonly
                />
                <span class="input__title"
                  >Position<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  name="street"
                  readonly
                  type="date"
                />
                <span class="input__title"
                  >Position<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  name="street"
                  readonly
                  type="date"
                />
                <span class="input__title"
                  >Position<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
          </div>
          <div class="btn__box__modal">
            <span class="btn__primary active">Create Event</span>
          </div>
        </form>
      </div>
      <div id="viewEventModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Add Official</p>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <div class="row">
              <div class="img__box">
                <img src="img__default.png" class="img__profile" />
              </div>
              <div class="input__box__container">
                <div class="input__box margin__bottom__2">
                  <input
                    class="information__input"
                    value=""
                    placeholder="Enter Street"
                    name="street"
                    readonly
                  />
                  <span class="input__title"
                    >Firstname<span class="red__dot">*</span></span
                  >
                  <p class="text-danger"></p>
                </div>
                <div class="input__box">
                  <input
                    class="information__input"
                    value=""
                    placeholder="Enter Street"
                    name="street"
                    readonly
                  />
                  <span class="input__title"
                    >Lastname<span class="red__dot">*</span></span
                  >
                  <p class="text-danger"></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter middlename"
                  readonly
                />
                <span class="input__title"
                  >Middlename<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter middlename"
                  readonly
                />
                <span class="input__title"
                  >Suffix<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  name="street"
                  readonly
                />
                <span class="input__title"
                  >Position<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  name="street"
                  readonly
                  type="date"
                />
                <span class="input__title"
                  >Position<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  name="street"
                  readonly
                  type="date"
                />
                <span class="input__title"
                  >Position<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
          </div>
          <div class="btn__box__modal">
            <span class="btn__primary active">Create Event</span>
          </div>
        </form>
      </div>
      <div class="container grid grid__2__cols col__gap__2">
        <div class="card">
          <div class="heading__container">
            <p class="subheading">Personal Information</p>
            <div class="profile__photo__container">
              <div class="profile__photo">
                <div class="img__profile__box">
                  <img src="<?= esc($image) ?>" id="imagePreview" class="profile__image__account" />
                </div>
                <div>
                  <p class="profile__heading">Profile Photo</p>
                  <p class="profile__subheading">PNG, JPEG under 15MB</p>
                </div>
                <div class="action__btn__box">
                  <input type="file" id="photoInput" accept="image/png, image/jpeg" hidden />
                  <button type="button" class="btn__secondary" id="uploadBtn">Upload New Photo</button>
                  <button type="button" class="btn__delete" id="deleteBtn">Delete</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal__heading">
            <p class="modal__header">General Information</p>
            <button id="editPersonalInfo" class="btn__primary">Edit Personal Info</button>
          </div>
          <div class="modal__content">
            <div class="input__box">
            <input class="information__input" name="firstname" value="<?= esc($firstname) ?>" readonly />
              <span class="input__title"
                >Firstname<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value="<?= esc($lastname) ?>"
                name="lastname"
                readonly
              />
              <span class="input__title"
                >Lastname<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value="<?= esc($middlename) ?>"
                name="middlename"
                readonly
              />
              <span class="input__title"
                >Middlename<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value="<?= esc($suffix) ?>"
                name="suffix"
                readonly
              />
              <span class="input__title"
                >Suffix<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value="<?= esc($username) ?>"
                name="username"
                readonly
              />
              <span class="input__title"
                >Email Address<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="modal__heading">
            <p class="modal__header">Modify Password</p>
            <button id="editAccountPassword" class="btn__primary">Update Password</button>
          </div>
          <div class="modal__content password__section">
            <div class="input__box">
              <input class="information__input" type="password" name="current_password" id="current_password" readonly />
              <span class="input__title">Current Password<span class="red__dot">*</span></span>
              <p class="text-danger" id="current_password_error"></p>
            </div>
            <div class="input__box">
              <input class="information__input" type="password" name="new_password" id="new_password" readonly />
              <span class="input__title">New Password<span class="red__dot">*</span></span>
              <p class="text-danger" id="new_password_error"></p>
            </div>
            <div class="input__box">
              <input class="information__input" type="password" name="confirm_password" id="confirm_password" readonly />
              <span class="input__title">Confirm Password<span class="red__dot">*</span></span>
              <p class="text-danger" id="confirm_password_error"></p>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <p class="copyright">
          Copyright 2025 Barangay 42-C. All Rights Reserved.
        </p>
      </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>

    <script>

$(document).ready(function () {

const saveAction = function (action) {
    $.ajax({
        url: '/admin/save-action',
        method: 'POST',
        data: { action: action },
        success: function (response) {
            if (response.status === 'success') {
                console.log('✅ ' + response.message);
            } else {
                console.error('❌ ' + response.message);
            }
        },
        error: function () {
            console.error('❌ AJAX request failed.');
        }
    });
};
  // Preview the image
  const previewImage = function (event) {
    let reader = new FileReader();
    reader.onload = function () {
      $("#imagePreview").attr("src", reader.result);
    };
    reader.readAsDataURL(event.target.files[0]);
  };

  // Click to trigger file input
  $("#uploadBtn").on("click", function () {
    $("#photoInput").click();
  });

  // Handle image change and upload
  $("#photoInput").on("change", function (event) {
    const file = event.target.files[0];
    if (!file) return;

    previewImage(event);

    let formData = new FormData();
    formData.append("view_profile_image", file); // Only sending the file now

    $.ajax({
      url: "<?= site_url('/admin/update-user-image') ?>",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (response) {
        saveAction("Updated Profile Photo");
        if (response.success) {
          if (response.image_url) {
            $("#imagePreview").attr("src", response.image_url);
            alert("Image has been updated!");
          }
          $(".success__indicator").removeClass("hide").find(".indicator__text").html('Photo Updated!');
          setTimeout(() => $(".success__indicator").addClass("hide"), 3000);
        } else {
          alert("Upload failed: " + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("Upload Error:", error);
        alert("An error occurred while uploading.");
      }
    });
  });

  $("#deleteBtn").on("click", function () {
  if (!confirm("Are you sure you want to delete your profile photo?")) return;

  $.ajax({
    url: "<?= site_url('admin/delete-user-image') ?>",
    type: "POST",
    data: {
      token: "<?= session('token') ?>", // Send session token to validate
    },
    success: function (response) {
      saveAction("Deleted Profile Photo");

      if (response.success) {
        $("#imagePreview").attr("src", "<?= base_url('assets/images/default-avatar.png') ?>"); // fallback image
        $(".success__indicator").removeClass("hide");
        $(".indicator__text").html("Profile photo deleted.");
        setTimeout(() => {
          $(".success__indicator").addClass("hide");
        }, 3000);
      } else {
        alert("Failed to delete photo.");
      }
    },
    error: function () {
      alert("Something went wrong while deleting the image.");
    }
  });
});

// Edit personal information
$('#editPersonalInfo').click(function () {
    var isReadOnly = $('.information__input').attr('readonly');
    
    if (isReadOnly) {
      // Remove readonly and change button text to 'Save'
      $('.information__input').removeAttr('readonly');
      $('#editPersonalInfo').text('Save');
    } else {
      // Collect form data to update
      var formData = {
        firstname: $('input[name="firstname"]').val(),
        lastname: $('input[name="lastname"]').val(),
        middlename: $('input[name="middlename"]').val(),
        suffix: $('input[name="suffix"]').val(),
        username: $('input[name="username"]').val(),
      };

      // Perform AJAX request to save data
      $.ajax({
        url: '/admin/update-user-information', // Your route for updating the information
        type: 'POST',
        data: formData,
        success: function (response) {
        saveAction("Edited profile information");

          if (response.success) {
            // Update UI with the new values
            $('input[name="firstname"]').val(formData.firstname);
            $('input[name="lastname"]').val(formData.lastname);
            $('input[name="middlename"]').val(formData.middlename);
            $('input[name="suffix"]').val(formData.suffix);
            $('input[name="username"]').val(formData.username); 

            // Set the fields back to readonly and update the button text to 'Edit'
            $('.information__input').attr('readonly', 'readonly');
            $('#editPersonalInfo').text('Edit Personal Info');
            
            alert(response.message); // Display success message
          } else {
            alert(response.message); // Display error message
          }
        }
      });
    }
  });

  $('#editAccountPassword').click(function () {
    var isReadOnly = $('.information__input').attr('readonly');
    
    if (isReadOnly) {
      // Enable editing and change button text to 'Save'
      $('.information__input').removeAttr('readonly');
      $('#editAccountPassword').text('Save');
    } else {
      // Validate fields
      var currentPassword = $('#current_password').val();
      var newPassword = $('#new_password').val();
      var confirmPassword = $('#confirm_password').val();
      var errors = false;

      // Clear previous errors
      $('.text-danger').text('');

      // Validate password match
      if (newPassword !== confirmPassword) {
        $('#confirm_password_error').text('Passwords do not match.');
        errors = true;
      }

      // Validate if current password is entered
      if (!currentPassword) {
        $('#current_password_error').text('Current password is required.');
        errors = true;
      }

      if (errors) return;

      // Perform AJAX request to update password
      var formData = {
        current_password: currentPassword,
        new_password: newPassword,
        confirm_password: confirmPassword,
      };

      $.ajax({
        url: '/admin/update-password', // Your route for updating the password
        type: 'POST',
        data: formData,
        success: function (response) {
        saveAction("Changed password");

          if (response.success) {
            alert(response.message); // Show success message
            $('.information__input').attr('readonly', 'readonly');
            $('#editAccountPassword').text('Update Account Password');
          } else {
            alert(response.message); // Show error message
          }
        }
      });
    }
  });

});

      document.querySelectorAll(".table__button").forEach((button) => {
        button.addEventListener("click", () => {
          document.querySelector(".wrapper").classList.add("open");
          document.getElementById("viewEventModal").classList.add("open");
        });
      });

      document
        .querySelector(".btn__add__resident")
        .addEventListener("click", function () {
          document.querySelector(".wrapper").classList.add("open");
          document.getElementById("createEventModal").classList.add("open");
        });

      document.querySelector(".wrapper").addEventListener("click", function () {
        document.querySelector(".wrapper").classList.remove("open");
        document.getElementById("viewEventModal").classList.remove("open");
        document.getElementById("createEventModal").classList.remove("open");
      });

      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
          document.querySelector(".wrapper").classList.remove("open");
          document.getElementById("viewEventModal").classList.remove("open");
          document.getElementById("createEventModal").classList.remove("open");
        }
      });

      document
        .querySelector(".menu__icon")
        .addEventListener("click", function () {
          document.querySelector("body").classList.toggle("hide__sidebar");
          document.querySelector(".nav__heading").classList.toggle("d__none");
        });

      document
        .querySelector(".user__box")
        .addEventListener("click", function () {
          document.querySelector(".dropdown__menu").classList.toggle("show");
        });

      $(document).ready(function () {
        $("#example").DataTable();
      });
    </script>
    <script>
    $(document).ready(function () {
      $(".menu__icon").on("click", function () {
        $("body").toggleClass("hide__sidebar");
        $(".nav__heading").toggleClass("d__none");
      });

      $(".user__box").on("click", function () {
        $(".dropdown__menu").toggleClass("show");
      });
    });
  </script>
  </body>
</html>
