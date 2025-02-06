document.querySelectorAll(".caixinha").forEach(button => {
    button.addEventListener("click", function () {
        let usuario = document.getElementById("usuario").value;
        let caixinha = this.getAttribute("data-numero");

        if (usuario.trim() === "") {
            alert("Digite seu nome antes de jogar!");
            return;
        }

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
                document.getElementById("resultado").innerText = `Você ganhou: ${data.premio} | Saldo: ${data.saldo}`;
            }
        })
        .catch(error => console.error("Erro:", error));
    });
});
