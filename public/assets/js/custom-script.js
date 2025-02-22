$(document).ready(function () {
    hide_loader();

    /* booking qty inc */
    $(".qty-btn-plus").click(function () {
        const container = $(this).closest(".qty-container"); 
        const inputQty = container.find(".input-qty");
        inputQty.val(Number(inputQty.val()) + 1);

        updateGrandTotal();
    });

    /* booking qty dec*/
    $(".qty-btn-minus").click(function () {
        const container = $(this).closest(".qty-container");
        const inputQty = container.find(".input-qty");
        const amount = Number(inputQty.val());
        if (amount > 0) {
            inputQty.val(amount - 1);
        }

        updateGrandTotal();
    });

    $('#booking-data-check_in, #booking-data-check_out').on('change', updateGrandTotal);

    $('.ko-check-wrap input[type="checkbox"]').on('change', updateGrandTotal);

    /* booking form */
    let isSubmitting = false; // Flag to prevent multiple submissions

    $("#ko_booking_form").on("submit", function (e) {
        e.preventDefault();

        // Prevent multiple submissions
        if (isSubmitting) return;

        var cin = $("#booking-data-check_in").val();
        var cout = $("#booking-data-check_out").val();
        var qty = $("#booking-data-quantity");
        var rid = $("#booking-data-hiddens").val();
        var ajax_url = $("#booking-data-hiddens").data('url');
        var token = $('meta[name="csrf-token"]').attr('content');
        var submit_btn = $('#ko-book-form-sumbit');
        var error = $(".invalid-response");

        submit_btn.prop('disabled', true).addClass('loading').text("Checking Date..");

        $.ajax({
            url: ajax_url,
            type: "POST",
            data: {
                room_id: rid,
                check_in: cin,
                check_out: cout,
                quantity: qty.val(),
                _token: token
            },
            success: function (response) {
                if (response.status == 1) {
                    isSubmitting = true;
                    $("#ko_booking_form")[0].submit();
                } else {
                    error.css("display", "block").text(response.message);
                    qty.attr('data-disable', '1');
                }
            },
            error: function (xhr) {
                console.error("Submission error:", xhr);
            }
        });
        submit_btn.prop('disabled', false).removeClass('loading').text("Book Your Stay");
    });

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

function updateGrandTotal() {
    let roomPrice = parseFloat($('#booking-data-quantity').data('price')) || 0;
    let roomQuantity = parseInt($('#booking-data-quantity').val()) || 0;
    let bedPrice = parseFloat($('#booking-data-extra_beds').data('price')) || 0;
    let extraBeds = parseInt($('#booking-data-extra_beds').val()) || 0;
    var checkIn = $('#booking-data-check_in').val();
    var checkOut = $('#booking-data-check_out').val();
    let total = 0;

    if (checkIn && checkOut) {
        var checkInDate = new Date(checkIn);
        var checkOutDate = new Date(checkOut);
        var timeDiff = checkOutDate - checkInDate;
        var dayGap = Math.floor(timeDiff / (1000 * 60 * 60 * 24)) + 1;
        var days = dayGap > 0 ? dayGap : 1;

        $('input[name="services[]"]:checked:not(:disabled)').each(function() {
            let servicePrice = parseFloat($(this).data('price')) || 0;
            total += servicePrice;
        });
        
        total += roomPrice * roomQuantity;
        total += bedPrice * extraBeds;
        
        var grand_total = days * total;
        
        $('#booking-grand-total').text(grand_total.toFixed(0));
    }
}

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
