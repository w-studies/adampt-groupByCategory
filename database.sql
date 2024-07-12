drop schema if exists pap;
create schema pap;
use pap;
create table tbl_cateventos(
  idcatevento int(9) auto_increment primary key,
  descatevento varchar(198)
) Engine = InnoDB;
insert into tbl_cateventos(descatevento)
values ('Carnes'),
  ('Entradas'),
  ('Entradas 2'),
  ('Peixes, Mariscos e Crustáceos');
create table tbl_menueventos(
  idmenueventos int(9) auto_increment primary key,
  categoria int(9),
  descritivo text,
  unidade varchar(198),
  pessoa varchar(198),
  kg decimal(14, 5),
  tab4 decimal(14, 5),
  tab6 decimal(14, 5),
  tab10 decimal(14, 5),
  tab15 decimal(14, 5),
  minimo int(3),
  constraint foreign key(categoria) references tbl_cateventos(idcatevento)
) Engine = InnoDB;
insert into tbl_menueventos(
    descritivo,
    categoria,
    pessoa,
    kg,
    tab4,
    tab6,
    tab10,
    tab15,
    minimo
  )
VALUES ('Carnes', 1,.5, 30, 6, 8, 14, 20, 2),
  ('Entradas 2', 2,.5, 25, 4, 6, 12, 18, 1),
  (
    'Entradas',
    2,
    null,
    null,
    null,
    null,
    null,
    null,
    1
  );