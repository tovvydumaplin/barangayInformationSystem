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
    <link rel="stylesheet" href="<?= base_url('assets/css/settings.css') ?>" />
    <link href="<?= base_url('assets/DataTables/datatables.min.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/apexcharts.min.js') ?>"></script>

  </head>
  <body>
  <!-- Error handler -->
<div class="error__display hide">
  <p class="error__text"></p>
  <ion-icon class="validator__icon error__close" name="close-outline"></ion-icon>
</div>
  <!-- Error Display ENDS -->
   <!-- Success Indicator -->
  <div class="success__indicator hide">
    <div class="indicator__container">
      <div class="icon__link">
        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-check-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
          <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
        </svg>
      </div>
      <p class="indicator__text">Success!</p>
    </div>
  </div>
    <?= view ('includes/sidebar') ?>
    <main>
    <?= view('includes/header.php') ?>
      <div class="wrapper"></div>
      <div id="registerItemModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Add New Suffix</p>
          <p class="subtitle">Create a new suffix for name formatting</p>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <div class="row">
              <div class="input__box">
                <input
                  id="suffix"
                  class="information__input"
                  value=""
                  placeholder="Enter suffix"
                  name="suffix"
                />
                <span class="input__title"
                  >Suffix<span class="red__dot">*</span></span
                >
                <p class="text-sub">Enter the suffix abbreviation. Examples: Jr., Sr., III</p>
              </div>
            </div>
            
          </div>
          <div class="btn__box__modal">
            <span class="btn__primary active btn__register__item"><i class="bi bi-plus"></i>Create Suffix</span>
          </div>
        </form>
      </div>
      <!-- Modal to View/Edit Item FOR POSITIONS-->
      <div id="registerPositionModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Create Position</p>
          <p class="subtitle">Create position for formatting</p>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <div class="row">
              <div class="input__box">
                <input
                  id="positionCreate"
                  class="information__input"
                  value=""
                  placeholder="Enter suffix"
                  name="position_create"
                />
                <span class="input__title"
                  >Position<span class="red__dot">*</span></span
                >
                <p class="text-sub">Enter the Position. Examples: Captain., Secretary, Treasurer</p>
              </div>
            </div>
          </div>
          <div class="btn__box__modal">
            <span class="btn__primary active btn__create__position"><i class="bi bi-check"></i>Create Position</span>
          </div>
        </form>
      </div>
      <!-- Modal to View/Edit Item -->
      <div id="viewItemModal" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Edit Suffix</p>
          <p class="subtitle">Edit suffix for name formatting</p>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <div class="row">
              <div class="input__box">
                <input
                  id="suffixEdit"
                  class="information__input"
                  value=""
                  placeholder="Enter suffix"
                  name="suffix_edit"
                />
                <span class="input__title"
                  >Suffix<span class="red__dot">*</span></span
                >
                <p class="text-sub">Enter the suffix abbreviation. Examples: Jr., Sr., III</p>
              </div>
            </div>
            
          </div>
          <div class="btn__box__modal">
            <span class="btn__primary active btn__update__suffix"><i class="bi bi-check"></i>Update Suffix</span>
          </div>
        </form>
      </div>
      <!-- Modal to View/Edit Item FOR POSITIONS-->
      <div id="viewPositions" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Edit Position</p>
          <p class="subtitle">Edit position for formatting</p>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <div class="row">
              <div class="input__box">
                <input
                  id="positionEdit"
                  class="information__input"
                  value=""
                  placeholder="Enter suffix"
                  name="position_edit"
                />
                <span class="input__title"
                  >Position<span class="red__dot">*</span></span
                >
                <p class="text-sub">Enter the Position. Examples: Captain., Secretary, Treasurer</p>
              </div>
            </div>
          </div>
          <div class="btn__box__modal">
            <span class="btn__primary active btn__update__position"><i class="bi bi-check"></i>Update Position</span>
          </div>
        </form>
      </div>
      <div class="container">
        <div class="heading__box">
          <div class="tab__container">
            <div class="btn__container tab__1 visible">
              <button class="tab__btn inventory__tab">Variables</button>
              <div class="active__tab"></div>
            </div>
            <div class="btn__container tab__2">
              <button class="tab__btn lending__tab">Audit Trail</button>
              <div class="active__tab"></div>
            </div>
            <div class="btn__container tab__3">
              <button class="tab__btn inventory__history__btn">Backup </button>
              <div class="active__tab"></div>
            </div>
          </div>
        </div>
        <div class="card card__inventory">
          <div class="heading__container">
            <p class="subheading">List of Items</p>
          </div>
          <!-- Suffix Container -->
          <div class="container grid__suffix">
            <!-- Variables for suffix -->
            <div class="settings__card">
              <div class="settings__card__header">
                <div class="settings__title__box">
                  <p class="settings__title">Existing Suffixes</p>
                  <p class="settings__subtitle">Manage your collection of name suffixes</p>
                </div>
                <div class="settings__btn__box">
                  <button class="btn__secondary active btn__add__item">
                    <i class="bi bi-plus"></i>
                    Add Suffix
                  </button>
                </div>
              </div>
              <div class="settings__item__box settings__list">
                <!-- For each here -->
              </div>
            </div>
            <!-- Variables for Positions -->
            <div class="settings__card">
              <div class="settings__card__header">
                <div class="settings__title__box">
                  <p class="settings__title">Existing Positions</p>
                  <p class="settings__subtitle">Manage your collection of positions</p>
                </div>
                <div class="settings__btn__box">
                  <button class="btn__secondary active btn__add__position">
                    <i class="bi bi-plus"></i>
                    Add Position
                  </button>
                </div>
              </div>
              <div class="settings__item__box position__list">
                <!-- For each here -->
              </div>
            </div>
          </div>
        </div>
        <!-- Lending Item Tab -->
        <div class="card lending__items d__none">
          <div class="heading__container">
            <p class="subheading">Lent Items</p>
            <div class="button__box">
              <button class="btn__secondary active btn__borrow__item">
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
                Borrow
              </button>
            </div>
          </div>
          <div class="container">
          <table id="lendingTable" class="display">
            <thead>
              <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Date Borrowed</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          </div>
        </div>
        <!-- Lending Item Tab ENDS -->
        <!-- Inventory History Tab -->
        <div class="card inventory__history d__none">
          <div class="heading__container">
            <p class="subheading">Inventory History</p>
          </div>
          <div class="container">
          <table id="lendingHistory" class="display">
            <thead>
              <tr>
                <th>Item Name</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Previous Quantity</th>
                <th>New Quantity</th>
                <th>Updated By</th>
                <th>Reason</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          </div>
        </div>
        <!-- Inventory history Tab ENDS -->
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
    <script src="<?= base_url('assets/js/general.js') ?>"></script>
    <script>

// Lending table
$('.lending__tab').on('click', function () {
  loadLendingHistory();
});
// Lending table
$('.inventory__history__btn').on('click', function () {
  inventoryHistory();
});




$(document).ready(function () {

  const createSuffix = function() {
    const suffixValue = $('#suffix').val().trim();

    if (!suffixValue) {
      alert('Please enter a suffix.');
      return;
    }

    $.ajax({
      url: '/admin/create-suffix',
      method: 'POST',
      data: { suffix: suffixValue },
      beforeSend: function () {
        $('.btn__register__item').prop('disabled', true).html('<i class="bi bi-hourglass-split"></i> Saving...');
      },
      success: function (response) {
        if (response.status === 'success') {
          alert(response.message);
          $('#suffix').val('');
          $('#registerItemModal').removeClass('show'); // Optional: close modal
        } else {
          alert(response.message);
        }
      },
      error: function () {
        alert('Something went wrong. Please try again.');
      },
      complete: function () {
        $('.btn__register__item').prop('disabled', false).html('<i class="bi bi-plus"></i> Create Suffix');
          loadSuffixes();
      }
    });
  };

  const loadSuffixes = function () {
  $.ajax({
    url: '/admin/get-suffixes',
    method: 'GET',
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        const container = $('.settings__list'); // or whatever your wrapper is
        container.html(''); // clear previous

        response.data.forEach(function (item) {
          const suffix = item.suffix_title;
          const fullName = getFullSuffixName(suffix); // Optional full form

          const template = `
            <div class="settings__item">
              <div class="settings__item__name">
                <p class="settings__indicator">${suffix}</p>
                <p class="settings__namer">${fullName}</p>
              </div>
              <div class="settings__btn__box">
                <i class="bi bi-pencil btn__edit__suffix" data-id="${item.id}" data-suffix="${suffix}"></i>
                <i class="bi bi-trash red__icon__color btn__delete__suffix" data-id="${item.id}"></i>
              </div>
            </div>
          `;
          container.append(template);
        });
      }
    }
  });
};


function getFullSuffixName(short) {
  const normalized = short.trim().toLowerCase();

  const map = {
    'jr.': 'Junior',
    'jr': 'Junior',
    'junior': 'Jr.',

    'sr.': 'Senior',
    'sr': 'Senior',
    'senior': 'Sr.',

    'iii': 'The Third',
    'the third': 'III',

    'iv': 'The Fourth',
    'the fourth': 'IV',

    'v': 'The Fifth',
    'the fifth': 'V',

    'ph.d': 'Doctor of Philosophy',
    'doctor of philosophy': 'Ph.D',

    'md': 'Doctor of Medicine',
    'doctor of medicine': 'MD',

    'esq': 'Esquire',
    'esquire': 'Esq.',

    'ii': 'The Second',
    'the second': 'II',

    'vi': 'The Sixth',
    'the sixth': 'VI',

    'vii': 'The Seventh',
    'the seventh': 'VII',

    'capt': 'Captain',
    'captain': 'Capt',

    'lt': 'Lieutenant',
    'lieutenant': 'Lt',

    'dr': 'Doctor',
    'dr.': 'Doctor',
    'doctor': 'Dr.'
  };

  // If it's in the map
  if (map[normalized]) {
    return map[normalized];
  }

  // Check for combos like "III The Third", "Jr. Junior"
  const parts = short.trim().split(/\s+/);
  if (parts.length === 2) {
    const [abbr, full] = parts;
    if (
      map[abbr.toLowerCase()]?.toLowerCase() === full.toLowerCase() ||
      map[full.toLowerCase()]?.toLowerCase() === abbr.toLowerCase()
    ) {
      // If they mean the same thing, return the full version
      return getFullSuffixName(abbr); // or full, depending on preference
    }
  }

  // Fallback — capitalize each word
  return short
    .toLowerCase()
    .split(' ')
    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
    .join(' ');
}

loadSuffixes();

const deleteSuffix = function (id) {
  $.ajax({
    url: '/admin/delete-suffix',
    method: 'POST',
    data: { id },
    success: function (response) {
      if (response.status === 'success') {
        alert(response.message);
        loadSuffixes(); // Refresh the list
      } else {
        alert(response.message);
      }
    },
    error: function () {
      alert('Something went wrong while deleting.');
    }
  });
};

// Bind delete button
$(document).on('click', '.btn__delete__suffix', function () {
  const id = $(this).data('id');
  if (confirm('Are you sure you want to delete this suffix?')) {
    deleteSuffix(id);
  }
});

$('.btn__register__item').on('click', createSuffix);

$(document).on("click", ".btn__edit__suffix", function () {
  const id = $(this).data("id");
  const suffix = $(this).data("suffix");

  editingSuffixID = id;
  $("#suffixEdit").val(suffix);
  $("#viewItemModal").addClass("open");
  $(".wrapper").addClass("open");
});

// Edit suffix
$(document).on("click", ".btn__update__suffix", function () {
  const newSuffix = $("#suffixEdit").val().trim();

  if (!newSuffix) {
    alert("Suffix is required.");
    return;
  }

  $.ajax({
    url: '/admin/update-suffix',
    method: 'POST',
    data: {
      id: editingSuffixID,
      suffix: newSuffix
    },
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        $("#viewItemModal").removeClass("show");
        loadSuffixes();
        alert("Suffix updated successfully!");
      } else {
        alert(response.message || "Something went wrong.");
      }
    }
  });
});



const loadPositions = function () {
  $.ajax({
    url: '/admin/get-positions',
    method: 'GET',
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        const container = $('.position__list'); // Container for positions
        container.html(''); // Clear previous list

        response.data.forEach(function (item) {
          const position = item.position_name;
          const positionShort = position.substring(0, 3).toUpperCase();

          const template = `
            <div class="settings__item">
              <div class="settings__item__name">
                <p class="settings__indicator">${positionShort}</p>
                <p class="settings__namer">${position}</p>
              </div>
              <div class="settings__btn__box">
                <i class="bi bi-pencil btn__edit__position" data-id="${item.id}" data-position="${position}"></i>
                <i class="bi bi-trash red__icon__color btn__delete__position" data-id="${item.id}"></i>
              </div>
            </div>
          `;
          container.append(template);
        });
      }
    }
  });
};

loadPositions();

// Position create
const createPosition = function () {
  const position = $("#positionCreate").val().trim();

  if (!position) {
    alert("Position is required.");
    return;
  }

  $.ajax({
    url: '/admin/create-position',
    method: 'POST',
    data: { position },
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        $("#registerPositionModal").removeClass("show");
        alert(response.message);
        $("#positionCreate").val("");
      } else {
        alert(response.message || "Something went wrong.");
      }
    },
    complete: function () {
      loadPositions();
    }
  });
};

// Create event listener
$(document).on("click", ".btn__create__position", createPosition);

// Delete Position
$(document).on("click", ".btn__delete__position", function () {
  const positionID = $(this).data("id");

  if (confirm("Are you sure you want to delete this position?")) {
    $.ajax({
      url: '/admin/delete-position',
      method: 'POST',
      data: { id: positionID },
      dataType: 'json',
      success: function (response) {
        if (response.status === 'success') {
          loadPositions(); // Reload the positions after deletion
          alert("Position deleted successfully.");
        } else {
          alert(response.message || "Something went wrong.");
        }
      }
    });
  }
});
$(document).on("click", ".btn__edit__position", function () {
  const positionID = $(this).data("id");
  const positionName = $(this).data("position");

  // Populate input
  $("#positionEdit").val(positionName);

  // Store ID on modal for use on update
  $("#viewPositions").data("id", positionID);

  // Open modal
  $(".wrapper").addClass("open");
  $("#viewPositions").addClass("open");
});

    // Position modal edit
    $(document).on("click", ".btn__update__position", function () {
        const id = $("#viewPositions").data("id");
        const updatedPosition = $("#positionEdit").val().trim();

        if (!updatedPosition) {
          alert("Position is required.");
          return;
        }

        $.ajax({
          url: '/admin/update-position',
          method: 'POST',
          data: {
            id: id,
            position: updatedPosition
          },
          dataType: 'json',
          success: function (response) {
            if (response.status === 'success') {
              alert("Position updated successfully!");
              $("#viewPositions").removeClass("open");
              $(".wrapper").removeClass("open");
              loadPositions(); // Reload the list
            } else {
              alert(response.message || "Something went wrong.");
            }
          }
        });
      });


    // Handle table buttons
    $(".table__button, .btn__add__item").on("click", function () {
      $(".wrapper").addClass("open");
      $("#registerItemModal").addClass("open");
    });

    $(".btn__borrow__item").on("click", function () {
      $(".wrapper").addClass("open");
      $("#borrowItemModal").addClass("open");
      $('#stockCount').hide();
    });
    // Position modal create
    $(".btn__add__position").on("click", function () {
      $(".wrapper").addClass("open");
      $("#registerPositionModal").addClass("open");
    });


    // Close on wrapper click or close button
    $(".wrapper, .btn__close").on("click", function () {
      $(".wrapper").removeClass("open");
      $("#registerItemModal").removeClass("open");
      $("#viewItemModal").removeClass("open");
      $("#borrowItemModal").removeClass("open");
      $("#viewBorrowItemModal").removeClass("open");
      $("#registerPositionModal").removeClass("open");
      $("#viewPositions").removeClass("open");

    });

    // Close on Escape key
    $(document).on("keydown", function (event) {
      if (event.key === "Escape") {
        $(".wrapper").removeClass("open");
        $("#registerItemModal").removeClass("open");
        $("#viewItemModal").removeClass("open");
        $("#borrowItemModal").removeClass("open");
      $("#viewBorrowItemModal").removeClass("open");
      $("#registerPositionModal").removeClass("open");
      $("#viewPositions").removeClass("open");


      }
    });

    

  // Toggle sidebar
  $(".menu__icon").on("click", function () {
    $("body").toggleClass("hide__sidebar");
    $(".nav__heading").toggleClass("d__none");
  });

  // Toggle user dropdown
  $(".user__box").on("click", function () {
    $(".dropdown__menu").toggleClass("show");
  });

  // Tab switch
  $(".tab__1").on("click", function () {
    $(".tab__1").addClass("visible");
    $(".tab__2").removeClass("visible");
    $(".tab__3").removeClass("visible");
    $('.lending__items ').addClass('d__none');
    $('.inventory__history').addClass('d__none');
    $('.card__inventory ').removeClass('d__none');
  });

  $(".tab__2").on("click", function () {
    $(".tab__2").addClass("visible");
    $(".tab__1").removeClass("visible");
    $(".tab__3").removeClass("visible");
    $('.lending__items ').removeClass('d__none');
    $('.inventory__history').addClass('d__none');
    $('.card__inventory ').addClass('d__none');
  });
  $(".tab__3").on("click", function () {
    $(".tab__2").removeClass("visible");
    $(".tab__1").removeClass("visible");
    $(".tab__3").addClass("visible");
    $('.lending__items ').addClass('d__none');
    $('.card__inventory ').addClass('d__none');
    $('.inventory__history').removeClass('d__none');
    inventoryHistory();
  });



  // Initialize DataTable
  $("#example").DataTable();
});

    </script>
  <script>
    $(document).ready(function () {
      $(".menu__icon").on("click", function () {
        $("body").toggleClass("hide__sidebar");
        $(".nav__heading").toggleClass("d__none");
      });

      $(".user__box").on("click", function () {
        $(".dropdown__menu").toggleClass("show");
      });
    });
  </script>
  </body>
</html>
