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
      <div id="viewReportModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Viewing Complaint</p>
          <button class="btn__secondary active">Edit Info</button>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <!-- 1 -->
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter fullname"
                name="firstname"
                readonly
              />
              <span class="input__title"
                >Complainant<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <!-- 1 -->
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter lastname"
                name="lastname"
                readonly
              />
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
                name="middlename"
                readonly
              />
              <span class="input__title"
                >Start Date/Time<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter suffix"
                name="suffix"
                readonly
              />
              <span class="input__title"
                >Complain<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <textarea
                class="information__input"
                value=""
                placeholder="Enter contact-no"
                name="contact-no"
                readonly
              >
              </textarea>
              <span class="input__title"
                >Complain Details<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
          </div>

          <div class="btn__box__modal">
            <span class="btn__secondary active btn__close">Close</span>
          </div>
        </form>
      </div>
      <div id="addReportModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">File a Complaint</p>
          <button class="btn__secondary active">X</button>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <!-- 1 -->
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter fullname"
                name="firstname"
                readonly
              />
              <span class="input__title"
                >Complainant<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <!-- 1 -->
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter lastname"
                name="lastname"
                readonly
              />
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
                name="middlename"
                readonly
              />
              <span class="input__title"
                >Start Date/Time<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter suffix"
                name="suffix"
                readonly
              />
              <span class="input__title"
                >Complain<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <textarea
                class="information__input"
                value=""
                placeholder="Enter contact-no"
                name="contact-no"
                readonly
              >
              </textarea>
              <span class="input__title"
                >Complain Details<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
          </div>
          <div class="btn__box__modal">
            <button class="btn__primary active btn__close">
              File Complain
            </button>
            <span class="btn__secondary active btn__close">Close</span>
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
            <div class="btn__container tab__2">
              <button class="tab__btn">Blotter</button>
              <div class="active__tab"></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="heading__container">
            <p class="subheading">List of Complains</p>
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
                Add Resident
              </button>
            </div>
          </div>
          <div class="container">
            <table id="example" class="display">
              <thead class="thead">
                <tr>
                  <th>#</th>
                  <th>Complainant</th>
                  <th>Defendant</th>
                  <th>Status</th>
                  <th>Complaint</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>Jesse Pinkman</td>
                  <td class="stat__indicator">In Progress</td>
                  <td>Theft or Lost Item Report</td>
                  <td>12-31-93</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>Jesse Pinkman</td>
                  <td class="stat__indicator">In Progress</td>
                  <td>Theft or Lost Item Report</td>
                  <td>12-31-93</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>Jesse Pinkman</td>
                  <td class="stat__indicator">In Progress</td>
                  <td>Theft or Lost Item Report</td>
                  <td>12-31-93</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>Jesse Pinkman</td>
                  <td class="stat__indicator">In Progress</td>
                  <td>Theft or Lost Item Report</td>
                  <td>12-31-93</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>Jesse Pinkman</td>
                  <td class="stat__indicator">In Progress</td>
                  <td>Theft or Lost Item Report</td>
                  <td>12-31-93</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>Jesse Pinkman</td>
                  <td class="stat__indicator">In Progress</td>
                  <td>Theft or Lost Item Report</td>
                  <td>12-31-93</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>Jesse Pinkman</td>
                  <td class="stat__indicator">In Progress</td>
                  <td>Theft or Lost Item Report</td>
                  <td>12-31-93</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>Jesse Pinkman</td>
                  <td class="stat__indicator">In Progress</td>
                  <td>Theft or Lost Item Report</td>
                  <td>12-31-93</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>Jesse Pinkman</td>
                  <td class="stat__indicator">In Progress</td>
                  <td>Theft or Lost Item Report</td>
                  <td>12-31-93</td>
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
          document.getElementById("viewReportModal").classList.add("open");
        });
      });

      document
        .querySelector(".btn__add__resident")
        .addEventListener("click", function () {
          document.querySelector(".wrapper").classList.add("open");
          document.getElementById("addReportModal").classList.add("open");
        });

      document.querySelector(".wrapper").addEventListener("click", function () {
        document.querySelector(".wrapper").classList.remove("open");
        document.getElementById("viewReportModal").classList.remove("open");
        document.getElementById("addReportModal").classList.remove("open");
      });

      document
        .querySelector(".btn__close")
        .addEventListener("click", function () {
          document.querySelector(".wrapper").classList.remove("open");
          document.getElementById("viewReportModal").classList.remove("open");
          document.getElementById("addReportModal").classList.remove("open");
        });
      addReportModal;
      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
          document.querySelector(".wrapper").classList.remove("open");
          document.getElementById("viewReportModal").classList.remove("open");
          document.getElementById("addReportModal").classList.remove("open");
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
      document.querySelector(".tab__1").addEventListener("click", function () {
        document.querySelector(".tab__1").classList.add("visible");
        document.querySelector(".tab__2").classList.remove("visible");
      });
      document.querySelector(".tab__2").addEventListener("click", function () {
        document.querySelector(".tab__2").classList.add("visible");
        document.querySelector(".tab__1").classList.remove("visible");
      });
      $(document).ready(function () {
        $("#example").DataTable();
      });
    </script>
  </body>
</html>
