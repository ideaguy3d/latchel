/****** Script for SelectTopNRows command from SSMS  ******/
SELECT TOP (1000) [BusinessEntityID]
      ,[NationalIDNumber]
      ,[LoginID]
      ,[OrganizationNode]
      ,[OrganizationLevel]
      ,[JobTitle]
      ,[BirthDate]
      ,[MaritalStatus]
      ,[Gender]
      ,[HireDate]
      ,[SalariedFlag]
      ,[VacationHours]
      ,[SickLeaveHours]
      ,[CurrentFlag]
      ,[rowguid]
      ,[ModifiedDate]
  FROM [AdventureWorks2014].[HumanResources].[Employee]


  -- 6-14-2020 T-SQL practice



-- cast varchar to char
select [OrganizationLevel], cast([JobTitle] as char(3)) as job_abbr
FROM [AdventureWorks2014].[HumanResources].[Employee]



		-- orig values --
		select orig_order
			, [OrganizationNode]
			, [OrganizationLevel]
			, JobTitle
			, BirthDate 
		from [AdventureWorks2014].[dbo].[c_employee];  



-- convert using style 
select JobTitle, convert(varchar(20), BirthDate, 101) as hire_date
from [AdventureWorks2014].[HumanResources].[Employee];  



-- create a copy of the [Employee] table 
select * into c_employee from [AdventureWorks2014].[HumanResources].[Employee]
-- create orig order field
alter table c_employee add orig_order int; 
-- add an increment to know orig order
declare @c int = 0;
update c_employee set @c = orig_order = @c + 1 where orig_order is null; 


-- create a clustered _index 
create clustered index [clus_idx_job_title] 
on [AdventureWorks2014].[dbo].[c_employee] (JobTitle asc);
go

















  -- end of sql code -- 