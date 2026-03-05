$(document).ready(function(){

// LOAD TABLE
function loadVehicles(){
    $("#vehicleTable").load("vehicle_fetch.php");
}
loadVehicles();

// OPEN ADD FORM
$("#addVehicleBtn").click(function(){
    $("#vehicleForm")[0].reset();
    $("#vehicle_id").val('');
    $(".modal-title").text("Add Vehicle");
    $("#vehicleModal").modal("show");
});

// SAVE (ADD + EDIT)
$("#vehicleForm").submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "vehicle_action.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success:function(res){
            if(res==1){
                $("#vehicleModal").modal("hide");
                loadVehicles();
            }else{
                alert("Error saving vehicle");
            }
        }
    });
});

// EDIT
$(document).on("click",".editBtn",function(){
    $("#vehicle_id").val($(this).data("id"));
    $("#vehicle_name").val($(this).data("name"));
    $("#route_ids").val($(this).data("routes").toString().split(","));
    $("#driver_name").val($(this).data("driver"));
    $(".modal-title").text("Edit Vehicle");
    $("#vehicleModal").modal("show");
});

// DELETE
$(document).on("click",".deleteBtn",function(){
    if(confirm("Delete this vehicle?")){
        $.post("vehicle_delete.php",{id:$(this).data("id")},function(res){
            if(res==1) loadVehicles();
        });
    }
});
});
