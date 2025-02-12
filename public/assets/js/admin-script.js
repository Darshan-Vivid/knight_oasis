// Admin JS
function setDeleteFormAction(blogId) {
    let form = $('#deleteForm');
    form.attr('action', '/blogs/' + blogId);


    $('#deleteRecordModal').modal('show');
}

$(document).ready(function() {
    $('.search').on('keyup', function() {
        var searchValue = $(this).val().toLowerCase();
        var hasResults = false;
        $('.list.form-check-all tr').filter(function() {
            var title = $(this).find('.products h6 a').text().toLowerCase();
            var description = $(this).find('td:nth-child(3)').text().toLowerCase();

            var isVisible = title.indexOf(searchValue) > -1 || description.indexOf(
                searchValue) > -1;
            $(this).toggle(isVisible);
            if (isVisible) {
                hasResults = true;
            }
        });
        if (hasResults) {
            $('.noresult').hide();
        } else {
            $('.noresult').show();
        }
    });
});
