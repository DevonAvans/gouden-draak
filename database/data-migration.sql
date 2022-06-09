-- Categories
INSERT INTO `dev_goudendraak`.`categories`(`name`) 
    SELECT DISTINCT(`soortgerecht`) FROM `gouden_draak`.`menu`; 

-- Dishes
INSERT INTO `dev_goudendraak`.`dishes` (`id`, `menu_text`, `name`, `description`, `price`, `category_id`)
    SELECT 
        `id`,
        CONCAT(IFNULL(`menunummer`, ''), IFNULL(`menu_toevoeging`, '')), 
        `naam`,
        `beschrijving`,
        `price`,
        (SELECT `id` FROM `dev_goudendraak`.`categories` WHERE `name` = `soortgerecht`)
    FROM `gouden_draak`.`menu`;

-- Orders
INSERT INTO `dev_goudendraak`.`orders`(`created_at`, `payed_at`)
	SELECT `saleDate`, `saleDate` FROM `gouden_draak`.`sales` GROUP BY `saleDate`;

-- Dishes in orders
INSERT INTO `dev_goudendraak`.`dishes_in_order`(`order_id`, `dish_id`, `amount`, `price`)
    SELECT
        (SELECT `id` FROM `dev_goudendraak`.`orders` WHERE `created_at` = `saleDate`),
        `itemId`,
        `amount`,
        (SELECT `price` FROM `gouden_draak`.`menu` WHERE `id` = `itemId`)
    FROM `gouden_draak`.`sales`;