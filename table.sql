/*
ToDo: add the faculty coordinator and(or) incharge
ass tmrstamp in both ES_EVENT and event_logs
*/

CREATE TABLE ES_Acc(
    _es_email VARCHAR(255) PRIMARY KEY NOT NULL,
    _es_pwd VARCHAR(255) NOT NULL,
    _es_role VARCHAR(255)
);

CREATE TABLE ES_FORGOT_PWD(
    _es_email VARCHAR(255) PRIMARY KEY NOT NULL,
    _es_token VARCHAR(255) NOT NULL
);



/*
App tables
*/

CREATE TABLE ES_EVENT(
    _es_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    _es_type VARCHAR(100),
    _es_cat VARCHAR(50),
    _es_mode VARCHAR(50),
    _es_name VARCHAR(255),
    _es_location VARCHAR(255),
    _es_description VARCHAR(255),
    _es_start_date VARCHAR(12),
    _es_end_date VARCHAR(12),
    _es_start_time VARCHAR(12),
    _es_end_time VARCHAR(12),
    _es_url VARCHAR(255),
    _es_added_by VARCHAR(255)
);

CREATE TABLE ES_LOGS(
    _es_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    _es_type VARCHAR(255),    
    _es_desc VARCHAR(255),
    _es_logger VARCHAR(255)
);

CREATE TABLE ES_TOKEN(
    _es_email VARCHAR(255) PRIMARY KEY NOT NULL,
    _es_date DATE
);


CREATE TABLE ES_FILES(
    _es_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    _es_name VARCHAR(255) NOT NULL,
    _es_event INTEGER NOT NULL
);

CREATE TABLE ES_CATS(
    _es_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    _es_name VARCHAR(100)
);


CREATE TABLE ES_F_LOGS(
    _es_f_id INTEGER NOT NULL,
    _es_user VARCHAR(255) NOT NULL,
    _es_action VARCHAR(100) NOT NULL,
    _es_tstamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




/*
Virtual Drive
*/

CREATE TABLE ES_FOLDERS(
    _es_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    _es_name VARCHAR(100) NOT NULL,
    _es_fid INTEGER NOT NULL DEFAULT 0
);

CREATE TABLE ES_FILES(
    _es_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    _es_fid INTEGER NOT NULL,
    _es_filename VARCHAR(100) NOT NULL,
    _es_url VARCHAR(255) NOT NULL
);


/*
Commands to be run the first time
*/

INSERT INTO ES_ACC(_es_email, _es_pwd, _es_role) VALUES('gini@srmuniv.ac.in', ' ', 'ADMIN');