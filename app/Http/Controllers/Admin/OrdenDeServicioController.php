<?php

namespace App\Http\Controllers\Admin;

use App\Servicio;
use App\Http\Requests\FormOrdenDeServicio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orden;
use Carbon\Carbon;
use App\Estado;
use Jenssegers\Date\Date;

class OrdenDeServicioController extends Controller
{
    public function __construct()
    {
        Date::setLocale('es');

        $this->middleware('auth');

        $this->middleware('roles:admin', ['except' => ['show', 'index', 'create', 'store', 'destroy']]);
    }

    public function index()
    {   
        if (auth()->user()->roles === 'cliente') 
        {

            $ordenes = Orden::with(['estado', 'user', 'servicio'])->where('user_id', auth()->user()->id)->get();

            return view('backend.ordenes.index', compact('ordenes'));
        }

        $ordenes = Orden::orderBy('created_at', 'DESC')->get();

        return view('backend.ordenes.index', compact('ordenes'));

    }

    public function create()
    {
        $servicios = Servicio::orderBy('titulo', 'ASC')->get();
        return view('frontend.paginas.orden-de-servicio', compact('servicios'));
    }

    public function store(FormOrdenDeServicio $request)
    {   
        
        $orden = new Orden;
        $orden -> user_id = auth()->user()->id;
        $orden -> servicio_id = $request -> get('servicio_id');
        $orden -> contenido = $request -> get('contenido');
        $orden -> estado_id = 1;
        $orden->save();

        return back()->with('info', 'se ha enviado su solicitud correctamente. Se le respondera lo mas pronto posible.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        $servicios = Servicio::all();

        $orden = Orden::findOrFail($id);

        return view('backend.ordenes.edit', compact('orden', 'servicios'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->toArray());

        $orden = Orden::findOrFail($id);

        $orden->update($request->all());

        return back()->with('info', 'se ha actualizado la orden correctamente');
    }

    
    public function destroy($id)
    {   
        $orden = Orden::findOrFail($id);

        $orden->delete();

        return back()->with('destroy', 'se ha eliminado al orden');
    }
}
