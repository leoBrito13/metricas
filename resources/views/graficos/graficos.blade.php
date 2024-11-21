@extends('layouts.app')
@section('content')
<div class="dashboard-principal-widget">
    <!-- ============================================================== -->
    <!-- tabela integrações  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    @include('partials.iframes')
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Fim - tabela usuários  -->
    <!-- ============================================================== -->
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('filtrarButton').addEventListener('click', function() {
        const tipo = document.getElementById('tipo').value; 
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        fetch(`/metricas/recarrega-graficos/${tipo}?start_date=${startDate}&end_date=${endDate}`)
            .then(response => response.text())
            .then(html => {
                const container = document.querySelector('.card-body');
                container.innerHTML = ''; // Limpa o conteúdo antigo
                container.innerHTML = html; // Insere o novo conteúdo
            })
            .catch(error => console.error('Erro ao recarregar a view:', error));
    });
</script>
@endsection