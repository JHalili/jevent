CREATE DATABASE DatabaseProject;
USE DatabaseProject;

/*Entities*/

CREATE TABLE Event(id INTEGER NOT NULL AUTO_INCREMENT,
                   title VARCHAR(80),
                   start_time DATE,
                   end_time DATE,
                   description VARCHAR(512),
                   audience VARCHAR(80),
                   picture_url VARCHAR(2048),
                   PRIMARY KEY (id));

/*Modeling ISA relations*/

CREATE TABLE PublicEvent(public_event_id INTEGER NOT NULL REFERENCES Event(id),
                        PRIMARY KEY (public_event_id));

CREATE TABLE PrivateEvent(private_event_id INTEGER NOT NULL REFERENCES Event(id),
                        PRIMARY KEY (private_event_id));

CREATE TABLE User(username CHAR(80),
                  name CHAR(80),
                  birthdate DATE,
                  e_mail CHAR(100),
                  password CHAR(100),
                  PRIMARY KEY(username));

CREATE TABLE CommonUser(common_username CHAR(80) NOT NULL REFERENCES User(username),
                        profile_visibility BOOLEAN,
                        deactivated BOOLEAN,
                        PRIMARY KEY (common_username));

CREATE TABLE GroupAdmin(groupAdmin_username CHAR(80) NOT NULL REFERENCES User(username),
                        PRIMARY KEY (groupAdmin_username));

CREATE TABLE Event_Group (id INTEGER,
                  name CHAR(80),
                  private BOOLEAN,
                  description CHAR(80),
                  visibility BOOLEAN,
                  PRIMARY KEY(id));

CREATE TABLE EventSource(id INTEGER,
                         name CHAR(100),
                         event_type CHAR(100),
                         paid_events BOOLEAN,
                         periodic BOOLEAN,
                         PRIMARY KEY(id));

CREATE TABLE Event_Filter(criteria CHAR(100), PRIMARY KEY (criteria));

CREATE TABLE Site_Admin(username CHAR(20),
                        name CHAR(20),
                        password CHAR(20),
                        email CHAR(100),
                        PRIMARY KEY (username));


/*Set up relations in the database given the tables above*/

CREATE TABLE EventSource_Part_of (eventSourceId INTEGER,
                       publicEventId INTEGER,
                       FOREIGN KEY (eventSourceId)  REFERENCES EventSource(id),
                       FOREIGN KEY (publicEventId) REFERENCES PublicEvent(public_event_id));

CREATE TABLE Group_Part_of (groupId INTEGER,
                      publicEventId INTEGER,
                      FOREIGN KEY (groupId)  REFERENCES Event_Group(id),
                      FOREIGN KEY (publicEventId) REFERENCES PublicEvent(public_event_id));

CREATE TABLE Event_Created (event_Id INTEGER,
                      user_username CHAR(80),
                      FOREIGN KEY (event_Id)  REFERENCES Event(id),
                      FOREIGN KEY (user_username) REFERENCES User(username));

CREATE TABLE Group_Created (group_Id INTEGER,
                      admin_Id CHAR(80),
                      FOREIGN KEY (group_Id)  REFERENCES Event_Group(id),
                      FOREIGN KEY (admin_Id) REFERENCES GroupAdmin(groupAdmin_username));
CREATE TABLE Member (group_Id INTEGER,
                      commonUser_id CHAR(80),
                      FOREIGN KEY (group_Id)  REFERENCES Event_Group(id),
                      FOREIGN KEY (commonUser_id) REFERENCES CommonUser(common_username));
CREATE TABLE Participated (event_Id INTEGER,
                      user_username CHAR(80),
                      FOREIGN KEY (event_Id)  REFERENCES Event(id),
                      FOREIGN KEY (user_username) REFERENCES User(username));
CREATE TABLE Interested (event_Id INTEGER,
                      user_username CHAR(80),
                      FOREIGN KEY (event_Id)  REFERENCES Event(id),
                      FOREIGN KEY (user_username) REFERENCES User(username),
                      UNIQUE(event_Id, user_username));
CREATE TABLE Invited (privateEvent_Id INTEGER,
                      user_username CHAR(80),
                      FOREIGN KEY (privateEvent_Id)  REFERENCES PrivateEvent(private_event_id),
                      FOREIGN KEY (user_username) REFERENCES User(username));
CREATE TABLE Contains (filter_one CHAR(100),
                      other_filter CHAR(100),
                      logicalOperator CHAR(5),
                      FOREIGN KEY (filter_one)  REFERENCES Event_Filter(criteria),
                      FOREIGN KEY (other_filter) REFERENCES Event_Filter(criteria));
