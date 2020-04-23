$( document ).ready(function() {
	$('span.number').number( true, 2 );
	$('#btn_asignar_areas').hide();
	$('#btn_asignar_equipos').hide();
	$("#btn_guardar_cotizacion").hide();
	$("#cantidad").val(1);

	id_cotizacion = $("#id_cotizacion").val();
	agregarCotizacion(id_cotizacion);

	//OBTIENE LOS DATOS DEL CLIENTE PARA LA VISATA EDIT

	if($("#clientes_id").val() != 0){
		id = $("#clientes_id").val();
		getArea(id);
		getUbicacion(id);
		gestionarBotones(id); // Activa o Desactiva botones segun el tipo de cliente (personal/juridico)
	}
	
	//SELECCIONA EL VALOR UNITARIO DEL ITEM
	$("#item_id").change(function(){
		item_id = $("#item_id").val();
		getItem(item_id);
	});

	$("#cantidad").keyup(calcular);
	$("#valor_unitario").keyup(calcular);

	// OBTIENE LOS DATOS PARA PODER GENERARLE UNA FACTURA AL CLIENTE SELECCIONADO
	$("#clientes_id").change(function(){
		id = $("#clientes_id").val();
		getArea(id);
		getUbicacion(id);
		gestionarBotones(id); // Activa o Desactiva botones segun el tipo de cliente (personal/juridico)
     });

	$("#area_id").change(function(){
		id_area = $("#area_id").val();
		getEquipo(id_area);
   });

	$("#area_id_me").change(function(){
		id_area = $("#area_id_me").val();
   });

	$("#btn_nuevo_cliente").on('click', function(){
		getCodigoCliente();
		getDepartamentos();
	})

	$("#btn_asignar_equipos").on('click', function(){
		id = $("#clientes_id").val();
		getDatosCliente(id);
	})

	$('#id_departamento').on('change',function(){
	  id = $('#id_departamento').val();
	  getMunicipio(id);
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
					getUbicacion(response);
					gestionarBotones(response);
	           }
	         });

	    $('#modal-nuevo-cliente').modal('hide');

	    
	});

	 $("#form_asignar_equipo").submit(function(e) {

    	e.preventDefault(); // avoid to execute the actual submit of the form.

	    var form = $(this);
	    var url = form.attr('action');
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

	    

	    
	});

	/* EVENTOS PARA EL MODAL AREA */

	$("#btn_asignar_areas").on('click', function(){
		getCodigoArea();
		id = $("#clientes_id").val();
		getDatosClienteMA(id);
	
	})

	$("#form_asignar_areas").submit(function(e) {

    	e.preventDefault(); // avoid to execute the actual submit of the form.

	    var form = $(this);
	    var url = form.attr('action');
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: form.serialize(), // serializes the form's elements.
	           success: function(response)
	           {
					$("#modal-asignar-areas").modal('hide');
					$("#area_id").append('<option value="'+response.id+'" selected>'+response.nombre_area+'</option>');
					$('#area_id').selectpicker('refresh');
					$('#nombre_area_ma').val('');
					toastr.success('EL AREA HA SIDO ASIGNADA',  'PERFECTO!');

	           }
	         });


	    

	    
	});

	/* FIN MODAL AREA */

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
	           		getItem(response);
	           		$('#item_id').selectpicker('refresh');
	           }
	         });

	    $('#modal-nuevo-item').modal('hide');
	    toastr.success('EL ITEM HA SIDO AGREGADO',  'PERFECTO!');

	    
	});

	/* FIN DE EVENTOS PARA EL MODAL NUEVO ITEM */

	$("#form_nueva_cot").submit(function(e) {

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
	           			$("#form_nueva_cot")[0].reset();
		           		getClientes();
		           		$("#area_id").empty();
		           		$("#area_id").selectpicker('refresh');
		           		$("#equipo_id").empty();
		           		$("#equipo_id").selectpicker('refresh');
		           		$("#item_id option:selected").prop("selected", false);
		           		$("#item_id").selectpicker('refresh');
		           		$('#detalles_cotizacion tbody').empty();
		           		cont = 0;
		           		total=0;
		           		$("#totalv").html("COP/. "+total);
		           		limpiar();
		           		getCodigoCot();
		           		$('#mensaje').html('<div class="alert alert-success alert-dismissible fade show" role="alert">LA COTIZACION HA SIDO CREADA CON EXITO<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		           		window.open('/imprimir/cotizacion/'+response,'_blank');
	           		}else{
	           			window.location.href = "/facturacion/cotizacion/create";
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
var tipo_cliente='';


 
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
	if (descripcion == "null") {
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
		$('#detalles_cotizacion').append(fila);
		$('#clientes_id option:not(:selected)').remove();
	}
	else
	{
		toastr.error('LOS DATOS DEL ITEM NO ESTAN COMPLETOS', 'ERROR!');
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
		$("#btn_guardar_cotizacion").show();
	}
	else
	{
		$("#btn_guardar_cotizacion").hide();
	}
}

function eliminar(index)
{
	total=total-subtotal[index];
	$('#totalv').html("COP/. "+total);
	$('#fila'+index).remove();
	evaluar();
}

function calcular(){
	cantidad=$("#cantidad").val();
	valor_unitario=$("#valor_unitario").val();
	$("#valor_total").val(cantidad*valor_unitario);
}

function getArea(id) {
	$.get("/getArea/"+id,function(response) {
			$("#area_id").empty();
			$('#area_id').selectpicker('refresh');
			$.get("/getTipoCliente/"+id,function(data) {
				$("#equipo_id").empty();

				for (i =0; i<response.length ; i++) {
				if (i === 0) {
					getEquipo(response[i].id);
				}	
					$("#area_id").append('<option value="'+response[i].id+'">'+response[i].nombre_area+'</option>');
					$('#area_id').selectpicker('refresh');
				}
			});
		});
}

function getEquipo(id){
	$.get("/getEquipos/"+id,function(response) {
				$("#equipo_id").empty();
				$('#equipo_id').selectpicker('refresh');
				for (i =0; i<response.length ; i++) {
					$("#equipo_id").append('<option value="'+response[i].id+'_'+response[i].descripcion+'">'+response[i].nom_equipo+'</option>');
					$('#equipo_id').selectpicker('refresh');
				}
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

function agregarCotizacion(id){
	$.get("/agregarCotizacion/"+id,function(response) {
				$("#cotizaciones").empty();
				for (i =0; i<response.length ; i++) {
					subtotal[cont]=(response[i].cantidad*response[i].valor_unitario);
					total=total+subtotal[cont];
					if (response[i].descripcion == null) {
						descripcion = "";
					}else{
						descripcion = response[i].descripcion;
					}
					$("#total").val(total);
					var fila='<tr class="selected" id="fila'+cont+'"><td><input type="text" name="id[]" value="'+response[i].id_detalle_cotizacion+'" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="rel_id[]" value="'+response[i].rel_id+'">'+response[i].nom_equipo+' ('+response[i].nombre_area+')</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="text" name="descripcion[]" value="'+descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';
					cont++;
					f++;
					limpiar();
					$("#totalv").html("COP/. "+total);
					evaluar();
					$('#detalles_cotizacion').append(fila);
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

function getUbicacion(id){
	$.get("/getUbicacion/"+id,function(response) {
				for (i =0; i<response.length ; i++) {
					$("#ubicacion").val(response[i].nom_municipio+' - '+response[i].nom_departamento);
				}
			});
}

function getCodigoCliente() {
	$.get("/getCodigoCliente/",function(response) {
		$('#cod_cliente').val(response[0].prefijo_doc+' - '+response[0].num_actual);
		$('#num_actual').val(response[0].num_actual);
		$('#id_consecutivo').val(response[0].id_adm_consecutivo);

	});
}

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

function getMunicipio(id){
  $.get("/getMunicipios/"+id,function(response) {
    $("#id_municipio").empty();
    for (i =0; i<response.length ; i++) {
      $("#id_municipio").append('<option value="'+response[i].id+'">'+response[i].nom_municipio+'</option>');
    }
  });
}

function getDatosCliente(id) {
	$.get("/getDatosCliente/"+id,function(response) {
    	$('#cliente_me').html(response.nom_cliente);
    	$('#id_cliente_me').html(response.id);

    	if(response.tipo_cliente == 'JURIDICO'){
    		$('#div_area').show();
    		tipo_cliente = 'JURIDICO';
    		
    	}else{
    		$('#div_area').hide();
    		tipo_cliente = 'NATURAL';
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


/* FUNCIONES PARA EL MODAL ASIGNAR AREA */ 

function getDatosClienteMA(id) {
	$.get("/getDatosCliente/"+id,function(response) {
	
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



/* FIN DE FUNCIONES PARA EL MODAL AREA */

/* FUNCIONES PARA EL MODAL NUEVO ITEM */

function getCodigo(nom_consecutivo) {
	$.get("/getCodigo/"+nom_consecutivo,function(response) {
		$('#cod_item').val(response[0].prefijo_doc+' - '+response[0].num_actual);
		$('#num_actual_ni').val(response[0].num_actual);
		$('#id_consecutivo_ni').val(response[0].id_adm_consecutivo);

	});
}

function getCodigoCot() {
	$.get("/getCodigoCot/",function(response) {
		$('#cod_cotizacion').val(response.prefijo_doc+' - '+response.num_actual);
		$('#num_actual_cot').val(response.num_actual);
		$('#id_consecutivo_cot').val(response.id_adm_consecutivo);

	});
}


/* FIN DE FUNCIONES PARA EL MODAL NUEVO ITEM */

function gestionarBotones(id){
	$.get("/getTipoCliente/"+id,function(response) {
	
		$('#btn_asignar_equipos').show();
		if (response == 'JURIDICO') {
			$('#btn_asignar_areas').show();
			$('#div_area_id').show();
		}else{
			$('#btn_asignar_areas').hide();
			$('#div_area_id').hide();
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
