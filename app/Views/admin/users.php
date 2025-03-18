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
    <link rel="stylesheet" href="<?= base_url('assets/css/officials.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/table.css') ?>" />
    <link href="<?= base_url('assets/DataTables/datatables.min.css') ?>" rel="stylesheet" />

    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>
    <style>
      .chev__icon__down {
            width: 2rem;
            height: 2rem;
            color: var(--black-color);
            transition: all 0.3s ease;
            position: absolute;
            top: 50%;
            right: 2rem;
            transform: translateY(-50%);
        }
        .grid__2__cols__modified {
          grid-template-columns: 0.8fr 1.2fr;
        }
        .error__email {
          color: #d13d3d;
          font-weight: 400;
          margin-top: 1rem;
        }
        .btn__secondary__edit {
          padding: 1rem 1.2rem;
          border-radius: 0.5rem;
          border: 1px solid #828282;
          background-color: var(--main-color);
          font-family: "Roboto", sans-serif;
          display: flex;
          gap: 1rem;
          align-items: center;
          font-size: 1.8rem;
          cursor: pointer;
          border-color: var(--main-color);
          color: var(--white-color);
          text-align: center;
          justify-content: center;
        }
        .btn__secondary__deactivate {
            padding: 1rem 1.2rem;
            border-radius: 0.5rem;
            border: 1px solid #828282;
            background-color: #de2828;
            font-family: "Roboto", sans-serif;
            display: flex;
            gap: 1rem;
            align-items: center;
            font-size: 1.8rem;
            cursor: pointer;
            border-color: #de2828;
            color: var(--white-color);
            text-align: center;
            justify-content: center;
        }
        .btn__secondary__deactivate.hide {
          display: none;
        }
        .btn__secondary__reactivate.hide {
          display: none;
        }
        .btn__secondary__reactivate {
          padding: 1rem 1.2rem;
          border-radius: 0.5rem;
          border: 1px solid #828282;
          background-color: var(--white-color);
          font-family: "Roboto", sans-serif;
          display: flex;
          gap: 1rem;
          align-items: center;
          font-size: 1.8rem;
          cursor: pointer;
          border-color: var(--main-color);
          color: var(--main-color);
          text-align: center;
          justify-content: center;
        }
        .btn__secondary__close {
          padding: 1rem 1.2rem;
          border-radius: 0.5rem;
          border: 1px solid #828282;
          background-color: #fff;
          font-family: "Roboto", sans-serif;
          display: flex;
          gap: 1rem;
          align-items: center;
          font-size: 1.8rem;
          cursor: pointer;
          border-color: var(--main-color);
          color: var(--main-color);
          text-align: center;
          justify-content: center;
        }
        .modal__btn__container {
          display: flex;
          gap: 1rem; 
        }

        /* 1536 px */
          @media (max-width: 96em) {
            html {
              font-size: 55%;
            }
            .sidebar {
              padding: 2rem 1rem;
            }
            .card {
              padding: 2rem;
            }
          }

    </style>
    </head>
  <body>
  <div class="success__indicator hide">
    <div class="indicator__container">
      <div class="icon__link">
        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-check-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
          <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
        </svg>
      </div>
      <p class="indicator__text">New Account Created!</p>
    </div>
  </div>
    <?= view('includes/sidebar.php') ?>
    <main>
    <?= view('includes/header.php') ?>
      <div class="wrapper"></div>
      <div id="createEventModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Add Official</p>
        </div>
                <!-- Display Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <form id="createUserForm" action="<?= site_url('/admin/create-user') ?>" method="POST" class="modal__body community__modal" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="row flex__d__col">
              <div class="row grid grid__2__cols__modified">
              <div class="img__box" onclick="document.getElementById('profile_image').click()">
                  <input type="file" name="profile_image" id="profile_image" accept="image/*" onchange="previewImage(event)" style="display: none;">
                  <img class="img__profile" id="imagePreview" src="<?= base_url('assets/images/img__default.png')?>" alt="  " style="width: 100%; max-height: 15rem; cursor: pointer;">
              </div>
                  <div class="input__box__container">
                      <div class="input__box margin__bottom__2">
                          <input class="information__input" placeholder="Enter Firstname" name="firstname" required />
                          <span class="input__title">Firstname<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                      <div class="input__box">
                          <input class="information__input" placeholder="Enter Lastname" name="lastname" required />
                          <span class="input__title">Lastname<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="input__box">
                      <input class="information__input" placeholder="Enter Middlename" name="middlename" required />
                      <span class="input__title">Middlename<span class="red__dot">*</span></span>
                      <p class="text-danger"></p>
                  </div>
                  <div class="input__box">
                      <span class="input__title">Suffix<span class="red__dot">*</span></span>
                      <select class="information__input" name="suffix">
                          <option value="" disabled selected>Choose Suffix</option>
                          <option value="">None</option>
                          <option value="Jr.">Jr.</option>
                          <option value="Sr.">Sr.</option>
                          <option value="II">II</option>
                          <option value="III">III</option>
                          <option value="IV">IV</option>
                      </select>
                      <p class="text-danger"></p>
                  </div>
              </div>
              <div class="row">
                  <div class="input__box">
                      <span class="input__title">Position<span class="red__dot">*</span></span>
                      <select class="information__input" name="position" required>
                          <option value="" disabled selected>Choose Position</option>
                          <option value="Barangay Head">Barangay Head</option>
                          <option value="Barangay Assistant">Barangay Assistant</option>
                          <option value="Barangay Officer 1">Barangay Officer 1</option>
                          <option value="Barangay Officer 2">Barangay Officer 2</option>
                          <option value="Barangay Officer 3">Barangay Officer 3</option>
                      </select>
                      <p class="text-danger"></p>
                  </div>
                  <div class="input__box">
                      <span class="input__title">Role<span class="red__dot">*</span></span>
                      <select name="role" class="information__input" required>
                          <option value="" disabled selected>Choose Role</option>
                          <option value="user">User</option>
                          <option value="administrator">Administrator</option>
                      </select>
                      <p class="text-danger"></p>
                  </div>
              </div>
              <div class="row">
                  <div class="input__box">
                      <input class="information__input" placeholder="Enter Email" name="email" type="email" required />
                      <span class="input__title">Email<span class="red__dot">*</span></span>
                      <p class="text-danger"></p>
                      <p class="text-danger error-email"></p>
                  </div>
                  <div class="input__box">
                      <input class="information__input" placeholder="Enter Password" name="password" type="password" required />
                      <span class="input__title">Password<span class="red__dot">*</span></span>
                      <p class="text-danger"></p>
                  </div>
              </div>
              <div class="btn__box__modal">
                  <button type="submit" class="btn__primary active">Create Account</button>
              </div>
          </div>
      </form>

       <div id="responseMessage"></div>

      </div>
      <div id="viewEventModal" class="modal">
        <div class="modal__header">
            <p class="modal__heading">View Official</p>
            <div class="modal__btn__container">
              <button class="btn__secondary__edit">Edit</button>
              <button id="" class="btn__secondary__deactivate" onClick="deactivateUser()">Deactivate</button>
              <button id="" class="btn__secondary__reactivate" onClick="reactivateUser()">Reactivate</button>
            </div>
        </div>
        <form class="modal__body community__modal">
            <div class="row flex__d__col">

                <div class="row grid grid__2__cols__modified">
                  <div class="img__box" style="position: relative; cursor: pointer;" onclick="document.getElementById('viewImageInput').click()">
                      <img class="img__profile" id="viewImagePreview" 
                          src="<?= base_url('assets/images/img__default.png') ?>" 
                          alt="Profile Image" 
                          style="width: 100%; max-height: 15rem; cursor: pointer;">

                      <!-- Hidden File Input -->
                      <input type="file" id="viewImageInput" name="view_profile_image" accept="image/*" style="display: none;">
                  </div>
                    <div class="input__box__container">
                        <div class="input__box margin__bottom__2">
                            <input class="information__input" name="view_firstname"  />
                            <span class="input__title">Firstname</span>
                        </div>
                        <div class="input__box">
                            <input class="information__input" name="view_lastname"  />
                            <span class="input__title">Lastname</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input__box">
                        <input class="information__input" name="view_middlename"  />
                        <span class="input__title">Middlename</span>
                    </div>
                    <div class="input__box">
                        <span class="input__title">Suffix</span>
                        <select class="information__input" name="view_suffix" disabled>
                            <option value="">None</option>
                            <option value="Jr.">Jr.</option>
                            <option value="Sr.">Sr.</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="input__box">
                        <span class="input__title">Position</span>
                        <select class="information__input" name="view_position" disabled>
                            <option value="Barangay Head">Barangay Head</option>
                            <option value="Barangay Assistant">Barangay Assistant</option>
                            <option value="Barangay Officer 1">Barangay Officer 1</option>
                            <option value="Barangay Officer 2">Barangay Officer 2</option>
                            <option value="Barangay Officer 3">Barangay Officer 3</option>
                        </select>
                    </div>
                    <div class="input__box">
                        <span class="input__title">Role</span>
                        <select name="view_role" class="information__input" disabled>
                            <option value="user">User</option>
                            <option value="administrator">Administrator</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input__box">
                        <input class="information__input" name="view_email" type="email"  />
                        <span class="input__title">Email</span>
                    </div>
                    <div class="input__box">
                        <input class="information__input" name="view_password" type="password" value="********"  />
                        <span class="input__title">Password</span>
                    </div>
                </div>
                <div class="btn__box__modal">
                    <button type="button" class="btn__secondary__close active closeModalBtn">Close</button>
                </div>
            </div>
        </form>
    </div>
      <div class="container">
        <div class="card">
          <div class="heading__container">
            <p class="subheading">List of Users</p>
            <div class="button__box">
              <button class="btn__secondary active btn__add__resident">
                <div class="icon__link">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="ionicon"
                    viewBox="0 0 512 512"
                  >
                    <path
                      d="M376 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                      fill="none"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="32"
                    />
                    <path
                      d="M288 304c-87 0-175.3 48-191.64 138.6-2 10.92 4.21 21.4 15.65 21.4H464c11.44 0 17.62-10.48 15.65-21.4C463.3 352 375 304 288 304z"
                      fill="none"
                      stroke="currentColor"
                      stroke-miterlimit="10"
                      stroke-width="32"
                    />
                    <path
                      fill="none"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="32"
                      d="M88 176v112M144 232H32"
                    />
                  </svg>
                </div>
                Create User
              </button>
            </div>
          </div>
          <div class="container">
            <table id="dataTable" class="display">
              <thead class="thead">
                <tr>
                  <th>Image</th>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Email Address</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
  
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <footer class="footer">
        <p class="copyright">
          Copyright 2025 Barangay 42-C. All Rights Reserved.
        </p>
      </footer>
    </main>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>

    <script>

    $('.information__input').on('focus', function() {
        $(this).closest('.input__box').find('.red__dot').hide();
    }).on('blur', function() {
        if ($(this).val().trim() === '') {
            $(this).closest('.input__box').find('.red__dot').show();
        }
    });


// view
$(document).on("click", ".viewUserBtn", function () {
    let token = $(this).data("token"); // Get user token
    if (!token) {
        console.error("Token is missing!");
        return;
    }

    $.ajax({
        url: "<?= site_url('/admin/get-user') ?>",
        type: "GET",
        data: { token: token },  // Send token instead of user_id
        dataType: "json",
        success: function (response) {
            console.log("Server Response:", response);

            if (response.success) {
                document.querySelector(".wrapper").classList.add("open");
                document.getElementById("viewEventModal").classList.add("open");

                // Store token inside the modal for updates
                $("#viewEventModal").data("token", token);

                // Populate fields
                $(".information__input[name='view_firstname']").val(response.data.firstname);
                $(".information__input[name='view_lastname']").val(response.data.lastname);
                $(".information__input[name='view_middlename']").val(response.data.middlename);
                $(".information__input[name='view_suffix']").val(response.data.suffix);
                $(".information__input[name='view_position']").val(response.data.position);
                $(".information__input[name='view_role']").val(response.data.role);
                $(".information__input[name='view_email']").val(response.data.username);
                $("#viewImagePreview").attr("src", response.data.image);

                // Disable fields initially
                $(".information__input").prop("disabled", true);
                $(".btn__secondary__edit").text("Edit");
                console.log(response.data.status + " " + "STATUS ")
                if (response.data.status == 1) {
                      $('.btn__secondary__deactivate').removeClass('hide');
                      $('.btn__secondary__reactivate').addClass('hide');
                  } else {
                      $('.btn__secondary__reactivate').removeClass('hide');
                      $('.btn__secondary__deactivate').addClass('hide');
                  }
                

            } else {
                alert(response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            alert("Error fetching user details.");
        },
    });
});

function reactivateUser() {
    let status = 1; // Assuming 1 means active

    let token = $("#viewEventModal").data("token");

    console.log(status);
    console.log(token);
    if (!token) {
        alert("Error: Token is missing!");
        return;
    }

    $.ajax({
        url: "<?= site_url('/admin/reactivate-user') ?>", // Using the same API
        type: "POST",
        data: {
            status: status,
            token: token
        },
        dataType: "json", 
        success: function(response) {
            if (response.success) {
                loadData(); 
                $(".success__indicator").removeClass("hide");
                $(".indicator__text").html('Account Reactivated!');
                setTimeout(function () {
                    $(".success__indicator").addClass("hide");
                    $(".indicator__text").html('');
                }, 3000);
                hideModal(); 
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("Reactivation Error:", error);
            alert("Failed to reactivate user.");
        }
    });
}


function deactivateUser() {
    let status = 0; // Assuming 0 means deactivated

    let token = $("#viewEventModal").data("token");

    console.log(status);
    console.log(token);
    if (!token) {
        alert("Error: Token is missing!");
        return;
    }

    $.ajax({
        url: "<?= site_url('/admin/deactivate-user') ?>",
        type: "POST",
        data: {
            status: status,
            token: token
        },
        dataType: "json", 
        success: function(response) {
            if (response.success) {
                loadData(); 
                $(".success__indicator").removeClass("hide");
                $(".indicator__text").html('Account Deactivated!');
                setTimeout(function () {
                    $(".success__indicator").addClass("hide");
                    $(".indicator__text").html('');
                }, 3000);
                hideModal(); 
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("Deactivation Error:", error);
            alert("Failed to deactivate user.");
        }
    });
}


// $('.btn__secondary__deactivate').on('click', function(){
//   deactivateUser();
// })

function updateUser() {
    let button = $(".btn__secondary__edit");

    if (button.text() === "Edit") {
        $(".information__input").prop("disabled", false);
        $("#viewImageInput").prop("disabled", false);
        button.text("Save");
    } else {
        $(".information__input").prop("disabled", true);
        $("#viewImageInput").prop("disabled", true);
        button.text("Edit");

        let token = $("#viewEventModal").data("token");
        if (!token) {
            alert("Error: Token is missing!");
            return;
        }

        let formData = new FormData();
        formData.append("token", token);
        formData.append("firstname", $(".information__input[name='view_firstname']").val());
        formData.append("lastname", $(".information__input[name='view_lastname']").val());
        formData.append("middlename", $(".information__input[name='view_middlename']").val());
        formData.append("suffix", $(".information__input[name='view_suffix']").val());
        formData.append("position", $(".information__input[name='view_position']").val());
        formData.append("role", $(".information__input[name='view_role']").val());
        formData.append("email", $(".information__input[name='view_email']").val());

        // Append file if selected
        let file = $("#viewImageInput")[0].files[0];
        if (file) {
            formData.append("view_profile_image", file); // Update key here
        }

        $.ajax({
            url: "<?= site_url('/admin/update-user') ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    if (response.image_url) {
                        $("#viewImagePreview").attr("src", response.image_url);
                    }
                    loadData();
                    $(".success__indicator").removeClass("hide");
                    $(".indicator__text").html('Account Updated!');
                    setTimeout(function () {
                        $(".success__indicator").addClass("hide");
                        $(".indicator__text").html('');
                    }, 3000);
                    hideModal();
                } else {
                    alert("Error updating user.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Update Error:", error);
                alert("Failed to update user.");
            },
        });
    }
}

$(document).on("click", ".btn__secondary__edit", function () {
    updateUser();
});



// IMG update
document.getElementById("viewImageInput").addEventListener("change", function(event) {
    let file = event.target.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("viewImagePreview").src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});



// When user selects an image
$("#viewImageUpload").on("change", function (event) {
    let file = event.target.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $("#viewImagePreview").attr("src", e.target.result); // Update the preview
        };
        reader.readAsDataURL(file);
    }
});


// Close modal event
$(document).on("click", ".closeModalBtn", function () {
    document.querySelector(".wrapper").classList.remove("open");
    document.getElementById("viewEventModal").classList.remove("open");
});


// Close modal (optional)
$(".modal__close").on("click", function () {
    $("#viewEventModal").fadeOut();
});



const clearRedDot = function() {
  $('.information__input').each(function() {
    $(this).siblings('.input__title').find('.red__dot').hide();
  });
}

function previewImage(event) {
    let reader = new FileReader();
    reader.onload = function () {
        let preview = document.getElementById("imagePreview");
        preview.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}


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
          $(".information__input").prop("disabled", false);
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

      const hideModal = function() {
        document.querySelector(".wrapper").classList.remove("open");
        document.getElementById("viewEventModal").classList.remove("open");
        document.getElementById("createEventModal").classList.remove("open");
      }
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

        const loadData = function() {
    // Destroy existing DataTable instance if already initialized
    if ($.fn.DataTable.isDataTable("#dataTable")) {
        $("#dataTable").DataTable().destroy();
    }
    // console.log($.fn.DataTable.version);

// Reinitialize DataTable
$("#dataTable").DataTable({
    "processing": true,
    "serverSide": false,
    "ajax": {
        "url": "<?= site_url('/admin/get-users') ?>",
        "type": "GET",
        "dataSrc": "data"
    },
    "columns": [
            { 
                "data": "profile_image", 
                "render": function(data, type, row) {
                    return `<img src="${data}" width="50" height="50" style="border-radius: 50%;">`;
                }
              },
              { "data": "account_id" },  
              { "data": "full_name" },  
              { "data": "username" },    
              { "data": "role" },        
              { "data": "status" },      
              { "data": "action" }      
          ],
          "order": [[0, "desc"]] 
      });
    };
        $(document).ready(function () {
          loadData();
        });


    </script>

<script>
$(document).ready(function () {
    $("#createUserForm").submit(function (e) {
        e.preventDefault(); 

        let formData = new FormData(this); 

        $.ajax({
            url: "<?= site_url('/admin/create-user') ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false, // Required for file uploads
            processData: false, // Prevent jQuery from processing data
            beforeSend: function () {
                $(".text-danger").text(""); 
            },
            success: function (response) {
                if (response.status == "success") {
                    loadData();
                    $(".indicator__text").html('New Account Created!');
                    $('.success__indicator').removeClass('hide');
                    setTimeout(function () {
                        $(".success__indicator").addClass("hide");
                        $(".indicator__text").html('');
                    }, 3000);
                    hideModal();
                } else if (response.status == "validation_error") {
                    $.each(response.errors, function (key, value) {
                        $(".error-" + key).text(value);
                    });
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Something went wrong. Please try again.");
            }
        });
    });
});




</script>
  </body>
</html>
