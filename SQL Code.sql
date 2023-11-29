----- alter table product and add column description after name ----
alter table product add column item_description longtext after item_name;


----- create table query for product description -----

create table if not exists product_description (
item_id int primary key references product(item_id),
item_memory longtext,
item_storage longtext,
item_resolution longtext,
item_camera longtext,
item_processor longtext,
item_battery longtext
);

insert into product_description (item_id,item_memory,item_storage,item_resolution,item_camera,item_processor,item_battery)
values (
    1,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM","4.7 inch Retina HD display","13MP primary Camera | 5MP Front",
    "A8 CHip with 64-bit Architecture and M8 motion Co-processor Processor","4100 mAh Li-Polymer Battery"),
    (
    2,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery"),
     (
    3,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery"),
     (
    4,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery"),
     (
    5,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery"),
     (
    6,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery"),
     (
    7,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery"),
     (
    8,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery"),
     (
    9,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery"),
     (
    10,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery"),
     (
    11,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery"),
     (
    12,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery"),
     (
    13,"1 GB RAM | 4 GB RAM | 6 GB RAM | 8 GB RAM","16 GB ROM |32 GB ROM | 64 GB ROM Expandable Upto 128 GB","5.5 inch Full HD display","5MP primary Camera | 1.2MP Front",
    "Qualcomm Snapdragon 625 64-bit Processor","Li-Ion Battery");
   



------ alter column data types and constraints conditions -------

alter table product_description modify item_memory varchar(150),modify item_storage varchar(150),modify item_resolution varchar(150),
modify item_camera varchar(150),modify item_processor varchar(150),modify item_battery varchar(150);


---- rename table ----
rename table productreviews to product_reviews;

----- add quantity column for in stock and out of stock display ----
alter table product add column quantity int after item_price;

--- update quantity of 30 to all products ---
update product set quantity = 30 where item_id in (1,2,3,4,5,6,7,8,9,10,11,12,13);


--- table contactdata which is received by admin ---
CREATE TABLE `tbl_contact_data` (
  `id` int(11) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `PhoneNumber` char(12) DEFAULT NULL,
  `EmailId` varchar(200) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `UserIp` varbinary(16) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Is_Read` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tbl_contact_data`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_contact_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;  


---- change column name and constraints for table users ----
alter table users change firstname name varchar(100);

alter table users change lastname username varchar(100);

--- add id column after droping it to modify primary key
alter table users drop id;

alter table users add column id int(11) UNIQUE after email;

update users set id = 1 where name = "Code";

update users set id = 2 where name = "Harry";

update users set id = 3 where name = "Christine";

alter table users modify column id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;

alter table users modify email varchar(200) not null primary key;


--- tbl_contact_data insert data for trial --- 
INSERT INTO `tbl_contact_data` (`id`, `FullName`, `PhoneNumber`, `EmailId`, `Subject`, `Message`, `UserIp`, `PostingDate`, `Is_Read`) VALUES
(1, 'Anuj kumar', '1234567890', 'anuj@gmail.com', 'Test purpose', 'This is for Testing only.', 0x3a3a31, '2021-04-24 13:07:58', 1);


--- create table admin remarks ---
CREATE TABLE `tbl_admin_remarks` (
  `id` int(11) NOT NULL,
  `contactFormId` int(11) DEFAULT NULL,
  `adminRemark` mediumtext DEFAULT NULL,
  `remarkDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_admin_remarks` (`id`, `contactFormId`, `adminRemark`, `remarkDate`) VALUES
(1, 1, 'This is for testing remark by admin.', '2021-04-24 13:39:41'),
(2, 1, 'Test by admin part 2', '2021-04-24 13:39:59'),
(3, 1, 'Test by admin part 2', '2021-04-24 13:41:53'),
(4, 1, 'Test by admin part 2', '2021-04-24 13:42:15');

ALTER TABLE `tbl_admin_remarks`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_admin_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;  


CREATE TABLE `test_con` (
  `id` int(11) NOT NULL,
  `contactFormId` int(11) DEFAULT NULL,
  `adminRemark` mediumtext DEFAULT NULL,
  `remarkDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--- create a trigger to prevent another row from being inserted into the table and allow only one row ---
DELIMITER $$
CREATE TRIGGER prevent_insert before INSERT ON `test_con`
FOR EACH ROW
BEGIN 
    DECLARE row_count INT;
    SELECT COUNT(*) INTO row_count FROM `test_con`;
    IF row_count > 0 THEN
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Only one row is allowed in this tables.';
    END IF;  
END;
$$
DELIMITER ;

--- test the trigger logic here. Conclusion Success it works perefectly. ---
INSERT INTO `test_con` (`id`, `contactFormId`, `adminRemark`, `remarkDate`) VALUES
(1, 1, 'This is for testing remark by admin.', '2021-04-24 13:39:41');

INSERT INTO `test_con` (`id`, `contactFormId`, `adminRemark`, `remarkDate`) VALUES
(2, 1, 'Test by admin part 2', '2021-04-24 13:39:59');

INSERT INTO `test_con` (`id`, `contactFormId`, `adminRemark`, `remarkDate`) VALUES
(3, 1, 'Test by admin part 2', '2021-04-24 13:41:53');

INSERT INTO `test_con` (`id`, `contactFormId`, `adminRemark`, `remarkDate`) VALUES
(4, 1, 'Test by admin part 2', '2021-04-24 13:42:15');
 
--- record database error ---
CREATE TABLE error_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    error_message TEXT
);

--- record user logs in database system ---
CREATE TABLE user_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(255) NOT NULL,
    action_type ENUM('Login', 'Logout') NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


--- create a trigger to prevent another row from being inserted into the table and allow only one row ---
--- apply this on the admin email table for email ----

DELIMITER $$
CREATE TRIGGER prevent_insert before INSERT ON `tbl_email`
FOR EACH ROW
BEGIN 
    DECLARE row_count INT;
    SELECT COUNT(*) INTO row_count FROM `tbl_email`;
    IF row_count > 0 THEN
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Only one row is allowed in this tables.';
    END IF;  
END;
$$
DELIMITER ;

--- to remove the trigger ---
DROP TRIGGER prevent_insert;

-- create sales table for mobile shopping plaza ---
CREATE TABLE IF NOT EXISTS `sales` (
    `id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `pay_id` varchar(50) NOT NULL,
    `sales_date` date NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
                                                                  (9, 9, 'PAY-1RT494832H294925RLLZ7TZA', '2018-05-10'),
                                                                  (10, 9, 'PAY-21700797GV667562HLLZ7ZVY', '2018-05-10');

ALTER TABLE `sales`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `sales`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;

