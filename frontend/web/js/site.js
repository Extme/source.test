$().ready(function () {
    $(document).on('beforeSubmit', '#test-form', function () {

        $.ajax({
            url: '/index.php?r=site%2Fapi',
            type: 'GET',
            encoding: 'UTF-8',
            dataType: 'json',
            success: function (response) {
                console.log('success');
                console.log(response.data);
                $('#test-image-js').attr('src', response.data);
                $('#test-image-js').show();
                $('#test-form-js').hide();
            },
            fail: function (response) {
                console.log('Ajax Error');
            }
        });

        return false;
    });

    $('.js-modal-show').click(function() {
        $('#testmodel-verifycode-image').click();
        $('#test-image-js').attr('src', '#');
        $('#test-image-js').hide();
        $('#test-form-js').show();
        $('#modal').modal({'show' : true});
    });
});