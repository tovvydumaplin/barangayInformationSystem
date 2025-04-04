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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
            <input type="file" id="fileInput" accept="image/*" style="display: none;" />
            <img class="img__upload" src="img__default.png" style="cursor: pointer;" />

            </div>
            <div class="row">
              <div class="input__box">
                <input
                  id="assetName"
                  class="information__input"
                  value=""
                  placeholder="Enter name"
                  name="asset_name"
                />
                <span class="input__title"
                  >Item name<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <input
                  id="assetQuantity"
                  class="information__input"
                  value=""
                  placeholder="Enter quantity"
                  name="asset_quantity"
                />
                <span class="input__title"
                  >Quantity<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
          </div>
          <div class="btn__box__modal">
            <span class="btn__primary active btn__register__item">Register Item</span>
          </div>
        </form>
      </div>
      <!-- Modal to View/Edit Item -->
      <!-- Modal to View/Edit Item -->
      <div id="viewItemModal" class="modal">
          <div class="modal__header">
              <p class="modal__heading">Register Item</p>
          </div>
          <form class="modal__body community__modal" id="updateItemForm">
              <input type="hidden" id="item_id" name="item_id" />
              <input type="hidden" id="current_image" name="current_image" />
              <div class="row flex__d__col">
                  <div class="row modal__register__modified">
                      <input type="file" id="viewFileInput" accept="image/*" style="display: none;" />
                      <img class="img__upload" src="img__default.png" style="cursor: pointer;" id="viewItemImage" />
                  </div>
                  <div class="row">
                      <div class="input__box">
                          <input
                              id="viewAssetName"
                              class="information__input"
                              value=""
                              placeholder="Enter name"
                              name="view_asset_name"
                          />
                          <span class="input__title">Item name<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="input__box">
                          <input
                              id="viewAssetQuantity"
                              class="information__input"
                              value=""
                              placeholder="Enter quantity"
                              name="view_asset_quantity"
                          />
                          <span class="input__title">Quantity<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                  </div>
              </div>
              <div class="btn__box__modal">
                  <span class="btn__primary active btn__register__item" id="editItemBtn">Save Changes</span>
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
            <table id="inventoryTable" class="display">
              <thead class="thead">
                <tr>
                  <th>Asset Name</th>
                  <th>Quantity</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody></tbody>
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
$(document).ready(function () {
    const $fileInput = $('#fileInput');
    const $imgUpload = $('.img__upload');

    // Click image to open file picker
    $imgUpload.on('click', function () {
        $fileInput.click();
    });

    // Image preview only (no upload here)
    $fileInput.on('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $imgUpload.attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    // Call createItem() when button is clicked
    $('.btn__register__item').on('click', function (e) {
        e.preventDefault();
        
        const file = $fileInput[0].files[0];
        const assetName = $('#assetName').val();  // Change to #assetName, since that's the ID in your HTML
        const assetQuantity = $('#assetQuantity').val();
        
        console.log('Asset Name:', assetName);
        console.log('Asset Quantity:', assetQuantity);
        console.log('File:', file);
        
        createItem(file, assetName, assetQuantity);
    });

    // Upload data + image
    const createItem = function(file, assetName, assetQuantity) {
        let formData = new FormData();
        formData.append('image', file);
        formData.append('item_name', assetName);
        formData.append('item_quantity', assetQuantity);

        $.ajax({
            url: "<?= site_url('/admin/create-item') ?>",  // Assuming you are using CodeIgniter
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false, // Required for file uploads
            processData: false, // Prevent jQuery from processing data
            beforeSend: function () {
                $(".text-danger").text(""); // Clear previous error messages
            },
            success: function (response) {
                if (response.status == "success") {
                      alert(" YES");
                } else if (response.status == "validation_error") {
                    let firstErrorMessage = "";  // Store the first error message

                    $.each(response.errors, function (key, value) {
                        if (!firstErrorMessage) {
                            firstErrorMessage = value;  // Get the first error message
                        }
                    });

                    if (firstErrorMessage) {
                        // openErrorDisplay(firstErrorMessage);  // Show first validation error
                    }
                    closeValidator();  // Close validator
                } else {
                    // openErrorDisplay(response.message);  // Open general error display
                    closeValidator();  // Close form validator
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText);
                alert("Something went wrong. Please try again.");
            }
        });
    };

    // Open modal and populate data (this should be defined before DataTable initialization)
    function viewItem(itemId) {
        $.ajax({
            url: '<?= site_url('admin/get-item-details') ?>',
            type: 'GET',
            data: { item_id: itemId },
            success: function(response) {
                if (response.status === 'success') {
                    $('#item_id').val(response.data.item_id);
                    $('#viewAssetName').val(response.data.item_name);
                    $('#viewAssetQuantity').val(response.data.item_quantity);
                    $('#viewItemImage').attr('src', '/uploads/inventory/' + response.data.image);
                    $('#current_image').val(response.data.image);
                    $('#viewItemModal').show();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log('Error fetching item details:', error);
            }
        });
    }

    // Initialize DataTable
    $('#inventoryTable').DataTable({
        ajax: {
            url: '<?= site_url('admin/inventory-data') ?>',  // URL to fetch data from
            type: 'GET',  // HTTP method for fetching data
            dataSrc: '',  // Assuming the data is returned as an array of objects
            error: function (xhr, status, error) {
                console.log('Error fetching inventory data:', error);  // Log error if fetching fails
            }
        },
        columns: [
            { data: 'item_name' },  // Display the asset name
            { data: 'item_quantity' },  // Display the asset quantity
            {
                data: 'image',  // Column to display image
                render: function (data, type, row) {
                    const imagePath = data ? '/uploads/inventory/' + data : '/path/to/default/image.jpg'; // Default image
                    return '<img src="' + imagePath + '" alt="' + row.item_name + '" style="width: 50px; height: 50px; object-fit: cover;">';
                }
            },
            {
                data: null,  // Action column for buttons or links
                render: function (data, type, row) {
                  return '<button class="btn btn-info btn-sm view-item-btn" data-item-id="' + row.item_id + '">View</button>';
                }
            }
        ]
    });

    // Update item details
    function updateItem() {
        var formData = new FormData($('#updateItemForm')[0]); // Serialize form data

        $.ajax({
            url: '<?= site_url('admin/update-item') ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status === 'success') {
                    alert('Item updated successfully!');
                    $('#viewItemModal').hide();
                    $('#inventoryTable').DataTable().ajax.reload();  // Refresh DataTable
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log('Error updating item:', error);
            }
        });
    }
    $('#inventoryTable').on('click', '.view-item-btn', function() {
        const itemId = $(this).data('item-id');  // Get the item_id from the button's data attribute
        viewItem(itemId);  // Call the viewItem function
        $('#viewItemModal').addClass('open');
        $('.wrapper').addClass('open');
    });
    // Close modal when clicking the background or a close button
    $('.close').on('click', function() {
        $('#viewItemModal').hide();
    });
    $('#editItemBtn').on('click', function() {
      updateItem();
    });

});





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
        document.getElementById("viewItemModal").classList.remove("open");
      });

      document
        .querySelector(".btn__close")
        .addEventListener("click", function () {
          document.querySelector(".wrapper").classList.remove("open");
          document.getElementById("registerItemModal").classList.remove("open");
          document.getElementById("viewItemModal").classList.remove("open");
        });
      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
          document.querySelector(".wrapper").classList.remove("open");
          document.getElementById("registerItemModal").classList.remove("open");
          document.getElementById("viewItemModal").classList.remove("open");
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
