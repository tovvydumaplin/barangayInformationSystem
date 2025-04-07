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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />

    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

    <!-- JSZip (required for Excel export) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <!-- xlsx (required for Excel export) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>


        <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>
    
  <style>
    .modal {
      min-width: 150rem;
    }
    .submit__box {
    display: flex;
    gap: 2rem;
    padding: 2rem 0;
}
    .icon__close {
      cursor: pointer;
    }
    /* New Resident Table */
    div.dt-container {
    width: 100%;
    }
    .btn__box {
      text-align: right;
      display: flex;
      justify-content: end;
    }
    .btn__primary {
      padding: 1.5rem 3rem;
    }
    .top__container {
      display: flex;
      flex-direction: column;
      gap: 2rem;
      padding: 2rem;
      background-color: #f9f9f9;
      border-radius: 1rem;
      }
      
      #saveMember {
        background-color: #1D63DC;
      }
      .grid__modified__row__1 {
        display: grid;
        grid-template-columns: 0.8fr 0.8fr 0.6fr 0.5fr 1.3fr;
      }
      .grid__modified__row__2 {
        display: grid;
        grid-template-columns: 0.5fr 1fr 0.5fr;
      }
      .grid__modified__row__5 {
        display: grid;
        grid-template-columns: 0.5fr 0.5fr 1.5fr;
        gap: 2rem;
      }
      .grid__modified__row__6 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 2rem;
      }
      /* Map Styles */
      #map {
        min-height: 57rem;
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
        }
        .information__input {
          /* padding: 2rem; */
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
      .card__mapping.hidden {
        display: none;
      }
      .card__table.hidden {
        display: none;
      }

      .top__container {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        height: 85%;
        overflow-y: scroll;
        padding-right: 1rem;
      }
      .modal__body {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        height: 85%;
        overflow-y: scroll;
        padding-right: 1rem;
    }
    /* #addResidentModal {
      overflow-y: scroll;
    } */
     .house__info {
      background-color: #fff;
      padding: 2rem;
      border-radius: 1rem;
      border: 1px solid #ececec;
     }
  </style>
  </head>
  <body>
  <?= view('includes/mapFamilyModal') ?>

    <!-- Custom Loader -->
  <div class="custom__loader hide">
    <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
      <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
      <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
      <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
      <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
    </svg>
  </div>
  <!-- Success Indicator -->
  <div class="success__indicator hide">
    <div class="indicator__container">
      <div class="icon__link">
        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-check-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
          <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
        </svg>
      </div>
      <p class="indicator__text">New Account Created!</p>
    </div>
  </div>
    <!-- Validation -->
  <div class="validator hide">
    <div class="validator__head">
        <p class="validator__header">Confirmation</p>
        <ion-icon class="validator__icon" name="close-outline"></ion-icon>
    </div>
    <div class="validator__body">
        <p class="validator__text__desc">Are you sure you want to proceed?</p></div>
    <div class="validator__footer">
        <button type="button" class="validator__btn validator__cancel">Cancel</button>
        <button class="validator__btn validator__proceed">Proceed</button>
    </div>
  </div>
    <!-- Validation ENDS -->
    <!-- Validation FOR Archiving -->
  <!-- <div class="validator hide">
    <div class="validator__head">
        <p class="validator__header">Confirmation</p>
        <ion-icon class="validator__icon" name="close-outline"></ion-icon>
    </div>
    <div class="validator__body">
        <p class="validator__text__desc">Are you sure you want to proceed?</p></div>
    <div class="validator__footer">
        <button type="button" class="validator__btn validator__cancel">Cancel</button>
        <button type="button" class="validator__btn validator__proceed__archive">Proceed</button>
    </div>
  </div> -->
    <!-- Validation ENDS Archiving -->
    <!-- Validation FOR Reactivation -->
    <!-- <div class="validator hide">
      <div class="validator__head">
          <p class="validator__header">Confirmation</p>
          <ion-icon class="validator__icon" name="close-outline"></ion-icon>
      </div>
      <div class="validator__body">
          <p class="validator__text__desc">Are you sure you want to proceed?</p></div>
      <div class="validator__footer">
          <button type="button" class="validator__btn validator__cancel">Cancel</button>
          <button type="button" class="validator__btn validator__proceed__reactivate">Proceed</button>
      </div>
    </div> -->
    <!-- Validation ENDS Reactivation -->

     <!-- Error handler -->
    <div class="error__display hide">
      <p class="error__text"></p>
      <ion-icon class="validator__icon error__close" name="close-outline"></ion-icon>
    </div>
     <!-- Error Display ENDS -->
    <?= view('includes/sidebar') ?>
    <main>
    <?= view('includes/header.php') ?>
      <div class="wrapper"></div>
      <!-- CREATE NEW RESIDENT MODAL -->
      <div id="addResidentModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Add Resident Information</p>
          <div class="icon__link icon__close">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
          </div>
          <!-- <button class="btn__secondary active">Edit Info</button> -->
        </div>
        <form method="POST" class="modal__body community__modal">
          <div class="top__container">
          <p class="modal__subheading">Resident General Information</p>
            <div class="row grid__modified__row__1">
              <!-- Firstname -->
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter firstname"
                  name="firstname"
                />
                <span class="input__title"
                  >Firstname<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <!-- Lastname -->
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter lastname"
                  name="lastname"
                />
                <span class="input__title"
                  >Lastname<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <!-- Middlename -->
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter middlename"
                  name="middlename"
                  
                />
                <span class="input__title"
                  >Middlename<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <!-- Suffix -->
              <div class="input__box pos__rel">
                <div class="select__chev__down">
                  <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"></path></svg>
                </div>
                <select                 
                  class="information__input"
                  value=""
                  placeholder="Enter suffix"
                  name="suffix">
                  <option value="" selected>None</option>
                  <option value="Jr.">Jr.</option>
                  <option value="Sr.">Sr.</option>
                  <option value="II">II</option>
                  <option value="III">III</option>
                  <option value="IV">IV</option>
                  <option value="V">V</option>
                  <option value="">Others</option>
                </select>
                <span class="input__title"
                  >suffix</span
                >
              </div>
              <!-- Contact No. -->
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter contact-no"
                  name="contact_no"
                  
                />
                <span class="input__title"
                  >Contact No.<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row grid__modified__row__2">
              <div class="input__box">
                <input
                  type="date"
                  class="information__input"
                  value=""
                  placeholder="Enter Birthdate"
                  name="birthdate"
                  
                />
                <span class="input__title"
                  >Birthdate<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <!-- <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter Age"
                  name="age"
                  
                />
                <span class="input__title"
                  >Age<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div> -->
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter Birthplace"
                  name="birthplace"
                  
                />
                <span class="input__title"
                  >Birthplace<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <div class="input__box">
              <select class="information__input" name="citizenship" id="nationalityDropdown">
              </select>
                <span class="input__title"
                  >Citizenship<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box pos__rel">
                <div class="select__chev__down">
                  <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"></path></svg>
                </div>
                <select
                  class="information__input"
                  value=""
                  placeholder="Enter Gender"
                  name="gender"
                  >
                  <option disabled selected>Select one</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <span class="input__title"
                  >Gender<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <div class="input__box pos__rel">
                <div class="select__chev__down">
                  <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"></path></svg>
                </div>
                <select
                  class="information__input"
                  value=""
                  placeholder="Enter Civil Status"
                  name="civil_status"
                  >
                  <option disabled selected>Select one</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Separated">Separated</option>
                  <option value="Widowed">Widowed</option>
                </select>
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
                  
                />
                <span class="input__title"
                  >Religion<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row margin__bottom__2">
              <!-- Disabled Radio -->
              <div class="radio__box">
                <p class="radio__heading">
                  Person with Disablity<span class="red__dot">*</span>
                </p>
                <div class="radio__buttons">
                  <div class="radio__btn__container">
                    <input type="radio" class="radio__btn" name="is_pwd" value="1" />
                    <span class="yes">Yes</span>
                  </div>
                  <div class="radio__btn__container">
                    <input type="radio" class="radio__btn" name="is_pwd" value="0" />
                    <span class="no">No</span>
                  </div>
                </div>
              </div>
              <!-- Voters Radio -->
              <div class="radio__box">
                <p class="radio__heading">
                  Voters of Barangay<span class="red__dot">*</span>
                </p>
                <div class="radio__buttons">
                  <div class="radio__btn__container">
                    <input type="radio" class="radio__btn" name="is_voter_of_barangay" value="1" />
                    <span class="yes">Yes</span>
                  </div>
                  <div class="radio__btn__container">
                    <input type="radio" class="radio__btn" name="is_voter_of_barangay" value="0" />
                    <span class="no">No</span>
                  </div>
                </div>
              </div>
              <!-- Head Radio -->
              <div class="radio__box">
                <p class="radio__heading">
                  Head of the Family<span class="red__dot">*</span>
                </p>

                <div class="radio__buttons">
                  <div class="radio__btn__container">
                    <input type="radio" name="is_family_head" class="radio__btn" value="1" />
                    <span class="yes">Yes</span>
                  </div>
                  <div class="radio__btn__container">
                    <input type="radio" name="is_family_head" class="radio__btn" value="0" />
                    <span class="no">No</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Household info | Show only when head of family is no/0 -->
            <div class="row flex__d__col">
              <p class="modal__subheading">Household Information</p>
              <div class="grid__modified__row__5">
                <div class="input__box">
                  <select
                    id="houseNumberList"
                    class="information__input"
                    value=""
                    placeholder="Enter House No."
                    name="house_no"
                  >
                    <option disabled selected>Select one</option>
                   </select>
                   <span class="input__title"
                    >House No.<span class="red__dot">*</span></span>
                  <p class="text-danger"></p>
                </div>
                <div class="input__box">
                  <input
                    class="information__input"
                    value=""
                    placeholder="Enter Household Ownership"
                    name="household_name"  
                  />
                  <span class="input__title">Household Ownership<span class="red__dot">*</span></span>
                  <p class="text-danger"></p>
                </div>
                <div class="input__box">
                  <input
                    class="information__input"
                    value=""
                    placeholder="Enter Street"
                    name="street"
                    id="streetInput"
                    
                  />
                  <span class="input__title"
                    >Street<span class="red__dot">*</span></span
                  >
                  <p class="text-danger"></p>
                </div>
              </div>
            </div>
            <!-- Household Info End -->

            <!-- Emergency Contact -->
            <div class="row flex__d__col ">
              <p class="modal__subheading">Emergency Contact Information</p>
              <div class="grid__modified__row__6">
                <div class="input__box">
                  <input
                    class="information__input"
                    value=""
                    placeholder="Enter fullname"
                    name="contact_name"  
                  />
                  <span class="input__title">Fullname<span class="red__dot">*</span></span>
                  <p class="text-danger"></p>
                </div>
                <div class="input__box">
                  <input
                    class="information__input"
                    value=""
                    placeholder="Enter Contact No."
                    name="emergency_contact_no"
                    
                  />
                  <span class="input__title"
                    >Contact No.<span class="red__dot">*</span></span
                  >
                  <p class="text-danger"></p>
                </div>
                <div class="input__box">
                  <input
                    class="information__input"
                    value=""
                    placeholder="Enter relationship"
                    name="contact_relationship"
                    
                  />
                  <span class="input__title"
                    >Relationship<span class="red__dot">*</span></span
                  >
                  <p class="text-danger"></p>
                </div>
              </div>
              <!-- STATUS -->
                <input
                  type="hidden"
                  class="information__input"
                  value="1"
                  name="status"
                />
            </div>
              <!-- Household members table end -->
              <div class="btn__box">
                  <button id="saveMember" class="btn btn__primary"><i class="bi bi-person-fill-add"></i>Save Member</button>
              </div>
              <div class="row flex__d__col d__none house__info">
              <p class="modal__subheading">Household Members to be added</p>
              <div class="row">
                <table id="newResidentsTable" class="display">
                  <thead class="thead">
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Gender</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="btn__box__modal submit__box">
            <span class="btn__secondary active btn__close">Close</span>
            <button type="button" class="button__submit btn__primary create__residents__btn">Submit</submit>
          </div>
        </form>
      </div>
      <!-- End of create modal -->
      <!-- View/Update RESIDENT MODAL -->
      <div id="viewResidentModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">View Resident Information</p>
          <!-- <button class="btn__secondary active">Edit Info</button> -->
          <div class="icon__link icon__close">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
          </div>
        </div>
        <form method="POST" class="modal__body modal__viewing community__modal">
          <input type="hidden" id="residentStatus"/>
          <input type="hidden" id="residentId"/>
          <div class="row">
            <!-- 1 -->
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter fullname"
                name="view_firstname"
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
                name="view_lastname"
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
                name="view_middlename"
                readonly
                
              />
              <span class="input__title"
                >Middlename<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box pos__rel">
              <div class="select__chev__down">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"></path></svg>
              </div>
              <select                 
                class="information__input"
                value=""
                placeholder="Enter suffix"
                name="view_suffix"
                disabled>
                <option disabled selected>Select one</option>
                <option value="">None</option>
                <option value="Jr.">Jr.</option>
                <option value="Sr.">Sr.</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="">Others</option>
              </select>
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
                name="view_contact_no"
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
                name="view_birthdate"
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
                name="view_age"
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
                name="view_birthplace"
                readonly
                
              />
              <span class="input__title"
                >Birthplace<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box">
              <select class="information__input" name="view_citizenship" id="viewNationalityDropdown" disabled>

              </select>
              <!-- <input
                class="information__input"
                value=""
                placeholder="Enter Citizenship"
                name="view_citizenship"
                readonly
                
              /> -->
              <span class="input__title"
                >Citizenship</span
              >
              <p class="text-danger"></p>
            </div>
          </div>
          <div class="row">
            <div class="input__box pos__rel">
              <div class="select__chev__down">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"></path></svg>
              </div>
              <select
                class="information__input"
                value=""
                placeholder="Enter Gender"
                name="view_gender"
                disabled
                >
                <option disabled selected>Select one</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <span class="input__title"
                >Gender<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
            <div class="input__box pos__rel">
              <div class="select__chev__down">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"></path></svg>
              </div>
              <select
                class="information__input"
                value=""
                placeholder="Enter Civil Status"
                name="view_civil_status"
                disabled
                >
                <option disabled selected>Select one</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Separated">Separated</option>
                <option value="Widowed">Widowed</option>
              </select>
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
                name="view_occupation"
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
                name="view_religion"
                readonly
                
              />
              <span class="input__title"
                >Religion<span class="red__dot">*</span></span
              >
              <p class="text-danger"></p>
            </div>
          </div>
          <div class="row margin__bottom__2">
            <!-- Disabled Radio -->
            <div class="radio__box">
              <p class="radio__heading">
                Person with Disablity<span class="red__dot">*</span>
              </p>
              <div class="radio__buttons">
                <div class="radio__btn__container">
                  <input type="radio" class="radio__btn" name="view_is_pwd" value="1" />
                  <span class="yes">Yes</span>
                </div>
                <div class="radio__btn__container">
                  <input type="radio" class="radio__btn" name="view_is_pwd" value="0" />
                  <span class="no">No</span>
                </div>
              </div>
            </div>
            <!-- Voters Radio -->
            <div class="radio__box">
              <p class="radio__heading">
                Voters of Barangay<span class="red__dot">*</span>
              </p>
              <div class="radio__buttons">
                <div class="radio__btn__container">
                  <input type="radio" class="radio__btn" name="view_is_voter_of_barangay" value="1" />
                  <span class="yes">Yes</span>
                </div>
                <div class="radio__btn__container">
                  <input type="radio" class="radio__btn" name="view_is_voter_of_barangay" value="0" />
                  <span class="no">No</span>
                </div>
              </div>
            </div>
            <!-- Head Radio -->
            <div class="radio__box">
              <p class="radio__heading">
                Head of the Family<span class="red__dot">*</span>
              </p>

              <div class="radio__buttons">
                <div class="radio__btn__container">
                  <input type="radio" name="view_is_family_head" class="radio__btn" value="1" />
                  <span class="yes">Yes</span>
                </div>
                <div class="radio__btn__container">
                  <input type="radio" name="view_is_family_head" class="radio__btn" value="0" />
                  <span class="no">No</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Household info | Show only when head of family is no/0 -->

          <div class="row flex__d__col house__info">
            <p class="modal__subheading">Household Information</p>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter Household Ownership"
                  name="view_household_name"  
                  readonly
                />
                <span class="input__title">Household Ownership<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
              </div>
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter House No."
                  name="view_house_no"
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
                  name="view_street"
                  readonly
                  
                />
                <span class="input__title"
                  >Street<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
          </div>
          <!-- Household Info End -->

          <!-- Emergency Contact -->
          <div class="row flex__d__col ">
            <p class="modal__subheading">Emergency Contact Information</p>
            <div class="row">
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter fullname"
                  name="view_contact_name"  
                  readonly
                />
                <span class="input__title">Fullname<span class="red__dot">*</span></span>
                <p class="text-danger"></p>
              </div>
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter Contact No."
                  name="view_emergency_contact_no"
                  readonly
                  
                />
                <span class="input__title"
                  >Contact No.<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter relationship"
                  name="view_contact_relationship"
                  readonly
                  
                />
                <span class="input__title"
                  >Relationship<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <!-- STATUS -->
              <input
                type="hidden"
                class="information__input"
                value="1"
                name="view_status"
              />
          </div>
        <!-- Emergency Contact END -->
        </form>
        <div class="btn__box__modal submit__box">
          <button type="button" id="editViewResident" class="btn__edit__resident">
          <i class="bi bi-pencil-square"></i>Edit
          </button>
          <button type="button" id="archiveButton" class="button__submit btn__primary"><i class="bi bi-archive"></i>Archive</button>
          <button type="button" id="reactivateButton" class="button__submit btn__primary"><i class="bi bi-arrow-repeat"></i>Reactivate</button>
        </div>
      </div>
      <!-- End of view/update modal -->
      <div class="container">
        <div class="heading__box">
          <div class="tab__container">
            <div class="btn__container tab__1 visible">
              <button class="tab__btn">House Mapping</button>
              <div class="active__tab"></div>
            </div>
            <div class="btn__container tab__2">
              <button class="tab__btn">Resident Records</button>
              <div class="active__tab"></div>
            </div>
            <!-- <div class="btn__container tab__3">
              <button class="tab__btn">Household Resident</button>
              <div class="active__tab"></div>
            </div> -->
            <div class="btn__container tab__4 map__tab">
              <button class="tab__btn">Archived Records</button>
              <div class="active__tab"></div>
            </div>
          </div>
        </div>
        <!-- THIS CONTAINS THE DATATABLES -->
        <div class="card card__table hidden">
          <div class="heading__container">
            <p class="subheading">List of Residents</p>
            <div class="button__box">
              <div class="filter__container">            
                <button class="btn__secondary filter__btn">
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
              <div class="filter__items hide">
                <p class="filter__subheading">Add Filter</p>
                <div class="filter__items__box">
                  <div class="filter__item" data-filter="Single">
                      <i class="bi bi__custom bi-person"></i><span class="filter__title">Single</span>
                    </div>
                    <div class="filter__item" data-filter="Married">
                      <i class="bi bi__custom bi-heart"></i><span class="filter__title">Married</span>
                    </div>
                    <div class="filter__item" data-filter="Divorced">
                      <i class="bi bi__custom bi-house-door"></i><span class="filter__title">Divorced</span>
                    </div>
                    <div class="filter__item" data-filter="Male">
                      <i class="bi bi__custom bi-gender-male"></i><span class="filter__title">Male</span>
                    </div>
                    <div class="filter__item" data-filter="Female">
                      <i class="bi bi__custom bi-gender-female"></i><span class="filter__title">Female</span>
                    </div>
                    <div class="filter__item" data-filter="All">
                      <i class="bi bi__custom bi-gender-female"></i><span class="filter__title">All</span>
                    </div>
                  </div>
                </div>
              </div>
              <button class="btn__secondary export__excel__btn">
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
            <table id="residentsTable" class="display">
              <thead class="thead">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <!-- <th>Birthdate</th> -->
                  <th>Age</th>
                  <th>Civil Status</th>
                  <th>Gender</th>
                  <th>House No.</th>
                  <!-- <th>Voter</th>
                  <th>Family Head</th>
                  <th>Contact No.</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
        <!-- THIS CONTAINS THE MAP -->
        <div class="card card__mapping">
          <div class="heading__container">
            <p class="subheading">Barangay House Mapping</p>
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
          </div> 
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


    <script src="<?= base_url('assets/js/general.js') ?>"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
$(document).ready(function () {
// ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Global Declaration ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
// -- For datatables of Add Resident Modal (TABLE)
let table = $("#newResidentsTable").DataTable(); // Initialize DataTables
let members = JSON.parse(localStorage.getItem("members")) || [];
// ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Functions ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
// Get House Number
const loadHouseNumbers = function (callback) {
    $.ajax({
        url: "/admin/get-house-numbers",
        type: "GET",
        dataType: "json",
        cache: false,
        success: function (response) {
            if (response.success && Array.isArray(response.data)) {
                let $houseNumberList = $("#houseNumberList");
                $houseNumberList.empty();
                $houseNumberList.append('<option disabled selected>Select one</option>');

                response.data.forEach(house => {
                    $houseNumberList.append(`<option value="${house.house_no}">${house.house_no}</option>`);
                });

                if (callback) callback(); 
            } else {
                console.error("No house numbers found.");
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
        }
    });
};
// Get house street using the house number
const getHouseStreet = function () {
    let houseNumber = $('#houseNumberList').val(); 

    if (!houseNumber) {
      alert("Please select a house number.");
      return;
    }

    $.ajax({
      url: "get-house-street",
      type: "GET",
      data: { 
        house_number: houseNumber 
      }, 
      dataType: "json",
      cache: false,
      success: function (response) {
        if (response.success && response.data) {
          $('#streetInput').val(response.data.house_street);
        } else {
          $('#streetInput').val(""); 
          alert("Street not found for this house number.");
        }
      },
      error: function () {
        alert("Failed to fetch house street.");
      }
  });
};
const displayTable = function() {
    table.clear().draw(); 
    if (members.length > 0) {
        $(".house__info").removeClass("d__none"); 
    } else {
        $(".house__info").addClass("d__none"); 
    }

    members.forEach((member, index) => {
        table.row.add([
            member.house_no,
            `${member.firstname} ${member.middlename} ${member.lastname} ${member.suffix || ''}`,
            member.is_family_head == 1 ? "Head" :"Member", //  IF 1, display Head if 0, Display member
            member.gender,
            `<button type="button" class="btn__delete" data-index="${index}"><ion-icon name="trash-outline"></ion-icon>Delete</button>`
        ]).draw(false); 
    });
}
const saveMemberLocally = function (e) {
    e.preventDefault();

    let requiredFields = [
        "firstname", "lastname", "middlename",
        "contact_no", "birthdate", "birthplace", "citizenship",
        "gender", "civil_status", "occupation", "religion",
        "household_name", "house_no", "street",
        "contact_name", "emergency_contact_no", "contact_relationship"
    ];

    function formatFieldName(field) {
        return field.replace(/_/g, " ").replace(/\b\w/g, char => char.toUpperCase());
    }

    // Check required text inputs and select elements
    for (let field of requiredFields) {
        let value = $(`input[name='${field}'], select[name='${field}']`).val();
        if (!value) {
            openErrorDisplay(`Please fill out the <b>${formatFieldName(field)}</b> field.`);
            return;
        }
    }

    // Check required radio buttons
    let radioFields = ["is_pwd", "is_voter_of_barangay", "is_family_head"];
    for (let field of radioFields) {
        if (!$(`input[name='${field}']:checked`).val()) {
            openErrorDisplay(`Please select an option for <b>${formatFieldName(field)}</b>.`);
            return;
        }
    }

    let formData = {
        firstname: $("input[name='firstname']").val(),
        lastname: $("input[name='lastname']").val(),
        middlename: $("input[name='middlename']").val(),
        suffix: $("select[name='suffix']").val(),
        contact_no: $("input[name='contact_no']").val(),
        birthdate: $("input[name='birthdate']").val(),
        birthplace: $("input[name='birthplace']").val(),
        citizenship: $("select[name='citizenship']").val(),
        gender: $("select[name='gender']").val(),
        civil_status: $("select[name='civil_status']").val(),
        occupation: $("input[name='occupation']").val(),
        religion: $("input[name='religion']").val(),
        is_pwd: $("input[name='is_pwd']:checked").val(),
        is_voter_of_barangay: $("input[name='is_voter_of_barangay']:checked").val(),
        is_family_head: $("input[name='is_family_head']:checked").val(),
        household_name: $("input[name='household_name']").val(),
        house_no: $("select[name='house_no']").val(),
        street: $("input[name='street']").val(),
        contact_name: $("input[name='contact_name']").val(),
        emergency_contact_no: $("input[name='emergency_contact_no']").val(),
        contact_relationship: $("input[name='contact_relationship']").val(),
        status: $("input[name='status']").val()
    };

    console.log("Checking House No:", formData.house_no);
console.log("Existing Members:", members);

if (formData.is_family_head == "1") {
    let existingHead = members.some(member => 
        String(member.house_no) === String(formData.house_no) && member.is_family_head == "1"
    );

    if (existingHead) {
        openErrorDisplay(`A family head already exists for House No. <b>${formData.house_no}</b>.`);
        return;
    }
}

    // Add member and save to localStorage
    members.push(formData);
    localStorage.setItem("members", JSON.stringify(members));

    closeErrorDisplay();
    $(".success__indicator").removeClass("hide").find(".indicator__text").html("Member added!");
    setTimeout(() => $(".success__indicator").addClass("hide"), 3000);

    displayTable();
    $("form")[0].reset();
};
const calculateAge = function(birthdate) {
    if (!birthdate) return 'N/A';

    const birthDateObj = new Date(birthdate);
    if (isNaN(birthDateObj.getTime())) return 'N/A'; // Invalid date handling

    const today = new Date();
    let age = today.getFullYear() - birthDateObj.getFullYear();
    const monthDiff = today.getMonth() - birthDateObj.getMonth();
    
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDateObj.getDate())) {
        age--;
    }

    return age;
}
const loadResidents = function() {
    customLoaderOn();
    const $residentsTable = $("#residentsTable");

    if ($.fn.DataTable.isDataTable($residentsTable)) {
        $residentsTable.DataTable().clear().destroy();
    }

    // Show loading message
    $residentsTable.find("tbody").html('<tr><td colspan="7" class="text-center">Loading...</td></tr>');

    $.ajax({
        url: "/admin/get-residents",
        type: "GET",
        dataType: "json",
        cache: false,  // Ensure fresh data
        success: function(response) {
            if (response.success && Array.isArray(response.data) && response.data.length) {
                const residents = response.data;
                const tableData = residents.map(resident => [
                    resident.resident_id,
                    `${resident.firstname} ${resident.middlename ? resident.middlename.charAt(0) + '.' : ''} ${resident.lastname} ${resident.suffix || ''}`,
                    resident.birthdate ? calculateAge(resident.birthdate) : 'N/A',
                    resident.civil_status || 'N/A',
                    resident.gender || 'N/A',
                    resident.house_no || 'N/A',
                    `<button class="btn__primary view__resident__btn action-btn" data-id="${resident.resident_id}">View</button>`
                ]);

                // Reinitialize DataTable with export button
                const table = $residentsTable.DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: false,
                    data: tableData,
                    columns: [
                        { title: "ID" },
                        { title: "Name" },
                        { title: "Age" },
                        { title: "Civil Status" },
                        { title: "Gender" },
                        { title: "House No." },
                        { title: "Action", orderable: false }
                    ],
                    columnDefs: [
                        { width: "80px", targets: -1 }
                    ],
                    order: [[0, "desc"]],
                    language: {
                        emptyTable: "No residents found"
                    },
                    pagingType: "simple_numbers",
                    autoWidth: false,
                    responsive: true,
                    // Add the export button to DataTable
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            text: 'Export to Excel',
                            className: 'btn__secondary',
                            title: 'Residents Data',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5] // You can specify which columns to export
                            }
                        }
                    ]
                });

                // Trigger the export when your custom button is clicked
                $(".export__excel__btn").on("click", function() {
                    table.button(0).trigger(); // Trigger the first button (Excel export)
                });

            } else {
                // Initialize DataTable with empty data
                $residentsTable.DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: false,
                    data: [],
                    columns: [
                        { title: "ID" },
                        { title: "Name" },
                        { title: "Age" },
                        { title: "Civil Status" },
                        { title: "Gender" },
                        { title: "House No." },
                        { title: "Action", orderable: false }
                    ],
                    language: {
                        emptyTable: "No residents found"
                    },
                    pagingType: "simple_numbers"
                });
            }
            customLoaderOff();
        },
        error: function(xhr, status, error) {
            $residentsTable.find("tbody").html('<tr><td colspan="7" class="text-center">Error loading data</td></tr>');
            console.error("AJAX Error:", error);
        }
    });
};





const loadArchivedResidents = function() {
  customLoaderOn();
    const $residentsTable = $("#residentsTable");
    const $tableBody = $residentsTable.find("tbody");

    if ($.fn.DataTable.isDataTable($residentsTable)) {
        $residentsTable.DataTable().destroy();
    }

    // Loading
    $tableBody.html('<tr><td colspan="10" class="text-center">Loading...</td></tr>');

    $.ajax({
        url: "/admin/get-archived-residents",
        type: "GET",
        dataType: "json",
        cache: true,
        success: function(response) {
            if (response.success && Array.isArray(response.data) && response.data.length) {
                const residents = response.data;
                const tableData = residents.map(resident => [
                    resident.resident_id,
                    `${resident.firstname} ${resident.middlename ? resident.middlename.charAt(0) + '.' : ''} ${resident.lastname} ${resident.suffix || ''}`,
                    resident.birthdate ? calculateAge(resident.birthdate) : 'N/A',
                    resident.civil_status || 'N/A',
                    resident.gender || 'N/A',
                    resident.house_no || 'N/A',
                    `<button class="btn__primary view__resident__btn action-btn" data-id="${resident.resident_id}">View</button>`
                ]);

                // Initialize DataTable
                $residentsTable.DataTable({
                    "processing": true,
                    "serverSide": false,
                    "data": tableData,
                    "columns": [
                        { "title": "ID" },
                        { "title": "Name" },
                        { "title": "Age" },
                        { "title": "Civil Status" },
                        { "title": "Gender" },
                        { "title": "House No." },

                        { "title": "Action", "orderable": false }
                    ],
                    "columnDefs": [
                          { "width": "80px", "targets": -1 } // Set the width for the last column (Action)
                      ],
                    "order": [[0, "desc"]],
                    "language": {
                        "emptyTable": "No residents found"
                    },
                    "pagingType": "simple_numbers",
                    "autoWidth": false, 
                    "responsive": true  
                });

            } else {
                // Initialize DataTable with empty data to prevent error
                $residentsTable.DataTable({
                    "processing": true,
                    "serverSide": false,
                    "data": [],
                    "columns": [
                        { "title": "ID" },
                        { "title": "Name" },
                        { "title": "Age" },
                        { "title": "Civil Status" },
                        { "title": "Gender" },
                        { "title": "House No." },
                        { "title": "Action", "orderable": false }
                    ],
                    "language": {
                        "emptyTable": "No residents found"
                    },
                    "pagingType": "simple_numbers"
                });
            }
            customLoaderOff();
        },
        error: function(xhr, status, error) {
            $tableBody.html('<tr><td colspan="10" class="text-center">Error loading data</td></tr>');
            console.error("AJAX Error:", error);
        }
    });
};
// not yet
const loadHouseholdRecords = function() {
  customLoaderOn();
    const $residentsTable = $("#residentsTable");
    const $tableBody = $residentsTable.find("tbody");

    if ($.fn.DataTable.isDataTable($residentsTable)) {
        $residentsTable.DataTable().destroy();
    }

    // Loading
    $tableBody.html('<tr><td colspan="10" class="text-center">Loading...</td></tr>');

    $.ajax({
        url: "/admin/get-archived-residents",
        type: "GET",
        dataType: "json",
        cache: true,
        success: function(response) {
            if (response.success && Array.isArray(response.data) && response.data.length) {
                const residents = response.data;
                const tableData = residents.map(resident => [
                    resident.resident_id,
                    `${resident.firstname} ${resident.middlename ? resident.middlename.charAt(0) + '.' : ''} ${resident.lastname} ${resident.suffix || ''}`,
                    resident.birthdate ? calculateAge(resident.birthdate) : 'N/A',
                    resident.civil_status || 'N/A',
                    resident.gender || 'N/A',

                    `<button class="btn__primary view__resident__btn action-btn" data-id="${resident.resident_id}">View</button>`
                ]);

                // Initialize DataTable
                $residentsTable.DataTable({
                    "processing": true,
                    "serverSide": false,
                    "data": tableData,
                    "columns": [
                        { "title": "ID" },
                        { "title": "Name" },
                        { "title": "Age" },
                        { "title": "Civil Status" },
                        { "title": "Gender" },

                        { "title": "Action", "orderable": false }
                    ],
                    "columnDefs": [
                          { "width": "80px", "targets": -1 } // Set the width for the last column (Action)
                      ],
                    "order": [[0, "desc"]],
                    "language": {
                        "emptyTable": "No residents found"
                    },
                    "pagingType": "simple_numbers",
                    "autoWidth": false, 
                    "responsive": true  
                });

            } else {
                // Initialize DataTable with empty data to prevent error
                $residentsTable.DataTable({
                    "processing": true,
                    "serverSide": false,
                    "data": [],
                    "columns": [
                        { "title": "ID" },
                        { "title": "Name" },
                        { "title": "Age" },
                        { "title": "Civil Status" },
                        { "title": "Gender" },
                        { "title": "Action", "orderable": false }
                    ],
                    "language": {
                        "emptyTable": "No residents found"
                    },
                    "pagingType": "simple_numbers"
                });
            }
            customLoaderOff();
        },
        error: function(xhr, status, error) {
            $tableBody.html('<tr><td colspan="10" class="text-center">Error loading data</td></tr>');
            console.error("AJAX Error:", error);
        }
    });
};
const saveResidents = function() {
    let storedMembers = localStorage.getItem("members");
    let membersData = storedMembers ? JSON.parse(storedMembers) : [];
    if (membersData.length === 0) {
        openErrorDisplay('There are no residents in list.');
        closeValidator();
        return;
    }

    $.ajax({
        url: "<?= site_url('/admin/create-resident') ?>",
        type: "POST",
        data: { members: membersData }, // Send all members at once
        dataType: "json",
        beforeSend: function () {
            $(".button__submit").prop("disabled", true).text("Submitting...");
            $("#addResidentModal :input").prop("disabled", true); // To disabled all inputs when confirmation is up
        },
        success: function (response) {
            if (response.status === "success") { 
                $(".success__indicator").removeClass("hide");
                $(".indicator__text").html('Residents Created!');

                setTimeout(function() {
                    $(".success__indicator").addClass("hide");
                }, 3000);

                // Clear localStorage after successful submission
                localStorage.removeItem("members");
                members = []; // Clear the array in memory
                displayTable(); // Refresh the table

                loadResidents(); // Reload the resident list
                closeModal();
                loadHouseMarkers();
            } else {
                $(".text-danger").text(""); 
                $.each(response.errors, function(key, value) {
                    $("input[name='" + key + "']").siblings(".text-danger").text(value);
                });
            }
        },
        error: function() {
            alert("Something went wrong. Please try again.");
        },
        complete: function() {
            $(".button__submit").prop("disabled", false).text("Submit");
            $("#addResidentModal :input").prop("disabled", false);
            closeValidator();

        }
    });
};
const archiveResident = function (archiveResidentId) {
  $.ajax({
        url: "<?= base_url('admin/archive-resident') ?>", 
        type: "POST",
        data: { residentIdData: archiveResidentId }, 
        dataType: "json",
        success: function (response) {
            if (response.success) {
              closeModal();
              loadResidents();
              $(".success__indicator").removeClass("hide").find(".indicator__text").html("Resident archived!");
              setTimeout(() => $(".success__indicator").addClass("hide"), 3000);
            } else {
              openErrorDisplay(`Failed to load resident details.`);
            }
        },
        error: function () {
            openErrorDisplay(`An error occurred while fetching resident details.`);

        }
    });
}
const reactivateResident = function(resId) {
  $.ajax({
      url: "<?= base_url('admin/reactivate-resident') ?>", 
      type: "POST",
      data: { resIdData: resId }, 
      dataType: "json",
      success: function (response) {
          if (response.success) {
              closeModal();
              loadArchivedResidents();
              $(".success__indicator").removeClass("hide").find(".indicator__text").html("Resident reactivated!");
              setTimeout(() => $(".success__indicator").addClass("hide"), 3000);
          } else {
              alert("Failed to fetch resident details.");
          }
      },
      error: function () {
          alert("An error occurred while fetching resident details.");
      }
  }); 
}
const viewResidentData = function(residentId) {                  // Resident Details on button click        
    $.ajax({
        url: "<?= base_url('admin/get-resident-details') ?>", 
        type: "GET",
        data: { resident_id: residentId }, 
        dataType: "json",
        success: function (response) {
            if (response.success) {
                // Populate modal fields
                $("input[name='view_firstname']").val(response.data.firstname);
                $("input[name='view_lastname']").val(response.data.lastname);
                $("input[name='view_middlename']").val(response.data.middlename);
                $("select[name='view_suffix']").val(response.data.suffix);
                $("input[name='view_contact_no']").val(response.data.contact_no);
                $("input[name='view_birthdate']").val(response.data.birthdate);
                $("input[name='view_age']").val(response.data.age);
                $("input[name='view_birthplace']").val(response.data.birthplace);
                $("select[name='view_citizenship']").val(response.data.citizenship);
                $("select[name='view_gender']").val(response.data.gender);
                $("select[name='view_civil_status']").val(response.data.civil_status);
                $("input[name='view_occupation']").val(response.data.occupation);
                $("input[name='view_religion']").val(response.data.religion);
                // Set the respective radio button as selected
                $("input[name='view_is_pwd'][value='" + response.data.is_pwd + "']").prop("checked", true);
                $("input[name='view_is_voter_of_barangay'][value='" + response.data.is_voter_of_barangay + "']").prop("checked", true);
                $("input[name='view_is_family_head'][value='" + response.data.is_family_head + "']").prop("checked", true);
                $("input[name='view_household_name']").val(response.data.household_name);
                $("input[name='view_house_no']").val(response.data.house_no);
                $("input[name='view_street']").val(response.data.street);
                $("input[name='view_contact_name']").val(response.data.contact_name);
                $("input[name='view_emergency_contact_no']").val(response.data.emergency_contact_no);
                $("input[name='view_contact_relationship']").val(response.data.contact_relationship);
                $('#residentId').val(residentId);
                $('#archiveButton').data('resident-id', residentId);
                $('#reactivateButton').data('resident-id', residentId);
                $('#residentStatus').val(response.data.status);
                if (response.data.status == 1) {
                  $('#archiveButton').show();
                  $('#reactivateButton').hide();
                } else {
                  $('#archiveButton').hide();
                  $('#reactivateButton').show();
                }
                // Open modal
                // $(".wrapper").addClass("open");
                // $("#viewEventModal").addClass("open");
            } else {
                alert("Failed to fetch resident details.");
            }
        },
        error: function () {
            alert("An error occurred while fetching resident details.");
        }
    });
}
const customLoaderOn = function() {
  $('.custom__loader').removeClass('hide');
}
const customLoaderOff = function() {
  $('.custom__loader').addClass('hide');
}


const updateResident = function() {
  let formData = new FormData();

  formData.append("resident_id", $("#residentId").val());
  formData.append("firstname", $(".information__input[name='view_firstname']").val());
  formData.append("lastname", $(".information__input[name='view_lastname']").val());
  formData.append("middlename", $(".information__input[name='view_middlename']").val());
  formData.append("suffix", $(".information__input[name='view_suffix']").val());
  formData.append("contact_no", $(".information__input[name='view_contact_no']").val());
  formData.append("birthdate", $(".information__input[name='view_birthdate']").val());
  formData.append("birthplace", $(".information__input[name='view_birthplace']").val());
  formData.append("citizenship", $(".information__input[name='view_citizenship']").val());
  formData.append("gender", $(".information__input[name='view_gender']").val());
  formData.append("civil_status", $(".information__input[name='view_civil_status']").val());
  formData.append("occupation", $(".information__input[name='view_occupation']").val());
  formData.append("religion", $(".information__input[name='view_religion']").val());
  formData.append("is_pwd", $("input[name='view_is_pwd']:checked").val());
  formData.append("is_voter_of_barangay", $("input[name='view_is_voter_of_barangay']:checked").val());
  formData.append("is_family_head", $("input[name='view_is_family_head']:checked").val());
  formData.append("household_name", $(".information__input[name='view_household_name']").val());
  formData.append("house_no", $(".information__input[name='view_house_no']").val());
  formData.append("street", $(".information__input[name='view_street']").val());
  formData.append("contact_name", $(".information__input[name='view_contact_name']").val());
  formData.append("emergency_contanct_no", $(".information__input[name='view_emergency_contact_no']").val());
  formData.append("contact_relationship", $(".information__input[name='view_contact_relationship']").val());


  $.ajax({
      url: "<?= site_url('admin/update-resident') ?>",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (response) {
          if (response.success) {
              $(".success__indicator").removeClass("hide");
              $(".indicator__text").html('Resident Updated!');
              const residentId = formData.get("resident_id");
              viewResidentData(residentId);
              loadResidents();
              setTimeout(function () {
                  $(".success__indicator").addClass("hide");
              }, 3000);
              hideModal();
          } else {
              alert("Error updating user.");
          }
      },
      error: function (xhr, status, error) {
          console.error("Update Error:", error);
          alert("Failed to update user.");
      },
  });
}

const loadFilteredResidents = function(filter) {
    customLoaderOn();
    const $residentsTable = $("#residentsTable");

    if ($.fn.DataTable.isDataTable($residentsTable)) {
        $residentsTable.DataTable().clear().destroy();
    }

    $residentsTable.find("tbody").html('<tr><td colspan="7" class="text-center">Loading...</td></tr>');
    console.log(filter);
    $.ajax({
        url: "/admin/filter-residents",
        type: "GET",
        data: { filter }, // pass the clicked filter
        dataType: "json",
        cache: false,
        success: function(response) {
            if (response.success && Array.isArray(response.data) && response.data.length) {
                const residents = response.data;
                const tableData = residents.map(resident => [
                    resident.resident_id,
                    `${resident.firstname} ${resident.middlename ? resident.middlename.charAt(0) + '.' : ''} ${resident.lastname} ${resident.suffix || ''}`,
                    resident.birthdate ? calculateAge(resident.birthdate) : 'N/A',
                    resident.civil_status || 'N/A',
                    resident.gender || 'N/A',
                    resident.house_no || 'N/A',
                    `<button class="btn__primary view__resident__btn action-btn" data-id="${resident.resident_id}">View</button>`
                ]);

                $residentsTable.DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: false,
                    data: tableData,
                    columns: [
                        { title: "ID" },
                        { title: "Name" },
                        { title: "Age" },
                        { title: "Civil Status" },
                        { title: "Gender" },
                        { title: "House No." },
                        { title: "Action", orderable: false }
                    ],
                    columnDefs: [{ width: "80px", targets: -1 }],
                    order: [[0, "desc"]],
                    language: { emptyTable: "No residents found" },
                    pagingType: "simple_numbers",
                    autoWidth: false,
                    responsive: true
                });
            } else {
                $residentsTable.DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: false,
                    data: [],
                    columns: [
                        { title: "ID" },
                        { title: "Name" },
                        { title: "Age" },
                        { title: "Civil Status" },
                        { title: "Gender" },
                        { title: "House No." },
                        { title: "Action", orderable: false }
                    ],
                    language: { emptyTable: "No residents found" },
                    pagingType: "simple_numbers"
                });
            }
            customLoaderOff();
        },
        error: function(xhr, status, error) {
            $residentsTable.find("tbody").html('<tr><td colspan="7" class="text-center">Error loading data</td></tr>');
            console.error("AJAX Error:", error);
        }
    });
};

const loadNationality = function() {
    const nationalities = [
      "Afghan", "Albanian", "Algerian", "American", "Andorran", "Angolan", "Antiguan or Barbudan",
      "Argentine", "Armenian", "Australian", "Austrian", "Azerbaijani", "Bahamian", "Bahraini",
      "Bangladeshi", "Barbadian", "Belarusian", "Belgian", "Belizean", "Beninese", "Bhutanese",
      "Bolivian", "Bosnian or Herzegovinian", "Botswanan", "Brazilian", "Bruneian", "Bulgarian",
      "Burkinabé", "Burundian", "Cabo Verdean", "Cambodian", "Cameroonian", "Canadian",
      "Central African", "Chadian", "Chilean", "Chinese", "Colombian", "Comoran", "Congolese",
      "Costa Rican", "Croatian", "Cuban", "Cypriot", "Czech", "Danish", "Djiboutian", "Dominican",
      "Dutch", "East Timorese", "Ecuadorean", "Egyptian", "Emirati", "Equatoguinean", "Eritrean",
      "Estonian", "Eswatini", "Ethiopian", "Fijian", "Finnish", "French", "Gabonese", "Gambian",
      "Georgian", "German", "Ghanaian", "Greek", "Grenadian", "Guatemalan", "Guinean",
      "Bissau-Guinean", "Guyanese", "Haitian", "Honduran", "Hungarian", "Icelander", "Indian",
      "Indonesian", "Iranian", "Iraqi", "Irish", "Israeli", "Italian", "Ivorian", "Jamaican",
      "Japanese", "Jordanian", "Kazakhstani", "Kenyan", "Kiribati", "Kittitian or Nevisian",
      "Kuwaiti", "Kyrgyzstani", "Laotian", "Latvian", "Lebanese", "Liberian", "Libyan",
      "Liechtensteiner", "Lithuanian", "Luxembourgish", "Malagasy", "Malawian", "Malaysian",
      "Maldivian", "Malian", "Maltese", "Marshallese", "Mauritanian", "Mauritian", "Mexican",
      "Micronesian", "Moldovan", "Monégasque", "Mongolian", "Montenegrin", "Moroccan",
      "Mozambican", "Myanmar (Burmese)", "Namibian", "Nauruan", "Nepali", "New Zealander",
      "Nicaraguan", "Nigerien", "Nigerian", "North Korean", "North Macedonian", "Norwegian",
      "Omani", "Pakistani", "Palauan", "Palestinian", "Panamanian", "Papua New Guinean",
      "Paraguayan", "Peruvian", "Filipino", "Polish", "Portuguese", "Qatari", "Romanian",
      "Russian", "Rwandan", "Saint Lucian", "Salvadoran", "Samoan", "San Marinese",
      "Sao Tomean", "Saudi", "Scottish", "Senegalese", "Serbian", "Seychellois",
      "Sierra Leonean", "Singaporean", "Slovak", "Slovenian", "Solomon Islander", "Somali",
      "South African", "South Korean", "South Sudanese", "Spanish", "Sri Lankan", "Sudanese",
      "Surinamese", "Swazi", "Swedish", "Swiss", "Syrian", "Taiwanese", "Tajikistani",
      "Tanzanian", "Thai", "Togolese", "Tongan", "Trinidadian or Tobagonian", "Tunisian",
      "Turkish", "Turkmen", "Tuvaluan", "Ugandan", "Ukrainian", "Uruguayan", "Uzbekistani",
      "Vanuatuan", "Vatican citizen", "Venezuelan", "Vietnamese", "Welsh", "Yemeni",
      "Zambian", "Zimbabwean"
    ];

    const $nationalityDropdown = $('#nationalityDropdown');
    const $viewNationalityDropdown = $('#viewNationalityDropdown');

    $nationalityDropdown.empty().append('<option value="">Select one</option>');
    $viewNationalityDropdown.empty().append('<option value="">Select one</option>');

    $.each(nationalities, function (i, nationality) {
      $nationalityDropdown.append(`<option value="${nationality}">${nationality}</option>`);
      $viewNationalityDropdown.append(`<option value="${nationality}">${nationality}</option>`);
    });
  }
// ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Event Listeners ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
$(document).on("click", function (event) {
    if (!$(event.target).closest(".filter__items").length) {
        $(".filter__items").addClass("hide");
    }
});

$('.filter__item').on('click', function() {
    $('.filter__item').removeClass('active');
    
    $(this).addClass('active');
    
    const filterValue = $(this).data('filter');
    
});

$('.filter__btn').on("click", function(){
  $('.filter__items').toggleClass("hide");
  event.stopPropagation(); 
});

$(document).on("click", ".filter__item", function () {
    const selectedFilter = $(this).data("filter");
    if (selectedFilter === "All") {
      loadResidents();
    } else {
    loadFilteredResidents(selectedFilter);
    }
});



$(document).on("click", "#editViewResident", function() {
    const btn = $(this);
    const form = $(".modal__viewing");

    if (btn.text().trim() === "Edit") {
        // Enable inputs and selects
        form.find("input").prop("readonly", false);
        form.find("select").prop("disabled", false);
        
        // Change button text to "Save"
        btn.text("Save");
    } else {
        // ======== Add Your Save Logic Here ========
        console.log("Saving data..."); 
        updateResident();
        form.find("input").prop("readonly", true);
        form.find("select").prop("disabled", true);
        
        // Change button text back to "Edit"
        btn.text("Edit");
    }
});



// Archive Resident
$('#archiveButton').on('click', function() {
    // Show confirmation prompt
    const isConfirmed = confirm("Are you sure you want to archive this resident?");

    if (isConfirmed) {
        // If the user clicks "OK", proceed with archiving
        residentIdToArchive = $(this).data('resident-id');
        archiveResident(residentIdToArchive);
    } else {
        // If the user clicks "Cancel", do nothing
        return;
    }
});


// Reactivate Resident
$('#reactivateButton').on('click', function() {
    // Show confirmation prompt
    const isConfirmed = confirm("Are you sure you want to reactivate this resident?");

    if (isConfirmed) {
        // If the user clicks "OK", proceed with reactivating
        residentIdToReactivate = $(this).data('resident-id');
        reactivateResident(residentIdToReactivate);
    } else {
        // If the user clicks "Cancel", do nothing
        return;
    }
});


// -- Display street based on selected house number
$('#houseNumberList').on("change", function(){
  getHouseStreet();
});
// -- Remove a member from the datatable.
$(document).on("click", ".btn__delete", function () {
    let index = $(this).data("index");
    members.splice(index, 1);
    localStorage.setItem("members", JSON.stringify(members));
    displayTable();
});
$("#saveMember").on("click", function(e){
  saveMemberLocally(e);
});

// Data for local storage (Members)
let storedMembers = localStorage.getItem("members");
  if (storedMembers) {
      members = JSON.parse(storedMembers);
      displayTable();
  }

  $(".tab__btn").on("click", function () {
    $(".btn__container").removeClass("visible"); 
    $(this).parent().addClass("visible"); 
  });
  
  $(document).ready(function () {
    $("#example").DataTable();
  });
  const closeModal = function() {
    $("#addResidentModal").removeClass("open");
    $("#viewResidentModal").removeClass("open");
    $(".wrapper").removeClass("open");
  }
  $('.btn__close').on('click', function(){
    closeModal();
  });

    $("input[name='is_family_head']").on("change", function () {
      if ($(this).val() === "1") {
        // $(".house__info").removeClass("d__none"); // Show content
        // $('#saveMember').show();
      } else {
        // $(".house__info").addClass("d__none"); // Hide content
        // $('#saveMember').hide();
      }
    });

$(".validator__cancel").on("click", function() {
  $("#addResidentModal :input").prop("disabled", false);
});
$(".validator__icon").on("click", function() {
  $("#addResidentModal :input").prop("disabled", false);
});
$(".wrapper").on("click", function () {
  $("#addResidentModal :input").prop("disabled", false);
});
$(document).on("keydown", function (event) {
  if (event.key === "Escape") {
    $("#addResidentModal :input").prop("disabled", false);
  }
});
// Reactivation of input forms during closing of modal END
$('.btn__add__resident').on("click", function(){
  // $('#saveMember').hide();
  loadHouseNumbers();
});

$(".create__residents__btn").on("click", function(){
  openValidator();
  $("#addResidentModal :input").prop("disabled", true); // To disabled all inputs when confirmation is up
});

$(".validator__proceed").on("click", function(e){
  e.preventDefault();
  saveResidents();
});

$(document).on("click", ".view__resident__btn", function () {          
  let residentId = $(this).data("id"); 
  $("#viewResidentModal").data("id", residentId); 
  viewResidentData(residentId); 
  openModal();
});

$('.icon__close').on("click", function(){
  closeModal();
})
  
// ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Map Event Listeners ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //

$('.icon__close').on("click", function(){
  $("#familyModal").hide();
})
$('.btn__cancel__services').on("click", function(){
  $("#familyModal").hide();
})

$(document).on("click", ".add-marker", function() {
  let houseNumber = $(this).data("house");
  let houseStreet = $(this).data("street");
  $(".wrapper").addClass("open");
  $("#addResidentModal").addClass("open");

loadHouseNumbers(() => $("#houseNumberList").val(houseNumber)); // Set after loading
  $('#streetInput').val(houseStreet);
});


// ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ On load ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
loadResidents();
loadNationality();


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ MAP JS HERE ONLY ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ //


  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Global Declarations ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
  let markers = []; // Store markers USED IN (1)
  let isEditMode = false;
  let isHiddenMarker = false;
  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Map Initialization ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //

  // Initialize map centered at San Pedro, Laguna
  const map = L.map("map").setView([14.3589, 121.0557], 13);

  // Add OpenStreetMap tiles
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
  }).addTo(map);
  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Functions ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //

  // Remove marker from the map
  const removeMarker = function (lat, lng) {
    markers = markers.filter((marker) => {
      if (marker.getLatLng().lat === lat && marker.getLatLng().lng === lng) {
        map.removeLayer(marker);
        return false;
      }
      return true;
    });
  };

  const saveHouseNumber = function () {
    const houseNumber = $("#houseNumberInput").val().trim();
    const houseStreet = $("[name='house_street']").val();
    const houseType = $("[name='type']").val();
    const latitude = $("#latInput").val();
    const longitude = $("#lngInput").val();

    if (!houseNumber) {
      alert("Please enter a house number.");
      return;
    }

    $.ajax({
      url: "create-pin",
      type: "POST",
      data: {
        house_number: houseNumber,
        house_street: houseStreet,
        type: houseType,
        latitude: latitude,
        longitude: longitude,
      },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert("Pin saved successfully!");
          $("#familyModal").hide();
          loadHouseMarkers();
        } else {
          alert(response.message || "An error occurred.");
        }
      },
      error: function () {
        alert("Failed to connect to the server.");
      },
    });
  };

  const activateEditMode = function () {
    isEditMode = true;
    markers.forEach((marker) => marker.dragging.enable()); // Enable dragging
  };
  const deactivateEditMode = function () {
    isEditMode = false;
    markers.forEach((marker) => marker.dragging.disable()); // Disable dragging
  };

  let autoSaveEnabled = true; // Toggle for auto-save mode

  // Function to add a marker (Used in loadHouseMarkers)
  const houseIcons = {
    residential: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/684/684908.png", // Residential House Icon
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
    government: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/1838/1838419.png", // Government Building Icon
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
    commercial: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/10845/10845690.png", // Commercial
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
    healthcare: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/2994/2994480.png", // health care House Icon
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
    education: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/8074/8074788.png", // education
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
    transport: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/14364/14364405.png", // transport House Icon
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
  };

  const addMarker = function (
    lat,
    lng,
    type,
    houseNumber,
    houseStreet,
    residents
  ) {
    let newLat = lat;
    let newLng = lng;

    console.log("House Type:", type); // Debugging

    const iconType = type ? type.toLowerCase() : "default";

    let residentsHTML = residents
      .map((resident) => {
        return `
          <div class="popup__row">
            <div class="resident__box">
              <i class="fa-solid fa-user"></i>
              <p class="popup__names pos__rel">${resident.fullname} 
                ${
                  resident.is_family_head == 1
                    ? '<span class="family-head">Head</span>'
                    : ""
                }
              </p>
            </div>
            <i class="delete__resident fa-solid fa-trash" data-resident-id="${
              resident.resident_id
            }"></i>
          </div>`;
      })
      .join("");

    const marker = L.marker([lat, lng], {
      draggable: isEditMode,
      icon: houseIcons[iconType] || houseIcons.default,
    })
      .addTo(map)
      .bindPopup(
        `<div class="custom-popup">
            <div class="popup__header">
              <div class="header__container__text">
                <div class="popup__header__text">
                  <p class="house__number">${houseNumber}</p>
                </div>
                <p class="popup__address" title="${houseStreet}">${houseStreet}</p>
              </div>
              <p class="pin__type">${type || "Unknown Type"}</p>
            </div>
            <div class="popup__body">
              <div class="coordinates__container">
                <p class="popup__text"><span>Latitude:</span> <span class="popup-lat">${lat.toFixed(
                  5
                )}</span></p>
                <p class="popup__text"><span>Longitude:</span> <span class="popup-lng">${lng.toFixed(
                  5
                )}</span></p>
              </div>
              ${type.toLowerCase() === "residential" ?
               `<div class="members__container">
                <p class="popup__heading">Family Members</p>
                ${
                  residentsHTML ||
                  "<p class='popup__text'>No residents found.</p>"
                }
              </div>` : ""}
            </div>
            ${type.toLowerCase() === "residential" ? `<button class="add-marker" data-lat="${lat}" data-lng="${lng}" data-house="${houseNumber}" data-street="${houseStreet}">Add Resident</button>` : ""}
            <button class="save-marker" style="display:none" data-house="${houseNumber}">Save Location</button>
        </div>`,
        { closeOnClick: false }
      )
      .on("dragend", function (event) {
        if (!isEditMode) return;

        newLat = event.target.getLatLng().lat;
        newLng = event.target.getLatLng().lng;

        let oldHouseNumber = houseNumber;

        alert(
          `House Number: ${houseNumber}\n\n` +
            `Previous Location:\nLatitude: ${lat.toFixed(
              5
            )}\nLongitude: ${lng.toFixed(5)}\n\n` +
            `New Location:\nLatitude: ${newLat.toFixed(
              5
            )}\nLongitude: ${newLng.toFixed(5)}`
        );

        let newHouseNumber = prompt("Enter new house number:", houseNumber);

        if (newHouseNumber === null || newHouseNumber.trim() === "") {
          marker.setLatLng([lat, lng]);
          return;
        }

        let popupContent = marker.getPopup().getContent();
        let tempDiv = document.createElement("div");
        tempDiv.innerHTML = popupContent;

        tempDiv.querySelector(".popup-lat").textContent = newLat.toFixed(5);
        tempDiv.querySelector(".popup-lng").textContent = newLng.toFixed(5);
        tempDiv.querySelector(".house__number").textContent = newHouseNumber;

        let saveButton = tempDiv.querySelector(".save-marker");
        // saveButton.style.display = "block";
        saveButton.setAttribute("data-house", newHouseNumber);

        marker.setPopupContent(tempDiv.innerHTML);

        if (autoSaveEnabled) {
          updateMarkerLocation(oldHouseNumber, newHouseNumber, newLat, newLng);
        }
      });

    markers.push(marker);
  };

  // Load stored house details from DB
  function loadHouseMarkers() {
    markers.forEach((marker) => map.removeLayer(marker));
    markers = [];

    $.ajax({
      url: "get-house-details",
      type: "GET",
      dataType: "json",
      success: function (houses) {
        console.log("Received Houses Data:", houses);

        houses.forEach(function (house) {
          addMarker(
            parseFloat(house.latitude),
            parseFloat(house.longitude),
            house.type,
            house.house_no,
            house.house_street,
            house.residents || []
          );
        });
      },
      error: function () {
        console.error("Failed to load house details.");
      },
    });
  }
  const updateMarkerLocation = function (
    oldHouseNumber,
    newHouseNumber,
    newLat,
    newLng
  ) {
    $.ajax({
      url: "update-house-location",
      type: "POST",
      data: {
        old_house_number: oldHouseNumber, // Send old house number
        house_number: newHouseNumber, // Send new house number
        latitude: newLat,
        longitude: newLng,
      },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert("House number and location updated successfully!");
        } else {
          alert("Failed to update house number and location.");
        }
      },
      error: function () {
        alert("Error updating house details.");
      },
    });
  };

  $(document).on("click", ".save-marker", function () {
    const houseNumber = $(this).data("house");
    const marker = markers.find((m) =>
      m.getPopup().getContent().includes(houseNumber)
    );

    if (!marker) return;

    const newLat = marker.getLatLng().lat;
    const newLng = marker.getLatLng().lng;

    updateMarkerLocation(houseNumber, newLat, newLng);

    // Hide save button after saving
    $(this).hide();
  });

  // Function to search for a house number
  function searchHouseNumber(houseNumber) {
    let found = false;

    markers.forEach((marker) => {
      const popupContent = marker.getPopup().getContent();
      if (
        popupContent.includes(`<p class="house__number">${houseNumber}</p>`)
      ) {
        found = true;

        // Open popup and pan to marker
        marker.openPopup();
        map.setView(marker.getLatLng(), 17);
      }
    });

    if (!found) {
      alert("House number not found!");
    }
  }

  // Event listener for search button
  $("#searchHouseButton").on("click", function () {
    const houseNumber = $("#searchHouseInput").val().trim();
    if (houseNumber) {
      searchHouseNumber(houseNumber);
    } else {
      alert("Please enter a house number.");
    }
  });

  function hideMarkers() {
    markers.forEach((marker) => marker.setOpacity(0));
    isHiddenMarker = true;
  }

  function showMarkers() {
    markers.forEach((marker) => marker.setOpacity(1));
    isHiddenMarker = false;
  }

  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Event Listeners ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //

  $(".tab__1").on("click", function() {
    loadHouseMarkers();
  })
  $(".tab__2").on("click", function() {
    loadResidents();
  })
  $(".tab__4").on("click", function() {
    loadArchivedResidents();
  })
  $(".btn__edit__mode").on("click", function () {
    if (isEditMode) {
      deactivateEditMode();
      $(".btn__edit__mode").removeClass("selected");
      $(this).html(`
        <div class="icon__bs">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
          </svg>
        </div>
         Edit Mode
      `);
    } else {
      activateEditMode();
      $(".btn__edit__mode").addClass("selected");
      $(this).html(`
        <div class="icon__bs">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
          </svg>
        </div>
        View Mode
      `);
    }
  });

  $(".btn__hide__markers").on("click", function () {
    if (!isHiddenMarker) {
      hideMarkers();
      $(".btn__hide__markers").addClass("selected");
      $(this).html(`
        <div class="icon__bs">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
          </svg>
        </div>
         Show Markers
      `);
    } else {
      showMarkers();
      $(".btn__hide__markers").removeClass("selected");
      $(this).html(`
        <div class="icon__bs">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
            <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
            <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
            <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
          </svg>
        </div>
         Hide Markers
      `);
    }
  });

  $(document).on("click", ".delete__resident", function () {
    let residentId = $(this).data("resident-id");
    let residentRow = $(this).closest(".popup__row"); // Target the row div

    if (!confirm("Are you sure you want to remove this resident?")) {
      return;
    }

    $.ajax({
      url: "remove-resident-in-house",
      type: "POST",
      data: { resident_id: residentId, house_no: 0 },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert("Resident removed successfully!");

          residentRow.remove();

          let membersContainer = $(".members__container");
          if (membersContainer.find(".popup__row").length === 0) {
            membersContainer.html(
              "<p class='popup__text'>No residents found.</p>"
            );
          }

          let currentPopup = $(".leaflet-popup-content").parent();
          if (currentPopup.length > 0) {
            let newContent = $(".custom-popup").html();
            let marker = markers.find((m) => m.isPopupOpen());
            if (marker) {
              marker.setPopupContent(
                `<div class="custom-popup">${newContent}</div>`
              );
            }
          }
        } else {
          alert("Failed to remove resident.");
        }
      },
      error: function () {
        alert("An error occurred. Please try again.");
      },
    });
  });

  $("#saveHouseNumber").on("click", function () {
    saveHouseNumber();
  });

  // Handle map click
  map.on("click", function (e) {
    if (!isEditMode) return;
    const lat = e.latlng.lat;
    const lng = e.latlng.lng;

    $("#latInput").val(lat);
    $("#lngInput").val(lng);
    $("#familyModal").show();
  });

  // Close modal
  $("#closeModal").on("click", function () {
    $("#familyModal").hide();
  });

  const searchHouseViaNumber = function () {
    const houseNumber = $("#searchHouseInput").val().trim();
    if (houseNumber) {
      searchHouseNumber(houseNumber);
    } else {
      alert("Please enter a house number.");
    }
  };

  $("#searchHouseButton").on("click", function () {
    searchHouseViaNumber();
  });

  $(document).on("keydown", function (event) {
    if (event.key === "Enter") {
      searchHouseViaNumber();
    }
  });

  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ ON LOAD ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
  loadHouseMarkers();
});    
</script>

    <script>

// const loadHouseholdResidents = function() {
//   customLoaderOn();
//     const $residentsTable = $("#newResidents");
//     const $tableBody = $residentsTable.find("tbody");

//     // Destroy existing DataTable instance if it exists
//     if ($.fn.DataTable.isDataTable($residentsTable)) {
//         $residentsTable.DataTable().destroy();
//     }

//     // Loading
//     $tableBody.html('<tr><td colspan="10" class="text-center">Loading...</td></tr>');

//     $.ajax({
//         url: "/admin/get-residents",
//         type: "GET",
//         dataType: "json",
//         cache: true,
//         success: function(response) {
//             if (response.success && Array.isArray(response.data) && response.data.length) {
//                 const residents = response.data;
//                 const tableData = residents.map(resident => [
//                     resident.resident_id,
//                     `${resident.firstname} ${resident.middlename || ''} ${resident.lastname} ${resident.suffix || ''}`,
//                     // resident.birthdate || 'N/A',
//                     resident.birthdate ? calculateAge(resident.birthdate) : 'N/A',
//                     resident.civil_status || 'N/A',
//                     resident.gender || 'N/A',
//                     // resident.voter_status ? 'Yes' : 'No',
//                     // resident.family_head ? 'Yes' : 'No',
//                     // resident.contact_no || 'N/A',
//                     `<button class="btn__primary view__resident__btn action-btn" data-id="${resident.resident_id}">View</button>`
//                 ]);

//                 // Initialize DataTable
//                 $residentsTable.DataTable({
//                     "processing": true,
//                     "serverSide": false,
//                     "data": tableData,
//                     "columns": [
//                         { "title": "ID" },
//                         { "title": "Name" },
//                         // { "title": "Birthdate" },
//                         { "title": "Age" },
//                         { "title": "Civil Status" },
//                         { "title": "Gender" },
//                         // { "title": "Voter Status" },
//                         // { "title": "Family Head" },
//                         // { "title": "Contact No" },
//                         { "title": "Action", "orderable": false }
//                     ],
//                     "order": [[0, "desc"]],
//                     "language": {
//                         "emptyTable": "No residents found"
//                     },
//                     "pagingType": "simple_numbers"
//                 });

//             } else {
//                 // Initialize DataTable with empty data to prevent error
//                 $residentsTable.DataTable({
//                     "processing": true,
//                     "serverSide": false,
//                     "data": [],
//                     "columns": [
//                         { "title": "ID" },
//                         { "title": "Name" },
//                         // { "title": "Birthdate" },
//                         { "title": "Age" },
//                         { "title": "Civil Status" },
//                         { "title": "Gender" },
//                         // { "title": "Voter" },
//                         // { "title": "Family Head" },
//                         // { "title": "Contact No" },
//                         { "title": "Action", "orderable": false }
//                     ],
//                     "language": {
//                         "emptyTable": "No residents found"
//                     },
//                     "pagingType": "simple_numbers"
//                 });
//             }
//             customLoaderOff();
//         },
//         error: function(xhr, status, error) {
//             $tableBody.html('<tr><td colspan="10" class="text-center">Error loading data</td></tr>');
//             console.error("AJAX Error:", error);
//         }
//     });
// };

// make this on click of button create__residents__btn


// Reactivation of input forms during closing of modal
    </script>
  </body>
</html>
