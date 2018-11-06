    ﻿Array.prototype.in_array=function(){
        for(var j in this){
            if(this[j]==arguments[0]){
                return true;
            }
        }
        return false;
    }
    var urlActual = "/Inicio";
    var funcActual = "Inicio";
    var idFuncionalidad = "contentInicio";
    var contenidoVista = null;
    function deshabilitaRetroceso(){
        window.location.hash="no-back-button";
        window.location.hash="Again-No-back-button" //chrome
        window.onhashchange=function(){window.location.hash="no-back-button";}
    }

    var strFechaToDate = function(strFecha){
        if( strFecha != null && strFecha.match(/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/)){
            var fecha = strFecha.split("/");
            return new Date(fecha[2], fecha[1] - 1, fecha[0]);
        }
        return null;
    }

    var formato_numero = function(numero, decimales, separador_decimal, separador_miles){
        numero=parseFloat(numero);
        if(isNaN(numero)){
            return "";
        }
        if(decimales!==undefined){
            // Redondeamos
            numero=numero.toFixed(decimales);
        }
        // Convertimos el punto en separador_decimal
        numero=numero.toString().replace(".", separador_decimal!==undefined ? separador_decimal : ",");

        if(separador_miles){
            // Añadimos los separadores de miles
            var miles=new RegExp("(-?[0-9]+)([0-9]{3})");
            while(miles.test(numero)) {
                numero=numero.replace(miles, "$1" + separador_miles + "$2");
            }
        }
        return '$' + numero;
    }

    var fechaActual = function(){
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();

        var output = (day<10 ? '0' : '') + day + '/' +
        (month<10 ? '0' : '') + month + '/' +
        d.getFullYear();
        return output;
    }

    var ajaxFunction = function( parametros, peticion, method ,  url , tipoARecibir , callback, callbackTipo1 ){
        //$.isLoading({ text: "Procesando su petición." });
        //$("#load-overlay .demo p").removeClass("alert-success");
        parametros.peticion = peticion;
        if (method.toUpperCase() == "POST") {
            parametros._token = _token;
        }
        $.ajax({
            async: true,
            cache: false,
            data: parametros,
            url: ruta + url,
            contentType: 'application/x-www-form-urlencoded',
            type: method,
            dataType: tipoARecibir,
            success: function (respuesta) {
                if (tipoARecibir.toUpperCase() == "JSON") {
                    if (respuesta.tipo == 0) {
                        if ( callback != null ) {
                            callback( respuesta );
                        }
                        else{
                            var mensajes = respuesta.mensajes;
                            for( var i = 0; i < mensajes.length ; i++){
                                toastr.success(mensajes[i], "!Éxito!");
                            }
                        }
                    }
                    else if (respuesta.tipo == 1) {
                        if (callbackTipo1 != null && callbackTipo1 !== undefined) {
                            callbackTipo1();
                        }
                        var mensajes = respuesta.mensajes;
                        for( var i = 0; i < mensajes.length ; i++){
                            alert(mensajes[i], "Información");
                        }
                    }
                    else{
                        if (respuesta.tipo == 5) {
                            var mensajes = respuesta.mensajes;
                            for( var i = 0; i < mensajes.length ; i++){
                                toastr.warning(mensajes[i], "¡Advertencia!");
                            }
                        }
                    }
                }
                else if(tipoARecibir.toUpperCase() == "HTML"){
                    callback( respuesta );
                }
            },
            error: function (result) {
                //toastr.error('ERROR ' + result.status + ' ' + result.statusText);
            },
            complete: function(){
                //$.isLoading("hide");
                //$("#load-overlay .demo p").html("Content Loaded").addClass("alert-success");
            }
        });
    }

    var agregarVistaMaster = function( ){
        var url = $(this).data("urlvista");
        if (urlActual == url) {
            toastr.info("Ya se encuentra en " + funcActual, "Información");
        }
        else{
            urlActual = url;
            idFuncionalidad  = $(this).data("idfuncionalidad");
            funcActual = $(this).data("nombrefuncionalidad");
            $.isLoading({ text: "Procesando la petición..." });
            $("#load-overlay .demo p").removeClass("alert-success");
            $.ajax({
                cache:false,
                type: "GET",
                url: ruta + "/vistas" + urlActual,
                dataType:'html',
                success: function (response) {
                    $("#divCuerpoMaster").empty().append(response);
                },
                error: function(xhr, textStatus, errorThrown){
                    $("#divCuerpoMaster").empty().append(xhr.responseText);
                },
                complete: function(){
                    $.isLoading("hide");
                    $("#load-overlay .demo p").html("Content Loaded").addClass("alert-success");
                }
            });
        }
    }

    var irASeccion = function () {
        $('html, body').animate({
            scrollTop: $($(this).data('selectorseccion')).offset().top
        }, 500, 'linear');
    }

    var desplazarASeccion = function(seccion){
        $('html, body').animate({
            scrollTop: $(seccion).offset().top
        }, 500, 'linear');
    }

    var enterClick = function(e){
        if (e.which == 13) {
            $(".content").find($(this).data("selector")).trigger("click");
        }
    }

    var keypressed = function(e, codigoTeclaEsperada, callback){
        if (e.keyCode == codigoTeclaEsperada) {
            callback();
        }
    }

    var enterNext = function(evt){
       if ( evt.keyCode == 13) {
           evt.preventDefault();
           var bandera = true;
           var i = 0;
           var iTope = parseInt($(this).data("itope"));
           while(bandera){
               var data = $(this).data("enter"+i++);
               if (data != "" && data !== undefined ) {
                   var elementFocus = $("#divCuerpoMaster").find( data );
                   if(elementFocus.length == 1){
                       $(elementFocus).focus().select();
                       return;
                   }
               }
               if (i > iTope || isNaN(iTope)) {
                   return;
               }
           }
       }
    }

    var desplegar = function () {
        $(this).parents(".portlet-default").children(".portlet-body").css("display") == "none" ? $(this).text("Ocultar") : $(this).text("Mostrar");
        $(this).closest("div").next().slideToggle();
    }

    var cerrar = function () {
        $(this).parents(".portlet-default").slideUp();
    }

var inicio = function () {

	var allInputs = $("body").find("input");
    $(allInputs).attr('autocomplete', 'off');
    $('input,textarea').attr('autocomplete', 'off');

    $("#divCuerpoMaster").on("click", ".btnDesplegar", desplegar);
    $("#divCuerpoMaster").on("click", ".btnCerrar", cerrar);
    $("#divCuerpoMaster").on("click",".btnIrASeccion", irASeccion);
    $("#divCuerpoMaster").on("keypress",".btnEnterClick", enterClick);
    $("#divCuerpoMaster").on("keypress", ".enterNext", enterNext);
    $(".seleccionOpcionMenu").on("click", agregarVistaMaster);
}

$(document).ready(inicio);
