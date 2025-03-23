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
    <link rel="stylesheet" href="<?= base_url('assets/css/table.css') ?>" />
    <link href="<?= base_url('assets/DataTables/datatables.min.css') ?>" rel="stylesheet" />

    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>

    <style>
      .icon__date {
        position: absolute;
        top: 50%;
        right: 2rem;
        transform: translateY(-50%);
      }
      .event__title__table {
        max-width: 10rem;  
        white-space: nowrap; 
        overflow: hidden; 
        text-overflow: ellipsis; 
      }
      table.dataTable {
        table-layout: fixed;
        width: 100% !important;
      }
      .icon__close {
        cursor: pointer;
      }

      .btn__box__modal {
        display: flex;
        gap: 1rem;
      }
      .event__disable {
        background-color: #fff;
        border: 1px solid #e72121;
        color: #e72121;
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
   <?= view ('includes/sidebar') ?>
    <main>
    <?= view('includes/header.php') ?>
    <!-- Error Display -->
    <div class="error__display hide">
        <p class="error__text"></p>
        <ion-icon class="validator__icon error__close" name="close-outline"></ion-icon>
     </div>
     <!-- Error Display ENDS -->
    <!-- Validation -->
     <div class="validator hide">
        <div class="validator__head">
            <p class="validator__header">Confirmation</p>
            <ion-icon class="validator__icon" name="close-outline"></ion-icon>
        </div>
        <div class="validator__body">
            <p class="validator__text__desc">Are you sure you want to proceed?</p></div>
        <div class="validator__footer">
            <button class="validator__btn validator__cancel">Cancel</button>
            <button class="validator__btn validator__proceed">Proceed</button>
        </div>
     </div>
     <!-- Validation ENDS -->
      <div class="wrapper"></div>
      <!-- EVENT CREATION -->
      <div id="createEventModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Create Event</p>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input event__title"
                  value=""
                  placeholder="Input event title"
                  name="event_title"
                  required
                />
                <span class="input__title"
                  >Event Title<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <textarea
                  class="information__input event__description"
                  value=""
                  placeholder="Enter event description"
                  name="event_description"
                  required
                ></textarea>
                <span class="input__title"
                  >Event Description<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input class="information__input" value="" name="date_start" type="datetime-local" required />
                <div class="icon__link icon__date">
                  <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><rect fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" x="48" y="80" width="416" height="384" rx="48"/><circle cx="296" cy="232" r="24"/><circle cx="376" cy="232" r="24"/><circle cx="296" cy="312" r="24"/><circle cx="376" cy="312" r="24"/><circle cx="136" cy="312" r="24"/><circle cx="216" cy="312" r="24"/><circle cx="136" cy="392" r="24"/><circle cx="216" cy="392" r="24"/><circle cx="296" cy="392" r="24"/><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" stroke-linecap="round" d="M128 48v32M384 48v32"/><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M464 160H48"/></svg>
                </div>
                <span class="input__title">Event Start Date/Time<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  name="date_end"
                  type="datetime-local"
                />
                <div class="icon__link icon__date">
                  <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><rect fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" x="48" y="80" width="416" height="384" rx="48"/><circle cx="296" cy="232" r="24"/><circle cx="376" cy="232" r="24"/><circle cx="296" cy="312" r="24"/><circle cx="376" cy="312" r="24"/><circle cx="136" cy="312" r="24"/><circle cx="216" cy="312" r="24"/><circle cx="136" cy="392" r="24"/><circle cx="216" cy="392" r="24"/><circle cx="296" cy="392" r="24"/><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" stroke-linecap="round" d="M128 48v32M384 48v32"/><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M464 160H48"/></svg>
                </div>
                <span class="input__title"
                  >Event End Date/Time<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
          </div>
          <div class="btn__box__modal">
            <span class="btn__primary create__event__btn active">Create Event</span>
          </div>
        </form>
      </div>
      <div id="viewEventModal" data-id="" class="modal">
        <div class="modal__header">
          <p class="modal__heading">View Event</p>
          <div class="icon__link icon__close">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
          </div>
        </div>
        <form method="POST" class="modal__body community__modal">
        <input type="hidden" name="view_event_id" id="event_id">
          <div class="row flex__d__col">
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter Street"
                  name="view_event_title"
                  readonly
                />
                <span class="input__title"
                  >Event title<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <textarea
                  class="information__input"
                  value=""
                  placeholder="Enter Street"
                  readonly
                  name="view_event_description"
                ></textarea>
                <span class="input__title"
                  >Event Description<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  name="view_event_start_date"
                  readonly
                  type="datetime-local"
                />
                <span class="input__title"
                  >Event Start Date/Time<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  name="view_event_end_date"
                  readonly
                  type="datetime-local"
                />
                <span class="input__title"
                  >Event End Date/Time<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
          </div>
          <div class="btn__box__modal">
            <span class="btn__primary event__edit active">Edit Event</span>
            <span class="btn__primary event__disable">Archive this event</span>
          </div>
        </form>
      </div>
      <div class="container">
        <div class="card">
          <div class="heading__container">
            <p class="subheading">List of events</p>
            <div class="button__box">
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
                Create Event
              </button>
            </div>
          </div>
          <div class="container">
            <table id="eventTable" class="display">
              <thead class="thead">
                <tr>
                  <th>#</th>
                  <th>Event Name</th>
                  <th>Description</th>
                  <th>Start Date/Time</th>
                  <th>End Date/Time</th>
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
// ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Functions ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //

const openErrorDisplay = function(message) {
    $('.error__text').html(message);
    $('.error__display').removeClass('hide');
}
const closeErrorDisplay = function() {
    $('.error__display').addClass('hide');
}

const openValidator = function() {
    $('.validator').removeClass('hide');
}
const closeValidator = function() {
    $('.validator').addClass('hide');
}

const closeModal = function() {                               // Close modal Function
      $(".wrapper, #createEventModal, #viewEventModal").removeClass("open");
}
const viewEventDetails = function(eventId) {                  // View Event Details on button click        
    $.ajax({
        url: "<?= base_url('admin/get-event-details') ?>", 
        type: "GET",
        data: { event_id: eventId }, 
        dataType: "json",
        success: function (response) {
            if (response.success) {
                // Populate modal fields
                $("input[name='view_event_title']").val(response.data.event_title);
                $("textarea[name='view_event_description']").val(response.data.event_description);
                $("input[name='view_event_start_date']").val(response.data.start_date);
                $("input[name='view_event_end_date']").val(response.data.end_date);
                $("input[name='view_event_id']").val(response.data.event_id);
                // Open modal
                $(".wrapper").addClass("open");
                $("#viewEventModal").addClass("open");
            } else {
                alert("Failed to fetch event details.");
            }
        },
        error: function () {
            alert("An error occurred while fetching event details.");
        }
    });
}
const updateEvent = function(saveBtn) {                       // Update Event Function
  let formData = {
      event_id: $.trim($("input[name='view_event_id']").val()), // Get the event ID
      event_title: $.trim($("input[name='view_event_title']").val()),
      event_description: $.trim($("textarea[name='view_event_description']").val()),
      start_date: $.trim($("input[name='view_event_start_date']").val()),
      end_date: $.trim($("input[name='view_event_end_date']").val())
  };

  // Disable the button and show loading state
  saveBtn.prop("disabled", true).text("Saving...");
      $.ajax({
          url: "<?= base_url('admin/update-event'); ?>",
          type: "POST",
          data: formData,
          dataType: "json",
          success: function (response) {
              if (response.success) {
                  alert("Event updated successfully!");
                  loadEventData(); // Reload event list
                  $(".modal__body input, .modal__body textarea").prop("readonly", true);
                  saveBtn.removeClass("event__save").addClass("event__edit").text("Edit Event");
                  $(".indicator__text").html('Event Details Updated!');
                    $('.success__indicator').removeClass('hide');
                    setTimeout(function () {
                        $(".success__indicator").addClass("hide");
                    }, 3000);
                  closeModal();
              } else {
                  $(".text-danger").text(""); // Clear previous errors
                  if (response.errors) {
                      $.each(response.errors, function (key, value) {
                          $("input[name='" + key + "'], textarea[name='" + key + "']")
                              .closest(".input__box")
                              .find(".text-danger")
                              .text(value);
                      });
                  } else {
                      alert(response.message || "Failed to update event.");
                  }
              }
          },
          error: function () {
              alert("An error occurred.");
              console.log(xhr.responseText); // Debugging
          },
          complete: function () {
              saveBtn.prop("disabled", false).text("Save Event"); // Re-enable button
          }
      });
}
const loadEventData = function () {
    const $eventTable = $("#eventTable");
    const $tableBody = $eventTable.find("tbody");

    // Destroy DataTable if it exists
    if ($.fn.DataTable.isDataTable($eventTable)) {
        $eventTable.DataTable().destroy();
    }

    // Show loading message
    $tableBody.html('<tr><td colspan="6" class="text-center">Loading...</td></tr>');

    $.ajax({
        url: "<?= base_url('admin/get-events') ?>",
        type: "GET",
        dataType: "json",
        cache: false,
        success: function (response) {
            if (response.success && Array.isArray(response.data) && response.data.length) {
                const tableData = response.data.map((event, index) => [
                    index + 1,
                    event.event_title,
                    event.event_description,
                    event.start_date,
                    event.end_date,
                    `<button class="btn__primary table__button" data-id="${event.event_id}">View</button>`
                ]);

                // Initialize DataTable with data
                $eventTable.DataTable({
                    "processing": true,
                    "serverSide": false,
                    "data": tableData,
                    "columns": [
                        { "title": "#" },
                        { "title": "Title" },
                        { "title": "Description" },
                        { "title": "Start Date" },
                        { "title": "End Date" },
                        { "title": "Action", "orderable": false }
                    ],
                    "order": [[0, "desc"]],
                    "language": {
                        "emptyTable": "No events available"
                    },
                    "pagingType": "simple_numbers",
                    "createdRow": function (row, data, dataIndex) {
                      $(row).find("td:eq(1)").addClass("event__title__table").attr("title", data[1]); // Title Column
                      $(row).find("td:eq(2)").addClass("event__title__table").attr("title", data[2]); // Description Column
                    }
                });

            } else {
                // Initialize empty DataTable if no data
                $eventTable.DataTable({
                    "processing": true,
                    "serverSide": false,
                    "data": [],
                    "columns": [
                        { "title": "#" },
                        { "title": "Title" },
                        { "title": "Description" },
                        { "title": "Start Date" },
                        { "title": "End Date" },
                        { "title": "Action", "orderable": false }
                    ],
                    "language": {
                        "emptyTable": "No events available"
                    },
                    "pagingType": "simple_numbers"
                });
            }
        },
        error: function (xhr, status, error) {
            $tableBody.html('<tr><td colspan="6" class="text-center">Error loading events</td></tr>');
            console.error("AJAX Error:", error);
        }
    });
};

const checkForms = function() {
  let firstMissingField = null;

  $('.modal.open .information__input').each(function() {
    if (!$(this).val().trim()) {
      firstMissingField = $(this).attr('name').replace(/_/g, ' ') + ' is required';
      return false; 
    }
  });

  if (firstMissingField) {
    closeValidator();
    openErrorDisplay(firstMissingField);
    return false;
  }
  
  return true;
};


const createEvent = function() {                              // Create Events
  if(checkForms()) {
    let formData = {
        event_title: $("input[name='event_title']").val(),
        event_description: $("textarea[name='event_description']").val(),
        date_start: $("input[name='date_start']").val(),
        date_end: $("input[name='date_end']").val()
    };

    $.ajax({
        url: "<?= base_url('admin/create-event'); ?>", // Adjust this to match your CI4 route
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (response) {
            if (response.success) {
              loadEventData(); // Reload event list
              $(".indicator__text").html('Event Created!');
                $('.success__indicator').removeClass('hide');
                setTimeout(function () {
                    $(".success__indicator").addClass("hide");
                }, 3000);
              closeModal();
              closeValidator();
              closeErrorDisplay();
      
            } else {
                $(".text-danger").text(""); // Clear previous errors
                $.each(response.errors, function (key, value) {
                    $("input[name='" + key + "'], textarea[name='" + key + "']")
                        .closest(".input__box")
                        .find(".text-danger")
                        .text(value);
                });
            }
        },
        error: function () {
            alert("An error occurred. Please try again.");
        },
    });
  } else {
      return;
  }
}

const deactivateEvent = function() {
    let status = 0;
    let id = $("#viewEventModal").data("id");
  console.log(id);
    $.ajax({
        url: "<?= site_url('/admin/deactivate-event') ?>",
        type: "POST",
        data: {
            status: status,
            id: id
        },
        dataType: "json", 
        success: function(response) {
            if (response.success) {
              loadEventData(); 
                $(".success__indicator").removeClass("hide");
                $(".indicator__text").html('Event archived!');
                setTimeout(function () {
                    $(".success__indicator").addClass("hide");
                }, 2000);
                closeModal(); 
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

// ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Event Listeners ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
$('.error__close').on('click', function(){
    closeErrorDisplay();
})
$('.event__disable').on('click', function(){
  deactivateEvent();
});
$('.create__event__btn').on('click', function(){                // Event Creation Validation
    openValidator();
})
$('.validator__proceed').on('click', function(){                // Event Creation
    createEvent();
})
$(document).on("click", ".table__button", function () {         // Show Event Details on click. Also, Using event delegation for table button since button is added dynamically thru script. 
  //Event ID is stored here when the view button is clicked. IMPORTANT for updating, etc.
  let eventId = $(this).data("id");
  $("#viewEventModal").data("id", eventId); 
    $(".modal__body input, .modal__body textarea").prop("readonly", true);
    viewEventDetails(eventId);
});
$(document).on("click", ".event__edit", function () {           // Event edit
    let editBtn = $(this);
    $(".modal__body input, .modal__body textarea").prop("readonly", false);
    editBtn.removeClass("event__edit").addClass("event__save").text("Save Changes");
});
$(document).on("click", ".event__save", function () {           // Event save
    updateEvent($(this)); // Call the function when saving changes
});
$(".btn__add__item").on("click", function () {                  // Toggle create modal
    $(".wrapper, #createEventModal").addClass("open");
    $(".modal__body input, .modal__body textarea").prop("readonly", false);
});
$(".wrapper").on("click", function () {                         // Close modal on background click
    closeModal();
    closeErrorDisplay();
});
$(document).on("keydown", function (event) {                    // Close modal on esc key
    if (event.key === "Escape") {
        closeModal();
        closeErrorDisplay();
    }
});
$(".menu__icon").on("click", function () {                      // Side bar Functionality
    $("body").toggleClass("hide__sidebar");
    $(".nav__heading").toggleClass("d__none");
});
$(".user__box").on("click", function () {                       // User menu functionality
    $(".dropdown__menu").toggleClass("show");
});
$(".icon__close").on("click", function(){                       //Closing of modal using X button
  closeModal();
})
// ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ On Load Functions ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
loadEventData();                                                // Load Event Data on page load
});

</script>
  </body>
</html>
