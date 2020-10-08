-- query 190GB in 2.5secs of wikipedia data
select title, sum(views) as views from `bigquery-public-data.wikipedia.pageviews_2020`
where title like '%Google%' and datehour > '2020-09-01'
group by title
order by views DESC
limit 100;