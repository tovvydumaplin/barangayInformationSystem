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
   <!-- Success Indicator END -->

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
            <div class="row modal__register__modified pos__rel">
              <input type="file" id="fileInput" accept="image/*" style="display: none;" />
              <img class="img__upload" src=""  style="cursor: pointer; object-fit: cover;" />
              <img class="img__placeholder show pos__abs" src="<?= base_url("assets/images/img__default.png");?>"  style="" />
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
              <div class="input__box asset__qty">
                <input
                  id="assetQuantity"
                  class="information__input"
                  value=""
                  placeholder="Enter quantity"
                  name="asset_quantity"
                />
                <i class="icon__counter icon__counter__remove bi bi-dash-lg"></i>
                <i class="icon__counter icon__counter__add bi bi-plus"></i>
                <span class="input__title"
                  >Quantity<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <textarea
                  id="assetDescription"
                  class="information__input"
                  value=""
                  placeholder="Enter Description"
                  name="asset_description"
                ></textarea>

                <span class="input__title"
                  >Description<span class="red__dot">*</span></span
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
              <p class="modal__heading">View Item</p>
          </div>
          <form class="modal__body community__modal" id="updateItemForm" enctype="multipart/form-data" method="post"> 
              <input type="hidden" id="item_id" name="item_id" />
              <input type="hidden" id="current_image" name="current_image" />
              <div class="row flex__d__col">
                  <div class="row modal__register__modified">
                      <input type="file" id="viewFileInput" accept="image/*" style="display: none" />
                      <img class="view__img__upload" src="img__default.png" style="cursor: pointer;" id="viewItemImage" />
                  </div>
                  <div class="row">
                      <div class="input__box">
                          <input
                              id="viewAssetName"
                              class="information__input"
                              value=""
                              placeholder="Enter name"
                              name="view_asset_name"
                              readonly
                          />
                          <span class="input__title">Item name<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                  </div>
                  <div class="row">
                    <div class="input__box">
                      <textarea
                        id="viewAssetDescription"
                        class="information__input"
                        value=""
                        placeholder="Enter Description"
                        name="view_asset_description"
                      ></textarea>

                      <span class="input__title"
                        >Description<span class="red__dot">*</span></span
                      >
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
                              type="number"
                              readonly
                          />

                          <span class="input__title">Quantity<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                  </div>
                  <div class="row flex stock__radio d__none">
                      <label style="font-weight: 600">Stock Action:</label>
                      <div>
                        <input type="radio" class="btn__stock__in" name="stock_in_out" value="in"> Stock In
                      </div>
                      <div>
                        <input type="radio" class="btn__stock__out" name="stock_in_out" value="out"> Stock Out
                      </div>
                  </div>
                  <div class="row stock__desc d__none">
                      <div class="input__box">
                          <input
                              id="viewAssetQuantityUpdate"
                              class="information__input"
                              value=""
                              placeholder="Enter quantity"
                              name="view_asset_quantity_update"
                              type="number"
                          />

                          <span class="input__title in__out__quantity">Stock-in Quantity<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                  </div>
                  <div class="row stock__desc d__none">
                      <div class="input__box">
                          <textarea
                              id="viewAssetQuantityDesc"
                              class="information__input"
                              value=""
                              placeholder="Enter quantity"
                              name="view_asset_quantity_desc"
                              type="number"
                          ></textarea>
                          <span class="input__title stock__title">Reason for Stock-In<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                  </div>
              </div>
              <div class="btn__box__modal">
                  <span class="btn__save__asset btn__primary active d__none" id="editItemBtn">Save Changes</span>
                  <span class="btn__edit__asset btn__primary" id="">Edit</span>
              </div>
          </form>
      </div>
      <!-- Modal to View/Edit Item Consumables -->
      <div id="viewConsumablesModal" class="modal">
          <div class="modal__header">
              <p class="modal__heading">View Consumable Item</p>
          </div>
          <form class="modal__body community__modal" id="updateConsumableForm" method="post"> 
              <div class="row flex__d__col">
                  <div class="row">
                  <input type="hidden" id="consumable_id" name="consumable_id" />

                      <div class="input__box">
                          <input
                              id="viewConsumableName"
                              class="information__input"
                              value=""
                              placeholder="Enter name"
                              name="view_consumable_name"
                              readonly
                          />
                          <span class="input__title">Item name<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                  </div>
                  <div class="row">
                    <div class="input__box">
                      <textarea
                        id="viewConsumableDescription"
                        class="information__input"
                        value=""
                        placeholder="Enter Description"
                        name="view_consumable_description"
                      ></textarea>

                      <span class="input__title"
                        >Description<span class="red__dot">*</span></span
                      >
                      <p class="text-danger"></p>
                    </div>
                  </div>
                  <div class="row">
                      <div class="input__box">
                          <input
                              id="viewItemQuantity"
                              class="information__input"
                              value=""
                              placeholder="Enter quantity"
                              name="view_item_quantity"
                              type="number"
                              readonly
                          />

                          <span class="input__title">Quantity<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                  </div>
                  <div class="row flex stock__radio d__none">
                      <label style="font-weight: 600">Stock Action:</label>
                      <div>
                        <input type="radio" class="btn__stock__in" name="cons_stock_in_out" value="in"> Stock In
                      </div>
                      <div>
                        <input type="radio" class="btn__stock__out" name="cons_stock_in_out" value="out"> Stock Out
                      </div>
                  </div>
                  <div class="row stock__desc d__none">
                      <div class="input__box">
                          <input
                              id="viewItemQuantityUpdate"
                              class="information__input"
                              value=""
                              placeholder="Enter quantity"
                              name="view_item_quantity_update"
                              type="number"
                          />

                          <span class="input__title in__out__quantity">Stock-in Quantity<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                  </div>
                  <div class="row stock__desc d__none">
                      <div class="input__box">
                          <textarea
                              id="viewItemQuantityDesc"
                              class="information__input"
                              value=""
                              placeholder="Enter quantity"
                              name="view_item_quantity_desc"
                              type="number"
                          ></textarea>
                          <span class="input__title stock__title">Reason for Stock-In<span class="red__dot">*</span></span>
                          <p class="text-danger"></p>
                      </div>
                  </div>
              </div>
              <div class="btn__box__modal">
                  <span class="btn__save__consumables btn__primary active d__none" id="editItemBtnConsumable">Save Changes</span>
                  <span class="btn__edit__consumables btn__primary" id="">Edit</span>
              </div>
          </form>
      </div>

      <!-- Create Consumables Modal -->
      <div id="createConsumables" class="modal">
        <div class="modal__header">
          <p class="modal__heading">Register Item</p>
        </div>
        <form class="modal__body community__modal">
          <div class="row flex__d__col">
            <div class="row">
              <div class="input__box">
                <input
                  id="consumableName"
                  class="information__input"
                  value=""
                  placeholder="Enter name"
                  name="item_name"
                />
                <span class="input__title"
                  >Item name<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box asset__qty">
                <input
                  id="itemQuantity"
                  class="information__input"
                  value=""
                  placeholder="Enter quantity"
                  name="item_quantity"
                />

                <span class="input__title"
                  >Quantity<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
            <div class="row">
              <div class="input__box">
                <textarea
                  id="itemDescription"
                  class="information__input"
                  value=""
                  placeholder="Enter Description"
                  name="item_description"
                ></textarea>

                <span class="input__title"
                  >Description<span class="red__dot">*</span></span
                >
                <p class="text-danger"></p>
              </div>
            </div>
          </div>
          <div class="btn__box__modal">
            <span class="btn__primary active btn__register__consumable">Register Item</span>
          </div>
        </form>
      </div>
      <!-- Create Consumables Modal End -->

      <!-- Borrow item modal -->
      <div id="borrowItemModal" class="modal">
          <div class="modal__header">
              <p class="modal__heading">Borrow Item</p>
          </div>
          <form class="modal__body community__modal" id="borrowForm" enctype="multipart/form-data" method="post"> 
              <div class="row flex__d__col">
                  <div class="row">
                    <div class="input__box">
                        <select
                            id="listOfResidents"
                            class="information__input"
                            value=""
                            placeholder="Enter name"
                            name="listOfResidents"
                        >
                        </select>
                        <span class="input__title">Borrower's Fullname<span class="red__dot">*</span></span>
                        <p class="text-danger"></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input__box">
                      <select id="listOfItems" class="information__input" value="" placeholder="Enter name" name="listOfItems"></select>
                      <p id="stockCount" class="mini__text"></p>
                      <span class="input__title">Item<span class="red__dot">*</span></span>
                      <p class="text-danger"></p>
                    </div>
                  </div>
                  <div class="row">                      
                    <div class="input__box">
                      <textarea id="borrowDesc" class="information__input borrow__textarea" value="" placeholder="Enter desc" name="borrowDesc"></textarea>
                      <span class="input__title">Reason<span class="red__dot">*</span></span>
                      <p class="text-danger"></p>
                    </div>
                  </div>
                  <div class="row">                      
                    <div class="input__box">
                      <input id="lendQuantity" class="information__input" value="" placeholder="Enter quantity" name="lendQuantity" type="number" />
                      <span class="input__title">Quantity<span class="red__dot">*</span></span>
                      <p class="text-danger"></p>
                    </div>
                  </div>
                  <div class="row">                      
                    <div class="input__box">
                      <input id="borrowDate" class="information__input" value="" placeholder="Enter quantity" name="borrowDate" type="date" />
                      <span class="input__title">Borrow Date<span class="red__dot">*</span></span>
                      <p class="text-danger"></p>
                    </div>
                  </div>
                  <div class="row">                      
                    <div class="input__box">
                      <input id="returnDate" class="information__input" value="" placeholder="Enter quantity" name="returnDate" type="date" />
                      <span class="input__title">Return Date<span class="red__dot">*</span></span>
                      <p class="text-danger"></p>
                    </div>
                  </div>
              </div>
              <div class="btn__box__modal">
                  <span class="btn__primary" id="lendBtn">Submit</span>
              </div>
          </form>
      </div>
      <!-- Borrow item modal END -->
      <!-- Borrow item modal VIEW -->
      <div id="viewBorrowItemModal" class="modal">
        <div class="modal__header">
            <p class="modal__heading">Borrow Item</p>
        </div>
        <form class="modal__body community__modal" id="viewBorrowForm" enctype="multipart/form-data" method="post"> 
            <div class="row flex__d__col">
                <div class="row">
                    <div class="input__box">
                        <input
                            id="viewLendId"
                            class="information__input"
                            value=""
                            placeholder="Enter name"
                            name="listOfResidents"
                            type="hidden"
                        />
                        <input
                            id="viewListOfResidents"
                            class="information__input"
                            value=""
                            placeholder="Enter name"
                            name="listOfResidents"
                        />
                        </i>
                        <span class="input__title">Borrower's Fullname<span class="red__dot">*</span></span>
                        <p class="text-danger"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input__box">
                        <input id="viewListOfItems" class="information__input" value="" placeholder="Enter name" name="listOfItems"/>
                        <span class="input__title">Item<span class="red__dot">*</span></span>
                        <p class="text-danger"></p>
                    </div>
                </div>
                <div class="row">                      
                    <div class="input__box">
                      <textarea id="viewBorrowDesc" class="information__input borrow__textarea" value="" placeholder="Enter desc" name="viewBorrowDesc" readonly></textarea>
                      <span class="input__title">Reason<span class="red__dot">*</span></span>
                      <p class="text-danger"></p>
                    </div>
                </div>
                <div class="row">                      
                    <div class="input__box">
                        <input id="viewLendQuantity" class="information__input" value="" placeholder="Enter quantity" name="lendQuantity" type="number" />
                        <span class="input__title">Quantity<span class="red__dot">*</span></span>
                        <p class="text-danger"></p>
                    </div>
                </div>
                <div class="row">                      
                    <div class="input__box">
                        <input id="viewDateBorrowed" class="information__input" value="" placeholder="Enter quantity" name="lendDate" />
                        <span class="input__title">Date Borrowed<span class="red__dot">*</span></span>
                        <p class="text-danger"></p>
                    </div>
                </div>
                <div class="row">                      
                    <div class="input__box">
                        <input id="viewDateReturn" class="information__input" value="" placeholder="Enter quantity" name="lendDateReturn" />
                        <span class="input__title">Date of Return<span class="red__dot">*</span></span>
                        <p class="text-danger"></p>
                    </div>
                </div>
            </div>
            <div class="btn__box__modal">
                <span class="btn__primary" id="viewLendBtn">Mark as returned</span>
            </div>
        </form>
    </div>

      <!-- Borrow item modal VIEW END -->
 
      <div class="container">
        <div class="heading__box">
          <div class="tab__container">
            <div class="btn__container tab__1 visible">
              <button class="tab__btn inventory__tab">Inventory (Non-Consumables)</button>
              <div class="active__tab"></div>
            </div>
            <div class="btn__container tab__4">
              <button class="tab__btn consumables__tab">Inventory (Consumables)</button>
              <div class="active__tab"></div>
            </div>
            <div class="btn__container tab__2">
              <button class="tab__btn lending__tab">Lending Item</button>
              <div class="active__tab"></div>
            </div>
            <div class="btn__container tab__3">
              <button class="tab__btn inventory__history__btn">Inventory History</button>
              <div class="active__tab"></div>
            </div>
            <div class="btn__container tab__5">
              <button class="tab__btn inventory__history__cons__btn">Inventory History(Consumables)</button>
              <div class="active__tab"></div>
            </div>
            <div class="btn__container tab__6">
              <button class="tab__btn lending__history__btn">Lending History</button>
              <div class="active__tab"></div>
            </div>
          </div>
        </div>
        <div class="card card__inventory">
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
                Add Item
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
        <!-- Consumables Item Tab -->
        <div class="card consumables__item d__none">
          <div class="heading__container">
            <p class="subheading">Consumables Items</p>
            <div class="button__box">
              <button class="btn__secondary active btn__add__consumables">
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
                Add Item
              </button>
            </div>
          </div>
          <div class="container">
          <table id="consumablesTable" class="display">
            <thead>
              <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Date added</th>
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
                <th>ID</th>
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
        <!-- Inventory History Cons Tab -->
        <div class="card inventory__history__cons d__none">
          <div class="heading__container">
            <p class="subheading">Consumables Inventory History</p>
          </div>
          <div class="container">
          <table id="historyConsumables" class="display">
            <thead>
              <tr>
                <th>ID</th>
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
        <!-- Inventory history Cons Tab ENDS -->

        <!-- Lending Item History Tab -->
        <div class="card lendingTableHistory d__none">
          <div class="heading__container">
            <p class="subheading">Lending History</p>
          </div>
          <div class="container">
          <table id="lendingTableHistory" class="display">
            <thead>
              <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Date Borrowed</th>
                <th>Returned Date</th>
                <th>Borrowed By</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          </div>
        </div>
        <!-- Lending Item History Tab ENDS -->
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
            $('.img__placeholder').addClass("hide");
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

    // For borrower modal
    const listOfResidents = function () {
        $.ajax({
            url: '<?= site_url('admin/fetch-residents') ?>',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                const $select = $('#listOfResidents');
                $select.empty();
                $select.append('<option value="">Choose a resident</option>');
                data.forEach(resident => {
                    $select.append(`<option value="${resident.resident_id}">${resident.fullname}</option>`);
                });
            },
            error: function (xhr, status, error) {
                console.error('Error loading residents:', error);
            }
        });
    };


    const listOfItems = function () {
        $.ajax({
            url: '<?= site_url('admin/fetch-items') ?>',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                const $select = $('#listOfItems');
                $select.empty();
                $select.append('<option value="">Choose an item</option>');

                data.forEach(item => {
                    $select.append(`
                        <option value="${item.item_id}" data-stock="${item.item_quantity}">
                            ${item.item_name}
                        </option>
                    `);
                });
            },
            error: function (xhr, status, error) {
                console.error('Error loading items:', error);
            }
        });
    };

    $('#listOfItems').on('change', function () {
      $('#stockCount').show();
        const selected = $(this).find(':selected');
        const stock = parseInt(selected.attr('data-stock'));
        const $stockCount = $('#stockCount');

        if (!isNaN(stock)) {
            $stockCount.text(`Stocks left: ${stock}`);
            
            // Reset previous classes
            $stockCount.removeClass('low-stock medium-stock high-stock');

            // Apply color class
            if (stock <= 5) {
                $stockCount.addClass('low-stock'); // red
            } else if (stock <= 15) {
                $stockCount.addClass('medium-stock'); // orange
            } else {
                $stockCount.addClass('high-stock'); // green
            }
        } else {
            $stockCount.text('');
        }
    });



    $(document).ready(function () {
        listOfResidents();
        listOfItems();
    });


    // for borrower modal end

    // Call createItem() when button is clicked
    $('.btn__register__item').on('click', function (e) {
        e.preventDefault();
        
        const file = $fileInput[0].files[0];
        const assetName = $('#assetName').val();  // Change to #assetName, since that's the ID in your HTML
        const assetQuantity = $('#assetQuantity').val();
        const assetDescription = $('#assetDescription').val();
        
        if (!file) { openErrorDisplay('Please select an image before proceeding.'); return; }
        if (!assetName) { openErrorDisplay('Item name is missing!.'); return }
        if (!assetQuantity) { openErrorDisplay('Item quantity is required!.'); return }
        if (!assetDescription) { openErrorDisplay('Item description is required!.'); return }
        
        createItem(file, assetName, assetQuantity, assetDescription);
    });

    function viewItem(itemId) {
    $.ajax({
        url: '<?= site_url('admin/get-item-details') ?>',
        type: 'GET',
        data: { item_id: itemId },
        success: function(response) {
          saveAction("Viewed an item");
            if (response.status === 'success') {
                $('#item_id').val(response.data.item_id);
                $('#viewAssetName').val(response.data.item_name);
                $('#viewAssetDescription').val(response.data.item_description);
                $('#viewAssetQuantity').val(response.data.item_quantity); 
                $('#viewItemImage').attr('src', '/uploads/inventory/' + response.data.image);

                let originalStock = parseInt(response.data.item_quantity) || 0;
                let currentStock = originalStock;

                $('#viewAssetQuantityUpdate').off('input').on('input', function() {
                    let rawValue = $(this).val().replace(/[^0-9]/g, '');
                    $(this).val(rawValue); // restrict to digits only

                    let enteredValue = rawValue === '' ? 0 : parseInt(rawValue);
                    if (isNaN(enteredValue)) enteredValue = 0;

                    let stockAction = $('input[name="stock_in_out"]:checked').val();

                    if (stockAction === 'out' && enteredValue > originalStock) {
                        $(this).val(originalStock);
                        enteredValue = originalStock;
                        alert('Cannot stock out more than available quantity.');
                    }

                    if (stockAction === 'in') {
                        currentStock = originalStock + enteredValue;
                    } else if (stockAction === 'out') {
                        currentStock = originalStock - enteredValue;
                    }

                    $('#viewAssetQuantity').val(currentStock);

                    if (rawValue === '') {
                        $('#viewAssetQuantity').val(originalStock);
                        currentStock = originalStock;
                    }
                });
            } else {
                alert('Failed to load item details');
            }
        },
        error: function() {
            alert('An error occurred while fetching the item details');
        }
    });
}





    // Open modal and populate data (this should be defined before DataTable initialization)
//     function viewItem(itemId) {
//     $.ajax({
//         url: '',
//         type: 'GET',
//         data: { item_id: itemId },
//         success: function(response) {
//             if (response.status === 'success') {
//                 $('#item_id').val(response.data.item_id);
//                 $('#viewAssetName').val(response.data.item_name);
//                 $('#viewAssetDescription').val(response.data.item_description);
//                 $('#viewAssetQuantity').val(response.data.item_quantity);
//                 $('#viewItemImage').attr('src', '/uploads/inventory/' + response.data.image);
//                 $('#current_image').val(response.data.image);
                
//                 // Reset the file input to make sure it's clear
//                 $('#viewFileInput').val('');
                
//                 $('#viewItemModal').show();
//             } else {
//                 alert('Error: ' + response.message);
//             }
//         },
//         error: function(xhr, status, error) {
//             console.log('Error fetching item details:', error);
//         }
//     });
// }

    // Initialize DataTable
    const loadInventory = function () {
    // Check if the DataTable is already initialized and destroy it
    if ($.fn.DataTable.isDataTable('#inventoryTable')) {
        $('#inventoryTable').DataTable().clear().destroy();
    }

    // Reinitialize DataTable after destruction
    $('#inventoryTable').DataTable({
        ajax: {
            url: '<?= site_url('admin/inventory-data') ?>',
            type: 'GET',
            dataSrc: '',
            error: function (xhr, status, error) {
                console.log('Error fetching inventory data:', error);
            }
        },
        columns: [
            { data: 'item_name', title: 'Item Name' },
            { data: 'item_description', title: 'Item Desc' },
            { data: 'item_quantity', title: 'Quantity' },
            {
                data: 'image',
                render: function (data, type, row) {
                    const imagePath = data ? '/uploads/inventory/' + data : '/path/to/default/image.jpg';
                    return '<img src="' + imagePath + '" alt="' + row.item_name + '" style="width: 50px; height: 50px; object-fit: cover;">';
                },
                title: 'Image'
            },
            
            {
                data: null,
                render: function (data, type, row) {
                    return '<button class="btn btn__view view-item-btn" data-item-id="' + row.item_id + '">View</button>';
                },
                title: 'Action'
            }
        ],
        // Optionally you can add other settings like pagination, sorting, etc.
        order: [[0, 'desc']],
        paging: true,
        ordering: true,
        searching: true
    });
};


const markAsReturned = function () {
    let lendId = $('#viewLendId').val();  

    if (!lendId) {
        alert('Invalid lending record');
        return;
    }

    $.ajax({
        url: "<?= site_url('/admin/update-lending-status') ?>",  
        type: 'POST',
        data: {
            lendId: lendId,
            status: 2 // Status for "returned"
        },
        beforeSend: function () {
            $('#lendBtn').prop('disabled', true).text('Processing...'); // Disable button during the request
        },
        success: function (response) {
          saveAction("Mark as returned");

            console.log('Response:', response);
            if (response.status === 'success') {
                alert('Lending marked as returned and inventory updated!');
                $('#viewBorrowItemModal').removeClass('open'); // Close the modal after success
            } else {
                alert('Failed to mark as returned: ' + response.message); 
            }
            loadLendingHistory();  // Reload lending history after success
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
            alert('An error occurred while updating the lending status.');
        },
        complete: function () {
            $('#lendBtn').prop('disabled', false).text('Submit');  // Re-enable button after the request completes
            loadLendingHistory();  // Reload lending history (in case of any error)
            $('#viewBorrowItemModal').removeClass("open");  // Close the modal
            $('.wrapper').removeClass("open");  // Close the wrapper
        }
    });
};





$('#viewLendBtn').on("click", function () {
    markAsReturned();  
});

const loadLendingHistory = function() {
    if ($.fn.DataTable.isDataTable('#lendingTable')) {
        $('#lendingTable').DataTable().clear().destroy();
    }

    $('#lendingTable').DataTable({
        ajax: {
            url: '<?= site_url('admin/lend-items') ?>',
            type: 'GET',
            dataSrc: '',
            error: function (xhr, status, error) {
                console.log('Error fetching lending data:', error);
            }
        },
        columns: [
            { data: 'borrower_name', title: 'Borrower' },
            { data: 'item_name', title: 'Item Name' },
            { data: 'borrowed_quantity', title: 'Quantity' },
            { data: 'date_borrowed', title: 'Date Borrowed' },
            { data: 'date_of_return', title: 'Date of Return' },
            { data: 'house_no', title: 'House No' },
            {
                data: 'date_of_return',
                title: 'Status',
                render: function(data, type, row) {
                    const today = new Date().toLocaleDateString('en-CA'); // Local date in YYYY-MM-DD
                    const returnDate = row.date_of_return;
                    let statusClass = '';
                    let statusText = '';
                    let statusValue = 2;  // Default to Ongoing

                    if (returnDate < today) {
                        statusClass = 'overdue';
                        statusText = 'Overdue';
                        statusValue = 0;  // Highest priority for overdue
                    } else if (returnDate === today) {
                        statusClass = 'due__today';
                        statusText = 'Due Today';
                        statusValue = 1;  // Medium priority
                    } else {
                        statusClass = 'ongoing';
                        statusText = 'Ongoing';
                        statusValue = 2;  // Lowest priority
                    }

                    row.statusValue = statusValue;  // Add status value for sorting
                    return `<span class="${statusClass}">${statusText}</span>`;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return `<button class="btn btn__view view__lending__btn" data-id="${row.id}" data-item="${row.item_id}">View</button>`;
                },
                title: 'Action'
            }
        ],
        order: [
            [6, 'asc'], // Sort by 'statusValue' (column index 6 for status sorting)
            [3, 'desc'] // Then by 'Date Borrowed'
        ]
    });
};




    loadInventory();



  const newLending = function () {
    let form = $('#borrowForm')[0];
    let formData = new FormData(form);

    // Get the selected Item's ID and Name
    let itemID = $('#listOfItems').val();  // Get the selected item's ID
    let itemName = $('#listOfItems option:selected').text();  // Get the selected item's name

    // Add itemName to the FormData
    formData.append('item_name', itemName);

    // Log values from the formData
    console.log('Item ID:', itemID);
    console.log('Item Name:', itemName);
    console.log('Quantity:', formData.get('lendQuantity'));

    $.ajax({
        url: "<?= site_url('/admin/new-lending') ?>",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('#lendBtn').prop('disabled', true).text('Submitting...');
        },
        success: function (response) {
          saveAction("Created a new lending");

            console.log('Response:', response);
            if (response.message) {
                  alert(response.message);
              } else {
                  alert('Lending recorded successfully!');
              }
        },
        error: function (xhr, status, error) {
            console.error('Error response:', xhr.responseText);

            // Handle specific error cases based on the response
            try {
                // Parse the response if it's JSON
                const response = JSON.parse(xhr.responseText);
                
                if (response.message) {
                    // Display the message from the backend
                    alert(response.message);
                } else {
                    // Generic error message
                    alert('An error occurred while submitting.');
                }
            } catch (e) {
                // If the response is not JSON, just show a general error
                alert('An error occurred while submitting.');
            }
        },
        complete: function () {
            $('#lendBtn').prop('disabled', false).text('Submit');
            $('#borrowForm')[0].reset(); 
            loadLendingHistory();
            $('#borrowItemModal').removeClass("open");  // Close the modal
            $('.wrapper').removeClass("open");  // Close the wrapper
            listOfItems();
        }
    });
};



$(document).on("click", ".view__lending__btn", function () {
  const recordId = $(this).data("id");

  $('#viewBorrowItemModal').addClass("open");
  $('.wrapper').addClass("open");

  $.ajax({
    url: "/admin/view-lent-items",
    method: "POST",
    data: { id: recordId },
    dataType: "json",
    success: function (res) {
      $('#viewLendId').val(res.id).prop('disabled', true);
      $('#viewListOfResidents').val(res.borrower_fullname).prop('disabled', true);
      $('#viewListOfItems').val(res.item_name).prop('disabled', true);
      $('#viewLendQuantity').val(res.borrowed_quantity).prop('readonly', true);
      $('#viewDateBorrowed').val(res.date_borrowed).prop('readonly', true);
      $('#viewDateReturn').val(res.date_of_return).prop('readonly', true);
      $('#viewBorrowDesc').val(res.borrower_desc).prop('readonly', true);

      // $('#viewLendBtn').hide();
    },
    error: function (xhr) {
      console.error("Error loading lending data:", xhr.responseText);
    }
  });
});




$('#lendBtn').on('click', function () {
    newLending();
});


        // Upload data + image
      const createItem = function(file, assetName, assetQuantity, assetDescription) {
        let formData = new FormData();
        formData.append('image', file);
        formData.append('item_name', assetName);
        formData.append('item_quantity', assetQuantity);
        formData.append('item_description', assetDescription); //This is a text area.

        $.ajax({
            url: "<?= site_url('/admin/create-item') ?>",  
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false, // Required for file uploads
            processData: false, // Prevent jQuery from processing data
            beforeSend: function () {
                $(".text-danger").text(""); // Clear previous error messages
            },
            success: function (response) {
              saveAction("Created an item");

                if (response.status == "success") {
                  $(".success__indicator").removeClass("hide");
                    $(".indicator__text").html('Item created!');
                    setTimeout(function () {
                        $(".success__indicator").addClass("hide");
                    }, 3000);
                    $('#registerItemModal').removeClass('open');
                    $('.wrapper').removeClass('open');
                    loadInventory();
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
                                    // Success handler

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


    $('#inventoryTable').on('click', '.view-item-btn', function() {
        const itemId = $(this).data('item-id');  
        viewItem(itemId);  
        $('#viewItemModal').addClass('open');
        $('.wrapper').addClass('open');
        $('.stock__radio').addClass("d__none");
        $('#editItemBtn').addClass("d__none");
        $('.stock__desc').addClass("d__none");
        $('.btn__edit__asset').removeClass("d__none");
        
    });
    // EDIT HERE
    // View consumable
    $(document).on('click', '.view__consumable__btn', function () {
    const consumableId = $(this).data('id');
    $('#consumable_id').val(consumableId);

    $.ajax({
        url: '/admin/get-consumable/' + consumableId,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                const data = response.data;

                $('#viewConsumableName').val(data.item_name);
                $('#viewConsumableDescription').val(data.item_description);
                $('#viewItemQuantity').val(data.item_quantity);

                $('#viewConsumablesModal').addClass('open');
                $('.wrapper').addClass('open');
                let originalStock = parseInt($('#viewItemQuantity').val()) || 0; 
                let currentStock = originalStock; 
                $('#viewItemQuantityUpdate').off('input').on('input', function() {
                  let rawValue = $(this).val().replace(/[^0-9]/g, ''); 
                  $(this).val(rawValue); 

                  let enteredValue = rawValue === '' ? 0 : parseInt(rawValue);
                  if (isNaN(enteredValue)) enteredValue = 0;

                  let stockAction = $('input[name="cons_stock_in_out"]:checked').val(); 

                  if (stockAction === 'out' && enteredValue > currentStock) {
                      $(this).val(currentStock); 
                      enteredValue = currentStock;
                      alert('Cannot stock out more than available quantity.');
                  }

                  if (stockAction === 'in') {
                      currentStock = originalStock + enteredValue;
                  } else if (stockAction === 'out') {
                      currentStock = originalStock - enteredValue;
                  }

                  $('#viewItemQuantity').val(currentStock);

                  if (rawValue === '') {
                      $('#viewItemQuantity').val(originalStock);
                      currentStock = originalStock;
                  }
              });



            } else {
                alert('Item not found.');
            }
        },
        error: function () {
            alert('Failed to fetch data.');
        }
    });
});


// Update consumable
  $('#editItemBtnConsumable').on('click', function () {
    console.log($('#updateConsumableForm').serialize()); // Log the data being sent
    const id = $('#consumable_id').val();

    $.ajax({
        url: '/admin/update-consumable',
        type: 'POST',
        dataType: 'json',
        data: $('#updateConsumableForm').serialize(),
        success: function (response) {
            if (response.success) {
                alert('Updated!');
                $('#viewConsumablesModal').removeClass('open');
                getConsumables(); // Refresh DataTable
            } else {
                alert(response.message);
            }
        },
        error: function () {
            alert('Update failed.');
        }
    });
});
// Get all consumable history
$(document).on('click', '.inventory__history__cons__btn', function () {
    $.ajax({
        url: '/admin/get-all-consumable-history', 
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                const data = response.data;

                // Show the inventory history section
                $('.inventory__history__cons').removeClass('d__none');

                // Initialize the DataTable if not already initialized
                if (!$.fn.dataTable.isDataTable('#historyConsumables')) {
                    $('#historyConsumables').DataTable({
                        destroy: true, // Destroy any existing instance before reinitializing
                        data: data,    // Pass the history data to the table
                        columns: [
                            { data: 'id' },
                            { data: 'item_name' },
                            { data: 'type' },
                            { data: 'quantity' },
                            { data: 'old_quantity' },
                            { data: 'new_quantity' },
                            { data: 'updated_by' },
                            { data: 'in_out_reason' }
                        ],
                        order: [[0, 'desc']] // Ensure the table is ordered by the ID (or created_at if available) in descending order
                    });
                } else {
                    // If DataTable is already initialized, just update the data
                    var table = $('#historyConsumables').DataTable();
                    table.clear().rows.add(data).draw();
                }
            } else {
                alert('No history found.');
            }
        },
        error: function () {
            alert('Failed to fetch consumable history.');
        }
    });
});



  $('.btn__edit__consumables').on('click', function () {
      $('#viewConsumableName, #viewItemQuantity, #viewConsumableDescription').prop('readonly', false);
      $('.stock__radio').removeClass('d__none');
      $('#editItemBtnConsumable').removeClass('d__none');
      $(this).addClass('d__none');
  });


    $('.close').on('click', function() {
        $('#viewItemModal').hide();
    });


$('.btn__stock__in').on('click', function(){
  $('.stock__desc').removeClass("d__none");
  $('.stock__title').html("Reason for Stock-In");
  $('.in__out__quantity').html("Stock-in Quantity");
});
$('.btn__stock__out').on('click', function(){
  $('.stock__desc').removeClass("d__none");
  $('.stock__title').html("Reason for Stock-Out");
  $('.in__out__quantity').html("Stock-out Quantity");

});

$('#editItemBtn').on('click', function(e) {
    e.preventDefault();
    updateItem();
});

$('.inventory__tab').on('click',function(){
  loadInventory();
  loadLendingHistory();
});

$('#viewItemImage').on('click', function() {
    $('#viewFileInput').click();
});


$('#viewFileInput').on('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#viewItemImage').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    }
});

const activateAssetInputs = function () {
  $('#viewAssetName').removeAttr("readonly");
  // $('#viewAssetQuantity').removeAttr("readonly");

  $('#viewItemImage').css({
    'pointer-events': '',
    'cursor': 'pointer',
    'opacity': ''
  });
}

const restrictAssetInputs = function() {
  $('#viewAssetName').attr("readonly");
  $('#viewAssetQuantity').attr("readonly");

  $('#viewItemImage').css({
    'pointer-events': 'none',
    'cursor': 'default',
    'opacity': 0.6 
  });
}
$('.btn__edit__asset').on("click", function(){
  $('.btn__save__asset').removeClass("d__none");
  $('.stock__radio').removeClass("d__none");
  $('.stock__desc').removeClass("d__none");
  $('.btn__edit__asset').addClass("d__none");
  
  activateAssetInputs();
});

$('.view-item-btn').on('click', function () {
    const form = $('#updateItemForm');
    restrictAssetInputs(); // For Viewing modal
    form.find('input').prop('disabled', true);

    $('#viewItemImage').css({
        'pointer-events': 'none',
        'cursor': 'default',
        'opacity': 0.7 
    });

    form.find('.bi-plus, .bi-dash-lg').css('pointer-events', 'none').css('opacity', 0.5);
});

const addQuantity = function (inputSelector) {
  const input = $(inputSelector);
  const currentVal = parseInt(input.val()) || 0;
  input.val(currentVal + 1);
};

const lessQuantity = function (inputSelector) {
  const input = $(inputSelector);
  const currentVal = parseInt(input.val()) || 0;
  if (currentVal > 0) {
      input.val(currentVal - 1);
  }
};

    // For View/Update modal
    $('.bi-plus').on('click', function () {
        addQuantity('#viewAssetQuantity');
    });

    $('.bi-dash-lg').on('click', function () {
        lessQuantity('#viewAssetQuantity');
    });

    // For Create modal
    $('.icon__counter__add').on('click', function () {
        addQuantity('#assetQuantity');
    });

    $('.icon__counter__remove').on('click', function () {
        lessQuantity('#assetQuantity');
    });



function updateItem() {
    // Get form elements
    const formElement = document.getElementById('updateItemForm');
    const fileInput = document.getElementById('viewFileInput');
    
    const formData = new FormData(formElement);
    
    if (fileInput.files.length > 0) {
        console.log("File selected:", fileInput.files[0].name);
        formData.append('image_file', fileInput.files[0]);
    } else {
        console.log("No file selected");
    }
    
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    
    $.ajax({
        url: '<?= site_url('admin/update-item') ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          saveAction("Updated an item");

            console.log("Response:", response);
            if (response.status === 'success') {
                $('#viewItemModal').removeClass('open');
                $('.wrapper').removeClass('open');
                $('#inventoryTable').DataTable().ajax.reload();
                // Success handler
                $(".success__indicator").removeClass("hide");
                $(".indicator__text").html('Item updated!');
                setTimeout(function () {
                    $(".success__indicator").addClass("hide");
                }, 3000);
            } else {
                alert('Error: ' + (response.message || 'Failed to update item'));
            }
        },
        error: function(xhr, status, error) {
            console.log('Error updating item:', xhr.responseText);
            alert('Error updating item. Please try again.');
        }
    });
}

const inventoryHistory = function() {
    // Make an AJAX request to fetch inventory history data
    $.ajax({
        url: '/admin/inventory-history', // Endpoint to get the inventory history
        type: 'GET', // HTTP method
        dataType: 'json', // Expect JSON data in response
        success: function(response) {
            // Check if there is any data to display
            if (response.length > 0) {
                // Destroy and re-initialize DataTable to avoid duplication on refresh
                if ($.fn.dataTable.isDataTable('#lendingHistory')) {
                    $('#lendingHistory').DataTable().clear().destroy();
                }

                // Empty the table body before appending new rows
                $('#lendingHistory tbody').empty();

                // Loop through the response data and create table rows
                response.forEach(item => {
                    const row = `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.item_name}</td>
                            <td>${item.type}</td>
                            <td>${item.quantity}</td>
                            <td>${item.old_quantity}</td>
                            <td>${item.new_quantity}</td>
                            <td>${item.updated_by}</td>
                            <td>${item.in_out_reason}</td>
                        </tr>
                    `;
                    $('#lendingHistory tbody').append(row);
                });

                // Re-initialize DataTable to apply features like sorting, pagination, etc.
                $('#lendingHistory').DataTable({
                    "order": [[0, 'desc']] // Change 0 to the index of the column you want to sort
                });
            } else {
                // Show a message when no data is found
                $('#lendingHistory tbody').append('<tr><td colspan="6">No data found.</td></tr>');
            }
        },
        error: function(xhr, status, error) {
            // Log any errors that occur during the AJAX request
            console.error('Error fetching inventory history: ', error);
        }
    });
};

// Load consumables
function getConsumables() {
    if ($.fn.dataTable.isDataTable('#consumablesTable')) {
        $('#consumablesTable').DataTable().destroy();
    }

    $('#consumablesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/admin/get-consumables', 
            type: 'GET',
            dataType: 'json',
            dataSrc: 'data', 
        },
        columns: [
            { title: "Item Name", data: "item_name" },
            { title: "Quantity", data: "item_quantity" },
            { title: "Date Added", data: "created_at" },
            {
                title: "Action",
                data: null,
                render: function(data, type, row) {
                    return `<button class="btn__primary view__consumable__btn action-btn" data-id="${row.id}">View</button>`;
                },
                orderable: false
            }
        ],
        columnDefs: [
            {
                targets: 2,
                render: function(data, type, row) {
                    return new Date(data).toLocaleDateString();
                }
            }
        ],
        order: [[2, 'desc']], 
        pagingType: "simple_numbers",
        autoWidth: false,
        responsive: true,
        language: {
            emptyTable: "No consumables found"
        }
    });
};
getConsumables();
$('.consumables__tab').on("click", function() {
    getConsumables();
  })
// Create Consumables

const createConsumables = function() {
    const consumableName = $("#consumableName").val();
    const itemQuantity = $("#itemQuantity").val();
    const itemDescription = $("#itemDescription").val();

    $.ajax({
        url: "/admin/create-consumables",
        type: "POST",
        dataType: "json",
        data: {
            item_name: consumableName,
            item_quantity: itemQuantity,
            item_description: itemDescription
        },
        success: function(response) {
            if (response.success) {
                alert(response.message); // Success message
                // You can also reset the form or do something else here
            } else {
                alert(response.message); // Error message
            }
        },
        error: function(xhr, status, error) {
            alert('Error: ' + error);
        }
    });
};

const getLendingHistory = function () {
  $.ajax({
    url: '/admin/get-lending-history',
    method: 'GET',
    dataType: 'json',
    success: function (response) {
      const table = $('#lendingTableHistory');

      // Destroy existing DataTable (if exists) before doing anything else
      if ($.fn.DataTable.isDataTable('#lendingTableHistory')) {
        table.DataTable().clear().destroy();
      }

      // Add fullName to the response data
      response.forEach(row => {
        row.fullName = `${row.firstname} ${row.middlename} ${row.lastname}`;
      });

      // Initialize DataTable with the modified data
      table.DataTable({
        order: [[0, 'desc']],
        "paging": true, // Enable paging if needed
        "searching": true, // Enable searching if needed
        "data": response, // Set data to DataTable
        "columns": [
          { "data": "id" },
          { "data": "item_name" },
          { "data": "borrowed_quantity" },
          { "data": "date_borrowed" },
          { "data": "updated_at", "defaultContent": "—" }, // For returned date
          { "data": "fullName" }, // Reference fullName
          { "data": null, "defaultContent": '<span class="return">Returned</span>' } // Action column
        ]
      });

      if (response.length === 0) {
        // If no data, update the message in DataTable
        const tbody = table.find('tbody');
        tbody.append('<tr><td colspan="7">No history found.</td></tr>');
      }
    },
    error: function () {
      alert('Failed to fetch lending history.');
    }
  });
};


$('.lending__history__btn').on("click", function() {
getLendingHistory();

})



getLendingHistory();
// Event listener for form submission
$(".btn__register__consumable").on("click", function() {
    createConsumables();
});




// Lending table
$('.lending__tab').on('click', function () {
  loadLendingHistory();
});
// Lending table
$('.inventory__history__btn').on('click', function () {
  inventoryHistory();
});



});

$(document).ready(function () {
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

  $(".btn__add__consumables").on("click", function () {
    $(".wrapper").addClass("open");
    $("#createConsumables").addClass("open");
  });

  // Close on wrapper click or close button
  $(".wrapper, .btn__close").on("click", function () {
    $(".wrapper").removeClass("open");
    $("#registerItemModal").removeClass("open");
    $("#viewItemModal").removeClass("open");
    $("#borrowItemModal").removeClass("open");
    $("#viewBorrowItemModal").removeClass("open");
    $("#createConsumables").removeClass("open");
    $("#viewConsumablesModal").removeClass("open");

  });

  // Close on Escape key
  $(document).on("keydown", function (event) {
    if (event.key === "Escape") {
      $(".wrapper").removeClass("open");
      $("#registerItemModal").removeClass("open");
      $("#createConsumables").removeClass("open");
    $("#viewConsumablesModal").removeClass("open");

      $("#viewItemModal").removeClass("open");
      $("#borrowItemModal").removeClass("open");
    $("#viewBorrowItemModal").removeClass("open");

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
    $(".tab__4").removeClass("visible");
    $(".tab__5").removeClass("visible");
    $(".tab__6").removeClass("visible");
    $('.lending__items ').addClass('d__none');
    $('.inventory__history').addClass('d__none');
    $('.card__inventory ').removeClass('d__none');
    $('.consumables__item').addClass('d__none');
    $('.inventory__history__cons').addClass('d__none');
    $('.lendingTableHistory ').addClass('d__none');

  });

  $(".tab__2").on("click", function () {
    $(".tab__2").addClass("visible");
    $(".tab__1").removeClass("visible");
    $(".tab__3").removeClass("visible");
    $(".tab__4").removeClass("visible");
    $(".tab__5").removeClass("visible");
    $(".tab__6").removeClass("visible");
    $('.lending__items ').removeClass('d__none');
    $('.inventory__history').addClass('d__none');
    $('.card__inventory ').addClass('d__none');
    $('.consumables__item').addClass('d__none');
    $('.inventory__history__cons').addClass('d__none');
    $('.lendingTableHistory ').addClass('d__none');


  });
  $(".tab__3").on("click", function () {
    $(".tab__2").removeClass("visible");
    $(".tab__1").removeClass("visible");
    $(".tab__3").addClass("visible");
    $(".tab__4").removeClass("visible");
    $(".tab__5").removeClass("visible");
    $(".tab__6").removeClass("visible");
    $('.inventory__history__cons').addClass('d__none');


    $('.lending__items ').addClass('d__none');
    $('.card__inventory ').addClass('d__none');
    $('.inventory__history').removeClass('d__none');
    $('.consumables__item').addClass('d__none');
    $('.lendingTableHistory ').addClass('d__none');

    inventoryHistory();
  });
  $(".tab__4").on("click", function () {
    $(".tab__2").removeClass("visible");
    $(".tab__1").removeClass("visible");
    $(".tab__3").removeClass("visible");
    $(".tab__5").removeClass("visible");
    $(".tab__6").removeClass("visible");
    $(".tab__4").addClass("visible");
    $('.inventory__history__cons').addClass('d__none');

    $('.lending__items ').addClass('d__none');
    $('.card__inventory ').addClass('d__none');
    $('.inventory__history').addClass('d__none');
    $('.consumables__item').removeClass('d__none');
    $('.lendingTableHistory ').addClass('d__none');
    

  });
  $(".tab__5").on("click", function () {
    $(".tab__2").removeClass("visible");
    $(".tab__1").removeClass("visible");
    $(".tab__3").removeClass("visible");
    $(".tab__4").removeClass("visible");
    $(".tab__6").removeClass("visible");

    $(".tab__5").addClass("visible");

    $('.lending__items ').addClass('d__none');
    $('.card__inventory ').addClass('d__none');
    $('.inventory__history').addClass('d__none');
    $('.consumables__item').addClass('d__none');
    $('.inventory__history__cons').removeClass('d__none');
    $('.lendingTableHistory ').addClass('d__none');


  });
  $(".tab__6").on("click", function () {
    $(".tab__2").removeClass("visible");
    $(".tab__1").removeClass("visible");
    $(".tab__3").removeClass("visible");
    $(".tab__4").removeClass("visible");
    $(".tab__6").removeClass("visible");

    $(".tab__5").removeClass("visible");
    $(".tab__6").addClass("visible");

    $('.lending__items ').addClass('d__none');
    $('.card__inventory ').addClass('d__none');
    $('.inventory__history').addClass('d__none');
    $('.consumables__item').addClass('d__none');
    $('.inventory__history__cons').addClass('d__none');
    $('.lendingTableHistory ').removeClass('d__none');
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
