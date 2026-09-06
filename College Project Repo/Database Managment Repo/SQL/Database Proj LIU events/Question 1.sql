SELECT 
      [FirstName],
      [LastName]
      
  FROM [LIU_SPORTS_RESERVATIONS].[dbo].[DelegationChief]
  Where [ChiefID] in(
  SELECT 
 [ChiefID]
 FROM [LIU_SPORTS_RESERVATIONS].[dbo].[Reservation]
 Where date >= Convert(datetime, '2022-12-30 00:00:00')
 AND date <= Convert(datetime, '2023-1-1 00:00:00'))