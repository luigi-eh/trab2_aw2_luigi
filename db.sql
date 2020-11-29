CREATE TABLE IF NOT EXISTS produtos (
  id int NOT NULL AUTO_INCREMENT,
  descricao varchar(100) NOT NULL,
  unidade char(50) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO produtos (id, descricao, unidade) VALUES
(1, 'Arroz,', 'Kg'),
(2, 'Feijao', 'Kg'),
(3, 'Macarrao', 'g'),
(4, 'Coca', 'L'),
(5, 'Carne', 'Kg');