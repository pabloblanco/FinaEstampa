<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use App\Customer;
use App\Master;
use App\Detail;
use App\Medida;
use App\Estilo;
use App\Distintivo;
use App\Estatus;
use App\Configuracion;
use App\MedidasProducto;

class DetailsController extends Controller
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
        $details = Detail::orderBy('idOrdenMaestra', 'ASC')->where('idOrdenMaestra', '=', $id)
        ->join('ordenMaestra', 'ordenDetalle.idOrdenMaestra', '=', 'ordenMaestra.idOrden')
        ->join('medidasProducto', 'ordenDetalle.idAutoincrementable', '=', 'medidasProducto.idOrdenDetalle')
        ->join('estatusOrdenProduccion', 'ordenDetalle.idAutoincrementable', '=', 'estatusOrdenProduccion.idOrdenDetalle')
        ->select('ordenDetalle.*', 'medidasProducto.*', 'estatusOrdenProduccion.*', 'ordenMaestra.nombreCompletoCliente')
        ->get();
        $masters = Master::where('idOrden', '=', $details[0]->idOrdenMaestra)->get();
        $usuarios = Customer::where('id', '=', $details[0]->idUsuario)->paginate(10);
        $medidas = Medida::where('idUsuario', '=', $details[0]->idUsuario)->get();
        $usuarios_total = Customer::all()->count();
        $orders_total = Master::all()->count();
        //$products_total = Detail::all()->count();        
        //$ganancia = Detail::get()->sum('precioProducto');
        $products_total = 0;        
        $ganancia = 0;        
        $configuracion = Configuracion::where('campo', '=', 'FECHA_MAXIMA_PRODUCCION')->get();        
        $fechaCompromisoProduccion = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor);     
        if ($fechaCompromisoProduccion >= now()->toDateString()){  
            $aTiempo = 'SI';
        }else{
            $aTiempo = 'NO';
        }
        $localFecha = Carbon::now()->locale('es_ES');
        $fechaCreacion = Carbon::parse($masters[0]->payment_date)->isoFormat('LLLL');;
        $configuracion = Configuracion::where('campo', '=', 'FECHA_MAXIMA_PRODUCCION')->get();
        $fechaMaxima = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor)->isoFormat('LLLL');
        $configuracion = Configuracion::where('campo', '=', 'FECHA_CITA')->get();        
        $fechaCita = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor)->isoFormat('LLLL');
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

        return view('details.index')
            ->with('details', $details)  
            ->with('customers', $usuarios)              
            ->with('order_id', $id)  
            ->with('fechaCreacion', $fechaCreacion)
            ->with('fechaMaxima', $fechaMaxima)  
            ->with('fechaCita', $fechaCita)     
            ->with('customers_total', $usuarios_total)
            ->with('orders_total', $orders_total)
            ->with('products_total', $products_total)
            ->with('caja', $ganancia)
            ->with('aTiempo', $aTiempo);            
/*            ->with('total_orders', $total_orders)
            ->with('percentage', $percentage)
            ->with('total_products', $total_products)
            ->with('ganancia', $ganancia)
            ->with('total_categories', $total_categories)
            ->with('total_promotions', $total_promotions);*/
    }

    public function postImpresionOrdenesProduccion(Request $request)
    {
        $idOrdenMaestra = $request->input("idOrdenMaestra");
        $details = Detail::where('idOrdenMaestra', '=', $idOrdenMaestra)
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
        $products_total = 0;
        $ganancia = 0;           
        //$products_total = Detail::all()->count();
        //$ganancia = Detail::get()->sum('precioProducto');        
        $localFecha = Carbon::now()->locale('es_ES');
        $idiomaFecha = $localFecha->locale();
        $fechaCreacion = Carbon::parse($masters[0]->payment_date)->isoFormat('LLLL');;
        $configuracion = Configuracion::where('campo', '=', 'FECHA_MAXIMA_PRODUCCION')->get();
        $fechaMaxima = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor)->isoFormat('LLLL');
        $configuracion = Configuracion::where('campo', '=', 'FECHA_CITA')->get();        
        $fechaCita = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor)->isoFormat('LLLL');
        $puno = $details[0]->puño;     
        $mensaje = '';
        $i = 1;
        foreach ($details as $detail) {

            $mensaje = $mensaje.'                                   <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="hidden" name="tituloProduccion" value="DETALLE DE LA ORDEN MAESTRA '.$detail->idOrdenMaestra.'">
                                            <!-- start -->
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="invoice-head">
                                                        <div class="col-md-11 col-sm-12 col-xs-12 invoice-title">
                                                            <h2 class="title pull-center" style="text-align: center; color: #000;"><b>C&EacuteDULA DE PRODUCCI&OacuteN</b></h2>
                                                        </div>
                                                        <div id="codigoQR'.$i.'" class="col-md-1 col-sm-12 col-xs-12 invoice-head-info codificable">
                                                            <input id="item_txt'.$i.'" type="hidden" value="O'.$detail->idOrdenMaestra.'.'.$detail->consecutivo.'">
                                                        </div>                                                     
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover invoice-table">
                                                            <thead>
                                                                <tr>
                                                                    <td class="text-center"><h4><b>PEDIDO</b></h4></td>
                                                                    <td class="text-center"><h4><b>FECHA DE<br>PEDIDO</b></h4></td>
                                                                    <td class="text-center"><h4><b>ENTRADA MAX<br>PRODUCCION</b></h4></td>
                                                                    <td class="text-center"><h4><b>TELA</b></h4></td>
                                                                    <td class="text-center"><h4><b>CLIENTE</b></h4></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"><h3><b>'.$detail->idOrdenMaestra.'.'.$detail->consecutivo.'</b></h3></td>
                                                                    <td class="text-center"><h3><b>'.$fechaCreacion.'</b></h3></td>
                                                                    <td class="text-center"><h3><b>'.$fechaMaxima.'</b></h3></td>
                                                                    <td class="text-center"><h3><b>'.$detail->tejidoProducto.'</b></h3></td>
                                                                    <td class="text-center"><h3><b>'.$usuarios[0]->usuario.'&nbsp'.$usuarios[0]->apellido.'</b></h3></td>                                                              
                                                                </tr>                                                            
                                                            </tbody>
                                                        </table>
                                                        <br><br>
                                                        <table class="table table-hover invoice-table">
                                                            <thead>
                                                                <tr>
                                                                    <td colspan="2" class="text-center"><h4><b>TALLERO</b></h4></td>
                                                                    <td class="text-center"><h4><b>ANCHO</b></h4></td>
                                                                    <td colspan="2" class="text-center"><h4><b>CONSUMO</b></h4></td>
                                                                    <td colspan="2" class="text-center"><h4><b>&nbsp</b></h4></td>
                                                                    <td colspan="3" class="text-center"><h4><b>BORDADO</b></h4></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"><h4>MEDIDAS</h4></td>
                                                                    <td class="text-center"><h4>Cliente(")</h4></td>
                                                                    <td class="text-center"><h4>Patr&oacuten</h4></td>
                                                                    <td class="text-center"><h4>Ajuste</h4></td>
                                                                    <td class="text-center"><h4>Validado</h4></td>
                                                                    <td colspan="2" class="text-center"><h4>ESPECIFICACIONES</h4></td>
                                                                    <td colspan="3" class="text-center"><h4>'.$detail->iniciales.'</h4></td>
                                                                </tr>      
                                                                <tr>
                                                                    <td class="text-center"><h4><b>CUELLO</b></h4></td>
                                                                    <td class="text-center"><h4>'.$detail->cuelloMedida.'</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>CUELLO</h4></td>
                                                                    <td class="text-center"><h4>'.$detail->cuello.'</h4></td>
                                                                    <td class="text-center"><h4>ENTRETELA</h4></td>
                                                                    <td colspan="2" class="text-center"><h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h4></td>
                                                                </tr>    
                                                                <tr>
                                                                    <td class="text-center"><h4><b>PECHO</b></h4></td>
                                                                    <td class="text-center"><h4>'.$detail->pechoMedida.'</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>PUNO</h4></td>
                                                                    <td class="text-center"><h4>'.$detail->puno.'</h4></td>
                                                                    <td class="text-center"><h4>ENTRETELA</h4></td>
                                                                    <td colspan="2" class="text-center"><h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h4></td>
                                                                </tr>                                                                                                                                                   <tr>
                                                                    <td class="text-center"><h4><b>CINTURA</b></h4></td>
                                                                    <td class="text-center"><h4>'.$detail->cinturaMedida.'</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>ALETILLA</h4></td>
                                                                    <td class="text-center"><h4>'.$detail->aletilla.'</h4></td>
                                                                    <td colspan="3" class="text-center"><h4>&nbsp</h4></td>                                                                
                                                                </tr>    
                                                                <tr>
                                                                    <td class="text-center"><h4><b>CADERA</b></h4></td>
                                                                    <td class="text-center"><h4>'.$detail->caderaMedida.'</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>TIPO DE CORTE</h4></td>
                                                                    <td class="text-center"><h4>'.$detail->corte.'</h4></td>
                                                                    <td colspan="3" class="text-center"><h4>ANOTACIONES ESPECIALES/CALCULOS</h4></td>  
                                                                <tr>
                                                                    <td class="text-center"><h4><b>MANGA</b></h4></td>
                                                                    <td class="text-center"><h4>'.$detail->mangaMedida.'</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>BOLSILLO</h4></td>
                                                                    <td class="text-center"><h4>'.$detail->bolsillo.'</h4></td>
                                                                    <td colspan="3" rowspan="6" class="text-center"><h4>&nbsp</h4></td> 
                                                                </tr>    
                                                                <tr>
                                                                    <td class="text-center"><h4><b>PUNO</b></h4></td>
                                                                    <td class="text-center"><h4>'.$detail->munecaMedida.'</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>CONTRASTE</h4></td>
                                                                    <td class="text-center"><h4>'.$detail->contrastes.'</h4></td>
                                                                </tr>                                                                                                                                                   <tr>
                                                                    <td class="text-center"><h4><b>ESPALDA</b></h4></td>
                                                                    <td class="text-center"><h4>'.$detail->espaldaMedida.'</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>INSERTO</h4></td>
                                                                    <td class="text-center"><h4>'.$detail->inserto.'</h4></td>
                                                                </tr>    
                                                                <tr>
                                                                    <td class="text-center"><h4><b>SISA</b></h4></td>
                                                                    <td class="text-center"><h4>'.$detail->sisaMedida.'</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td rowspan="2" class="text-center"><h4>BOTON</h4></td>
                                                                    <td rowspan="2" class="text-center"><h4>'.$detail->botones.'</h4></td>
                                                                <tr>
                                                                    <td class="text-center"><h4><b>BICEP</b></h4></td>
                                                                    <td class="text-center"><h4>'.$detail->bicepMedida.'</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                </tr>    
                                                                <tr>
                                                                    <td class="text-center"><h4><b>LARGO</b></h4></td>
                                                                    <td class="text-center"><h4>'.$detail->deseadoMedida.'</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>COSTURA</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                </tr>                                          
                                                            </tbody>
                                                        </table>  
                                                        <br><br>
                                                        <table class="table table-hover invoice-table">
                                                            <thead>
                                                                <tr>
                                                                    <td class="text-center"><h4><b>&Aacuterea</b></h4></td>
                                                                    <td class="text-center"><h4><b>FECHA</b></h4></td>
                                                                    <td class="text-center"><h4><b>FIRMA</b></h4></td>
                                                                    <td class="text-center"><h4><b>COMENTARIOS</b></h4></td>
                                                                    <td class="text-center"><h4><b>ERROR</b></h4></td>
                                                                    <td class="text-center"><h4><b>APROBACI&OacuteN</b></h4></td>
                                                                    <td class="text-center"><h4><b>FECHA EXPR&EacuteS</b></h4></td>                                                                
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"><h4>TRAZO</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td rowspan="2" class="text-center"><h4>&nbsp</h4></td>
                                                                </tr>  
                                                                <tr>
                                                                    <td class="text-center"><h4>CORTE</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                </tr> 
                                                                 <tr>
                                                                    <td class="text-center"><h4>FUSI&OacuteN</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td rowspan="2" class="text-center"><h4>FECHA PLANCHA<br></h4></td>
                                                                </tr>  
                                                                <tr>
                                                                    <td class="text-center"><h4>BORDADO</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center"><h4>COSTURA</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td rowspan="3" class="text-center"><h4>FECHA SALIDA<br>TALLER</h4></td>
                                                                </tr>  
                                                                <tr>
                                                                    <td class="text-center"><h4>OJAL</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center"><h4>BOT&OacuteN</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                    <td class="text-center"><h4>&nbsp</h4></td>
                                                                </tr>                                                                                                                                                   <tr>
                                                                    <td colspan="2" rowspan="2" class="text-center"><h4>COMENTARIOS<br>GENERALES</h4></td>
                                                                    <td colspan="4" rowspan="2" class="text-center"><textarea class="form-control" cols="5" id="field-6">'.$detail->informacion.'</textarea></td>
                                                                    <td rowspan="2" class="text-center"><h4>VALIDACI&OacuteN</h4></td>
                                                                </tr>                                                                                             
                                                            </tbody>
                                                        </table> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
            $i++;                                        
        }

        //$mensaje = "<h1>Se muestra respuesta Ajax</h1>";
        return response()->json(['success'=>$mensaje]);
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

            $idUsuario = $request->input("idUsuario");
            $idOrdenDetalle = $request->input("idOrdenDetalle");
            $idMedida = $request->input("idMedida");
          
            // $resultado = Detail::where('idAutoincrementable', $idOrdenDetalle)
            //         ->update([
            //             'tejidoProducto'    => $request->input("ordenDetalleTejido"),
            //             'esPersonalizado'   => $request->input("ordenDetallePersonalizado")
            //         ]);
            $resultado = Detail::where('idAutoincrementable', $idOrdenDetalle)
                        ->update([
                            'esPersonalizado'  => $request->input("ordenDetallePersonalizado"),  
                            'tejidoProducto'   => $request->input("ordenDetalleTejido")
                        ]);
            $resultado = Estilo::where('idOrdenDetalle', $idOrdenDetalle)
                        ->update([
                            'cuello'     => $request->input("estiloCuello"), 
                            'puño'       => $request->input("estiloPuno"), 
                            'aletilla'   => $request->input("estiloAletilla"), 
                            'corte'      => $request->input("estiloCorte"), 
                            'bolsillo'   => $request->input("estiloBolsillo")
                        ]);
            $resultado = Distintivo::where('idOrdenDetalle', $idOrdenDetalle)
                        ->update([
                            'contrastes'    => $request->input("distintivoContrastes"), 
                            'inserto'       => $request->input("distintivoInserto"),  
                            'botones'       => $request->input("distintivoBotones"),  
                            'iniciales'     => $request->input("distintivoIniciales"),  
                            'informacion'   => $request->input("distintivoInformacion")
                        ]);
            $resultado = Estatus::where([
                            ['idOrdenDetalle', '=', $request->input("idOrdenDetalle")],
                            ['consecutivo', '=', $request->input("estatusConsecutivo")]
                        ])
                        ->update([
                            'estatus'           => $request->input("estatusEstatus"),
                            'comentarios'       => $request->input("estatusComentarios")
                        ]);
            // $resultado = Trace::insert([
            //                 'idOrdenDetalle'    => $request->input("idOrdenDetalle"), 
            //                 'idUsuario'         => Auth::id(),
            //                 'consecutivo'           => $request->input("estatusConsecutivo"),
            //                 'estatus'           => $request->input("estatusEstatus"),
            //                 'comentarios'       => $request->input("estatusComentarios")
            //             ]);            
            $resultado = MedidasProducto::where('id', $idMedida)
                        ->update([
                            'cuello'        => $request->input("medidaCuello"), 
                            'pecho'         => $request->input("medidaPecho"), 
                            'cintura'       => $request->input("medidaAbdomen"), 
                            'cadera'        => $request->input("medidaCadera"), 
                            'manga'         => $request->input("medidaMangaLongitud"), 
                            'muneca'        => $request->input("medidaPuno"),                             
                            'espalda'       => $request->input("medidaEspalda"), 
                            'sisa'          => $request->input("medidaSisa"), 
                            'bicep'         => $request->input("medidaBicep"),
                            'deseado'       => $request->input("medidaTronco")

                        ]);          

            $mensaje = "Se modificó el registro de la orden ".$idOrdenDetalle." ".$request->input("estatusComentarios");
            return response()->json(['success'=>$mensaje]);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }
 
    public function showDataGrid($id)
    {
                                
        //Tabla ordenDetalle:'idAutoincrementable', 'idOrdenMaestra', 'idProductoCarrito', 'idUsuario', 'categoriaProducto', 'urlAmigable', 
        //'esPersonalizado', 'nombreProducto', 'medidaProducto', 'tejidoProducto', 'estiloProducto', 'distintivoProducto', 'precioProducto', 
        //'imagenProducto', 'cantidadProducto'

        //Tabla ordenMaestra: 'idOrden', 'idUsuario', 'metodoDePago', 'seDeseoEfectuarLaOrden', 'notasDelPedido', 'nombreDeEnvio', 'costo_de_envio', 
        //'nombreCompletoCliente', 'correoElectronicoCliente', 'facturacionElectronica', 'nombredireccionDeFacturacion', 'apellidosdireccionDeFacturacion', 
        //'correoElectronicodireccionDeFacturacion', 'RFCdireccionDeFacturacion', 'RazonSocialdireccionDeFacturacion', 'domicilioFiscaldireccionDeFacturacion', 
        //'nombrePersonaDireccionDeEnvio', 'apellidosPersonaDireccionDeEnvio', 'calleDireccionDeEnvio', 'numeroExteriorDireccionDeEnvio', 'numeroInteriorDireccionDeEnvio', 
        //'coloniaDireccionDeEnvio', 'ciudadDireccionDeEnvio', 'codigoPostalDireccionDeEnvio', 'paisDireccionDeEnvio', 'estadoDireccionDeEnvio', 
        //'numeroTelefonoDireccionDeEnvio', 'payer_email', 'first_name', 'last_name', 'payment_date', 'mc_gross', 'payment_currency', 'txn_id', 'receiver_email', 
        //'payment_type', 'payment_status', 'txn_type', 'payer_status', 'address_street', 'address_city', 'address_state', 'address_zip', 'address_country', 
        //'address_status', 'notify_version', 'verify_sign', 'payer_id', 'mc_currency', 'mc_fee', 'state_pol', 'response_code_pol', 'response_message_pol', 'risk', 
        //'reference_sale', 'firma', 'payment_method_id', 'payment_method_type', 'payment_method_name', 'installments_number', 'tax', 'test', 'account_number_ach', 
        //'account_type_ach', 'attempts', 'administrative_fee', 'administrative_fee_base', 'administrative_fee_tax', 'payment_request_state', 'authorization_code', 
        //'bank_id', 'transaction_bank_id', 'transaction_id', 'commision_pol', 'commision_pol_currency', 'customer_number', 'date', 'error_code_bank', 'error_message_bank', 
        //'exchange_rate', 'nickname_buyer', 'nickname_seller', 'description' 

        //Tabla medidausuario: 'idMedida', 'idUsuario', 'nombrePerfilDeMedida', 'medidaCuello', 'medidaPecho', 'medidaAbdomen', 'medidaCadera', 
        //'medidaMangaLongitud', 'medidaEspalda', 'medidaTronco', 'medidaPuno', 'medidaSisa', 'medidaBicep'

        $details = Detail::where('idAutoincrementable', '=', $id)->join('medidasProducto', 'ordenDetalle.idAutoincrementable', '=', 'medidasProducto.idOrdenDetalle')->get();
        $masters = Master::where('idOrden', '=', $details[0]->idOrdenMaestra)->get();
        $estilo = Estilo::where('idOrdenDetalle', '=', $id)->get();
        $distintivo = Distintivo::where('idOrdenDetalle', '=', $id)->get();
        $estatus = Estatus::orderBy('created_at', 'DESC')->where('idOrdenDetalle', '=', $id)->first();
        $usuarios = Customer::where('id', '=', $details[0]->idUsuario)->paginate(10);
        $medidas = Medida::where('idUsuario', '=', $details[0]->idUsuario)->get();
        $localFecha = Carbon::now()->locale('es_ES');
        $fechaCreacion = Carbon::parse($masters[0]->payment_date)->isoFormat('LLLL');;
        $configuracion = Configuracion::where('campo', '=', 'FECHA_MAXIMA_PRODUCCION')->get();
        $fechaMaxima = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor)->isoFormat('LLLL');
        $configuracion = Configuracion::where('campo', '=', 'FECHA_CITA')->get();        
        $fechaCita = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor)->isoFormat('LLLL');
        $aTiempo = 1;

        $sOut = '<table id="reemplazar-'.$details[0]->idAutoincrementable.'" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" class="inner-table">';
        $sOut = $sOut.'<tr><td><b>Medidas</b></td><td></td><td><b>Estilo</b></td><td><b>Distintivo</b></td></tr>';

        $sOut = $sOut.'<tr><td>Cuello: '.$details[0]->cuello.'</td><td>Muñeca: '.$details[0]->muneca.'</td><td>Cuello: '.$estilo[0]->cuello.'</td><td>Contrastes: '.$distintivo[0]->contrastes.'</td></tr>';
        $sOut = $sOut.'<tr><td>Pecho: '.$details[0]->pecho.'</td><td>Espalda: '.$details[0]->espalda.'</td><td>Puño: '.$estilo[0]->puño.'</td><td>Insertos: '.$distintivo[0]->insertos.'</td></tr>';
        $sOut = $sOut.'<tr><td>Cintura: '.$details[0]->cintura.'</td><td>Sisa: '.$details[0]->sisa.'</td><td>Aletilla: '.$estilo[0]->aletilla.'</td><td>Botones: '.$distintivo[0]->botones.'</td></tr>';
        $sOut = $sOut.'<tr><td>Cadera: '.$details[0]->cadera.'</td><td>Bicep: '.$details[0]->bicep.'</td><td>Tipo de Corte: '.$estilo[0]->corte.'</td><td>Iniciales: '.$distintivo[0]->iniciales.'</td></tr>';
        $sOut = $sOut.'<tr><td>Largo Manga: '.$details[0]->manga.'</td><td>Largo Deseado: '.$details[0]->deseado.'</td><td>Bolsillo: '.$estilo[0]->bolsillo.'</td><td>Información: '.$distintivo[0]->informacion.'</td></tr>';

        $sOut = $sOut.'<tr><td><b>Fechas</b></td><td></td><td></td><td><b>Estatus</b></td><td></td></tr>';
        $sOut = $sOut.'<tr><td><b>Pedido: </b>'.$fechaCreacion.'</td><td><b>Máxima: </b>'.$fechaMaxima.'</td><td><b>Cita: </b>'.$fechaCita.'</td><td><span class="badge badge-lg badge-warning"><b>'.$estatus->estatus.'</b></span></td></tr>';        
        $sOut = $sOut.'</table>';

        return $sOut;

    }   

    public function showDataModal($id)
    {
                                
        //Tabla ordenDetalle:'idAutoincrementable', 'idOrdenMaestra', 'idProductoCarrito', 'idUsuario', 'categoriaProducto', 'urlAmigable', 
        //'esPersonalizado', 'nombreProducto', 'medidaProducto', 'tejidoProducto', 'estiloProducto', 'distintivoProducto', 'precioProducto', 
        //'imagenProducto', 'cantidadProducto'

        //Tabla ordenMaestra: 'idOrden', 'idUsuario', 'metodoDePago', 'seDeseoEfectuarLaOrden', 'notasDelPedido', 'nombreDeEnvio', 'costo_de_envio', 
        //'nombreCompletoCliente', 'correoElectronicoCliente', 'facturacionElectronica', 'nombredireccionDeFacturacion', 'apellidosdireccionDeFacturacion', 
        //'correoElectronicodireccionDeFacturacion', 'RFCdireccionDeFacturacion', 'RazonSocialdireccionDeFacturacion', 'domicilioFiscaldireccionDeFacturacion', 
        //'nombrePersonaDireccionDeEnvio', 'apellidosPersonaDireccionDeEnvio', 'calleDireccionDeEnvio', 'numeroExteriorDireccionDeEnvio', 'numeroInteriorDireccionDeEnvio', 
        //'coloniaDireccionDeEnvio', 'ciudadDireccionDeEnvio', 'codigoPostalDireccionDeEnvio', 'paisDireccionDeEnvio', 'estadoDireccionDeEnvio', 
        //'numeroTelefonoDireccionDeEnvio', 'payer_email', 'first_name', 'last_name', 'payment_date', 'mc_gross', 'payment_currency', 'txn_id', 'receiver_email', 
        //'payment_type', 'payment_status', 'txn_type', 'payer_status', 'address_street', 'address_city', 'address_state', 'address_zip', 'address_country', 
        //'address_status', 'notify_version', 'verify_sign', 'payer_id', 'mc_currency', 'mc_fee', 'state_pol', 'response_code_pol', 'response_message_pol', 'risk', 
        //'reference_sale', 'firma', 'payment_method_id', 'payment_method_type', 'payment_method_name', 'installments_number', 'tax', 'test', 'account_number_ach', 
        //'account_type_ach', 'attempts', 'administrative_fee', 'administrative_fee_base', 'administrative_fee_tax', 'payment_request_state', 'authorization_code', 
        //'bank_id', 'transaction_bank_id', 'transaction_id', 'commision_pol', 'commision_pol_currency', 'customer_number', 'date', 'error_code_bank', 'error_message_bank', 
        //'exchange_rate', 'nickname_buyer', 'nickname_seller', 'description' 

        //Tabla medidausuario: 'idMedida', 'idUsuario', 'nombrePerfilDeMedida', 'medidaCuello', 'medidaPecho', 'medidaAbdomen', 'medidaCadera', 
        //'medidaMangaLongitud', 'medidaEspalda', 'medidaTronco', 'medidaPuno', 'medidaSisa', 'medidaBicep'

        $details = Detail::where('idAutoincrementable', '=', $id)
            ->join('estatusOrdenProduccion', 'ordenDetalle.idAutoincrementable', '=', 'estatusOrdenProduccion.idOrdenDetalle')
            ->join('medidasProducto', 'ordenDetalle.idAutoincrementable', '=', 'medidasProducto.idOrdenDetalle')
            ->select('ordenDetalle.*', 'medidasProducto.id as idMedida', 'medidasProducto.cuello', 'medidasProducto.pecho', 'medidasProducto.cintura', 'medidasProducto.cadera', 'medidasProducto.manga', 'medidasProducto.espalda', 'medidasProducto.deseado', 'medidasProducto.muneca', 'medidasProducto.sisa', 'medidasProducto.bicep', 'estatusOrdenProduccion.consecutivo')->get();
        $masters = Master::where('idOrden', '=', $details[0]->idOrdenMaestra)->get();
        $estilo = Estilo::where('idOrdenDetalle', '=', $id)->get();
        $distintivo = Distintivo::where('idOrdenDetalle', '=', $id)->get();
        $estatus = Estatus::orderBy('created_at', 'DESC')->where('idOrdenDetalle', '=', $id)->first();
        $usuarios = Customer::where('id', '=', $details[0]->idUsuario)->paginate(10);
        $medidas = Medida::where('idUsuario', '=', $details[0]->idUsuario)->get();
        $configuracion = Configuracion::where('campo', '=', 'FECHA_MAXIMA_PRODUCCION')->get();
        $fechaMaxima = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor);
        $configuracion = Configuracion::where('campo', '=', 'FECHA_CITA')->get();        
        $fechaCita = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor);

        $sOut = '<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-6">';                                
        $sOut = $sOut.'       <h4 class="modal-title">Medidas</h4>';    
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';                                
        $sOut = $sOut.'       <h4 class="modal-title">Estilo</h4>';    
        $sOut = $sOut.'   </div>';   
        $sOut = $sOut.'   <div class="form-group col-xs-3">';                                
        $sOut = $sOut.'       <h4 class="modal-title">Distintivo</h4>';    
        $sOut = $sOut.'   </div>';   
        $sOut = $sOut.'</div>'; 

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Cuello:</label>';
        $sOut = $sOut.'       <input type="hidden" name="idMedida" class="form-control" value="'.$details[0]->idMedida.'">';
        $sOut = $sOut.'       <input type="hidden" name="idOrdenDetalle" class="form-control" value="'.$id.'">';      
        $sOut = $sOut.'       <input type="hidden" name="idUsuario" class="form-control" value="'.$details[0]->idUsuario.'">';    
        $sOut = $sOut.'       <input type="hidden" name="estatusConsecutivo" class="form-control" value="'.$details[0]->consecutivo.'">'; 
        $sOut = $sOut.'       <input type="text" name="medidaCuello" class="form-control" placeholder="Ingrese la medida" value="'.$details[0]->cuello.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Pecho:</label>';
        $sOut = $sOut.'       <input type="text" name="medidaPecho" class="form-control" placeholder="Ingrese la medida" value="'.$details[0]->pecho.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Cuello:</label>';
        $sOut = $sOut.'       <input type="text" name="estiloCuello" class="form-control" placeholder="Ingrese el estilo" value="'.$estilo[0]->cuello.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Contrastes:</label>';
        $sOut = $sOut.'       <input type="text" name="distintivoContrastes" class="form-control" placeholder="Ingrese el distintivo" value="'.$distintivo[0]->contrastes.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>';   

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Cintura:</label>';
        $sOut = $sOut.'       <input type="text" name="medidaAbdomen" class="form-control" placeholder="Ingrese la medida" value="'.$details[0]->cintura.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Cadera:</label>';
        $sOut = $sOut.'       <input type="text" name="medidaCadera" class="form-control" placeholder="Ingrese la medida" value="'.$details[0]->cadera.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Puño:</label>';
        $sOut = $sOut.'       <input type="text" name="estiloPuno" class="form-control" placeholder="Ingrese el estilo" value="'.$estilo[0]->puño.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Inserto:</label>';
        $sOut = $sOut.'       <input type="text" name="distintivoInserto" class="form-control" placeholder="Ingrese el distintivo" value="'.$distintivo[0]->inserto.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>';  

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Largo Manga:</label>';
        $sOut = $sOut.'       <input type="text" name="medidaMangaLongitud" class="form-control" placeholder="Ingrese la medida" value="'.$details[0]->manga.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Espalda:</label>';
        $sOut = $sOut.'       <input type="text" name="medidaEspalda" class="form-control" placeholder="Ingrese la medida" value="'.$details[0]->espalda.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Aletilla:</label>';
        $sOut = $sOut.'       <input type="text" name="estiloAletilla" class="form-control" placeholder="Ingrese el estilo" value="'.$estilo[0]->aletilla.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Botones:</label>';
        $sOut = $sOut.'       <input type="text" name="distintivoBotones" class="form-control" placeholder="Ingrese el distintivo" value="'.$distintivo[0]->botones.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>';  

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Largo Deseado:</label>';
        $sOut = $sOut.'       <input type="text" name="medidaTronco" class="form-control" placeholder="Ingrese la medida" value="'.$details[0]->deseado.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Muñeca:</label>';
        $sOut = $sOut.'       <input type="text" name="medidaPuno" class="form-control" placeholder="Ingrese la medida" value="'.$details[0]->muneca.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Tipo de Corte:</label>';
        $sOut = $sOut.'       <input type="text" name="estiloCorte" class="form-control" placeholder="Ingrese el estilo" value="'.$estilo[0]->corte.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Iniciales:</label>';
        $sOut = $sOut.'       <input type="text" name="distintivoIniciales" class="form-control" placeholder="Ingrese el distintivo" value="'.$distintivo[0]->iniciales.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>';

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Sisa:</label>';
        $sOut = $sOut.'       <input type="text" name="medidaSisa" class="form-control" placeholder="Ingrese la medida" value="'.$details[0]->sisa.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Bicep:</label>';
        $sOut = $sOut.'       <input type="text" name="medidaBicep" class="form-control" placeholder="Ingrese la medida" value="'.$details[0]->bicep.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Bolsillo:</label>';
        $sOut = $sOut.'       <input type="text" name="estiloBolsillo" class="form-control" placeholder="Ingrese el estilo" value="'.$estilo[0]->bolsillo.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Información Adicional:</label>';
        $sOut = $sOut.'       <textarea name="distintivoInformacion" class="form-control" cols="5" id="field-6">'.$distintivo[0]->informacion.'</textarea>';
        // $sOut = $sOut.'       <input type="text" name="distintivoInformacion" class="form-control" placeholder="Ingrese el distintivo" value="'.$distintivo[0]->informacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>';

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-12">';                                
        $sOut = $sOut.'       <h4 class="modal-title">Fechas</h4>';    
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>'; 

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Tejido:</label>';
        $sOut = $sOut.'       <input type="text" name="ordenDetalleTejido" class="form-control" placeholder="Ingrese el tipo de tejido" value="'.$details[0]->tejidoProducto.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Personalizado:</label>';
        $sOut = $sOut.'       <input type="text" name="ordenDetallePersonalizado" class="form-control" placeholder="Ingrese SI o NO" value="'.$details[0]->esPersonalizado.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Estatus:</label>';
        $sOut = $sOut.'       <input type="text" name="estatusEstatus" class="form-control" placeholder="Ingrese estatus de producción" value="'.$estatus->estatus.'">';
        $sOut = $sOut.'   </div>';         
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Comentarios:</label>';
        $sOut = $sOut.'       <textarea name="estatusComentarios" class="form-control" cols="5" id="estatusComentarios">'.$estatus->comentarios.'</textarea>';
        // $sOut = $sOut.'       <input type="text" name="estatusComentarios" class="form-control" placeholder="Ingrese los comentarios" value="'.$estatus->comentarios.'">';
        $sOut = $sOut.'   </div>';
                              
        $sOut = $sOut.'</div>';  

        return $sOut;

    } 

    public function showInfo(Request $request, $id)
    {
        if($request->ajax()){
            $detail = \App\Detail::find($id);
            $details_total = \App\Detail::all()->count();

            return response()->json([
                'total' => $details_total,
                'name'  => $detail.name
            ]);
        }
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
