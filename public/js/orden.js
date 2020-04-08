$( document ).ready(function() {
	
	$('#btn_asignar_areas').hide();
	$('#btn_asignar_equipo').hide();

	id_orden = $("#id").val();
	getDetallesOrden(id_orden);

	id = $("#clientes_id").val();

	
	//OBTIENE LOS DATOS DEL CLIENTE PARA LA VISATA EDIT

	if($("#clientes_id").val() != 0){
		id = $("#clientes_id").val();
		getCotizaciones(id);
		getAreas(id);
		getUbicacion(id);
		gestionarBotones(id); // Activa o Desactiva botones segun el tipo de cliente (personal/juridico)
	}

	// OBTIENE LOS DATOS PARA PODER GENERARLE UNA FACTURA AL CLIENTE SELECCIONADO
	$("#clientes_id").change(function(){
		id = $("#clientes_id").val();
		gestionarBotones(id); // Activa o Desactiva botones segun el tipo de cliente (personal/juridico)
		getAreas(id);
		getCotizaciones(id);
		getUbicacion(id);
	});

	// Al presionar el boton de nuevo cliente carga el codigo del cliente y los departamentos.
	$("#btn_nuevo_cliente").on('click', function(){
		getCodigoCliente();
		getDepartamentos();
	})

	$("#btn_agregarCotizacion").click(function(){
		id = $("#cotizaciones").val();
		agregarCotizacion(id);
	});

	//SELECCIONA EL VALOR UNITARIO DEL ITEM
	$("#item_id").change(function(){
			item_id = $("#item_id").val();
			getItem(item_id);
	});

	$("#cantidad").keyup(calcular); //CAMBIA EL VALOR TOTAL SEGUN CAMBIE LA CANTIDAD
	$("#valor_unitario").change(calcular);

	$("#area_id").change(function(){
	id_area = $("#area_id").val();
	getEquipo(id_area);
	});

	$("#form_nuevo_cliente").submit(function(e) {

    	e.preventDefault(); // avoid to execute the actual submit of the form.

	    var form = $(this);
	    var url = form.attr('action');

	    $.ajax({
	           type: "POST",
	           url: url,
	           data: form.serialize(), // serializes the form's elements.
	           success: function(response)
	           {
	           		nom_cliente = $('#nom_cliente').val();
	           		fila = '<option value="'+response+'" selected>'+nom_cliente+'</option>';
	           		$('#clientes_id').append(fila);
	           		$('#clientes_id').selectpicker('refresh');
	           		gestionarBotones(response);
	           		getUbicacion();
	           }
	         });

	    $('#modal-nuevo-cliente').modal('hide');

	    
	

   });

	/* EVENTOS PARA EL MODAL AREA */

	$("#btn_asignar_areas").on('click', function(){
		getCodigoArea();
		id = $("#clientes_id").val();
		getDatosClienteMA(id);
		getAreaMA(id);
		//mostrarAreasME(id);
	})

	$("#form_asignar_areas").submit(function(e) {

    	e.preventDefault(); // avoid to execute the actual submit of the form.

	    var form = $(this);
	    var url = form.attr('action');
	    console.log(form.serialize());
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: form.serialize(), // serializes the form's elements.
	           success: function(response)
	           {
					$("#tabla-asignar-areas").append('<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">'+response.cod_area+'</div><div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-group">'+response.nombre_area+'</div>');
					$('#area_id').append('<option value="'+response.id+'" selected>'+response.nombre_area+'</option>');
	           		$('#modal-asignar-areas').modal('hide');	
	           }
	         });

	    

	    
	});

	/* FIN MODAL AREA */

	// EVENTOS PARA EL MODAL EQUIPOS

	$("#btn_asignar_equipo").on('click', function(){
		id = $("#clientes_id").val();
		getDatosCliente(id);
		mostrarAreasME(id);
	});

	$("#form_asignar_equipo").submit(function(e) {

    	e.preventDefault(); // avoid to execute the actual submit of the form.

	    var form = $(this);
	    var url = form.attr('action');
	    console.log(form.serialize());
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: form.serialize(), // serializes the form's elements.
	           success: function(response)
	           {
	           	console.log(response);
	           		nom_equipo = $("#equipo_id_me option:selected").text();
	           		if (tipo_cliente == 'JURIDICO') {
	           		nombre_area = $("#area_id_me option:selected").text();
	           			fila = '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">'+nombre_area+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+nom_equipo+'</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">'+response.serial+'</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">'+response.placa+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+response.descripcion+'</div>';
	    				$('#tabla-area-equipo').append(fila);
	           		}else{
	           			fila = '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+nom_equipo+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+response.serial+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+response.placa+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+response.descripcion+'</div>';
	    				$('#tabla-area-equipo').append(fila);
	           		}

	           		$('#equipo_id').append('<option value="'+response.equipos_id+'" selected>'+nom_equipo+'</option>');
	           		$('#modal-asignar-equipos').modal('hide');

	           		
	           }
	         });

	    	$("#area_id_me").change(function(){
		id_area = $("#area_id_me").val();
		getEquipoME(id_area);
   });

	    

	    
	});

	//FIN MODAL EQUIPO

	/* EVENTOS PARA EL MODAL NUEVO ITEM */

	$("#btn_nuevo_item").on('click', function(){
		nom_consecutivo = 'ITEMS';
		getCodigo(nom_consecutivo);
	});

	 $("#form_nuevo_item").submit(function(e) {

    	e.preventDefault(); // avoid to execute the actual submit of the form.

	    var form = $(this);
	    var url = form.attr('action');

	    $.ajax({
	           type: "POST",
	           url: url,
	           data: form.serialize(), // serializes the form's elements.
	           success: function(response)
	           {
	           		nom_item= $('#nom_item').val();
	           		fila = '<option value="'+response+'" selected>'+nom_item+'</option>';
	           		$('#item_id').append(fila);
	           		$('#item_id').selectpicker('refresh');
	           		getItem(response);


	           }
	         });

	    $('#modal-nuevo-item').modal('hide');

	    
	});

	/* FIN DE EVENTOS PARA EL MODAL NUEVO ITEM */






});

var f=1;
var cont=0;
var total=0;
var subtotal=[];
var tipo_cliente='';
var c_cot=0;

function agregar(){

	$('#clientes_id option:not(:selected)').remove();
	nom_equipo=$("#equipo_id option:selected").text();
	nom_item=$("#item_id option:selected").text();
	area=$("#area_id option:selected").text();
	cantidad=$("#cantidad").val();
	valor_unitario=$("#valor_unitario").val();
	valor_total=$("#valor_total").val();
	id_item=$("#item_id").val();
	area_id=$("#area_id").val();
	equipo_id=document.getElementById('equipo_id').value.split('_');
	id = equipo_id[0];
	serial = equipo_id[1];
	placa = equipo_id[2];
	descripcion = equipo_id[3];
	if (placa == 'null') {
		placa = '';
	}
	if (descripcion == 'null') {
		descripcion = '';
	}
	if (equipo_id!="" && cantidad!="" && cantidad>0 && valor_unitario!="" && valor_total!="")
	{
		subtotal[cont]=(cantidad*valor_unitario);
		total=total+subtotal[cont];
		$("#total").val(total);
			var fila='<tr class="selected" id="fila'+cont+'"><td><input type="text" name="id[]" value="" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'" hidden>'+cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+id_item+'">'+nom_item+'</td><td><input type="hidden" name="equipo_id[]" value="'+id+'"><input type="hidden" name="area_id[]" value="'+area_id+'">'+nom_equipo+' ('+area+')</td><td><input type="text" name="serial[]" value="'+serial+'" hidden>'+serial+'</td><td><input type="text" name="placa[]" value="'+placa+'" hidden>'+placa+'</td><td><input type="text" name="descripcion[]" value="'+descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+valor_unitario+'" hidden>'+valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+valor_total+'" hidden>'+valor_total+'</td></tr>';
		cont++;
		f++;
		limpiar();
		$("#totalv").html("COP/. "+total);
		evaluar();
		$('#detalles_orden').append(fila);
	}
	else
	{
		alert("Error al ingresar los detalles de ingreso, revise los datos del articulo");
	}
}

function limpiar(){
	$("#cantidad").val("");
	$("#valor_unitario").val("");
	$("#valor_total").val("");
}

function evaluar(){
	if(total>0)
	{
		$("#guardar").show();
	}
	else
	{
		$("#guardar").hide();
	}
}

function eliminar(index)
{
	total=total-subtotal[index];
	$('#total').html("COP/. "+total);
	$('#fila'+index).remove();
	evaluar();
}

function calcular(){
	cantidad=$("#cantidad").val();
	valor_unitario=$("#valor_unitario").val();
	$("#valor_total").val(cantidad*valor_unitario);
}

function getAreas(id){
	$.get("/getArea/"+id,function(response) {
		$("#area_id").empty();
		$("#equipo_id").empty();
		for (i =0; i<response.length ; i++) {
			if (i === 0) {
				getEquipo(response[i].id);
			}	
			$("#area_id").append('<option value="'+response[i].id+'">'+response[i].nombre_area+'</option>');
			$('#area_id').selectpicker('refresh');
		}
	});
}

function getEquipo(id){
	$.get("/getEquipos/"+id,function(response) {
				$("#equipo_id").empty();
				for (i =0; i<response.length ; i++) {
					$("#equipo_id").append('<option value="'+response[i].id_equipo+'_'+response[i].serial+'_'+response[i].placa+'_'+response[i].descripcion+'">'+response[i].nom_equipo+'</option>');
					$('#equipo_id').selectpicker('refresh');
				}
			});
}

function getCotizaciones(id){
	$.get("/getCotizaciones/"+id,function(response) {
				$("#cotizaciones").empty();
				for (i =0; i<response.length ; i++) {
					$("#cotizaciones").append('<option value="'+response[i].id_cotizacion+'">'+response[i].cod_cotizacion+' / '+response[i].total+' COP</option>');
				}
			});
}


function agregarCotizacion(id){
	$('#clientes_id option:not(:selected)').remove();
	$.get("/agregarCotizacion/"+id,function(response) {
				$("#cotizaciones option:selected").remove();
				console.log(response);
				for (i =0; i<response.length ; i++) {
					placa = response[i].placa;
					descripcion = response[i].descripcion;
					if (placa == null) {
						placa = '';
					}
					if (descripcion == null) {
						descripcion = '';
					}
					subtotal[cont]=(response[i].cantidad*response[i].valor_unitario);
					total=total+subtotal[cont];
					$("#total").val(total);
					if (i == 0) {
						var fila='<tr class="selected" id="fila'+cont+'"><td><input type="number" name="cotizaciones_p[]" value="'+id+'" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="hidden" name="equipo_id[]" value="'+response[i].id_equipo+'">'+response[i].nom_equipo+'</td><td><input type="text" name="serial[]" value="'+response[i].serial+'" hidden>'+response[i].serial+'</td><td><input type="text" name="placa[]" value="'+placa+'" hidden>'+placa+'</td><td><input type="text" name="descripcion[]" value="'+descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';

					}else{
						var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="hidden" name="equipo_id[]" value="'+response[i].id_equipo+'">'+response[i].nom_equipo+'</td><td><input type="text" name="serial[]" value="'+response[i].serial+'" hidden>'+response[i].serial+'</td><td><input type="text" name="placa[]" value="'+placa+'" hidden>'+placa+'</td><td><input type="text" name="descripcion[]" value="'+descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';	
					}
					cont++;
					f++;
					console.log(cont);
					limpiar();
					$("#totalv").html("COP/. "+total);
					evaluar();
					$('#detalles_orden').append(fila);
				}

			});
	c_cot++;
}

function getDetallesOrden(id){
	$.get("/getDetallesOrden/"+id,function(response) {
		console.log(response);
		for (i =0; i<response.length ; i++) {
			placa = response[i].placa;
			descripcion = response[i].descripcion;
			if (placa == null) {
				placa = '';
			}
			if (descripcion == null) {
				descripcion = '';
			}
			console.log(cont);
			subtotal[cont]=(response[i].cantidad*response[i].valor_unitario);
			total=total+subtotal[cont];
			$("#total").val(total);
			var fila='<tr class="selected" id="fila'+cont+'"><td><input type="text" name="id[]" value="'+response[i].id+'" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="hidden" name="equipo_id[]" value="'+response[i].id_equipo+'"><input type="hidden" name="area_id[]" value="'+response[i].id_area+'">'+response[i].nom_equipo+' ('+response[i].nombre_area+')</td><td><input type="text" name="serial[]" value="'+response[i].serial+'" hidden>'+response[i].serial+'</td><td><input type="text" name="placa[]" value="'+placa+'" hidden>'+placa+'</td><td><input type="text" name="descripcion[]" value="'+descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';
			cont++;
			f++;
			console.log(cont);
			limpiar();
			$("#totalv").html("COP/. "+total);
			evaluar();
			$('#detalles_orden').append(fila);
		}
	});
}

function getUbicacion(id){
	$.get("/getUbicacion/"+id,function(response) {
				console.log(response);
				for (i =0; i<response.length ; i++) {
					$("#ubicacion").val(response[i].nom_municipio+' - '+response[i].nom_departamento);
				}
			});
}

function getItem(id){
	cliente_id = $("#clientes_id").val();
	item_id = $("#item_id").val();
	$.get( "/getTarifa/"+id, { cliente_id: cliente_id, item_id: item_id } )
	  .done(function( data ) {
	    			$("#valor_unitario").val(data.precio_venta);
					$('#cantidad').focus();
					calcular();
	  });
}

function gestionarBotones(id){
	$.get("/getTipoCliente/"+id,function(response) {

		$('#btn_asignar_equipo').show();
		if (response == 'JURIDICO') {
			$('#btn_asignar_areas').show();
			$('#div_area_id').show();
		}else{
			$('#btn_asignar_areas').hide();
			$('#div_area_id').hide();
		}
	});
}

//Funcione que generar el codigo para el modal nuevo cliente
function getCodigoCliente() {
	$.get("/getCodigoCliente/",function(response) {
		$('#cod_cliente').val(response[0].prefijo_doc+' - '+response[0].num_actual);
		$('#num_actual').val(response[0].num_actual);
		$('#id_consecutivo').val(response[0].id_adm_consecutivo);

	});
}

//Funcion que carga los departamentos en el modal NUEVO CLIENTE
function getDepartamentos(){
  $.get("/getDepartamentos/",function(response) {
    for (i =0; i<response.length ; i++) {
      $("#id_departamento").append('<option value="'+response[i].id+'">'+response[i].nom_departamento+'</option>');
      if (i == 0) {
      	getMunicipio(response[i].id);
      }
      
    }
  });
}

//Funcion que carga los municipios en el modal NUEVO CLIENTE
function getMunicipio(id){
  $.get("/getMunicipios/"+id,function(response) {
    $("#id_municipio").empty();
    for (i =0; i<response.length ; i++) {
      $("#id_municipio").append('<option value="'+response[i].id+'">'+response[i].nom_municipio+'</option>');
    }
  });
}

/* FUNCIONES PARA EL MODAL ASIGNAR AREA */ 

function getDatosClienteMA(id) {
	$.get("/getDatosCliente/"+id,function(response) {
		console.log(response);
    	$('#nom_cliente_ma').html(response.nom_cliente);
    	$('#id_cliente_ma').val(response.id);
  });
}

function getCodigoArea() {
	$.get("/getCodigoArea/",function(response) {
		$('#cod_area_ma').val(response[0].prefijo_doc+' - '+response[0].num_actual);
		$('#num_actual_ma').val(response[0].num_actual);
		$('#id_consecutivo_ma').val(response[0].id_adm_consecutivo);

	});
}

function getAreaMA(id) {
	$.get("/getArea/"+id,function(response) {

				$("#tabla-asignar-areas").empty();
				for (i =0; i<response.length ; i++) {	
					$("#tabla-asignar-areas").append('<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">'+response[i].cod_area+'</div><div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-group">'+response[i].nombre_area+'</div>');
				}

			});
}



/* FIN DE FUNCIONES PARA EL MODAL AREA */

//FUNCIONES MODAL EQUIPO


function getDatosCliente(id) {
	$.get("/getDatosCliente/"+id,function(response) {
    	console.log(response);
    	$('#cliente_me').html(response.nom_cliente);
    	$('#id_cliente_me').html(response.id);

    	if(response.tipo_cliente == 'JURIDICO'){
    		$('#div_area').show();
    		tipo_cliente = 'JURIDICO';
    		mostrarAreasME(id, response.tipo_cliente);
    		
    	}else{
    		$('#div_area').hide();
    		tipo_cliente = 'NATURAL';
    		mostrarAreasME(id, response.tipo_cliente);
    	}
    		getAreaME(response.id);
    		getEquiposList();
  });
}


function getAreaME(id){
	$.get("/getArea/"+id,function(response) {

				$("#area_id_me").empty();
				for (i =0; i<response.length ; i++) {	
					$("#area_id_me").append('<option value="'+response[i].id+'">'+response[i].nombre_area+'</option>');
				}

			});
}

function getEquiposList(id){
	$.get("/getEquiposList/",function(response) {
				$("#equipo_id_me").empty();
				for (i =0; i<response.length ; i++) {
					$("#equipo_id_me").append('<option value="'+response[i].id_equipo+'">'+response[i].nom_equipo+'</option>');
				}
			});
}

function mostrarAreasME(id, tipo_cliente){

			$.get("/getEquiposForArea/"+id,function(data) {
				$('#tabla-area-equipo').empty();
				if (tipo_cliente == 'JURIDICO') {
					fila = '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group"><b>AREA</b></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group"><b>EQUIPO</b></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group"><b>SERIAL</b></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group"><b>PLACA</b></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group"><b>DESCRIPCION</b></div>';
    				$('#tabla-area-equipo').append(fila);
    				for (c =0; c<data.length ; c++) {
						fila = '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">'+data[c].nombre_area+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+data[c].nom_equipo+'</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">'+data[c].serial+'</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">'+data[c].placa+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+data[c].descripcion+'</div>';
	    				$('#tabla-area-equipo').append(fila);
					}
				}else{
					fila = '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group"><b>EQUIPO</b></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group"><b>SERIAL</b></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group"><b>PLACA</b></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group"><b>DESCRIPCION</b></div>';
    				$('#tabla-area-equipo').append(fila);
    				for (c =0; c<data.length ; c++) {
						fila = '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+data[c].nom_equipo+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+data[c].serial+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+data[c].placa+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+data[c].descripcion+'</div>';
	    				$('#tabla-area-equipo').append(fila);
					}
				}
				
				
			});
		
}

//FIN DE FUNCIONES PARA EL MODAL EQUIPO

/* FUNCIONES PARA EL MODAL NUEVO ITEM */

function getCodigo(nom_consecutivo) {
	$.get("/getCodigo/"+nom_consecutivo,function(response) {
		console.log(response);
		$('#cod_item').val(response[0].prefijo_doc+' - '+response[0].num_actual);
		$('#num_actual_ni').val(response[0].num_actual);
		$('#id_consecutivo_ni').val(response[0].id_adm_consecutivo);

	});
}

/* FIN DE FUNCIONES PARA EL MODAL NUEVO ITEM */

