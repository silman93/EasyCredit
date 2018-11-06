$(document).ready(function(){

    var recalcualarMonto = function(){
        if(validarInformacion()){
            var parametros = {};
            parametros.MontoSolicitado = $("#txtMontoSolicitado").val();
            parametros.IdPlazo = $("#ddlPlazos").val();
            ajaxFunction(parametros, "caluclarMontoCredito", "GET", "/TuCredito/SolicitudCredito", "JSON", mostrarRecalculo, null);
        }
    }

    var mostrarRecalculo = function(respuesta){
        $("#txtMontoTotalCredito").val(respuesta.datos.montoTotal);
    }

    var validarInformacion = function(){
        var monto = parseInt($("#txtMontoSolicitado").val());
        var plazo = $("#ddlPlazos").val();
        if ( plazo != null && !isNaN(monto)) {
            return true;
        }
        return false;
    }

    $("#btnRecalcularMontoFinal").on("click", recalcualarMonto);
    $("#ddlPlazos, #txtMontoSolicitado").on("change", recalcualarMonto);
});
