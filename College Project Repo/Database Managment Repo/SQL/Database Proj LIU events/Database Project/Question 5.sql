select * from Reservation
where ChiefID in(SELECT 
 [ChiefID]
 FROM [LIU_SPORTS_RESERVATIONS].[dbo].[DelegationChief]
 Where FirstName = 'Rami' and LastName = 'Abbas')
 