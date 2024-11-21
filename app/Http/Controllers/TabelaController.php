<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Validador;
use GuzzleHttp\Client;

class TabelaController extends Controller
{
    protected $validador;
    protected $client;
    public function __construct(Validador $validador, Client $client)
    {
        $this->validador = $validador;
        $this->client = $client;
    }

    public function dados_mongodb_api(Request $request, $tipo)
    {
        // Calcular a data de fim como o dia de hoje
        $endTime = strtotime('today 23:59:59');
        // Calcular a data de início como exatamente 30 dias atrás
        $startTime = strtotime('-30 days', $endTime);


        // Ajustar para garantir que as datas estejam no formato correto
        $startTimeStr = date('Y-m-d', $startTime);
        $endTimeStr = date('Y-m-d', $endTime);

        // Retorne a view com as variáveis
        return view('tabelas.resultados', [
            'start_time' => $startTimeStr,
            'end_time' => $endTimeStr,
            'tipo' => $tipo
        ]);
    }

}
