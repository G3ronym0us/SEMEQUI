$( document ).ready(function() {

	id = $("#id_cotizacion").val();
			agregarCotizacion(id);

	id = $("#clientes_id").val();
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

			getUbicacion(id);
		$("#item_id").change(function(){
			item_id = $("#item_id").val();
			getItem(item_id);


	   });


});

var f=1;
var cont=0;
var total=0;
var subtotal=[];

$("#guardar").hide();
 
function agregar(){

	equipo=$("#equipo_id option:selected").text();
	item=$("#item_id option:selected").text();
	cantidad=$("#cantidad").val();
	valor_unitario=$("#valor_unitario").val();
	valor_total=$("#valor_total").val();
	item_id=$("#item_id").val();
	equipo_a=document.getElementById('equipo_id').value.split('_');
	equipo_id = equipo_a[0];
	descripcion = equipo_a[1];
	console.log(id);
	if (equipo_id!="" && cantidad!="" && cantidad>0 && valor_unitario!="" && valor_total!="")
	{
		subtotal[cont]=(cantidad*valor_unitario);
		total=total+subtotal[cont];
		$("#total").val(total);
		f = cont + 1;
		var fila='<tr class="selected" id="fila'+cont+'"><td><input type="text" name="id[]" value="" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button>   '+f+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'" hidden>'+cantidad+'</td><td><input type="hidden" name="equipo_id[]" value="'+equipo_id+'">'+equipo+'</td><td><input type="hidden" name="item_id[]" value="'+item_id+'">'+item+'</td><td><input type="text" name="descripcion[]" value="'+descripcion+'" hidden>'+descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+valor_unitario+'" hidden>'+valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+valor_total+'" hidden>'+valor_total+'</td></tr>';		
		cont++;
		limpiar();
		$("#totalv").html("Bs/. "+total);
		evaluar();
		$('#detalles_cotizacion').append(fila);
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
	$('#totalv').html("Bs/. "+total);
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

$("#clientes_id").change(function(){
			id = $("#clientes_id").val();
			$.get("/getArea/"+id,function(response) {
				$("#area_id").empty();
				$("#equipo_id").empty();
				console.log(response);
				for (i =0; i<response.length ; i++) {
				if (i === 0) {
					console.log(response[i].id);
					getEquipo(response[i].id);
				}	
					$("#area_id").append('<option value="'+response[i].id+'">'+response[i].nombre_area+'</option>');
				}
			});
			
			getUbicacion(id);
			
           
         });

$("#area_id").change(function(){
id_area = $("#area_id").val();
			getEquipo(id_area);
	   });

function getEquipo(id){
	$.get("/getEquipos/"+id,function(response) {
				$("#equipo_id").empty();
				console.log(response);
				for (i =0; i<response.length ; i++) {
					$("#equipo_id").append('<option value="'+response[i].id_equipo+'_'+response[i].descripcion+'">'+response[i].nom_equipo+'</option>');
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
					var fila='<tr class="selected" id="fila'+cont+'"><td><input type="text" name="id[]" value="'+response[i].id_detalle_cotizacion+'" hidden><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td>'+f+'</td><td><input type="number" name="cantidad[]" value="'+response[i].cantidad+'" hidden>'+response[i].cantidad+'</td><td><input type="hidden" name="equipo_id[]" value="'+response[i].id_equipo+'">'+response[i].nom_equipo+'</td><td><input type="text" name="descripcion[]" value="'+response[i].descripcion+'" hidden>'+response[i].descripcion+'</td><td><input type="number" name="valor_unitario[]" value="'+response[i].valor_unitario+'" hidden>'+response[i].valor_unitario+'</td><td><input type="number" name="valor_total[]" value="'+response[i].valor_total+'" hidden>'+response[i].valor_total+'</td></tr>';
					cont++;
					f++;
					limpiar();
					$("#totalv").html("Bs/. "+total);
					evaluar();
					$('#detalles_cotizacion').append(fila);
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

function getUbicacion(id){
	$.get("/getUbicacion/"+id,function(response) {
				console.log(response);
				for (i =0; i<response.length ; i++) {
					$("#ubicacion").val(response[i].nom_municipio+' - '+response[i].nom_departamento);
				}
			});
}