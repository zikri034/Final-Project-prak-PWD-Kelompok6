CREATE DATABASE singzone;

USE singzone;

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_date DATE,
    time VARCHAR(50),
    room_type VARCHAR(100),
    people INT,
    payment_method VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
