CREATE TABLE IF NOT EXISTS sqllion_users (
	user_id 		INT							UNSIGNED NOT NULL AUTO_INCREMENT,
	first_name		VARCHAR(20)					NOT NULL,
	last_name		VARCHAR(40)					NOT NULL,
	email			VARCHAR(60)					NOT NULL,
	pass			VARCHAR(256)				NOT NULL,
	reg_date		DATETIME					NOT NULL,
	battalion		ENUM("1st", "2nd", "3rd")	NOT NULL,
	
	balance			INT							DEFAULT 0 NOT NULL,
	item_id			INT							DEFAULT 0 NOT NULL,
	
	PRIMARY KEY(user_id),
	UNIQUE(email),
	INDEX(first_name)
);