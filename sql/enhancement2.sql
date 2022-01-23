--Query 1
INSERT INTO `clients`(`clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `comment`) VALUES ('Tony','Stark','tony@starkent.com','Iam1ronM@n','"I am the real Ironman"');


--Query 2
UPDATE `clients` SET `clientLevel` = 3 WHERE `clientEmail` = 'tony@starkent.com';

--Query 3
UPDATE `inventory` SET `invDescription` = REPLACE (`invDescription`, "small interior", "spacious interior") WHERE `invModel` = "Hummer";


--Query 4
SELECT `invModel`,`classificationName` FROM `inventory` INNER JOIN `carclassification` ON `inventory`. `classificationId` = `carclassification`. `classificationId` WHERE `inventory`. `classificationId` = 1;

--Query 5
DELETE FROM `inventory` WHERE `invModel` = 'Wrangler' AND `invModel`= 'Wrangler';

--Query 6
UPDATE `inventory` SET `invImage` = CONCAT('/phpmotors', `invImage`), `invThumbnail` = CONCAT('/phpmotors', `invThumbnail`);