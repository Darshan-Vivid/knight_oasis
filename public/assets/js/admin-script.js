// Admin JS
function setDeleteFormAction(element) {
    let deleteUrl = element.getAttribute("data-delete-url");
    $("#deleteForm").attr("action", deleteUrl);
    $("#deleteRecordModal").modal("show");
}

$(document).ready(function () {

     var checkinPicker = $(".checkin_date_picker").flatpickr({
        dateFormat: "Y-m-d",
        minDate: "today",
        defaultDate: $(".checkin_date_picker").data('old'),
        onChange: function (selectedDates) {
            var minCheckoutDate = new Date(selectedDates[0]);
            minCheckoutDate.setDate(minCheckoutDate.getDate());
            checkoutPicker.set('minDate', minCheckoutDate);
            checkoutPicker.setDate(minCheckoutDate);
        }
    });

    $(".checkin_date_picker").on('change' , function(){
        $(".checkout_date_picker").focus();
    });

    var checkoutPicker = $(".checkout_date_picker").flatpickr({
        dateFormat: "Y-m-d",
        minDate: new Date().fp_incr(0),
        defaultDate: $(".checkout_date_picker").data('old'),
    });
    /* date picker js end */

    $("input[type=number]").on("wheel", function (event) {
        event.preventDefault();
    });

    $(".search").on("keyup", function () {
        var searchValue = $(this).val().toLowerCase();
        var hasResults = false;
        $(".list.form-check-all tr").filter(function () {
            var title = $(this).find(".products h6 a").text().toLowerCase();
            var description = $(this)
                .find("td:nth-child(3)")
                .text()
                .toLowerCase();

            var isVisible =
                title.indexOf(searchValue) > -1 ||
                description.indexOf(searchValue) > -1;
            $(this).toggle(isVisible);
            if (isVisible) {
                hasResults = true;
            }
        });
        if (hasResults) {
            $(".noresult").hide();
        } else {
            $(".noresult").show();
        }
    });

    var selectedRowForSettings;
    var social_link_counter = 0;

    $("#ko_settings_table").on("click", ".ko_settings_btn", function (event) {
        var button = $(this);
        selectedRowForSettings = button.closest("tr");
        var valueCell = selectedRowForSettings.find("td").eq(1);
        var slugCell = selectedRowForSettings.find("td").eq(0);
        var currentValue = valueCell.text();
        var currentSlug = slugCell.data('slug');

        if (button.attr("id") == "ko_settings_table_text") {
            valueCell.html(
                '<input type="text" name="' + currentSlug + '" class="form-control" value="' + currentValue +'">'
            );
        }

        if (button.attr("id") == "ko_settings_table_img" ) {
            valueCell.html(
                '<input type="file" name="' + currentSlug + '" class="form-control" accept="image/*">'
            );
        }

        if (button.attr("id") == "ko_settings_table_map_link" ) {
            valueCell.html(
                '<input type="text" name="' + currentSlug + '" class="form-control" value="' + currentValue +'">'
            );
        }

        if (button.attr("id") == "ko_settings_table_textarea") {
            let textareaName = currentSlug;
            let textareaSelector = 'textarea[name="' + textareaName + '"]';
        
            valueCell.html(
                '<textarea name="' + textareaName + '" class="form-control">' + currentValue + '</textarea>'
            );
        
            initTinyMCE(textareaSelector);
        }
        

        if (button.attr("id") == "ko_settings_table_site_social_links") {
            var old_links = button.data('links');
            html_string="<input type='hidden' name='settings_social_link_edited' value='true' />";
            if ($("#add_new_social_link").length === 0) {
                button.parent().append("<div class='row'><button class='btn btn-sm btn-light mt-3' id='add_new_social_link'>add new</button></div>");
            }
            if (old_links && old_links.length  != 0 && Array.isArray(old_links)) {
                old_links.forEach(function(item) {
                    html_string += "<div class='row'>";
                    social_link_counter += 1;
                    html_string +="<button class='btn btn-subtle-danger mb-2 mt-2' id='remove_new_social_link'> remove</button>";
                    html_string +="<div class='col-xl-6'><div class='mb-3'><label class='form-label'>Icon</label><input type='url' class='form-control' name='icon_"+social_link_counter +"' value='" +item.icon +"' placeholder='https://'></div></div>";
                    html_string +="<div class='col-xl-6'><div class='mb-3'><label class='form-label'>Link</label><input type='url' class='form-control' name='url_"+social_link_counter+"' value='" +item.link +"' placeholder='https://'></div></div>";
                     html_string += "</div>";
                });
            }else{
                social_link_counter += 1;
                html_string += "<div class='row'>";
                html_string += "<button class='btn btn-subtle-danger mb-2 mt-2' id='remove_new_social_link'> remove</button>";
                html_string += "<div class='row social-link-item'><div class='col-xl-6'><div class='mb-3'><label class='form-label'>Icon</label><input type='url' class='form-control' name='icon_"+social_link_counter +"' placeholder='https://'></div></div>";
                html_string += "<div class='col-xl-6'><div class='mb-3'><label class='form-label'>Link</label><input type='url' class='form-control' name='url_"+social_link_counter+"' placeholder='https://'></div></div></div>";
                html_string += "</div>";
            }

            valueCell.html(html_string);
        }
    });

    $("#ko_settings_table").on("click", "#add_new_social_link", function (event) {
        event.preventDefault();
        $("#ko_settings_no_media").remove();
        var button = $(this);
        selectedRowForSettings = button.closest("tr");
        var valueCell = selectedRowForSettings.find("td").eq(1);

        social_link_counter += 1;
        var new_html = "<div class='row'>";
        new_html += "<button class='btn btn-subtle-danger mb-2 mt-2' id='remove_new_social_link'> remove</button>";
        new_html += "<div class='row social-link-item'><div class='col-xl-6'><div class='mb-3'><label class='form-label'>Icon</label><input type='url' class='form-control' name='icon_"+social_link_counter +"' placeholder='https://'></div></div>";
        new_html += "<div class='col-xl-6'><div class='mb-3'><label class='form-label'>Link</label><input type='url' class='form-control' name='url_"+social_link_counter+"' placeholder='https://'></div></div></div>";
        new_html += "</div>";
        valueCell.append(new_html);
    });

    $("#ko_settings_table").on("click", "#remove_new_social_link", function () {
        $(this).parent().remove();
    });

    $(".remove-room-media").on("click", function () {
        $this = $(this);
        var parent_div = $this.parent().parent();
        var mediaElement = $this.closest(".position-relative");
        var media_url = $this.data("media");
        var admin_url = parent_div.data("url");
        var rid = parent_div.data("id");
        var token = $('meta[name="csrf-token"]').attr('content');
        var media_type = parent_div.data("type");

        $.ajax({
            url: admin_url,
            type: "POST",
            data: {
                media: media_url,
                room : rid,
                type : media_type,
                _token: token
            },
            success: function (response) {
                if (response.success) {
                mediaElement.fadeOut(300, function () {$(this).remove();});
            } else {
                alert("Unexpected response received.");
            }
            },
            error: function (xhr) {
                let errorMessage = "ERROR : ";
                let response = JSON.parse(xhr.responseText);
                if (response.error) {
                    errorMessage += response.error;
                } else {
                    errorMessage += "Unknown error occurred.";
                }
                alert(errorMessage);
            }
        });
    });

    $("#booking_room_type").on('change', function() {
        $('.booking_form_services').prop('checked', false).prop('disabled', false);
        get_room_services();
    });

    function initTinyMCE(selector) {
        tinymce.init({
            selector: selector,
            height: 300,
            menubar: false,
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_style: "body { font-family: Arial, sans-serif; font-size: 14px; }"
        });
    }


    function destroyTinyMCE(selector) {
        if (tinymce.get(selector)) {
            tinymce.get(selector).remove();
        }
    }

    function get_room_services(){
        let $this = $("#booking_room_type");
        var token = $('meta[name="csrf-token"]').attr('content');
        let room_id =  $this.val();

        let ajax_url = $('#get_room_services_url').data('url');

        if(room_id !== null){
            $.ajax({
                url: ajax_url,
                type: "POST",
                data: {
                    rid : room_id,
                    _token: token
                },
                dataType: "json",
                success: function (response) {
                    if (Array.isArray(response) && response.length > 0) {
                        response.forEach(function (id) {
                            $('.booking_form_services[value="' + id + '"]').prop('checked', true).prop('disabled', true);
                        });
                    }
                }
            });
        }
    }
    get_room_services();

});
