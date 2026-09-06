CREATE TABLE [dbo].[Building] (
    [BuildingID]   INT          NOT NULL,
    [BuildingName] CHAR(30) NOT NULL,
    [Type]         CHAR (10)    NOT NULL,
    [Area]         DECIMAL (18) NOT NULL,
    [FreeArena]    INT          NOT NULL,
    [SportPlayed]  CHAR(10) NOT NULL,
    [EquipmentLot] INT          NOT NULL,
    PRIMARY KEY CLUSTERED ([BuildingID] ASC), 
    CONSTRAINT [FK_Building_ToTable] FOREIGN KEY ([SportPlayed]) REFERENCES [Sports]([SportName]), 
    CONSTRAINT [FK_Building_ToTable_1] FOREIGN KEY ([EquipmentLot]) REFERENCES [Equipment]([LotNumber])
);

