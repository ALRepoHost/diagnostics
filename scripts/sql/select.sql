-- Select db
create procedure dbo.diagnostics.selectdb @param1 dbo.diagnostics.selectdb dbname = varchar(15) '{db:Name}' AS
select
    @param1
GO
    execute dbo.diagnostics.selectdb @param1
GO

-- Select Table
create procedure dbo.diagnostics.selectTable @param1 dbo.diagnostics.selectTable tabId = int,
@param2 dbo.diagnostics.selectTable tabName = varchar(15) '{table:Name}' AS
select
    @param1,
    @param2
GO
    Execute dbo.diagnostics.selectTable @param1 @param2
GO

-- Select data
