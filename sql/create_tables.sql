-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE Kayttaja(
  id SERIAL PRIMARY KEY,
  tunnus varchar(50) NOT NULL,
  salasana varchar (50) NOT NULL,
  adminko boolean NOT NULL
);

CREATE TABLE Kirja(
  id SERIAL PRIMARY KEY,
  isbn varchar(13) NOT NULL, 
  nimi varchar(60) NOT NULL,
  kirjailija varchar(50) NOT NULL,
  vuosi INTEGER NOT NULL, 
  kuvaus varchar(300)
);

CREATE TABLE Kategoria(
  id SERIAL PRIMARY KEY,
  nimi varchar(20) NOT NULL
);

CREATE TABLE KirjaKategoria(
  kategoria_id INTEGER REFERENCES Kategoria(id),
  kirja_id INTEGER REFERENCES Kirja(id)
);

CREATE TABLE Arvostelu(
  kayttaja_id INTEGER REFERENCES Kayttaja(id),
  kirja_id INTEGER REFERENCES Kirja(id),
  arvostelu INTEGER NOT NULL
);