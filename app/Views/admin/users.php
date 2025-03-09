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
    <aside class="sidebar">
      <div class="logo__box">
        <img class="logo__img" src="logo.png" alt="logo of the barangay" />
      </div>
      <nav class="navigation">
        <ul class="nav__list">
          <p class="nav__heading">Menu</p>
          <li class="list">
            <a href="index.html" class="link">
              <!-- Home Outline Icon -->
              <div class="icon__link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512"
                  width="24"
                  height="24"
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
              <span class="link__title">Dashboard</span>
            </a>
          </li>
          <li class="list">
            <a href="#" class="link">
              <!-- People Outline Icon -->
              <div class="icon__link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class=""
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
              <span class="link__title">Community Records</span>
            </a>
          </li>
          <li class="list">
            <a href="lending-assets.html" class="link">
              <!-- Cardboard outline icon -->
              <div class="icon__link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class=""
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M336 64h32a48 48 0 0148 48v320a48 48 0 01-48 48H144a48 48 0 01-48-48V112a48 48 0 0148-48h32"
                    fill="none"
                    stroke="currentColor"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                  <rect
                    x="176"
                    y="32"
                    width="160"
                    height="64"
                    rx="26.13"
                    ry="26.13"
                    fill="none"
                    stroke="currentColor"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                </svg>
              </div>
              <span class="link__title"> Lending & Asset Records</span>
            </a>
          </li>
          <li class="list">
            <a href="events.html" class="link">
              <!-- Date outline icon -->
              <div class="icon__link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class=""
                  viewBox="0 0 512 512"
                >
                  <rect
                    fill="none"
                    stroke="currentColor"
                    stroke-linejoin="round"
                    stroke-width="32"
                    x="48"
                    y="80"
                    width="416"
                    height="384"
                    rx="48"
                  />
                  <circle cx="296" cy="232" r="24" />
                  <circle cx="376" cy="232" r="24" />
                  <circle cx="296" cy="312" r="24" />
                  <circle cx="376" cy="312" r="24" />
                  <circle cx="136" cy="312" r="24" />
                  <circle cx="216" cy="312" r="24" />
                  <circle cx="136" cy="392" r="24" />
                  <circle cx="216" cy="392" r="24" />
                  <circle cx="296" cy="392" r="24" />
                  <path
                    fill="none"
                    stroke="currentColor"
                    stroke-linejoin="round"
                    stroke-width="32"
                    stroke-linecap="round"
                    d="M128 48v32M384 48v32"
                  />
                  <path
                    fill="none"
                    stroke="currentColor"
                    stroke-linejoin="round"
                    stroke-width="32"
                    d="M464 160H48"
                  />
                </svg>
              </div>
              <span class="link__title"> Events</span></a
            >
          </li>

          <li class="list">
            <a href="services.html" class="link">
              <!-- Medal outline icon -->
              <div class="icon__link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class=""
                  viewBox="0 0 512 512"
                >
                  <circle
                    cx="256"
                    cy="352"
                    r="112"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                  <circle
                    cx="256"
                    cy="352"
                    r="48"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                  <path
                    d="M147 323L41.84 159.32a32 32 0 01-1.7-31.61l31-62A32 32 0 0199.78 48h312.44a32 32 0 0128.62 17.69l31 62a32 32 0 01-1.7 31.61L365 323M371 144H37M428.74 52.6L305 250M140.55 144L207 250"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                </svg>
              </div>
              <span class="link__title"> List of Services</span></a
            >
          </li>
          <li class="list">
            <a href="officials.html" class="link">
              <!-- People Outline Icon -->
              <div class="icon__link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class=""
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
              <span class="link__title"> Officials</span></a
            >
          </li>
          <li class="list">
            <a href="incident-report.html" class="link">
              <!-- Exclamation Outline Icon -->
              <div class="icon__link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class=""
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z"
                    fill="none"
                    stroke="currentColor"
                    stroke-miterlimit="10"
                    stroke-width="32"
                  />
                  <path
                    d="M250.26 166.05L256 288l5.73-121.95a5.74 5.74 0 00-5.79-6h0a5.74 5.74 0 00-5.68 6z"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"
                  />
                  <path d="M256 367.91a20 20 0 1120-20 20 20 0 01-20 20z" />
                </svg>
              </div>
              <span class="link__title"> Incident Reports</span></a
            >
          </li>
          <li class="list active">
            <a href="users.html" class="link">
              <!-- New user icon -->
              <div class="icon__link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class=""
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
              <span class="link__title"> Manage Users</span></a
            >
          </li>
          <li class="list">
            <a href="account.html" class="link">
              <!-- Settings outline icon -->
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
              <span class="link__title"> Account Settings</span></a
            >
          </li>
        </ul>
      </nav>
    </aside>
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
          <h2 class="heading__secondary">Manage Users</h2>
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
            <p class="subheading">List of Users</p>
            <div class="button__box">
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
                Create User
              </button>
            </div>
          </div>
          <div class="container">
            <table id="example" class="display">
              <thead class="thead">
                <tr>
                  <th>User ID</th>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Email Address</th>
                  <th>Phone No.</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Last Login</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>will.bong123</td>
                  <td class="stat__indicator">willybong@example.com</td>
                  <td>09123456789</td>
                  <td>Super User</td>
                  <td>Active</td>
                  <td>10-31-97</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>will.bong123</td>
                  <td class="stat__indicator">willybong@example.com</td>
                  <td>09123456789</td>
                  <td>Super User</td>
                  <td>Active</td>
                  <td>10-31-97</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>will.bong123</td>
                  <td class="stat__indicator">willybong@example.com</td>
                  <td>09123456789</td>
                  <td>Super User</td>
                  <td>Active</td>
                  <td>10-31-97</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>will.bong123</td>
                  <td class="stat__indicator">willybong@example.com</td>
                  <td>09123456789</td>
                  <td>Super User</td>
                  <td>Active</td>
                  <td>10-31-97</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>will.bong123</td>
                  <td class="stat__indicator">willybong@example.com</td>
                  <td>09123456789</td>
                  <td>Super User</td>
                  <td>Active</td>
                  <td>10-31-97</td>
                  <td>
                    <button class="btn__primary table__button">View</button>
                  </td>
                </tr>
                <tr>
                  <td>0001</td>
                  <td>Walter White</td>
                  <td>will.bong123</td>
                  <td class="stat__indicator">willybong@example.com</td>
                  <td>09123456789</td>
                  <td>Super User</td>
                  <td>Active</td>
                  <td>10-31-97</td>
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
        .querySelector(".btn__add__resident")
        .addEventListener("click", function () {
          document.querySelector(".wrapper").classList.add("open");
          document.getElementById("createEventModal").classList.add("open");
        });

      document.querySelector(".wrapper").addEventListener("click", function () {
        document.querySelector(".wrapper").classList.remove("open");
        document.getElementById("viewEventModal").classList.remove("open");
        document.getElementById("createEventModal").classList.remove("open");
      });

      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
          document.querySelector(".wrapper").classList.remove("open");
          document.getElementById("viewEventModal").classList.remove("open");
          document.getElementById("createEventModal").classList.remove("open");
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
