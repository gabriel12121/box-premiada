setInterval(() => {
    fetch("obter_notificacoes.php")
        .then(response => response.json())
        .then(data => {
            let notificacoesDiv = document.getElementById("notificacoes");
            notificacoesDiv.innerHTML = "";
            data.forEach(notificacao => {
                let p = document.createElement("p");
                p.innerText = notificacao.mensagem;
                notificacoesDiv.appendChild(p);
            });
        });
}, 5000);
