<!-- ============================================================== -->
<!-- Left Sidebar -->
<!-- ============================================================== -->
<button class="btn btn-sm btn-toggle-sidebar" id="toggleSidebarmobile">
    <i class="fas fa-bars"></i> Menu
</button>
<div id="sidebar" class="nav-left-sidebar sidebar-dark d-flex flex-column">
    <!-- Botão de alternância no mobile -->
    <div class="menu-list flex-grow-1">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="btn btn-sm btn-toggle-sidebar" id="toggleSidebar">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                       <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="true" data-target="#submenu-1-2" aria-controls="submenu-1-2"> <i class="mdi mdi-table"></i>Tabelas</a>
                        <div id="submenu-1-2" class="collapse submenu show" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('tabelas.resultados') ? 'active' : '' }}" href="{{ route('tabelas.resultados') }}">Tabela do resultado de busca</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('tabelas.resultados_imovel') ? 'active' : '' }}" href="{{ route('tabelas.resultados_imovel') }}">Tabela da página do imóvel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  {{ request()->routeIs('tabelas.resultados_conversao') ? 'active' : '' }}" href="{{ route('tabelas.resultados_conversao') }}">Tabela de conversão</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="true" data-target="#submenu-1-2" aria-controls="submenu-1-2"><i class="mdi mdi-chart-line"></i>Gráficos</a>
                        <div id="submenu-1-2" class="collapse submenu show" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('graficos.busca') ? 'active' : '' }}" href="{{ route('graficos.busca') }}">Gráficos do resultado de busca</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('graficos.imovel') ? 'active' : '' }}" href="{{ route('graficos.imovel') }}">Gráficos da página do imóvel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('graficos.conversao') ? 'active' : '' }}" href="{{ route('graficos.conversao') }}">Gráficos de conversão</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->
