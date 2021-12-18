<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Customer;
use App\Master;
use App\Detail;
use App\Medida;
use App\Delivery;
use App\Invoice;
use App\Configuracion;

class ConfigurationController extends Controller
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
    public function index()
    {
        $fechaMaximaProduccion = Configuracion::where('campo', '=', 'FECHA_MAXIMA_PRODUCCION')->first();
        $fechaCita = Configuracion::where('campo', '=', 'FECHA_CITA')->first();
        $usuarios = Customer::orderBy('id', 'DESC')->paginate(10);
        $usuarios_total = Customer::all()->count();
        $orders_total = Master::all()->count();
        //$products_total = Detail::all()->count();
        //$ganancia = Detail::get()->sum('precioProducto');   
        $products_total = 0;
        $ganancia = 0;               
/*        $total_users = User::get()->count();
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


        return view('configuration.index')
            ->with('fechaMaximaProduccion', $fechaMaximaProduccion) 
            ->with('fechaCita', $fechaCita) 
            ->with('customers', $usuarios)        
            ->with('customers_total', $usuarios_total)
            ->with('orders_total', $orders_total)
            ->with('products_total', $products_total)
            ->with('caja', $ganancia);
/*            ->with('total_orders', $total_orders)
            ->with('percentage', $percentage)
            ->with('total_products', $total_products)
            ->with('ganancia', $ganancia)
            ->with('total_categories', $total_categories)
            ->with('total_promotions', $total_promotions);*/
    }

    public function receiveData(Request $request)
    {
        $validator = Validator::make($request->all(), [

            //'email' => 'required|email',
            // 'coloniaDireccionDeEnvio' => 'required',
            // 'numeroTelefonoDireccionDeEnvio' => 'required',
            // 'codigoPostalDireccionDeEnvio' => 'required',
            // 'calleDireccionDeEnvio' => 'required',
            // 'ciudadDireccionDeEnvio' => 'required',
            // 'numeroExteriorDireccionDeEnvio' => 'required',
            // 'numeroInteriorDireccionDeEnvio' => 'required',
            // 'paisDireccionDeEnvio' => 'required',
            // 'facturacionElectronica' => 'required',
            // 'razonSocial' => 'required',
            // 'RFC' => 'required',
            // 'correoElectronicodireccionDeFacturacion' => 'required',         

        ]);

        if ($validator->passes()) {

            $resultado = Configuracion::where('campo',  $request->input("fechaMaximaProduccionCampo"))
                    ->update([
                        'valor'     => $request->input("fechaMaximaProduccion"), 
                        'idUser' => $request->input("idUsuario")
                    ]);
            $resultado = Configuracion::where('campo',  $request->input("fechaCitaCampo"))
                    ->update([
                        'valor'     => $request->input("fechaCita"),
                        'idUser' => $request->input("idUsuario")
                    ]);   

            $mensaje = "Se modificó el registro de ".$request->input("fechaMaximaProduccionCampo")." y de ".$request->input("fechaCitaCampo");
            return response()->json(['success'=>$mensaje]);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
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
