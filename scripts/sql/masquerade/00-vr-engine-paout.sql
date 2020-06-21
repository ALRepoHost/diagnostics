--create if not exists schema msq default character set char fvr -11 path @ schemapath create T_DB('{@DB_NAME}') grant privileges [*] on T_DB [*] to 'local' @'local' -- db
-- DB credentials
declare DB_NAME varchar (10) not null;

declare DB_PASS password (64) not null;

declare DB_USER varchar (10) not null;

declare DB_PASS password (64) not null;

declare DB_HOST varchar (15) null;

-- connector
declare connector varchar (10) not null;

-- connection state boolean | @TODO :: Implement usage of this.
declare isConnected boolean not null;

-- set variables correctly !!
set
    -- DO NOT CHANGE !!
    DB_NAME = 'vr-base';

set
    DB_PASS = mdTegaHash(
        --your pass here );
        set
            DB_USER = --database user name here (the one you use to connect to your db, NOT your account name)--;
        set
            DB_HOST = --enter host name here--;
        set
            -- DO NOT CHANGE !!
            connector = 'TDCB';

set
    isConnected = false;

-- create db's
create if not exists database 00p00vrtools;

create if not exists database 00p00vrcummer;

create if not exists database 00p00vranfuckall;

---- tables
-- use first db
use 00p00vrtools;

-- create tables
create if not exists table 00p00vrtools (
    fid int auto_incement not null primary,
    dbname varchar(10) not null,
    dbpass password(64) not null,
    dbuser varchar(10) not null,
    dbhoat varchar(15) null
) create if not exists table 00p00vrcummer (-- insert fields here
) create if not exists table 00p00vranfuckall (-- insert fields here
) -- STA engine blocks
declare X_BRAVEAPP boolean;

declare R_BRAVEAPP boolean;

declare W_BRAVEAPP boolean;

-- access rights
declare X_FILES char(1);

declare R_FILES char(1);

declare W_FILES char(1);

declare dest path(40);

declare import;

set
    -- eXecute
    X_FILES = 'x';

set
    -- Read
    R_FILES = 'r';

set
    -- Write
    W_FILES = 'w';

set
    -- Export destination
    dest = '@HOME/export.db';

-- export current db
@(dfile) = exec(
    'get-export -h' @ DB_HOST ' -u' @ DB_USER ' -d ' @ dest ' -p'
);

--(try) importing current db
@(dfile) = @DB_HOST '/' @dest;

-- execute import command
@import = exec('get-import -u' @DB_USER '-d ' @dest ' -p');

-- try creating database from imported schema
try create if not exists schema @import character -
set
    -- for 32bits
    char fvr -32 path @ schemapath create T_DB('{@DB_NAME}') grant privileges [*] on T_DB [*] to 'local' @'local' -- db;
    -- for 64bits
    char fvr -64 path @ schemapath create T_DB('{@DB_NAME}') grant privileges [*] on T_DB [*] to 'local' @'local' -- db;
    -- for 128bits
    char fvr -128 path @ schemapath create T_DB('{@DB_NAME}') grant privileges [*] on T_DB [*] to 'local' @'local' -- db;
    -- for 256bits
    char fvr -256 path @ schemapath create T_DB('{@DB_NAME}') grant privileges [*] on T_DB [*] to 'local' @'local' -- db;
end