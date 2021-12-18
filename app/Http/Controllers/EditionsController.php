<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use App\User;
use App\Customer;
use App\Master;
use App\Detail;
use App\Medida;
use App\Estilo;
use App\Distintivo;
use App\Estatus;
use App\Configuracion;
use App\Delivery;
use App\Invoice;
use App\Edition;

class EditionsController extends Controller
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
        /* SELECT ordenMaestra.idOrden, ordenDetalle.cantidadProducto, COUNT(ordenDetalle.cantidadProducto) AS total FROM ordenMaestra, ordenDetalle WHERE ordenMaestra.idOrden = ordenDetalle.idOrdenMaestra GROUP BY ordenMaestra.idOrden */

        $cantidadProducto = Detail::where('idOrdenMaestra', '=', 366)->count('cantidadProducto');
        $details = Detail::orderBy('idOrdenMaestra', 'DESC')->latest()->take(500)
        ->join('estatusOrdenProduccion', 'ordenDetalle.idAutoincrementable', '=', 'estatusOrdenProduccion.idOrdenDetalle')
        ->join('ordenMaestra', 'ordenDetalle.idOrdenMaestra', '=', 'ordenMaestra.idOrden')
        ->select('ordenMaestra.nombreCompletoCliente', 'estatusOrdenProduccion.estatus', 'estatusOrdenProduccion.comentarios', 'estatusOrdenProduccion.consecutivo', 'ordenDetalle.*')->get();        
        // $masters = Master::orderBy('idOrden', 'DESC')->latest()->take(500)->get();        
        $masters = Master::orderBy('idOrden', 'DESC')->latest()->take(500)->
                join('avanceOrdenProduccion', 'avanceOrdenProduccion.idOrdenMaestra', '=', 'ordenMaestra.idOrden')->select('ordenMaestra.*', 'avanceOrdenProduccion.avance', 'avanceOrdenProduccion.total')->get();
        $editions = Edition::orderBy('orden', 'ASC')->get();
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

        return view('editions.index')
            ->with('masters', $masters)
            ->with('details', $details)
            ->with('editions', $editions)            
            ->with('customers_total', $usuarios_total)
            ->with('orders_total', $orders_total)
            ->with('products_total', $products_total)
            ->with('caja', $ganancia)
            ->with('cantidadProducto', $cantidadProducto);
/*            ->with('total_orders', $total_orders)
            ->with('percentage', $percentage)
            ->with('total_products', $total_products)
            ->with('ganancia', $ganancia)
            ->with('total_categories', $total_categories)
            ->with('total_promotions', $total_promotions);*/
    }

    public function customerOrders($id)
    {
        $masters = Master::orderBy('idOrden', 'ASC')->where('idUsuario', '=', $id)->paginate(10);
        $usuarios_total = Customer::all()->count();
        $orders_total = Master::all()->count();
        $products_total = Detail::all()->count();
        $ganancia = Detail::get()->sum('precioProducto');
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

        return view('masters.index')
            ->with('masters', $masters)
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

    // Recibe todos los datos del Modal de edición de la orden maestra
    // y los guarda actualizados.

    public function receiveData(Request $request)
    {

        // {_token:_token, idUser:idUser, orden:orden, consecutivo:consecutivo, ordenSeleccionado:ordenSeleccionado, actual:actual, ordenActual:ordenActual}
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

            $idUsuario = $request->input("idUser");
            $idOrdenDetalle = $request->input("orden");
            $consecutivo = $request->input("consecutivo");
            $seleccionado = Edition::select('estatus')->where('id', '=', $request->input("ordenSeleccionado"))->first();
            $actual = $request->input("actual");
            $configuracion = Configuracion::where('campo', '=', 'DEBUG_MODE')->get();  
            $depuracion = $configuracion[0]->valor;
            $resultado = Estatus::where('idOrdenDetalle', $idOrdenDetalle)
                                ->where('consecutivo', $consecutivo)
                                ->update([
                                    'estatus' => $seleccionado['estatus']
                                ]);
        

            $mensaje = $seleccionado['estatus'];
            return response()->json(['success'=>$mensaje, 'debug'=>$depuracion]);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }

    // Devuelve la vista invocada cuando se despliegan los detalles de la grilla al archivo Scrips.master.js
    // para que los muestre con la información en el desplegado de la grilla sin recargar la página.

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

        //Tabla direcciondeenvio: `idDireccionDeEnvio`, `idUsuario`, `nombrePersonaDireccionDeEnvio`, `apellidosPersonaDireccionDeEnvio`, `calleDireccionDeEnvio`, 
        //`numeroExteriorDireccionDeEnvio`, `numeroInteriorDireccionDeEnvio`, `coloniaDireccionDeEnvio`, `ciudadDireccionDeEnvio`, `codigoPostalDireccionDeEnvio`, 
        //`paisDireccionDeEnvio`, `estadoDireccionDeEnvio`, `numeroTelefonoDireccionDeEnvio`, `updated_at`

        //Tabla direcciondefacturacion: `idDireccionFacturacion`, `idUsuario`, `nombredireccionDeFacturacion`, `apellidosdireccionDeFacturacion`, `calleDireccionDeFacturacion`, 
        //`numeroExteriorDireccionDeFacturacion`, `numeroInteriorDireccionDeFacturacion`, `coloniaDireccionDeFacturacion`, `ciudadDireccionDeFacturacion`, `codigoPostalDireccionDeFacturacion`, 
        //`paisDireccionDeFacturacion`, `estadoDireccionDeFacturacion`, `numeroTelefonoDireccionDeFacturacion`, `correoElectronicodireccionDeFacturacion`, `RFCdireccionDeFacturacion`, 
        //`RazonSocialdireccionDeFacturacion`, `domicilioFiscaldireccionDeFacturacion`, `updated_at`

        $masters = Master::where('idOrden', '=', $id)->get();
        $delivery = Delivery::where('idUsuario', '=', $masters[0]->idUsuario)->get();
        $invoice = Invoice::where('idUsuario', '=', $masters[0]->idUsuario)->get();        
        $details = Detail::where('idOrdenMaestra', '=', $id)->get();        
        $estilo = Estilo::where('idOrdenDetalle', '=', $details[0]->idAutoincrementable)->get();
        $distintivo = Distintivo::where('idOrdenDetalle', '=', $details[0]->idAutoincrementable)->get();
        $estatus = Estatus::orderBy('created_at', 'DESC')->where('idOrdenDetalle', '=', $details[0]->idAutoincrementable)->first();
        $usuarios = Customer::where('id', '=', $details[0]->idUsuario)->paginate(10);
        $medidas = Medida::where('idUsuario', '=', $details[0]->idUsuario)->get();
        $configuracion = Configuracion::where('campo', '=', 'FECHA_MAXIMA_PRODUCCION')->get();
        $fechaMaxima = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor);
        $configuracion = Configuracion::where('campo', '=', 'FECHA_CITA')->get();        
        $fechaCita = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor);

        $sOut = '<table id="reemplazar-'.$masters[0]->idOrden.'" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" class="inner-table">';
        $sOut = $sOut.'<tr><td><b>Dirección de Envío</b></td> <td></td> <td><b>Dirección de Facturación</b></td> <td></td> <td><b>Contacto</b></td></tr>';

        $sOut = $sOut.'<tr><td>Nombre: '.$delivery[0]->nombrePersonaDireccionDeEnvio.'</td><td>Colonia: '.$delivery[0]->coloniaDireccionDeEnvio.'</td><td>Nombre: '.$invoice[0]->nombrePersonaDireccionDeFacturacion.'</td><td>Colonia: '.$invoice[0]->coloniaDireccionDeFacturacion.'</td><td>Teléfono: '.$invoice[0]->numeroTelefonoDireccionDeFacturacion.'</td></tr>';
        $sOut = $sOut.'<tr><td>Apellido: '.$delivery[0]->apellidosdireccionDeEnvio.'</td><td>C.P.: '.$delivery[0]->codigoPostalDireccionDeEnvio.'</td><td>Apellido: '.$invoice[0]->apellidosdireccionDeFacturacion.'</td><td>C.P.: '.$invoice[0]->codigoPostalDireccionDeFacturacion.'</td><td>Email: '.$invoice[0]->correoElectronicodireccionDeFacturacion.'</td></tr>';
        $sOut = $sOut.'<tr><td>Dirección: '.$delivery[0]->calleDireccionDeEnvio.'</td><td>Ciudad: '.$delivery[0]->ciudadDireccionDeEnvio.'</td><td>Dirección: '.$invoice[0]->calleDireccionDeFacturacion.'</td><td>Ciudad: '.$invoice[0]->ciudadDireccionDeFacturacion.'</td><td>&nbsp</td></tr>';
        $sOut = $sOut.'<tr><td>Exterior: '.$delivery[0]->numeroExteriorDireccionDeEnvio.'</td><td>Estado: '.$delivery[0]->estadoDireccionDeEnvio.'</td><td>Exterior: '.$invoice[0]->numeroExteriorDireccionDeFacturacion.'</td><td>Estado: '.$invoice[0]->estadoDireccionDeFacturacion.'</td><td>Razón Social: '.$invoice[0]->RazonSocialdireccionDeFacturacion.'</td></tr>';
        $sOut = $sOut.'<tr><td>Interior: '.$delivery[0]->numeroInteriorDireccionDeEnvio.'</td><td>País: '.$delivery[0]->paisDireccionDeEnvio.'</td><td>Interior: '.$invoice[0]->numeroInteriorDireccionDeFacturacion.'</td><td>País: '.$invoice[0]->paisDireccionDeFacturacion.'</td><td>RFC: '.$invoice[0]->RFCdireccionDeFacturacion.'</td></tr>';

        $sOut = $sOut.'<tr><td><b>Fechas</b></td><td></td><td></td><td><b>Notas del Pedido</b></td><td></td></tr>';
        $sOut = $sOut.'<tr><td><b>Pedido: </b>'.$masters[0]->payment_date.'</td><td><b>Máxima: </b>'.$fechaMaxima.'</td><td><b>Cita: </b>'.$fechaCita.'</td><td><b>'.$masters[0]->notasDelPedido.'</b></td></tr>';        
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

        $masters = Master::where('idOrden', '=', $id)->get();
        $delivery = Delivery::where('idUsuario', '=', $masters[0]->idUsuario)->get();
        $invoice = Invoice::where('idUsuario', '=', $masters[0]->idUsuario)->get();        
        $details = Detail::where('idOrdenMaestra', '=', $id)->get();  
        $estilo = Estilo::where('idOrdenDetalle', '=', $details[0]->idAutoincrementable)->get();
        $distintivo = Distintivo::where('idOrdenDetalle', '=', $details[0]->idAutoincrementable)->get();
        $estatus = Estatus::orderBy('created_at', 'DESC')->where('idOrdenDetalle', '=', $details[0]->idAutoincrementable)->first();
        $usuarios = Customer::where('id', '=', $details[0]->idUsuario)->paginate(10);
        $medidas = Medida::where('idUsuario', '=', $details[0]->idUsuario)->get();
        $configuracion = Configuracion::where('campo', '=', 'FECHA_MAXIMA_PRODUCCION')->get();
        $fechaMaxima = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor);
        $configuracion = Configuracion::where('campo', '=', 'FECHA_CITA')->get();        
        $fechaCita = Carbon::parse($masters[0]->payment_date)->addDay($configuracion[0]->valor);

        $sOut = '<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-6">';                                
        $sOut = $sOut.'       <h4 class="modal-title">Dirección de Envío</h4>';    
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-6">';                                
        $sOut = $sOut.'       <h4 class="modal-title">Dirección de Facturación</h4>';    
        $sOut = $sOut.'   </div>';   
        $sOut = $sOut.'</div>'; 

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Nombre:</label>';
        $sOut = $sOut.'       <input type="hidden" name="idUsuario" class="form-control" value="'.$details[0]->idUsuario.'">';  
        $sOut = $sOut.'       <input type="hidden" name="idOrden" class="form-control" value="'.$masters[0]->idOrden.'">';         
        $sOut = $sOut.'       <input type="text" name="nombrePersonaDireccionDeEnvio" class="form-control" placeholder="Ingrese el nombre" value="'.$delivery[0]->nombrePersonaDireccionDeEnvio.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Colonia:</label>';
        $sOut = $sOut.'       <input type="text" name="coloniaDireccionDeEnvio" class="form-control" placeholder="Ingrese la colonia" value="'.$delivery[0]->coloniaDireccionDeEnvio.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Nombre:</label>';
        $sOut = $sOut.'       <input type="text" name="nombrePersonaDireccionDeFacturacion" class="form-control" placeholder="Ingrese el nombre" value="'.$invoice[0]->nombrePersonaDireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Colonia:</label>';
        $sOut = $sOut.'       <input type="text" name="coloniaDireccionDeFacturacion" class="form-control" placeholder="Ingrese la colonia" value="'.$invoice[0]->coloniaDireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>';   

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Apellido:</label>';
        $sOut = $sOut.'       <input type="text" name="apellidosPersonaDireccionDeEnvio" class="form-control" placeholder="Ingrese el apellido" value="'.$delivery[0]->apellidosPersonaDireccionDeEnvio.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>C.P.:</label>';
        $sOut = $sOut.'       <input type="text" name="codigoPostalDireccionDeEnvio" class="form-control" placeholder="Ingrese el código postal" value="'.$delivery[0]->codigoPostalDireccionDeEnvio.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Apellido:</label>';
        $sOut = $sOut.'       <input type="text" name="apellidosPersonaDireccionDeFacturacion" class="form-control" placeholder="Ingrese la apellido" value="'.$invoice[0]->apellidosPersonaDireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>C.P.:</label>';
        $sOut = $sOut.'       <input type="text" name="codigoPostalDireccionDeFacturacion" class="form-control" placeholder="Ingrese el código postal" value="'.$invoice[0]->codigoPostalDireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>';  

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Dirección:</label>';
        $sOut = $sOut.'       <input type="text" name="calleDireccionDeEnvio" class="form-control" placeholder="Ingrese la calle" value="'.$delivery[0]->calleDireccionDeEnvio.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Ciudad:</label>';
        $sOut = $sOut.'       <input type="text" name="ciudadDireccionDeEnvio" class="form-control" placeholder="Ingrese la ciudad" value="'.$delivery[0]->ciudadDireccionDeEnvio.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Dirección:</label>';
        $sOut = $sOut.'       <input type="text" name="calleDireccionDeFacturacion" class="form-control" placeholder="Ingrese la calle" value="'.$invoice[0]->calleDireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Ciudad:</label>';
        $sOut = $sOut.'       <input type="text" name="ciudadDireccionDeFacturacion" class="form-control" placeholder="Ingrese la ciudad" value="'.$invoice[0]->ciudadDireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>';  

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Interior:</label>';
        $sOut = $sOut.'       <input type="text" name="numeroInteriorDireccionDeEnvio" class="form-control" placeholder="Ingrese el número interior" value="'.$delivery[0]->numeroInteriorDireccionDeEnvio.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Estado:</label>';
        $sOut = $sOut.'       <input type="text" name="estadoDireccionDeEnvio" class="form-control" placeholder="Ingrese el estado" value="'.$delivery[0]->estadoDireccionDeEnvio.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Interior:</label>';
        $sOut = $sOut.'       <input type="text" name="numeroInteriorDireccionDeFacturacion" class="form-control" placeholder="Ingrese el número interior" value="'.$invoice[0]->numeroInteriorDireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Estado:</label>';
        $sOut = $sOut.'       <input type="text" name="estadoDireccionDeFacturacion" class="form-control" placeholder="Ingrese el estado" value="'.$invoice[0]->estadoDireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>';

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Exterior:</label>';
        $sOut = $sOut.'       <input type="text" name="numeroExteriorDireccionDeEnvio" class="form-control" placeholder="Ingrese el número exterior" value="'.$delivery[0]->numeroExteriorDireccionDeEnvio.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>País:</label>';
        $sOut = $sOut.'       <input type="text" name="paisDireccionDeEnvio" class="form-control" placeholder="Ingrese el pais" value="'.$delivery[0]->paisDireccionDeEnvio.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Exterior:</label>';
        $sOut = $sOut.'       <input type="text" name="numeroExteriorDireccionDeFacturacion" class="form-control" placeholder="Ingrese el número exterior" value="'.$invoice[0]->numeroExteriorDireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>País:</label>';
        $sOut = $sOut.'       <input type="text" name="paisDireccionDeFacturacion" class="form-control" placeholder="Ingrese el pais" value="'.$invoice[0]->paisDireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>';

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-12">';                                
        $sOut = $sOut.'       <h4 class="modal-title">Contacto</h4>';    
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>'; 

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Teléfono:</label>';
        $sOut = $sOut.'       <input type="text" name="numeroTelefonoDireccionDeFacturacion" class="form-control" placeholder="Ingrese el teléfono" value="'.$invoice[0]->numeroTelefonoDireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Email:</label>';
        $sOut = $sOut.'       <input type="text" name="correoElectronicodireccionDeFacturacion" class="form-control" placeholder="Ingrese el Email" value="'.$invoice[0]->correoElectronicodireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>Razón Social:</label>';
        $sOut = $sOut.'       <input type="text" name="RazonSocialdireccionDeFacturacion" class="form-control" placeholder="Ingrese la Razón Social" value="'.$invoice[0]->RazonSocialdireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';         
        $sOut = $sOut.'   <div class="form-group col-xs-3">';
        $sOut = $sOut.'       <label>RFC:</label>';
        $sOut = $sOut.'       <input type="text" name="RFCdireccionDeFacturacion" class="form-control" placeholder="Ingrese el RFC" value="'.$invoice[0]->RFCdireccionDeFacturacion.'">';
        $sOut = $sOut.'   </div>';
        $sOut = $sOut.'</div>';  

        $sOut = $sOut.'<div class="row">';
        $sOut = $sOut.'   <div class="form-group col-xs-12">';
        $sOut = $sOut.'       <label>Notas del Pedido:</label>';
        $sOut = $sOut.'       <input type="text" name="notasDelPedido" class="form-control" placeholder="Ingrese la nota" value="'.$masters[0]->notasDelPedido.'">';
        $sOut = $sOut.'   </div>';        
        $sOut = $sOut.'</div>';  

        return $sOut;

    } 

    public function showInfo(Request $request, $id)
    {
        if($request->ajax()){
            $master = \App\Master::find($idOrden);
            $masters_total = \App\Master::all()->count();

            return response()->json([
                'total' => $masters_total,
                'name'  => $master.name
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