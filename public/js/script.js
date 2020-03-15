
function savePrice (id, new_price) {

    id = id.replace('price_', '');

    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/products',
        data: 'id=' + id + '&new_price=' + new_price,
        success: function(data){
            alert(data);
        },
        error: function() {
            alert ('Error');
        }
    });

}
