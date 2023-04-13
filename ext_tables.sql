CREATE TABLE tx_wsbooks_domain_model_book (
	title varchar(255) NOT NULL DEFAULT '',
	slug varchar(255) NOT NULL DEFAULT '',
	subtitle varchar(255) NOT NULL DEFAULT '',
	publication_date date DEFAULT NULL,
	isbn varchar(255) NOT NULL DEFAULT '',
	description text,
	preface text,
	table_of_content text,
	abstract text,
	buy_link varchar(255) NOT NULL DEFAULT '',
	cover int(11) unsigned NOT NULL DEFAULT '0',
	sample int(11) unsigned NOT NULL DEFAULT '0',
	series int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_wsbooks_domain_model_series (
	title varchar(255) NOT NULL DEFAULT '',
	slug varchar(255) NOT NULL DEFAULT '',
	description text
);

CREATE TABLE tx_wsbooks_domain_model_book (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE tx_wsbooks_domain_model_series (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);
