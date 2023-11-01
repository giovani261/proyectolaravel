@extends('layouts.app')

@section('titulo','editar')

@section('contenido')
<nav class="menu">
  
    <a href="/">Crear</a>
    <a href="/consultar">Consultar</a>
  </nav>

  <form action="{{route('actualizar',['id' => $proyectos['id']])}}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
         <input type="text" name="nombre" value="{{$proyectos['NombreProyecto']}}"><br>
        <label for="fuente">Fuente:</label>
        <input type="text" name="fuente" value="{{$proyectos['fuenteFondos']}}"><br>
        <label for="Montoplanificado">Monto planificado:</label>
        <input type="number" name="Montoplanificado" value="{{$proyectos['MontoPlanificado']}}"><br>
        <label for="Montopatrocinado">Monto patrocinado:</label>
        <input type="number" name="Montopatrocinado" value="{{$proyectos['MontoPatrocinado']}}"><br>
        <label for="Montofondospropios">Monto fondos propios:</label>
        <input type="number" name="Montofondospropios" value="{{$proyectos['MontoFondosPropios']}}"><br><br>
        <button type="submit">Enviar</button>
      </form>
@endsection