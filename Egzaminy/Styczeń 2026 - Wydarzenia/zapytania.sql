1.
SELECT id, imie, nazwisko FROM personel WHERE status="policjant"

2. 
SELECT typ, Count(*) FROM pojazdy GROUP BY typ

3. 
SELECT personel.id, nazwisko FROM personel WHERE personel.id NOT IN (SELECT id_personel FROM rejestr)

4.
INSERT INTO rejestr (id_personel, id_pojazd, data) VALUES (1, 14, CURRENT_DATE())