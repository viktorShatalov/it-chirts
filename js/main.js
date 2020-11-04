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
    asNavFor: ".slider-nav",
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: false,
    speed: 300,
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
    focusOnSelect: true,
    draggable: false,
    variableWidth: true,
    centerMode: true,
    infinite: false,
    slidesToShow: 2,
    slidesToScroll: 2,
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
  $(".item__size .item").on("click", function () {
    $(".item__size .item").removeClass("active");
    $(this).addClass("active");
  });

  //category menu accerdeon

  // jQuery(".aside__category-shop-menu ul li:not(:first)").hide();

  jQuery(".aside__category-shop-title").on("click", function () {
    jQuery(this).next().slideToggle(500);
    jQuery(this).next().toggleClass("active");
    jQuery(this).toggleClass("active");
  });

  jQuery(".table__size").on("click", function () {
    jQuery(".table__size-pseudo").toggleClass("active");
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
