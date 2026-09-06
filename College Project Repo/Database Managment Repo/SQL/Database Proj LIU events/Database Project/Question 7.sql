Select * from HotelRoom where RoomID in(SELECT Room_Res  FROM [LIU_SPORTS_RESERVATIONS].[dbo].[Reservation]
where date = Convert(datetime, '2022-12-31 00:00:00'));