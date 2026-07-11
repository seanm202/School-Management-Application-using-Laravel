<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    //
    
    public function getEntityDetailsByAJAX()
    {
      $entities = \App\Models\Entity::all();
      return response()->json($entities);
    }
}
