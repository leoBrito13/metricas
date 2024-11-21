<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metricas</title>
    <link rel="stylesheet" href="{{ url('metricas/public/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('metricas/public/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('metricas/public/assets/vendor/fonts/circular-std/style.css') }}">
    <link rel="stylesheet" href="{{ url('metricas/public/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('metricas/public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ url('metricas/public/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('metricas/public/assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ url('metricas/public/assets/vendor/datatables/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('metricas/public/assets/vendor/datatables/css/buttons.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('metricas/public/assets/vendor/datatables/css/select.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('metricas/public/assets/vendor/datatables/css/fixedHeader.bootstrap4.css') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Outras inclusões de CSS -->
</head>
<body>
    <div class="dashboard-main-wrapper">
            @include('partials.sidebar')
            <div class="dashboard-wrapper">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="startDate">Data de Início</label>
                            <input type="date" class="form-control" id="startDate" placeholder="Data de Início" value="{{$start_time}}">
                        </div>
                        <div class="col-md-4">
                            <label for="endDate">Data de Fim</label>
                            <input type="date" class="form-control" id="endDate" placeholder="Data de Fim" value="{{$end_time}}">
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <button class="btn btn-primary" id="filtrarButton">Filtrar</button>
                        </div>
                    </div>
                </div>
                <div class="dashboard-dados">
                    <div class="container-fluid dashboard-content ">
                        @yield('content')
                    </div>
                </div>
            </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="{{ url('metricas/public/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('metricas/public/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ url('metricas/public/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('metricas/public/assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('metricas/public/assets/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('metricas/public/assets/vendor/datatables/js/data-table.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="{{ url('metricas/public/assets/libs/js/main-js.js') }}"></script>
    <script src="{{ url('metricas/public/assets/libs/js/sidebar.js') }}"></script>
    <script src="{{ url('metricas/public/assets/libs/js/functions.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')    
</body>
</html>