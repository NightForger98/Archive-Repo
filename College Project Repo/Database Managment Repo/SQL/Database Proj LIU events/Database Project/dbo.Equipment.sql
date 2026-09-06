CREATE TABLE [dbo].[Equipment] (
    [LotNumber] INT          NOT NULL,
    [Type]      CHAR(10) NOT NULL,
    [Units]     INT          NOT NULL,
    PRIMARY KEY CLUSTERED ([LotNumber] ASC)
);

