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

  </head>
  <body>
  <?= view ('includes/sidebar') ?>
    <main>
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
          <p class="modal__heading">View Event</p>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter Street"
                  name="street"
                  readonly
                />
                <span class="input__title"
                  >Street<span class="red__dot">*</span></span
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
                ></textarea>
                <span class="input__title"
                  >Street<span class="red__dot">*</span></span
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
                  name="street"
                  readonly
                  type="date"
                />
                <span class="input__title"
                  >Event End Date/Time<span class="red__dot">*</span></span
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
          <h2 class="heading__secondary">Officials</h2>
        </div>
        <div class="user__box">
          <img
            src="circle.png"
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
        <div class="card">
          <div class="heading__container">
            <p class="subheading">List of Officials</p>
            <div class="button__box">
              <button class="btn__secondary">
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
              </button>
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
            <table id="example" class="display">
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
                <tr>
                  <td>1</td>
                  <td>Excalibur Barangay Fest</td>
                  <td>Lorem ipsum dolor sit amet consectur</td>
                  <td>12-31-93/ 11:34</td>
                  <td>12-31-93/ 11:34</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
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
      document.querySelectorAll(".table__button").forEach((button) => {
        button.addEventListener("click", () => {
          document.querySelector(".wrapper").classList.add("open");
          document.getElementById("viewEventModal").classList.add("open");
        });
      });

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
  </body>
</html>
