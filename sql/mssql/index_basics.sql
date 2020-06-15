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



-- drop the clustered _index to make a new one
drop index [clus_idx_job_title] on [dbo].c_employee;



-- create a clustered composite index
create index clus_idx_jobTitle_birthDate on dbo.c_employee (JobTitle asc, BirthDate asc);



drop index clus_idx_jobTitle_birthDate on dbo.c_employee;



-- create a unique clustered index, will initially fail due to duplicate keys in the [JobTitle] field 
create unique index uniq_clus_idx_jobTitle on dbo.c_employee (JobTitle desc); 
  


-- check if the [c2_employee] table exists, if so, drop it then recreate it
if exists (select * from INFORMATION_SCHEMA.TABLES where table_name = 'c2_employee')
begin
	drop table c2_employee; 
	-- create a table by ranking dob asc
	select dense_rank() over (partition by JobTitle order by BirthDate) as oldest_worker_in_dept
			, orig_order
			, [OrganizationNode]
			, [OrganizationLevel]
			, JobTitle
			, BirthDate
	into c2_employee from c_employee;  
end


-- if table [c3_employee] exists, drop it then re-create it
if exists (select * from INFORMATION_SCHEMA.TABLES where TABLE_NAME = 'c3_employee')
begin
	drop table c3_employee; 
	-- create a table w/non-duplicate JobTitle vals by chosing the youngest worker
	-- to create a unique clustered index 
	with q (youngest_worker, qo) as (
		-- with row_number() there won't be tie's with partitioning rank  
		select row_number() over (partition by JobTitle order by BirthDate desc) 
		as youngest_worker, orig_order as qo from c_employee
	) 
	select youngest_worker 
		, orig_order
		, [OrganizationNode]
		, [OrganizationLevel]
		, JobTitle
		, BirthDate 
	into c3_employee from c_employee e inner join q on e.orig_order = q.qo where youngest_worker =  1 
end


-- double check for dupes 
select count(*) as dupe_jobTitles, JobTitle from c3_employee group by JobTitle
order by dupe_jobTitles desc


-- now there are non duplicate [JobTitle] fields, create a unique cluster index
create unique index uniq_clus_idx_jobTitle on dbo.c3_employee (JobTitle asc);
		
		
		
		-- select core fields --
		select youngest_worker 
			, orig_order
			, [OrganizationNode]
			, [OrganizationLevel]
			, JobTitle
			, BirthDate 
		from [AdventureWorks2014].[dbo].[c3_employee];  
		-- or select all fields -- 
		select * from dbo.c3_employee















  -- end of t-sql code -- 