@extends('layouts.app')

@section('titulo','consultar')

@section('contenido')
<nav class="menu">
  
    <a href="/">Crear</a>
    <a href="/generarPDF">Generar PDF</a>
  </nav>

  <table border=1>
    <tr>
      <th>nombre</th>
      <th>fuente</th>
      <th>monto planificado</th>
      <th>monto patrocinado</th>
      <th>monto fondos propios</th>
      <th>accion 1</th>
      <th>accion 2</th>
    </tr>
    @foreach($proyectos as $proyecto)
    <tr>
      <td>{{$proyecto->NombreProyecto}}</td>
      <td>{{$proyecto->fuenteFondos}}</td>
      <td>{{$proyecto->MontoPlanificado}}</td>
      <td>{{$proyecto->MontoPatrocinado}}</td>
      <td>{{$proyecto->MontoFondosPropios}}</td>
      <td><a href="{{route('editar',['id' => $proyecto['id']])}}">editar</a></td>
      <td><a href="{{route('elegir',['id' => $proyecto['id']])}}">eliminar</a></td>
    </tr>
    @endforeach
  </table>
@endsection