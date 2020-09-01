CREATE TABLE noticias (
    id INT NOT NULL AUTO_INCREMENT ,
    titulo VARCHAR(25) NOT NULL ,
    detalle TEXT NOT NULL ,
    autor VARCHAR(50) NOT NULL ,
    fecha DATE NOT NULL ,
    hora TIME NOT NULL , 
    descripcion TEXT NOT NULL ,
    foto TEXT NOT NULL ,
    PRIMARY KEY (id));