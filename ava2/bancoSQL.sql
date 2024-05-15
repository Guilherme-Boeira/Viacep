create database viacep;
use viacep;

create table endereco(
	id int not null auto_increment primary key,
    cep int not null,
	rua varchar(120) not null,
    cidade varchar(80)not null,
    estado varchar(2) not null,
    bairro varchar(60) not null
    );    
    
select * from endereco order by bairro asc;
delete  from endereco;