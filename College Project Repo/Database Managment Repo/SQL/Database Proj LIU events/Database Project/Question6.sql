Select * from HotelRoom where Price in(SELECT Min(Price)  FROM [LIU_SPORTS_RESERVATIONS].[dbo].[HotelRoom]);
