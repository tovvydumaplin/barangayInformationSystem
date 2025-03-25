const openErrorDisplay = function (message) {
  $(".error__text").html(message);
  $(".error__display").removeClass("hide");
};
const closeErrorDisplay = function () {
  $(".error__display").addClass("hide");
};

const openValidator = function () {
  $(".validator").removeClass("hide");
};
const closeValidator = function () {
  $(".validator").addClass("hide");
};
const openModal = function () {
  $(".wrapper").addClass("open");
  $("#viewResidentModal").addClass("open");
};

$(".validator__icon").on("click", function () {
  // Close validator
  closeValidator();
});
$(".validator__cancel").on("click", function () {
  // Close validator
  closeValidator();
});
$(".error__close").on("click", function () {
  closeErrorDisplay();
});

$(".btn__add__resident").on("click", function () {
  $(".wrapper").addClass("open");
  $("#addResidentModal").addClass("open");
});

$(".wrapper").on("click", function () {
  $(".wrapper, #viewResidentModal, #addResidentModal").removeClass("open");
  closeErrorDisplay();
  closeValidator();
});

$(".btn__close").on("click", function () {
  $(".wrapper, #viewResidentModal, #addResidentModal").removeClass("open");
  closeErrorDisplay();
  closeValidator();
});

$(document).on("keydown", function (event) {
  if (event.key === "Escape") {
    $(".wrapper, #viewResidentModal, #addResidentModal").removeClass("open");
    closeErrorDisplay();
    closeValidator();
  }
});

$(".menu__icon").on("click", function () {
  $("body").toggleClass("hide__sidebar");
  $(".nav__heading").toggleClass("d__none");
});

$(".user__box").on("click", function () {
  $(".dropdown__menu").toggleClass("show");
});
