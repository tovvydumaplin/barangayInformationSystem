<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barangay Information System</title>
    <link rel="preload" href="<?= base_url('assets/fonts/Roboto-Regular.ttf') ?>" as="font" type="font/ttf" crossorigin="anonymous" />
    <link rel="preload" href="<?= base_url('assets/fonts/Roboto-Bold.ttf') ?>" as="font" type="font/ttf" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?= base_url('assets/css/general.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/sidebar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/reusables.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard-responsive.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/community-records.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/table.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/DataTables/datatables.min.css') ?>" />

    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>

  </head>
  <body>
    <?= view('includes/sidebar') ?>
    <main>
      <div class="wrapper"></div>
      <div id="viewResidentProfileModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Resident Profile Info</p>
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
          <h2 class="heading__secondary">Community Records</h2>
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
        <div class="heading__box">
          <div class="tab__container">
            <div class="btn__container tab__1 visible">
              <button class="tab__btn">Resident Records</button>
              <div class="active__tab"></div>
            </div>
            <div class="btn__container tab__2">
              <button class="tab__btn">Household Records</button>
              <div class="active__tab"></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="heading__container">
            <p class="subheading">List of Residents</p>
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
              <button class="btn__secondary">
                <div class="icon__link">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="ionicon"
                    viewBox="0 0 512 512"
                  >
                    <path
                      d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03"
                      fill="none"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="32"
                    />
                  </svg>
                </div>
                Export to Excel
              </button>
              <button class="btn__secondary">
                <div class="icon__link">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="ionicon"
                    viewBox="0 0 512 512"
                  >
                    <path
                      d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                      fill="none"
                      stroke="currentColor"
                      stroke-linejoin="round"
                      stroke-width="32"
                    />
                    <rect
                      x="128"
                      y="240"
                      width="256"
                      height="208"
                      rx="24.32"
                      ry="24.32"
                      fill="none"
                      stroke="currentColor"
                      stroke-linejoin="round"
                      stroke-width="32"
                    />
                    <path
                      d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24"
                      fill="none"
                      stroke="currentColor"
                      stroke-linejoin="round"
                      stroke-width="32"
                    />
                    <circle cx="392" cy="184" r="24" />
                  </svg>
                </div>
                Print
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
                  <th>Name</th>
                  <th>Birthdate</th>
                  <th>Age</th>
                  <th>Civil Status</th>
                  <th>Gender</th>
                  <th>Voter</th>
                  <th>Family Head</th>
                  <th>Contact No.</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Tiger Nixon</td>
                  <td>1961-04-25</td>
                  <td>61</td>
                  <td>Married</td>
                  <td>Male</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>09123456789</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Tiger Nixon</td>
                  <td>1961-04-25</td>
                  <td>61</td>
                  <td>Married</td>
                  <td>Male</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>09123456789</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Tiger Nixon</td>
                  <td>1961-04-25</td>
                  <td>61</td>
                  <td>Married</td>
                  <td>Male</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>09123456789</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Tiger Nixon</td>
                  <td>1961-04-25</td>
                  <td>61</td>
                  <td>Married</td>
                  <td>Male</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>09123456789</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Tiger Nixon</td>
                  <td>1961-04-25</td>
                  <td>61</td>
                  <td>Married</td>
                  <td>Male</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>09123456789</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Tiger Nixon</td>
                  <td>1961-04-25</td>
                  <td>61</td>
                  <td>Married</td>
                  <td>Male</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>09123456789</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Tiger Nixon</td>
                  <td>1961-04-25</td>
                  <td>61</td>
                  <td>Married</td>
                  <td>Male</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>09123456789</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Tiger Nixon</td>
                  <td>1961-04-25</td>
                  <td>61</td>
                  <td>Married</td>
                  <td>Male</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>09123456789</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Garrett Winters</td>
                  <td>1958-07-25</td>
                  <td>63</td>
                  <td>Single</td>
                  <td>Male</td>
                  <td>No</td>
                  <td>Yes</td>
                  <td>09234567890</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Ashton Cox</td>
                  <td>1989-01-12</td>
                  <td>33</td>
                  <td>Married</td>
                  <td>Male</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>09345678901</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Cedric Kelly</td>
                  <td>1977-03-29</td>
                  <td>45</td>
                  <td>Divorced</td>
                  <td>Male</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>09456789012</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Airi Satou</td>
                  <td>1980-11-28</td>
                  <td>42</td>
                  <td>Married</td>
                  <td>Female</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>09567890123</td>
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
          document
            .getElementById("viewResidentProfileModal")
            .classList.add("open");
        });
      });

      document
        .querySelector(".btn__add__resident")
        .addEventListener("click", function () {
          document.querySelector(".wrapper").classList.add("open");
          document.getElementById("addResidentModal").classList.add("open");
        });

      document.querySelector(".wrapper").addEventListener("click", function () {
        document.querySelector(".wrapper").classList.remove("open");
        document
          .getElementById("viewResidentProfileModal")
          .classList.remove("open");
        document.getElementById("addResidentModal").classList.remove("open");
      });

      document
        .querySelector(".btn__close")
        .addEventListener("click", function () {
          document.querySelector(".wrapper").classList.remove("open");
          document
            .getElementById("viewResidentProfileModal")
            .classList.remove("open");
          document.getElementById("addResidentModal").classList.remove("open");
        });
      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
          document.querySelector(".wrapper").classList.remove("open");
          document
            .getElementById("viewResidentProfileModal")
            .classList.remove("open");
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
