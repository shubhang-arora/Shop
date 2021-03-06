var box, add, id, deleted;
$(document).on('click', '.add-remove', function (e) {
    add = $(this).hasClass('add');
    id = $(this).attr("id");
    box = $(this).parent().parent();
    deleted = $(this).hasClass('deleted');
    id = parseInt(id);
    if(!deleted) {
        var expiry;
        if ($(this).hasClass('add')) {
            expiry = $('[id="expiry_date#' + id + '"]').val();
        }
        else {
            expiry = null;
        }
        if (expiry === '') {
            $('[id="expiry_date#' + id + '"]').parent().addClass('has-error').children('small').show();
        }
        else {
            $('[id="expiry_date#' + id + '"]').parent().removeClass('has-error').children('small').hide();
            $.ajax({
                url: '/add-shop',
                type: "post",
                data: {
                    'id': id,
                    'add': add,
                    'expiry_date': expiry,
                    'type': 'do',
                    '_token': $('[name=_token]').attr('content')
                },
                success: function (data) {
                    var alert = '';
                    if (data == 1) {
                        alert = '<div class="alert alert-success"><a href="#" class="close" name = ' + id + ' id="undo" data-dismiss="alert" aria-label="close">Undo</a><strong>Added</strong> Shop!</div>';
                    }
                    else {
                        alert = '<div class="alert alert-danger"><a href="#" class="close"  name = ' + id + ' id="undo" data-dismiss="alert" aria-label="close">Undo</a><strong>Deleted</strong> Shop!</div>';
                    }
                    box.slideUp();
                    box.parent().prepend(alert);
                    box.parent().find('.alert-message').delay(7000).slideUp();
                }
            })
        }
    }
    else{
        $.ajax({
            url: '/add-shop',
            type: "post",
            data: {'id': id, 'add': add, 'type': 'delete_do', '_token': $('[name=_token]').attr('content')},
            success: function (data) {
                var alert = '';
                if (data == 1) {
                    alert = '<div class="alert alert-success"><a href="#" class="close" name = ' + id + ' id="undo" data-dismiss="alert" aria-label="close">Undo</a><strong>Added</strong> Shop!</div>';
                }
                else {
                    alert = '<div class="alert alert-danger"><a href="#" class="close"  name = ' + id + ' id="undo" data-dismiss="alert" aria-label="close">Undo</a><strong>Deleted</strong> Shop!</div>';
                }
                box.slideUp();
                box.parent().prepend(alert);
                box.parent().find('.alert-message').delay(7000).slideUp();
            }
        })
    }
});

$(document).on('click', '#undo', function () {
    if(!deleted){
        $.ajax({
            url: '/add-shop',
            type: "post",
            data: {'id': id, 'add': add, 'type': 'undo', '_token': $('[name=_token]').attr('content')},
            success: function (data) {
                box.slideDown();
            }
        })
    }
    else{
        $.ajax({
            url: '/add-shop',
            type: "post",
            data: {'id': id, 'add': add, 'type': 'delete_undo', '_token': $('[name=_token]').attr('content')},
            success: function (data) {
                box.slideDown();
            }
        })

    }
    
});