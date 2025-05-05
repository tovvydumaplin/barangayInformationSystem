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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Leaflet CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    />
    <!-- Select search -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Datatables -->
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <!-- apex -->
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

 /* CERT TABLE*/ 
    #certification-document {
        font-size: 12px; /* Base font size */
    }
    
    #certification-document h1 {
        font-size: 16px;
    }
    
    #certification-document h2 {
        font-size: 16px;
    }
    
    #certification-document h3 {
        font-size: 14px;
    }
    
    #certification-document h4 {
        font-size: 13px;
    }
    
    #certification-document p {
        font-size: 12px;
        margin: 5px 0;
    }
    
    /* Officials section specific styles */
    #certification-document .official-name {
        font-size: 11px;
        font-weight: bold;
        margin: 3px 0;
    }
    
    #certification-document .official-title {
        font-size: 9px;
        font-style: italic;
        margin: 0 0 10px 0;
    }
    
    @media print {
        .no-print, 
        .sidebar, 
        .navbar, 
        .card-header, 
        .footer, 
        #certification-form, 
        .no-print * {
            display: none !important;
        }
        body {
            margin: 0;
            padding: 0;
        }
        #certification-document {
            margin: 0;
            padding: 0;
        }
    }
    
    .certification-table {
        max-width: 210mm; /* A4 width */
        margin: 0 auto;
        box-sizing: border-box;
    }
    tr{
      background-color: #fff;
    }
    .btn__container {
      margin-bottom: 1rem;
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    #residentFullname {
      text-transform: capitalize;
    }
    .btn-download {
      padding: 2rem;
      border-radius: 1rem;
      border: none;
      background-color: var(--main-color);
      color: #fff;
      font-family: 'Roboto', sans-serif;
      font-weight: 600;
      font-size: 1.5rem;
      cursor: pointer;
    }
    .btn__form__container {
      display: flex;
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .btn__form {
      border: none;
      font-family: 'Roboto', sans-serif;
      font-size: 1.5rem;
      color: #3b3b3b;
      padding: 1rem;
      border-radius: 1rem;
      font-weight: 600;
      max-width: 20rem;
      min-width: 20rem;
      cursor: pointer;
      display: flex;
      justify-content: center;
      gap: 1rem;
    }
    .btn__form.active {
      background-color: var(--main-color);
      color: #fff;
    }
    .red__bg__page {
      background: linear-gradient(to bottom,
    rgb(199, 0, 0),         /* Top red */
    rgb(255, 87, 34),       /* Orange */
    rgb(255, 235, 59),      /* Yellow */
    rgb(76, 175, 80),       /* Green */
    rgb(199, 0, 0)          /* Bottom red again */
);

min-height: 80rem;
max-height: 82rem;

    }
    .container__grid {
      display: grid;
      grid-template-columns: 0.8fr 1.2fr;
      gap: 2rem;
    }
    .heading__primary {
        font-size: 3rem;
        font-weight: 600;
    }
    .subtext {
      margin-bottom: 2rem;
      color:#71717A;
    }
    .btn__container {
    margin-bottom: 1rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 2rem;
    border-radius: 1rem;
    border: 1px solid rgb(221, 221, 221);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
.chevy__down {
  position: absolute;
    top: 50%;
    right: 2rem;
    transform: translateY(-50%);
}
#residentSelect {
  margin-bottom: 2rem;
}
.barangay-officials-container {

    max-height: 72rem;
    min-height: 72rem;
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
      <div class="container container__grid">
      <div class="btn__container">
        <p class="heading__primary">Form Printing</p>
        <span class="subtext">Select document type and resident information</span>
        <p style="font-weight: 600;">Select document type:</p>
      <div class="btn__form__container">
          <button id="btnBarangayClearance" class="btn__form active"><i class="check__clearance bi bi-check2"></i>Barangay Certificate</button>
          <button id="btnIndigency" class="btn__form"><i class="check__indigent bi bi-check2 d__none"></i>Indigency</button>
      </div>
      <div class="pos__rel">
        <p style="font-weight: 600; margin-bottom: 1rem;">Select a resident:</p>
        <select id="residentSelect" class="information__input">
            <option value="">Choose a resident</option>
        </select>
      </div>
      <button id="download-pdf-btn" class="btn-download d__none"><i style="margin-right: 1rem" class="bi bi-download"></i> Download as PDF</button>
      <button id="download-pdf-btn-cert" class="btn-download"><i style="margin-right: 1rem" class="bi bi-download"></i> Download as PDF</button>

      </div>

      <table class="certification-table d__none" id="certification-document" style="font-size: 1.4rem;border-collapse: collapse;border: 1px solid #3b3b3b;margin-right: 2rem;margin-left: 2rem;">
          <!-- Header Row -->
          <tr>
              <td style="width: 20%; text-align: center; border-bottom: 1px solid #000; padding: 2rem;">
                  <img src="/assets/images/logo_barangay.png" alt="Barangay Logo" style="width: 80px; height: 80px;">
              </td>
              <td style="width: 60%; text-align: center; border-bottom: 1px solid #000;">
                  <p style="margin: 0 0 1rem 0; font-size: 14px;">Republic of the Philippines</p>
                  <p style="margin: 0 0 1rem 0; font-size: 14px; font-weight: bold;">Office of the Barangay Captain</p>
                  <p style="margin: 0 0 1rem 0; font-size: 14px;">Barangay 42C- Pinagbuklod Zone-5</p>
                  <p style="margin: 0 0 1rem 0; font-size: 14px;">San Antonio, Cavite City</p>
              </td>
              <td style="width: 20%; text-align: center; border-bottom: 1px solid #000; padding: 2rem">
                  <img src="/assets/images/cavite-logo.png" alt="Cavite Logo" style="width: 80px; height: 80px;">
              </td>
          </tr>
          <!-- Document No -->
          <tr>
              <td colspan="3" style="padding: 5px 10px; border-bottom: 1px solid #000;">
                  <p style="margin: 0; font-size: 12px;">No: 2024-0215</p>
              </td>
          </tr>
          <!-- Main Content -->
          <tr>
              <!-- Officials Column -->
              <td style="width: 30%; vertical-align: top; padding: 0; overflow: hidden;">
                  <div style="background-color: #cc0000; padding: 5px; color: white; font-weight: bold; text-align: center;">
                      BRGY. OFFICIALS
                  </div>
                  
                  <div class="barangay-officials-container" style="padding: 10px; background-color: #dddddd; color: #3b3b3b;">

                  </div>
              </td>
              
              <!-- Certification Content -->
              <td colspan="2" style="vertical-align: top; padding: 0;">
                  <!-- Title -->
                  <div style="background-color: #fff; text-align: center; padding: 10px; border-bottom: 1px solid #000;">
                      <h2 style="margin: 0; color: #3b3b3b; font-size: 18px;">CERTIFICATION OF<br>INDIGENCY</h2>
                  </div>
                  
                  <!-- Content -->
                  <div style="padding: 15px 20px;">
                      <p style="text-align: justify; line-height: 1.5;">
                          This is to certify that <input id="residentFullname" placeholder="Fullname" readonly style="padding-left: 0.5rem; border: none; border-bottom: 1px solid gray; background-color: #fff;"/>
                          of <input id="residentAddress" placeholder="Address" style="border: none; border-bottom: 1px solid gray; background-color: #fff;"/> San Antonio Cavite City has been 
                          found to belong to an Indigent Family after interview and 
                          validation has been made.
                      </p>
                      
                      <p style="text-align: justify; line-height: 1.5; margin-top: 20px;">
                          This certification is being issued upon request of the said 
                          person above for <input placeholder="Reason" style="padding-left: 0.5rem; border: none; border-bottom: 1px solid gray; background-color: #fff;"/>.
                      </p>
                      
                      <p style="text-align: justify; line-height: 1.5; margin-top: 20px;">
                          Given this <input placeholder="Month" style="padding-left: 0.5rem; border: none; border-bottom: 1px solid gray; background-color: #fff;"/> day of <input placeholder="Day" style="padding-left: 0.5rem; border: none; border-bottom: 1px solid gray; background-color: #fff;"/>, 2024.
                      </p>
                      
                      <div style="margin-top: 260px; text-align: right; padding-right: 40px;">
                          <p class="captainFullname" style="margin-bottom: 0; font-weight: bold;">YOLANDA DC. CHI</p>
                          <p style="margin-top: 0; font-style: italic;">Punong Barangay</p>
                      </div>
                      
                      <div style="font-size: 8px; margin-top: 40px;">
                          <p>Not valid without<br>Official seal</p>
                      </div>
                  </div>
              </td>
          </tr>
      </table>
      <!-- Barangay Cert -->

      <table class="certification-table" id="certification-barangay" style="font-size: 1.4rem;border-collapse: collapse;border: 1px solid #3b3b3b;margin-right: 2rem;margin-left: 2rem;">
          <!-- Header Row -->
          <tr>
              <td style="width: 20%; text-align: center; border-bottom: 1px solid #000; padding: 2rem;">
                  <img src="/assets/images/logo_barangay.png" alt="Barangay Logo" style="width: 80px; height: 80px;">
              </td>
              <td style="width: 60%; text-align: center; border-bottom: 1px solid #000;">
                  <p style="margin: 0 0 1rem 0; font-size: 14px;">Republic of the Philippines</p>
                  <p style="margin: 0 0 1rem 0; font-size: 14px; font-weight: bold;">Office of the Barangay Captain</p>
                  <p style="margin: 0 0 1rem 0; font-size: 14px;">Barangay 42C- Pinagbuklod Zone-5</p>
                  <p style="margin: 0 0 1rem 0; font-size: 14px;">San Antonio, Cavite City</p>
              </td>
              <td style="width: 20%; text-align: center; border-bottom: 1px solid #000; padding: 2rem">
                  <img src="/assets/images/cavite-logo.png" alt="Cavite Logo" style="width: 80px; height: 80px;">
              </td>
          </tr>
          <!-- Document No -->
          <tr>
              <td colspan="3" style="padding: 5px 10px; border-bottom: 1px solid #000;">
                  <p style="margin: 0; font-size: 12px;">No: 2024-0520</p>
              </td>
          </tr>
          <!-- Main Content -->
          <tr>
              <!-- Officials Column -->
              <td style="width: 30%; vertical-align: top; padding: 0;">
                  <div  style="background-color: #cc0000; padding: 5px; color: white; font-weight: bold; text-align: center;">
                      BRGY. OFFICIALS
                  </div>
                  
                  <div id="officialsContainer" class="red__bg__page barangay-officials" style="padding: 10px; color: #000; overflow: hidden;">
                      <p style="text-align: center; font-weight: bold; margin: 5px 0;">YOLANDA DC. CHI</p>
                      <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">Punong Barangay</p>

                      <p style="text-align: center; font-weight: bold; margin: 5px 0;">JAY-AR L. HERNANDEZ</p>
                      <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">Comm. On Peace & Order and Public Safety</p>

                      <p style="text-align: center; font-weight: bold; margin: 5px 0;">GERALD LOYOLA</p>
                      <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">Comm. On Public Works and Infrastructure</p>

                      <p style="text-align: center; font-weight: bold; margin: 5px 0;">JENNIE DARNELL P. DONES</p>
                      <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">Comm. On Social Welfare Management and Development</p>

                      <p style="text-align: center; font-weight: bold; margin: 5px 0;">DARYL A. HINZ L. ADIES</p>
                      <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">Comm. On Health & Sanitation</p>

                      <p style="text-align: center; font-weight: bold; margin: 5px 0;">MELISSA S. QUIAMBEL</p>
                      <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">Comm. On Women & Children Affairs</p>

                      <p style="text-align: center; font-weight: bold; margin: 5px 0;">ARIEL M. ADRIANO JR.</p>
                      <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">Comm. On Disaster Preparedness</p>

                      <p style="text-align: center; font-weight: bold; margin: 5px 0;">JANA VIEL M. ORCAS</p>
                      <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">Comm. On Youth and Sports Development</p>

                      <p style="text-align: center; font-weight: bold; margin: 5px 0;">ANNA VIANCA T. ORCAS</p>
                      <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">Secretary</p>

                      <p style="text-align: center; font-weight: bold; margin: 5px 0;">NANETTE R. CORDURA</p>
                      <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">Treasurer</p>
                  </div>
              </td>
              
              <!-- Certification Content -->
              <td colspan="2" style="vertical-align: top; padding: 0;">
                  <!-- Title -->
                  <div style="background-color: #fff; text-align: center; padding: 10px; border-bottom: 1px solid #000;">
                      <h2 style="margin: 0; color: #3b3b3b; font-size: 18px;">CERTIFICATE</h2>
                  </div>
                  
                  <!-- Content -->
                  <div style="padding: 15px 20px;">
                      <p style="text-align: justify; line-height: 1.5;">
                      This is certified that person who is name and signature appear here has request a Certification from this office
                      </p>
                      
                      <p style="text-align: justify; line-height: 1.5; margin-top: 10px;">
                          NAME: <input id="barangayCertFullName" style="width: 60%; padding-left: 0.5rem; border: none; border-bottom: 1px solid gray; background-color: #fff;"/>.
                      </p>
                      <p style="text-align: justify; line-height: 1.5;">
                          ADDRESS: <input id="barangayCertAddress" style="width: 60%; padding-left: 0.5rem; border: none; border-bottom: 1px solid gray; background-color: #fff;"/>.
                      </p>
                      <p style="text-align: justify; line-height: 1.5;">
                          DATE OF BIRTH: <input id="barangayCertBirthdate" style="width: 60%; padding-left: 0.5rem; border: none; border-bottom: 1px solid gray; background-color: #fff;"/>.
                      </p>
                      <p style="text-align: justify; line-height: 1.5;">
                          PLACE OF BIRTH: <input id="barangayCertBirthplace" style="width: 60%; padding-left: 0.5rem; border: none; border-bottom: 1px solid gray; background-color: #fff;"/>.
                      </p>
                      <p style="text-align: justify; line-height: 1.5;">
                          PURPOSES: <input id="barangayCertFullName" placeholder="Insert purpose" style="padding-left: 0.5rem; border: none; border-bottom: 1px solid gray; background-color: #fff;"/>.
                      </p>
                      <div style="width: 100%; text-align: right; margin-top: 20px;">
                        <p style="display: inline-block; width: 20%; border-top: 1px solid #3b3b3b; padding-top: 5px; text-align: center;">
                          Signature
                        </p>
                      </div>
                      <div style="width: 100%; text-align: left; margin-top: 20px;">
                        <p style="display: inline-block; width: 20%; border-top: 1px solid #3b3b3b; padding-top: 5px; text-align: center;">
                          Left Thumb
                        </p>
                        <p style="display: inline-block; width: 20%; border-top: 1px solid #3b3b3b; padding-top: 5px; text-align: center;">
                          Right Thumb
                        </p>
                      </div>
                      <p style="text-align: justify; line-height: 1.5; margin-top: 20px;">
                      This is to further certify that the above person is a resident and registered voter of our barangay, a good moral character and that he/she has no derogatory record in our office.
                      </p>
                      <p style="text-align: justify; line-height: 1.5; margin-top: 20px;">
                          Issued this <input placeholder="Month" style="padding-left: 0.5rem; border: none; border-bottom: 1px solid gray; background-color: #fff;"/> day of <input placeholder="Day" style="padding-left: 0.5rem; border: none; border-bottom: 1px solid gray; background-color: #fff;"/>, 2024.  at the office of the Punong Barangay, Barangay 42C- Pinagbuklod Cavite City.
                      </p>
                      
                      <div style="margin-top: 60px; text-align: right; padding-right: 40px;">
                          <p id="captainName" style="margin-bottom: 0; font-weight: bold;">YOLANDA DC. CHI</p>
                          <p style="margin-top: 0; font-style: italic;">Punong Barangay</p>
                      </div>
                      
                      <div style="font-size: 8px; margin-top: 40px;">
                          <p>Not valid without<br>Official seal</p>
                      </div>
                  </div>
              </td>
          </tr>
      </table>



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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="<?= base_url('assets/js/map.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
function loadBarangayOfficials() {
  $.ajax({
    url: '<?= base_url("admin/getOfficialForForms") ?>',  // If this is the same API, you can reuse it
    method: 'GET',
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        const officialsContainer = $(".barangay-officials-container"); // For the second form
        officialsContainer.empty(); // Clear any existing content

        // Loop through the officials
        response.data.forEach(function (official) {
          const fullname = [
            official.firstname,
            official.middlename,
            official.lastname,
            official.suffix || ''
          ].filter(Boolean).join(' ').toUpperCase();

          const positionLabel = official.position === 'Barangay Captain'
            ? 'Punong Barangay'
            : official.position;

          // If the official is the Barangay Captain, update the name in the existing <p class="captainFullname">
          if (official.position === 'Barangay Captain') {
            $('.captainFullname').text(fullname);  // This updates only the captain's name
          }

          // Append other officials to the container
          const officialHTML = `
            <p style="text-align: center; font-weight: bold; margin: 5px 0;">${fullname}</p>
            <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">${positionLabel}</p>
          `;
          
          officialsContainer.append(officialHTML);  // Append the rest of the officials
        });
      }
    },
    error: function () {
      alert('Failed to load officials.');
    }
  });
}


loadBarangayOfficials();

function loadOfficials() {
  $.ajax({
    url: '<?= base_url("admin/getOfficialForForms") ?>',
    method: 'GET',
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        const container = $(".barangay-officials");
        container.empty();
        
        // Add captain name to the #captainName element
        response.data.forEach(function (official) {
          const fullname = [
            official.firstname,
            official.middlename,
            official.lastname,
            official.suffix || ''
          ].filter(Boolean).join(' ').toUpperCase();

          const positionLabel = official.position === 'Barangay Captain'
            ? 'Punong Barangay'
            : official.position;

          // Check if this is the Barangay Captain
          if (official.position === 'Barangay Captain') {
            // Set the captain name dynamically
            document.getElementById('captainName').textContent = fullname;
          }

          const officialHTML = `
            <p style="text-align: center; font-weight: bold; margin: 5px 0;">${fullname}</p>
            <p style="text-align: center; font-style: italic; font-size: 12px; margin: 0 0 30px 0;">${positionLabel}</p>
          `;

          container.append(officialHTML);
        });
      }
    },
    error: function () {
      alert('Failed to load officials.');
    }
  });
}

loadOfficials();

$('.btn__form').on('click', function() {
      // Handle active state
      $('.btn__form').removeClass('active');
      $(this).addClass('active');

      // Show/hide the corresponding table
      if ($(this).attr('id') === 'btnBarangayClearance') {
        $('#certification-barangay').removeClass('d__none');
        $('#download-pdf-btn-cert').removeClass('d__none');
        $('#certification-document').addClass('d__none');
        $('#download-pdf-btn').addClass('d__none');
        $('.check__clearance').removeClass('d__none');
        $('.check__indigent').addClass('d__none');

      } else if ($(this).attr('id') === 'btnIndigency') {
        $('#certification-document').removeClass('d__none');
        $('#certification-barangay').addClass('d__none');
        $('#download-pdf-btn-cert').addClass('d__none');
        $('#download-pdf-btn').removeClass('d__none');
        $('.check__clearance').addClass('d__none');
        $('.check__indigent').removeClass('d__none');

      }
    });


const saveAction = function (action) {
    $.ajax({
        url: '/admin/save-action',
        method: 'POST',
        data: { action: action },
        success: function (response) {
            if (response.status === 'success') {
                console.log('✅ ' + response.message);
            } else {
                console.error('❌ ' + response.message);
            }
        },
        error: function () {
            console.error('❌ AJAX request failed.');
        }
    });
};

    $.ajax({
    url: '<?= base_url("admin/get-residents") ?>',
    type: 'GET',
    dataType: 'json',
    success: function (response) {
        if (response.success) {
            const select = $('#residentSelect');
            residentsData = response.data; // store data globally
            response.data.forEach(function (resident) {
                const fullName = `${resident.firstname} ${resident.middlename ?? ''} ${resident.lastname} ${resident.suffix ?? ''}`.trim();
                const street = resident.street ?? 'N/A';  // Default value if no address
                const birthplace = resident.birthplace ?? 'N/A';  // Correct reference to birthplace
                const birthdate = resident.birthdate ?? 'N/A';  // Default value if no birthdate

                // Append option with only full name visible, but hide birthplace and birthdate in data-* attributes
                select.append(`
                    <option value="${resident.resident_id}" 
                            data-address="${street}" 
                            data-birthplace="${birthplace}" 
                            data-birthdate="${birthdate}">
                        ${fullName}
                    </option>
                `);
            });
        } else {
            alert('No active residents found.');
        }
    },
    error: function (xhr, status, error) {
        console.error('AJAX Error:', error);
    }
});


$('#residentSelect').select2({
        placeholder: "Choose a resident",
        allowClear: true
    });
    // When a resident is selected
// When a resident is selected
// When a resident is selected
$('#residentSelect').on('change', function () {
    const selectedID = $(this).val();
    const selectedResident = residentsData.find(res => res.resident_id == selectedID);

    if (selectedResident) {
        const fullName = `${selectedResident.firstname} ${selectedResident.middlename ?? ''} ${selectedResident.lastname} ${selectedResident.suffix ?? ''}`.trim();
        const street = selectedResident.street ?? 'N/A';  // Default value if no address
        const birthdate = selectedResident.birthdate ?? 'N/A';  // Default value if no birthdate
        const birthplace = selectedResident.birthplace ?? 'N/A';  // Default value if no birthplace

        // Populate the corresponding input fields
        $('#residentFullname').val(fullName);
        $('#residentAddress').val(street);

        // Populate barangay cert fields
        $('#barangayCertFullName').val(fullName);
        $('#barangayCertAddress').val(street);
        $('#barangayCertBirthdate').val(birthdate);
        $('#barangayCertBirthplace').val(birthplace);
    } else {
        // Clear the fields if no resident is selected
        $('#residentFullname').val('');
        $('#residentAddress').val('');
        $('#barangayCertFullName').val('');
        $('#barangayCertAddress').val('');
        $('#barangayCertBirthdate').val('');
        $('#barangayCertBirthplace').val('');
    }
});



      /**
       * Function to generate and download a PDF from a DOM element
       * @param {string} elementId - ID of the element to convert to PDF
       * @param {string} filename - Name of the PDF file to download
       */
// Function to generate and download PDF
function generatePDF(elementId, filename) {
  saveAction("Generated a new PDF");

    // Get the HTML element
    const element = document.getElementById(elementId);
    
    // Define PDF generation options
    const opt = {
      margin: [10, 10, 10, 10],
      // [top, right, bottom, left] - reduced margins
        filename: filename,
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { 
            scale: 1.2, // Reduced scale to prevent right cutoff
            useCORS: true,
            letterRendering: true
        },
        jsPDF: { 
            unit: 'mm', 
            format: 'a4', 
            orientation: 'portrait',
            compress: true
        }
    };
    
    // Generate and download PDF
    html2pdf()
        .from(element)
        .set(opt)
        .save();
}

      // Example usage
      document.getElementById('download-pdf-btn').addEventListener('click', function () {
          if ($(window).scrollTop() > 0) {
              $(window).scrollTop(0); 
              alert('Please scroll to the top before downloading the PDF.');
              return;
          }
          saveAction("Generated a Certification of Indigency");

          generatePDF('certification-document', 'Certification_of_Indigency.pdf');
      });

      document.getElementById('download-pdf-btn-cert').addEventListener('click', function () {
          if ($(window).scrollTop() > 0) {
              $(window).scrollTop(0); 
              alert('Please scroll to the top before downloading the PDF.');
              return;
          }
           saveAction("Generated a Barangay Certificate");

          generatePDF('certification-barangay', 'Certification_of_Barangay.pdf');
      });


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
