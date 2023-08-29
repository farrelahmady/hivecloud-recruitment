<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    function index(): View
    {
        $clusters = DB::select('select id, cluster_name from cluster where is_active = ?', [1]);

        $clouds = DB::table('cloud_capacity')
            ->rightJoin('cluster', 'cluster.id', '=', 'cloud_capacity.cluster_id')
            ->select('cluster.cluster_name', DB::raw('SUM(cloud_capacity.cpu) as total_cpu'), DB::raw('SUM(cloud_capacity.mem) as total_memory'))
            ->groupBy('cloud_capacity.cluster_id', 'cluster.cluster_name')
            ->orderBy('cluster.id')
            ->get();


        $labels = array_values(array_map(function ($cluster) {
            return $cluster->cluster_name;
        }, $clusters));

        $datasets = [
            [
                'label' => 'CPU',
                'borderRadius' => 8,
                'backgroundColor' => '#7CB5EC',
                'data' => $clouds->map(function ($cluster) {
                    return (int)$cluster->total_cpu;
                })
            ],
            [
                'label' => 'Memory',
                'borderRadius' => 8,
                'backgroundColor' => '#90ED7D',
                'data' => $clouds->map(function ($cluster) {
                    return (int)$cluster->total_memory;
                })
            ]
        ];



        return view('dashboard', compact('labels', 'datasets'));
    }
}
