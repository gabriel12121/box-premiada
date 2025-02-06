CREATE TABLE resultados_caixinha (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL,
    caixinha_escolhida INT NOT NULL,
    premio_ganho VARCHAR(255),
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
