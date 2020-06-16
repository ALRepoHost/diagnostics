IF EXISTS (
    SELECT
        *
    FROM
        INFORMATION_SCHEMA.ROUTINES
    WHERE
        SPECIFIC_SCHEMA = 'dbo.diagnostics'
        AND SPECIFIC_NAME = 'dbops'
) DROP PROCEDURE dbo.diagnostics.dbops
GO
    CREATE PROCEDURE dbo.diagnostics.dbops @param1 dbo.diagnostics.indexPointer int = 0,
    @param2 dbo.diagnostics.pointerName varchar(20) = '{dbname:tabAlias}';

AS
SELECT
    @param1,
    @param2
GO
    -- insert correct values where needed.
    EXECUTE dbo.diagnostics.dbops '@param1',
    '@param2'
GO