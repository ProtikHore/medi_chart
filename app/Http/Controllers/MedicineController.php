<?php

namespace App\Http\Controllers;

use App\Models\Medicine_Chart;
use App\Models\Medicine_List;
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
        $chartList = Medicine_Chart::get();
        $medicineList = Medicine_List::get();
        return view('medicine.chart', compact(
            'chartList',
            'medicineList'
        ));
    }
}
