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
    <!-- Select search -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>

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
          <form id="createUserForm" action="<?= site_url('/admin/create-user') ?>" method="POST" class="modal__body community__modal" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="input__box">
                    <select class="information__input" id="residentsList" name="residents__list">
                    </select>
                    <p class="text-danger"></p>
                </div>
            </div>
            <div class="row flex__d__col">
                <div class="row grid grid__2__cols__modified">
                <div class="img__box pos__rel" onclick="document.getElementById('profile_image').click()">
                    <input type="file" name="profile_image" id="profile_image" accept="image/*" onchange="previewImage(event)" style="display: none;">
                     <img class="img__profile" id="imagePreview" src=""  style="width: 100%; object-fit: cover; max-height: 15rem; cursor: pointer;" />
                    <img class="img__placeholder pos__abs" src="<?= base_url('assets/images/img__default.png')?>" alt="">
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
                        <span class="input__title">Middlename</span>
                        <p class="text-danger"></p>
                    </div>
                    <div class="input__box">
                        <span class="input__title">Suffix<span class="red__dot">*</span></span>
                        <select class="information__input" name="suffix">

                        </select>
                        <p class="text-danger"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input__box">
                        <select class="information__input" placeholder="Enter Position" name="position" required>
                            <!-- For Each Here -->
                        </select>
                        <span class="input__title">Position<span class="red__dot">*</span></span>
                        <p class="text-danger"></p>
                        <p class="text-danger error-email"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input__box">
                        <span class="input__title">Start of Service<span class="red__dot">*</span></span>
                        <input type="date" class="information__input" name="start_service" required/>
                        <p class="text-danger"></p>
                    </div>
                    <div class="input__box">
                        <span class="input__title">End of Service<span class="red__dot">*</span></span>
                        <input type="date" class="information__input" name="end_service" required/>
                        <p class="text-danger"></p>
                    </div>
                </div>
                <div class="btn__box__modal">
                    <button type="button" class="btn__primary active btn__create__official">Create Official</button>
                </div>
            </div>
        </form>
      </div>
      <!-- View Officials -->
      <div id="viewEventModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">View Official</p>
        </div>
          <form id="createUserForm" action="<?= site_url('/admin/create-user') ?>" method="POST" class="modal__body community__modal" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row flex__d__col">
                <div class="row grid grid__2__cols__modified">
                <div class="img__box" onclick="document.getElementById('profile_image').click()">
                    <input type="file" name="profile_image" id="profile_image" accept="image/*" onchange="previewImage(event)" style="display: none;">
                    <img class="img__profile" id="viewImagePreview" src="<?= base_url('assets/images/img__default.png')?>" alt="  " style="width: 100%; max-height: 15rem; cursor: pointer; object-fit: cover;">
                </div>
                    <div class="input__box__container">
                        <div class="input__box margin__bottom__2">
                          <input type="hidden" name="view_user_id" id="view_user_id">
                            <input class="information__input" placeholder="Enter Firstname" name="view_firstname" required />
                            <span class="input__title">Firstname<span class="red__dot">*</span></span>
                            <p class="text-danger"></p>
                        </div>
                        <div class="input__box">
                            <input class="information__input" placeholder="Enter Lastname" name="view_lastname" required />
                            <span class="input__title">Lastname<span class="red__dot">*</span></span>
                            <p class="text-danger"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input__box">
                        <input class="information__input" placeholder="Enter Middlename" name="view_middlename" required />
                        <span class="input__title">Middlename<span class="red__dot">*</span></span>
                        <p class="text-danger"></p>
                    </div>
                    <div class="input__box">
                        <span class="input__title">Suffix<span class="red__dot">*</span></span>
                        <select class="information__input" name="view_suffix">

                        </select>
                        <p class="text-danger"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input__box">
                      <select class="information__input" placeholder="Enter Position" name="view_position" required>
                          <!-- For each here -->
                        </select>
                        <span class="input__title">Position<span class="red__dot">*</span></span>
                        <p class="text-danger"></p>
                        <p class="text-danger error-email"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input__box">
                        <span class="input__title">Start of Service<span class="red__dot">*</span></span>
                        <input type="date" class="information__input" name="view_start_service" required/>
                        <p class="text-danger"></p>
                    </div>
                    <div class="input__box">
                        <span class="input__title">End of Service<span class="red__dot">*</span></span>
                        <input type="date" class="information__input" name="view_end_service" required/>
                        <p class="text-danger"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input__box">
                        <span class="input__title">Status</span>
                        <select type="date" class="information__input" name="view_status" required>
                          <option value="1">Mark as Active</option>
                          <option value="0">Mark as Inactive</option>
                        </select>
                        <p class="text-danger"></p>
                    </div>
                </div>
                <div class="btn__box__modal">
                   <button type="submit" class="btn__primary active" id="submitUserBtn">Save Changes</button>
                </div>
            </div>
        </form>
      </div>
      <!-- View official ends -->
      <div class="container">
        <div class="card">
          <div class="heading__container">
            <p class="subheading">List of Officials</p>
            <div class="button__box">
              <!-- <button class="btn__secondary">
                <div class="icon__link">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon__link"
                    viewBox="0 0 512 512"
                  >
                    <path
                      fill="none"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="32"
                      d="M32 144h448M112 256h288M208 368h96"
                    />
                  </svg>
                </div>
                Filter
              </button> -->
              <button class="btn__secondary active btn__add__item">
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
                Add Official
              </button>
            </div>
          </div>
          <div class="container">
            <table id="officialsTable" class="display">
              <thead class="thead">
                <tr>
                  <th>Image</th>
                  <th>Official ID</th>
                  <th>Fullname</th>
                  <th>Position</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Position</th>
                  <th>Status</th>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

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

const createOfficial = function () {
    let form = $('#createUserForm')[0];
    let formData = new FormData(form);

    $.ajax({
        url: "<?= site_url('admin/create-official') ?>",
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('.btn__create__official').prop('disabled', true).text('Submitting...');
        },
        success: function (response) {
          saveAction("Created a new user");
            if (response.status === 'success') {
                alert('Official created successfully!');
                $('#createUserForm')[0].reset();
                $('#createEventModal').removeClass('open'); // Close the modal
                $('.wrapper').removeClass('open'); // Close the modal
                loadOfficials();
            } else if (response.status === 'error') {
                alert(response.message); 
            } else {
                alert(response.message || 'Something went wrong!');
            }
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('An error occurred while submitting the form.');
        },
        complete: function () {
            $('.btn__create__official').prop('disabled', false).text('Create Official');
        }
    });
};



    const loadOfficials = function() {
    if ($.fn.DataTable.isDataTable("#officialsTable")) {
        $("#officialsTable").DataTable().destroy();
    }

    $("#officialsTable").DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": {
            "url": "<?= site_url('/admin/load-officials') ?>",
            "type": "GET",
            "dataSrc": "data"
        },
        "columns": [
            { 
                "data": "profile_image", 
                "render": function(data, type, row) {
                    return `<img src="${data}" width="50" height="50" style="border-radius: 50%; object-fit: cover;">`;
                }
            },
            { "data": "official_id" },  
            { "data": "full_name" },  
            { "data": "position" },    
            { "data": "start_service" },        
            { "data": "end_service" },      
            { "data": "status" },      
            { "data": "action" }      
        ],
        "order": [[0, "desc"]] 
    });
};

loadOfficials();

    const previewImage = function(event) {
        let reader = new FileReader();
        reader.onload = function () {
            let preview = document.getElementById("imagePreview");
            preview.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
        $('.img__placeholder').addClass("hide");

    }

    const updateOfficial = function () {
    let button = $(".btn__secondary__edit");

    if (button.text() === "Edit") {
        $("#viewImageInput").prop("disabled", false);
        button.text("Save");
    } else {
        $("#viewImageInput").prop("disabled", true);
        button.text("Edit");

        let officialID = $("#view_user_id").val();

        if (!officialID) {
            alert("Error: Official ID is missing!");
            return;
        }

        let formData = new FormData();
        formData.append("official_id", officialID);
        formData.append("firstname", $("[name='view_firstname']").val());
        formData.append("lastname", $("[name='view_lastname']").val());
        formData.append("middlename", $("[name='view_middlename']").val());
        formData.append("suffix", $("[name='view_suffix']").val());
        formData.append("position", $("[name='view_position']").val());
        formData.append("view_start_service", $("[name='view_start_service']").val());
        formData.append("view_end_service", $("[name='view_end_service']").val());
        formData.append("view_status", $("[name='view_status']").val());

        let file = $("#profile_image")[0].files[0];
        if (file) {
            formData.append("view_profile_image", file);
        }
        saveAction("Updated an official");

        $.ajax({
            url: "<?= site_url('/admin/update-official') ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                  $(".wrapper").removeClass("open");
                  $("#createEventModal").removeClass("open");
                  $("#viewEventModal").removeClass("open");
                  alert("Official details updated!");
                  loadOfficials();

                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("Update Error:", error);
                alert("Failed to update user.");
            },
        });
    }
};

const residentsMap = {};

const loadResidentList = function () {
  $.ajax({
    url: '<?= base_url("admin/fetch-residents") ?>',
    method: 'GET',
    dataType: 'json',
    success: function (data) {
      const $select = $('#residentsList');
      $select.append('<option value="">Select via Residents List (Optional)</option>');

      data.forEach(function (resident) {
        $select.append(`<option value="${resident.resident_id}">${resident.fullname}</option>`);
        residentsMap[resident.resident_id] = resident;
      });
    },
    error: function () {
      console.error('Failed to fetch residents.');
    }
  });
};

loadResidentList();

$('#residentsList').on('change', function () {
  const selectedID = $(this).val();
  const resident = residentsMap[selectedID];

  if (resident) {
    $('[name="firstname"]').val(resident.firstname);
    $('[name="middlename"]').val(resident.middlename);
    $('[name="lastname"]').val(resident.lastname);
    $('[name="suffix"]').val(resident.suffix ?? '');
  } else {
    $('[name="firstname"], [name="middlename"], [name="lastname"], [name="suffix"]').val('');
  }
});

$("#submitUserBtn").on("click", function (e) {
    e.preventDefault();

    if (confirm("Are you sure you want to update this official's information?")) {
        updateOfficial();
    }
});

$('#residentsList').select2({
    placeholder: "Select via Residents List (Optional)",
    allowClear: true
});
    $('.btn__create__official').on('click', function () {
        createOfficial();
    });

    $(document).on("click", ".viewOfficialBtn", function () {
      $(".wrapper").addClass("open");
      $("#viewEventModal").addClass("open");
    });


    $(document).on('click', '.viewOfficialBtn', function () {
    const officialId = $(this).data('id');
      console.log(officialId);
    $(".wrapper").addClass("open");
    $("#viewEventModal").addClass("open");

    $.ajax({
        url: "<?= site_url('/admin/get-official') ?>",
        type: "GET",
        data: { official_id: officialId },
        dataType: "json",
        success: function (response) {
            if (response.status === 'success') {
                const official = response.data;

                $("input[name='view_firstname']").val(official.firstname);
                $("input[name='view_middlename']").val(official.middlename);
                $("input[name='view_lastname']").val(official.lastname);
                $("select[name='view_suffix']").val(official.suffix);
                $("select[name='view_position']").val(official.position);
                $("input[name='view_start_service']").val(official.start_service);
                $("input[name='view_end_service']").val(official.end_service);
                $("input[name='view_user_id']").val(official.official_id);

                const imageUrl = official.image
                    ? "<?= base_url() ?>" + official.image
                    : "<?= base_url('uploads/default-profile.png') ?>";
                $('#viewImagePreview').attr('src', imageUrl);
            }
        }
    });
});

// Select for positions
const getActivePositions = function () {
  $.ajax({
    url: '/admin/get-active-positions',
    method: 'GET',
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        const selects = $('select[name="view_position"], select[name="position"]');
        selects.html('<option value="" selected>Choose Position</option>');

        response.data.forEach(function (item) {
          const pos = item.position_name;
          selects.append(`<option value="${pos}">${pos}</option>`);
        });
      }
    }
  });
};


getActivePositions();

const getSuffixesSelect = function () {
  $.ajax({
    url: '/admin/get-suffixes-select',
    method: 'GET',
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        const suffixSelects = $('select[name="view_suffix"], select[name="suffix"]');
        
        suffixSelects.html(`
          <option value="" disabled selected>Choose Suffix</option>
          <option value="">None</option>
        `);

        response.data.forEach(function (item) {
          const suffix = item.suffix_title;
          suffixSelects.append(`<option value="${suffix}">${suffix}</option>`);
        });
      }
    }
  });
};


getSuffixesSelect();

    $(document).ready(function () {
      // Handle table buttons click
      $(".table__button").on("click", function () {
        $(".wrapper").addClass("open");
        $("#viewEventModal").addClass("open");
      });
      // $('.btn__secondary').on('click', function(){
      //   loadOfficials();
      // });
      // Handle add item button click
      $(".btn__add__item").on("click", function () {
        $(".wrapper").addClass("open");
        $("#createEventModal").addClass("open");
      });

      // Handle wrapper click (outside modal)
      $(".wrapper").on("click", function () {
        $(".wrapper").removeClass("open");
        $("#createEventModal").removeClass("open");
        $("#viewEventModal").removeClass("open");
      });

      // Handle Escape key press
      $(document).on("keydown", function (event) {
        if (event.key === "Escape") {
          $(".wrapper").removeClass("open");
          $("#createEventModal").removeClass("open");
          $("#viewEventModal").removeClass("open");
        }
      });

      // Handle menu icon click
      $(".menu__icon").on("click", function () {
        $("body").toggleClass("hide__sidebar");
        $(".nav__heading").toggleClass("d__none");
      });

      // Handle user box click
      $(".user__box").on("click", function () {
        $(".dropdown__menu").toggleClass("show");
      });

      // Initialize DataTable
      $("#example").DataTable();
    });
    function setDateToToday() {
        const today = new Date().toISOString().split('T')[0];

        $('input[type="date"]').each(function () {
            $(this).val(today);
            $(this).attr('min', today);
        });
    }
    setDateToToday();
    </script>
  </body>
</html>
