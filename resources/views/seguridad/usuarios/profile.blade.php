@extends('layouts.template')
@section('contenido')

	<div id="app">
		<div class="row">
		  <div class="col-sm-6">
		    <div class="card">
		      <div class="card-body">
		        <h5 class="card-title">DATOS DE USUARIO</h5>
		        <p class="card-text">
		        	<b>NOMBRE:</b> {{ Auth::user()->name }}
		        </p>
		        <p class="card-text">
		        	<b>APELLIDO:</b> {{ Auth::user()->name }}
		        </p>
		        <a href="#" class="btn btn-primary">Go FALLA</a>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
@endsection

@section('script')

<script type="text/javascript">
	var app = new Vue({
		el: '#app',
		created: function() {
			
		},
	  data: {
	    message: 'Hola Vue!'
	  },
	  methods: {
	  	getUser: function(page) {
			var urlKeeps = 'tasks?page='+page;
			axios.get(urlKeeps).then(response => {
				this.keeps = response.data.tasks.data,
				this.pagination = response.data.pagination
			});
		},
	  }
	})
</script>


@endsection