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
    </style>
  </head>
  <body>
   <?= view ('includes/sidebar') ?>
    <main>
    <?= view('includes/header.php') ?>
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
                  class="information__input"
                  value=""
                  placeholder="Input event title"
                  name="event_title"
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
                  class="information__input"
                  value=""
                  placeholder="Enter event description"
                  name="event_description"
                ></textarea>
                <span class="input__title"
                  >Event Description<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input class="information__input" value="" name="date_start" type="datetime-local" />
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
      <div id="viewEventModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">View Event</p>
        </div>
        <form method="POST" class="modal__body community__modal">
        <input  name="view_event_id" id="event_id">
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
      document.addEventListener("DOMContentLoaded", function () {
      document
        .querySelector(".btn__add__item")
        .addEventListener("click", function () {
          document.querySelector(".wrapper").classList.add("open");
          document.getElementById("createEventModal").classList.add("open");
        });

      document.querySelector(".wrapper").addEventListener("click", function () {
        document.querySelector(".wrapper").classList.remove("open");
        document.getElementById("createEventModal").classList.remove("open");
        document.getElementById("viewEventModal").classList.remove("open");
      });

      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
          document.querySelector(".wrapper").classList.remove("open");
          document.getElementById("createEventModal").classList.remove("open");
          document.getElementById("viewEventModal").classList.remove("open");
        }
      });

      function closeModal() {
        document.querySelector(".wrapper").classList.remove("open");
        document.getElementById("createEventModal").classList.remove("open");
        document.getElementById("viewEventModal").classList.remove("open");
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

      $(document).ready(function () {
        $("#example").DataTable();
      });

      
    });
    </script>

    <script>
      function closeModal() {
        document.querySelector(".wrapper").classList.remove("open");
        document.getElementById("createEventModal").classList.remove("open");
        document.getElementById("viewEventModal").classList.remove("open");
      }
      $(document).ready(function () {
          loadEventData();
          // Using event delegation for table button since button is added dynamically thru script.
          $(document).on("click", ".table__button", function () {
              let eventId = $(this).data("id");
              viewEventDetails(eventId);
          });
          // event edit
          $(document).on("click", ".event__edit", function () {
              let editBtn = $(this);

              $(".modal__body input, .modal__body textarea").prop("readonly", false);
              editBtn.removeClass("event__edit").addClass("event__save").text("Save Changes");
          });
          // Event save
          $(document).on("click", ".event__save", function () {
              updateEvent($(this)); // Call the function when saving changes
          });

      });
      $('.create__event__btn').on('click', function(){
        createEvent();
      })

      function viewEventDetails(eventId) {
          $.ajax({
              url: "<?= base_url('admin/get-event-details') ?>", // Adjust to your CI4 route
              type: "GET",
              data: { event_id: eventId }, // Send event ID
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

      function updateEvent(saveBtn) {
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
                        closeModal();
                        console.log(response); // Debugging
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


      function loadEventData() {
        $.ajax({
            url: "<?= base_url('admin/get-events') ?>",
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    let eventTable = $("#eventTable");

                    // Destroy existing DataTable instance if it exists
                    if ($.fn.DataTable.isDataTable(eventTable)) {
                        eventTable.DataTable().destroy();
                    }

                    let tbody = eventTable.find("tbody");
                    tbody.empty(); // Clear existing rows

                    // Use map() to generate all rows at once
                    let rows = response.data.map((event, index) => `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${event.event_title}</td>
                            <td>${event.event_description}</td>
                            <td>${event.start_date}</td>
                            <td>${event.end_date}</td>
                            <td>
                                <button class="btn__primary table__button" data-id="${event.event_id}">View</button>
                            </td>
                        </tr>
                    `).join("");

                    tbody.append(rows); // Append all rows at once (better performance)
                    // Reinitialize DataTable with descending order
                    eventTable.DataTable({
                        order: [[0, "desc"]] // Sort by first column (event ID) in descending order
                    });
                    // Reinitialize DataTable
                    eventTable.DataTable();
                } else {
                    console.log("Failed to load events: ", response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: ", error);
            }
        });
    }

      function createEvent() {
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
                    alert("Event created successfully!");
                    loadEventData();
                    closeModal();
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
    }
    </script>
  </body>
</html>
