<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Radio VaioVaio</title>

    <!-- Compiled and minified CSS -->
    
    
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
		body {
			background-color:#f3f3f3;
		}
    nav {
       
    }
    nav .right { float: right; }
    .sidenav h5 { text-align:center;}

    #titulo,#encabezado,#descripcion {
        text-align: center;
    }
    </style>
</head>

<body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('#slide-right');
        var instances = M.Sidenav.init(elems, {
			edge: 'right'
        });

        var elems = document.querySelectorAll('#slide-left');
        var instances = M.Sidenav.init(elems, {
            edge: 'left'
        });
    });

    function marcar_leido(id, titulo) {
        $.get( "leido?id=" + id, function( data ) {
            $( '#remover_' + id ).remove();
            $( "#contenedor_leido" ).append( '<li onClick="ver(' + id + ')"><a href="#!">' + titulo + '</a></li>' );
            
            ver(id);
        });
    }

    function ver(id) {
        $.get( "ver?id=" + id, function( data ) {
            
            
            $( "#titulo" ).html( data.Titulo );
            $( "#encabezado" ).html(data.Encabezado);
            $( "#descripcion" ).html( data.Cuerpo );
        });
    }

        
</script>
    <nav class="nav-wrapper">
        
        <a href="#" data-target="slide-left" id="side-left" class="sidenav-trigger button-collapse show-on-large " style="font-size: 50px;">&#9758;</a>
	   	
		<a href="#" data-target="slide-right" id="side-right" class="sidenav-trigger button-collapse show-on-large right" style="font-size: 50px;">&#9756;</a>
        <!-- navbar content here  -->
    </nav>

    <div id="slide-left" class="sidenav">
        <h5>Noticias Leidas</h5>
        <ul id="contenedor_leido">
            @foreach ($leidos as $leido)
                <li onClick="ver({{ $leido->id }})" ><a href="#!">{{ $leido->Titulo }}</a></li>
            @endforeach
            
           
        </ul>
    </div>
    <div id="slide-right" class="sidenav">
        <h5>Noticias por Leer</h5>
        <ul id="contenedor_no_leido">
            
            @foreach ($no_leidos as $no_leido)
                <li onClick="marcar_leido({{ $no_leido->id }}, '{{ $no_leido->Titulo }}')" id="remover_{{ $no_leido->id }}"><a href="#!">{{ $no_leido->Titulo }}</a></li>
            @endforeach
        </ul>
    </div>
    
    <div>  
		<div class="row">
			<div class="col s12 m12">
				<div class="card">
					
					<div class="card-content">
						<ins><h3 class="card-title" style="margin-top:0px; margin-bottom:10px;" id="titulo"></h3></ins>
                        <div id="encabezado"></div>
						<p id="descripcion">.......</p>
					</div>
				</div>
			</div>
		</div>
       
    </div>
    
</body>

</html>
