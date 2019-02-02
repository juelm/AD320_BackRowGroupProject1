CREATE DATABASE IF NOT EXISTS back_row;

USE back_row;

DROP TABLE IF EXISTS MESSAGES;

CREATE TABLE MESSAGES
(
MessageID			INT 								PRIMARY KEY			AUTO_INCREMENT,
PostName			VARCHAR(30),
PostDate				DATE,							
Email					VARCHAR(30),			
Message				VARCHAR(400)

);

INSERT INTO MESSAGES 
(PostName, PostDate, Email, Message)
VALUES
("John Doe", "2018-12-21", "johndoe@fakemail.com", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
Praesent iaculis ligula eleifend orci condimentum fermentum. 
Duis urna elit, semper ac purus ac, egestas consequat risus. 
Vestibulum pretium, libero ac posuere tincidunt, nibh mauris sollicitudin massa, 
a malesuada lorem nisi rhoncus augue."),

("Jane Doe", "2019-01-03", "janedoe@fakemail.com", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
Praesent iaculis ligula eleifend orci condimentum fermentum. 
Duis urna elit, semper ac purus ac, egestas consequat risus. 
Vestibulum pretium, libero ac posuere tincidunt, nibh mauris sollicitudin massa, 
a malesuada lorem nisi rhoncus augue."),

("Bobby Mcgee", "2019-01-07", "bobmcgee@fakemail.com","Proin volutpat dignissim molestie. 
Curabitur neque felis, dapibus eget mattis a, feugiat molestie elit. Sed facilisis lectus nunc, vel venenatis diam ullamcorper nec."),

("Randall Stephens", "2019-01-13", "rstephens@fakemail.com", "Donec tortor massa, aliquet quis vestibulum ac, accumsan at lorem."),

("Rolo Tomasi", "2019-01-07", "roto@fakemail.com", "In turpis erat, viverra at fermentum et, pulvinar dignissim purus. Proin quis nulla et elit eleifend tristique.");