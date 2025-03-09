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
    <?= view ('includes/sidebar') ?>
    <main>
      <header class="header">
        <div class="section__title__container">
          <div class="menu__icon">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="ionicon"
              viewBox="0 0 512 512"
            >
              <path
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-miterlimit="10"
                stroke-width="32"
                d="M80 160h352M80 256h352M80 352h352"
              />
            </svg>
          </div>
          <h2 class="heading__secondary">Dashboard</h2>
        </div>
        <div class="user__box">
          <img
            src="<?= base_url('assets/images/circle.png')?>"
            class="user__image"
            alt="profile image of user"
          />

          <p class="user__name">John Doe</p>
          <ion-icon class="chev__down" name="chevron-down-outline"></ion-icon>
          <div class="dropdown__menu hide">
            <p class="user__name__menu">Welcome, <span>John!</span></p>
            <hr />
            <a href="#" class="link">
              <div class="icon__link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class=""
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M262.29 192.31a64 64 0 1057.4 57.4 64.13 64.13 0 00-57.4-57.4zM416.39 256a154.34 154.34 0 01-1.53 20.79l45.21 35.46a10.81 10.81 0 012.45 13.75l-42.77 74a10.81 10.81 0 01-13.14 4.59l-44.9-18.08a16.11 16.11 0 00-15.17 1.75A164.48 164.48 0 01325 400.8a15.94 15.94 0 00-8.82 12.14l-6.73 47.89a11.08 11.08 0 01-10.68 9.17h-85.54a11.11 11.11 0 01-10.69-8.87l-6.72-47.82a16.07 16.07 0 00-9-12.22 155.3 155.3 0 01-21.46-12.57 16 16 0 00-15.11-1.71l-44.89 18.07a10.81 10.81 0 01-13.14-4.58l-42.77-74a10.8 10.8 0 012.45-13.75l38.21-30a16.05 16.05 0 006-14.08c-.36-4.17-.58-8.33-.58-12.5s.21-8.27.58-12.35a16 16 0 00-6.07-13.94l-38.19-30A10.81 10.81 0 0149.48 186l42.77-74a10.81 10.81 0 0113.14-4.59l44.9 18.08a16.11 16.11 0 0015.17-1.75A164.48 164.48 0 01187 111.2a15.94 15.94 0 008.82-12.14l6.73-47.89A11.08 11.08 0 01213.23 42h85.54a11.11 11.11 0 0110.69 8.87l6.72 47.82a16.07 16.07 0 009 12.22 155.3 155.3 0 0121.46 12.57 16 16 0 0015.11 1.71l44.89-18.07a10.81 10.81 0 0113.14 4.58l42.77 74a10.8 10.8 0 01-2.45 13.75l-38.21 30a16.05 16.05 0 00-6.05 14.08c.33 4.14.55 8.3.55 12.47z"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                </svg>
              </div>
              Account Settings</a
            >
            <a href="#" class="link">
              <div class="icon__link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="ionicon"
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M304 336v40a40 40 0 01-40 40H104a40 40 0 01-40-40V136a40 40 0 0140-40h152c22.09 0 48 17.91 48 40v40M368 336l80-80-80-80M176 256h256"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                </svg>
              </div>
              Logout</a
            >
          </div>
        </div>
      </header>
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
            <p class="count">2942</p>
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
            <p class="count">249</p>
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
            <p class="count">2943</p>
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
            <p class="count">29</p>
          </div>
        </div>
        <div class="container__bottom">
          <div id="chart" class="card"></div>
          <div class="events__container card">
            <h3 class="heading__tertiary">List of Events</h3>
            <div class="events">
              <!-- For each -->
              <div class="event">
                <div class="event__date">
                  <p class="day">25</p>
                  <p class="month">Oct</p>
                </div>
                <div class="event__title__box">
                  <p class="event__title">
                    Barangay Fiesta 2024: Unity in celebration
                  </p>
                </div>
              </div>
              <!-- For Each -->
              <!-- Remove later -->
              <div class="event">
                <div class="event__date">
                  <p class="day">25</p>
                  <p class="month">Oct</p>
                </div>
                <div class="event__title__box">
                  <p class="event__title">
                    Barangay Fiesta 2024: Unity in celebration
                  </p>
                </div>
              </div>
              <div class="event">
                <div class="event__date">
                  <p class="day">25</p>
                  <p class="month">Oct</p>
                </div>
                <div class="event__title__box">
                  <p class="event__title">
                    Barangay Fiesta 2024: Unity in celebration
                  </p>
                </div>
              </div>
              <div class="event">
                <div class="event__date">
                  <p class="day">25</p>
                  <p class="month">Oct</p>
                </div>
                <div class="event__title__box">
                  <p class="event__title">
                    Barangay Fiesta 2024: Unity in celebration
                  </p>
                </div>
              </div>
              <div class="event">
                <div class="event__date">
                  <p class="day">25</p>
                  <p class="month">Oct</p>
                </div>
                <div class="event__title__box">
                  <p class="event__title">
                    Barangay Fiesta 2024: Unity in celebration
                  </p>
                </div>
              </div>
              <div class="event">
                <div class="event__date">
                  <p class="day">25</p>
                  <p class="month">Oct</p>
                </div>
                <div class="event__title__box">
                  <p class="event__title">
                    Barangay Fiesta 2024: Unity in celebration
                  </p>
                </div>
              </div>
              <div class="event">
                <div class="event__date">
                  <p class="day">25</p>
                  <p class="month">Oct</p>
                </div>
                <div class="event__title__box">
                  <p class="event__title">
                    Barangay Fiesta 2024: Unity in celebration
                  </p>
                </div>
              </div>
              <div class="event">
                <div class="event__date">
                  <p class="day">25</p>
                  <p class="month">Oct</p>
                </div>
                <div class="event__title__box">
                  <p class="event__title">
                    Barangay Fiesta 2024: Unity in celebration
                  </p>
                </div>
              </div>
              <div class="event">
                <div class="event__date">
                  <p class="day">25</p>
                  <p class="month">Oct</p>
                </div>
                <div class="event__title__box">
                  <p class="event__title">
                    Barangay Fiesta 2024: Unity in celebration
                  </p>
                </div>
              </div>
              <!-- Remove later -->
            </div>
          </div>
          <div class="birthdays__container card">
            <h3 class="heading__tertiary">List of Birthdays</h3>
            <div class="birthday__container__card">
              <!-- foreach -->
              <div class="birthday__item">
                <div class="img__box__birthday">
                  <img src="<?= base_url('assets/images/circle.png')?>" alt="User image" />
                  <div class="user__details">
                    <p class="user__name">John Smith</p>
                    <p class="position">Admin</p>
                  </div>
                </div>
                <div class="birthday__box">
                  <p class="birthday__day">28</p>
                  <p class="birthday__month">Jun</p>
                </div>
              </div>
              <!-- foreach -->
              <!-- Remove later -->
              <div class="birthday__item">
                <div class="img__box__birthday">
                  <img src="<?= base_url('assets/images/circle.png')?>" alt="User image" />
                  <div class="user__details">
                    <p class="user__name">John Smith</p>
                    <p class="position">Admin</p>
                  </div>
                </div>
                <div class="birthday__box">
                  <p class="birthday__day">28</p>
                  <p class="birthday__month">Jun</p>
                </div>
              </div>
              <div class="birthday__item">
                <div class="img__box__birthday">
                  <img src="<?= base_url('assets/images/circle.png')?>" alt="User image" />
                  <div class="user__details">
                    <p class="user__name">John Smith</p>
                    <p class="position">Admin</p>
                  </div>
                </div>
                <div class="birthday__box">
                  <p class="birthday__day">28</p>
                  <p class="birthday__month">Jun</p>
                </div>
              </div>
              <div class="birthday__item">
                <div class="img__box__birthday">
                  <img src="<?= base_url('assets/images/circle.png')?>" alt="User image" />
                  <div class="user__details">
                    <p class="user__name">John Smith</p>
                    <p class="position">Admin</p>
                  </div>
                </div>
                <div class="birthday__box">
                  <p class="birthday__day">28</p>
                  <p class="birthday__month">Jun</p>
                </div>
              </div>
              <div class="birthday__item">
                <div class="img__box__birthday">
                  <img src="<?= base_url('assets/images/circle.png')?>" alt="User image" />
                  <div class="user__details">
                    <p class="user__name">John Smith</p>
                    <p class="position">Admin</p>
                  </div>
                </div>
                <div class="birthday__box">
                  <p class="birthday__day">28</p>
                  <p class="birthday__month">Jun</p>
                </div>
              </div>
              <div class="birthday__item">
                <div class="img__box__birthday">
                  <img src="<?= base_url('assets/images/circle.png')?>" alt="User image" />
                  <div class="user__details">
                    <p class="user__name">John Smith</p>
                    <p class="position">Admin</p>
                  </div>
                </div>
                <div class="birthday__box">
                  <p class="birthday__day">28</p>
                  <p class="birthday__month">Jun</p>
                </div>
              </div>
              <div class="birthday__item">
                <div class="img__box__birthday">
                  <img src="<?= base_url('assets/images/circle.png')?>" alt="User image" />
                  <div class="user__details">
                    <p class="user__name">John Smith</p>
                    <p class="position">Admin</p>
                  </div>
                </div>
                <div class="birthday__box">
                  <p class="birthday__day">28</p>
                  <p class="birthday__month">Jun</p>
                </div>
              </div>
              <div class="birthday__item">
                <div class="img__box__birthday">
                  <img src="<?= base_url('assets/images/circle.png')?>" alt="User image" />
                  <div class="user__details">
                    <p class="user__name">John Smith</p>
                    <p class="position">Admin</p>
                  </div>
                </div>
                <div class="birthday__box">
                  <p class="birthday__day">28</p>
                  <p class="birthday__month">Jun</p>
                </div>
              </div>
              <div class="birthday__item">
                <div class="img__box__birthday">
                  <img src="<?= base_url('assets/images/circle.png')?>" alt="User image" />
                  <div class="user__details">
                    <p class="user__name">John Smith</p>
                    <p class="position">Admin</p>
                  </div>
                </div>
                <div class="birthday__box">
                  <p class="birthday__day">28</p>
                  <p class="birthday__month">Jun</p>
                </div>
              </div>
              <!-- Remove later -->
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
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const options = {
          series: [25, 15, 5, 35, 10, 5, 3, 2],
          labels: [
            "Male",
            "Female",
            "Minors",
            "Non Voters",
            "Non Head of the Family",
            "Archived",
            "PWD",
            "Voters",
          ],
          chart: {
            type: "donut",
            height: 380,
          },
          colors: [
            "#2196F3",
            "#9C27B0",
            "#F44336",
            "#009688",
            "#FF9800",
            "#00BCD4",
            "#4CAF50",
            "#FFC107",
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
                return value + "%";
              },
            },
          },
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      });
    </script>
    <script>
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
    </script>
  </body>
</html>
