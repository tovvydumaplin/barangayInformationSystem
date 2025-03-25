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
  <style>
    .modal {
      min-width: 150rem;
    }
    .submit__box {
      display: flex;
      gap: 2rem;
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
  </style>
  </head>
  <body>
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
          <button class="validator__btn validator__cancel">Cancel</button>
          <button class="validator__btn validator__proceed">Proceed</button>
      </div>
    </div>
    <!-- Validation ENDS -->

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
            <div class="row">
              <!-- 1 -->
              <div class="input__box">
                <input
                  class="information__input"
                  value=""
                  placeholder="Enter fullname"
                  name="firstname"
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
                  name="suffix">
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
                  name="contact_no"
                  
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
                  
                />
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
              <div class="row">
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
                    placeholder="Enter House No."
                    name="house_no"
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
                <button id="saveMember" class="btn btn__primary">Save Member</button>
            </div>
          </div>
          <!-- Household members table -->
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
        <!-- Emergency Contact END -->
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
        <form method="POST" class="modal__body community__modal">
          <div class="row">
            <!-- 1 -->
            <div class="input__box">
              <input
                class="information__input"
                value=""
                placeholder="Enter fullname"
                name="view_firstname"
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
                name="view_suffix">
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
                name="view_citizenship"
                
              />
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
                name="view_gender"
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
          <div class="btn__box__modal submit__box">
            <span class="btn__secondary active btn__close">Close</span>
            <!-- <button class="button__submit btn__primary">Edit</submit> -->
          </div>
        </form>
      </div>
      <!-- End of view/update modal -->
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
            <div class="btn__container tab__3">
              <button class="tab__btn">Archived Resident</button>
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
            <table id="residentsTable" class="display">
              <thead class="thead">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <!-- <th>Birthdate</th> -->
                  <th>Age</th>
                  <th>Civil Status</th>
                  <th>Gender</th>
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
      </div>
      <footer class="footer">
        <p class="copyright">
          Copyright 2025 Barangay 42-C. All Rights Reserved.
        </p>
      </footer>
    </main>
    <script src="<?= base_url('assets/js/general.js') ?>"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>

    <script>

// SAVING IN LOCAL STORAGE
    let table = $("#newResidentsTable").DataTable(); // Initialize DataTables
    // Initialize members from localStorage or set an empty array
    let members = JSON.parse(localStorage.getItem("members")) || [];
    
    function displayTable() {
        table.clear().draw(); // Clear the table properly using DataTables API

        if (members.length > 0) {
            $(".house__info").removeClass("d__none"); // Show the table section
        } else {
            $(".house__info").addClass("d__none"); // Hide if no data
        }

        members.forEach((member, index) => {
            table.row.add([
                index + 1,
                `${member.firstname} ${member.middlename} ${member.lastname} ${member.suffix || ''}`,
                member.is_family_head == 1 ? "Head" :"Member", //  IF 1, display Head if 0, Display member
                member.gender,
                `<button class="btn btn-danger btn-sm deleteMember" data-index="${index}">Delete</button>`
            ]).draw(false); // Add rows and redraw the table
        });

        console.log("Table Updated:", members);
    }

    $("#saveMember").click(function (e) {
    e.preventDefault();

    let requiredFields = [
        "firstname", "lastname", "birthdate", "age",
        "birthplace", "citizenship", "gender",
        "civil_status", "occupation", "religion",
        "household_name", "house_no", "street",
        "contact_name", "emergency_contact_no", "contact_relationship"
    ];

    for (let field of requiredFields) {
        let value = $(`input[name='${field}'], select[name='${field}']`).val();
        if (!value) {
            // Show success indicator
            $(".error__display").removeClass("hide");
            $(".error__text").html(`Please fill out the ${field.replace("_", " ")} field.`);

            setTimeout(() => $(".success__indicator").addClass("hide"), 3000);
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
        age: $("input[name='age']").val(),
        birthplace: $("input[name='birthplace']").val(),
        citizenship: $("input[name='citizenship']").val(),
        gender: $("select[name='gender']").val(),
        civil_status: $("select[name='civil_status']").val(),
        occupation: $("input[name='occupation']").val(),
        religion: $("input[name='religion']").val(),
        is_pwd: $("input[name='is_pwd']:checked").val(),
        is_voter_of_barangay: $("input[name='is_voter_of_barangay']:checked").val(),
        is_family_head: $("input[name='is_family_head']:checked").val(),
        household_name: $("input[name='household_name']").val(),
        house_no: $("input[name='house_no']").val(),
        street: $("input[name='street']").val(),
        contact_name: $("input[name='contact_name']").val(),
        emergency_contact_no: $("input[name='emergency_contact_no']").val(),
        contact_relationship: $("input[name='contact_relationship']").val(),
        status: $("input[name='status']").val()
    };

    members.push(formData);
    localStorage.setItem("members", JSON.stringify(members));

    closeErrorDisplay();
    // Show success indicator
    $(".success__indicator").removeClass("hide");
    $(".indicator__text").html("Member added!");

    setTimeout(() => $(".success__indicator").addClass("hide"), 3000);

    displayTable();
    $("form")[0].reset();
});

    // Handle delete button click
    $(document).on("click", ".deleteMember", function () {
        let index = $(this).data("index");
        members.splice(index, 1);
        localStorage.setItem("members", JSON.stringify(members));
        displayTable();
    });

    // Load stored data on page load
    let storedMembers = localStorage.getItem("members");
    if (storedMembers) {
        members = JSON.parse(storedMembers);
        displayTable();
    }
// SAVING IN LOCAL STORAGE

  $(".tab__btn").on("click", function () {
    $(".btn__container").removeClass("visible"); 
    $(this).parent().addClass("visible"); 
  });


      $(document).ready(function () {
        $("#example").DataTable();
      });
    </script>

    <script>
const closeModal = function() {
  $("#addResidentModal").removeClass("open");
  $("#viewResidentModal").removeClass("open");
  $(".wrapper").removeClass("open");
}

$('.btn__close').on('click', function(){
  closeModal();
})
$("input[name='is_family_head']").on("change", function () {
  if ($(this).val() === "1") {
    // $(".house__info").removeClass("d__none"); // Show content
    // $('#saveMember').show();
  } else {
    // $(".house__info").addClass("d__none"); // Hide content
    // $('#saveMember').hide();
  }
});
$(document).ready(function () {

const customLoaderOn = function() {
  $('.custom__loader').removeClass('hide');
}
const customLoaderOff = function() {
  $('.custom__loader').addClass('hide');
}


const loadResidents = function() {
  customLoaderOn();
    const $residentsTable = $("#residentsTable");
    const $tableBody = $residentsTable.find("tbody");

    // Destroy existing DataTable instance if it exists
    if ($.fn.DataTable.isDataTable($residentsTable)) {
        $residentsTable.DataTable().destroy();
    }

    // Loading
    $tableBody.html('<tr><td colspan="10" class="text-center">Loading...</td></tr>');

    $.ajax({
        url: "/admin/get-residents",
        type: "GET",
        dataType: "json",
        cache: true,
        success: function(response) {
            if (response.success && Array.isArray(response.data) && response.data.length) {
                const residents = response.data;
                const tableData = residents.map(resident => [
                    resident.resident_id,
                    `${resident.firstname} ${resident.middlename || ''} ${resident.lastname} ${resident.suffix || ''}`,
                    // resident.birthdate || 'N/A',
                    resident.birthdate ? calculateAge(resident.birthdate) : 'N/A',
                    resident.civil_status || 'N/A',
                    resident.gender || 'N/A',
                    // resident.voter_status ? 'Yes' : 'No',
                    // resident.family_head ? 'Yes' : 'No',
                    // resident.contact_no || 'N/A',
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
                        // { "title": "Birthdate" },
                        { "title": "Age" },
                        { "title": "Civil Status" },
                        { "title": "Gender" },
                        // { "title": "Voter Status" },
                        // { "title": "Family Head" },
                        // { "title": "Contact No" },
                        { "title": "Action", "orderable": false }
                    ],
                    "order": [[0, "desc"]],
                    "language": {
                        "emptyTable": "No residents found"
                    },
                    "pagingType": "simple_numbers"
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
                        // { "title": "Birthdate" },
                        { "title": "Age" },
                        { "title": "Civil Status" },
                        { "title": "Gender" },
                        // { "title": "Voter" },
                        // { "title": "Family Head" },
                        // { "title": "Contact No" },
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

        }
    });
};

// Reactivation of input forms during closing of modal
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
});

$(".create__residents__btn").on("click", function(){
  openValidator();
  $("#addResidentModal :input").prop("disabled", true); // To disabled all inputs when confirmation is up
});

$(".validator__proceed").on("click", function(e){
  e.preventDefault();
  saveResidents();
});




function calculateAge(birthdate) {
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

$(document).on("click", ".view__resident__btn", function () {          
  let residentId = $(this).data("id"); 
  $("#viewResidentModal").data("id", residentId); 
  viewResidentData(residentId); 
  openModal();
});

$('.icon__close').on("click", function(){
  closeModal();
})


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
                $("textarea[name='view_lastname']").val(response.data.lastname);
                $("input[name='view_middlename']").val(response.data.middlename);
                $("input[name='view_suffix']").val(response.data.suffix);
                $("input[name='view_contact_no']").val(response.data.contact_no);
                $("input[name='view_birthdate']").val(response.data.birthdate);
                $("input[name='view_age']").val(response.data.age);
                $("input[name='view_birthplace']").val(response.data.birthplace);
                $("input[name='view_citizenship']").val(response.data.citizenship);
                $("input[name='view_gender']").val(response.data.gender);
                $("input[name='view_civil_status']").val(response.data.civil_status);
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


// Load residents on document ready
$(document).ready(function() {
    loadResidents();
});





});








    </script>
  </body>
</html>
