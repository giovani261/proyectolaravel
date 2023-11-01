@extends('layouts.app')

@section('titulo','pagina principal')
@section('contenido')
    <nav class="menu">
  
    <a href="/consultar">Consultar</a>
    <a href="/generarPDF">Generar PDF</a>
  </nav>
      <form action="{{route('crear')}}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
         <input type="text" name="nombre"><br>
        <label for="fuente">Fuente:</label>
        <input type="text" name="fuente"><br>
        <label for="Montoplanificado">Monto planificado:</label>
        <input type="number" name="Montoplanificado"><br>
        <label for="Montopatrocinado">Monto patrocinado:</label>
        <input type="number" name="Montopatrocinado"><br>
        <label for="Montofondospropios">Monto fondos propios:</label>
        <input type="number" name="Montofondospropios"><br><br>
        <button type="submit">Enviar</button>
      </form>
@endsection   
