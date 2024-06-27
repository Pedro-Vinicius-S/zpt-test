document.addEventListener('DOMContentLoaded', function() {
    var ipAddressElement = document.getElementById('ip');
    //Resposta 08
    //Classe JavaScript para consultar o IP do usuário

    fetch('https://ipinfo.io/json')
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Não foi possível obter o IP.');
        })
        .then(function(data) {
            ipAddressElement.textContent = data.ip;
        })
        .catch(function(error) {
            console.error('Erro ao obter o IP:', error);
            ipAddressElement.textContent = 'Erro ao obter o IP.';
        });
});
