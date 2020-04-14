@extends('layouts.template')
@section('contenido')
<style type="text/css">
    #agregarRol{
        float: right;

    }
</style>
<button id="agregarRol" class="btn btn-primary" data-toggle="modal" data-target="#modal-nuevo-rol"><b>+ ROL</b></button>
<h1>ADMINISTRACIÓN DE ROLES</h1>
        
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
      <table class="table table-striped table-bordered" id="roles">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>ROL</th>
            <th>DESCRIPCION</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($roles as $rol)
          <tr>
            <td>{{ $rol->id }}</td>
            <td>{{ $rol->nom_rol }}</td>
            <td>{{ $rol->descripcion }}</td>
            <td>
              <button type="button" id="modal_editar" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{$rol->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR</button>
            </td>
          </tr>

          @include('seguridad.roles.edit')
          @endforeach
        </tbody>
    
    </table>
  </div>
</div>


        

@include('seguridad.roles.create')
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
        $('#roles').DataTable({   
          language: {
            info: "_TOTAL_ REGISTROS",
            search: "BUSCAR",
            paginate: {
              next: "SIGUIENTE",
              previous: "ANTERIOR"
            },
            lengthMenu: 'MOSTRAR <select>'+
                        '<option value="10">10</option>'+
                        '<option value="25">25</option>'+
                        '<option value="50">50</option>'+
                        '</select> REGISTROS',
            loadingRecords:"CARGANDO...",
            processing:"PROCESANDO...",
            emptyTable:"NO HAY DATOS",
            zeroRecords:"NO HAY CONCIDENCIAS",
            infoEmpty:"",
            infoFiltered:""
          }
        });
      });




  </script>
@endsection