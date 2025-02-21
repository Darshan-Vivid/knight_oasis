$(document).ready(function () {
    hide_loader();
});

/* booking form */
document.getElementById("ko-book-form-sumbit").addEventListener("click", function (event) {
  event.preventDefault();
  if (selectedDates.length === 2) {
    console.log("Start Date:", selectedDates[0].toISOString().split('T')[0]);
    console.log("End Date:", selectedDates[1].toISOString().split('T')[0]);
  } else {
    console.log("Please select a full date range.");
  }
});

/* Header JS start */
document.addEventListener("touchmove", Scroll, false);
document.addEventListener("scroll", Scroll, false);
document.body.addEventListener("scroll", Scroll, false);
window.addEventListener("resize", Scroll, false);

/* JS : Mobile menu */
var oepnMenu = document.querySelector(".ko-toogle-btn");
var closeMenu = document.querySelector(".ko-close-btn");
var sideBar = document.querySelector(".ko-header-menu");
var haederEl = document.querySelector(".site-header");
oepnMenu.addEventListener("click", show);
closeMenu.addEventListener("click", hide);

const accordionItemHeaders = document.querySelectorAll(
    ".ko-has-dropdown > a, .ko-cartTotals-head"
);
accordionItemHeaders.forEach((accordionItemHeader) => {
    accordionItemHeader.addEventListener("click", (event) => {
        accordionItemHeader.classList.toggle("active");
        const accordionItemBody = accordionItemHeader.nextElementSibling;
        if (accordionItemHeader.classList.contains("active")) {
            accordionItemBody.style.maxHeight =
                accordionItemBody.scrollHeight + "px";
        } else {
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

var scrollToTopBtn = document.querySelector(".scrollToTopBtn");
var rootElement = document.documentElement;

scrollToTopBtn.addEventListener("click", scrollToTop);
document.addEventListener("scroll", handleScroll);

/* Golbel Loader*/
window.addEventListener("load", function () {
    setTimeout(function () {
        document.querySelector(".loader-wrap").classList.add("loaded");
    }, 1200);
});

/* Login Register Password JS */
var hideShowEl = document.querySelector("#pass_hideShow");
var loginPassEl = document.getElementById("ko_loginRegister_input");
if (loginPassEl != null) {
    hideShowEl.addEventListener("click", function () {
        loginPassword();
    });
}

const buttonPlus = document.querySelectorAll(".qty-btn-plus");
const buttonMinus = document.querySelectorAll(".qty-btn-minus");

buttonPlus.forEach((button) => {
    button.addEventListener("click", function () {
        const container = this.closest(".qty-container");
        const inputQty = container.querySelector(".input-qty");
        inputQty.value = Number(inputQty.value) + 1;
    });
});

buttonMinus.forEach((button) => {
    button.addEventListener("click", function () {
        const container = this.closest(".qty-container");
        const inputQty = container.querySelector(".input-qty");
        const amount = Number(inputQty.value);
        if (amount > 0) {
            inputQty.value = amount - 1;
        }
    });
});

function Scroll() {
    var mainElementPosition = document.querySelector(".site-header");
    var elementPosition = mainElementPosition.offsetTop;
    var windowScroll = window.scrollY;
    var bodyScroll = document.body.scrollTop;
    var checkScroll = windowScroll > bodyScroll ? windowScroll : bodyScroll;
    if (checkScroll > elementPosition) {
        document.body.classList.add("sticky-mode");
    } else {
        document.body.classList.remove("sticky-mode");
    }
}

function loginPassword() {
    if (loginPassEl.type === "password") {
        loginPassEl.type = "text";
    } else {
        loginPassEl.type = "password";
    }
}

function handleScroll() {
    var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
    if (rootElement.scrollTop / scrollTotal > 0.08) {
        scrollToTopBtn.classList.add("showBtn");
    } else {
        scrollToTopBtn.classList.remove("showBtn");
    }
}

function scrollToTop() {
    rootElement.scrollTo({
        top: 0,
        behavior: "smooth",
    });
}

function show() {
    haederEl.classList.toggle("open-menu");
    sideBar.classList.add("active");
}
function hide() {
    haederEl.classList.remove("open-menu");
    sideBar.classList.remove("active");
}

function hide_loader() {
    $(".loader-wrap").css("display", "none");
}
