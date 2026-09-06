CREATE TABLE [dbo].[HotelRoom] (
    [RoomID] INT          NOT NULL,
    [HotelName]  CHAR(30) NOT NULL,
    [Address]    CHAR(30) NOT NULL,
    [RoomNumber] INT          NOT NULL,
    [Type]       CHAR (10)    NOT NULL,
    [Price]      DECIMAL (18) NOT NULL, 
    [Available] BIT NOT NULL, 
    CONSTRAINT [PK_HotelRoom] PRIMARY KEY ([RoomID])
);

