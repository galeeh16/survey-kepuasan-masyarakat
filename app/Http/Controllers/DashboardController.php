<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

final class DashboardController extends Controller
{
    public function index()
    {
        $data_dashboard = Cache::remember('data_dashboard', $ttl=300, function () {
            $total_ak1 = DB::table('tbl_responden')->where('id_layanan', 1)->count();
            $total_rekom_passport = DB::table('tbl_responden')->where('id_layanan', 2)->count();
            $total_pelatihan = DB::table('tbl_responden')->where('id_layanan', 3)->count();
            $total_lpk = DB::table('tbl_responden')->where('id_layanan', 4)->count();
            $total_perusahaan = DB::table('tbl_responden')->where('id_layanan', 5)->count();
            $total_hub_intl = DB::table('tbl_responden')->where('id_layanan', 6)->count();

            $bln_sebelum_1 = date('m', strtotime('now -1 month'));
            $thn_sebelum_1 = date('Y', strtotime('now -1 month'));
            $total_day_before = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime('now -1 month')), date('Y', strtotime('now -1 month')));

            $total_bulan_sebelumnya = DB::table('tbl_responden')
                        ->whereBetween('created_at', [
                            $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-' . '01', 
                            $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-' .  $total_day_before])
                        ->count();
                        
            $total_bulan_ini = DB::table('tbl_responden')->where('created_at', date('Y-m-d'))->count();

            return [
                'show_logo' => 'show',
                'total_ak1' => number_format($total_ak1),
                'total_rekom_passport' => number_format($total_rekom_passport),
                'total_pelatihan' => number_format($total_pelatihan),
                'total_lpk' => number_format($total_lpk),
                'total_perusahaan' => number_format($total_perusahaan),
                'total_hub_intl' => number_format($total_hub_intl),
            ];
        });

        return view('dashboard', $data_dashboard);
    }

    public function dataGrafikBar(): JsonResponse
    {
        $data_grafik = Cache::remember('data_dashboard_grafik_bar', $ttl=300, function () {
            $total_ak1 = DB::table('tbl_responden')->where('id_layanan', 1)->count();
            $total_rekom_passport = DB::table('tbl_responden')->where('id_layanan', 2)->count();
            $total_pelatihan = DB::table('tbl_responden')->where('id_layanan', 3)->count();
            $total_lpk = DB::table('tbl_responden')->where('id_layanan', 4)->count();
            $total_perusahaan = DB::table('tbl_responden')->where('id_layanan', 5)->count();
            $total_hub_intl = DB::table('tbl_responden')->where('id_layanan', 6)->count();

            $bln_sebelum_1 = date('m', strtotime('now -1 month'));
            $thn_sebelum_1 = date('Y', strtotime('now -1 month'));
            $total_day_before = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime('now -1 month')), date('Y', strtotime('now -1 month')));

            $total_bulan_sebelumnya = DB::table('tbl_responden')
                        ->whereBetween('created_at', [
                            $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-' . '01', 
                            $thn_sebelum_1 . '-'. $bln_sebelum_1 . '-' .  $total_day_before])
                        ->count();
                        
            $total_bulan_ini = DB::table('tbl_responden')->where('created_at', date('Y-m-d'))->count();

            // [
            //     {
            //         name: 'AK1',
            //         data: [0, 0, 10000]
            //     }, 
            //     {
            //         name: 'Rekom Passport',
            //         data: [0, 0, 1100]
            //     },
            //     {
            //         name: 'Pelatihan',
            //         data: [0, 0, 90]
            //     },
            //     {
            //         name: 'LPK',
            //         data: [0, 0, 900]
            //     },
            //     {
            //         name: 'Pencatatan Perusahaan',
            //         data: [0, 0, 290]
            //     },
            //     {
            //         name: 'Perselisihan Hubungan Industrial',
            //         data: [0, 0, 100]
            //     }
            // ]

            $data_series = [

            ];

            return [
                'total_ak1' => number_format($total_ak1),
                'total_rekom_passport' => number_format($total_rekom_passport),
                'total_pelatihan' => number_format($total_pelatihan),
                'total_lpk' => number_format($total_lpk),
                'total_perusahaan' => number_format($total_perusahaan),
                'total_hub_intl' => number_format($total_hub_intl),
            ];
        });

        return response()->json($data_grafik);
    }
}
