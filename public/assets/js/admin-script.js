// Admin JS
function setDeleteFormAction(element) {
    let deleteUrl = element.getAttribute("data-delete-url");
    $("#deleteForm").attr("action", deleteUrl);
    $("#deleteRecordModal").modal("show");
}

$(document).ready(function () {

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
        var currentSlug = slugCell.text();

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

        if (button.attr("id") == "ko_settings_table_site_social_links") {
            var old_links = button.data('links');
            html_string="<input type='hidden' name='settings_social_link_edited' value='true' />";
            if ($("#add_new_social_link").length === 0) {
                button.parent().append("<div class='row'><button class='btn btn-sm btn-light mt-3' id='add_new_social_link'>add new</button></div>");
            }
            console.log(old_links);
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

    $(".remove-gallery-image").on("click", function () {
        $this = $(this);
        var imageElement = $this.closest(".position-relative");
        var image_url = $this.data("image");
        var admin_url = $this.parent().parent().data("url");
        var rid = $this.parent().parent().data("id");
        console.log(image_url);
        // $.ajax({
        //     url: "/delete-gallery-image",
        //     type: "POST",
        //     data: {
        //         image: imageUrl,
        //         _token: $('meta[name="csrf-token"]').attr("content") // For Laravel CSRF protection
        //     },
        //     success: function (response) {
        //         imageElement.fadeOut(300, function () {
        //             $(this).remove();
        //         });
        //     },
        //     error: function () {
        //         alert("Failed to delete image. Please try again.");
        //     }
        // });
    });
});
