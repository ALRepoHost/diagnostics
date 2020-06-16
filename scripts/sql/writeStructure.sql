create procedure dbo.diagnostics.writeCoreInfo @param1 coreId = int,
@param2 coreSysId int,
@param3 coreInterval int,
@param4 coreFreq int,
@param5 realCore boolean AS
select
    @param1,
    @param2,
    @param3,
    @param4,
    @param5
GO
--    execute instructCore @param1 @param2 @param3 @param4 @param5
execute create if not exists table coreInfo (
    id int not null auto_increment,
    cId int not null coreId,
    systemId int not null coreSysId,
    interval int not null coreInterval,
    freq int not null coreFreq,
    rCore int not null realCore
)
GO