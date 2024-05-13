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

  // Element - Header - Menu
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

  // Element - Header - Menu - Close on click inner page link
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

  // Element - Header - Menu - Open on click menu items
  $("a.js-openRanges, a.js-openProducts, .js-openRanges > a, .js-openProducts > a").click(
    function (e) {
      if (!$(e.target).is(".super-menu a")) {
        toggleMenu(1);
      }
    }
  );

  $("a.js-openProducts, .js-openProducts > a").click(function () {
    $(".super-menu .js-openProducts").addClass("opened");
  });

  $("a.js-openRanges, .js-openRanges > a").click(function () {
    $(".super-menu .js-openRanges").addClass("opened");
  });

  $("a.js-openRanges, a.js-openProducts, .js-openRanges > a, .js-openProducts > a").on(
    "keypress",
    function (e) {
      if ((e.keyCode || e.which) == 13) {
        toggleMenu(1);
      }
    }
  );

  $("a.js-openProducts, .js-openProducts > a").on("keypress", function (e) {
    if ((e.keyCode || e.which) == 13) {
      $(".super-menu .js-openProducts").addClass("opened");
    }
  });

  $("a.js-openRanges, .js-openRanges > a").on("keypress", function (e) {
    if ((e.keyCode || e.which) == 13) {
      $(".super-menu .js-openRanges").addClass("opened");
    }
  });

  // Element - Header - Menu - Close on click outside menu
  $("body").click(function (e) {
    if (
      $("body").hasClass("js-menuOpened") &&
      !$(
        ".js-toggleMenu, a.js-openRanges, a.js-openProducts, .js-openRanges > a, .js-openProducts > a, .menu-item-has-children > a"
      ).is(e.target) &&
      $(e.target).closest(".super-menu-wrapper").length === 0
    ) {
      toggleMenu();
    }
  });

  // Element - Header - Menu - Open submenu
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

  // Element - Header - Menu - Close submenu
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

  // Element - Search Modal
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

  // Element - Tabs
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

  // Block - Accordion Tabs
  $(".accordion-tabs-block nav.menu h3").on("click", function (e) {
    e.preventDefault();
    $(this).closest('.accordion-tabs-block').find('nav.menu h3.active').next().slideToggle(350);
    $(this).closest('.accordion-tabs-block').find('nav.menu h3').removeClass("active");
    $(this).addClass("active");
    $(this).closest('.accordion-tabs-block').find('nav.menu h3.active').next().slideToggle(350);
  });

  $(".accordion-tabs-block nav.menu h3").on("keypress", function (e) {
    if ((e.keyCode || e.which) == 13) {
      $(this).closest('.accordion-tabs-block').find('nav.menu h3').toggleClass("active");
      $(this).closest('.accordion-tabs-block').find('nav.menu h3').next().slideToggle(350);
    }
  });

  function showContentAccordionTabs(tab, element, parent) {
    parent.find("img.visible, .video-wrapper.visible").removeClass("visible");
    parent.find("img[data-tab-index='" + tab + "'][data-element-index='" + element + "'], .video-wrapper[data-tab-index='" + tab + "'][data-element-index='" + element + "']").addClass("visible");
    parent.find("nav.menu button.active").removeClass("active");
    parent.find("nav.menu button[data-tab-target='" + tab + "'][data-element-target='" + element + "']").addClass("active");
  }

  $(".accordion-tabs-block:not(.accordion-tabs-crossed-block) nav.menu button").on("click", function () {
    tabIndex = $(this).data("tab-target");
    elementIndex = $(this).data("element-target");
    showContentAccordionTabs(tabIndex, elementIndex, $(this).closest('.accordion-tabs-block'));
  });

  $('.accordion-tabs-block').each(function () {
    if ($(this).find("nav.menu").length == 1) {
      $(this).find("nav.menu:first-child h3").toggleClass("active");
      $(this).find("nav.menu:first-child h3 + .accordion-content").slideToggle(350);
    }
    showContentAccordionTabs(1, 1, $(this));
  });

  // Block - Accordion Tabs Crossed
  function showContentAccordionTabsCrossed(tab, element, option, parent) {
    // Hide empty menu
    parent.find("nav.menu button").each(function (index) {
      tabIndex = $(this).data("tab-target");
      elementIndex = $(this).data("element-target");
      if (parent.find("img[data-options-id='" + option + "'][data-tab-index='" + tabIndex + "'][data-element-index='" + elementIndex + "']").length > 0) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
    parent.find("img.visible").removeClass("visible");
    // Fallback
    if (parent.find("img[data-options-id='" + option + "'][data-tab-index='" + tab + "'][data-element-index='" + element + "']").length == 0) {
      tab = parent.find("img[data-options-id='" + option + "']:first").data("tab-index");
      element = parent.find("img[data-options-id='" + option + "']:first").data("element-index");
    }
    parent.find("img[data-options-id='" + option + "'][data-tab-index='" + tab + "'][data-element-index='" + element + "']").addClass("visible");
    parent.find("nav.menu button.active").removeClass("active");
    parent.find("nav.menu button[data-tab-target='" + tab + "'][data-element-target='" + element + "']").addClass("active");
    parent.find("nav.options button.active").removeClass("active");
    $("#" + option).addClass("active");
    parent.find('#active-label') && parent.find('#active-label').text($("#" + option).data("label"));
  }

  $(".accordion-tabs-crossed-block:not(.accordion-tabs-crossed-double-block) nav.menu button").on("click", function () {
    tabIndex = $(this).data("tab-target");
    elementIndex = $(this).data("element-target");
    optionId = $(this).closest('.accordion-tabs-crossed-block').find("nav.options button.active").attr('id');
    showContentAccordionTabsCrossed(tabIndex, elementIndex, optionId, $(this).closest('.accordion-tabs-block'));
  });

  $(".accordion-tabs-crossed-block:not(.accordion-tabs-crossed-double-block) nav.options button").on("click", function () {
    activeTab = $(this).closest('.accordion-tabs-crossed-block').find("nav.menu button.active");
    tabIndex = activeTab.data("tab-target");
    elementIndex = activeTab.data("element-target");
    optionId = $(this).attr('id');
    showContentAccordionTabsCrossed(tabIndex, elementIndex, optionId, $(this).closest('.accordion-tabs-crossed-block'));
  });

  $('.accordion-tabs-crossed-block:not(.accordion-tabs-crossed-double-block)').each(function () {
    showContentAccordionTabsCrossed(1, 1, $(this).find("nav.options button:first-child").attr('id'), $(this));
  });

  // Block - Accordion Tabs (Double)
  function showContentAccordionTabsCrossedDouble(tab, element, option, optionAlt = "", parent) {
    // Hide empty options
    optionsIndex = 0;
    parent.find("nav.options button").each(function (index) {
      option_1 = $(this).attr('id');
      if (parent.find("img[data-options-id='" + option_1 + "'][data-tab-index='" + tab + "'][data-element-index='" + element + "']").length > 0) {
        $(this).show();
        optionsIndex++;
      } else {
        $(this).hide();
      }
    });
    optionsAltIndex = 0;
    optionsAltDefault = "";
    parent.find("nav.options-alt button").each(function (index) {
      option_2 = $(this).attr('id');
      if (parent.find("img[data-options-alt-id='" + option_2 + "'][data-tab-index='" + tab + "'][data-element-index='" + element + "']").length > 0) {
        $(this).show();
        optionsAltIndex++;
        if (optionsAltIndex == 1) {
          optionsAltDefault = option_2;
        }
      } else {
        $(this).hide();
      }
    });
    // Hide options if 1 choice
    (optionsIndex < 2) ? parent.find(".options-wrapper").hide() : parent.find(".options-wrapper").show();
    (optionsAltIndex < 2) ? parent.find(".options-alt-wrapper").hide() : parent.find(".options-alt-wrapper").show();
    parent.find("img.visible").removeClass("visible");
    // Fallback
    if (parent.find("img[data-options-id='" + option + "'][data-tab-index='" + tab + "'][data-element-index='" + element + "']").length == 0) {
      option = parent.find("img[data-tab-index='" + tab + "'][data-element-index='" + element + "']:first").data("options-id");
    }
    if (parent.find("img[data-options-alt-id='" + optionAlt + "'][data-tab-index='" + tab + "'][data-element-index='" + element + "']").length == 0) {
      optionAlt = optionsAltDefault;
    }
    console.log(parent.find("img[data-options-id='" + option + "']img[data-options-alt-id='" + optionAlt + "'][data-tab-index='" + tab + "'][data-element-index='" + element + "']"));
    parent.find("img[data-options-id='" + option + "']img[data-options-alt-id='" + optionAlt + "'][data-tab-index='" + tab + "'][data-element-index='" + element + "']").addClass("visible");
    parent.find(".content .formatted.visible").removeClass("visible");
    parent.find(".content .formatted[data-tab-index='" + tab + "'][data-element-index='" + element + "']").addClass("visible");
    parent.find("nav.menu button.active").removeClass("active");
    parent.find("nav.menu button[data-tab-target='" + tab + "'][data-element-target='" + element + "']").addClass("active");
    parent.find("nav.options button.active").removeClass("active");
    $("#" + option).addClass("active");
    parent.find('#option-active-label') && parent.find('#option-active-label').text($("#" + option).data("label"));
    parent.find("nav.options-alt button.active").removeClass("active");
    if (optionAlt !== "") {
      $("#" + optionAlt).addClass("active");
      parent.find('#option-alt-active-label') && parent.find('#option-alt-active-label').text($("#" + optionAlt).data("label"));
    }
  }

  $(".accordion-tabs-crossed-double-block nav.menu button").on("click", function () {
    tabIndex = $(this).data("tab-target");
    elementIndex = $(this).data("element-target");
    optionId = $(this).closest('.accordion-tabs-crossed-block').find("nav.options button.active").attr('id');
    optionAltId = $(this).closest('.accordion-tabs-crossed-block').find("nav.options-alt button.active").attr('id');
    showContentAccordionTabsCrossedDouble(tabIndex, elementIndex, optionId, optionAltId, $(this).closest('.accordion-tabs-block'));
  });

  $(".accordion-tabs-crossed-double-block nav.options button").on("click", function () {
    activeTab = $(this).closest('.accordion-tabs-crossed-block').find("nav.menu button.active");
    tabIndex = activeTab.data("tab-target");
    elementIndex = activeTab.data("element-target");
    optionId = $(this).attr('id');
    optionAltId = $(this).closest('.accordion-tabs-crossed-block').find("nav.options-alt button.active").attr('id');
    showContentAccordionTabsCrossedDouble(tabIndex, elementIndex, optionId, optionAltId, $(this).closest('.accordion-tabs-crossed-block'));
  });

  $(".accordion-tabs-crossed-double-block nav.options-alt button").on("click", function () {
    activeTab = $(this).closest('.accordion-tabs-crossed-block').find("nav.menu button.active");
    tabIndex = activeTab.data("tab-target");
    elementIndex = activeTab.data("element-target");
    optionId = $(this).closest('.accordion-tabs-crossed-block').find("nav.options button.active").attr('id');
    optionAltId = $(this).attr('id');
    showContentAccordionTabsCrossedDouble(tabIndex, elementIndex, optionId, optionAltId, $(this).closest('.accordion-tabs-crossed-block'));
  });

  $('.accordion-tabs-crossed-double-block').each(function () {
    showContentAccordionTabsCrossedDouble(1, 1, $(this).find("nav.options button:first-child").attr('id'), $(this).find("nav.options-alt button:first-child").attr('id'), $(this));
  });

  const swiperAccordionOptionsAlt = new Swiper(".options-alt.swiper", {
    slidesPerView: "auto",
    spaceBetween: 10,
    loop: false,
    navigation: {
      nextEl: ".button-next",
      prevEl: ".button-prev",
    },
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
    var label = $(element).data('label');
    var code = $(element).data('code');
    $('.shades-block button').removeClass('active');
    $(element).addClass('active');
    $('.shades-block').css({ "--theme": theme });
    $('.shades-block').css({ "--background": "url(" + background + ")" });
    $("#selector-code-label").text(label);
    $("#selector-code").text(code);
  }

  $('.shades-block button').click(function () {
    changeShadesActive(this);
  });

  changeShadesActive("#shades-1 .shades-grid button:nth-child(2)");

  // Block - Tooltip
  function convertToAbsolute() {
    $(".tooltip-block button.tooltip").each(function (index) {
      positionRaw = $(this).data("position");
      coordinates = positionRaw.split(',');
      $(this).css("top", coordinates[1])
      $(this).css("left", coordinates[0])
    });
  }
  convertToAbsolute();

  function showContentTooltip(target, parent) {
    parent.find("button.tooltip.active").removeClass("active");
    parent.find(".tooltip-popup.visible").removeClass("visible");
    parent.find(".tooltip-popup[data-trigger='" + target + "']").addClass("visible");
    parent.find("button.tooltip[data-target='" + target + "']").addClass("active");
  }

  $(".tooltip-block button.tooltip").on("click", function () {
    target = $(this).data("target");
    showContentTooltip(target, $(this).closest('.tooltip-block'));
  });

  // Block - Tooltip (Double)
  function switchImageTooltip(element, parent) {
    parent.find(".switch button.active").removeClass("active");
    element.addClass("active");
    parent.find(".image-wrapper > img").attr("src", element.data("image-url"));
  }

  $(".tooltip-double-block .switch button").on("click", function () {
    switchImageTooltip($(this), $(this).closest('.tooltip-double-block'));
  });

  $('.tooltip-double-block').each(function () {
    switchImageTooltip($(this).find('.switch button:first'), $(this));
  });

  // Page - Hiring
  const swiperHiring = new Swiper(".forms.swiper", {
    autoHeight: true,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },
  });

  // Page - Homepage
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
      delay: 3000,
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
      delay: 3000,
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