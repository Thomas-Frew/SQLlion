CREATE TABLE IF NOT EXISTS sqllion_inventory
(
	inventory_id		INT					UNSIGNED NOT NULL AUTO_INCREMENT,
	item_id				INT					UNSIGNED NOT NULL,
	item_name			VARCHAR(40)			NOT NULL,
	item_stren			INT					NOT NULL,
	user_id				INT					UNSIGNED NOT NULL,
	purchase_date		DATETIME			NOT NULL,
	
	PRIMARY KEY(inventory_id),
	
	FOREIGN KEY(item_id) REFERENCES sqllion_shop(item_id),
	FOREIGN KEY(item_name) REFERENCES sqllion_shop(item_name),
	FOREIGN KEY(item_stren) REFERENCES sqllion_shop(item_stren),
	FOREIGN KEY(user_id) REFERENCES sqllion_users(user_id),
	
	INDEX(item_id),
	INDEX(item_name),
	INDEX(item_stren),
	INDEX(user_id)
);