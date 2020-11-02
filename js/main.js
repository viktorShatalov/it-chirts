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

  // function modal() {
  //   const openModalButtons = document.querySelectorAll("[data-modal-target]");
  //   const closeModalButtons = document.querySelectorAll("[data-close-button]");
  //   const overlay = document.getElementById("overlay");

  //   openModalButtons.forEach((button) => {
  //     button.addEventListener("click", (e) => {
  //       e.preventDefault();
  //       const modal = document.querySelector(button.dataset.modalTarget);
  //       openModal(modal);
  //     });
  //   });

  //   overlay.addEventListener("click", () => {
  //     const modals = document.querySelectorAll(".modal.active");
  //     modals.forEach((modal) => {
  //       closeModal(modal);
  //     });
  //   });

  //   closeModalButtons.forEach((button) => {
  //     button.addEventListener("click", () => {
  //       const modal = button.closest(".modal");
  //       closeModal(modal);
  //     });
  //   });

  //   function openModal(modal) {
  //     if (modal == null) return;
  //     modal.classList.add("active");
  //     overlay.classList.add("active");
  //   }

  //   function closeModal(modal) {
  //     if (modal == null) return;
  //     modal.classList.remove("active");
  //     overlay.classList.remove("active");
  //   }
  // }
  // modal();

  // sliders

  jQuery(".slider-for").slick({
    arrows: true,
    dots: false,
    autoplay: false,
    asNavFor: ".slider-nav",
    fade: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: false,
    responsive: [
      {
        breakpoint: 480,
        settings: {
          draggable: false,
        },
      },
    ],
  });

  jQuery(".slider-nav").slick({
    arrows: false,
    dots: false,
    infinite: false,
    asNavFor: ".slider-for",
    slidesToShow: 5,
    slidesToScroll: 5,
    infinite: false,
    autoplay: false,
    focusOnSelect: true,
    draggable: false,
    responsive: [
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 2,
        },
      },
    ],
  });
});
