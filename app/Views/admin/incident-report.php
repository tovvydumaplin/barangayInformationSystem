<?php 
    $session = session();
    $username = $session->get('username'); 
    $firstName = $session->get('firstname');
    $fullName = $session->get('firstname') . ' ' . $session->get('lastname');

?>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
  </head>
  <body>
   <?= view ('includes/sidebar') ?>
    <main>
    <?= view('includes/header.php') ?>
      <div class="wrapper"></div>
      <div id="addReportModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">File a Complaint</p>
        </div>
        <form id="createComplainForm" class="modal__body community__modal">
          <div class="row flex__d__col">
            <!-- 1 -->
            <div class="input__box">
                <select class="information__input" id="typeOfComplaint" name="type_of_complaint">
                  <option value="">Select one</option>
                  <option value="blotter">Blotter</option>
                  <option value="complaint">Complaint</option>
                </select>
                <span class="input__title">Type of Concern<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
            </div>
      
            <!-- 2 -->
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter fullname"
                  name="complainant"
                  
                />
                <span class="input__title"
                  >Complainant<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <!-- 1 -->
              <div class="input__box blotter__input d__none">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter age"
                  name="complainant_age"
                />
                <span class="input__title"
                  >Complainant Age<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <!--  -->
            <div class="input__box blotter__input d__none">
              <input
                class="information__input"
                value=""
                placeholder="Enter Address"
                name="complainant_address"
              />
              <span class="input__title"
                >Complainant Address<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter fullname"
                name="file_against"
              />
              <span class="input__title"
                >File Against<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <!-- 1 -->
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter middlename"
                  name="date"
                  type="date"
                />
                <span class="input__title"
                  >Date of Incident<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <!--  -->
              <div class="input__box blotter__input d__none">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter place of incident"
                  name="incident_location"
                />
                <span class="input__title"
                  >Location of Incident<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
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
                placeholder="Enter details"
                name="complaint_details"
                style="height: 15rem;"></textarea>
              <span class="input__title"
                >Complain Details<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <!--  -->
            <div class="input__box blotter__input d__none">
              <input
                class="information__input"
                value=""
                placeholder="Enter barangay's action"
                name="barangay_action"
              />
              <span class="input__title"
                >Barangay Action<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
          </div>
          <div class="btn__box__modal">

            <button class="btn__primary active btn__close" id="createComplain">
              File Report
            </button>
          </div>
        </form>
      </div>
      <!-- View Complaint -->
      <div id="viewReportModal" class="modal">
        <div class="modal__header">
            <p class="modal__heading">View Complaint</p>
        </div>
        <form id="viewComplainForm" class="modal__body community__modal">
          <div class="row flex__d__col">
            <!-- Type of Concern -->
             <input name="view_complaint_id" type="hidden"/>
            <div class="input__box">
              <input class="information__input" name="view_type_of_complaint" readonly />
              <span class="input__title">Type of Concern<span class="red__dot">*</span></span>
              <p class="text-danger"></p>
            </div>

            <!-- Complainant + Age -->
            <div class="row">
              <div class="input__box">
                <input class="information__input" name="view_complainant" readonly />
                <span class="input__title">Complainant<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
              </div>

              <div class="input__box blotter__input d__none">
                <input class="information__input" name="view_complainant_age" readonly />
                <span class="input__title">Complainant Age<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
              </div>
            </div>

            <!-- Complainant Address -->
            <div class="input__box blotter__input d__none">
              <input class="information__input" name="view_complainant_address" readonly />
              <span class="input__title">Complainant Address<span class="red__dot">*</span></span>
              <p class="text-danger"></p>
            </div>

            <!-- File Against -->
            <div class="input__box">
              <input class="information__input" name="view_file_against" readonly />
              <span class="input__title">File Against<span class="red__dot">*</span></span>
              <p class="text-danger"></p>
            </div>

            <!-- Date + Incident Location -->
            <div class="row">
              <div class="input__box">
                <input class="information__input" name="view_date" type="date" readonly />
                <span class="input__title">Date of Incident<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
              </div>

              <div class="input__box blotter__input d__none">
                <input class="information__input" name="view_incident_location" readonly />
                <span class="input__title">Location of Incident<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
              </div>
            </div>

            <!-- Complain Title -->
            <div class="input__box">
              <input class="information__input" name="view_complain_title" readonly />
              <span class="input__title">Complain Title<span class="red__dot">*</span></span>
              <p class="text-danger"></p>
            </div>

            <!-- Complaint Details -->
            <div class="input__box">
              <textarea class="information__input" name="view_complaint_details" readonly style="height: 15rem;"></textarea>
              <span class="input__title">Complain Details<span class="red__dot">*</span></span>
              <p class="text-danger"></p>
            </div>

            <!-- Barangay Action -->
            <div class="input__box blotter__input d__none">
              <input class="information__input" name="view_barangay_action" readonly />
              <span class="input__title">Barangay Action<span class="red__dot">*</span></span>
              <p class="text-danger"></p>
            </div>
          </div>

          <div class="btn__box__modal">
            <button type="button" class="btn__primary active" id="markAsCompleted">
              Mark as Solved
            </button>
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
              <button class="btn__secondary export__excel__btn" id="exportExcel">
              <i style="margin-right: 1rem" class="bi bi-download"></i>Export to Excel
              </button>
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
                File report
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.min.js"></script>

    <script>
$(document).ready(function () {
  // DataTables initialization
  $("#complainTable").DataTable();
// LOAD RESIDENTS (HOLD. Select are changed to inputs)
  // function loadResidents() {
  //   $.ajax({
  //     url: "/admin/residents-list",
  //     method: "GET",
  //     dataType: "json",
  //     success: function (residents) {
  //       let options = '<option value="">Choose...</option>';
  //       residents.forEach(function (resident) {
  //         let fullName = `${resident.firstname} ${resident.middlename} ${resident.lastname} ${resident.suffix || ''}`.trim();
  //         options += `<option value="${resident.resident_id}">${fullName}</option>`;
  //       });

  //       $('select[name="complainant"]').html(options);
  //       $('select[name="file_against"]').html(options);
  //     },
  //     error: function (xhr, status, error) {
  //       console.error("Failed to load residents:", error);
  //     }
  //   });
  // }

  // loadResidents();


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

  const loadComplaints = function() {
    const $complainTable = $('#complainTable');

    if ($.fn.DataTable.isDataTable($complainTable)) {
        $complainTable.DataTable().clear().destroy();
    }

    $complainTable.DataTable({
        ajax: {
            url: '<?= site_url('admin/get-complaints') ?>',
            type: 'GET',
            dataSrc: function(json) {
                return Array.isArray(json.data) && json.data.length ? json.data : [];
            }
        },
        dom: 'frtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Export to Excel',
                className: 'd-none',
                filename: function() {
                    const today = new Date();
                    const yyyy = today.getFullYear();
                    const mm = String(today.getMonth() + 1).padStart(2, '0');
                    const dd = String(today.getDate()).padStart(2, '0');
                    return `pinagbuklod-incident-${yyyy}-${mm}-${dd}`;
                },
                exportOptions: {
                    columns: ':not(:last-child)' // skip the action column
                }
            }
        ],
        order: [[0, 'desc']],
        columns: [
            { data: 'complaint_id' },
            { data: 'type_of_complaint' },
            { data: 'complainant_name' },
            { data: 'complain_against' },
            {
                data: 'status',
                render: function(data) {
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
                    return `
                        <button class="btn__view__complaint" data-id="${data}">View</button>
                        <button class="btn__export__pdf" data-id="${data}">Export PDF</button>
                    `;
                }
            }
        ],
        language: { emptyTable: "No complaints found" },
        pagingType: "simple_numbers"
    });
};



function getComplaintDataById(id) {
    let complaintData = null;

    $.ajax({
        url: `<?= site_url('admin/get-complaint') ?>/${id}`,  
        type: 'GET',
        async: false,
        success: function(response) {
            complaintData = response.data; 
        }
    });

    return complaintData;
}

const preparedBy = <?= json_encode($fullName) ?>;

function exportComplaintToPDF(complaintData) {
  saveAction("Exported data to PDF");
    const { complainant_name, complain_against, complain_title, complainant_age, complainant_address, location_of_incident, date, status, type_of_complaint, complain_details, barangay_action } = complaintData;

    const reportTitle = (type_of_complaint === 'blotter') ? 'Blotter Report' : 'Complaint Report';

    const complainantInfo = type_of_complaint === 'complaint' 
        ? `${complainant_name}` 
        : `${complainant_name}, aged ${complainant_age}, from ${complainant_address}`;

    const locationText = type_of_complaint === 'complaint' ? '' : `The incident took place at ${location_of_incident}.`;

    const complaintDetailsSection = complain_details ? [
        { text: '\nComplaint Details:', style: 'subheader', margin: [0, 10, 0, 5] },
        { text: complain_details, style: 'subheader' }
    ] : [];

    const barangayActionSection = (type_of_complaint === 'blotter' && barangay_action) ? [
        { text: '\nBarangay Action:', style: 'subheader', margin: [0, 10, 0, 5] },
        { text: barangay_action, style: 'subheader' }
    ] : [];

    const docDefinition = {
        content: [
            { text: 'Republic of the Philippines', style: 'headerText', alignment: 'center' },
            { text: 'Office of the Barangay Captain', style: 'headerText', alignment: 'center' },
            { text: 'Barangay 42C- Pinagbuklod Zone-5', style: 'headerText', alignment: 'center' },
            { text: 'San Antonio, Cavite City', style: 'headerText', alignment: 'center' },
            { text: '--------------------------------------------------------------', style: 'divider' },

            { text: reportTitle, style: 'mainHeader' },

            { 
                text: [
                    { text: `On ${date}, `, bold: true },
                    ` ${complainantInfo} reported an incident regarding ${complain_title}. `,
                    `The complainant accused ${complain_against} of the following: ${complain_title}. `,
                    locationText,
                    `The status of the ${type_of_complaint === 'blotter' ? 'blotter' : 'complaint'} is currently: `,
                    { text: status == 0 ? 'In Progress' : (status == 1 ? 'Completed' : 'Unknown'), bold: true },
                    `.`
                ],
                style: 'subheader',
                lineHeight: 1.5
            },

            ...complaintDetailsSection,

            ...barangayActionSection,

            { text: '\n\n' },

            {
                columns: [
                    { 
                        text: `Prepared by:\n${preparedBy}`, 
                        style: 'subheader', 
                        alignment: 'left', 
                        margin: [0, 30, 0, 0] 
                    },
                    { 
                        text: `Certified by:\nYolanda DC. Chi\nPunong Barangay`, 
                        style: 'subheader', 
                        alignment: 'right', 
                        margin: [0, 30, 0, 0] 
                    }
                ]
            }
        ],
        styles: {
            mainHeader: { fontSize: 18, bold: true, alignment: 'center', margin: [0, 10] },
            headerText: { fontSize: 14, bold: true, alignment: 'center', margin: [0, 5] },
            subheader: { fontSize: 14, margin: [0, 5] },
            divider: { fontSize: 10, margin: [0, 10], color: 'gray', alignment: 'center' }
        }
    };

    pdfMake.createPdf(docDefinition).download(`${reportTitle.toLowerCase().replace(' ', '-')}.pdf`);
}








$(document).on('click', '.btn__export__pdf', function() {
    const complaintId = $(this).data('id');
    const complaintData = getComplaintDataById(complaintId);

    if (complaintData) {
        exportComplaintToPDF(complaintData);
    }
});



$('#exportExcel').on('click', function() {
    $('#complainTable').DataTable().button('.buttons-excel').trigger();
});


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
          saveAction("Created a new complaint");
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

                $('[name="view_type_of_complaint"]').val(complaint.type_of_complaint);
                $('[name="view_complainant"]').val(complaint.complainant_name);
                $('[name="view_complainant_age"]').val(complaint.complainant_age);
                $('[name="view_complainant_address"]').val(complaint.complainant_address);
                $('[name="view_file_against"]').val(complaint.complain_against);
                $('[name="view_date"]').val(complaint.date);
                $('[name="view_incident_location"]').val(complaint.location_of_incident);
                $('[name="view_complain_title"]').val(complaint.complain_title);
                $('[name="view_complaint_details"]').val(complaint.complain_details);
                $('[name="view_barangay_action"]').val(complaint.barangay_action);
                $('[name="view_complaint_id"]').val(complaint.complaint_id);

                // Toggle blotter inputs
                if (complaint.type_of_complaint === 'blotter') {
                    $('.blotter__input').removeClass('d__none');
                } else {
                    $('.blotter__input').addClass('d__none');
                }

                // Status button
                if (complaint.status == 1) {
                    $('#markAsCompleted')
                        .text('Mark as Unsolved')
                        .addClass('unsolve')
                        .removeClass('solve');
                } else {
                    $('#markAsCompleted')
                        .text('Mark as Solved')
                        .addClass('solve')
                        .removeClass('unsolve');
                }

                // Show modal
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
      saveAction("Complaint marked as completed");

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
$('#typeOfComplaint').on("change", function() {
  if ($('#typeOfComplaint').val() == "blotter") {
    $('.blotter__input').removeClass("d__none");

  } else {
    $('.blotter__input').addClass("d__none");
  }
});
});

    </script>
  </body>
</html>
