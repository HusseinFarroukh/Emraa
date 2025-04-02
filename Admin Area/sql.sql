CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_pos` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `admin_act` int(1) NOT NULL DEFAULT 1,
  `admin_type` int(1) DEFAULT 1,
  PRIMARY KEY (`admin_id`)
);

CREATE TABLE `book` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `realdate` datetime NOT NULL,
  `transdate` date NOT NULL,
  `cbm` decimal(20,2) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `extra` decimal(10,2) NOT NULL DEFAULT 0.00,
  `collected` varchar(10) NOT NULL DEFAULT 'STEAVE',
  `notes` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`trans_id`)
);

CREATE TABLE `container` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_no` varchar(255) NOT NULL,
  `loading_port` varchar(255) NOT NULL,
  `discharge_port` varchar(255) NOT NULL,
  `warehouse` int(11) NOT NULL,
  `dept_date` date NOT NULL,
  `arr_date` date NOT NULL,
  `real_arr` date DEFAULT NULL,
  `shipper` varchar(255) NOT NULL,
  `shipping_line` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `size` decimal(20,2) NOT NULL,
  `box_qty` decimal(20,2) NOT NULL,
  `fright` varchar(10) NOT NULL,
  `seal` varchar(255) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  `blno` varchar(255) NOT NULL,
  `blnoimage` varchar(255) NOT NULL,
  `cont_desc` varchar(255) NOT NULL,
  `arrived` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`cont_id`)
);

CREATE TABLE `cost` (
  `cont_id` int(11) NOT NULL,
  `goods` decimal(20,2) NOT NULL DEFAULT 0.00,
  `officeFees` decimal(20,2) NOT NULL DEFAULT 0.00,
  `internalFrightRbm` varchar(255) NOT NULL,
  `AddFeesRbm` varchar(255) NOT NULL,
  `InsuranceCash` varchar(255) NOT NULL,
  `FrightCash` varchar(255) NOT NULL,
  `freightEuro` decimal(20,2) NOT NULL,
  `FrieghtCheck` varchar(255) NOT NULL,
  `CustomsCashd` varchar(255) NOT NULL,
  `CustomsCheckd` varchar(255) NOT NULL,
  `CustomsCashL` varchar(255) NOT NULL,
  `CustomsCheckL` varchar(255) NOT NULL,
  `Makita` varchar(255) NOT NULL,
  `Extra177` varchar(255) NOT NULL,
  `goodsd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `officeFeesd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `internalFrightRbmd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `AddFeesRbmd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `InsuranceCashd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `FrightCashd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `freightEuroD` decimal(20,2) NOT NULL DEFAULT 0.00,
  `FrieghtCheckd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `CustomsCashdd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `CustomsCheckdd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `CustomsCashLd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `CustomsCheckLd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `Makitad` decimal(20,2) NOT NULL DEFAULT 0.00,
  `Extra177d` decimal(20,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`cont_id`)
);

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(255) NOT NULL,
  `cust_contact` varchar(255) NOT NULL,
  `cust_phone` varchar(20) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_code` varchar(255) NOT NULL,
  `cust_act` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`cust_id`)
);

CREATE TABLE `customeraccount` (
  `pay_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pay_cust_id` bigint(20) DEFAULT NULL,
  `pay_debit` decimal(20,2) DEFAULT NULL,
  `pay_credit` decimal(20,2) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `pay_trans_id` bigint(20) DEFAULT NULL,
  `pay_note` varchar(255) DEFAULT NULL,
  `pay_stats` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pay_id`)
);

CREATE TABLE `port` (
  `port_id` int(11) NOT NULL AUTO_INCREMENT,
  `port_name` varchar(255) NOT NULL,
  PRIMARY KEY (`port_id`)
);

CREATE TABLE `portd` (
  `port_id` int(11) NOT NULL AUTO_INCREMENT,
  `port_name` varchar(255) NOT NULL,
  PRIMARY KEY (`port_id`)
);

CREATE TABLE `shipper` (
  `shipper_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipper_name` varchar(255) NOT NULL,
  PRIMARY KEY (`shipper_id`)
);

CREATE TABLE `shippingline` (
  `shipline_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipline_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`shipline_id`)
);

CREATE TABLE `warehosue` (
  `warehouse_id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`warehouse_id`)
);