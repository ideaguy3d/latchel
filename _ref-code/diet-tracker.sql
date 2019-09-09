USE DietTracker
GO

-- diet entry:
--EXECUTE spDietEntry 1150, 170, 'salmon, shrimp, salad dressing'
--EXECUTE spDietEntry 250, 0, 'salad dressing'


PRINT ('Todays totals:')
GO
-- GROUP BY: total cals, protein and meals; just get current day
SELECT TOP(1) SUM([cals]) AS [total_cals_today], SUM([protein]) AS [total_protein_today],
    COUNT(*) AS [total_meals], LEFT(date_entered, 11) AS [the_day]
FROM DietTracker.dbo.diet GROUP BY LEFT(date_entered, 11) ORDER BY [the_day] DESC
GO


PRINT('All of todays entries')
GO
/****** Filter results by the current day  ******/
SELECT TOP (1000) [cals], [protein], [meal],
    LEFT([date_entered], 11) AS [the_day]
FROM [DietTracker].[dbo].[diet] WHERE LEFT([date_entered], 11)
        = (
        SELECT TOP(1) LEFT([date_entered], 11) AS [cur_day]
        FROM [DietTracker].[dbo].[diet] ORDER BY [cur_day] DESC
    ) ORDER BY [date_entered]
GO


PRINT('All the diet entries')
GO
/****** Select the top N rows  ******/
SELECT TOP (1000) * FROM [DietTracker].[dbo].[diet]
GO


--UPDATE diet SET cals = cals + 50 WHERE id = 5
--GO


--DELETE diet WHERE id = 10
--GO






--