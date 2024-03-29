// On load
document.addEventListener("DOMContentLoaded", function () {
  // General - Set/Update variables
  function updateVariables() {
    document
      .querySelector(":root")
      .style.setProperty("--viewport-height", window.innerHeight + "px");
    document
      .querySelector(":root")
      .style.setProperty(
        "--header-height",
        document.querySelector("#header").offsetHeight + "px"
      );
  }
  window.addEventListener("resize", function () {
    updateVariables();
  });
  updateVariables();

  // General - Insert quote in the console
  console.log(
    "This theme was made by Thomas Pericoi - https://thomaspericoi.com/"
  );

  // General - Enable ASCII Printer on random
  printRandomAscii();

  // General - Elements is in view
  function toggleClassOnScroll(trigger, target) {
    if (trigger && target) {
      var elementTop = trigger.getBoundingClientRect().top;
      var elementBottom = trigger.getBoundingClientRect().bottom;
      if (
        (elementTop > window.innerHeight * 0.1 &&
          elementTop < window.innerHeight * 0.6) ||
        (elementBottom > window.innerHeight * 0.4 &&
          elementBottom < window.innerHeight * 0.9)
      ) {
        target.classList.add("js-inView");
      } else {
        target.classList.remove("js-inView");
      }
    }
  }
  function markAsViewed(trigger, target) {
    if (trigger && target) {
      if (trigger && target) {
        var elementTop = trigger.getBoundingClientRect().top;
        var elementBottom = trigger.getBoundingClientRect().bottom;
        if (
          (elementTop > window.innerHeight * 0.1 &&
            elementTop < window.innerHeight * 0.6) ||
          (elementBottom > window.innerHeight * 0.4 &&
            elementBottom < window.innerHeight * 0.9)
        ) {
          target.classList.add("js-viewed");
        }
      }
    }
  }
  window.addEventListener("scroll", () => {
    document
      .querySelectorAll(".js-toBeTriggered")
      .forEach(function (item, index) {
        toggleClassOnScroll(item, item);
      });
    document.querySelectorAll("main section").forEach(function (item, index) {
      markAsViewed(item, item);
    });
  });
  document
    .querySelectorAll(".js-toBeTriggered")
    .forEach(function (item, index) {
      toggleClassOnScroll(item, item);
    });
  document.querySelectorAll("main section").forEach(function (item, index) {
    markAsViewed(item, item);
  });

  // Header - Menu
  document
    .querySelectorAll(
      "header .menu-header>li>a, .super-menu-wrapper .menu-header li a"
    )
    .forEach(function (item) {
      item.tabIndex = 0;
    });

  function toggleHideSuperMenu() {
    document.querySelector(".super-menu").toggleAttribute("inert");
    document
      .querySelector(".super-menu")
      .setAttribute(
        "aria-hidden",
        !(document.querySelector(".super-menu").getAttribute("aria-hidden") ==
          "true"
          ? true
          : false)
      );
  }

  function toggleHideHeader() {
    document.querySelector("header").toggleAttribute("inert");
    document
      .querySelector("header")
      .setAttribute(
        "aria-hidden",
        !(document.querySelector("header").getAttribute("aria-hidden") == "true"
          ? true
          : false)
      );
  }

  function toggleHideMain() {
    document.querySelector("main").toggleAttribute("inert");
    document
      .querySelector("main")
      .setAttribute(
        "aria-hidden",
        !(document.querySelector("main").getAttribute("aria-hidden") == "true"
          ? true
          : false)
      );
  }

  function toggleHideFooter() {
    document.querySelector("footer").toggleAttribute("inert");
    document
      .querySelector("footer")
      .setAttribute(
        "aria-hidden",
        !(document.querySelector("footer").getAttribute("aria-hidden") == "true"
          ? true
          : false)
      );
  }

  function toggleMenu(step = 0) {
    $("body").toggleClass("js-menuOpened");
    $(".menu-item-has-children.opened").removeClass("opened");
    $(".super-menu").attr("data-step", step);
    toggleHideSuperMenu();
    toggleHideHeader();
    toggleHideMain();
    toggleHideFooter();
  }

  // Header - Menu - Close on click inner page link
  $(".super-menu-wrapper a[href*='#'], .js-toggleMenu").click(function () {
    toggleMenu();
  });

  $(".super-menu-wrapper a[href*='#'], .js-toggleMenu").on(
    "keypress",
    function (e) {
      if ((e.keyCode || e.which) == 13) {
        toggleMenu();
      }
    }
  );

  // Header - Menu - Open on click menu items
  $("#home-hero .js-openRanges a, #home-hero .js-openProducts a, #breadcrumbs .js-openRanges a, #breadcrumbs .js-openProducts a, footer .js-openProducts a, footer .js-openRanges a, .inner-header .js-openProducts a, .inner-header .js-openRanges a").click(
    function () {
      toggleMenu(1);
    }
  );

  $("#home-hero .js-openProducts a, #breadcrumbs .js-openProducts a, footer .js-openProducts a, .inner-header .js-openProducts a").click(function () {
    $(".super-menu .js-openProducts").addClass("opened");
  });

  $("#home-hero .js-openRanges a, #breadcrumbs .js-openRanges a, footer .js-openRanges a, .inner-header .js-openRanges a").click(function () {
    $(".super-menu .js-openRanges").addClass("opened");
  });

  $("#home-hero .js-openRanges a, #home-hero .js-openProducts a, #breadcrumbs .js-openRanges a, #breadcrumbs .js-openProducts a, footer .js-openProducts a, footer .js-openRanges a, .inner-header .js-openProducts a, .inner-header .js-openRanges a").on(
    "keypress",
    function (e) {
      if ((e.keyCode || e.which) == 13) {
        toggleMenu(1);
      }
    }
  );

  $("#home-hero .js-openProducts a, #breadcrumbs .js-openProducts a, footer .js-openProducts a, .inner-header .js-openProducts a").on("keypress", function (e) {
    if ((e.keyCode || e.which) == 13) {
      $(".super-menu .js-openProducts").addClass("opened");
    }
  });

  $("#home-hero .js-openRanges a, #breadcrumbs .js-openRanges a, footer .js-openRanges a, .inner-header .js-openRanges a").on("keypress", function (e) {
    if ((e.keyCode || e.which) == 13) {
      $(".super-menu .js-openRanges").addClass("opened");
    }
  });

  // Header - Menu - Close on click outside menu
  $("body").click(function (e) {
    if (
      $("body").hasClass("js-menuOpened") &&
      !$(
        ".js-toggleMenu, .js-openProducts a, .js-openRanges a, .menu-item-has-children > a"
      ).is(e.target) &&
      $(e.target).closest(".super-menu-wrapper").length === 0
    ) {
      toggleMenu();
    }
  });

  // Header - Menu - Open submenu
  $(".menu-item-has-children > a").click(function () {
    $(
      ".menu-item-has-children.opened .menu-item-has-children.opened"
    ).removeClass("opened");
    $(this).parent().addClass("opened");
    step = $(".super-menu").attr("data-step");
    if (step < 2) {
      step++;
    }
    $(".super-menu").attr("data-step", step.toString());
  });

  $(".menu-item-has-children > a").on("keypress", function (e) {
    if ((e.keyCode || e.which) == 13) {
      $(
        ".menu-item-has-children.opened .menu-item-has-children.opened"
      ).removeClass("opened");
      $(this).parent().addClass("opened");
      step = $(".super-menu").attr("data-step");
      if (step < 2) {
        step++;
      }
      $(".super-menu").attr("data-step", step.toString());
    }
  });

  // Header - Menu - Close submenu
  $(".super-menu .btn-back").click(function () {
    step = $(".super-menu").attr("data-step");
    if (step == 0) {
      closeMenu();
      return;
    } else if (step == 1) {
      $(".menu-item-has-children.opened").removeClass("opened");
    } else if (step == 2) {
      $(
        ".menu-item-has-children.opened .menu-item-has-children.opened"
      ).removeClass("opened");
    }
    step = step - 1;
    $(".super-menu").attr("data-step", step.toString());
  });

  $(".super-menu .btn-back").on("keypress", function (e) {
    if ((e.keyCode || e.which) == 13) {
      step = $(".super-menu").attr("data-step");
      if (step == 0) {
        closeMenu();
        return;
      } else if (step == 1) {
        $(".menu-item-has-children.opened").removeClass("opened");
      } else if (step == 2) {
        $(
          ".menu-item-has-children.opened .menu-item-has-children.opened"
        ).removeClass("opened");
      }
      step = step - 1;
      $(".super-menu").attr("data-step", step.toString());
    }
  });

  // Header - Search Modal
  document.querySelectorAll(".js-toggleSearchModal").forEach(function (item) {
    item.addEventListener("click", function () {
      document.querySelector("body").classList.toggle("js-searchModalOpened");
      document.querySelector(".js-searchModal").toggleAttribute("inert");
      document
        .querySelector(".js-searchModal")
        .setAttribute(
          "aria-hidden",
          !(document
            .querySelector(".js-searchModal")
            .getAttribute("aria-hidden") == "true"
            ? true
            : false)
        );
      toggleHideHeader();
      toggleHideMain();
      toggleHideFooter();
    });
  });
  document.querySelectorAll(".js-toggleSearchModal").forEach(function (item) {
    item.addEventListener("keydown", (e) => {
      if (e.code === "Enter") {
        item.click();
      }
    });
  });

  // Element - Video
  $("video:not(.gif)").click(function () {
    $(this).next($(".play")).hide();
    $(this).attr("controls", "");
  });

  $("video:not(.gif)").on("keypress", function (e) {
    if ((e.keyCode || e.which) == 13) {
      $(this).next($(".play")).hide();
      $(this).attr("controls", "");
    }
  });

  // Block - Shades
  if ($("#shades-count-1")) {
    $("#shades-count-1").text($("#shades-1 .shades-grid").children().length);
  }
  if ($("#shades-count-2")) {
    $("#shades-count-2").text($("#shades-2 .shades-grid").children().length);
  }

  function changeShadesActive(element) {
    var theme = $(element).data('theme');
    var background = $(element).data('background');
    var code = $(element).data('code');
    $('.shades-block button').removeClass('active');
    $(element).addClass('active');
    $('.shades-block').css({ "--theme": theme });
    $('.shades-block').css({ "--background": "url(" + background + ")" });
    $("#selector-code").text(code);
  }

  $('.shades-block button').click(function () {
    changeShadesActive(this);
  });

  changeShadesActive("#shades-1 .shades-grid button:last-child");

  // Block - Tabs
  function showContentTabs(index) {
    $(".tabs-block .tabs-content-element.visible").removeClass("visible");
    $(
      ".tabs-block .tabs-content-element:nth-of-type(" + (index + 1) + ")"
    ).addClass("visible");
    $(".tabs-block nav a.selected").removeClass("selected");
    $(".tabs-block nav a:nth-of-type(" + (index + 1) + ")").addClass(
      "selected"
    );
  }
  $(".tabs-block nav a").on("click", function () {
    showContentTabs($(this).index());
  });
  $(".tabs-block nav a").on("keypress", function (e) {
    if ((e.keyCode || e.which) == 13) {
      showContentTabs($(this).index());
    }
  });
  showContentTabs(0);

  // Page - Home
  const swiperHero = new Swiper('#home-hero', {
    loop: true,
    autoHeight: true,
    pagination: {
      el: ".swiper-pagination",
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  });

  const swiperHeroNested = new Swiper('#home-hero .nested-slider', {
    loop: true,
    autoHeight: true,
    effect: "fade",
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
  });

  const swiperInspirations1 = new Swiper('#inspirations-slider-1', {
    initialSlide: 1,
    slidesPerView: 1.25,
    centeredSlides: true,
    loop: true,
    grabCursor: true,
    spaceBetween: 10,
    autoplay: {
      delay: 1500,
    },
    breakpoints: {
      992: {
        initialSlide: 0,
        slidesPerView: 4,
        centeredSlides: false,
        spaceBetween: 20,
      }
    }
  });

  const swiperInspirations2 = new Swiper('#inspirations-slider-2', {
    initialSlide: 1,
    slidesPerView: 1.25,
    centeredSlides: true,
    loop: true,
    grabCursor: true,
    spaceBetween: 10,
    autoplay: {
      delay: 1500,
      reverseDirection: true,
    },
    breakpoints: {
      992: {
        initialSlide: 2,
        slidesPerView: 4,
        centeredSlides: true,
        spaceBetween: 20,
      }
    }
  });

  // Page - Hiring
  const swiperHiring = new Swiper(".forms.swiper", {
    autoHeight: true,
    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },
  });

  // Page - Range
  $(".single-gypass_range #hero-alt .filters button.all-filter").on("click", function () {
    $('.single-gypass_range #hero-alt .filters button').removeClass('active');
    $(this).addClass('active');
    $(".single-gypass_range #content > section").show();
  });

  $(".single-gypass_range #hero-alt .filters button.class-filter").on("click", function () {
    var classname = $(this).data('classname');
    $('.single-gypass_range #hero-alt .filters button').removeClass('active');
    $(this).addClass('active');
    $(".single-gypass_range #content > section").show();
    $(".single-gypass_range #content > section").filter(":not('." + classname + "')").hide();
  });
});
