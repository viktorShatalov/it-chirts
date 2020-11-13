jQuery(document).ready(function ($) {
  //  mobile-menu

  jQuery(".burger").click(function () {
    jQuery(".burger,.header__menu").toggleClass("active");
    jQuery("body,html").toggleClass("lock");
  });

  // subscribe-instagram
  jQuery(".subscribe-instagram").hide();
  jQuery(".subscribe-instagram i").on("click", function () {
    jQuery(this).parent().hide();
  });

  //  loader

  if ($(window).width() < 580) {
    var removeLoader = function () {
      var $preloader = $(".loader-wrap");
      $preloader.delay(350).fadeOut("350");
    };

    setTimeout(removeLoader, 1500);
  } else {
  }

  $(window).bind("resize", function () {
    if ($(window).width() < 580) {
      var removeLoader = function () {
        var $preloader = $(".loader-wrap");
        $preloader.delay(350).fadeOut("350");
      };

      setTimeout(removeLoader, 1500);
    } else {
    }
  });

  // resize
  if (jQuery(window).width() < 769) {
  }

  // modal

  function modal() {
    const openModalButtons = document.querySelectorAll("[data-modal-target]");
    const closeModalButtons = document.querySelectorAll("[data-close-button]");
    const overlay = document.getElementById("overlay");

    openModalButtons.forEach((button) => {
      button.addEventListener("click", (e) => {
        e.preventDefault();
        const modal = document.querySelector(button.dataset.modalTarget);
        openModal(modal);
      });
    });

    overlay.addEventListener("click", () => {
      const modals = document.querySelectorAll(".modal.active");
      modals.forEach((modal) => {
        closeModal(modal);
      });
    });

    closeModalButtons.forEach((button) => {
      button.addEventListener("click", () => {
        const modal = button.closest(".modal");
        closeModal(modal);
      });
    });

    function openModal(modal) {
      if (modal == null) return;
      modal.classList.add("active");
      overlay.classList.add("active");
    }

    function closeModal(modal) {
      if (modal == null) return;
      modal.classList.remove("active");
      overlay.classList.remove("active");
    }
  }
  modal();

  // sliders
  jQuery(".first__slider,.second__slider").slick({
    arrows: false,
    dots: false,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    variableWidth: true,
    responsive: [
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  jQuery(".slider-for").slick({
    arrows: false,
    dots: false,
    asNavFor: ".slider-nav",
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    draggable: false,
    speed: 300,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 480,
        settings: {},
      },
    ],
  });
  const settingsNav = {};
  jQuery(".slider-nav").slick({
    arrows: false,
    dots: false,
    asNavFor: ".slider-for",
    focusOnSelect: true,
    draggable: false,
    variableWidth: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    centerPadding: "0px",
    responsive: [
      {
        breakpoint: 480,
        settings: {},
      },
    ],
  });

  // change atribute
  $(".item__type .item").on("click", function () {
    $(".item__type .item").removeClass("active");
    $(this).addClass("active");
  });
  $(".item__color .item").on("click", function () {
    $(".item__color .item").removeClass("active");
    $(this).addClass("active");
  });
  $(".gift__content-right__price").on("click", function () {
    $(".gift").children().removeClass("active");
    $(this).addClass("active");
  });
  $(".item__size .item").on("click", function () {
    $(".item__size .item").removeClass("active");
    $(this).addClass("active");
  });

  //category menu accerdeon

  jQuery(
    ".aside__category-shop-title>a:not(.aside__category-shop-title>a:eq(0))"
  ).click(function (e) {
    e.preventDefault();
  });

  jQuery(".aside__category-shop-title").on("click", function (e) {
    $(this).children(".submenu").stop(true, true).toggle(350);
    jQuery(this).toggleClass("active");
  });

  //table size
  const menu = jQuery(".table__size-pseudo");
  const menuBtn = jQuery(".table__size");

  menuBtn.on("click", function () {
    menu.addClass("active");
  });

  $(document).mouseup(function (e) {
    if (!menu.is(e.target) && menu.has(e.target).length === 0) {
      menu.removeClass("active");
    }
  });

  // tabs

  let tab = function () {
    let tabLink = document.querySelectorAll(".tablinks");
    let tabContent = document.querySelectorAll(".tabs__content");
    let tabName;
    tabLink.forEach((item) => {
      item.addEventListener("click", selsectTabLink);
    });
    function selsectTabLink() {
      tabLink.forEach((item) => {
        item.classList.remove("active");
      });
      this.classList.add("active");
      tabName = this.getAttribute("datat-tab-name");
      selectTabContent(tabName);
    }
    const selectTabContent = (tabName) => {
      tabContent.forEach((item) => {
        item.classList.contains(tabName)
          ? item.classList.add("active")
          : item.classList.remove("active");
      });
    };
  };
  tab();
  // сертификат в оформлении заказа
  jQuery(".woocommerce-additional-fields").prepend(jQuery("#payment"));
  jQuery("#pwgc-redeem-gift-card-form").appendTo(jQuery("#cupon__box"));
  jQuery("#pwgc-redeem-button").val("Подтвердить");
  jQuery("#pwgc-redeem-gift-card-number").val("Сертификат");

  $("#link-cert").click(function (e) {
    e.preventDefault();
    $("#pwgc-redeem-gift-card-form").slideToggle("fast");
    $("form.checkout_coupon").slideUp("fast");
    return false;
  });
  $(".showcoupon").click(function () {
    $("#pwgc-redeem-gift-card-form").slideUp("fast");
  });
});
