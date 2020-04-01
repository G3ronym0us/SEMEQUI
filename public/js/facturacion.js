$( document ).ready(function() {
	id = $("#clientes_id").val();
			
	
	getAreas(id);
	getCotizaciones(id);
	getOrdenes(id);

	$("#clientes_id").change(function(){
		id = $("#clientes_id").val();
	getAreas(id);
	getCotizaciones(id);
	getOrdenes(id);
	});

	$("#btn_agregarCotizacion").click(function(){
		id = $("#cotizaciones").val();
		agregarCotizacion(id);
	});

	$("#btn_agregarOrden").click(function(){
		id = $("#ordenes").val();
		agregarOrden(id);
	});

});

var f=1;
var cont=0;
var total=0;
var subtotal=[];

$("#guardar").hide();



function agregar(){

	equipo=$("#equipo_id option:selected").text();
	cantidad=$("#cantidad").val();
	valor_unitario=$("#valor_unitario").val();
	valor_total=$("#valor_total").val();
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
		var fila='<tr class="selected" id="fila'+cont+'"><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="hidden" name="equipo_id[]" value="'+id+'">'+equipo+'</td><td><input type="text" name="serial[]" value="'+serial+'"></td><td><input type="text" name="placa[]" value="'+placa+'"></td><td><input type="text" name="descripcion[]" value="'+descripcion+'"></td><td><input type="number" name="valor_unitario[]" value="'+valor_unitario+'"></td><td><input type="number" name="valor_total[]" value="'+valor_total+'"></td><td>'+subtotal[cont]+'</td></tr>';
		cont++;
		f++;
		limpiar();
		$("#total").html("Bs/. "+total);
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
	$('#total').html("Bs/. "+total);
	$('#fila'+index).remove();
	evaluar();
}

$("#cantidad").change(calcular);
$("#valor_unitario").change(calcular);
function calcular(){
	cantidad=$("#cantidad").val();
	valor_unitario=$("#valor_unitario").val();
	$("#valor_total").val(cantidad*valor_unitario);
}

function getAreas(id){
	$.get("/getArea/"+id,function(response) {
		$("#area_id").empty();
		console.log(response);
		for (i =0; i<response.length ; i++) {
			if (i === 0) {
				console.log(response[i].id);
				getEquipo(response[i].id);
			}	
			$("#area_id").append('<option value="'+response[i].id+'">'+response[i].nombre_area+'</option>');
		}
	});
}

function getEquipo(id){
	$.get("/getEquipos/"+id,function(response) {
				$("#equipo_id").empty();
				console.log(response);
				for (i =0; i<response.length ; i++) {
					$("#equipo_id").append('<option value="'+response[i].id_equipo+'">'+response[i].nom_equipo+'</option>');
				}
			});
}

function getCotizaciones(id){
	console.log(id+'cot');
	$.get("/getCotizaciones/"+id,function(response) {
				$("#cotizaciones").empty();
				console.log(response);
				for (i =0; i<response.length ; i++) {
					$("#cotizaciones").append('<option value="'+response[i].id_cotizacion+'">'+response[i].cod_cotizacion+' - '+response[i].total+'</option>');
				}
			});
}

function agregarCotizacion(id){
	console.log(id+'cot');
	$.get("/agregarCotizacion/"+id,function(response) {
				$("#cotizaciones").empty();
				console.log(response);
				for (i =0; i<response.length ; i++) {
					console.log(cont);
					subtotal[cont]=(response[i].cantidad*response[i].valor_unitario);
					total=total+subtotal[cont];
					$("#total").val(total);
					var fila='<tr class="selected" id="fila'+cont+'"><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'"></td><td><input type="hidden" name="equipo_id[]" value="'+response[i].equipo_id+'">'+response[i].nom_equipo+'</td><td><input type="text" name="serial[]" value="'+response[i].serial+'"></td><td><input type="text" name="placa[]" value="'+response[i].placa+'"></td><td><input type="text" name="descripcion[]" value="'+response[i].descripcion+'"></td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'"></td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'"></td></tr>';
					cont++;
					f++;
					console.log(cont);
					limpiar();
					$("#total").html("Bs/. "+total);
					evaluar();
					$('#detalles_orden').append(fila);
				}
			});
}

function getOrdenes(id){
	console.log(id+'cot');
	$.get("/getOrdenes/"+id,function(response) {
				$("#ordenes").empty();
				console.log(response);
				for (i =0; i<response.length ; i++) {
					$("#ordenes").append('<option value="'+response[i].id+'">'+response[i].cod_orden+' - '+response[i].total+'</option>');
				}
			});
}

function agregarOrden(id){
	console.log(id+'cot');
	$.get("/agregarOrden/"+id,function(response) {
				$("#ordenes").empty();
				console.log(response);
				for (i =0; i<response.length ; i++) {
					console.log(cont);
					subtotal[cont]=(response[i].cantidad*response[i].valor_unitario);
					total=total+subtotal[cont];
					$("#total").val(total);
					var fila='<tr class="selected" id="fila'+cont+'"><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'"></td><td><input type="hidden" name="equipo_id[]" value="'+response[i].equipo_id+'">'+response[i].nom_equipo+'</td><td><input type="text" name="descripcion[]" value="'+response[i].descripcion+'"></td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'"></td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'"></td></tr>';
					cont++;
					f++;
					console.log(cont);
					limpiar();
					$("#total").html("Bs/. "+total);
					evaluar();
					$('#detalles_orden').append(fila);
				}
			});
}


