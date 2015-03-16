INSERT INTO `tb_usuario` 
VALUES (1,'Mario Leite','7c4a8d09ca3762af61e59520943dc26494f8941b','marioleite',NULL),
       (2,'Márcio Ramos','7c4a8d09ca3762af61e59520943dc26494f8941b','marcio.santos',NULL);

INSERT INTO `tb_unidade_venda` 
    VALUES (1,'Abbatepietro','Rua Carlos Weber'),
           (2,'Dudalina','Moema'),(3,'Armazem','Itaim Bibi'),
           (4,'Shopping D Pedro','Campinas'),
           (5,'Lets Beer','Vila Mariana'),
           (6,'Capitao Barley','Pompeia'),
           (7,'Adega Pelotas','Vila Mariana');

INSERT INTO `tb_tipo_produto` 
    VALUES (1,'Escondidinhos'),
           (2,'Refrigerantes'),
           (3,'Aguas'),
           (4,'Cervejas'),
           (5,'Doces'),
           (6,'Sucos');

INSERT INTO `tb_produto` 
    VALUES (16,'Carne Moída',20.50,'produto',1),
           (17,'Frango',20.00,NULL,1),
           (18,'Carne Seca',20.00,NULL,1),
           (19,'Camarão',20.00,NULL,1),
           (20,'Calabreza',20.00,NULL,1),
           (21,'Banana',7.00,NULL,5),
           (22,'Coca Cola',5.00,NULL,2),
           (23,'Guarana',5.00,NULL,2),
           (24,'Coca Zero',5.00,NULL,2),
           (25,'Agua',3.00,NULL,3);

INSERT INTO `tb_tipo_pagamento` 
    VALUES (1,'Dinheiro'),
           (2,'Cartao Debito'),
           (3,'Cartao Credito');
