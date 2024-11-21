<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraficosController extends Controller
{
    public function dados_graficos(Request $request, $tipo)
    {
        $hash_secret = 'DKOP903_02MDP';
        // $site_name = explode('.', $_SERVER['HTTP_HOST']);
        // $site_name = ($site_name[0] == 'www' ? $site_name[1] : $site_name[0]);
        $site_name = 'bertholini';
        $domain_secret = hash('crc32', $hash_secret . $site_name);
        // Calcular a data de fim como o dia de hoje
        $endTime = strtotime('today 23:59:59');
        // Calcular a data de início como exatamente 30 dias atrás
        $startTime = strtotime('-30 days', $endTime);
        $startTimeStr = date('Y-m-d', $startTime);
        $endTimeStr = date('Y-m-d', $endTime);

        $iframeSrc = "https://charts.mongodb.com/charts-access-data-uqanl/embed/charts";
        $filter = '{"d_hash":"' . $domain_secret . '","pagescope":"' . $tipo . '","$and":[{"timestamp":{"$gte":' . $startTime . '}},{"timestamp":{"$lte":' . $endTime . '}}]}';

        // Retorne a view com as variáveis
        return view('graficos.graficos', [
            'iframeSrc' => $iframeSrc,
            'filter' => $filter,
            'start_time' => $startTimeStr,
            'end_time' => $endTimeStr,
            'tipo' => $tipo,
        ]);
    }

    public function recarrega_graficos(Request $request, $tipo)
    {
        $hash_secret = 'DKOP903_02MDP';
        // $site_name = explode('.', $_SERVER['HTTP_HOST']);
        // $site_name = ($site_name[0] == 'www' ? $site_name[1] : $site_name[0]);
        $site_name = 'bertholini';
        $domain_secret = hash('crc32', $hash_secret . $site_name);
        // Calcular a data de fim como o dia de hoje
        $startTime = $request->input('start_date') ? strtotime($request->input('start_date') . ' 00:00:00') : strtotime('-30 days');
        $endTime = $request->input('end_date') ? strtotime($request->input('end_date') . ' 23:59:59') : strtotime('today 23:59:59');

        $iframeSrc = "https://charts.mongodb.com/charts-access-data-uqanl/embed/charts";
        $filter = '{"d_hash":"' . $domain_secret . '","pagescope":"' . $tipo . '","$and":[{"timestamp":{"$gte":' . $startTime . '}},{"timestamp":{"$lte":' . $endTime . '}}]}';

        // Retorne a view com as variáveis
        return view('partials.iframes', [
            'iframeSrc' => $iframeSrc,
            'filter' => $filter,
            'tipo' =>$tipo,
        ]);
    }
}
