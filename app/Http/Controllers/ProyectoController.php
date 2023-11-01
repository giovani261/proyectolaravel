<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proyecto;
use PDF;

class ProyectoController extends Controller
{
    public function mostrar()
    {
        return view('welcome');
    }

    public function obtenerid($id)
    {
        $proyectos = proyecto::find($id);
        return view('actualizar',compact('proyectos'));
        
    }

    public function obtenerid2($id)
    {
        $proyectos = proyecto::find($id);
        return view('eliminar',compact('proyectos'));
        
    }

    public function eliminar(Request $request, $id)
    {
        $proyecto = proyecto::find($id);
        try{
        $proyecto->delete();
        return redirect()->route('principal')->with('success','proyecto eliminado con exito');
        }
        catch(\Exception $e)
        {
            return redirect()->route('principal')->with('error','no se pudo eliminar el proyecto');
        }
    }

    public function editar(Request $request, $id)
    {
        $proyecto = proyecto::find($id);
        try{
            $proyecto->NombreProyecto = $request->input('nombre');
            $proyecto->fuenteFondos = $request->input('fuente');
            $proyecto->MontoPlanificado = $request->input('Montoplanificado');
            $proyecto->MontoPatrocinado = $request->input('Montopatrocinado');
            $proyecto->MontoFondosPropios = $request->input('Montofondospropios');
            $proyecto->save();
            return redirect()->route('principal')->with('success','proyecto actualizado con exito');
            }
            catch(\Exception $e)
            {
                return redirect()->route('principal')->with('error','no se pudo actualizar el proyecto');
            }
    }

    public function crear(Request $request)
    {
        $proyecto = new proyecto();
        try{
        $proyecto->NombreProyecto = $request->input('nombre');
        $proyecto->fuenteFondos = $request->input('fuente');
        $proyecto->MontoPlanificado = $request->input('Montoplanificado');
        $proyecto->MontoPatrocinado = $request->input('Montopatrocinado');
        $proyecto->MontoFondosPropios = $request->input('Montofondospropios');
        $proyecto->save();
        return redirect()->route('principal')->with('success','proyecto creado con exito');
        }
        catch(\Exception $e)
        {
            return redirect()->route('principal')->with('error','no se pudo crear el proyecto');
        }

    }

    public function consultar()
    {
        $proyectos = proyecto::all();

        return view('consultar',compact('proyectos'));
    }

    public function informe(){
        $proyectos   = Proyecto::all();
        $data = getdate();
        $fecha = "$data[mday]/$data[month]/$data[year]";
        $informe = PDF::loadView('generarPDF', ['proyectos' => $proyectos, 'fecha' => $fecha]);
        return $informe->stream("informe_proyectos.pdf");
    }
}
