CREATE TABLE gallery_category (
 category_id bigint(20) unsigned NOT NULL auto_increment,
 category_name varchar(50) NOT NULL default '0',
 PRIMARY KEY  (category_id),
 KEY category_id (category_id)
) TYPE=MyISAM;

CREATE TABLE gallery_photos (
 photo_id bigint(20) unsigned NOT NULL auto_increment,
 photo_filename varchar(25),
 photo_caption text,
 photo_category bigint(20) unsigned NOT NULL default '0',
 PRIMARY KEY  (photo_id),
 KEY photo_id (photo_id)
) TYPE=MyISAM;

INSERT INTO gallery_category(`category_name`) VALUES('My Personal Gallery');