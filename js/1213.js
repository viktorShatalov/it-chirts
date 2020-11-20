// определение города

jQuery(document).ready(function ($) {
  window.onload = function () {
    $("#user-city,#user-city2").text(ymaps.geolocation.city);
    // убрал всплывашку
    $(".re-question").hide();
  };

  // slick-slider

  $(".re-info-slider").slick({
    autoplay: true,
    infinite: true,
    arrows: false,
    dots: false,
    autoplaySpeed: 3000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          dots: false,
        },
      },
    ],
  });

  $(".re-currentOffers-slider").slick({
    autoplay: true,
    infinite: true,
    arrows: true,
    dots: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplaySpeed: 1500,
    centerMode: true,
    variableWidth: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          infinite: true,
          slidesToShow: 4,
          slidesToScroll: 1,
          arrows: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        },
      },
    ],
  });

  $(".re-newProduct-items").slick({
    autoplay: true,
    infinite: true,
    arrows: false,
    dots: false,
    autoplaySpeed: 1800,
    slidesToShow: 5,
    slidesToScroll: 1,
    centerMode: true,
    variableWidth: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          infinite: true,
          slidesToShow: 4,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // menu -mobile

  $(".burger").click(function () {
    $(".burger,.re-mobile-menu").toggleClass("active");
    $("body").toggleClass("lock");
  });

  // modal

  function modal() {
    const openModalButtons = document.querySelectorAll("[data-modal-target]");

    const closeModalButtons = document.querySelectorAll("[data-close-button]");

    const overlay = document.getElementById("re-overlay");

    openModalButtons.forEach((button) => {
      button.addEventListener("click", () => {
        const modal = document.querySelector(button.dataset.modalTarget);

        openModal(modal);
      });
    });

    overlay.addEventListener("click", () => {
      const modals = document.querySelectorAll(".re-modal.active");

      modals.forEach((modal) => {
        closeModal(modal);
      });
    });

    closeModalButtons.forEach((button) => {
      button.addEventListener("click", () => {
        const modal = button.closest(".re-modal");

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

  // footer sub-menu

  if ($(window).width() > 768) {
    // Тут код для больших разрешений,
    //с шириной окна с сайтом больше 768 писелей
  } else {
    // Тут код для маленьких экранов
    $(".re-menu-column ul li").hide();
    $(".re-menu-column h3").click(function () {
      $(".re-menu-column ul li").toggle("slow");
    });
    // categoryPage sidebar-filtr
    // $(".re-sidebar-filtr").hide();
    // $(".re-sidebar-help__btn button").click(
    //   function () {
    //     $(".re-sidebar-filtr").toggle('slow')
    //   }
    // );
  }

  // card ptoduct description TABS

  $(".re-btn").click(function () {
    var id = $(this).attr("data-tab"),
      content = $('.re-specifications__block[data-tab="' + id + '"]');
    $(".re-btn.active").removeClass("active");
    $(this).addClass("active");
    $(".re-specifications__block.active").removeClass("active");
    content.addClass("active");
  });

  // сортировка по цене на странице category

  $("#re-category__sortBy").ready(function () {
    $("#re-down-price").hide();
    $("#re-img-sort").on("click", function () {
      $("#re-down-price").toggle("slow");
    });
  });

  // categoryPage filtr

  $(".re-sidebar-filtr").ready(function () {
    $(".re-filtr-item__sub").hide();
    $(".re-filtr-item").click(function () {
      $(this).children(".re-filtr-item__sub").stop(true, true).toggle("slow");
    });
  });

  // Валидация формы в корзине

//   function checkParams() {
    const cartTel = $("#phone").val();
    // var name = $('#name').val();
    // var mail = $('#mail').val();
    if (cartTel.length != 0) {
      $("#orderForm-btn").removeAttr("disabled");
    } else {
      $("#orderForm-btn").attr("disabled", "disabled");
    }
//   }

  // counter btn
  $("a.anim_btn[form='myForm']").click(function () {
    document.getElementById("myForm").submit();
  });
  $("a.anim_btn[form='myForm2']").click(function () {
    document.getElementById("myForm2").submit();
  });
});
