$(document).ready(function() {
    $('.group').toArray().forEach(element => {
        let randomColors = Math.floor(Math.random() * 16777215).toString(16);
        let color = '#' + randomColors;
        element.style.backgroundColor = color;
        element.style.border = "1px solid " + color;
    });

    $('.form-item .choose-type').on('click', function() {
        parent = $(this).parent().attr("id");
        if (parent == "item-2") {
            $("#single").removeClass('d-none');
            $("#many").addClass('d-none');
            let url = $('#single_url').val();
            $('.form-controller').attr('action', url);
        }
        if (parent == "item-3") {
            $("#many").removeClass('d-none');
            $("#single").addClass('d-none');
            let url = $('#many_url').val();
            $('.form-controller').attr('action', url);
        }
    })
});