document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".caixinha").forEach(button => {
        button.addEventListener("click", function () {
            let usuario = document.getElementById("usuario").value.trim();
            let caixinha = this.getAttribute("data-numero");

            if (usuario === "") {
                alert("Digite seu nome antes de jogar!");
                return;
            }

            // Animação ao clicar
            this.classList.add("abrindo");
            setTimeout(() => this.classList.remove("abrindo"), 500);

            fetch("jogar_caixinha.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `usuario=${encodeURIComponent(usuario)}&caixinha=${encodeURIComponent(caixinha)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "error") {
                    alert(data.mensagem);
                } else {
                    // Atualiza o resultado
                    let resultadoDiv = document.getElementById("resultado");
                    resultadoDiv.innerHTML = `<strong>Você ganhou:</strong> ${data.premio} <br> <strong>Saldo:</strong> ${data.saldo}`;
                    
                    // Atualiza o saldo na interface
                    let saldoElement = document.getElementById("saldo");
                    if (saldoElement) saldoElement.innerText = `Saldo: ${data.saldo}`;

                    // Efeito visual ao exibir prêmio
                    resultadoDiv.style.opacity = 0;
                    setTimeout(() => resultadoDiv.style.opacity = 1, 300);
                }
            })
            .catch(error => console.error("Erro:", error));
        });
    });
});
