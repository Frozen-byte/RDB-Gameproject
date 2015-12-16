-- 1a
INSERT INTO `item`
	(`name`, `size`, `value`, `weight`) 
VALUES
	('Apfel grün', 	10, 1, 	200),
	('Apfel rot', 	10, 1, 	200),
	('Schokolade', 	20, 10, 100),
	('Stirnband', 	5, 	30, 70),
	('Stoffhemd', 	30, 40, 600);


-- 1b
INSERT INTO `inventory`
	(`character_id`, `item_id`)
VALUES
	(153, 1),
	(153, 3),
	(153, 4);


-- 1c
UPDATE `inventory`
SET
	`equipped` = 1
WHERE
	`item_id` = 4;


-- 1d
INSERT INTO `inventory`
	(`character_id`, `item_id`, `equipped`)
VALUES
	(150, 2, 0),
	(150, 5, 1);


--------------------------


-- 2a
SELECT
	`item`.`ID`,
	`name`,
	`equipped`
FROM `item`
LEFT JOIN `inventory`
ON
	`inventory`.`item_id` = `item`.`ID`
WHERE
	`equipped` = 1;


-- 2b 
SELECT 
	`character`.`ID`,
	`character`.`name`,
	COUNT(`inventory`.`ID`) as `item_count` 
FROM `inventory`
LEFT JOIN `character`
ON
	`character`.`ID` = `inventory`.`character_id`
GROUP BY
	`character`.`ID`;


-- 2c
SELECT
	`character`.`name` as `character_name`,
	`character`.`race` as `character_race`,
	`inventory`.`item_id`,
	`item`.`name` as `item_name`
FROM `inventory`
RIGHT JOIN (`character`, `item`)
ON
	`inventory`.`character_id` = `character`.`ID`
	AND
	`inventory`.`item_id` = `item`.`ID`	
WHERE
	`inventory`.`equipped` = 1;


-- 2d
SELECT
	`inventory`.`character_id`,
	`character`.`name`,
	SUM(`item`.`value`) as `estate`
FROM `inventory`
LEFT JOIN (`character`, `item`)
ON
	`inventory`.`character_id` = `character`.`ID`
	AND
	`inventory`.`item_id` = `item`.`ID`
GROUP BY
	`inventory`.`character_id`
ORDER BY
	`estate` DESC
LIMIT 10;