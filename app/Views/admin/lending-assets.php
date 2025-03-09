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

  </head>
  <body>
  <?= view ('includes/sidebar') ?>
    <main>
    <?= view('includes/header.php') ?>
      <div class="wrapper"></div>
      <div id="registerItemModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Register Item</p>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <div class="row modal__register__modified">
              <img class="img__upload" src="img__default.png" />
            </div>
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
          </div>
          <div class="btn__box__modal">
            <span class="btn__primary active">Register Item</span>
          </div>
        </form>
      </div>
      <div id="addResidentModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Add Resident Information</p>
          <button class="btn__secondary active">Edit Info</button>
        </div>
        <form class="modal__body community__modal">
          <div class="row">
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
                >Firstname<span class="red__dot">*</span></span
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
                >Lastname<span class="red__dot">*</span></span
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
                >Middlename<span class="red__dot">*</span></span
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
                >suffix<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
          </div>
          <div class="row">
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter contact-no"
                name="contact-no"
                readonly
              />
              <span class="input__title"
                >Contact No.<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                type="date"
                class="information__input"
                value=""
                placeholder="Enter Birthdate"
                name="birthdate"
                readonly
              />
              <span class="input__title"
                >Birthdate<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter Age"
                name="age"
                readonly
              />
              <span class="input__title"
                >Age<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter Birthplace"
                name="birthplace"
                readonly
              />
              <span class="input__title"
                >Birthplace<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter Citizenship"
                name="citizenship"
                readonly
              />
              <span class="input__title"
                >Citizenship<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
          </div>
          <div class="row">
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter Gender"
                name="gender"
                readonly
              />
              <span class="input__title"
                >Gender<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter Civil Status"
                name="civil-status"
                readonly
              />
              <span class="input__title"
                >Civil Status<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter Occupation"
                name="occupation"
                readonly
              />
              <span class="input__title"
                >Occupation<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter Religion"
                name="religion"
                readonly
              />
              <span class="input__title"
                >Religion<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
          </div>
          <div class="row margin__bottom__2">
            <div class="radio__box">
              <p class="radio__heading">
                Person with Disablity<span class="red__dot">*</span>
              </p>

              <div class="radio__buttons">
                <div class="radio__btn__container">
                  <input type="radio" class="radio__btn" value="yes" />
                  <span class="yes">Yes</span>
                </div>
                <div class="radio__btn__container">
                  <input type="radio" class="radio__btn" value="no" />
                  <span class="no">No</span>
                </div>
              </div>
            </div>
            <div class="radio__box">
              <p class="radio__heading">
                Voters of Barangay<span class="red__dot">*</span>
              </p>

              <div class="radio__buttons">
                <div class="radio__btn__container">
                  <input type="radio" class="radio__btn" value="yes" />
                  <span class="yes">Yes</span>
                </div>
                <div class="radio__btn__container">
                  <input type="radio" class="radio__btn" value="no" />
                  <span class="no">No</span>
                </div>
              </div>
            </div>
            <div class="radio__box">
              <p class="radio__heading">
                Head of the Family<span class="red__dot">*</span>
              </p>

              <div class="radio__buttons">
                <div class="radio__btn__container">
                  <input type="radio" class="radio__btn" value="yes" />
                  <span class="yes">Yes</span>
                </div>
                <div class="radio__btn__container">
                  <input type="radio" class="radio__btn" value="no" />
                  <span class="no">No</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row flex__d__col">
            <p class="modal__subheading">Household Information</p>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter Household Ownership"
                  name="household-ownership"
                  readonly
                />
                <span class="input__title"
                  >Household Ownership<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter House No."
                  name="house-no"
                  readonly
                />
                <span class="input__title"
                  >House No.<span class="red__dot">*</span></span
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
                  >Street<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
          </div>
          <div class="btn__box__modal">
            <span class="btn__secondary active btn__close">Close</span>
          </div>
        </form>
      </div>
      <div class="container">
        <div class="heading__box">
          <div class="tab__container">
            <div class="btn__container tab__1 visible">
              <button class="tab__btn">Inventory</button>
              <div class="active__tab"></div>
            </div>
            <div class="btn__container tab__2">
              <button class="tab__btn">Lending Item</button>
              <div class="active__tab"></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="heading__container">
            <p class="subheading">List of Items</p>
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
                Register Item
              </button>
            </div>
          </div>
          <div class="container">
            <table id="example" class="display">
              <thead class="thead">
                <tr>
                  <th>#</th>
                  <th>Item Name</th>
                  <th>Total Quantity</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Walis</td>
                  <td>11</td>
                  <td>10-21-2025</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Broom</td>
                  <td>8</td>
                  <td>11-15-2025</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Mop</td>
                  <td>5</td>
                  <td>12-01-2025</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Dustpan</td>
                  <td>7</td>
                  <td>01-10-2026</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Rug</td>
                  <td>12</td>
                  <td>02-18-2026</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Bleach</td>
                  <td>6</td>
                  <td>03-05-2026</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Detergent</td>
                  <td>9</td>
                  <td>04-22-2026</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Fabric Softener</td>
                  <td>10</td>
                  <td>05-30-2026</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Dishwashing Liquid</td>
                  <td>4</td>
                  <td>06-15-2026</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Garbage Bags</td>
                  <td>20</td>
                  <td>07-09-2026</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Hand Soap</td>
                  <td>15</td>
                  <td>08-25-2026</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Disinfectant Spray</td>
                  <td>3</td>
                  <td>09-14-2026</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>Scrub Sponge</td>
                  <td>7</td>
                  <td>10-07-2026</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>Toilet Cleaner</td>
                  <td>5</td>
                  <td>11-18-2026</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>Gloves</td>
                  <td>13</td>
                  <td>12-31-2026</td>
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
          document.getElementById("registerItemModal").classList.add("open");
        });
      });

      document
        .querySelector(".btn__add__item")
        .addEventListener("click", function () {
          document.querySelector(".wrapper").classList.add("open");
          document.getElementById("registerItemModal").classList.add("open");
        });

      document.querySelector(".wrapper").addEventListener("click", function () {
        document.querySelector(".wrapper").classList.remove("open");
        document.getElementById("registerItemModal").classList.remove("open");
        document.getElementById("addResidentModal").classList.remove("open");
      });

      document
        .querySelector(".btn__close")
        .addEventListener("click", function () {
          document.querySelector(".wrapper").classList.remove("open");
          document.getElementById("registerItemModal").classList.remove("open");
          document.getElementById("addResidentModal").classList.remove("open");
        });
      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
          document.querySelector(".wrapper").classList.remove("open");
          document.getElementById("registerItemModal").classList.remove("open");
          document.getElementById("addResidentModal").classList.remove("open");
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
