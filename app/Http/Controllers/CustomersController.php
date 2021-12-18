<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Customer;
use App\Master;
use App\Detail;
use App\Medida;
use App\Delivery;
use App\Invoice;

class CustomersController extends Controller
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

    public function pruebas()
    {
        $usuarios = Customer::orderBy('id', 'DESC')->latest()->take(5000)->get();
        $usuarios_total = Customer::all()->count();
        $orders_total = Master::all()->count();
        $detalles = Detail::orderBy('idAutoincrementable', 'DESC')->latest()->take(2000)->get();
        $ganancia = 100; 
        //$ganancia = Detail::get()->sum('precioProducto');
        //$usuarios_total = Customer::all()->count();
        return view('pruebas.index')
            ->with('ganancia', $ganancia)
            ->with('usuarios_total', $usuarios_total); 
    }       

    public function index()
    {
        $usuarios = Customer::orderBy('id', 'DESC')->latest()->take(5000)->get();
        $usuarios_total = Customer::all()->count();
        $orders_total = Master::all()->count();
        $products_total = 0;
        $ganancia = 0;
        //$products_total = Detail::all()->count();
        //$ganancia = Detail::get()->sum('precioProducto');        
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


        return view('customers.index')
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

            $resultado = Delivery::where('idUsuario',  $request->input("idUsuario"))
                    ->update([
                        'nombrePersonaDireccionDeEnvio'     => $request->input("nombrePersonaDireccionDeEnvio"), 
                        // 'apellidosPersonaDireccionDeEnvio'  => $request->input("apellidosPersonaDireccionDeEnvio"), 
                        'calleDireccionDeEnvio'             => $request->input("calleDireccionDeEnvio"), 
                        'numeroExteriorDireccionDeEnvio'    => $request->input("numeroExteriorDireccionDeEnvio"), 
                        'numeroInteriorDireccionDeEnvio'    => $request->input("numeroInteriorDireccionDeEnvio"),
                        'coloniaDireccionDeEnvio'           => $request->input("coloniaDireccionDeEnvio"), 
                        'ciudadDireccionDeEnvio'            => $request->input("ciudadDireccionDeEnvio"), 
                        'codigoPostalDireccionDeEnvio'      => $request->input("codigoPostalDireccionDeEnvio"), 
                        'paisDireccionDeEnvio'              => $request->input("paisDireccionDeEnvio"), 
                        'estadoDireccionDeEnvio'            => $request->input("estadoDireccionDeEnvio"), 
                        'numeroTelefonoDireccionDeEnvio'    => $request->input("numeroTelefonoDireccionDeEnvio")
                    ]);
            $resultado = Invoice::where('idUsuario',  $request->input("idUsuario"))
                    ->update([
                        'nombredireccionDeFacturacion'              => $request->input("nombredireccionDeFacturacion"), 
                        'calleDireccionDeFacturacion'               => $request->input("calleDireccionDeFacturacion"), 
                        'numeroExteriorDireccionDeFacturacion'      => $request->input("numeroExteriorDireccionDeFacturacion"), 
                        'numeroInteriorDireccionDeFacturacion'      => $request->input("numeroInteriorDireccionDeFacturacion"), 
                        'coloniaDireccionDeFacturacion'             => $request->input("coloniaDireccionDeFacturacion"), 
                        'ciudadDireccionDeFacturacion'              => $request->input("ciudadDireccionDeFacturacion"), 
                        'codigoPostalDireccionDeFacturacion'        => $request->input("codigoPostalDireccionDeFacturacion"), 
                        'paisDireccionDeFacturacion'                => $request->input("paisDireccionDeFacturacion"), 
                        'estadoDireccionDeFacturacion'              => $request->input("estadoDireccionDeFacturacion")
                    ]);   

                        
                        // 'correoElectronicodireccionDeFacturacion'   => $request->input("correoElectronicodireccionDeFacturacion"),
                        // 'RFCdireccionDeFacturacion'                 => $request->input("RFCdireccionDeFacturacion"), 
                        // 'RazonSocialdireccionDeFacturacion'         => $request->input("RazonSocialdireccionDeFacturacion"), 
                        // 'domicilioFiscaldireccionDeFacturacion'     => $request->input("domicilioFiscaldireccionDeFacturacion")                 
            //$request = Request::instance();
            $nombrePersonaDireccionDeEnvio = $request->input("nombrePersonaDireccionDeEnvio");
            // $nombrePersonaDireccionDeEnvio = $request->input("nombrePersonaDireccionDeEnvio");
            $mensaje = "Se modificó el registro de ".$nombrePersonaDireccionDeEnvio;
            return response()->json(['success'=>$mensaje]);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function showDataGrid($id)
    {
        $usuarios = Customer::where('id', '=', $id)->get();
        $fechaNacimiento = Carbon::parse($usuarios[0]->fechaDeNacimiento)->isoFormat('LLLL');

        $sOut  = '<table id="reemplazar-'.$id.'" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" class="inner-table">';
        $sOut = $sOut.'<tr><td><b>Información personal</b></td><td></td><td><b></b></td><td></td><td><b></b></td></tr>';

        $sOut = $sOut.'<tr><td>Nombres: '.$usuarios[0]->usuario.'</td><td>Apellidos: '.$usuarios[0]->apellido.'</td><td>Nacimiento: '.$fechaNacimiento.'</td><td>Sexo: '.$usuarios[0]->sexo.'</td></tr>';
        $sOut = $sOut.'<tr><td>email: '.$usuarios[0]->email.'</td><td>Boletin: '.$usuarios[0]->inscritoABoletin.'</td><td>Notificaciones: '.$usuarios[0]->recibeNotificacionesYPromos.'</td><td>Factura: '.$usuarios[0]->facturacionElectronica.'</td></tr>';
        $sOut = $sOut.'<tr><td>Razón Social: '.$usuarios[0]->razonSocial.'</td><td>RFC: '.$usuarios[0]->RFC.'</td><td></td><td></td></tr>';
        $sOut = $sOut.'</table>';

        return $sOut;
    } 

    public function showDataModal($id)
    {
        $usuarios = Customer::where('id', '=', $id)->get();
        $fechaNacimiento = Carbon::parse($usuarios[0]->fechaDeNacimiento)->isoFormat('LLLL');

        $sOut  = '<table id="reemplazar-'.$id.'" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" class="inner-table">';
        $sOut = $sOut.'<tr><td><b>Información personal</b></td><td></td><td><b></b></td><td></td><td><b></b></td></tr>';

        $sOut = $sOut.'<tr><td>Nombres: '.$usuarios[0]->usuario.'</td><td>Apellidos: '.$usuarios[0]->apellido.'</td><td>Nacimiento: '.$fechaNacimiento.'</td><td>Sexo: '.$usuarios[0]->sexo.'</td></tr>';
        $sOut = $sOut.'<tr><td>email: '.$usuarios[0]->email.'</td><td>Boletin: '.$usuarios[0]->inscritoABoletin.'</td><td>Notificaciones: '.$usuarios[0]->recibeNotificacionesYPromos.'</td><td>Factura: '.$usuarios[0]->facturacionElectronica.'</td></tr>';
        $sOut = $sOut.'<tr><td>Razón Social: '.$usuarios[0]->razonSocial.'</td><td>RFC: '.$usuarios[0]->RFC.'</td><td></td><td></td></tr>';
        $sOut = $sOut.'</table>';

        return $sOut;
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
