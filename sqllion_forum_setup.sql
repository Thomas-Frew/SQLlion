CREATE TABLE IF NOT EXISTS sqllion_forum (
	post_id 		INT					UNSIGNED NOT NULL AUTO_INCREMENT,
	first_name		VARCHAR(20)			NOT NULL,
	last_name		VARCHAR(40)			NOT NULL,
	subject			VARCHAR(60)			NOT NULL,
	message			TEXT				NOT NULL,
	post_date		DATETIME			NOT NULL,

	PRIMARY KEY(post_id)
);
	
	