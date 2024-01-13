<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\InventoryProduct;

class SalesReportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

        public function collection()
    {
        return InventoryProduct::all();
    }
}
