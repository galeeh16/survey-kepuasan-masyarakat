<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

final class DashboardController extends Controller
{
    public function index()
    {
        // $data_dashboard = Cache::remember('data_dashboard', $ttl=300, function () {
            $total_ak1 = DB::table('tbl_responden')->where('id_layanan', 1)->count();
            $total_rekom_passport = DB::table('tbl_responden')->where('id_layanan', 2)->count();
            $total_pelatihan = DB::table('tbl_responden')->where('id_layanan', 3)->count();
            $total_lpk = DB::table('tbl_responden')->where('id_layanan', 4)->count();
            $total_perusahaan = DB::table('tbl_responden')->where('id_layanan', 5)->count();
            $total_hub_intl = DB::table('tbl_responden')->where('id_layanan', 6)->count();

            $bln_sebelum_1 = date('m', strtotime('now -1 month'));
            $thn_sebelum_1 = date('Y', strtotime('now -1 month'));
            $total_day_before = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime('now -1 month')), date('Y', strtotime('now -1 month')));

            $date_from_format = $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-01';
            $date_to_format = $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-' .  $total_day_before;

            $total_bulan_sebelumnya = DB::table('tbl_responden')
                        // ->whereBetween(DB::raw('DATE(created_at)'), [
                        //     $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-01', 
                        //     $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-' .  $total_day_before])
                        ->whereRaw("DATE(created_at) BETWEEN '$date_from_format' AND '$date_to_format'")
                        ->where('id_layanan', 1)
                        ->count();
            
            $bulan_ini_from = date('Y-m') . '-01';
            $bulan_ini_to = date('Y-m-d');

            $total_bulan_ini = DB::table('tbl_responden')
                    // ->whereBetween(DB::raw('DATE(created_at)'), [
                    //     date('Y-m') . '-01',
                    //     date('Y-m-d')
                    // ])
                    ->whereRaw("DATE(created_at) BETWEEN '$bulan_ini_from' AND '$bulan_ini_to'")
                    ->where('id_layanan', 1)
                    ->count();

            $total_mengikuti_survey = $total_ak1 + $total_rekom_passport + $total_pelatihan + $total_lpk + $total_perusahaan + $total_hub_intl;

            $data_dashboard = [
                'show_logo' => 'show',
                'total_ak1' => number_format($total_ak1),
                'total_rekom_passport' => number_format($total_rekom_passport),
                'total_pelatihan' => number_format($total_pelatihan),
                'total_lpk' => number_format($total_lpk),
                'total_perusahaan' => number_format($total_perusahaan),
                'total_hub_intl' => number_format($total_hub_intl),
                'total_bulan_ini' => number_format($total_bulan_ini),
                'total_bulan_sebelumnya' => number_format($total_bulan_sebelumnya),
                'total_mengikuti_survey' => number_format($total_mengikuti_survey)
            ];
        // });

        return view('dashboard', $data_dashboard);
    }

    public function dataGrafikBar(): JsonResponse
    {
        // $data_grafik = Cache::remember('data_dashboard_grafik_bar', $ttl=300, function () {
            $tgl_awal_bulan_ini = date('Y-m') . '-01'; 
            $tgl_now = date('Y-m-d');

            $total_ak1 = DB::table('tbl_responden')->where('id_layanan', 1)->whereBetween(DB::raw('DATE(created_at)'), [$tgl_awal_bulan_ini, $tgl_now])->count();
            $total_rekom_passport = DB::table('tbl_responden')->where('id_layanan', 2)->whereBetween(DB::raw('DATE(created_at)'), [$tgl_awal_bulan_ini, $tgl_now])->count();
            $total_pelatihan = DB::table('tbl_responden')->where('id_layanan', 3)->whereBetween(DB::raw('DATE(created_at)'), [$tgl_awal_bulan_ini, $tgl_now])->count();
            $total_lpk = DB::table('tbl_responden')->where('id_layanan', 4)->whereBetween(DB::raw('DATE(created_at)'), [$tgl_awal_bulan_ini, $tgl_now])->count();
            $total_perusahaan = DB::table('tbl_responden')->where('id_layanan', 5)->whereBetween(DB::raw('DATE(created_at)'), [$tgl_awal_bulan_ini, $tgl_now])->count();
            $total_hub_intl = DB::table('tbl_responden')->where('id_layanan', 6)->whereBetween(DB::raw('DATE(created_at)'), [$tgl_awal_bulan_ini, $tgl_now])->count();

            $data_series = [
                [
                    'name' => 'AK1',
                    'data' => [$total_ak1, $total_rekom_passport, $total_pelatihan, $total_lpk, $total_perusahaan, $total_hub_intl]

                ],

            ];
            
        //     return $data_series;
        // });

        // return response()->json($data_grafik);
        return response()->json($data_series);
    }

    public function filterByLayanan($id_layanan): JsonResponse 
    {
        $bln_sebelum_1 = date('m', strtotime('now -1 month'));
        $thn_sebelum_1 = date('Y', strtotime('now -1 month'));
        $total_day_before = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime('now -1 month')), date('Y', strtotime('now -1 month')));

        $date_from_format = $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-01';
        $date_to_format = $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-' .  $total_day_before;

        $total_bulan_sebelumnya = DB::table('tbl_responden')
                    // ->whereBetween(DB::raw('DATE(created_at)'), [
                    //     $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-01', 
                    //     $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-' .  $total_day_before])
                    ->whereRaw("DATE(created_at) BETWEEN '$date_from_format' AND '$date_to_format'")
                    ->where('id_layanan', $id_layanan)
                    ->count();

        $bulan_ini_from = date('Y-m') . '-01';
        $bulan_ini_to = date('Y-m-d');
                    
        $total_bulan_ini = DB::table('tbl_responden')
                // ->whereBetween(DB::raw('DATE(created_at)'), [
                //     date('Y-m') . '-01',
                //     date('Y-m-d')
                // ])
                ->whereRaw("DATE(created_at) BETWEEN '$bulan_ini_from' AND '$bulan_ini_to'")
                ->where('id_layanan', $id_layanan)
                ->count();

        return response()->json([
            'total_bulan_ini' => $total_bulan_ini,
            'total_bulan_sebelumnya' => $total_bulan_sebelumnya
        ]);
    }
}
