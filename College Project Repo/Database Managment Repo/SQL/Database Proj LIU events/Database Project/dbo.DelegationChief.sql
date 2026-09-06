CREATE TABLE [dbo].[DelegationChief] (
    [ChiefID]       INT        NOT NULL,
    [PhoneNumber]   INT NOT NULL,
    [FirstName]     CHAR(10) NOT NULL,
    [LastName]      CHAR(10) NOT NULL,
    [ReservationID] INT        NOT NULL,
    PRIMARY KEY CLUSTERED ([ChiefID] ASC), 
    CONSTRAINT [FK_DelegationChief_ToTable] FOREIGN KEY ([ReservationID]) REFERENCES [Reservation]([ReservationID]),
    
);

