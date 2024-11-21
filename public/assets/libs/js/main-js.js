 
// Função para carregar os dados do JSON
async function loadSparklineData(sparkline,url, tipo) {
    try {
        // Carregar o arquivo JSON
        const response = await fetch(url); // Substitua pelo caminho correto do seu arquivo JSON
        const data = await response.json();

        // Extrair os valores dinamicamente com base no parâmetro 'tipo'
        const dados = Object.values(data).map(mes => mes[tipo]);
        // Criar o gráfico sparkline com os dados extraídos
        $(`#${sparkline}`).sparkline(dados, {
            type: 'line',
            width: '100%', // Ajusta para ocupar 100% da largura do contêiner
            height: '150', // Ajusta a altura para melhorar a visibilidade
            lineColor: '#5969ff', // Cor da linha principal
            fillColor: 'rgba(89, 105, 255, 0.2)', // Cor de preenchimento suave (transparente para contraste)
            lineWidth: 2,
            spotColor: undefined,
            minSpotColor: undefined,
            maxSpotColor: undefined,
            highlightSpotColor: undefined,
            highlightLineColor: undefined,
            resize: true
        });
        

    } catch (error) {
        console.error('Erro ao carregar os dados JSON:', error);
    }
}

    // loadSparklineData('sparkline-revenue','/data-management/data/dados_mes.json','clientes');
    // loadSparklineData('sparkline-revenue2','/data-management/data/dados_mes.json','premium');
    // loadSparklineData('sparkline-revenue3','/data-management/data/dados_mes.json','standard');
