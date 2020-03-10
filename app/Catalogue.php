<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
  public function list()
  {
    return [
      [ "name" => "Clientes", "url" =>"/clients" ],
      [ "name" => "Obras", "url" =>"/works" ],
      [ "name" => "Órdenes de trabajo", "url" =>"/work-orders" ],
      [ "name" => "Ensayes", "url" =>"/samples" ],
      [ "name" => "Personal", "url" =>"/employees" ],
      [ "name" => "Bancos de material", "url" =>"/banks"],
      [ "name" => "Pruebas", "url" =>"/tests"],
      [ "name" => "Empleos", "url" =>"/purposes"]
    ];
  }
}
