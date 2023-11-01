@extends('layouts.app')

@section('titulo','generarPDF')

@section('contenido')
<nav class="menu">
  
    <a href="/">Crear</a>
    <a href="/consultar">Consultar</a>
  </nav>

<h2>Gobierno de El Salvador</h2>

<h2>MINED</h2>

<h3>{{$fecha}}</h3>

<table border=1>
<tr>
    <th>Id</th>
    <th>Proyecto</th>
    <th>Fuente</th>
    <th>Monto planificado</th>
    <th>Monto patrocinado</th>
    <th>Monto fondos propios</th>
</tr>
@foreach($proyectos as $proyecto)
<tr>

    <td>{{$proyecto->id}}</td>
    <td>{{$proyecto->NombreProyecto}}</td>
    <td>{{$proyecto->fuenteFondos}}</td>
    <td>{{$proyecto->MontoPlanificado}}</td>
    <td>{{$proyecto->MontoPatrocinado}}</td>
    <td>{{$proyecto->MontoFondosPropios}}</td>

</tr>
@endforeach
</table>
@endsection