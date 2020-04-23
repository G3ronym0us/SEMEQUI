$( document ).ready(function() {

	// EVENTOS INICIADOS AL CARGAR LA PAGINA
	$('#btn_asignar_areas').hide();
	$('#btn_asignar_equipo').hide();	
	$("#cantidad").val(1);
	id = $("#clientes_id").val();

	id_facturacion = $("#id_facturacion").val();
	agregarFacturacion(id_facturacion);

	//FIN DE LOS EVENTOS INICIADOS AL CARGAR LA PAGINA
	
	if($("#clientes_id").val() != 0){
		id = $("#clientes_id").val();
		getAreas(id);

	}		
	
	//CAMBIA LOS DATOS AL CAMBIAR DE CLIENTE
	$("#clientes_id").change(function(){
		id = $("#clientes_id").val();
		gestionarBotones(id); // Activa o Desactiva botones segun el tipo de cliente (personal/juridico)
		getAreas(id);
		getCotizaciones(id);
		getOrdenes(id);
		getUbicacion(id);
	});

	//AGREGA COTIZACION PENDIENTE
	$("#btn_agregarCotizacion").click(function(){
		id = $("#cotizaciones").val();
		agregarCotizacion(id);
	});

	//AGREGA ORDEN DE SERVICIO PENDIENTE
	$("#btn_agregarOrden").click(function(){
		id = $("#ordenes").val();
		agregarOrden(id);
	});

	//CAMBIA EL VALOR TOTAL SI CANTIDAD O VALOR UNITARIO ES ALTERADO
	$("#cantidad").keyup(calcular);
	$("#valor_unitario").keyup(calcular);


	//SELECCIONA EL VALOR UNITARIO DEL ITEM
	$("#item_id").change(function(){
		item_id = $("#item_id").val();
		getItem(item_id);
	});

	//AGREGA EL ITEM ENVIADO A LA TABLA DE DETALLES FACTURA

	$('#btn_detalle_factura').click(function(){
		agregar();

	})

		//SELECCIONA EL VALOR UNITARIO DEL ITEM
	$("#item_id").change(function(){
			item_id = $("#item_id").val();
			getItem(item_id);
	});

	// Al presionar el boton de nuevo cliente carga el codigo del cliente y los departamentos.
	$("#btn_nuevo_cliente").on('click', function(){
		getCodigoCliente();
		getDepartamentos();
	})

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
	           		getUbicacion(response);
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
	           	$('#modal-asignar-equipos').modal('hide');

	           		placa = response.placa;
	           		descripcion = response.descripcion;
	           		
	           		if(response.placa == null){
						placa = "";
					}
					if(response.descripcion == null){
						descripcion = "";
					}

	           		nombre_area = $("#area_id_me option:selected").text();
	           		area_id = $('#area_id_me').val();
	           		$('#area_id option[value="'+area_id+'"]').prop('selected',true);
	           		$('#area_id').selectpicker('refresh');
	           		

	           		$.get("/getEquipos/"+area_id,function(data) {
						$("#equipo_id").empty();
						$('#equipo_id').selectpicker('refresh');
						for (i =0; i<data.length ; i++) {
							if (data[i].id == response.id) {
								console.log('si');
								$("#equipo_id").append('<option value="'+data[i].id+'_'+data[i].descripcion+'" selected>'+data[i].nom_equipo+'</option>');
							}else{
								console.log('no');
								$("#equipo_id").append('<option value="'+data[i].id+'_'+data[i].descripcion+'">'+data[i].nom_equipo+'</option>');
							}
						}
						$('#equipo_id').selectpicker('refresh');
						toastr.success('EL EQUIPO HA SIDO ASIGNADO',  'PERFECTO!');
						
					});	

	           		
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

	$("#form_nueva_factura").submit(function(e) {

    	e.preventDefault(); // avoid to execute the actual submit of the form.

	    var form = $(this);
	    var url = form.attr('action');
	    var data = form.serialize();


	    $.ajax({
	           type: "POST",
	           url: url,
	           data: form.serialize(), // serializes the form's elements.	           
	           success: function(response)
	           {
	           		if ($('#imprimir').is(":checked")) {
	           			$("#form_nueva_factura")[0].reset();
		           		getClientes();
		           		$("#area_id").empty();
		           		$("#area_id").append('<option value="false">SELECCIONE UN AREA</option>');
		           		$("#area_id").selectpicker('refresh');
		           		$("#equipo_id").empty();
		           		$("#equipo_id").append('<option value="false">SELECCIONE UN EQUIPO</option>');
		           		$("#equipo_id").selectpicker('refresh');
		           		$('#detalles_factura tbody').empty();
		           		cont = 0;
		           		total=0;
		           		$("#totalv").html("COP/. "+total);
		           		limpiar();
		           		getCodigoFac();
		           		$('#mensaje').html('<div class="alert alert-success alert-dismissible fade show" role="alert">LA FACTURA HA SIDO CREADA CON EXITO<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		           		window.open('/imprimir/facturacion/'+response,'_blank');
	           		}else{
	           			$('#mensaje').html('<div class="alert alert-success alert-dismissible fade show" role="alert">LA FACTURA HA SIDO CREADA CON EXITO<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	           			window.location.href = "/facturacion/facturacion/create";
	           		}
	           		
	           }
	         });

	    
	});

	$('#observacion').hide(); 	
	$("#obs_check").click(function() {
        if($(this).is(":checked")){
            $('#observacion').show();         
        }else{
            $('#observacion').hide(); 
        }
    }); 

});

var f=1;
var cont=0;
var total=0;
var subtotal=[];
var c_cot=0;

$("#guardar").hide();



function agregar(){

	
	equipo=$("#equipo_id option:selected").text();
	area=$("#area_id option:selected").text();
	item=$("#item_id option:selected").text();
	cantidad=$("#cantidad").val();
	valor_unitario=$("#valor_unitario").val();
	valor_total=$("#valor_total").val();
	item_id=$("#item_id").val();
	area_id=$("#area_id").val();
	equipo_a=document.getElementById('equipo_id').value.split('_');
	rel_id = equipo_a[0];
	descripcion = equipo_a[1];
	if (descripcion == 'null') {
		descripcion = '';
	}
	if (rel_id!="" && cantidad!="" && cantidad>0 && valor_unitario!="" && valor_total!="")
	{
		subtotal[cont]=(cantidad*valor_unitario);
		total=total+subtotal[cont];
		$("#total").val(total);
		f = cont + 1;
		var fila='<tr class="selected" id="fila'+cont+'"><td><input type="text" name="id[]" value="" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'" hidden>'+cantidad+'</td><td><input type="hidden" name="rel_id[]" value="'+rel_id+'">'+equipo+' ('+area+')</td><td><input type="hidden" name="item_id[]" value="'+item_id+'">'+item+'</td><td><input type="text" name="descripcion[]" value="'+descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+valor_unitario+'" hidden>'+valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+valor_total+'" hidden>'+valor_total+'</td></tr>';		
		cont++;
		limpiar();
		$("#totalv").html("COP/. "+total);
		evaluar();
		$('#detalles_factura').append(fila);
		$('#clientes_id option:not(:selected)').remove();
	}
	else
	{
		alert("Error al ingresar los detalles de ingreso, revise los datos del articulo");
	}
}
function limpiar(){
	$("#cantidad").val(1);
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
	$('#totalv').html("Bs/. "+total);
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
					$("#equipo_id").append('<option value="'+response[i].id+'_'+response[i].descripcion+'">'+response[i].nom_equipo+'</option>');
					$('#equipo_id').selectpicker('refresh');
				}
			});
}

function getCotizaciones(id){
	$.get("/getCotizaciones/"+id,function(response) {
				$("#cotizaciones").empty();
				for (i =0; i<response.length ; i++) {
					$("#cotizaciones").append('<option value="'+response[i].id_cotizacion+'">'+response[i].cod_cotizacion+' - '+response[i].total+'</option>');
				}
			});
}

function agregarCotizacion(id){
	$.get("/agregarCotizacion/"+id,function(response) {
		console.log(response);
				$("#cotizaciones option:selected").remove();
				for (i =0; i<response.length ; i++) {
					placa = response[i].placa;
					descripcion = response[i].descripcion;
					if (descripcion == null) {
						descripcion = '';
					}
					subtotal[cont]=(response[i].cantidad*response[i].valor_unitario);
					total=total+subtotal[cont];
					$("#total").val(total);
					if (i == 0) {
						var fila='<tr class="selected" id="fila'+cont+'"><td><input type="number" name="cotizaciones_list[]" value="'+id+'" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="hidden" name="rel_id[]" value="'+response[i].rel_id+'">'+response[i].nom_equipo+' ('+response[i].nombre_area+')</td><td><input type="text" name="descripcion[]" value="'+descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';

					}else{
						var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="hidden" name="rel_id[]" value="'+response[i].rel_id+'">'+response[i].nom_equipo+' ('+response[i].nombre_area+')</td><td><input type="text" name="descripcion[]" value="'+response[i].descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';	
					}
					cont++;
					f++;
					limpiar();
					$("#totalv").html("COP/. "+total);
					evaluar();
					$('#detalles_factura').append(fila);
				}

			});
	c_cot++;
}

function getOrdenes(id){
	$.get("/getOrdenes/"+id,function(response) {
				$("#ordenes").empty();
				for (i =0; i<response.length ; i++) {
					$("#ordenes").append('<option value="'+response[i].id+'">'+response[i].cod_orden+' - '+response[i].total+'</option>');
				}
			});
}

function agregarOrden(id){
	$.get("/agregarOrden/"+id,function(response) {

				$("#ordenes option:selected").remove();
				for (i =0; i<response.length ; i++) {
					descripcion = response[i].descripcion;
					if (descripcion == null) {
						descripcion = '';
					}
					subtotal[cont]=(response[i].cantidad*response[i].valor_unitario);
					total=total+subtotal[cont];
					$("#total").val(total);
					if (i == 0) {
						var fila='<tr class="selected" id="fila'+cont+'"><td><input type="number" name="ordenes_list[]" value="'+id+'" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="hidden" name="rel_id[]" value="'+response[i].rel_id+'">'+response[i].nom_equipo+' ('+response[i].nombre_area+')</td><td><input type="text" name="descripcion[]" value="'+descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';

					}else{
						var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="hidden" name="rel_id[]" value="'+response[i].rel_id+'">'+response[i].nom_equipo+' ('+response[i].nombre_area+')</td><td><input type="text" name="descripcion[]" value="'+descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';	
					}
					cont++;
					f++;
					limpiar();
					$("#totalv").html("Bs/. "+total);
					evaluar();
					$('#detalles_factura').append(fila);
				}
			});
}

//OBTIENE LA UBICACION DEL CLIENTE AL CARGAR LA PAGINA (DEPARTAMENTO - MUNICIPIO)
function getUbicacion(id){
	$.get("/getUbicacion/"+id,function(response) {
				for (i =0; i<response.length ; i++) {
					$("#ubicacion").val(response[i].nom_municipio+' - '+response[i].nom_departamento);
				}
			});
}

// SELECCIONA EL VALOR UNITARIO DEL ITEM

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
    					if(data[c].placa == null){
							placa = "";
						}
						if(data[c].descripcion == null){
							descripcion = "";
						}
						fila = '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">'+data[c].nombre_area+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+data[c].nom_equipo+'</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">'+data[c].serial+'</div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 form-group">'+placa+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+descripcion+'</div>';
	    				$('#tabla-area-equipo').append(fila);
					}
				}else{
					fila = '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group"><b>EQUIPO</b></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group"><b>SERIAL</b></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group"><b>PLACA</b></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group"><b>DESCRIPCION</b></div>';
    				$('#tabla-area-equipo').append(fila);
    				for (c =0; c<data.length ; c++) {
    					if(data[c].placa == null){
							placa = "";
						}
						if(data[c].descripcion == null){
							descripcion = "";
						}
						fila = '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+data[c].nom_equipo+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+data[c].serial+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+placa+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 form-group">'+descripcion+'</div>';
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

//Obtiene los detalles de la factura para la vista EDIT 

function agregarFacturacion(id){
	$.get("/agregarFacturacion/"+id,function(response) {
		console.log(response);
				for (i =0; i<response.length ; i++) {
					subtotal[cont]=(response[i].cantidad*response[i].valor_unitario);
					total=total+subtotal[cont];
					$("#total").val(total);
					var fila='<tr class="selected" id="fila'+cont+'"><td><input type="text" name="id[]" value="'+response[i].id_detalle_cotizacion+'" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="equipo_id[]" value="'+response[i].id_equipo+'"><input type="hidden" name="area_id[]" value="'+response[i].id_area+'">'+response[i].nom_equipo+' ('+response[i].nombre_area+')</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="text" name="descripcion[]" value="'+response[i].descripcion+'" hidden>'+response[i].descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';
					cont++;
					f++;
					limpiar();
					$("#totalv").html("COP/. "+total);
					evaluar();
					$('#detalles_factura').append(fila);
				}
			});
}

  $('.verificar').keyup(function(){
    costo = parseInt($('#precio_compra').val());
    precio = parseInt($('#precio_venta').val());
    if (costo > precio) {
      $('#error_costo').html('El costo no puede ser mayor que el precio');
      $('#btn_guardar').attr('disabled',true);
    }else{
      $('#error_costo').html('');
      $('#btn_guardar').attr('disabled',false);
    }
  });

    function getCodigoFac() {
	$.get("/getCodigoFac/",function(response) {
		$('#cod_factura').val(response.prefijo_doc+' - '+response.num_actual);
		$('#num_actual_fac').val(response.num_actual);
		$('#id_consecutivo_fac').val(response.id_adm_consecutivo);

	});
}

function getClientes(){
	$.get("/getClientes/",function(response) {
				$("#clientes_id").empty();
				$("#clientes_id").append('<option value="">SELECCIONE UN CLIENTE</option>');
				for (i =0; i<response.length ; i++) {
					$("#clientes_id").append('<option value="'+response[i].id+'">'+response[i].nom_cliente+'</option>');
					$('#clientes_id').selectpicker('refresh');
				}
			});
}