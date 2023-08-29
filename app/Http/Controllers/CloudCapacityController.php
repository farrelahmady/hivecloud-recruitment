<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\CloudCapacityExport;
use App\Mail\CloudCapacityReportMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class CloudCapacityController extends Controller
{
    public function index()
    {
        $clouds = DB::table('cloud_capacity')->select('cloud_capacity.*', 'cluster.cluster_name')->join('cluster', 'cluster.id', '=', 'cloud_capacity.cluster_id')->get();

        return view('cloud-capacity', compact('clouds'));
    }

    public function report()
    {
        Excel::store(new CloudCapacityExport, 'cloud-capacity.xlsx');

        // Riyan.setiawan@teknovatus.com
        Mail::to('farrelfay.ce@gmail.com')->send(new CloudCapacityReportMail);

        Storage::delete('cloud-capacity.xlsx');

        return redirect()->back()->with('success', 'Report has been sent to your email');
    }
}
