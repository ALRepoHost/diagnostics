-- Check if db is empty and create content if yes
-- Schema
create if not exists schema bmt_schemas.aqp [authorization '{Proccess.GetCurrentUser.ToString()}'];

-- Database
create if not exists database bmt_schemas.aqp.db;

-- Tables
create if not exists table bmt_schemas.aqp.db.tables.authUsers (
    rid int auto increment primary key,
    userName varchar(20),
    userRole text(10),
    userNotes varchar(120),
    adminNotesRegardingUser varchar(120),
    authDirsToAccess blob(40),
    authExpireDate date,
    authRequestCreationDate date,
    authRequestGrantDate date
);