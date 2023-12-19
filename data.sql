CREATE TABLE membre (
    id_membre INT NOT NULL AUTO_INCREMENT,
    civilite ENUM('f' ,'m', 'a') NOT NULL,
    pseudo VARCHAR (50) UNIQUE NOT NULL,
    mdp VARCHAR(100) NOT NULL, 
    nom VARCHAR(100) NOT NULL, 
    prenom VARCHAR(100) NOT NULL, 
    email VARCHAR(100) UNIQUE NOT NULL,
    adresse VARCHAR (255), 
    code_postal INT NOT NULL, 
    ville VARCHAR(100) NOT NULL, 
    pays VARCHAR(100) NOT NULL, 
    statut INT NOT NULL, 
    picture VARCHAR(255) NOT NULL,  
    created_at  DATETIME NOT NULL, 
    PRIMARY KEY(id_membre)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE produit (
    id_produit INT NOT NULL AUTO_INCREMENT,
    reference VARCHAR(100) UNIQUE NOT NULL,
    category VARCHAR (100)  NOT NULL,
    title VARCHAR(100) NOT NULL, 
    description TEXT NOT NULL, 
    color VARCHAR(20) NOT NULL, 
    size VARCHAR(10)  NOT NULL,
    public ENUM ('m', 'f', 'unisexe', 'enfant') (255), 
    photo VARCHAR(255) NOT NULL, 
    prix INT NOT NULL, 
    stock INT NOT NULL,  
    PRIMARY KEY(id_produit)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;