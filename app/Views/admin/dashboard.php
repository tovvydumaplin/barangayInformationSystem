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
    <link rel="stylesheet" href="/assets/css/general.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/sidebar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/reusables.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard-responsive.css') ?>" />
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>
  </head>
  <body>
    <?= view('includes/sidebar') ?>
    <main>
<!-- header -->
      <?= view('includes/header.php') ?>
      <div class="container">
        <div class="heading__box">
          <h1 class="heading__primary">
            Welcome, <span class="heading__name">John!</span>
          </h1>
        </div>
        <div class="cards margin__bottom__3">
          <!-- 1 -->
          <div class="card">
            <div class="card__title__box">
              <p class="subheading">Households</p>
              <!-- Home Outline Icon -->
              <div class="card__icon">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512"
                  width="24"
                  height="24"
                  class="card__icon__item"
                >
                  <path
                    d="M80 212v236a16 16 0 0016 16h96V328a24 24 0 0124-24h80a24 24 0 0124 24v136h96a16 16 0 0016-16V212"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                  <path
                    d="M480 256L266.89 52c-5-5.28-16.69-5.34-21.78 0L32 256M400 179V64h-48v69"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                </svg>
              </div>
            </div>
            <p id="countHouseHold" class="count">2942</p>
          </div>
          <!-- 2 -->
          <div class="card">
            <div class="card__title__box">
              <p class="subheading">Residents</p>
              <div class="card__icon">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="card__icon__item"
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M402 168c-2.93 40.67-33.1 72-66 72s-63.12-31.32-66-72c-3-42.31 26.37-72 66-72s69 30.46 66 72z"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                  <path
                    d="M336 304c-65.17 0-127.84 32.37-143.54 95.41-2.08 8.34 3.15 16.59 11.72 16.59h263.65c8.57 0 13.77-8.25 11.72-16.59C463.85 335.36 401.18 304 336 304z"
                    fill="none"
                    stroke="currentColor"
                    stroke-miterlimit="10"
                    stroke-width="32"
                  />
                  <path
                    d="M200 185.94c-2.34 32.48-26.72 58.06-53 58.06s-50.7-25.57-53-58.06C91.61 152.15 115.34 128 147 128s55.39 24.77 53 57.94z"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                  <path
                    d="M206 306c-18.05-8.27-37.93-11.45-59-11.45-52 0-102.1 25.85-114.65 76.2-1.65 6.66 2.53 13.25 9.37 13.25H154"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-miterlimit="10"
                    stroke-width="32"
                  />
                </svg>
              </div>
            </div>
            <p id="countResidents" class="count">Loading...</p>
          </div>
          <!-- 3 -->
          <div class="card">
            <div class="card__title__box">
              <p class="subheading">Settled Cases</p>
              <div class="card__icon">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="card__icon__item"
                  viewBox="0 0 512 512"
                >
                  <rect
                    x="32"
                    y="128"
                    width="448"
                    height="320"
                    rx="48"
                    ry="48"
                    fill="none"
                    stroke="currentColor"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                  <path
                    d="M144 128V96a32 32 0 0132-32h160a32 32 0 0132 32v32M480 240H32M320 240v24a8 8 0 01-8 8H200a8 8 0 01-8-8v-24"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                </svg>
              </div>
            </div>
            <p id="countCompletedComplaints" class="count">Loading...</p>
          </div>
          <!-- 4 -->
          <div class="card">
            <div class="card__title__box">
              <p class="subheading">Unsettled Cases</p>
              <div class="card__icon">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="card__icon__item"
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M112.91 128A191.85 191.85 0 0064 254c-1.18 106.35 85.65 193.8 192 194 106.2.2 192-85.83 192-192 0-104.54-83.55-189.61-187.5-192a4.36 4.36 0 00-4.5 4.37V152"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                  <path
                    d="M233.38 278.63l-79-113a8.13 8.13 0 0111.32-11.32l113 79a32.5 32.5 0 01-37.25 53.26 33.21 33.21 0 01-8.07-7.94z"
                  />
                </svg>
              </div>
            </div>
            <p id="countPendingComplaints" class="count">Loading...</p>
          </div>
        </div>
        <div class="container__bottom">
          <div id="chart" class="card"></div>
          <div class="events__container card">
            <h3 class="heading__tertiary">List of Events</h3>
            <div class="events" id="events-container">
                  <!-- events -->
            </div>
          </div>
          <div class="birthdays__container card">
            <h3 class="heading__tertiary">New Accounts</h3>
            <div id="newAccounts" class="birthday__container__card">
                  <!-- new accounts -->
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

    <script>

const countHouseHold = function() {
    $('#countHouseHold').text('Loading...'); 

    $.ajax({
        url: '<?= base_url("admin/count-house-status") ?>',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#countHouseHold').text(response.count);
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", error);
            $('#countHouseHold').text('Error'); 
        }
    });
};
const countResidents = function() {
    $('#countResidents').text('Loading...');

    $.ajax({
        url: '<?= base_url("admin/count-residents") ?>',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#countResidents').text(response.count);
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", error);
            $('#countResidents').text('Error');
        }
    });
};

const countCompletedComplaints = function() {
    $('#countCompletedComplaints').text('Loading...');

    $.ajax({
        url: '<?= base_url("admin/count-completed-complaints") ?>',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#countCompletedComplaints').text(response.count);
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", error);
            $('#countCompletedComplaints').text('Error');
        }
    });
};

const countPendingComplaints = function() {
    $('#countPendingComplaints').text('Loading...');

    $.ajax({
        url: '<?= base_url("admin/count-pending-complaints") ?>',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#countPendingComplaints').text(response.count);
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", error);
            $('#countPendingComplaints').text('Error');
        }
    });
};

const loadEvents = function() {
    $.ajax({
        url: "<?= base_url('admin/get-events-dashboard') ?>",  
        method: "GET",
        dataType: "json",
        success: function(events) {
            const eventsContainer = $('#events-container');
            eventsContainer.empty(); 

            events.forEach(function(event) {
                const startDate = new Date(event.start_date);
                const day = startDate.getDate();
                const month = startDate.toLocaleString('default', { month: 'short' });

                const eventHtml = `
                    <div class="event">
                        <div class="event__date">
                            <p class="day">${day}</p>
                            <p class="month">${month}</p>
                        </div>
                        <div class="event__title__box">
                            <p class="event__title">${event.event_title}</p>
                        </div>
                    </div>
                `;

                eventsContainer.append(eventHtml);
            });
        },
        error: function(xhr, status, error) {
            console.error("Error loading events:", error);
        }
    });
};
const loadNewUsers = function() {
    $.ajax({
        url: '<?= base_url("admin/get-new-users") ?>',  // URL for the AJAX request
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            let newAccountsContainer = $('#newAccounts');
            newAccountsContainer.empty();  // Clear the container before appending new data

            // Loop through each user and generate HTML
            $.each(response, function(index, user) {
                let userItem = `
                    <div class="birthday__item">
                        <div class="img__box__birthday">
                            <!-- Check if image exists and prepend 'assets/' to image path -->
                            <img class="user__img__display" src="<?= base_url('') ?>${user.image ? user.image : 'assets/images/default.png'}" alt="User image" />
                            <div class="user__details">
                                <p class="user__name">${user.firstname} ${user.lastname}</p>
                                <p class="position">${user.role}</p>
                            </div>
                        </div>
                        <div class="birthday__box">
                            <p class="birthday__day">${new Date(user.created_at).getDate()}</p>
                            <p class="birthday__month">${new Date(user.created_at).toLocaleString('default', { month: 'short' })}</p>
                        </div>
                    </div>
                `;
                newAccountsContainer.append(userItem);  // Add each user to the container
            });
        },
        error: function(xhr, status, error) {
            console.error("Error loading new users:", error);
        }
    });
};

$('.heading__name').on("click", function() {
  loadNewUsers();
})
// Call the function to load new users when the document is ready
$(document).ready(function() {
    loadNewUsers();
});

// Call it on page load if needed
$(document).ready(function() {
    countHouseHold();
    countResidents();
    countCompletedComplaints();
    countPendingComplaints();
    loadEvents();
    loadNewUsers();
});


document.addEventListener("DOMContentLoaded", function () {
  $.ajax({
    url: "<?= base_url('admin/get-resident-stats') ?>",
    method: "GET",
    dataType: "json",
    success: function (data) {
      const options = {
        series: [
          data.male,
          data.female,
          data.minors,
          data.non_voters,
          data.non_head,
          data.head_of_family,  // Added head of family
          data.archived,
          data.pwd,
          data.voters,
        ],
        labels: [
          "Male",
          "Female",
          "Minors",
          "Non Voters",
          "Non Head of the Family",
          "Head of the Family",  // Added label
          "Archived",
          "PWD",
          "Voters",
        ],
        chart: {
          type: "donut",
          height: 380,
        },
        colors: [
          "#2196F3", // Male
          "#9C27B0", // Female
          "#F44336", // Minors
          "#009688", // Non Voters
          "#FF9800", // Non Head
          "#8E44AD", // Head of the Family (NEW)
          "#00BCD4", // Archived
          "#4CAF50", // PWD
          "#FFC107", // Voters
        ],
        legend: {
          position: "left",
          offsetY: 20,
        },
        plotOptions: {
          pie: {
            donut: {
              size: "65%",
              labels: {
                show: true,
                total: {
                  show: true,
                  showAlways: true,
                  label: "Total",
                  fontSize: "22px",
                  fontFamily: "Helvetica, Arial, sans-serif",
                  fontWeight: 600,
                  color: "#373d3f",
                },
              },
            },
          },
        },
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                height: 300,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
        tooltip: {
          y: {
            formatter: function (value) {
              return value; // Value as is
            },
          },
        },
      };

      const chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    },
    error: function (xhr, status, error) {
      console.error("Error loading chart data:", error);
    }
  });
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
