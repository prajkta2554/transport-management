function loadReport(){
    let vehicles = $("#vehicle_filter").val();
    let routes   = $("#route_filter").val();
    let driver   = $("#driver_filter").val();

    $.post("report_fetch.php", 
        {vehicle_ids: vehicles, route_ids: routes, driver: driver}, 
        function(res){
            $("#reportTable").html(res);
        });
}

// Initial load
loadReport();

// Filter button
$("#filterBtn").click(function(){
    loadReport();
});
