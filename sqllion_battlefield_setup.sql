CREATE TABLE IF NOT EXISTS sqllion_battlefield
(
	location_id		INT				UNSIGNED NOT NULL AUTO_INCREMENT,
	x_pos 			INT				NOT NULL,
	y_pos			INT				NOT NULL,
	terrain			VARCHAR(30)		NOT NULL,
	minimum			INT				NOT NULL,
	maximum			INT				NOT NULL,
	
	PRIMARY KEY(location_id)
);

INSERT INTO sqllion_battlefield(x_pos, y_pos, terrain, minimum, maximum)
VALUES
(-3, 3, "mountains", 333, 543),  (-2, 3, "mountains", 293, 623),  (-1, 3, "mountains", 228, 672),  (0, 3, "mountains", 308, 563),  (1, 3, "plains", 43, 315),   (2, 3, "plains", 26, 311),   (3, 3, "mountains", 572, 871),
(-3, 2, "mountains", 215, 623),  (-2, 2, "mountains", 367, 571),  (-1, 2, "mountains", 353, 498),  (0, 2, "plains", 48, 381),      (1, 2, "plains", 37, 294),   (2, 2, "plains", 34, 245),   (3, 2, "valley", 43, 654),
(-3, 1, "forest", 420, 876),     (-2, 1, "plains", 42, 264),      (-1, 1, "plains", 56, 312),      (0, 1, "plains", 32, 361),      (1, 1, "plains", 24, 314),   (2, 1, "valley", 43, 700),   (3, 1, "plains", 36, 344),
(-3, 0, "forest", 384, 821),     (-2, 0, "forest", 342, 813),     (-1, 0, "plains", 64, 235),      (0, 0, "plains", 23, 163),      (1, 0, "plains", 50, 253),   (2, 0, "valley", 39, 692),   (3, 0, "plains", 29, 315),
(-3, -1, "forest", 432, 987),    (-2, -1, "forest", 394, 754),    (-1, -1, "beach", 2, 28),        (0, -1, "plains", 34, 201),     (1, -1, "plains", 25, 234),  (2, -1, "valley", 35, 732),  (3, -1, "beach", 1, 20),
(-3, -2, "forest", 354, 843),    (-2, -2, "forest", 432, 775),    (-1, -2, "beach", 4, 12),        (0, -2, "beach", 9, 54),        (1, -2, "plains", 61, 349),  (2, -2, "valley", 43, 643),  (3, -2, "beach", 4, 12),
(-3, -3, "beach", 1, 21),    	 (-2, -3, "beach", 2, 18),        (-1, -3, "beach", 4, 28),        (0, -3, "beach", 2, 15),        (1, -3, "beach", 1, 13),     (2, -3, "beach", 6, 32),     (3, -3, "beach", 8, 58);