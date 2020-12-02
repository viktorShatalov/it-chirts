jQuery(document).ready(function ($) {
  //  mobile-menu

  jQuery(".burger,#aside__wrap-overlay").click(function () {
    jQuery(".burger,#aside__wrap,#aside__wrap-overlay").toggleClass("active");
    jQuery(
      "#checkout .header__menu, #thankyou .header__menu,#page-404 .header__menu"
    ).toggleClass("active");
    jQuery("body,html").toggleClass("lock");
  });

  // subscribe-instagram
  // jQuery(".subscribe-instagram").hide();
  jQuery(".subscribe-instagram i").on("click", function () {
    jQuery(this).parent().hide();
  });

  //  loader

  if ($(window).width() < 580) {
    var removeLoader = function () {
      var $preloader = $(".loader-wrap");
      $preloader.delay(350).fadeOut("350");
    };

    setTimeout(removeLoader, 750);
  } else {
  }

  $(window).bind("resize", function () {
    if ($(window).width() < 580) {
      var removeLoader = function () {
        var $preloader = $(".loader-wrap");
        $preloader.delay(350).fadeOut("350");
      };

      setTimeout(removeLoader, 750);
    } else {
    }
  });

  // resize
  if (jQuery(window).width() < 580) {
    jQuery("a.cart__btn").html("");
    jQuery("#header .container .burger").after(jQuery(".aside__logo").eq(0));
    jQuery(".product__card-right h1").prependTo(jQuery(".product__card-left"));
    jQuery(".product__card-description").appendTo(
      jQuery(".product__card-right")
    );
    jQuery("#head_footbolki-show__more").appendTo(
      jQuery("ul.product__items.it-shirts")
    );
    jQuery("#head_tolstovki-show__more").appendTo(
      jQuery("ul.product__items.it-hoodies")
    );
    jQuery("#head_chashki-show__more").appendTo(
      jQuery("ul.product__items.it-cups")
    );
    jQuery("#head_box-show__more").appendTo(
      jQuery("ul.product__items.it-boxes")
    );
    jQuery(".contacts__right").appendTo(jQuery(".page-content-image"));
    jQuery(".aside__logo").on("click", function () {
      document.location.replace("/");
    });
  }
  if (jQuery(window).width() >= 768 && jQuery(window).width() <= 1024) {
    jQuery(".contacts__right").appendTo(jQuery(".page-content-image"));
  }
  if (jQuery(window).width() >= 768 && jQuery(window).width() <= 959) {
    jQuery(".product__card-right h1").prependTo(jQuery(".product__card-left"));
    jQuery(".product__card-description").appendTo(
      jQuery(".product__card-right")
    );
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
        breakpoint: 800,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          variableWidth: true,
          dots: true,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 3000,
          speed: 1000,
        },
      },
      {
        breakpoint: 580,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerMode: true,
          variableWidth: true,
          dots: true,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 3000,
          speed: 1000,
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
        breakpoint: 580,
        settings: {
          draggable: false,
        },
      },
    ],
  });
  jQuery(".slider-nav").slick({
    arrows: false,
    dots: false,
    asNavFor: ".slider-for",
    focusOnSelect: true,
    draggable: false,
    variableWidth: true,
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    infinite: true,
    centerPadding: "0px",
    responsive: [
      {
        breakpoint: 580,
        settings: {
          draggable: false,
        },
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
  $(".item__type .item").on("click", function () {
    $(".item__type .item").removeClass("active");
    $(this).addClass("active");
  });

  //category menu accerdeon

  $(".accordeon > li:not(:first-child) > a").click(function (e) {
    e.preventDefault();

    let menu = $(this).closest(".accordeon");

    if (false == $(this).next().is(":visible")) {
      menu.find("li").removeClass("slide active");
      menu.find(".submenu").slideUp();
    }

    let menu_item = $(this).closest(".aside__category-shop-title");
    if ($(menu_item).hasClass("slide")) {
      $(menu_item).removeClass("slide");
      menu.find(".submenu").slideUp();
    } else {
      $(this).next().slideToggle();
      $(this).parent().addClass("slide");
    }
  });

  if (window.location.pathname == "/") {
    jQuery(".accordeon>li:first-child>a").on("click", function (e) {
      e.preventDefault();
    });
  }

  const aria_menu = jQuery(".aside__category-shop-title").find(
    'a[aria-current="page"]'
  );
  if (aria_menu) {
    let item = aria_menu.closest(".submenu");
    $(item).show();
    $(aria_menu).closest(".aside__category-shop-title").addClass("slide");
  }

  //table size
  const menu = jQuery(".table__size-pseudo");
  const menuBtn = jQuery(".table__size a");

  menuBtn.on("click", function (e) {
    e.preventDefault();
    menu.toggleClass("active");
  });

  $(document).mouseup(function (e) {
    if (
      !menu.is(e.target) &&
      menu.has(e.target).length === 0 &&
      !menuBtn.is(e.target)
    ) {
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
  $("#cupon__box").appendTo($(".place-order"));

  // woocomerce eroor
  jQuery(".woocommerce-error .close").on("click", function () {
    jQuery(".woocommerce-error").hide("fast");
  });

  // показать описание доставки
  $("label[for='shipping_method_0_flat_rate8']").on("click", function () {
    $("#shiping__description-ua").show(500);
  });
  $('label[for="shipping_method_0_nova_poshta_shipping1"]').on(
    "click",
    function () {
      $("#shiping__description-ua").hide(500);
    }
  );
});
