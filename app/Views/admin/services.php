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
        top: 14rem;
        left: 60%;
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
        <div class="map__box">
          <div class="map" id="map"></div>
          <div class="btn__group">        
            <button type="button" class="btn__edit__mode">
            <div class="icon__bs">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
              </svg>
            </div>
            Edit Mode
            </button>
            <button type="button" class="btn__hide__markers">
              <div class="icon__bs">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                  <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                  <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                  <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                </svg>
              </div>  
            Hide Markers</button>
            <div class="search__box">
              <input type="text" id="searchHouseInput" placeholder="Enter House Number">
              <button id="searchHouseButton">Search</button>
            </div>
          </div>
        </div>
              <!-- Family Name Input Modal -->
      <div id="familyModal" class="pin__modal">
        <form id="formData" class="form__data">
          <div class="heading__box">
             <h3 class="modal__heading">Register a House</h3>
             <ion-icon class="icon__close" name="close-outline"></ion-icon>
          </div>
          <div class="input__group">
            <select class="select__input" name="type">
              <option disabled selected>Select one</option>
              <option value="residential">Residential</option>
              <option value="government">Government Building</option>
              <option value="commercial">Commercial Establishment</option>
              <option value="healthcare">Healthcare Facility</option>
              <option value="education">Educational Institution</option>
              <option value="transport">Transport Hub</option>
            </select>
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
      </div>
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
