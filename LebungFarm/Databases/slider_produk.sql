CREATE DATABASE sliderDB;

USE sliderDB;

CREATE TABLE sliders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slider_group INT NOT NULL, -- 1 untuk slider pertama, 2 untuk slider kedua
    image_url VARCHAR(255) NOT NULL
);
