"use strict";

// check if touch device
function isTouchDevice() {
  var prefixes = " -webkit- -moz- -o- -ms- ".split(" ");
  var mq = function (query) {
    return window.matchMedia(query).matches;
  };
  if ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch) {
    return true;
  }
  var query = ["(", prefixes.join("touch-enabled),("), "heartz", ")"].join("");
  return mq(query);
}
if (isTouchDevice()) {
  $("body").addClass("touch-device");
}

// header
(function () {
  const header = $(".header"),
    burger = header.find(".header__burger"),
    close = header.find(".header__close"),
    wrap = header.find(".header__wrap"),
    overlay = header.find(".header__overlay"),
    box = header.find(".header__box"),
    openSearch = header.find(".header__search-open"),
    openClose = header.find(".header__search-close"),
    notification = header.find(".notification"),
    button = notification.find(".notification__button"),
    body = notification.find(".notification__body");
  button.on("click", function (e) {
    e.stopPropagation();
    notification.toggleClass("active");
  });
  body.on("click", function (e) {
    e.stopPropagation();
  });
  $("html, body").on("click", function () {
    notification.removeClass("active");
  });
  burger.on("click", function () {
    wrap.addClass("visible");
    overlay.addClass("visible");
    scrollLock.disablePageScroll();
  });
  close.on("click", function () {
    wrap.removeClass("visible");
    overlay.removeClass("visible");
    scrollLock.enablePageScroll();
  });
  overlay.on("click", function () {
    wrap.removeClass("visible");
    overlay.removeClass("visible");
    scrollLock.enablePageScroll();
  });
  openSearch.on("click", function () {
    box.addClass("visible");
  });
  openClose.on("click", function () {
    box.removeClass("visible");
  });
})();

// field view password
(function () {
  const fields = $(".field");
  fields.each(function () {
    let field = $(this),
      input = field.find(".field__input"),
      button = field.find(".field__view");
    button.on("click", function () {
      button.toggleClass("active");
      if (button.hasClass("active")) {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
      console.log(typeInput);
    });
  });
})();

// sliders
(function () {
  // swiper contacts three
  const swiperContactsThree = new Swiper(".swiper-contacts-three", {
    slidesPerView: 3,
    speed: 500,
    watchSlidesProgress: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    breakpoints: {
      320: {
        slidesPerView: 2
      },
      768: {
        slidesPerView: 3
      }
    }
  });

  // swiper contacts four
  const swiperContactsFour = new Swiper(".swiper-contacts-four", {
    slidesPerView: 4,
    speed: 500,
    watchSlidesProgress: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    breakpoints: {
      320: {
        slidesPerView: 2
      },
      768: {
        slidesPerView: 4
      },
      1024: {
        slidesPerView: 4
      },
      1260: {
        slidesPerView: 3
      },
      1420: {
        slidesPerView: 4
      }
    }
  });
})();

// dateRangePicker
(function () {
  const dateRange = $(".js-date-range");
  if (dateRange.length) {
    dateRange.each(function () {
      const _this = $(this),
        singleMonth = _this.data("single-month"),
        singleDate = _this.data("single-date"),
        format = _this.data("format"),
        container = _this.data("container");
      _this.dateRangePicker({
        language: "en",
        inline: false,
        autoClose: true,
        format: format,
        separator: " - ",
        showShortcuts: false,
        container: container,
        singleDate: singleDate,
        singleMonth: singleMonth,
        showTopbar: false,
        stickyMonths: true,
        hoveringTooltip: false,
        alwaysOpen: false,
        customArrowPrevSymbol: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M14.207 7.793a1 1 0 0 1 0 1.414L11.414 12l2.793 2.793a1 1 0 0 1-1.414 1.414l-3.5-3.5a1 1 0 0 1 0-1.414l3.5-3.5a1 1 0 0 1 1.414 0z" fill="#777e91"/></svg>',
        customArrowNextSymbol: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M9.793 7.793a1 1 0 0 0 0 1.414L12.586 12l-2.793 2.793a1 1 0 0 0 1.414 1.414l3.5-3.5a1 1 0 0 0 0-1.414l-3.5-3.5a1 1 0 0 0-1.414 0z" fill="#777e91"/></svg>',
        setValue: function (s) {
          if ($(this).attr("readonly")) {
            $(this).val(s);
          } else {
            $(this).val(s);
          }
        },
        customOpenAnimation: function (cb) {
          $(this).fadeIn(200, cb);
        },
        customCloseAnimation: function (cb) {
          $(this).fadeOut(200, cb);
        }
      });
      if (!_this.attr("placeholder")) {
        _this.data("dateRangePicker").setStart(new Date());
      }
    });
  }
})();

// tooltip
$(document).ready(function () {
  const tooltip = $(".tooltip");
  if (!isTouchDevice()) {
    $(".tooltip").tooltipster({
      delay: 0
    });
  }
  if (isTouchDevice()) {
    $(".tooltip").tooltipster({
      delay: 0,
      trigger: "click"
    });
  }
});

// drop
(function () {
  const drops = $(".js-drop");
  drops.each(function () {
    const drop = $(this),
      head = drop.find(".js-drop-head"),
      title = drop.find(".js-drop-title"),
      body = drop.find(".js-drop-body"),
      options = drop.find(".js-drop-option"),
      input = drop.find(".js-drop-input");
    let textOptionSelected = body.find(".js-drop-option.selected .js-drop-text").text(),
      imageOptionSelected = body.find(".js-drop-option.selected img").attr("src"),
      colorOptionSelected = body.find(".js-drop-option.selected .color").attr("style");
    if (title.text() === "") {
      drop.addClass("selected");
      title.text(textOptionSelected);
      head.find("img").attr("src", imageOptionSelected);
      head.find(".js-drop-color").attr("style", colorOptionSelected);
      input.val(textOptionSelected);
    } else {
      options.removeClass("selected");
    }
    head.on("click", function (e) {
      e.stopPropagation();
      if (!drop.hasClass("open")) {
        drops.removeClass("open");
        drop.addClass("open");
      } else {
        drops.removeClass("open");
      }
    });
    body.on("click", function (e) {
      e.stopPropagation();
    });
    $(document).on("click", function () {
      drops.removeClass("open");
    });
    options.each(function () {
      const option = $(this);
      option.on("click", function (e) {
        e.preventDefault();
        let optionText = option.find(".js-drop-text").text(),
          optionImage = option.find("img").attr("src"),
          optionColor = option.find(".js-drop-color").attr("style");
        if (!option.hasClass("selected")) {
          options.removeClass("selected");
          option.addClass("selected");
        } else {
          options.removeClass("selected");
        }
        if (option.hasClass("selected")) {
          drop.addClass("selected");
        }
        title.text(optionText);
        head.find("img").attr("src", optionImage);
        head.find(".js-drop-color").attr("style", optionColor);
        input.val(optionText);
        drops.removeClass("open");
      });
    });
  });
})();

// transactions
(function () {
  const transactions = $(".transactions"),
    filter = transactions.find(".transactions__filter"),
    filters = transactions.find(".transactions__filters"),
    transaction = transactions.find(".transaction"),
    view = transactions.find(".transaction__view");
  filter.on("click", function () {
    filter.toggleClass("active");
    filters.slideToggle();
  });
  view.on("click", function () {
    $(this).parents(".transaction").toggleClass("active");
    $(this).parents(".transaction").find(".transaction__body").slideToggle();
  });
})();

// magnificPopup
(function () {
  const link = $(".js-popup-open"),
    popupClose = $(".js-popup-close");
  if (link.length) {
    link.each(function () {
      const _this = $(this),
        type = _this.data("type");
      _this.magnificPopup({
        type: type,
        fixedContentPos: true,
        removalDelay: 200,
        closeMarkup: '<button title="%title%" type="button" class="mfp-close"><svg width="24" height="24" viewBox="0 0 24 24"><path d="M5.447 4.397l.084.073L12 10.938l6.469-6.468a.75.75 0 0 1 1.133.977l-.073.084-6.468 6.469 6.469 6.47a.75.75 0 0 1-.977 1.133l-.084-.073L12 13.06l-6.47 6.469a.75.75 0 0 1-1.133-.977l.073-.084 6.469-6.47L4.471 5.53a.75.75 0 0 1 .977-1.133z"></path></svg></button>',
        callbacks: {
          beforeOpen: function () {
            this.st.mainClass = this.st.el.attr("data-effect");
          }
        }
      });
    });
  }
  popupClose.on("click", function () {
    $.magnificPopup.close();
  });
})();

// help like
$(".help__like").on("click", function () {
  $(this).toggleClass("active");
});