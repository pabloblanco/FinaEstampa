<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Customer;
use App\Master;
use App\Detail;
use App\Medida;
use App\Configuracion;
use App\MedidasProducto;

class ProductionsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $details = Detail::where('idAutoincrementable', '=', $id)
        ->join('estatusOrdenProduccion', 'ordenDetalle.idAutoincrementable', '=', 'estatusOrdenProduccion.idOrdenDetalle')
        ->join('estiloOrdenProduccion', 'ordenDetalle.idAutoincrementable', '=', 'estiloOrdenProduccion.idOrdenDetalle')
        ->join('distintivoOrdenProduccion', 'ordenDetalle.idAutoincrementable', '=', 'distintivoOrdenProduccion.idOrdenDetalle')
        ->join('medidasProducto', 'ordenDetalle.idAutoincrementable', '=', 'medidasProducto.idOrdenDetalle')
        ->select('ordenDetalle.*', 'estatusOrdenProduccion.*', 'estiloOrdenProduccion.*', 'distintivoOrdenProduccion.*', 'medidasProducto.cuello as cuelloMedida', 'medidasProducto.pecho as pechoMedida', 'medidasProducto.cintura as cinturaMedida', 'medidasProducto.cadera as caderaMedida', 'medidasProducto.manga as mangaMedida', 'medidasProducto.espalda as espaldaMedida', 'medidasProducto.deseado as deseadoMedida', 'medidasProducto.muneca as munecaMedida', 'medidasProducto.sisa as sisaMedida', 'medidasProducto.bicep as bicepMedida', 'estatusOrdenProduccion.estatus')->get();
        $masters = Master::where('idOrden', '=', $details[0]->idOrdenMaestra)->get();
        $usuarios = Customer::where('id', '=', $details[0]->idUsuario)->get();
        $medidas = Medida::where('idUsuario', '=', $details[0]->idUsuario)->get();
        $usuarios_total = Customer::all()->count();
        $orders_total = Master::all()->count();
        $localFecha = Carbon::now()->locale('es_ES');
        $idiomaFecha = $localFecha->locale();
        //$ganancia = Detail::get()->sum('precioProducto');
        //$products_total = Detail::all()->count();   
        $ganancia = 0;
        $products_total = 0;              
        $fechaCreacion = Carbon::parse($masters[0]->payment_date)->isoFormat('LLLL');;
        $configuracion = Configuracion::where('campo', '=', 'FECHA_MAXIMA_PRODUCCION')->get();
        $fechaMaxima = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor)->isoFormat('LLLL');
        $configuracion = Configuracion::where('campo', '=', 'FECHA_CITA')->get();        
        $fechaCita = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor)->isoFormat('LLLL');
        $puno = $details[0]->puño;     
/*        dd($details);

        $total_users = User::get()->count();
        $total_orders = Cart::get()->count();
        $total_closed = Cart::where('status', 'closed')->count();
        if (($total_orders != 0) && ($total_closed != 0)){
            $percentage = (int)(100 / $total_orders * $total_closed);    
        }else{
            $percentage = 0;
        }
        
        $total_products = Product::get()->count();
        $ganancia = Product::get()->sum('price');
        $total_categories = Category::get()->count();
        $total_promotions = Promotion::get()->count();*/

        return view('productions.index')
            ->with('customer', $usuarios[0]) 
            ->with('master', $masters[0])
            ->with('production', $details[0])
            ->with('medida', $medidas[0]) 
            ->with('idiomaFecha', $idiomaFecha) 
            ->with('fechaCreacion', $fechaCreacion)
            ->with('fechaMaxima', $fechaMaxima)  
            ->with('fechaCita', $fechaCita) 
            ->with('customers_total', $usuarios_total)
            ->with('orders_total', $orders_total)
            ->with('products_total', $products_total)
            ->with('puno', $puno)
            ->with('caja', $ganancia);
/*            ->with('total_categories', $total_categories)
            ->with('total_promotions', $total_promotions);*/
    }
    public function dateExpress(Request $request)
    {
        $idOrden = $request->input("idOrden");
        $fechaExpress = $request->input("fechaExpress");
        $fechaPlancha = $request->input("fechaPlancha");
        $fechaSalida = $request->input("fechaSalida");
        $resultado = "orden: ".$idOrden." FechaExpress: ".$fechaExpress." fechaPlancha: ".$fechaPlancha." fechaSalida: ".$fechaSalida;
        $result = Detail::where('idAutoincrementable', $idOrden)
        ->update([
            'fechaExpress'     => $fechaExpress,
            'fechaPlancha'     => $fechaPlancha,
            'fechaSalida'     => $fechaSalida
        ]);
        return $resultado;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
