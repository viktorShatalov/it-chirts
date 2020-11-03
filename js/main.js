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

  jQuery(".slider-for").slick({
    arrows: false,
    dots: false,
    autoplay: false,
    infinite: false,
    asNavFor: ".slider-nav",
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: false,
    responsive: [
      {
        breakpoint: 480,
        settings: {},
      },
    ],
  });

  jQuery(".slider-nav").slick({
    arrows: false,
    dots: false,
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
        settings: {},
      },
    ],
  });

  // zoom

  // const zoomMargin = 1;

  // function startZoom(e) {
  //   $(".zoomer .large")
  //     .css("left", $(this).width() + zoomMargin)
  //     .show(); // Контейнер c большим изображением становится видимым.
  // }

  // function moveZoom(e) {
  //   var offset = $(this).offset(), // В переменной offset хранятся координаты блока с миниатюрой
  //     x = e.pageX - offset.left, // В переменной хранится координата X курсора мыши относительно блока с миниатюрой
  //     y = e.pageY - offset.top; // Координата Y курсора мыши.
  //   (w = $(this).width()), // Ширина миниатюры
  //     (h = $(this).height()), // Высота миниатюры
  //     // Позиционирование фона большого изображения относительно того, куда указывает курсор на миниатюре.
  //     $(".large").css({
  //       left: (x / w) * 100 + "% ",
  //       top: (y / h) * 100 + "%",
  //     });
  // }

  // function endZoom(e) {
  //   $(".zoomer .large").hide(); // Контейнер с большим изображением скрывается
  // }
  // $(".small").on({
  //   mouseenter: startZoom, // При наведении мыши на миниатюру срабатывает функция startZoom
  //   mousemove: moveZoom, // Когда курсор мыши перемещается внутри миниатюры срабатывает функция moveZoom
  //   mouseleave: endZoom, // Когда мышь уходит из области миниатюры срабатывает функция endZoom
  // });
});
