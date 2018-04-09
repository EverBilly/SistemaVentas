<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
   protected $table = 'ingreso';

   protected $primaryKey = "idingreso";

   public $timestamps = false;

   protected $fillable =[
   	'idcliente',
   	'tipo_comprobante',
   	'serie_comprobante',
   	'num_comprobante',
   	'fecha_hora',
   	'impuesto',
   	'total_venta',
   	'estado'
   ];
   
   protected $guarded =[

   ];
}
