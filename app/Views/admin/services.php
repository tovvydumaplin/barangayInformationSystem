<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barangay Information System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/general.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/sidebar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/reusables.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard-responsive.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/lending-assets.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/officials.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/table.css') ?>" />
    <link href="<?= base_url('assets/DataTables/datatables.min.css') ?>" rel="stylesheet" />

    <!-- Leaflet CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    />

    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>

    <style>
      #map {
        min-height: 70rem;
        width: 100%;
      }
      .pin__modal {
        position: fixed;
        top: 20rem;
        left: 50%;
        z-index: 100000;
        background-color: #ffffff;
        padding: 2rem;
        max-width: 70rem;
        min-width: 50rem;
        transform: translateX(-50%);
        border-radius: 1rem;
        border: 1px solid gray;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        display: none;
      }
        .form__data {
          display: flex;
          flex-direction: column;
          gap: 2rem;
        }
        .modal__heading {
          font-size: 2rem;
          font-weight: 600;
        }
        .heading__box {
          display: flex;
          align-items: center;
          justify-content: space-between;
          border-bottom: 1px solid #e4e4e4;
          padding-bottom: 1rem;
        }
        .information__input {
          padding: 2rem;
          font-size: 1.8rem;
          border-radius: 1rem;
          border: 1px solid gray;
          display: inline-block;
          width: 100%;
        }
        .icon__close {
          width: 3rem;
          height: 3rem;
        }
        .btn {
          padding: 1rem 3rem;
          border: none;
          border-radius: 0.5rem;
          background-color: #E4FFF5;
          font-family: "Roboto", sans-serif;
          font-weight: 600;
        }
        main {
        position: relative;
      }
      .input__group {
        display: flex;
        flex-direction: column;
        gap: 2rem;
      }

      .input__group .information__input {
        font-size: 1.6rem;
      }
      .btn__cancel__services {
        background-color: transparent;
        color: #5f5f5f;
      }
      .btn__save__services {
        color: var(--main-color);
      }
      .btn__save__services {
        background-color: var(--main-color);
        color: #fff;
      }
      .icon__close, .btn__cancel__services, .btn__save__services {
        cursor: pointer;
      }
    </style>
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
      <div class="container">
        <div class="map" id="map"></div>
        <button type="button" class="btn__edit__mode">Activate Suicide Mode</button>
        <button type="button" class="save-marker">SAVE</button>
        <button id="toggleAutoSave">Toggle Auto-Save</button>

      </div>
      <!-- Family Name Input Modal -->
      <div id="familyModal" class="pin__modal">
        <form id="formData" class="form__data">
          <div class="heading__box">
             <h3 class="modal__heading">Enter House</h3>
             <ion-icon class="icon__close" name="close-outline"></ion-icon>
          </div>
          <div class="input__group">
            <input class="information__input" type="text" id="houseNumberInput" placeholder="Input House Number">
            <input class="information__input" type="text" name="house_street" placeholder="Input Street">
            <input class="information__input" type="hidden" id="latInput">
            <input class="information__input" type="hidden" id="lngInput">
          </div>
          <div class="btn__box">
            <button class="btn btn__save__services" type="button" id="saveHouseNumber">Save</button>
            <button class="btn btn__cancel__services" type="button" id="closeModalServices">Cancel</button>
           </div>
        <form>
      </div>

<!-- Clear Markers Button -->
      <button id="clearMarkers">Clear All Markers</button>
      <footer class="footer">
        <p class="copyright">
          Copyright 2025 Barangay 42-C. All Rights Reserved.
        </p>
      </footer>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="<?= base_url('assets/js/map.js') ?>"></script>
    <script>
      $(document).ready(function () {
        $(".table__button").on("click", function () {
          $(".wrapper, #viewEventModal").addClass("open");
        });

        $(".wrapper").on("click", function () {
          $(".wrapper, #viewEventModal, #createEventModal").removeClass("open");
        });

        $(document).on("keydown", function (event) {
          if (event.key === "Escape") {
            $(".wrapper, #viewEventModal, #createEventModal").removeClass("open");
          }
        });

        $(".menu__icon").on("click", function () {
          $("body").toggleClass("hide__sidebar");
          $(".nav__heading").toggleClass("d__none");
        });

        $(".user__box").on("click", function () {
          $(".dropdown__menu").toggleClass("show");
        });
        $('.icon__close').on("click", function(){
          $("#familyModal").hide();
        })
        $('.btn__cancel__services').on("click", function(){
          $("#familyModal").hide();
        })
      });
    </script>
  </body>
</html>
