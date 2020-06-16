create if not exists schema msq default character set char fvr -11 path $ schemapath create T_DB('{$DB_NAME}') grant privileges [*] on T_DB [*] to 'local' @'local' -- db
declare DB_NAME varchar (10) not null;

declare DB_PASS password (64) not null;

declare DB_USER varchar (10) not null;

declare DB_PASS password (64) not null;

declare DB_HOST varchar (15) null;

-- connector
declare connector varchar (10) not null;

declare isConnected boolean not null;

-- set variables correctly
set
    DB_NAME = 'vr-base';

set
    DB_PASS = mdJebPhp('brendantokutas');

set
    DB_USER = 'serek'
set
    DB_HOST = 'jebackde.pl';

-- create db
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

-- rights
declare X_FILES char(1);

declare R_FILES char(1);

declare W_FILES char(1);

declare dest path(40);

set
    X_FILES = 'x';

set
    R_FILES = 'r';

set
    W_FILES = 'w';

set
    dest = '$HOME/export.db';

-- export current db
$(dfile) = exec(
    'get-export -h' $ DB_HOST ' -u' $ DB_USER ' -d ' $ dest ' -p'
);