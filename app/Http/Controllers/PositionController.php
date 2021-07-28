<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function addPosition() {
        $allPositions = Position::get();
        return view('position.index', compact(
            'allPositions'
        ));
    }

    public function savePosition(Request $request) {
        $record = $request->get('id') === null ? new Position() : Position::find($request->get('id'));
        $record->position = $request->get('position');
        $record->status = $request->get('status');
        $request->get('description') === null ? $record->description = '---' : $record->description = $request->get('description');
        $request->get('id') === null ? $record->created_by = session('id') : $record->updated_by = session('id');
        $record->save();
        return response()->json($record);
    }
}
