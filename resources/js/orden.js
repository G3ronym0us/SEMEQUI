$(document).ready(function(){

	$('#bt_add').click(function(){
		agregar();
	});

});

var cont=0;
var total=0;
var subtotal=[];

$("#guardar").hide();

function agregar(){
	equipo_id=$("#equipo_id").val();
	equipo=$("#equipo_id option:selected").text();
	cantidad=$("#cantidad").val();
	valor_unitario=$("#pprecio_compra").val();
	valor_total=$("#pprecio_venta").val();
	if (idarticulo!="" && cantidad!="" && cantidad>0 && precio_compra!="" && precio_venta!="")
	{
		subtotal[cont]=(cantidad*valor_unitario);
		total=total+subtotal[cont];
		var fila='<tr class="selected" id="fila'+cont+'"><td>'+cont+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="hidden" name="equipo_id[]" value="'+equipo_id+'">'+equipo+'</td><td><input type="number" name="valor_unitario[]" value="'+valor_unitario+'"></td><td><input type="number" name="valor_total[]" value="'+valor_total+'"></td><td>'+subtotal[cont]+'</td></tr>';
		cont++;
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