/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $(".button-collapse").sideNav();
    $('#table-users').DataTable();
    $("select").val('10'); //seleccionar valor por defecto del select
    $('select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
    $('select').material_select(); //inicializar el select de materialize
    $('ul.tabs').tabs('select_tab', 'tab_id');
    $('.modal').modal();
    $('.modal2').modal();
    $('#modal-agregar').modal();

    $("#submit").click(function () {
        var nombre = $("#nombre").val();
        var telefono = $("#telefono").val();
        var correo = $("#correo").val();
        var contraseña = $("#password").val();

        var dataString = 'nombre=' + nombre + '&telefono=' + telefono + '&correo=' + correo + '&password=' + contraseña;
        // AJAX Code To Submit Form.
        $.ajax({
            type: "POST",
            url: "../../controllers/cajeros/ajaxsubmit.php",
            data: dataString,
            cache: false,
            success: function (data) {
                alert(data);
                $("#nombre").val("");
                $("#telefono").val("");
                $("#correo").val("");
                $("#password").val("");

            }
        });
        return false;
    });
});
