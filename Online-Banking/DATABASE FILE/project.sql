create table `branch`(
    `branch_name` varchar(25),
    `assets` float(13,2)
);
create table `registration`(
    `Customer_Id` int(10) not null,
    `customer_name` varchar(35) not null,
    `gender` varchar(1) not null,
    `dob` date not null,
    `mobile` varchar(10) not null,
    `email` varchar(35),
    `citizenship` varchar(25) not null,
    `customer_city` varchar(25),
    `customer_street` varchar(25),
    `branch_name` varchar(25) not null,
    `pin` varchar(6) not null,
    `password` varchar(35) not null,
    `InDtTm` DATETIME DEFAULT CURRENT_TIMESTAMP,
    primary key (`Customer_Id`)
);
create table `depositor`(
    `account_number` int(10),
    `deposite_amount` int(10),
    `InDtTm` DATETIME DEFAULT CURRENT_TIMESTAMP
);
-- create table `customer`(
--     `Customer_Id` varchar(10),
--     `customer_name` varchar(35),
--     `customer_city` varchar(25),
--     `customer_street` varchar(25)
-- );
create table `borrower`(
    `Customer_Id` int(10),
    `loan_number` varchar(12)
);
create table `loan`(
    `loan_number` varchar(12),
    `branch_name` varchar(25),
    `amount` float(12,2),
    `InDtTm` DATETIME DEFAULT CURRENT_TIMESTAMP
);

create table `account`(
    `Customer_Id` int(10) not null,
    `customer_name` varchar(35) not null,
    `branch_name` varchar(25),
    `account_number` int(10) ,
    `balance` float(12,2),
    primary key (`account_number`)
);
create table `staff`(
    `staff_id` int(10) not null,
    `staff_name` varchar(50),
    `gender` varchar(7),
    `dob` date not null,
    `post` varchar(25),
    `branch_name` varchar(25),
    `mobile_no` varchar(10),
    `email_id` varchar(35),
    `home_addr` varchar(35),
    `password` varchar(35),
    primary key (`staff_id`)
);
-- CREATE TABLE `recordbook` (
--   `Customer_Id` int(10) NOT NULL,
--   `transaction_id` varchar(255),
--   `Cr_amount` varchar(255),
--   `Dr_amount` varchar(255),
--   `Net_Balance` varchar(255),
--   `Remark` varchar(255),
--   `transaction_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
--   primary key (`transaction_id`)
-- );

alter table `staff` add constraint `uq_staff` unique key(`mobile_no`);
alter table `staff` add constraint `uq1_staff` unique key(`email_id`);

alter table `branch` add  primary key (`branch_name`);

alter table `staff` add constraint `fk_staff` foreign key(`branch_name`)
references `branch`(`branch_name`);

alter table `branch` add constraint `ck` check (`branch_name` in (
					  "Kathmandu","Pokhara","Biratnagar","Janakpur","Bharatpur","Bigunj",
                      "Itahari","Lalitpur","Nepalgunj","Dhangadhi","Dharan","Hetauda","Bhaktapur",
                      "Butwal","Kritipur","Tulsipur",
                      "Siddharthanagar","Birendranagar","Tikapur","Ghorahi","Panauti",
                      "Gaighat","Rajbiraj","Baglung", "Tansen"));

alter table `registration` add constraint `ck` check (`gender` in ("m","f"));                  

alter table `loan` add  primary key (`loan_number`);


alter table `account` add constraint `fk_const` foreign key (`branch_name`)
references `branch`(`branch_name`) ; 

alter table `account` add constraint `fk2_const` foreign key (`Customer_Id`)
references `registration`(`Customer_Id`) ; 

alter table `depositor` add constraint `fk1_const` foreign key (`account_number`)
references `account`(`account_number`);

alter table `loan` add constraint `fk3_const` foreign key (`branch_name`)
references `branch`(`branch_name`);

alter table `borrower` add constraint `fk6_const` foreign key (`loan_number`)
references `loan`(`loan_number`);

alter table `borrower` add constraint `fk4_const` foreign key (`Customer_Id`)
references `registration`(`Customer_Id`);

alter table `registration` add constraint `fk5_const` foreign key (`branch_name`)
references `branch`(`branch_name`);

-- alter table `recordbook` add constraint `fk_rec` foreign key (`Customer_Id`)
-- references `registration`(`Customer_Id`);

alter table `registration` add constraint `uq_const` unique key (`mobile`);

alter table `registration` add constraint `uq1_const` unique key (`email`);

alter table `registration` add constraint `uq2_const` unique key (`citizenship`);

insert into `branch` values("Kathmandu",1500000000);
insert into `branch` values("Pokhara",1000000000);
insert into `branch` values("Biratnagar",900000000);
insert into `branch` values("Janakpur",800000000);
insert into `branch` values("Bharatpur",750000000);
insert into `branch` values("Bigunj",700000000);
insert into `branch` values("Itahari",690000000);
insert into `branch` values("Lalitpur",700000000);
insert into `branch` values("Nepalgunj",770000000);
insert into `branch` values("Dhangadhi",800000000);
insert into `branch` values("Dharan",800000000);
insert into `branch` values("Hetauda",680000000);
insert into `branch` values("Bhaktapur",980000000);
insert into `branch` values("Butwal",900000000);
insert into `branch` values("Kritipur",800000000);
insert into `branch` values("Tulsipur",550000000);
insert into `branch` values("Siddharthanagar",400000000);
insert into `branch` values("Birendranagar",450000000);
insert into `branch` values("Tikapur",350000000);
insert into `branch` values("Ghorahi",500000000);
insert into `branch` values("Panauti",250000000);
insert into `branch` values("Gaighat",150000000);
insert into `branch` values("Rajbiraj",400000000);
insert into `branch` values("Baglung",100000000);
insert into `branch` values("Tansen",90000000);

insert into `staff` values(420,"Diwakar Sharma","m","1970-05-18","Bank manager",
                          "Pokhara","9841250101","dewakarshrm70@gmail.com","Dang ghorahi-5","bankmanager");

insert into `registration` values(100,"Sanjog Shrestha","m","2000-06-26","9812899991","ssanjogshrestha@gmail.com",
        "52-39-03987","Ghorahi","Bank road","Ghorahi","456852","password1",null);

insert into `account` values(100,"Sanjog Shrestha","Ghorahi",1010100,0.00);
CREATE TABLE `recordbook_100`( 
    `Customer_Id` int(10) NOT NULL,
    `transaction_id` varchar(10),
    `Cr_amount` varchar(10),
    `Dr_amount` varchar(10),
    `Net_Balance` varchar(12),
    `Remark` varchar(50),
    `transaction_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    primary key (`transaction_id`),
    FOREIGN KEY (`Customer_Id`) REFERENCES registration(`Customer_Id`)
  );


-- insert into `account` values(124567,1001,"Ghorahi",null);