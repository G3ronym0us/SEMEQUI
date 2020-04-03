@extends('layouts.template')
@section('contenido')
<h1>ADMINISTRACIÓN DE CLIENTES</h1>
        
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
      <table class="table table-striped table-bordered" id="users">
        <thead class="thead-dark">
          <tr>
            <th>ROL</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>OPCIONES</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->rol }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <button type="button" id="modal_editar" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{$user->id}}">EDITAR</button>
            </td>
          </tr>

          @include('seguridad.usuarios.edit')
          @endforeach
        </tbody>
    
    </table>
  </div>
</div>


        

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
        $('#users').DataTable({   
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