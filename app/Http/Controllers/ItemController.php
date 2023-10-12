<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $input = [
            'title' => 'Trencito',
            'data' => [
                '1' => 'Chocolate de leche',
                '2' => 'Formato Barra',
                '3' => 'Formato 150g'
            ]
        ];
  
        $item = Item::create($input);
  
        dd($item->data);
  
    }



    //
}
