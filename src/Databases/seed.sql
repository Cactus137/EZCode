-- Your database code here
    -- Path: src/Databases/seed.sql
    -- MySQL
CREATE DATABASE IF NOT EXISTS `ezcode`; USE
    `ezcode`;
CREATE TABLE IF NOT EXISTS `users`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `avatar` VARCHAR(255) NOT NULL,
    `role` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0: User, 1: Admin',
    `status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1: Active, 0: Inactive',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; CREATE TABLE IF NOT EXISTS `categories`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `category_name` VARCHAR(255) NOT NULL,
    `thumnnail` VARCHAR(255) NOT NULL,
    `type` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0: Course, 1: Post',
    PRIMARY KEY(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; CREATE TABLE IF NOT EXISTS `courses`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `course_name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `type` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0: Free, 1: Pro',
    `price` INT(11) NULL DEFAULT 0,
    `status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1: Active, 0: Inactive',
    `thumnail` VARCHAR(255) NOT NULL,
    `register` INT(11) NOT NULL DEFAULT '0',
    `rate` INT(11) NOT NULL DEFAULT '0',
    `category_id` INT(11) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`category_id`) REFERENCES `categories`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; CREATE TABLE IF NOT EXISTS `lessons`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `video_url` VARCHAR(255) NOT NULL,
    `course_id` INT(11) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`course_id`) REFERENCES `courses`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; CREATE TABLE IF NOT EXISTS `enrollments`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `course_id` INT(11) NOT NULL,
    `enroll_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0: Not yet, 1: Learning, 2: Finished',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY(`course_id`) REFERENCES `courses`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; CREATE TABLE IF NOT EXISTS `ratings`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `course_id` INT(11) NOT NULL,
    `rate_value` VARCHAR(255) NOT NULL,
    `note` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY(`course_id`) REFERENCES `courses`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; CREATE TABLE IF NOT EXISTS `payments`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `course_id` INT(11) NOT NULL,
    `payment_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `payment_method` VARCHAR(255) NOT NULL,
    `payment_status` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0: Not yet, 1: Paid',
    `payment_amount` INT(11) NOT NULL,
    `transaction_id` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY(`course_id`) REFERENCES `courses`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `posts`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `thumnail` VARCHAR(255) NOT NULL,
    `status` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0: Draft, 1: Published',
    `published_at` TIMESTAMP NULL DEFAULT NULL,
    `view` INT(11) NOT NULL DEFAULT '0',
    `like` INT(11) NOT NULL DEFAULT '0',
    `dislike` INT(11) NOT NULL DEFAULT '0',
    `comment` INT(11) NOT NULL DEFAULT '0',
    `share` INT(11) NOT NULL DEFAULT '0',
    `category_id` INT(11) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY(`category_id`) REFERENCES `categories`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; CREATE TABLE IF NOT EXISTS `comments`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `lesson_id` INT(11) NULL,
    `post_id` INT(11) NULL,
    `content` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY(`lesson_id`) REFERENCES `lessons`(`id`),
    FOREIGN KEY(`post_id`) REFERENCES `posts`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; INSERT INTO `users`(
    `name`,
    `email`,
    `password`,
    `avatar`,
    `role`,
    `status`
)
VALUES(
    'Admin',
    'admin@gmail.com',
    '12345678',
    'admin.png',
    1,
    1
),(
    'Do Hong Quan',
    'quandohong28@gmail.com',
    '12345678',
    'quandohong28.png',
    0,
    1
),(
    'Test Inactive User',
    'inactive@gmail.com',
    '12345678',
    'inactive.png',
    0,
    0
);
INSERT INTO `categories`(
    `category_name`,
    `thumnnail`,
    `type`
)
VALUES('Laravel', 'laravel.png', 0),('Vue', 'vue.png', 0),('React', 'react.png', 0),('Angular', 'angular.png', 0),('News', 'news.png', 1),('Tips', 'tips.png', 1),('Tricks', 'tricks.png', 1);
INSERT INTO `courses`(
    `course_name`,
    `description`,
    `type`,
    `price`,
    `status`,
    `thumnail`,
    `register`,
    `rate`,
    `category_id`
)
VALUES(
    'Laravel',
    'Laravel is a web application framework with expressive, elegant syntax.',
    1,
    0,
    1,
    'laravel.png',
    0,
    0,
    1
),(
    'Vue',
    'Vue is a progressive framework for building user interfaces.',
    1,
    0,
    1,
    'vue.png',
    0,
    0,
    2
),(
    'React',
    'React is a JavaScript library for building user interfaces.',
    1,
    0,
    1,
    'react.png',
    0,
    0,
    2
),(
    'Angular',
    'Angular is a platform for building mobile and desktop web applications.',
    1,
    0,
    1,
    'angular.png',
    0,
    0,
    2
);
INSERT INTO `lessons`(
    `title`,
    `description`,
    `video_url`,
    `course_id`
)
VALUES(
    'Laravel 7.x',
    'Laravel 7.x',
    'https://www.youtube.com/embed/ImtZ5yENzgE',
    1
),(
    'Vue 3',
    'Vue 3',
    'https://www.youtube.com/embed/4deVCNJq3qc',
    2
),(
    'React 16',
    'React 16',
    'https://www.youtube.com/embed/Ke90Tje7VS0',
    3
),(
    'Angular 9',
    'Angular 9',
    'https://www.youtube.com/embed/3dHNOWTI7H8',
    4
);
INSERT INTO `posts`(
    `user_id`,
    `title`,
    `content`,
    `thumnail`,
    `status`,
    `published_at`,
    `view`,
    `like`,
    `dislike`,
    `comment`,
    `share`,
    `category_id`
)
VALUES(
    1,
    'Laravel 7.x',
    'Laravel 7.x',
    'laravel.png',
    1,
    '2020-06-01 00:00:00',
    0,
    0,
    0,
    0,
    0,
    5
),(
    1,
    'Vue 3',
    'Vue 3',
    'vue.png',
    1,
    '2020-06-01 00:00:00',
    0,
    0,
    0,
    0,
    0,
    6
),(
    1,
    'React 16',
    'React 16',
    'react.png',
    1,
    '2020-06-01 00:00:00',
    0,
    0,
    0,
    0,
    0,
    7
);