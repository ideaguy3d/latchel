USE [DietTracker]
GO

/****** Object:  StoredProcedure [dbo].[spDietEntry]    Script Date: 9/8/2019 6:40:04 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


ALTER PROCEDURE [dbo].[spDietEntry]
@cals INT, @protein INT, @meal VARCHAR(512)
AS
BEGIN
    INSERT INTO DietTracker.dbo.diet ([cals], [protein], [meal])
    VALUES (
        @cals, @protein, @meal
    )
END
