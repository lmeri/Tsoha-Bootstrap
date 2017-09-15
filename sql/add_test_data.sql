-- Lisää INSERT INTO lauseet tähän tiedostoon


-- Käyttäjä
INSERT INTO Kayttaja(tunnus, salasana, adminko) VALUES ('testi', 'testi123', false);

-- Kirja 
INSERT INTO Kirja(isbn, nimi, kirjailija, vuosi, kuvaus) VALUES ('1234567845324', 'Potter 1', 'J.K. Rowling', 1998, 'Jee jee');
INSERT INTO Kirja(isbn, nimi, kirjailija, vuosi, kuvaus) VALUES ('1234567845324', 'Potter 2', 'J.K. Rowling', 2000, 'Woot Woot');

-- Kategoria
INSERT INTO Kategoria(nimi) VALUES ('Seikkailu');
INSERT INTO Kategoria(nimi) VALUES ('Kauhu');

-- KirjaKategoria
INSERT INTO KirjaKategoria(kategoria_id, kirja_id) VALUES (1, 1);
INSERT INTO KirjaKategoria(kategoria_id, kirja_id) VALUES (1, 2);


-- Arvostelu
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (1, 1, 4);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (1, 2, 5);