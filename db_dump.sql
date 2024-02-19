
CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Asus'),
(3, 'Dell'),
(4, 'Nikon'),
(5, 'Samsung'),
(7, 'Motorola'),
(8, 'Intel');


CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Motherboards'),
(3, 'Desktops'),
(4, 'Cameras'),
(5, 'Mobiles');



CREATE TABLE `products` (
  `prd_id` int(100) NOT NULL,
  `prd_cat` int(100) NOT NULL,
  `prd_brand` int(100) NOT NULL,
  `prd_title` varchar(255) NOT NULL,
  `prd_price` int(100) NOT NULL,
  `prd_desc` text NOT NULL,
  `prd_img` text NOT NULL,
  `prd_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



INSERT INTO `products` (`prd_id`, `prd_cat`, `prd_brand`, `prd_title`, `prd_price`, `prd_desc`, `prd_img`, `prd_keyword`) VALUES
(14, 4, 5, 'Samsung webcam', 6500, 'digital webcam with optical zoom', 'xiaomi.png', 'webcam,samsung,camera,samsung camera,cameras'),
(15, 5, 7, 'Motorola maxi m23', 3800, '5 MP Primary Camera\n2 MP Secondary Camera\nDual Sim (GSM + UMTS)\nAndroid v4.4 (KitKat)', 'xiaomi.png', 'motorola mobile,android,motorola,android phone,android mobiles'),
(16, 5, 7, 'Moto-Turbo mx888', 4800, '\nAndroid v4.4.4 OS\nDual Sim (GSM + GSM)\n5 inch HD Screen\n8 MP Primary Camera', 'xiaomi.png', 'motorola mobile,android,motorola,android phone,android mobiles'),
(17, 5, 2, 'Asus568-molixva', 4300, '1 GB RAM\n8 MP Primary Camera\n2 MP Secondary Camera\n1.2 Ghz Quad Core', 'xiaomi.png', 'Asus mobile,android,asus,android phone,android mobiles'),
(20, 2, 2, 'ASUS M5A78L-M LX Motherboard', 3895, 'Form Factor Micro-ATX\r\nSocket type AM3+\r\nAudio Codec Realtec ALC887\r\nBuffered Memory', 'xiaomi.png', 'asus,gaming,raltek,motherboard'),
(23, 4, 4, 'Nikon Coolpix P600  Optical Zoom', 18000, '16.1 Megapixel,\r\ncolor:black,\r\n60X Otical Zoom,\r\nISO 100 to 6400 Senstivity,\r\n3 inch vari Angle Display', 'xiaomi.png', 'nikon,camera,black,zoom,cameras');

ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);


ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`);


ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `products`
  MODIFY `prd_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;


CREATE TABLE cart(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    prd_id int NOT NULL,
    cnt int NOT NULL
) COMMENT '';

CREATE TABLE users(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    email VARCHAR(255),
    password VARCHAR(255)
) COMMENT '';

INSERT INTO `users` (id,email,password) VALUES
(null,'admin@gmail.com','qwerty' );