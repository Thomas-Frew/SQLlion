CREATE TABLE IF NOT EXISTS sqllion_shop
(
	item_id			INT				UNSIGNED NOT NULL AUTO_INCREMENT,
	item_name 		VARCHAR(40)		NOT NULL,
	item_desc		VARCHAR(200)	NOT NULL,
	item_stren		INT				NOT NULL,
	item_img		VARCHAR(100)	NOT NULL,
	item_price		DECIMAL(6,2)	NOT NULL,
	
	PRIMARY KEY(item_id),
	INDEX(item_name),
	INDEX(item_stren)
);

INSERT INTO sqllion_shop(item_name, item_desc, item_stren, item_img, item_price)
VALUES
("SELECT shortsword", "A sword perfect warriors just starting out.", 10, "sqllion_images/select_shortsword.png", 50.00),
("CREATE crossbow", "A crossbow great for plain exploration.", 60, "sqllion_images/create_crossbow.png", 200.00),
("UPDATE uzi", "A gun great for intermediate combat.", 150, "sqllion_images/update_uzi.png", 700.00),
("DELETE dynamite", "An explosive for deleting tough enemies!.", 400, "sqllion_images/delete_dynamite.png", 2000.00),
("DROP doomsday bomb", "An explosive absolutley unmatched in strength.", 1000, "sqllion_images/drop_doomsday_bomb.png", 5000.00);