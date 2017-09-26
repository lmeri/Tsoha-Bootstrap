-- Lisää INSERT INTO lauseet tähän tiedostoon


-- Käyttäjä
INSERT INTO Kayttaja(tunnus, salasana, adminko) VALUES ('testi', 'testi123', false);
INSERT INTO Kayttaja(tunnus, salasana, adminko) VALUES ('admin', 'admin123', true);

-- Kirja 
INSERT INTO Kirja(isbn, nimi, kirjailija, vuosi, kuvaus) VALUES ('9780747532699', 'Harry Potter and the Philosophers Stone', 'J.K. Rowling', 1997, '1st Harry Potter book');
INSERT INTO Kirja(isbn, nimi, kirjailija, vuosi, kuvaus) VALUES ('9780439064873', 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 2000, '2nd Harry Potter book');
INSERT INTO Kirja(isbn, nimi, kirjailija, vuosi, kuvaus) VALUES ('9780374533557', 'Thinking, Fast and Slow', 'Daniel Kahneman', 2011, 'In the highly anticipated Thinking, Fast and Slow, Kahneman takes us on a groundbreaking tour of the mind and explains the two systems that drive the way we think.');

-- Kategoria
INSERT INTO Kategoria(nimi) VALUES ('Seikkailu');
INSERT INTO Kategoria(nimi) VALUES ('Kauhu');
INSERT INTO Kategoria(nimi) VALUES ('Fantasia');
INSERT INTO Kategoria(nimi) VALUES ('Historia');

-- KirjaKategoria
INSERT INTO KirjaKategoria(kategoria_id, kirja_id) VALUES (3, 1);
INSERT INTO KirjaKategoria(kategoria_id, kirja_id) VALUES (1, 2);
INSERT INTO KirjaKategoria(kategoria_id, kirja_id) VALUES (3, 2);


-- Arvostelu
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (1, 1, 4);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (1, 2, 5);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (1, 3, 5);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (2, 1, 5);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (2, 2, 3);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (2, 3, 3);