
use QueryPractice
go

create proc sproc_one2
as
begin 
	select * from accounting;
end

begin
	select * from multi_insert;
end


drop proc sproc_one2;


select * into accounting_copy from accounting;



begin transaction 

update accounting set [export_cur_status] = 'complete'
where jobtype = 'Self Mailer'

rollback transaction; 

commit;
