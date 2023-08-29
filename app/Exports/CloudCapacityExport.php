<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CloudCapacityExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'cluster_id',
            'mem',
            'cpu',
            'is_active',
            'created_at',
            'updated_at'
        ];
    }

    public function collection()
    {
        return DB::table('cloud_capacity')->select($this->headings())->get();
    }
}
