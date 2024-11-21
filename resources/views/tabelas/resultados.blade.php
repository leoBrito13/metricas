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
                    <div class="table-responsive">
                        <table id="resultados" class="table table-striped table-bordered first" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Acessos totais</th>
                                    <th>Acessos orgânicos Google</th>
                                    <th>Acessos pagos Google</th>
                                    <th>Acessos pagos Facebook</th>
                                    <th>Acessos pagos Criteo</th>
                                </tr>
                            </thead> 
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Acessos totais</th>
                                    <th>Acessos orgânicos Google</th>
                                    <th>Acessos pagos Google</th>
                                    <th>Acessos pagos Facebook</th>
                                    <th>Acessos pagos Criteo</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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
    $(document).ready(function() {
        // Captura as datas de início e fim
        let datainicio = '{{ $start_time }}';  // Passa as variáveis do backend para o JavaScript
        let datafim = '{{ $end_time }}';
        let tipo = "{{ $tipo }}";  // O tipo também é passado do backend

        var table = $('#resultados').DataTable({
            order: [[1, 'desc']],
            processing: true,
            serverSide: false,
            ajax: {
                url: `/wp-json/api/carregatabelas?datainicio=${datainicio}&datafim=${datafim}&tipo=${tipo}`, // URL da API
                method: "GET", 
                dataSrc: function(json) {
                    // Retorna os dados da API para o DataTable
                    return json;  
                }
            },
            columns: [
                { data: 'Nome' },
                { data: 'Acessos totais' },
                { data: 'Acessos orgânicos Google' },
                { data: 'Acessos pagos Google' },
                { data: 'Acessos pagos Facebook' },
                { data: 'Acessos pagos Criteo' }
            ]
        });

        // Quando o botão de filtro for clicado, recarrega a tabela com os novos dados
        $('#filtrarButton').on('click', function() {
            // Captura as novas datas de filtro
            datainicio = $('#startDate').val();
            datafim = $('#endDate').val();

            // Recarregar a tabela com as novas datas
            table.ajax.url(`/wp-json/api/carregatabelas?datainicio=${datainicio}&datafim=${datafim}&tipo=${tipo}`).load();
        });
    });
</script>
@endsection