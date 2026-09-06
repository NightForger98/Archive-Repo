SELECT 
      [FirstName],
      [LastName]
      
  FROM [LIU_SPORTS_RESERVATIONS].[dbo].[DelegationChief]
  Where [ChiefID] in(
  SELECT 
 [ChiefID]
 FROM [LIU_SPORTS_RESERVATIONS].[dbo].[Reservation]
 Where (SportBld = 1 and Sport = ('Tennis' ))
 OR  (SportBld = 2 and Sport = ('Football' )));
