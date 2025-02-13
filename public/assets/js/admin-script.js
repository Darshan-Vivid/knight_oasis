// Admin JS
function setDeleteFormAction(element) {
    let deleteUrl = element.getAttribute("data-delete-url");
    $("#deleteForm").attr("action", deleteUrl);
    $("#deleteRecordModal").modal("show");
}

$(document).ready(function () {
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

    $("#ko_settings_table").on("click", "button", function () {
        var button = $(this);
        var row = button.closest("tr");

        if (button.attr("id").indexOf("text") !== -1) {
            var valueCell = row.find("td").eq(1);
            var slugCell = row.find("td").eq(0);

            var currentValue = valueCell.text();
            var currentSlug = slugCell.text();

            valueCell.html(
                '<input type="text" name="' +
                    currentSlug +
                    '" class="form-control" value="' +
                    currentValue +
                    '">'
            );
        }
    });
});
