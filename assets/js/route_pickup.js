// SAVE (ADD + EDIT)
$("#mergeForm").submit(function(e){
    e.preventDefault();

    $.post("save_route_pickup.php", $(this).serialize(), function(res){
        alert(res);
        location.reload();
    });
});

// EDIT
$(document).on("click",".editBtn",function(){
    $("#id").val($(this).data("id"));
    $("#route_id").val($(this).data("route"));

    let pickups = $(this).data("pickups").toString().split(",");
    $("#pickup_id").val(pickups);
});

// DELETE
$(document).on("click",".deleteBtn",function(){
    if(confirm("Delete this record?")){
        $.post("delete_route_pickup.php",
        {id:$(this).data("id")},
        function(res){
            alert(res);
            location.reload();
        });
    }
});
