<?php

namespace App\Http\Controllers;

use App\Models\Medicine_Chart;
use App\Models\Medicine_List;
use App\Models\Position;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index() {
        $medicineList = Medicine_List::paginate(10);
        $title = 'Medicine List';
        return view('medicine.index', compact(
            'medicineList',
            'title'
        ));
    }

    public function medicineChart() {
        $chartList = Medicine_Chart::with('position', 'MedicineList')->get();
        //dd($chartList[0]->MedicineList);
        $medicineList = Medicine_List::get();
        $positions = Position::get();
        return view('medicine.chart', compact(
            'chartList',
            'medicineList',
            'positions'
        ));
    }

    public function addToChart(Request $request) {
        //return response()->json($request);
        $record = $request->get('id') === null ? new Medicine_Chart() : Medicine_Chart::find($request->get('id'));
        $record->medicine_list_id = $request->get('medicine_name');
        $record->position_id = $request->get('position');
        $record->status = $request->get('status');
        $request->get('description') === null ? $record->description = '---' : $record->description = $request->get('description');
        $request->get('id') === null ? $record->created_by = session('id') : $record->updated_by = session('id');
        $record->save();
        return response()->json($record);
    }
}
