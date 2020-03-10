<?php

namespace App\Http\Controllers;

use App\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
  public function index()
  {
    $elements = (new Catalogue)->list();

    return view('catalogue.index', [
      'elements' => $elements
    ]);
  }
}
