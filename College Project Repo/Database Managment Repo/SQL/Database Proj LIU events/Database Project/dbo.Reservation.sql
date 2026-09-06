CREATE TABLE [dbo].[Reservation] (
    [ReservationId] INT          NOT NULL,
    [Date]          DATE         NOT NULL,
    [StartHr]       REAL         NOT NULL,
    [EndHr]         REAL         NOT NULL,
	[Hotel_Start]          DATE         NOT NULL,
	[Hotel_End]          DATE         NOT NULL,
    [ChiefID]       INT          NOT NULL,
    [SportBld]      INT          NOT NULL,
    [Sport]         CHAR(10) NOT NULL,
    [Room_Res]      INT NOT NULL,
    PRIMARY KEY CLUSTERED ([ReservationId] ASC), 
    CONSTRAINT [FK_Reservation_ToTable] FOREIGN KEY ([ChiefID]) REFERENCES [DelegationChief]([ChiefID]), 
    CONSTRAINT [FK_Reservation_ToTable_1] FOREIGN KEY ([SportBld]) REFERENCES [Building]([BuildingID]), 
    CONSTRAINT [FK_Reservation_ToTable_2] FOREIGN KEY ([Sport]) REFERENCES [Sports]([SportName]), 
    CONSTRAINT [FK_Reservation_ToTable_3] FOREIGN KEY ([Room_res]) REFERENCES [HotelRoom]([RoomID]),
    
   
);

