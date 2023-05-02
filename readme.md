## Project Name: TAHSINKO



ALTER TABLE `products` CHANGE `video` `video` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;




ALTER TABLE `portfolios` ADD `stop_opening` VARCHAR(255) NULL DEFAULT NULL AFTER `client_name`;
ALTER TABLE `portfolios` CHANGE `client_name` `lift_type` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `portfolios` CHANGE `description` `description` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `portfolios` CHANGE `product_id` `product_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL;




https://codepen.io/petegarvin1/pen/YzWBbRx


ALTER TABLE `pages` ADD `pdf_file` VARCHAR(191) NULL DEFAULT NULL AFTER `description`;
