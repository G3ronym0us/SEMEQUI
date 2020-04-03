$( document ).ready(function() {
	
	id_orden = $("#id").val();
	getDetallesOrden(id_orden);

	id = $("#clientes_id").val();
	
	getAreas(id);
	getCotizaciones(id);
	getUbicacion(id);

	$("#clientes_id").change(function(){
		id = $("#clientes_id").val();
		getAreas(id);
		getCotizaciones(id);
	});

	$("#btn_agregarCotizacion").click(function(){
		id = $("#cotizaciones").val();
		agregarCotizacion(id);
	});

	$("#item_id").change(function(){
			item_id = $("#item_id").val();
			getItem(item_id);


	   });

	$("#cantidad").change(calcular);
	$("#valor_unitario").change(calcular);

		$("#area_id").change(function(){
		id_area = $("#area_id").val();
		getEquipo(id_area);
   });

});

var f=1;
var cont=0;
var total=0;
var subtotal=[];

function agregar(){

	nom_equipo=$("#equipo_id option:selected").text();
	nom_item=$("#item_id option:selected").text();
	cantidad=$("#cantidad").val();
	valor_unitario=$("#valor_unitario").val();
	valor_total=$("#valor_total").val();
	id_item=$("#item_id").val();
	equipo_id=document.getElementById('equipo_id').value.split('_');
	id = equipo_id[0];
	serial = equipo_id[1];
	placa = equipo_id[2];
	descripcion = equipo_id[3];
	if (equipo_id!="" && cantidad!="" && cantidad>0 && valor_unitario!="" && valor_total!="")
	{
		subtotal[cont]=(cantidad*valor_unitario);
		total=total+subtotal[cont];
		$("#total").val(total);
			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button>'+f+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'" hidden>'+cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+id_item+'">'+nom_item+'</td><td><input type="hidden" name="equipo_id[]" value="'+id+'">'+nom_equipo+'</td><td><input type="text" name="serial[]" value="'+serial+'" hidden>'+serial+'</td><td><input type="text" name="placa[]" value="'+placa+'" hidden>'+placa+'</td><td><input type="text" name="descripcion[]" value="'+descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+valor_unitario+'" hidden>'+valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+valor_total+'" hidden>'+valor_total+'</td></tr>';
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
		}
	});
}

function getEquipo(id){
	$.get("/getEquipos/"+id,function(response) {
				$("#equipo_id").empty();
				for (i =0; i<response.length ; i++) {
					$("#equipo_id").append('<option value="'+response[i].id_equipo+'_'+response[i].serial+'_'+response[i].placa+'_'+response[i].descripcion+'">'+response[i].nom_equipo+'</option>');
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
	console.log(id+'cot');
	$.get("/agregarCotizacion/"+id,function(response) {
				$("#cotizaciones option:selected").remove();
				console.log(response);
				for (i =0; i<response.length ; i++) {
					console.log(cont);
					subtotal[cont]=(response[i].cantidad*response[i].valor_unitario);
					total=total+subtotal[cont];
					$("#total").val(total);
					if (i == 0) {
						var fila='<tr class="selected" id="fila'+cont+'"><td><input type="number" name="cotizaciones[]" value="'+id+'" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="hidden" name="equipo_id[]" value="'+response[i].id_equipo+'">'+response[i].nom_equipo+'</td><td><input type="text" name="serial[]" value="'+response[i].serial+'" hidden>'+response[i].serial+'</td><td><input type="text" name="placa[]" value="'+response[i].placa+'" hidden>'+response[i].placa+'</td><td><input type="text" name="descripcion[]" value="'+response[i].descripcion+'" hidden>'+response[i].descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';

					}else{
						var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="hidden" name="equipo_id[]" value="'+response[i].id_equipo+'">'+response[i].nom_equipo+'</td><td><input type="text" name="serial[]" value="'+response[i].serial+'" hidden>'+response[i].serial+'</td><td><input type="text" name="placa[]" value="'+response[i].placa+'" hidden>'+response[i].placa+'</td><td><input type="text" name="descripcion[]" value="'+response[i].descripcion+'" hidden>'+response[i].descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';	
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
	cotizaciones[c_cot] = id;
	c_cot++;
}

function getDetallesOrden(id){
	$.get("/getDetallesOrden/"+id,function(response) {
		console.log(response);
		for (i =0; i<response.length ; i++) {
			console.log(cont);
			subtotal[cont]=(response[i].cantidad*response[i].valor_unitario);
			total=total+subtotal[cont];
			$("#total").val(total);
			var fila='<tr class="selected" id="fila'+cont+'"><td><input type="text" name="id[]" value="'+response[i].id+'" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="item_id[]" value="'+response[i].id_item+'">'+response[i].nom_item+'</td><td><input type="hidden" name="equipo_id[]" value="'+response[i].id_equipo+'">'+response[i].nom_equipo+'</td><td><input type="text" name="serial[]" value="'+response[i].serial+'" hidden>'+response[i].serial+'</td><td><input type="text" name="placa[]" value="'+response[i].placa+'" hidden>'+response[i].placa+'</td><td><input type="text" name="descripcion[]" value="'+response[i].descripcion+'" hidden>'+response[i].descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';
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
	$.get("/getItem/"+id,function(response) {
		console.log(response);

					console.log(response.costo_item);
					$("#valor_unitario").val(response.costo_item);
					calcular();
				
			});
}

