<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    private $itemsOnPage = 15;

    public function index()
    {
        return view('plate.index', [
            'plates' => Plate::paginate($this->itemsOnPage)
        ]);
    }
}

