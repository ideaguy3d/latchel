

  -- 6-14-2020 T-SQL practice



  -- cast varchar to char
  select [OrganizationLevel], cast([JobTitle] as char(3)) as job_abbr
  FROM [AdventureWorks2014].[HumanResources].[Employee]


  -- orig values 
  select JobTitle, BirthDate from [AdventureWorks2014].[HumanResources].[Employee];  

-- convert using style 
select JobTitle, convert(varchar(20), BirthDate, 101) as hire_date
from [AdventureWorks2014].[HumanResources].[Employee];  






















--