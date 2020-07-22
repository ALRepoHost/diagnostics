use CDBASE_INAPI_SEL;

-- Check if db is empty and create content if yes
create if not exists schema bmt_schemas.aqp [authorization '{Proccess.GetCurrentUser.ToString()}'];

create if not exists table bmt_schemas.aqp.tables.authUsers (
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