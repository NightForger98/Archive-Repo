
Select * from HotelRoom where Price in(SELECT Max(Price)  FROM [LIU_SPORTS_RESERVATIONS].[dbo].[HotelRoom]);