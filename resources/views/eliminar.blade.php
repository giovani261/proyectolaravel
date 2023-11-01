@extends('layouts.app')

@section('titulo','eliminar')

@section('contenido')
<nav class="menu">
  
    <a href="/">Crear</a>
    <a href="/consultar">Consultar</a>
  </nav>

  <p>Esta seguro que quiere eliminar {{$proyectos['NombreProyecto']}}?</p>

  <form action="{{route('eliminar',['id' => $proyectos['id']])}}" method="POST">
  @csrf
  @method('DELETE')
  <br>
  <button type="submit">Eliminar</button>
  </form>
@endsection