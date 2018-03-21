###################
Assignment
###################

Application using codeigniter REST framework. Basically, you will use Facebook Graph API to fetch a page’s last month’s posts and store it into a table and then perform Read, Update and Delete operation on the data stored.

*******************
Database
*******************

Database name: fb_data,

Table name : post_details

**************************
Create a Table to store post data
**************************

To create table took a attribute id that will be primary key, unique and auto increament.
And other attribues
	`post_id` varchar(255) NOT NULL,
	
  	`page_id` varchar(255) NOT NULL,
  
  	`title` varchar(255) NOT NULL,
 	
	`description` varchar(255) NOT NULL,
  	
	`image_url` varchar(255) NOT NULL,
  	
	`likes` int(11) NOT NULL,
  	
	`comment_counts` int(11) NOT NULL,
  	
	`published_date` date NOT NULL


To create table you can run sql query that you can take from 'fb_data.sql'.
	

