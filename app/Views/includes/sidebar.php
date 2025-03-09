<aside class="sidebar">
      <div class="logo__box">
        <img class="logo__img" src="<?= base_url ('assets/images/logo.png') ?>" alt="logo of the barangay" />
      </div>
      <nav class="navigation">
        <ul class="nav__list">
          <p class="nav__heading">Menu</p>
          <li class="list">
            <a href="<?= base_url('admin/dashboard') ?>" class="link">
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
          <li class="list active">
            <a href="<?= base_url('admin/community-records') ?>" class="link">
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
            <a href="<?= base_url('admin/lending-assets') ?>" class="link">
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
            <a href="<?= base_url ('admin/events') ?>" class="link">
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
            <a href="<?= base_url ('admin/services') ?>" class="link">
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
            <a href="<?= base_url('admin/officials')?>" class="link">
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
            <a href="<?= base_url ('admin/incident-reports') ?>" class="link">
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
          <li class="list">
            <a href="<?= base_url('admin/manage-users')?>" class="link">
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
            <a href="<?= base_url ('admin/account-settings') ?>" class="link">
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