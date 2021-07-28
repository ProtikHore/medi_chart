<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine_Chart extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'medicine_charts';

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function MedicineList()
    {
        return $this->belongsTo(Medicine_List::class);
    }
}
