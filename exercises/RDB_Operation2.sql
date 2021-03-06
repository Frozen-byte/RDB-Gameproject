CREATE TABLE `item` (
	`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` TEXT NOT NULL,
	`size` INT UNSIGNED NOT NULL,
	`value` INT UNSIGNED,
	`weight` INT NOT NULL,
	PRIMARY KEY(id)
);

/*
*	character_to_item 
*   ALTER TABLE `character` CHANGE `ID` `ID` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
*/
CREATE TABLE `inventory` (
	`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`character_id` INT UNSIGNED NOT NULL,
	`item_id` INT UNSIGNED NOT NULL,
	`equipped` BOOLEAN NOT NULL DEFAULT 0,
	FOREIGN KEY (character_id) REFERENCES `character`(ID)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
	FOREIGN KEY(item_id) REFERENCES `item`(ID)
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
