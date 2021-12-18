<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $table = "ordenMaestra";
    
    protected $fillable = ['idOrden', 'idUsuario', 'metodoDePago', 'seDeseoEfectuarLaOrden', 'notasDelPedido', 'nombreDeEnvio', 'costo_de_envio', 'nombreCompletoCliente', 'correoElectronicoCliente', 'facturacionElectronica', 'nombredireccionDeFacturacion', 'apellidosdireccionDeFacturacion', 'correoElectronicodireccionDeFacturacion', 'RFCdireccionDeFacturacion', 'RazonSocialdireccionDeFacturacion', 'domicilioFiscaldireccionDeFacturacion', 'nombrePersonaDireccionDeEnvio', 'apellidosPersonaDireccionDeEnvio', 'calleDireccionDeEnvio', 'numeroExteriorDireccionDeEnvio', 'numeroInteriorDireccionDeEnvio', 'coloniaDireccionDeEnvio', 'ciudadDireccionDeEnvio', 'codigoPostalDireccionDeEnvio', 'paisDireccionDeEnvio', 'estadoDireccionDeEnvio', 'numeroTelefonoDireccionDeEnvio', 'payer_email', 'first_name', 'last_name', 'payment_date', 'mc_gross', 'payment_currency', 'txn_id', 'receiver_email', 'payment_type', 'payment_status', 'txn_type', 'payer_status', 'address_street', 'address_city', 'address_state', 'address_zip', 'address_country', 'address_status', 'notify_version', 'verify_sign', 'payer_id', 'mc_currency', 'mc_fee', 'state_pol', 'response_code_pol', 'response_message_pol', 'risk', 'reference_sale', 'firma', 'payment_method_id', 'payment_method_type', 'payment_method_name', 'installments_number', 'tax', 'test', 'account_number_ach', 'account_type_ach', 'attempts', 'administrative_fee', 'administrative_fee_base', 'administrative_fee_tax', 'payment_request_state', 'authorization_code', 'bank_id', 'transaction_bank_id', 'transaction_id', 'commision_pol', 'commision_pol_currency', 'customer_number', 'date', 'error_code_bank', 'error_message_bank', 'exchange_rate', 'nickname_buyer', 'nickname_seller', 'description'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}