$(document).ready(function () {


    var more_days = "<div class='input-group-prepend'><input type='date' class='form-control' name='days[]'><input type='hidden' name='artist[]'><button type='button' class='btn bg-info' id='select_artist' data-toggle='modal' data-target='#modal_artist'>seleccionar artistas</button></div>";
    var select_day;

    $('input[name=days_radio]').change(function () {
        if (this.value == "only") {
            $("#only_day").show(300);
            $("#only_day_cost").show(300);
            $("#more_days").hide(300);
            $("#more_days_cost").hide(300);
        } else {
            $("#only_day").hide(300);
            //$("#only_day_cost").hide(300);
            $("#more_days").show(300);
            $("#more_days_cost").show(300);
        }

    });

    $("#add_day").on("click", function () {
        $("#list_days").append(more_days);
    });


    $('div[id=days]').on("click", "#select_artist", function () {
        select_day = $(this).prev();

    });


    $("#modal_artist").on('show.bs.modal', function () {
        $('#modal_artist [type=checkbox]').each(function () {

            var artist = select_day.val().split(',');

            // reinicia todos los checks
            $('#modal_artist [type=checkbox]').each(function () {
                $(this).prop('checked', false);
            });

            // marca los artistas elegidos que fueron almacenados en el hidden
            artist.forEach(function (item) {
                $("#artist" + item).prop('checked', true);
            });

        });
    });


    $("#modal_artist").on('hide.bs.modal', function () {

        var artist = [];

        // captura los artistas elegidos y los guarda en el input hidden
        $('#modal_artist :checked').each(function () {
            artist.push($(this).attr('id').replace('artist', ''));
        });

        select_day.val(artist.toString());
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    // ABMs !!!

    $("#modal_edit").on('show.bs.modal', function () {
        $('#edit_text').val();

    });

    // EDITAR
    $('div[id=abm_container]').on("click", "#btn_edit", function () {

        $("#input_edit").val($(this).parent().find("#data").html());
        $("#index_edit").val($(this).attr("data"));
        $("#modal_edit").modal('show');

    });

    $("#edit_save").on("click", function () {
        $("#form_edit").submit();
    });

    //ELIMINAR
    $('div[id=abm_container]').on("click", "#btn_delete", function () {

        $("#index_delete").val($(this).attr("data"));
        $("#modal_delete").modal('show');

    });

    $("#delete_save").on("click", function () {
        $("#form_delete").submit();
    });

    // LOGIN
    $("#btn_login").on("click", function () {
        $("#modal_login").modal('show');
    });

    $("#btn_login_confirm").on("click", function () {
        $("#form_login").submit();
    });

    $('input[name=pass2]').keyup(function () {

        if ($('input[name=pass]').val() === $(this).val()) {
            $('#pass_hint').html('match');
            this.setCustomValidity('');
        } else {
            $('#pass_hint').html('mismatch');
            this.setCustomValidity('las contraseñas deben ser iguales');
        }
    });



    $("#open_add_cart").on("click", function () {
        $("#modal_add_location_to_cart").modal('show');
    });

    $("#modal_add_location_to_cart").on("change", "#location_cant", function () {

        var data = $(this).attr("data");
        var price = $("#price" + data).html();


        $("#total" + data).html($(this).val() * price);

        var total = 0;

        $("#modal_add_location_to_cart").each(function () {
            if ($(this).is("span"))
                alert($(this).html());
            total = total + $(this).html();
        });



        $("#total").html(total);

    });

});