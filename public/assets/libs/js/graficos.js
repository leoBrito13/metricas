const cores = [
    '#FF6384', // Rosa
    '#36A2EB', // Azul
    '#FFCE56', // Amarelo
    '#4BC0C0', // Verde-água
    '#9966FF', // Roxo
    '#FF9F40', // Laranja
    '#FF5722', // Vermelho-alaranjado
    '#795548', // Marrom
    '#607D8B', // Azul-acizentado
    '#E91E63', // Rosa-choque
    '#3F51B5', // Azul-escuro
    '#9C27B0', // Roxo-escuro
    '#009688', // Verde-escuro
    '#FFEB3B', // Amarelo-claro
    '#FFC107'  // Dourado
];

// Carregando dados para os gráficos de linha
fetch('/data-management/data/dados_mes.json')
    .then(response => response.json())
    .then(dadosPorMes => {
        const labels = Object.keys(dadosPorMes);

        // Dados para o gráfico CRMs
        const crmsTipos = Object.keys(dadosPorMes[labels[0]].crms);
        const datasetsCrms = crmsTipos.map((tipo, index) => ({
            label: tipo.charAt(0).toUpperCase() + tipo.slice(1),
            data: labels.map(label => dadosPorMes[label].crms[tipo] || 0),
            fill: true,
            backgroundColor: 'transparent',
            borderColor: cores
        }));

        // Dados para o gráfico Clientes
        const tiposClientes = ['clientes'];
        const datasetsClientes = tiposClientes.map((tipo, index) => ({
            label: tipo.charAt(0).toUpperCase() + tipo.slice(1),
            data: labels.map(label => dadosPorMes[label][tipo] || 0),
            fill: true,
            backgroundColor: 'transparent',
            borderColor: cores
        }));

        // Dados para o gráfico Premium e Standard
        const tiposClientePremiumStandard = ['premium', 'standard'];
        const datasetsClientePremiumStandard = tiposClientePremiumStandard.map((tipo, index) => ({
            label: tipo.charAt(0).toUpperCase() + tipo.slice(1),
            data: labels.map(label => dadosPorMes[label][tipo] || 0),
            fill: true,
            backgroundColor: 'transparent',
            borderColor: cores
        }));

        // Dados para o gráfico dos demais tipos
        const tiposFuncoes = ['buscaMapa', 'automacaoLocacao', 'automacaoCaptacao', 'proposta', 'feirao','linkcorretor','corretorcaptador'];
        const datasetsRestantes = tiposFuncoes.map((tipo, index) => ({
            label: tipo.charAt(0).toUpperCase() + tipo.slice(1),
            data: labels.map(label => dadosPorMes[label][tipo] || 0),
            fill: true,
            backgroundColor: 'transparent',
            borderColor: cores
        }));

        // // Criando os gráficos de linha
        // const ctx1 = document.getElementById('myChart1').getContext('2d');
        // criarGrafico(ctx1, labels, datasetsClientes);

        const ctx2 = document.getElementById('myChart2').getContext('2d');
        criarGrafico(ctx2, labels, datasetsClientePremiumStandard);

        // const ctx3 = document.getElementById('myChart3').getContext('2d');
        // criarGrafico(ctx3, labels, datasetsCrms);

        const ctx4 = document.getElementById('myChart4').getContext('2d');
        criarGrafico(ctx4, labels, datasetsRestantes);

        // Criando gráficos de barras horizontais
        const ctxBar1 = document.getElementById('myChartBarPlanos').getContext('2d');
        criarGraficoBarrasHorizontais(ctxBar1, labels, datasetsClientePremiumStandard);

        const ctxBar2 = document.getElementById('myChartBarFuncoes').getContext('2d');
        criarGraficoBarrasHorizontais(ctxBar2, labels, datasetsRestantes);

        const ctxBar3 = document.getElementById('myChartBarCrms').getContext('2d');
        criarGraficoBarrasHorizontais(ctxBar3, labels, datasetsCrms);

        // const ctxBar4 = document.getElementById('myChartBar4').getContext('2d');
        // criarGraficoBarrasHorizontais(ctxBar4, labels, datasetsRestantes);

    })
    .catch(error => console.error('Erro ao carregar os dados para gráficos de linha: ', error));

// Carregando dados para os gráficos de pizza
fetch('/data-management/data/dados_totais.json')
    .then(response => response.json())
    .then(dadosTotais => {
        // Dados para o gráfico de pizza Premium e Standard
        const labelsPizzaPremiumStandard = ['Premium', 'Standard'];
        const dadosPizzaPremiumStandard = [dadosTotais.premium, dadosTotais.standard];

        // Dados para o gráfico de pizza CRMS
        const labelsPizzaCrms = Object.keys(dadosTotais.crms);
        const dadosPizzaCrms = Object.values(dadosTotais.crms);

        // Criando os gráficos de pizza
        const ctxPizzaPremiumStandard = document.getElementById('pizzaChartPremiumStandard')?.getContext('2d');
        if (ctxPizzaPremiumStandard) {
            criarGraficoPizza(ctxPizzaPremiumStandard, labelsPizzaPremiumStandard, dadosPizzaPremiumStandard, cores);
        }

        const ctxPizzaCrms = document.getElementById('pizzaChartCrms')?.getContext('2d');
        if (ctxPizzaCrms) {
            criarGraficoPizza(ctxPizzaCrms, labelsPizzaCrms, dadosPizzaCrms, cores);
        }
    })
    .catch(error => console.error('Erro ao carregar os dados para gráficos de pizza: ', error));





    // Função para criar o gráfico
function criarGrafico(ctx, labels, datasets, tipoGrafico = 'line') {

    const config = {
        type: tipoGrafico,
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Mês/Ano'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Total'
                    },
                    beginAtZero: true
                }
            }
        }
    };

    new Chart(ctx, config);
}

// Função para criar o gráfico de pizza
function criarGraficoPizza(ctx, labels, dados) {
    const total = dados.reduce((acc, val) => acc + val, 0);

    const config = {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: dados,
                backgroundColor: cores,
                borderColor: 'rgba(255, 255, 255, 0.5)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const value = tooltipItem.raw;
                            const percentage = ((value / total) * 100).toFixed(2);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    };

    if (ctx) { // Verifica se o contexto do canvas foi encontrado
        new Chart(ctx, config);
    } else {
        console.error('Contexto do canvas não encontrado.');
    }
}

// Função para criar o gráfico de barras horizontais
function criarGraficoBarrasHorizontais(ctx, labels, datasets) {
    const config = {
        type: 'bar',
        data: {
            labels: labels,
            datasets: datasets.map((dataset, index) => ({
                ...dataset,
                backgroundColor: cores[index % cores.length], // Aplicando a cor específica do array cores
                borderColor: cores[index % cores.length],
                borderWidth: 1
            }))
        },
        options: {
            indexAxis: 'y', // Isso torna o gráfico de barras horizontal
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Total'
                    },
                    beginAtZero: true
                },
                y: {
                    title: {
                        display: true,
                        text: 'Mês/Ano'
                    }
                }
            }
        }
    };

    new Chart(ctx, config);
}

