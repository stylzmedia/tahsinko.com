## Project Name: Matrix

## 29 May 22
ALTER TABLE `pages` ADD `breadcrumb_title` VARCHAR(255) NULL DEFAULT NULL AFTER `template`;
ALTER TABLE `pages` ADD `is_color` TINYINT(4) NULL DEFAULT '1' AFTER `breadcrumb_title`;
ALTER TABLE `pages` ADD `breadcrumb_background` VARCHAR(255) NULL DEFAULT NULL AFTER `is_color`;

ALTER TABLE `home_sections` ADD `background_image` VARCHAR(255) NULL DEFAULT NULL AFTER `background_color`;
ALTER TABLE `home_sections` ADD `is_background_color` TINYINT(4) NULL DEFAULT '1' AFTER `background_image`;


#30-06-2022
update in live server
1. user table update
2. add roles and permission table


