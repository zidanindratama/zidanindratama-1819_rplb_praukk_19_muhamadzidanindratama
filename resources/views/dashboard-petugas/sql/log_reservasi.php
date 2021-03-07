CREATE TABLE log_reservasi
(
    id_log INT(10) AUTO_INCREMENT,
    name VARCHAR(100),
    status_lama VARCHAR(100),
    status_baru VARCHAR(100),
    waktu DATE,
    PRIMARY KEY(id_log)
);