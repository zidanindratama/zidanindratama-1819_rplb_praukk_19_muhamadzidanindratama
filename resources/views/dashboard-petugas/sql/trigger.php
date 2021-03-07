DELIMITER $$
CREATE TRIGGER update_status_reservasi 
    BEFORE UPDATE 
    ON reservations
    FOR EACH ROW 
BEGIN
    INSERT INTO log_reservasi
    set name = OLD.name,
    status_lama=old.status,
    status_baru=new.status,
    waktu = NOW(); 
END$$
DELIMITER ;