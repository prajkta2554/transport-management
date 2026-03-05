$(document).ready(function(){

// LOAD ROUTES
function loadRoutes(){
    $("#routeTable").load("route_fetch.php");
}
loadRoutes();

// OPEN ADD
$("#addRouteBtn").click(function(){
    $("#routeForm")[0].reset();
    $("#route_id").val("");
    $(".modal-title").text("Add Route");
    $("#routeModal").modal("show");
});

// SAVE (ADD + EDIT)
$("#routeForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: "route_action.php",
        type: "POST",
        data: $(this).serialize(),
        success:function(res){
            if(res == 1){
                $("#routeModal").modal("hide");
                loadRoutes();
            }else{
                alert("Error saving route");
            }
        }
    });
});

// EDIT
$(document).on("click",".editBtn",function(){
    $("#route_id").val($(this).data("id"));
    $("#route_name").val($(this).data("route"));
    $(".modal-title").text("Edit Route");
    $("#routeModal").modal("show");
});

// DELETE
$(document).on("click",".deleteBtn",function(){
    if(confirm("Delete this route?")){
        $.post("route_action.php",{delete_id:$(this).data("id")},function(res){
            if(res == 1){
                loadRoutes();
            }else{
                alert("Delete failed");
            }
        });
    }
});

});
