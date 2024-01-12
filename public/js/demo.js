"use strict";

// login
$(".login__entry .login__foot .login__link").on("click", function (e) {
  e.preventDefault();
  $(".login__entry").hide();
  $(".login__registration").show();
});
$(".login__registration .login__foot .login__link, .login__registration .login__back").on("click", function (e) {
  e.preventDefault();
  $(".login__registration").hide();
  $(".login__entry").show();
});
$(".login__entry .login__line .login__link").on("click", function (e) {
  e.preventDefault();
  $(".login__entry").hide();
  $(".login__password").show();
});
$(".login__box .login__button").on("click", function () {
  $(this).parents(".login__box").hide();
  $(this).parents(".login__box").next().show();
});
$(".login__box .login__back").on("click", function () {
  $(this).parents(".login__box").hide();
  $(this).parents(".login__box").prev().show();
});
$(".login__box:last-child .login__button, .login__box:first-child .login__back").on("click", function () {
  $(".login__box, .login__password").hide();
  $(".login__box:nth-child(1)").show();
  $(".login__entry").show();
});

// transactions
(function () {
  $(".transactions__top .checkbox__input").on("click", function () {
    if ($(this).is(":checked")) {
      $(this).parents(".transactions__table").find(".transaction .checkbox__input").prop("checked", true).attr("checked", "checked");
    } else {
      $(this).parents(".transactions__table").find(".transaction .checkbox__input").prop("checked", false).removeAttr("checked");
    }
  });
})();