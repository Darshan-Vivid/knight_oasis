/* Header JS start */
let scrollpos = window.scrollY;
const header = document.querySelector(".site-header");
const header_height = header.offsetHeight;
const add_class_on_scroll = () => header.classList.add("bg-white");
const remove_class_on_scroll = () => header.classList.remove("bg-white");

window.addEventListener("scroll", function () {
  scrollpos = window.scrollY;

  if (scrollpos >= header_height) {
    add_class_on_scroll();
  } else {
    remove_class_on_scroll();
  }
});

/* JS : Mobile menu */
var oepnMenu = document.querySelector(".ko-toogle-btn");
var closeMenu = document.querySelector(".ko-close-btn");
var sideBar = document.querySelector(".ko-header-menu");
var haederEl = document.querySelector(".site-header");
oepnMenu.addEventListener("click", show);
closeMenu.addEventListener("click", hide);

function show() {
  haederEl.classList.toggle("open-menu");
  sideBar.classList.add("active");
}
function hide() {
  haederEl.classList.remove("open-menu");
  sideBar.classList.remove("active");
}

const accordionItemHeaders = document.querySelectorAll(".ko-has-dropdown > a");
accordionItemHeaders.forEach(accordionItemHeader => {
   accordionItemHeader.addEventListener("click", event => {
     accordionItemHeader.classList.toggle("active");
     const accordionItemBody = accordionItemHeader.nextElementSibling;
     if(accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
     }
     else {
       accordionItemBody.style.maxHeight = 0;
     }

   });
});
/* Header JS End */


/* testimonials slider script */
if (document.getElementsByClassName("ko-splide-testimonials").length > 0) {
  document.addEventListener("DOMContentLoaded", function () {
    var splidetesto = new Splide(".ko-splide-testimonials", {
      perPage: 1,
      rewind: true,
      arrows: false,
      pagination: true,
      perMove: 1,
    });
    splidetesto.mount();
  });
}


if (document.getElementsByClassName("ko-splide-rooms").length > 0) {
  document.addEventListener("DOMContentLoaded", function () {
    var spliderooms = new Splide(".ko-splide-rooms", {
      type: "loop",
      perPage: 1,
      arrows: true,
      pagination: false,
      focus: "center",
      autoWidth: true,
      perMove: 1,
    });
    spliderooms.mount();
  });
}
