CREATE TABLE users (
	id BIGSERIAL PRIMARY KEY,
	firstname VARCHAR (30) NOT NULL,
	lastname VARCHAR (30) NOT NULL,
	mobile_number VARCHAR (20) NOT NULL,
	ide_number VARCHAR (15) NOT NULL UNIQUE,
	address TEXT NOT NULL,
	birthdate DATE NULL,
	email VARCHAR (200) NOT NULL UNIQUE,
	password TEXT NOT NULL,
	status BOOLEAN DEFAULT TRUE,
	created_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	updated_at TIMESTAMPTZ NOT NULL DEFAULT now(),
	deleted_at TIMESTAMPTZ NULL
);

INSERT INTO users(firstname, lastname, mobile_number, ide_number,address, email, password )
VALUES ('Neko','Yanten','305126452', '1163036631','calleqwert #22','Neko@y.com','123456');