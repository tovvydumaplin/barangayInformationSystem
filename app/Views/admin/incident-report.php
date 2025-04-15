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
    <link rel="stylesheet" href="<?= base_url('assets/css/incident-report.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/table.css') ?>" />
    <link href="<?= base_url('assets/DataTables/datatables.min.css') ?>" rel="stylesheet" />

    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>

  </head>
  <body>
   <?= view ('includes/sidebar') ?>
    <main>
    <?= view('includes/header.php') ?>
      <div class="wrapper"></div>
      <div id="addReportModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">File a Complaint</p>
          <button class="btn__secondary active">X</button>
        </div>
        <form id="createComplainForm" class="modal__body community__modal">
          <div class="row flex__d__col">
            <!-- 1 -->
            <div class="input__box">
                <select class="information__input" name="type_of_complaint">
                  <option value="">Select one</option>
                  <option value="blotter">Blotter</option>
                  <option value="complaint">Complaint</option>
                </select>
                <span class="input__title">Type of Concern<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
            </div>
            <!-- 2 -->
            <div class="input__box">
              <select
                class="information__input"
                value=""
                placeholder="Enter fullname"
                name="complainant"
                
              ></select>
              <span class="input__title"
                >Complainant<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <!-- 1 -->
            <div class="input__box">
              <select
                class="information__input"
                value=""
                placeholder="Enter lastname"
                name="file_against"
              ></select>
              <span class="input__title"
                >File Against<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <!-- 1 -->
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter middlename"
                name="date"
                type="date"
              />
              <span class="input__title"
                >Date<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter suffix"
                name="complain_title"
                
              />
              <span class="input__title"
                >Complain Title<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <textarea
                class="information__input"
                value=""
                placeholder="Enter contact-no"
                name="complaint_details"
                style="height: 15rem;"
                
              >
              </textarea>
              <span class="input__title"
                >Complain Details<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
          </div>
          <div class="btn__box__modal">
            <button class="btn__primary active btn__close" id="createComplain">
              File Complain
            </button>
            <span class="btn__secondary active btn__close">Close</span>
          </div>
        </form>
      </div>
      <!-- View Complaint -->
      <div id="viewReportModal" class="modal">
        <div class="modal__header">
            <p class="modal__heading">View Complaint</p>
            <button class="btn__secondary active">X</button>
        </div>
        <form id="viewComplainForm" class="modal__body community__modal">
        <div class="row flex__d__col">
          <!-- Hidden ID -->
          <input type="hidden" name="view_complaint_id" />
          <div class="input__box">
                <input class="information__input" name="view_type_of_complaint"/>
                <span class="input__title">Type of Concern<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
            </div>
            <!-- Complainant -->
            <div class="input__box">
                <input class="information__input" name="view_complainant"/>
                <span class="input__title">Complainant<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
            </div>

            <!-- File Against -->
            <div class="input__box">
                <input class="information__input" name="view_file_against"/>
                <span class="input__title">File Against<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
            </div>

            <!-- Date -->
            <div class="input__box">
                <input class="information__input" name="view_date" type="date" readonly />
                <span class="input__title">Date<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
            </div>

            <!-- Complain Title -->
            <div class="input__box">
                <input class="information__input" name="view_complain_title" readonly />
                <span class="input__title">Complain Title<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
            </div>

            <!-- Complaint Details -->
            <div class="input__box">
                <textarea class="information__input" name="view_complaint_details" style="height: 15rem;"  readonly></textarea>
                <span class="input__title">Complaint Details<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
            </div>
        </div>
        <div class="btn__box__modal">
            <button type="button" class="btn__primary active" id="markAsCompleted">
                Mark as Solved
            </button>
            <span class="btn__secondary active">Close</span>
        </div>
        </form>
     </div>

      <div class="container">
        <div class="heading__box">
          <div class="tab__container">
            <div class="btn__container tab__1 visible">
              <button class="tab__btn">Complains</button>
              <div class="active__tab"></div>
            </div>
            <!-- <div class="btn__container tab__2">
              <button class="tab__btn">Blotter</button>
              <div class="active__tab"></div>
            </div> -->
          </div>
        </div>
        <div class="card">
          <div class="heading__container">
            <p class="subheading">List of Complains</p>
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
                File complaint
              </button>
            </div>
          </div>
          <div class="container">
            <table id="complainTable" class="display">
              <thead class="thead">
                <tr>
                  <th>#</th>
                  <th>Type of Issue</th>
                  <th>Complainant</th>
                  <th>Defendant</th>
                  <th>Status</th>
                  <th>Complaint</th>
                  <th>Date</th>
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
$(document).ready(function () {
  // DataTables initialization
  $("#complainTable").DataTable();
// LOAD RESIDENTS
  function loadResidents() {
    $.ajax({
      url: "/admin/residents-list",
      method: "GET",
      dataType: "json",
      success: function (residents) {
        let options = '<option value="">Choose...</option>';
        residents.forEach(function (resident) {
          let fullName = `${resident.firstname} ${resident.middlename} ${resident.lastname} ${resident.suffix || ''}`.trim();
          options += `<option value="${resident.resident_id}">${fullName}</option>`;
        });

        $('select[name="complainant"]').html(options);
        $('select[name="file_against"]').html(options);
      },
      error: function (xhr, status, error) {
        console.error("Failed to load residents:", error);
      }
    });
  }

  loadResidents();


const loadComplaints = function() {
    if ($.fn.dataTable.isDataTable('#complainTable')) {
        $('#complainTable').DataTable().clear().destroy();
    }

    $('#complainTable').DataTable({
        ajax: {
            url: '<?= site_url('admin/get-complaints') ?>',
            type: 'GET',
            dataSrc: 'data'  
        },
        order: [[0, 'desc']],
        columns: [
            { data: 'complaint_id' },
            { data: 'type_of_complaint' },
            { data: 'complainant_name' },
            { data: 'complain_against' },
            {
                data: 'status',
                render: function(data, type, row) {
                    if (data == 0) {
                        return '<span class="status__badge badge__inprogress">In Progress</span>';
                    } else if (data == 1) {
                        return '<span class="status__badge badge__completed">Completed</span>';
                    }
                    return '<span class="status-badge badge--unknown">Unknown</span>';
                }
            },
            { data: 'complain_title' },
            { data: 'date' },
            {
                data: 'complaint_id',
                render: function(data, type, row) {
                    return '<button class="btn__view__complaint" data-id="' + data + '">View</button>';
                }
            }
        ]
    });
}

$(document).on('click', '.btn__view__complaint', function() {
  const complaintId = $(this).data('id'); 
  viewComplaint(complaintId); 
  $(".wrapper").addClass("open");
  
});


loadComplaints();



$('#createComplainForm').on('submit', function (e) {
    e.preventDefault(); 

    $.ajax({
        url: '<?= site_url('admin/create-complaint') ?>',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json', 
        success: function (response) {
            if (response.status === 'success') {
                alert('Complaint filed successfully!');
                loadComplaints();
                $('#createComplainForm')[0].reset();
                $(".wrapper, #addReportModal").removeClass("open");
            } else {
                alert('Something went wrong: ' + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('An error occurred while submitting the form.');
            $('#createComplainForm')[0].reset();
            $(".wrapper, #addReportModal").removeClass("open");
        }
    });
});



const viewComplaint = function(complaintId) {
    $.ajax({
        url: '<?= site_url('admin/view-complain') ?>/' + complaintId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                const complaint = response.data; 

                $('input[name="view_type_of_complaint"]').val(complaint.type_of_complaint);
                $('input[name="view_complainant"]').val(complaint.complainant_name);
                $('input[name="view_file_against"]').val(complaint.complain_against);
                $('input[name="view_date"]').val(complaint.date);
                $('input[name="view_complain_title"]').val(complaint.complain_title);
                $('textarea[name="view_complaint_details"]').val(complaint.complain_details);
                $('input[name="view_complaint_id"]').val(complaint.complaint_id);
                // Show the modal
                if (complaint.status == 1) {
                    $('#markAsCompleted').text('Mark as Unsolved').addClass('unsolve').removeClass('solve');
                } else {
                    $('#markAsCompleted').text('Mark as Solved').addClass('solve').removeClass('unsolve');
                }

                $("#viewReportModal").addClass("open");
                $(".wrapper").addClass("open");

            } else {
                alert('Failed to load complaint details');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('An error occurred while fetching the complaint details.');
        }
    });
}
$('#markAsCompleted').on('click', function () {
    const complaintId = $('input[name="view_complaint_id"]').val();
    const isSolved = $(this).hasClass('unsolve');
    const newStatus = isSolved ? 0 : 1;
    const actionText = newStatus === 1 ? 'mark this complaint as solved' : 'mark this complaint as unsolved';

    if (confirm(`Are you sure you want to ${actionText}?`)) {
        $.ajax({
            url: '<?= site_url('admin/mark-as-solved') ?>',
            type: 'POST',
            data: {
                complaint_id: complaintId,
                status: newStatus
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    if (newStatus === 1) {
                        $('#markAsCompleted').text('Mark as Unsolved').addClass('unsolve').removeClass('solve');
                    } else {
                        $('#markAsCompleted').text('Mark as Solved').addClass('solve').removeClass('unsolve');
                    }
                    $("#viewReportModal").removeClass("open");
                    $(".wrapper").removeClass("open");
                    loadComplaints(); // refresh table
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Something went wrong.');
            }
        });
    }
});






  // Table button click
  $(".table__button").on("click", function () {
    $(".wrapper").addClass("open");
    $("#viewReportModal").addClass("open");
  });

  // Add resident button click
  $(".btn__add__resident").on("click", function () {
    $(".wrapper").addClass("open");
    $("#addReportModal").addClass("open");
  });

  // Wrapper click to close modals
  $(".wrapper").on("click", function () {
    $(".wrapper").removeClass("open");
    $("#viewReportModal").removeClass("open");
    $("#addReportModal").removeClass("open");
  });

  // Close button click
  $(".btn__close").on("click", function () {
    $(".wrapper").removeClass("open");
    $("#viewReportModal").removeClass("open");
    $("#addReportModal").removeClass("open");
  });

  // Escape key press
  $(document).on("keydown", function (event) {
    if (event.key === "Escape") {
      $(".wrapper").removeClass("open");
      $("#viewReportModal").removeClass("open");
      $("#addReportModal").removeClass("open");
    }
  });

  // Menu icon toggle sidebar
  $(".menu__icon").on("click", function () {
    $("body").toggleClass("hide__sidebar");
    $(".nav__heading").toggleClass("d__none");
  });

  // User box dropdown toggle
  $(".user__box").on("click", function () {
    $(".dropdown__menu").toggleClass("show");
  });

  // Tab switching
  $(".tab__1").on("click", function () {
    $(".tab__1").addClass("visible");
    $(".tab__2").removeClass("visible");
  });

  $(".tab__2").on("click", function () {
    $(".tab__2").addClass("visible");
    $(".tab__1").removeClass("visible");
  });


});

    </script>
  </body>
</html>
