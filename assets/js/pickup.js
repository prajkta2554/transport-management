$(document).ready(function () {

    $('#pickupForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: '../pickup/pickup_action.php', // ✅ FIXED PATH
            type: 'POST',
            data: {
                action: 'save',
                pickup_id: $('#pickup_id').val(),
                pickup_point: $('#pickup_point').val()
            },
            success: function (res) {
                console.log(res); // debug
                location.reload();
                
            }
        });
    });

    $('.editBtn').click(function () {
        let id = $(this).data('id');

        $.ajax({
            url: '../pickup/pickup_fetch.php', // ✅ FIXED PATH
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                $('#pickup_id').val(data.id);
                $('#pickup_point').val(data.pickup_point);
            }
        });
    });

    $('.deleteBtn').click(function () {
        if (!confirm("Delete this pickup point?")) return;

        let id = $(this).data('id');

        $.ajax({
            url: '../pickup/pickup_action.php', // ✅ FIXED PATH
            type: 'POST',
            data: {
                action: 'delete',
                id: id
            },
            success: function () {
                location.reload();
            }
        });
    });

});
