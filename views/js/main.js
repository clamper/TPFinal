$(document).ready(function () {


    var more_days = "<div class='input-group-prepend'><input type='date' class='form-control' name='days'><input type='text' name='artist'><button type='button' class='btn bg-info' id='select_artist' data-toggle='modal' data-target='#myModal'>seleccionar artistas</button></div>";
    var select_day;

    $('input[name=days_radio]').change(function () {
        if (this.value == "only") {
            $("#only_day").show(300);
            $("#only_day_cost").show(300);
            $("#more_days").hide(300);
            $("#more_days_cost").hide(300);
        }
        else {
            $("#only_day").hide(300);
            $("#only_day_cost").hide(300);
            $("#more_days").show(300);
            $("#more_days_cost").show(300);
        }


    });

    $("#add_day").on("click", function () {
        //$("#list_days").append("<input type='date' class='form-control' name='days' > ");
        $("#list_days").append(more_days);
    });


    //$("#select_artist").on("click", function () {
    $('div[id=days]').on("click", "#select_artist", function () {
        select_day = $(this).prev();
        select_day.val("jjj");
    });




});