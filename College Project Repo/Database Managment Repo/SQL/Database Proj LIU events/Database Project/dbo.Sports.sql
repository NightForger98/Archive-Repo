CREATE TABLE [dbo].[Sports] (
    [SportName]    CHAR(10) NOT NULL,
    [EquipmentUsed] INT          NOT NULL,
    PRIMARY KEY CLUSTERED ([SportName] ASC), 
    CONSTRAINT [FK_Sports_ToTable] FOREIGN KEY ([EquipmentUsed]) REFERENCES [Equipment]([LotNumber]),
    
);

