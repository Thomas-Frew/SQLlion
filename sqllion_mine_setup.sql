CREATE TABLE IF NOT EXISTS sqllion_mine
(
	location_id		INT				UNSIGNED NOT NULL AUTO_INCREMENT,
	x_pos 			INT				NOT NULL,
	y_pos			INT				NOT NULL,
	terrain			VARCHAR(30)		NOT NULL,
	minimum			INT				NOT NULL,
	maximum			INT				NOT NULL,
	
	PRIMARY KEY(location_id)
);

INSERT INTO sqllion_mine(x_pos, y_pos, terrain, minimum, maximum)
VALUES
(-3, 3, "mountains", 421, 734),  (-2, 3, "mountains", 354, 504),  (-1, 3, "mountains", 432, 672),  (0, 3, "mountains", 499, 563),  (1, 3, "plains", 245, 603),     (2, 3, "plains", 134, 576),     (3, 3, "mountains", 680, 821),
(-3, 2, "mountains", 321, 687),  (-2, 2, "mountains", 367, 571),  (-1, 2, "mountains", 521, 542),  (0, 2, "plains", 289, 634),     (1, 2, "plains", 194, 699),     (2, 2, "plains", 214, 543),     (3, 2, "valley", 89, 832),
(-3, 1, "forest", 669, 803),     (-2, 1, "plains", 314, 577),     (-1, 1, "plains", 234, 543),     (0, 1, "plains", 184, 678),     (1, 1, "plains", 273, 504),     (2, 1, "valley", 103, 854),     (3, 1, "plains", 224, 423),
(-3, 0, "forest", 598, 854),     (-2, 0, "forest", 632, 831),     (-1, 0, "plains", 174, 621),     (0, 0, "plains", 200, 522),     (1, 0, "plains", 199, 567),     (2, 0, "valley", 97, 902),      (3, 0, "plains", 256, 621),
(-3, -1, "forest", 630, 864),    (-2, -1, "forest", 602, 831),    (-1, -1, "beach", 34, 365),      (0, -1, "plains", 123, 493),    (1, -1, "plains", 155, 627),    (2, -1, "valley", 111, 867),    (3, -1, "beach", 56, 404),
(-3, -2, "forest", 612, 734),    (-2, -2, "forest", 645, 793),    (-1, -2, "beach", 94, 376),      (0, -2, "beach", 77, 481),      (1, -2, "plains", 290, 643),    (2, -2, "valley", 187, 843),    (3, -2, "beach", 88, 269),
(-3, -3, "beach", 1, 243),    	 (-2, -3, "beach", 24, 345),      (-1, -3, "beach", 101, 314),     (0, -3, "beach", 46, 269),      (1, -3, "beach", 96, 237),      (2, -3, "beach", 12, 287),      (3, -3, "beach", 24, 506);