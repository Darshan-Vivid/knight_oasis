$(document).ready(function () {
    /* Header JS start */
    let scrollpos = $(window).scrollTop();
    let $header = $(".site-header");
    let header_height = $header.outerHeight();

    $(window).on("scroll", function () {
      scrollpos = $(window).scrollTop();
      if (scrollpos >= header_height) {
        $header.addClass("bg-white");
      } else {
        $header.removeClass("bg-white");
      }
    });

    /* JS : Mobile menu */
    let $openMenu = $(".ko-toogle-btn");
    let $closeMenu = $(".ko-close-btn");
    let $sideBar = $(".ko-header-menu");
    let $headerEl = $(".site-header");

    $openMenu.on("click", function () {
      $headerEl.toggleClass("open-menu");
      $sideBar.addClass("active");
    });

    $closeMenu.on("click", function () {
      $headerEl.removeClass("open-menu");
      $sideBar.removeClass("active");
    });

    /* Accordion Dropdown */
    $(".ko-has-dropdown > a").on("click", function (event) {
      event.preventDefault();
      let $this = $(this);
      $this.toggleClass("active");
      let $accordionItemBody = $this.next();
      if ($this.hasClass("active")) {
        $accordionItemBody.css("max-height", $accordionItemBody.prop("scrollHeight") + "px");
      } else {
        $accordionItemBody.css("max-height", "0");
      }
    });

    /* Testimonials slider script */
    if ($(".ko-splide-testimonials").length > 0) {
      new Splide(".ko-splide-testimonials", {
        perPage: 1,
        rewind: true,
        arrows: false,
        pagination: true,
        perMove: 1,
      }).mount();
    }

    /* Rooms slider script */
    if ($(".ko-splide-rooms").length > 0) {
      new Splide(".ko-splide-rooms", {
        type: "loop",
        perPage: 1,
        arrows: true,
        pagination: false,
        focus: "center",
        autoWidth: true,
        perMove: 1,
      }).mount();
    }

    function hide_loader(){
        $(".loader-wrap").css('display','none');
    }

    hide_loader();
  });
