@extends('layouts.template')
@section('contenido')
<style type="text/css">
    #nuevo_usuario{
        float: right;

    }
</style>
<a data-toggle="modal" data-target="#modal-nuevo-usuario" id="nuevo_usuario"><button  class="btn btn-primary"><b>+ USUARIO</b></button></a>
<h1>ADMINISTRACIÓN DE USUARIOS</h1>
        
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
              <button type="button" id="modal_editar" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{$user->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR</button>
            </td>
          </tr>

          @include('seguridad.usuarios.edit')
          @endforeach
        </tbody>
    
    </table>
  </div>
</div>


        
 @include('seguridad.usuarios.create')
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
        $('#password').keyup(verificar);
        $('#password-confirm').keyup(verificar);

        function verificar() {


          password = $('#password').val();
          confirm = $('#password-confirm').val();

          if (password != "" & confirm != "") {
            if (password != confirm) {
              $('#confirmar').html('LAS CONTRASEÑAS NO COINCIDEN');
            }else{
              $('#confirmar').html('');
            }
          }
        }
      });

  </script>

@endsection