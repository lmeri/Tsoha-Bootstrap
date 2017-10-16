-- Lisää INSERT INTO lauseet tähän tiedostoon


-- Käyttäjä
INSERT INTO Kayttaja(tunnus, salasana, adminko) VALUES ('testi', 'testi123', false);
INSERT INTO Kayttaja(tunnus, salasana, adminko) VALUES ('admin', 'admin123', true);

-- Kirja 
INSERT INTO Kirja(isbn, nimi, kirjailija, vuosi, kuvaus) VALUES ('9780747532699', 'Harry Potter and the Philosophers Stone', 'J.K. Rowling', 1997, '1st Harry Potter book');
INSERT INTO Kirja(isbn, nimi, kirjailija, vuosi, kuvaus) VALUES ('9780439064873', 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 2000, '2nd Harry Potter book');
INSERT INTO Kirja(isbn, nimi, kirjailija, vuosi, kuvaus) VALUES ('9780374533557', 'Thinking, Fast and Slow', 'Daniel Kahneman', 2011, 'In the highly anticipated Thinking, Fast and Slow, Kahneman takes us on a groundbreaking tour of the mind and explains the two systems that drive the way we think.');
INSERT INTO Kirja(isbn, nimi, kirjailija, vuosi, kuvaus) VALUES ('9780007136834', 'And Then There Were None', 'Agatha Christie', 1939, 'Ten strangers, apparently with little in common, are lured to an island mansion off the coast of Devon. One of the party is found murdered, and tension mounts as the survivors realize that the killer is not only among them, but is willing to strike again... and again.');
INSERT INTO Kirja(isbn, nimi, kirjailija, vuosi, kuvaus) VALUES ('9780307454546', 'The Girl with the Dragon Tattoo', 'Stieg Larsson', 2005, 'Murder mystery, family saga, love story, and financial intrigue combine into one satisfyingly complex and entertainingly atmospheric novel, the first in Stieg Larssons thrilling Millenium series featuring Lisbeth Salander.');


-- Kategoria
INSERT INTO Kategoria(nimi) VALUES ('Seikkailu');
INSERT INTO Kategoria(nimi) VALUES ('Kauhu');
INSERT INTO Kategoria(nimi) VALUES ('Fantasia');
INSERT INTO Kategoria(nimi) VALUES ('Mysteeri');

-- KirjaKategoria
INSERT INTO KirjaKategoria(kategoria_id, kirja_id) VALUES (3, 1);
INSERT INTO KirjaKategoria(kategoria_id, kirja_id) VALUES (3, 2);
INSERT INTO KirjaKategoria(kategoria_id, kirja_id) VALUES (1, 1);
INSERT INTO KirjaKategoria(kategoria_id, kirja_id) VALUES (1, 2);
INSERT INTO KirjaKategoria(kategoria_id, kirja_id) VALUES (4, 4);
INSERT INTO KirjaKategoria(kategoria_id, kirja_id) VALUES (4, 5);


-- Arvostelu
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (1, 1, 4);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (1, 2, 3);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (1, 3, 2);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (2, 1, 5);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (2, 2, 4);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (2, 3, 5);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (2, 4, 2);
INSERT INTO Arvostelu(kayttaja_id, kirja_id, arvostelu) VALUES (2, 5, 3);