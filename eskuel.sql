/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     22.06.2021 10:51:47                          */
/*==============================================================*/


drop table if exists Autor;

drop table if exists Konto;

drop table if exists Kurs;

drop table if exists Literatura;

drop table if exists Nauczyciel;

drop table if exists Termin;

drop table if exists Tryb;

drop table if exists Wyksztalcenie;

drop table if exists Zapisy;

/*==============================================================*/
/* Table: Autor                                                 */
/*==============================================================*/
create table Autor
(
   id_autor             int not null AUTO_INCREMENT,
   imie_autora          varchar(32) not null,
   nazwisko_autora      varchar(32) not null,
   primary key (id_autor)
);

/*==============================================================*/
/* Table: Konto                                                 */
/*==============================================================*/
create table Konto
(
   id_konto             int not null AUTO_INCREMENT,
   nazwa_konta          varchar(32) not null,
   haslo_konta          varchar(32) not null,
   email_konta          varchar(32) not null,
   primary key (id_konto)
);

/*==============================================================*/
/* Table: Kurs                                                  */
/*==============================================================*/
create table Kurs
(
   id_kurs              int not null AUTO_INCREMENT,
   id_nauczyciel        int not null,
   id_termin            int not null,
   id_tryb              int not null,
   nazwa_kursu          varchar(64) not null,
   godziny_kursu        int not null,
   opis_kursu           varchar(1024) not null,
   cena_kursu           int not null,
   primary key (id_kurs)
);

/*==============================================================*/
/* Table: Literatura                                            */
/*==============================================================*/
create table Literatura
(
   id_literatura        int not null AUTO_INCREMENT,
   id_autor             int not null,
   id_kurs              int,
   nazwa_literatury     varchar(64) not null,
   primary key (id_literatura)
);

/*==============================================================*/
/* Table: Nauczyciel                                            */
/*==============================================================*/
create table Nauczyciel
(
   id_nauczyciel        int not null AUTO_INCREMENT,
   id_wyksztalcenie     int not null,
   imie_nauczyciela     varchar(32) not null,
   nazwisko_nauczyciela varchar(32) not null,
   opis_nauczyciela     varchar(512) not null,
   primary key (id_nauczyciel)
);

/*==============================================================*/
/* Table: Termin                                                */
/*==============================================================*/
create table Termin
(
   id_termin            int not null AUTO_INCREMENT,
   data_terminu         datetime not null,
   primary key (id_termin)
);

/*==============================================================*/
/* Table: Tryb                                                  */
/*==============================================================*/
create table Tryb
(
   id_tryb              int not null AUTO_INCREMENT,
   nazwa_trybu          varchar(32) not null,
   primary key (id_tryb)
);

/*==============================================================*/
/* Table: Wyksztalcenie                                         */
/*==============================================================*/
create table Wyksztalcenie
(
   id_wyksztalcenie     int not null AUTO_INCREMENT,
   nazwa_wyksztalcenia  varchar(32) not null,
   primary key (id_wyksztalcenie)
);

/*==============================================================*/
/* Table: Zapisy                                                */
/*==============================================================*/
create table Zapisy
(
   id_konto             int not null,
   id_kurs              int not null,
   potwierdzenie        varchar(16) not null,
   primary key (id_konto, id_kurs)
);

alter table Kurs add constraint FK_Kurs_ma_termin foreign key (id_termin)
      references Termin (id_termin);

alter table Kurs add constraint FK_Kurs_posiada_tryb foreign key (id_tryb)
      references Tryb (id_tryb);

alter table Kurs add constraint FK_Nauczyciel_ma_kursy foreign key (id_nauczyciel)
      references Nauczyciel (id_nauczyciel);

alter table Literatura add constraint FK_Autor_ma_literature foreign key (id_autor)
      references Autor (id_autor);

alter table Literatura add constraint FK_Kurs_ma_literature foreign key (id_kurs)
      references Kurs (id_kurs);

alter table Nauczyciel add constraint FK_nauczyciel_ma_wyksztalcenie foreign key (id_wyksztalcenie)
      references Wyksztalcenie (id_wyksztalcenie);

alter table Zapisy add constraint FK_Zapisy foreign key (id_konto)
      references Konto (id_konto);

alter table Zapisy add constraint FK_Zapisy2 foreign key (id_kurs)
      references Kurs (id_kurs);

      /*==============================================================*/
      /* INSERTY                                       */
      /*==============================================================*/


INSERT INTO wyksztalcenie (nazwa_wyksztalcenia) VALUES
('Profesor'), ('Doktor'), ('Magister'), ('Inżynier'), ('Magister inżynier'), ('Licencjat');

INSERT INTO tryb (nazwa_trybu) VALUES
('Indywidualny'), ('Grupowy');

CREATE VIEW kursy AS
SELECT Kurs.id_kurs, Kurs.nazwa_kursu, Kurs.godziny_kursu, Kurs.opis_kursu, Kurs.cena_kursu, Nauczyciel.imie_nauczyciela, Nauczyciel.nazwisko_nauczyciela, Nauczyciel.opis_nauczyciela, Wyksztalcenie.nazwa_wyksztalcenia, Termin.data_terminu, Tryb.nazwa_trybu
FROM Kurs, Tryb, Nauczyciel, Wyksztalcenie, Termin
WHERE Kurs.id_nauczyciel = Nauczyciel.id_nauczyciel AND Kurs.id_termin = Termin.id_termin AND Kurs.id_tryb = Tryb.id_tryb AND Nauczyciel.id_wyksztalcenie = Wyksztalcenie.id_wyksztalcenie;


CREATE VIEW zapisnauczyciel AS
SELECT Kurs.id_kurs, Kurs.nazwa_kursu, Kurs.godziny_kursu, Termin.data_terminu, Tryb.nazwa_trybu, Konto.nazwa_konta, Konto.email_konta, Zapisy.potwierdzenie
FROM Kurs, Termin, Tryb, Konto, Zapisy
WHERE Kurs.id_nauczyciel = Nauczyciel.id_nauczyciel AND Kurs.id_termin = Termin.id_termin AND Kurs.id_tryb = Tryb.id_tryb AND Kurs.id_kurs = Zapisy.id_kurs AND Zapisy.id_konto = Konto.id_konto


CREATE VIEW materialy AS
SELECT Kurs.nazwa_kursu, Literatura.nazwa_literatury, Autor.imie_autora, Autor.nazwisko_autora
FROM Kurs, Literatura, Autor
WHERE Kurs.id_kurs = Literatura.id_kurs AND Autor.id_autor = Literatura.id_autor

CREATE VIEW zapisucznia AS
SELECT Kurs.id_kurs, Kurs.nazwa_kursu, Kurs.godziny_kursu, Kurs.opis_kursu, Kurs.cena_kursu, Nauczyciel.imie_nauczyciela, Nauczyciel.nazwisko_nauczyciela, Nauczyciel.opis_nauczyciela, Wyksztalcenie.nazwa_wyksztalcenia, Termin.data_terminu, Tryb.nazwa_trybu, Zapisy.potwierdzenie
FROM Kurs, Tryb, Nauczyciel, Wyksztalcenie, Termin, Zapisy, Konto
WHERE Kurs.id_nauczyciel = Nauczyciel.id_nauczyciel AND Kurs.id_termin = Termin.id_termin AND Kurs.id_tryb = Tryb.id_tryb AND Nauczyciel.id_wyksztalcenie = Wyksztalcenie.id_wyksztalcenie, Konto.id_konto = Zapisy.id_konto, Kurs.id_kurs = Zapisy.id_kurs;

CREATE VIEW mojekursy AS
SELECT Konto.nazwa_konta, Kurs.nazwa_kursu, Kurs.godziny_kursu, Kurs.opis_kursu, Kurs.cena_kursu, Nauczyciel.imie_nauczyciela, Nauczyciel.nazwisko_nauczyciela, Nauczyciel.opis_nauczyciela, Wyksztalcenie.nazwa_wyksztalcenia, Termin.data_terminu, Tryb.nazwa_trybu, Zapisy.potwierdzenie
FROM Kurs, Tryb, Nauczyciel, Wyksztalcenie, Termin, Zapisy, Konto
WHERE Kurs.id_nauczyciel = Nauczyciel.id_nauczyciel AND Kurs.id_termin = Termin.id_termin AND Kurs.id_tryb = Tryb.id_tryb AND Nauczyciel.id_wyksztalcenie = Wyksztalcenie.id_wyksztalcenie, Konto.id_konto = Zapisy.id_konto, Kurs.id_kurs = Zapisy.id_kurs;
