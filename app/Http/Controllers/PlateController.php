<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    private $itemsOnPage = 15;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('plate.index', ['plates' => Plate::paginate($this->itemsOnPage)]);
    }

    public function edit($id)
    {
        return view('plate.edit', ['plate' => Plate::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'artist_name' => 'required',
            'album_title' => 'required',
            'duration' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0.1'
        ]);

        $plate = Plate::findOrFail($id);
        $plate->fill($request->all())->save();

        return redirect()->route('plates.index')->with('status', 'Запись успешно обновлена!');
    }

    public function destroy($id)
    {
        Plate::destroy($id);

        return redirect()->route('plates.index')->with('status', 'Запись успешно удалена!');
    }
}

