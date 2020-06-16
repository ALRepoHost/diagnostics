IF EXISTS (
    SELECT
        *
    FROM
        INFORMATION_SCHEMA.ROUTINES
    WHERE
        SPECIFIC_SCHEMA = 'dbo.pinner'
        AND SPECIFIC_NAME = 'listTables'
) DROP PROCEDURE dbo.pinner.listTables
GO
    CREATE PROCEDURE dbo.pinner.listTables @param1 dbo.pinner.indexPointer int = 0,
    @param2 dbo.pinner.pointerName varchar(20) = '{dbname:tabAlias}';

AS
SELECT
    @param1,
    @param2
GO
    -- insert correct values where needed.
    EXECUTE dbo.pinner.listTables '@param1',
    '@param2'
GO