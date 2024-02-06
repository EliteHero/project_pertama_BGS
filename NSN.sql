CREATE DATABASE NSN;
USE NSN;

CREATE TABLE user (
    user_id CHAR(11) PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(15) NOT NULL,
    role ENUM('resident', 'security', 'admin') NOT NULL,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE security (
    security_id CHAR(11) PRIMARY KEY,
    user_id CHAR(11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE residents (
    NIK CHAR(16) PRIMARY KEY,
    address VARCHAR(100),
    user_id CHAR(11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE admin (
    admin_id CHAR(11) PRIMARY KEY,
    user_id CHAR(11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE report (
    report_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(30),
    report_description VARCHAR(255),
    report_time DATETIME NOT NULL,
    incident_time DATETIME,
    photo VARCHAR(120),
    record VARCHAR(120),
    video VARCHAR(120),
    status ENUM('Belum ditangani', 'Dalam proses', 'Sudah ditangani', 'Ditangguhkan') NOT NULL,
    NIK CHAR(16),
    response TEXT,
    security_id CHAR(11),
    FOREIGN KEY (NIK) REFERENCES residents(NIK),
    FOREIGN KEY (security_id) REFERENCES security(security_id)
);

CREATE TABLE em_notification (
    notification_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(25) NOT NULL,
    content VARCHAR(50) NOT NULL,
    date_time DATETIME NOT NULL,
    admin_id CHAR(11) NOT NULL,
    FOREIGN KEY (admin_id) REFERENCES admin(admin_id)
);

CREATE TABLE map_mark (
    admin_id CHAR(11) NULL,
    security_id CHAR(11) NULL,
    mark_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    latitude DOUBLE NOT NULL,
    longitude DOUBLE NOT NULL,
    date_time DATETIME NOT NULL,
    mark_color varchar(7) NOT NULL,
    incident_desc TEXT NOT NULL,
    FOREIGN KEY (admin_id) REFERENCES admin(admin_id),
    FOREIGN KEY (security_id) REFERENCES security(security_id)
);

CREATE TABLE reminder (
    reminder_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    content VARCHAR(255) NOT NULL
);

CREATE TABLE manage_reminder (
    reminder_id INT,
    admin_id CHAR(11),
    PRIMARY KEY (reminder_id, admin_id),
    FOREIGN KEY (reminder_id) REFERENCES reminder(reminder_id),
    FOREIGN KEY (admin_id) REFERENCES admin(admin_id)
);

CREATE TABLE post (
    post_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id CHAR(11),
    parent INT,
    date_time DATETIME NOT NULL,
    title VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (parent) REFERENCES post(post_id) ON DELETE CASCADE
);

CREATE TABLE help_ticket (
    ticket_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    admin_id CHAR(11),
    NIK CHAR(16),
    security_id CHAR(11),
    ticketTime DATETIME,
    parent INT,
    title VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    status ENUM('Belum ditangani', 'Dalam proses', 'Sudah ditangani', 'Ditangguhkan') NOT NULL,
    FOREIGN KEY (admin_id) REFERENCES admin(admin_id),
    FOREIGN KEY (NIK) REFERENCES residents(NIK),
    FOREIGN KEY (security_id) REFERENCES security(security_id),
    FOREIGN KEY (parent) REFERENCES help_ticket(ticket_id) ON DELETE CASCADE
);

INSERT INTO `user` (`user_id`, `username`, `password`, `role`, `name`)
VALUES
    ('absar123456', 'absar', 'absar', 'resident', 'Absar Rakha'),
    ('jonathan123', 'jojo', 'jojo', 'resident', 'Jonathan Christian N'),
    ('nurul318273', 'nurul', 'nurul', 'security', 'Nurul Aini'),
    ('bagas291029', 'bagas', 'bagas', 'security', 'Bagas Satrio'),
    ('bowen876543', 'bowen', 'bowen', 'admin', 'Bowen Riandu Siahaan'),
    ('mufasirina5', 'mufa', 'mufa', 'admin', 'Mufasirina Haqulianti');

INSERT INTO `security` (`security_id`, `user_id`)
VALUES
    ('security123', 'nurul318273'),
    ('security456', 'bagas291029');

INSERT INTO `residents` (`NIK`, `address`, `user_id`)
VALUES
    ('1234567890123456', 'medan', 'jonathan123'),
    ('7890123456789012', 'jepang', 'absar123456');

INSERT INTO `admin` (`admin_id`, `user_id`)
VALUES
    ('admin123456', 'bowen876543'),
    ('admin987654', 'mufasirina5');

INSERT INTO `report` (`report_title`, `report_description`, `report_time`, `incident_time`, `response`, `photo`, `record`, `video`, `status`, `NIK`, `security_id`)
VALUES
    ('kebakaran', 'rumah saya kebakaran', '2023-11-11 12:00:00', '2023-01-02 15:30:00', NULL, 'images/photo1.jpg', NULL, 'videos/video1.mp4', 'Belum ditangani', '1234567890123456', NULL),
    (NULL, NULL, '2023-01-03 10:30:00', NULL, NULL, NULL, 'recording/record1.mp3', NULL, 'Dalam proses','7890123456789012', 'security456'),
    ('tanah longsor', 'ada tanah longsor', '2023-12-12 01:00:00', '2023-12-11 13:00:00', 'Kami sudah memasang roadblock', NULL, NULL, NULL, 'Sudah ditangani', '1234567890123456', 'security456');

INSERT INTO `em_notification` (`title`, `content`, `date_time`, `admin_id`)
VALUES
    ('kebakaran', 'rumah terbakar', '2023-01-01 08:00:00', 'admin123456'),
    ('longsor', 'tanah longsor', '2023-01-02 12:30:00', 'admin987654');

INSERT INTO map_mark (admin_id, security_id, mark_id, latitude, longitude, date_time, mark_color, incident_desc)
VALUES
    (NULL, 'security456', 2, 1.110370654676401, 104.09564457629553, '2023-12-14 19:31:00', '#ff0000', 'test'),
    (NULL, 'security456', 4, 1.1106935319668023, 104.09647633831408, '2023-12-13 19:55:00', '#ff0000', 'Kebakaran');


INSERT INTO `reminder` (`content`)
VALUES
    ('images/pengingat1.png'),
    ('images/pengingat2.png'),
    ('images/pengingat3.png');

INSERT INTO `manage_reminder` (`reminder_id`, `admin_id`)
VALUES
    (1, 'admin123456'),
    (2, 'admin987654');

INSERT INTO `post` (`user_id`, `parent`, `date_time`, `title`, `content`)
VALUES
    ('absar123456', NULL, '2023-01-01 16:00:00', 'kebersihan', 'jagalah kebersihan sekitar');
INSERT INTO `post` (`user_id`, `parent`, `date_time`, `title`, `content`)
VALUES
    ('bagas291029', 1, '2023-01-02 11:45:00', 'RE: kebersihan', 'yoi lekku');

INSERT INTO `help_ticket` (`admin_id`, `NIK`, `security_id`,   `ticketTime`, `parent`, `title`, `content`, `status`)
VALUES
    (NULL, '1234567890123456', NULL, '2023-01-01 16:00:00', NULL, 'bug dalam post', 'Help ticket bug post', 'Belum ditangani');
INSERT INTO `help_ticket` (`admin_id`, `NIK`, `security_id`, `ticketTime`, `parent`, `title`, `content`, `status`)
VALUES
    ('admin987654', NULL, NULL, '2023-01-01 16:00:00', 1, 'RE: bug dalam post', 'oke kami tangani', 'Dalam proses');