<?php
  /**************************************************************************\
  * phpGroupWare - Setup                                                     *
  * http://www.phpgroupware.org                                              *
  * --------------------------------------------                             *
  *  This program is free software; you can redistribute it and/or modify it *
  *  under the terms of the GNU General Public License as published by the   *
  *  Free Software Foundation; either version 2 of the License, or (at your  *
  *  option) any later version.                                              *
  \**************************************************************************/

  /* $Id$ */
  
  // NOTE: Please use spaces to seperate the field names.  It makes copy and pasting easier.

  $sql = "CREATE TABLE phpgw_config (
    config_app      varchar(50),
    config_name     varchar(255) NOT NULL,
    config_value    varchar(100),
    UNIQUE config_name (config_name)
  )";
  $phpgw_setup->db->query($sql);  
 
  $sql = "CREATE TABLE phpgw_applications (
    app_name     varchar(25) NOT NULL,
    app_title    varchar(50),
    app_enabled  int,
    app_order    int,
    app_tables   varchar(255),
    app_version  varchar(20) NOT NULL default '0.0',
    UNIQUE app_name (app_name)
  )";
  $phpgw_setup->db->query($sql);  

  $sql = "CREATE TABLE phpgw_accounts (
    account_id             int(11) DEFAULT '0' NOT NULL auto_increment,
    account_lid            varchar(25) NOT NULL,
    account_pwd            varchar(32) NOT NULL,
    account_firstname      varchar(50),
    account_lastname       varchar(50),
    account_lastlogin      int(11),
    account_lastloginfrom  varchar(255),
    account_lastpwd_change int(11),
    account_status         enum('A','L'),
    account_expires        int,
    account_type           char(1),
    PRIMARY KEY (account_id),
    UNIQUE account_lid (account_lid)
  )";
  $phpgw_setup->db->query($sql);  

  $sql = "CREATE TABLE phpgw_preferences (
    preference_owner       int,
    preference_value       text
  )";
  $phpgw_setup->db->query($sql);  

  $sql = "CREATE TABLE phpgw_sessions (
    session_id        varchar(255) NOT NULL,
    session_lid       varchar(255),
    session_ip        varchar(255),
    session_logintime int(11),
    session_dla       int(11),
    session_action    varchar(255),
    session_flags     char(2),
    UNIQUE sessionid (session_id)
  )";
  $phpgw_setup->db->query($sql);  

  $sql = "CREATE TABLE phpgw_acl (
    acl_appname       varchar(50),
    acl_location      varchar(255),
    acl_account       int,
    acl_rights        int
  )";
  $phpgw_setup->db->query($sql);  

  $sql = "CREATE TABLE phpgw_app_sessions (
    sessionid	   varchar(255) NOT NULL,
    loginid	     varchar(20),
    location      varchar(255),
    app	         varchar(20),
    content	     longtext,
    session_dla  int
  )";
  $phpgw_setup->db->query($sql);  

  $sql = "create table phpgw_access_log (
    sessionid	varchar(255),
    loginid	  varchar(30),
    ip		   varchar(30),
    li		   int,
    lo		   varchar(255)
  )";
  $phpgw_setup->db->query($sql);  

  $sql = "CREATE TABLE phpgw_addressbook (
     id    int(8) NOT NULL auto_increment,
     lid   varchar(32),
     tid   char(1),
     owner int(8),
     access   char(7),
	 cat_id   varchar(32),
     fn       varchar(64),
     n_family varchar(64),
     n_given  varchar(64),
     n_middle varchar(64),
     n_prefix varchar(64),
     n_suffix varchar(64),
     sound    varchar(64),
     bday     varchar(32),
     note     text,
     tz       varchar(8),
     geo      varchar(32),
     url      varchar(128),
     pubkey   text,

     org_name varchar(64),
     org_unit varchar(64),
     title    varchar(64),

     adr_one_street      varchar(64),
     adr_one_locality    varchar(64),
     adr_one_region      varchar(64),
     adr_one_postalcode  varchar(64),
     adr_one_countryname varchar(64),
     adr_one_type        varchar(32),
     label text,

     adr_two_street      varchar(64),
     adr_two_locality    varchar(64),
     adr_two_region      varchar(64),
     adr_two_postalcode  varchar(64),
     adr_two_countryname varchar(64),
     adr_two_type        varchar(32),

     tel_work   varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_home   varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_voice  varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_fax    varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_msg    varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_cell   varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_pager  varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_bbs    varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_modem  varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_car    varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_isdn   varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_video  varchar(40) DEFAULT '+1 (000) 000-0000' NOT NULL,
     tel_prefer varchar(32),

     email varchar(64),
     email_type varchar(32) DEFAULT 'INTERNET' NOT NULL,
     email_home varchar(64),
     email_home_type varchar(32) DEFAULT 'INTERNET' NOT NULL,
     PRIMARY KEY (id),
     UNIQUE id (id)
   )";

  $phpgw_setup->db->query($sql);

  $sql = "CREATE TABLE phpgw_addressbook_extra (
    contact_id 		int(11),
    contact_owner 	int(11),
    contact_name 	varchar(255),
    contact_value 	text
  )";

  $phpgw_setup->db->query($sql);

  $sql = "CREATE TABLE customers (
    company_id int(10) unsigned NOT NULL auto_increment,
    company_name varchar(255),
    website varchar(80),
    ftpsite varchar(80),
    industry_type varchar(50),
    status varchar(30),
    software varchar(40),
    lastjobnum int(10) unsigned,
    lastjobfinished date,
    busrelationship varchar(30),
    notes text,
    PRIMARY KEY (company_id)
  );";
  $phpgw_setup->db->query($sql);  

  $sql = "CREATE TABLE phpgw_todo (
    todo_id      int(11) DEFAULT '0' NOT NULL auto_increment,
    todo_id_parent	int(11) DEFAULT '0' NOT NULL,
    todo_owner   varchar(25),
    todo_access  varchar(10),
    todo_cat		int(11),
    todo_des     text,
    todo_pri     int(11),
    todo_status  int(11),
    todo_datecreated  int(11),
    todo_startdate int(11),
    todo_enddate int(11),
    PRIMARY KEY (todo_id)
  )";
  $phpgw_setup->db->query($sql);  

  $sql = "CREATE TABLE phpgw_cal (
    cal_id		int(11) DEFAULT '0' NOT NULL auto_increment,
    owner		int(11) DEFAULT '0' NOT NULL,
    category	int(11) DEFAULT '0' NOT NULL ,
    groups		varchar(255),
    datetime	int(11),
    mdatetime	int(11),
    edatetime	int(11),
    priority	int(11) DEFAULT '2' NOT NULL,
    cal_type		varchar(10),
    is_public		int DEFAULT '1' NOT NULL,
    title		varchar(80) NOT NULL,
    description	text,
    PRIMARY KEY (cal_id)
  )";
  $phpgw_setup->db->query($sql);  

  $sql = "CREATE TABLE phpgw_cal_repeats (
    cal_id		int(11) DEFAULT '0' NOT NULL,
    recur_type		int DEFAULT '0' NOT NULL,
    recur_use_end	int DEFAULT '0',
    recur_enddate	int(11) DEFAULT '0',
    recur_interval	int(11) DEFAULT '1',
    recur_data		int
  )";
  $phpgw_setup->db->query($sql);  

  $sql = "CREATE TABLE phpgw_cal_user (
    cal_id       int(11) DEFAULT '0' NOT NULL,
    cal_login    int(11) DEFAULT '0' NOT NULL,
    cal_status   char(1) DEFAULT 'A',
    PRIMARY KEY (cal_id, cal_login)
  )";
  $phpgw_setup->db->query($sql);  

	$sql = "CREATE TABLE phpgw_cal_holidays (
	   hol_id int(11) NOT NULL auto_increment,
		locale char(2) NOT NULL,
		name	varchar(50) NOT NULL,
		mday	int DEFAULT '0' NOT NULL,
		month_num	int DEFAULT '0' NOT NULL,
		occurence	int DEFAULT '0' NOT NULL,
		dow	int DEFAULT '0' NOT NULL,
		observance_rule int DEFAULT '0' NOT NULL,
		PRIMARY KEY (hol_id)
	)";
	$phpgw_setup->db->query($sql);
		
 $sql = "CREATE TABLE newsgroups (
    con             int(11) NOT NULL auto_increment,
    name            varchar(255) NOT NULL,
    messagecount    int(11) NOT NULL,
    lastmessage     int(11) NOT NULL,
    active          char DEFAULT 'N' NOT NULL,
    lastread        int(11),
    PRIMARY KEY (con),
    UNIQUE name (name)
  )";
  $phpgw_setup->db->query($sql);  

  $sql = "CREATE TABLE news_msg (
    con	        int(11)      NOT NULL,
    msg	        int(11)      NOT NULL,
    uid	        varchar(255) DEFAULT '',
    udate       int(11)      DEFAULT 0,
    path        varchar(255) DEFAULT '',
    fromadd     varchar(255) DEFAULT '',
    toadd       varchar(255) DEFAULT '',
    ccadd       varchar(255) DEFAULT '',
    bccadd      varchar(255) DEFAULT '',
    reply_to    varchar(255) DEFAULT '',
    sender      varchar(255) DEFAULT '',
    return_path varchar(255) DEFAULT '',
    subject     varchar(255) DEFAULT '',
    message_id  varchar(255) DEFAULT '',
    reference   varchar(255) DEFAULT '',
    in_reply_to varchar(255) DEFAULT '',
    follow_up_to varchar(255) DEFAULT '',
    nntp_posting_host varchar(255) DEFAULT '',
    nntp_posting_date varchar(255) DEFAULT '',
    x_complaints_to varchar(255) DEFAULT '',
    x_trace     varchar(255) DEFAULT '',
    x_abuse_info varchar(255) DEFAULT '',
    x_mailer    varchar(255) DEFAULT '',
    organization varchar(255) DEFAULT '',
    content_type varchar(255) DEFAULT '',
    content_description	varchar(255) DEFAULT '',
    content_transfer_encoding varchar(255) DEFAULT '',
    mime_version varchar(255) DEFAULT '',
    msgsize     int(11)      DEFAULT 0,
    msglines    int(11)      DEFAULT 0,
    body        longtext     NOT NULL,
    primary key(con,msg)
  )";
  $phpgw_setup->db->query($sql);

  $sql = "CREATE TABLE lang (
    message_id      varchar(150) DEFAULT '' NOT NULL,
    app_name        varchar(100) DEFAULT 'common' NOT NULL,
    lang            varchar(5) DEFAULT '' NOT NULL,
    content         text NOT NULL,
    PRIMARY KEY (message_id,app_name,lang)
  )";
  $phpgw_setup->db->query($sql);
  
  $sql = "CREATE TABLE phpgw_categories (
            cat_id          int(9) DEFAULT '0' NOT NULL auto_increment,
            cat_main      int(9) DEFAULT '0' NOT NULL,
            cat_parent      int(9) DEFAULT '0' NOT NULL,
            cat_level      int(3) DEFAULT '0' NOT NULL,
            cat_owner       int(11) DEFAULT '0' NOT NULL,
	    cat_access	    char(7),
            cat_appname     varchar(50) NOT NULL,
            cat_name        varchar(150) NOT NULL,
            cat_description varchar(255) NOT NULL,
            cat_data        text,
            PRIMARY KEY (cat_id)
         )";
  $phpgw_setup->db->query($sql);

  $sql = "CREATE TABLE languages (
     lang_id         varchar(2) NOT NULL,
     lang_name       varchar(50) NOT NULL,
     available       char(3) NOT NULL DEFAULT 'No', 
     PRIMARY KEY (lang_id)
  )";
  $phpgw_setup->db->query($sql);

  $sql = "CREATE TABLE phpgw_notes (
            note_id        	int(20) NOT NULL auto_increment, 
            note_owner     	int(11),
	    note_access		char(7),    
            note_date      	int(11),
            note_category  	int(9),
            note_content   	text, 
            PRIMARY KEY (note_id)
          )";
  $phpgw_setup->db->query($sql);

  $sql = "create table phpgw_hooks (
           hook_id       int not null auto_increment,
           hook_appname  varchar(255),
           hook_location varchar(255),
           hook_filename varchar(255),
           primary key hook_id (hook_id)
         );";
  $phpgw_setup->db->query($sql); 

  $sql = "create table phpgw_nextid (
           appname varchar(25) NOT NULL,
           id      int(8),
		   UNIQUE (appname)
          )";
  $phpgw_setup->db->query($sql);

  $phpgw_info['setup']['currentver']['phpgwapi'] = '0.9.13.001';
  $phpgw_info['setup']['oldver']['phpgwapi'] = $phpgw_info['setup']['currentver']['phpgwapi'];
  update_version_table();
//  $phpgw_setup->update_version_table();
?>
