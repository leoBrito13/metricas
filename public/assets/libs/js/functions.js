function carregarDados(url) {
    // Enviar requisição AJAX usando $.ajax
    $.ajax({
        url: url, // URL para onde a requisição será enviada
        method: 'GET', // Método da requisição (GET no seu caso)
        success: function(data) {
            // Verificar se os dados foram retornados corretamente
            if (data.result) {
                // Limpar os dados atuais da tabela
                let tbody = $('#example tbody');
                tbody.empty();

                // Iterar sobre os dados retornados e atualizar as linhas da tabela
                data.result.forEach(function(item) {
                    // Criar a linha (tr)
                    let tr = $('<tr></tr>');

                    // Criar e adicionar as células (td)
                    tr.append('<td>' + item['Nome'] + '</td>');
                    tr.append('<td>' + item['Acessos totais'] + '</td>');
                    tr.append('<td>' + item['Acessos orgânicos Google'] + '</td>');
                    tr.append('<td>' + item['Acessos pagos Google'] + '</td>');
                    tr.append('<td>' + item['Acessos pagos Facebook'] + '</td>');
                    tr.append('<td>' + item['Acessos pagos Criteo'] + '</td>');

                    // Adicionar a linha (tr) à tabela
                    tbody.append(tr);
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Erro ao buscar dados:', error);
        }
    });
}