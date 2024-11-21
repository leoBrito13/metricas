<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contador;
use App\Services\Dados;

class DashboardController extends Controller
{
    protected $contador;
    protected $dados;
    private $filepath;

    public function __construct(Contador $contador, Dados $dados)
    {
        $this->contador = $contador;
        $this->dados = $dados;
        $this->filepath = $_SERVER["DOCUMENT_ROOT"].'/data-management/data/db_server_all.json';
    }

    public function index()
    {
        $data = $this->dados->carregaDados($this->filepath);
        $totalClientes = $this->contador->ContaClientes($data);
        $crms = $this->contador->ContaCrm($data);
        $totalBuscaMapa = $this->contador->ContaCampo($data, 'cfdata_enablebuscamapa');
        $totalAutomacaoLocacao = $this->contador->ContaCampo($data, 'cfdata_alugue-pela-pg-imovel-enabled');
        $totalAutomacaoCaptacao = $this->contador->ContaCampo($data, 'cfdata_cadastro-imovel_on');
        $totalProposta = $this->contador->ContaCampo($data, 'cfdata_cadastro_proposta_on');
        $totalLinkCorretor = $this->contador->ContaCampo($data, "cfdata_linkdocorretor_on");
        $totalCorretorCaptador= $this->contador->ContaCampo($data, "cfdata_corretorcaptador_on");
        $totalFeirao = $this->contador->ContaCampanhas($data);
        $totalPremium = $this->contador->ContaPlanos($data, "PREMIUM");
        $premiumPorcentagem = $this->contador->calcularPorcentagem($totalClientes, $totalPremium);
        $totalStandard = $this->contador->ContaPlanos($data, "STANDARD");

            // Passar dados para a view sem usar compact
        return view('dashboard.index', [
            'totalClientes' => $totalClientes,
            'crms' => $crms,
            'totalBuscaMapa' => $totalBuscaMapa,
            'totalAutomacaoLocacao' => $totalAutomacaoLocacao,
            'totalAutomacaoCaptacao' => $totalAutomacaoCaptacao,
            'totalProposta' => $totalProposta,
            'totalLinkCorretor' => $totalLinkCorretor,
            'totalCorretorCaptador' => $totalCorretorCaptador,
            'totalFeirao' => $totalFeirao,
            'totalPremium' => $totalPremium,
            'totalStandard' => $totalStandard,
            'premiumPorcentagem' => $premiumPorcentagem,
            'contador' => $this->contador
        ]);
    }

}
