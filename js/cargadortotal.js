$(document).ready(function(){$("#cargando").ajaxStart(function(){$(this).html('Cargando...').addClass('cargando');}).ajaxSuccess(function() {$(this).html('').removeClass('cargando').ajaxError(function(event, XMLHttpRequest, ajaxOptions, thrownError) {$(this).html('Hubo en error en la Solicitud Intentelo de Nuevo<br>o<br>Compruebe que el SERVIDOR este funcionando')});});});
$(document).ready(function(e) {
						    
    if($.browser.msie){$("input.radio").removeClass("radio").addClass("radioie");}
	$(document).ajaxSuccess(function(event, XMLHttpRequest, ajaxOptions) {
		$("html").niceScroll({cursorwidth:"13"});
		$("html").getNiceScroll().resize();
        if($.browser.msie){$("input.radio").removeClass("radio").addClass("radioie");}
    });
});