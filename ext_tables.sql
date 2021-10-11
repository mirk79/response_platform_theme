#
# Add SQL definition of database tables
#
CREATE TABLE tt_content (
    image_gallery smallint(5) DEFAULT 0 NOT NULL,
    image_caption_position smallint(5) DEFAULT 0 NOT NULL,
    additional_settings mediumtext DEFAULT '' NOT NULL,
);

CREATE TABLE pages (
	pagecolor varchar(50) DEFAULT '' NOT NULL,
);
