create view v_user_reservations as
SELECT users.id, users.name, reservations.no_meja, reservations.keterangan, reservations.status 
FROM users
INNER JOIN reservations
ON users.id = reservations.user_id; 