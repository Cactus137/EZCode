-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th1 31, 2024 lúc 03:39 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dtb_ezcode`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'profile.png',
  `role` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `fullname`, `avatar`, `role`, `status`) VALUES
(1, 'Admin EZcode', 'ezcode.cactus@zmail.com', 'admin', 'Cactus Own EZcode', 'profile.jpg', 1, 0),
(2, 'peasterbrook', 'dhartin8@dailymotion.com', 'pwdefault001', 'Adams Bester', 'profile.jpg', 0, 0),
(3, 'kandress', 'lmcsharry9@mac.com', 'pwdefault001', 'Clemmie Siberry', 'profile.jpg', 0, 0),
(4, 'abester', 'mmerdewa@weather.com', 'pwdefault001', 'Darlene Hartin', 'profile.jpg', 0, 0),
(5, 'mmerdewa', 'acasettib@toplist.cz', 'pwdefault001', 'Lorita McSharry', 'profile.jpg', 0, 0),
(6, 'dwellsmanh', 'smuscottc@google.it', 'pwdefault001', 'Angus Casetti', 'profile.jpg', 0, 0),
(7, 'cpophami', 'msindersone@mtv.com', 'pwdefault001', 'Shoshana Muscott', 'profile.jpg', 0, 0),
(8, 'nguyen01', 'nguyen01@gmail.com', '123456', 'Nguyễn Văn A', 'profile.jpg', 0, 0),
(9, 'tran02', 'tran02@gmail.com', '654321', 'Trần Thị B', 'profile.jpg', 0, 0),
(10, 'le03', 'le03@gmail.com', '789012', 'Lê Văn C', 'profile.jpg', 0, 0),
(11, 'pham04', 'pham04@gmail.com', '210987', 'Phạm Thị D', 'profile.jpg', 0, 0),
(12, 'vu05', 'vu05@gmail.com', '345678', 'Vũ Quang E', 'profile.jpg', 0, 0),
(13, 'nguyen06', 'nguyen06@gmail.com', '876543', 'Nguyễn Thị F', 'profile.jpg', 0, 0),
(14, 'tran07', 'tran07@gmail.com', '098765', 'Trần Văn G', 'profile.jpg', 0, 0),
(15, 'le08', 'le08@gmail.com', '567890', 'Lê Thị H', 'profile.jpg', 0, 0),
(16, 'pham09', 'pham09@gmail.com', '432109', 'Phạm Quang I', 'profile.jpg', 0, 0),
(17, 'vu10', 'vu10@gmail.com', '109876', 'Vũ Thị K', 'profile.jpg', 0, 0),
(18, 'vanthanh137', 'blackwhilee04@gmail.com', 'Matkhau123#43w', 'Le Van Thanh', 'cactus.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `thumbnail`, `name`, `created_at`, `status`) VALUES
(1, 'Web programming.jpeg', 'Web programming', '2024-01-30', 0),
(2, 'Mobile programming.jpg', 'Mobile programming\n', '2024-01-15', 0),
(3, 'Programming game.jpeg', 'Programming game\n', '2024-01-18', 0),
(4, 'Embedded programming.jpg', 'Embedded programming\n', '2024-01-13', 0),
(5, 'Basic programming.jpeg', 'Basic programming', '2024-01-12', 0),
(6, 'Advanced programmer.png', 'Advanced programmer\n', '2024-01-10', 0),
(7, 'Object-oriented programming.jpeg', 'Object-oriented programming\n', '2024-01-17', 0),
(8, 'Network programming.jpg', 'Network programming\n', '2024-01-16', 0),
(9, 'Graphics-programming.png', 'Graphics programming', '2024-01-14', 0),
(10, 'Artificial intelligence programming.jpeg', 'Artificial intelligence programming', '2024-01-31', 0),
(137, 'b557cde96b6a485b92ba5dcd7e9edb59.jpg', 'cac', '2024-01-31', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_account` int(11) DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL,
  `rating` double DEFAULT 10,
  `comment` text DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `id_account`, `id_course`, `rating`, `comment`, `created_at`, `status`) VALUES
(3, 1, 3, 4.9, 'Absolutely outstanding course! The depth of content and the clarity of explanations were phenomenal.', '2024-01-24', 0),
(4, 2, 5, 4.5, 'Exceptional material and instruction! I gained valuable insights and found the course highly enriching.', '2024-01-25', 0),
(5, 3, 2, 4.7, 'Incredible learning experience! The instructor\'s expertise and the well-structured material surpassed my expectations.', '2024-01-26', 0),
(6, 7, 2, 4.1, 'Impressive content and delivery! I thoroughly enjoyed the course and found it to be a worthwhile investment.', '2024-01-27', 0),
(7, 9, 1, 4.6, 'Top-notch content and presentation! This course stands out for its in-depth coverage and engaging delivery.', '2024-01-28', 0),
(8, 5, 8, 4.4, 'Fantastic course! The content was both insightful and practical, making the learning experience enjoyable.', '2024-01-29', 0),
(9, 8, 5, 4.3, 'Remarkable learning journey! The course exceeded my expectations, and I would recommend it without hesitation.', '2024-01-30', 0),
(11, 3, 9, 4.5, 'Exceptional material and instruction! I gained valuable insights and found the course highly enriching.', '2024-01-27', 0),
(12, 3, 7, 4.5, 'Exceptional material and instruction! I gained valuable insights and found the course highly enriching.', '2024-01-28', 0),
(13, 9, 4, 4.8, 'Absolutely outstanding course! The depth of content and the clarity of explanations were phenomenal.', '2024-01-29', 0),
(14, 3, 3, 4.7, 'Incredible learning experience! The instructor\'s expertise and the well-structured material surpassed my expectations.', '2024-01-30', 0),
(15, 4, 3, 4.2, 'Highly recommended! The course provided valuable knowledge, and the instructor\'s expertise was evident.', '2024-01-31', 0),
(16, 1, 5, 4.9, 'Absolutely outstanding course! The depth of content and the clarity of explanations were phenomenal.', '2024-02-01', 0),
(17, 3, 9, 4.8, 'Absolutely outstanding course! The depth of content and the clarity of explanations were phenomenal.', '2024-02-02', 0),
(18, 8, 5, 4.3, 'Remarkable learning journey! The course exceeded my expectations, and I would recommend it without hesitation.', '2024-02-03', 0),
(19, 9, 10, 5, 'Absolutely outstanding course! The depth of content and the clarity of explanations were phenomenal.', '2024-02-04', 0),
(20, 4, 2, 4.1, 'Impressive content and delivery! I thoroughly enjoyed the course and found it to be a worthwhile investment.', '2024-02-05', 0),
(21, 3, 6, 4.5, 'Exceptional material and instruction! I gained valuable insights and found the course highly enriching.', '2024-02-06', 0),
(22, 3, 9, 4.4, 'Fantastic course! The content was both insightful and practical, making the learning experience enjoyable.', '2024-01-27', 0),
(23, 7, 7, 4.4, 'Fantastic course! The content was both insightful and practical, making the learning experience enjoyable.', '2024-01-28', 0),
(24, 6, 6, 4.7, 'Incredible learning experience! The instructor\'s expertise and the well-structured material surpassed my expectations.', '2024-01-29', 0),
(25, 9, 10, 4.5, 'Exceptional material and instruction! I gained valuable insights and found the course highly enriching.', '2024-01-30', 0),
(26, 2, 4, 4.5, 'Exceptional material and instruction! I gained valuable insights and found the course highly enriching.', '2024-01-31', 0),
(27, 10, 1, 4.8, 'Absolutely outstanding course! The depth of content and the clarity of explanations were phenomenal.', '2024-02-01', 0),
(28, 4, 5, 4.3, 'Remarkable learning journey! The course exceeded my expectations, and I would recommend it without hesitation.', '2024-02-02', 0),
(29, 6, 4, 4.4, 'Fantastic course! The content was both insightful and practical, making the learning experience enjoyable.', '2024-02-03', 0),
(30, 10, 1, 4.2, 'Highly recommended! The course provided valuable knowledge, and the instructor\'s expertise was evident.', '2024-02-04', 0),
(31, 4, 1, 4.5, 'Exceptional material and instruction! I gained valuable insights and found the course highly enriching.', '2024-02-05', 0),
(32, 9, 1, 4.9, 'Absolutely outstanding course! The depth of content and the clarity of explanations were phenomenal.', '2024-02-06', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `rating` double DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `author` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `name`, `title`, `thumbnail`, `price`, `description`, `rating`, `status`, `author`, `created_at`, `id_category`) VALUES
(1, 'Web programming with HTML, CSS, and JavaScript', 'Learn how to create beautiful and functional websites with HTML, CSS, and JavaScript', 'df_course.jpg', '50', '<h2>What You\'ll Learn:</h2>     <p>This comprehensive course is designed to equip you with the essential skills and knowledge needed to become a proficient web programmer. By the end of the course, you will have a deep understanding of HTML, CSS, and JavaScript — the building blocks of modern web development.</p>      <h2>Course Content:</h2>     <ol>         <li><strong>Introduction to Web Development</strong>             <ul>                 <li>Understanding the Basics</li>                 <li>Overview of the Web Development Landscape</li>             </ul>         </li>         <li><strong>HTML Fundamentals</strong>             <ul>                 <li>Creating the Structure of Web Pages</li>                 <li>Working with Forms and Multimedia</li>             </ul>         </li>         <li><strong>CSS Styling</strong>             <ul>                 <li>Styling HTML Elements</li>                 <li>Responsive Design Techniques</li>             </ul>         </li>         <li><strong>JavaScript Essentials</strong>             <ul>                 <li>Introduction to JavaScript</li>                 <li>DOM Manipulation and Event Handling</li>             </ul>         </li>         <li><strong>Building Interactive Web Pages</strong>             <ul>                 <li>Creating Dynamic Content</li>                 <li>Incorporating JavaScript Libraries</li>             </ul>         </li>     </ol>      <h2>Course Description:</h2>     <p>Embark on a journey into the world of web programming with our \"Web Programming with HTML, CSS, and JavaScript\" course. Whether you\'re a beginner or looking to enhance your skills, this course covers everything you need to know to create visually appealing and interactive websites. From structuring content with HTML to styling with CSS and adding interactivity with JavaScript, you\'ll gain hands-on experience through practical exercises and real-world projects.</p>      <h2>Who This Course is For:</h2>     <ul>         <li>Aspiring Web Developers</li>         <li>Students and Enthusiasts</li>         <li>Professionals seeking to enhance their web programming skills</li>     </ul>      <p>Whether you\'re dreaming of creating your own websites, diving into front-end development, or simply understanding the mechanics of the web, this course is tailored for you. No prior programming experience is required; we\'ll guide you through every step of the way.</p>      <h2>Why Choose This Course:</h2>     <ul>         <li>Practical Hands-on Learning</li>         <li>Comprehensive Coverage of HTML, CSS, and JavaScript</li>         <li>Real-world Projects for Skill Application</li>         <li>Supportive Learning Community</li>     </ul>', 4.5, 0, 'Jackson Henry Taylor\n', '2024-01-22', 1),
(2, 'Mobile programming with Android Studio\n', 'Learn how to develop mobile applications that run on the Android operating system with Android Studio', 'df_course.jpg', '70', '<h2>What You\'ll Learn:</h2>     <p>Explore the exciting world of mobile programming with our \"Mobile Programming with Android Studio\" course. Acquire the skills and knowledge necessary to develop robust and feature-rich Android applications using the powerful Android Studio development environment.</p>      <h2>Course Content:</h2>     <ol>         <li><strong>Introduction to Mobile Programming</strong>             <ul>                 <li>Overview of Mobile Development Platforms</li>                 <li>Introduction to Android Studio</li>             </ul>         </li>         <li><strong>Android App Fundamentals</strong>             <ul>                 <li>Building User Interfaces with XML</li>                 <li>Handling User Input and Events</li>             </ul>         </li>         <li><strong>Working with Activities and Fragments</strong>             <ul>                 <li>Creating and Managing Activities</li>                 <li>Implementing Dynamic UI with Fragments</li>             </ul>         </li>         <li><strong>Data Storage and Retrieval</strong>             <ul>                 <li>Using SQLite Database for Local Storage</li>                 <li>Interacting with RESTful APIs</li>             </ul>         </li>         <li><strong>Advanced Topics in Android Development</strong>             <ul>                 <li>Implementing Location-Based Services</li>                 <li>Integrating Push Notifications</li>             </ul>         </li>     </ol>      <h2>Course Description:</h2>     <p>Embark on a journey to become a skilled Android developer through our \"Mobile Programming with Android Studio\" course. This comprehensive program covers the entire app development lifecycle, from designing user interfaces to implementing advanced features. Whether you\'re a beginner or an experienced programmer, you\'ll benefit from hands-on projects and real-world examples that enhance your proficiency in Android Studio.</p>      <h2>Who This Course is For:</h2>     <ul>         <li>Aspiring Android Developers</li>         <li>Mobile App Enthusiasts</li>         <li>Programmers looking to expand their skill set</li>     </ul>      <p>No prior mobile development experience is required. Whether you have a specific app idea or want to delve into the world of Android app development, this course provides the knowledge and practical skills to bring your ideas to life.</p>      <h2>Why Choose This Course:</h2>     <ul>         <li>Hands-on Projects and Real-world Examples</li>         <li>Comprehensive Coverage of Android Studio</li>         <li>Guidance from Experienced Instructors</li>         <li>Opportunity to Build and Showcase Your Own App</li>     </ul>', 4.2, 0, 'Lucas Harrison Patel\n', '2024-01-22', 2),
(3, 'Game programming with Unity\n', 'Learn how to create 2D and 3D games with Unity, the most popular game programming tool today', 'df_course.jpg', '90', '<h2>What You\'ll Learn:</h2>     <p>Immerse yourself in the exciting world of game development with our \"Game Programming with Unity\" course. Gain the skills and knowledge needed to create captivating and interactive games using the powerful Unity game engine.</p>      <h2>Course Content:</h2>     <ol>         <li><strong>Introduction to Game Development</strong>             <ul>                 <li>Overview of the Game Development Process</li>                 <li>Introduction to the Unity Interface</li>             </ul>         </li>         <li><strong>Unity Basics</strong>             <ul>                 <li>Understanding Scenes and GameObjects</li>                 <li>Working with Unity\'s Physics Engine</li>             </ul>         </li>         <li><strong>Scripting in C# for Unity</strong>             <ul>                 <li>Introduction to C# Programming</li>                 <li>Creating Interactive Gameplay Elements</li>             </ul>         </li>         <li><strong>Game Design Principles</strong>             <ul>                 <li>Creating Engaging Storylines and Characters</li>                 <li>Implementing Game Mechanics and Dynamics</li>             </ul>         </li>         <li><strong>Advanced Unity Features</strong>             <ul>                 <li>Implementing Multiplayer Functionality</li>                 <li>Optimizing and Deploying Games</li>             </ul>         </li>     </ol>      <h2>Course Description:</h2>     <p>Dive into the realm of game development with our \"Game Programming with Unity\" course. Whether you\'re a novice or an experienced coder, this comprehensive program will guide you through the entire game development process using Unity. From creating immersive environments to scripting interactive gameplay, you\'ll acquire the skills needed to bring your game ideas to life.</p>      <h2>Who This Course is For:</h2>     <ul>         <li>Aspiring Game Developers</li>         <li>Programmers Interested in Game Design</li>         <li>Individuals Looking to Enter the Game Industry</li>     </ul>      <p>No prior game development experience is required. Whether you have a specific game concept in mind or simply want to explore the world of game programming, this course provides the foundation and hands-on experience needed to start your game development journey.</p>      <h2>Why Choose This Course:</h2>     <ul>         <li>Hands-on Game Development Projects</li>         <li>Expert Guidance from Industry Professionals</li>         <li>Comprehensive Coverage of Unity Features</li>         <li>Opportunity to Build and Showcase Your Own Game</li>     </ul>', 4.8, 0, 'Noah William Ramirez', '2024-01-22', 3),
(4, 'Embedded programming with Arduino\n', 'Learn to program and control embedded devices with Arduino, an open source hardware platform', 'df_course.jpg', '60', '<h2>What You\'ll Learn:</h2>     <p>Delve into the fascinating world of embedded systems with our \"Embedded Programming with Arduino\" course. Acquire the skills and knowledge necessary to program and control electronic devices using the versatile Arduino microcontroller platform.</p>      <h2>Course Content:</h2>     <ol>         <li><strong>Introduction to Embedded Systems</strong>             <ul>                 <li>Understanding the Basics of Embedded Programming</li>                 <li>Overview of the Arduino Platform</li>             </ul>         </li>         <li><strong>Arduino Basics</strong>             <ul>                 <li>Working with Arduino Boards and IDE</li>                 <li>Programming Fundamentals in C/C++</li>             </ul>         </li>         <li><strong>Sensors and Actuators</strong>             <ul>                 <li>Interfacing with Sensors for Data Acquisition</li>                 <li>Controlling Actuators for Output</li>             </ul>         </li>         <li><strong>Communication Protocols</strong>             <ul>                 <li>Serial Communication with Arduino</li>                 <li>Introduction to I2C and SPI</li>             </ul>         </li>         <li><strong>Arduino Project Development</strong>             <ul>                 <li>Designing and Implementing Embedded Projects</li>                 <li>Troubleshooting and Debugging</li>             </ul>         </li>     </ol>      <h2>Course Description:</h2>     <p>Embark on a journey into the realm of embedded programming with our \"Embedded Programming with Arduino\" course. Whether you\'re a hobbyist, student, or professional, this course provides a hands-on approach to understanding and working with Arduino for embedded applications. From programming basics to real-world projects, you\'ll gain practical skills to create your own embedded systems.</p>      <h2>Who This Course is For:</h2>     <ul>         <li>Electronics Enthusiasts</li>         <li>Students in Electrical Engineering and Computer Science</li>         <li>Professionals in IoT and Embedded Systems</li>     </ul>      <p>No prior embedded programming experience is required. Whether you want to automate your home, build interactive prototypes, or enhance your skills in the field, this course is designed to guide you through the exciting world of embedded systems using Arduino.</p>      <h2>Why Choose This Course:</h2>     <ul>         <li>Hands-on Arduino Programming Exercises</li>         <li>Practical Application of Embedded Concepts</li>         <li>Guidance from Experienced Embedded Programmers</li>         <li>Opportunity to Develop Your Own Embedded Projects</li>     </ul>', 4.1, 0, 'Sophia Gabrielle Lewis\n', '2024-01-22', 4),
(5, 'Basic programming with Python\n', 'Learn to program with Python, a simple and easy to learn programming language', 'df_course.jpg', '40', '<h2>What You\'ll Learn:</h2> <p>Discover the fundamentals of programming with our \"Basic Programming with Python\" course. This beginner-friendly program is designed to introduce you to the world of coding using the versatile and beginner-friendly Python programming language.</p>  <h2>Course Content:</h2> <ol>     <li><strong>Introduction to Programming</strong>         <ul>             <li>Understanding the Basics of Programming Logic</li>             <li>Overview of Python as a Programming Language</li>         </ul>     </li>     <li><strong>Python Syntax and Data Types</strong>         <ul>             <li>Variables, Data Types, and Operations</li>             <li>Control Structures: Conditionals and Loops</li>         </ul>     </li>     <li><strong>Functions and Modular Programming</strong>         <ul>             <li>Defining and Calling Functions</li>             <li>Organizing Code with Modules</li>         </ul>     </li>     <li><strong>Data Structures in Python</strong>         <ul>             <li>Lists, Tuples, and Dictionaries</li>             <li>Working with Sets and Strings</li>         </ul>     </li>     <li><strong>Introduction to File Handling</strong>         <ul>             <li>Reading and Writing Files in Python</li>             <li>Handling Exceptions</li>         </ul>     </li> </ol>  <h2>Course Description:</h2> <p>Embark on your coding journey with our \"Basic Programming with Python\" course. Whether you\'re a complete novice or looking to strengthen your programming foundation, this course covers the essential concepts of programming using Python. From understanding variables and control structures to working with data structures and files, you\'ll gain practical coding skills that form the basis for more advanced programming.</p>  <h2>Who This Course is For:</h2> <ul>     <li>Beginners Interested in Programming</li>     <li>Students in Computer Science and Engineering</li>     <li>Professionals Looking to Learn Python for Basic Programming</li> </ul>  <p>No prior programming experience is required. Whether you\'re interested in automating tasks, analyzing data, or exploring software development, Python is an excellent language to start with, and this course is your gateway to the programming world.</p>  <h2>Why Choose This Course:</h2> <ul>     <li>Hands-on Coding Exercises in Python</li>     <li>Practical Application of Programming Concepts</li>     <li>Supportive Learning Environment</li>     <li>Guidance from Experienced Python Instructors</li> </ul>', 4.3, 0, 'Benjamin Jameson Carter\n', '2024-01-22', 5),
(6, 'Advanced programming with Java\n', 'Learn to program with Java, a powerful and popular programming language', 'df_course.jpg', '80', '<h2>What You\'ll Learn:</h2> <p>Dive into the world of advanced programming with our \"Advanced Programming with Java\" course. This comprehensive program is designed to elevate your Java programming skills and explore advanced concepts for developing robust and scalable applications.</p>  <h2>Course Content:</h2> <ol>     <li><strong>Advanced Java Language Features</strong>         <ul>             <li>Lambda Expressions and Streams</li>             <li>Optional Class and Functional Interfaces</li>         </ul>     </li>     <li><strong>Concurrency in Java</strong>         <ul>             <li>Multi-threading and Thread Pools</li>             <li>Synchronization and Locks</li>         </ul>     </li>     <li><strong>Java Collections Framework</strong>         <ul>             <li>Advanced Usage of Lists, Sets, and Maps</li>             <li>Custom Implementations and Comparator Interface</li>         </ul>     </li>     <li><strong>Design Patterns in Java</strong>         <ul>             <li>Creational, Structural, and Behavioral Patterns</li>             <li>Best Practices for Design Pattern Implementation</li>         </ul>     </li>     <li><strong>Database Connectivity with JDBC</strong>         <ul>             <li>Advanced SQL Operations with Java</li>             <li>Connection Pooling and Batch Processing</li>         </ul>     </li> </ol>  <h2>Course Description:</h2> <p>Elevate your Java programming expertise with our \"Advanced Programming with Java\" course. Whether you\'re an experienced Java developer or looking to deepen your understanding, this course covers advanced language features, concurrency, design patterns, and database connectivity. Gain practical insights and hands-on experience to tackle complex programming challenges.</p>  <h2>Who This Course is For:</h2> <ul>     <li>Experienced Java Developers</li>     <li>Software Engineers Seeking Advanced Java Skills</li>     <li>Professionals Working on Java-Based Applications</li> </ul>  <p>Prerequisites include a strong understanding of Java fundamentals and object-oriented programming concepts. If you\'re ready to take your Java programming to the next level, this course provides the knowledge and tools to excel in advanced Java development.</p>  <h2>Why Choose This Course:</h2> <ul>     <li>In-depth Exploration of Advanced Java Features</li>     <li>Real-world Application of Design Patterns</li>     <li>Hands-on Projects for Practical Experience</li>     <li>Expert Guidance from Java Professionals</li> </ul>', 4.4, 0, 'Emma Charlotte Bennett\n', '2024-01-22', 6),
(7, 'Object-oriented programming with C++\n', 'Learn object-oriented programming with C++, a high-performance and flexible programming language', 'df_course.jpg', '70', '<h2>What You\'ll Learn:</h2> <p>Immerse yourself in the principles of object-oriented programming (OOP) with our \"Object-Oriented Programming with C++\" course. This comprehensive program is designed to equip you with the skills needed to create efficient and modular C++ applications using OOP concepts.</p>  <h2>Course Content:</h2> <ol>     <li><strong>C++ Fundamentals</strong>         <ul>             <li>Basic Syntax and Control Structures</li>             <li>Data Types and Pointers</li>         </ul>     </li>     <li><strong>Object-Oriented Concepts</strong>         <ul>             <li>Classes and Objects</li>             <li>Inheritance and Polymorphism</li>         </ul>     </li>     <li><strong>Encapsulation and Abstraction</strong>         <ul>             <li>Access Modifiers and Information Hiding</li>             <li>Abstract Classes and Interfaces</li>         </ul>     </li>     <li><strong>Operator Overloading</strong>         <ul>             <li>Customizing Operators for User-Defined Types</li>             <li>Friend Functions and Operator Overloading</li>         </ul>     </li>     <li><strong>Advanced C++ Features</strong>         <ul>             <li>Templates and Generic Programming</li>             <li>Exception Handling and Standard Template Library (STL)</li>         </ul>     </li> </ol>  <h2>Course Description:</h2> <p>Master the art of object-oriented programming in C++ with our \"Object-Oriented Programming with C++\" course. Whether you\'re a beginner or looking to enhance your programming skills, this course covers C++ fundamentals and delves deep into OOP concepts such as classes, inheritance, encapsulation, and polymorphism. Develop efficient and maintainable code through hands-on exercises and real-world examples.</p>  <h2>Who This Course is For:</h2> <ul>     <li>Programmers and Developers Seeking OOP Proficiency</li>     <li>Students and Enthusiasts Exploring C++</li>     <li>Professionals Wanting to Expand Their C++ Skills</li> </ul>  <p>No prior experience with C++ or object-oriented programming is required. If you\'re ready to embrace OOP principles and elevate your C++ programming, this course provides a solid foundation and practical insights into OOP with C++.</p>  <h2>Why Choose This Course:</h2> <ul>     <li>Comprehensive Coverage of C++ OOP Principles</li>     <li>Hands-on Exercises for Practical Application</li>     <li>Real-world Examples to Reinforce Concepts</li>     <li>Supportive Learning Environment</li> </ul>', 4.2, 0, 'Olivia Grace Mitchell\n', '2024-01-22', 7),
(8, 'Network programming with Socket\n', 'Learn network programming with Socket, an application programming interface for transmitting and receiving data over the network', 'df_course.jpg', '60', '<h2>What You\'ll Learn:</h2> <p>Explore the world of network programming with our \"Network Programming with Sockets\" course. This comprehensive program is designed to equip you with the skills needed to develop networked applications using socket programming in various programming languages.</p>  <h2>Course Content:</h2> <ol>     <li><strong>Introduction to Network Programming</strong>         <ul>             <li>Overview of Networking Concepts</li>             <li>Understanding the OSI Model</li>         </ul>     </li>     <li><strong>Socket Basics</strong>         <ul>             <li>Introduction to Sockets and Socket Types</li>             <li>Socket Communication Models</li>         </ul>     </li>     <li><strong>Client-Server Architecture</strong>         <ul>             <li>Designing and Implementing Client and Server Applications</li>             <li>Socket Connection and Communication</li>         </ul>     </li>     <li><strong>Socket Programming in Python</strong>         <ul>             <li>Creating Sockets and Establishing Connections</li>             <li>Handling Data Streams with Python Sockets</li>         </ul>     </li>     <li><strong>Socket Programming in Java</strong>         <ul>             <li>Developing Networked Applications with Java Sockets</li>             <li>Handling Concurrent Connections</li>         </ul>     </li> </ol>  <h2>Course Description:</h2> <p>Immerse yourself in the fundamentals of network programming with our \"Network Programming with Sockets\" course. Whether you\'re a developer, system administrator, or networking enthusiast, this course covers essential networking concepts and dives into the practical aspects of socket programming. Learn to design and implement client-server applications in Python and Java, and gain the skills to create your networked solutions.</p>  <h2>Who This Course is For:</h2> <ul>     <li>Software Developers and Programmers</li>     <li>System Administrators Interested in Networking</li>     <li>Networking Enthusiasts and Students</li> </ul>  <p>No prior experience with network programming is required. If you\'re looking to expand your knowledge of networking and develop hands-on skills in socket programming, this course provides a solid foundation and practical insights into building networked applications.</p>  <h2>Why Choose This Course:</h2> <ul>     <li>Hands-on Socket Programming Exercises</li>     <li>Practical Application of Networking Concepts</li>     <li>Guidance from Experienced Instructors</li>     <li>Real-world Examples and Case Studies</li> </ul>', 4, 0, 'Ethan Alexander Porter\n', '2024-01-22', 8),
(9, 'Graphics programming with OpenGL\n', 'Learn how to program graphics with OpenGL, an application programming interface for creating 2D and 3D graphics effects', 'df_course.jpg', '80', '<h2>What You\'ll Learn:</h2> <p>Embark on a creative journey into graphics programming with our \"Graphics Programming with OpenGL\" course. This comprehensive program is designed to provide you with the skills needed to create stunning visualizations and interactive graphics using the OpenGL graphics library.</p>  <h2>Course Content:</h2> <ol>     <li><strong>Introduction to Graphics Programming</strong>         <ul>             <li>Understanding Graphics Pipelines</li>             <li>Overview of OpenGL and its Applications</li>         </ul>     </li>     <li><strong>OpenGL Basics</strong>         <ul>             <li>Setting Up an OpenGL Environment</li>             <li>OpenGL Rendering and Coordinate Systems</li>         </ul>     </li>     <li><strong>2D Graphics with OpenGL</strong>         <ul>             <li>Drawing Basic Shapes and Primitives</li>             <li>Working with Textures and Shaders</li>         </ul>     </li>     <li><strong>3D Graphics with OpenGL</strong>         <ul>             <li>Creating 3D Models and Scenes</li>             <li>Implementing Lighting and Shading Effects</li>         </ul>     </li>     <li><strong>Interactive Graphics and User Input</strong>         <ul>             <li>Handling Mouse and Keyboard Input</li>             <li>Implementing Animation and Interaction</li>         </ul>     </li> </ol>  <h2>Course Description:</h2> <p>Unlock the power of graphics programming with our \"Graphics Programming with OpenGL\" course. Whether you\'re an aspiring game developer, computer graphics enthusiast, or software engineer, this course covers the essentials of OpenGL and provides hands-on experience in creating visually appealing graphics. Learn to render 2D and 3D graphics, implement shaders, and add interactivity to your applications.</p>  <h2>Who This Course is For:</h2> <ul>     <li>Game Developers and Enthusiasts</li>     <li>Computer Graphics Enthusiasts</li>     <li>Software Engineers Interested in Graphics Programming</li> </ul>  <p>No prior experience with OpenGL is required. If you\'re passionate about creating captivating visual experiences and want to delve into the world of graphics programming, this course offers a solid foundation and practical skills to bring your ideas to life.</p>  <h2>Why Choose This Course:</h2> <ul>     <li>Hands-on Graphics Programming Projects</li>     <li>Comprehensive Coverage of OpenGL Features</li>     <li>Real-world Application of Graphics Concepts</li>     <li>Expert Guidance from Graphics Professionals</li> </ul>', 4.6, 0, 'Ava Marie Anderson\n', '2024-01-22', 9),
(10, 'Artificial intelligence programming with TensorFlow', 'Learn to program artificial intelligence with TensorFlow, an open source software platform for building machine learning and deep learning models', 'df_course.jpg', '100', '<h2>What You\'ll Learn:</h2> <p>Dive into the realm of artificial intelligence with our \"Artificial Intelligence Programming with TensorFlow\" course. This comprehensive program is designed to equip you with the skills needed to build and deploy machine learning models using the powerful TensorFlow framework.</p>  <h2>Course Content:</h2> <ol>     <li><strong>Introduction to Artificial Intelligence</strong>         <ul>             <li>Overview of Machine Learning and Deep Learning</li>             <li>Applications of Artificial Intelligence</li>         </ul>     </li>     <li><strong>TensorFlow Basics</strong>         <ul>             <li>Setting Up TensorFlow Environment</li>             <li>TensorFlow Data Structures and Operations</li>         </ul>     </li>     <li><strong>Building Neural Networks</strong>         <ul>             <li>Designing and Training Neural Networks</li>             <li>Activation Functions and Model Optimization</li>         </ul>     </li>     <li><strong>Deep Learning with TensorFlow</strong>         <ul>             <li>Implementing Convolutional Neural Networks (CNNs)</li>             <li>Recurrent Neural Networks (RNNs) and Long Short-Term Memory (LSTM)</li>         </ul>     </li>     <li><strong>TensorFlow for Natural Language Processing (NLP)</strong>         <ul>             <li>Text Processing and Sentiment Analysis</li>             <li>Word Embeddings and Sequence-to-Sequence Models</li>         </ul>     </li> </ol>  <h2>Course Description:</h2> <p>Embark on a journey into artificial intelligence programming with our \"Artificial Intelligence Programming with TensorFlow\" course. Whether you\'re a data scientist, software engineer, or AI enthusiast, this course covers the fundamentals of machine learning and deep learning using TensorFlow. Learn to build and deploy models for image recognition, natural language processing, and more.</p>  <h2>Who This Course is For:</h2> <ul>     <li>Data Scientists and Analysts</li>     <li>Software Engineers Interested in AI</li>     <li>AI Enthusiasts and Researchers</li> </ul>  <p>No prior experience with TensorFlow is required, but a basic understanding of machine learning concepts is beneficial. If you\'re eager to delve into the world of artificial intelligence and harness the power of TensorFlow, this course provides a solid foundation and practical skills for AI development.</p>  <h2>Why Choose This Course:</h2> <ul>     <li>Hands-on Machine Learning Projects</li>     <li>Real-world Application of TensorFlow in AI</li>     <li>Expert Guidance from AI Professionals</li>     <li>Practical Insights into Deep Learning Techniques</li> </ul>', 4.9, 0, 'Isabella Rose Nguyen\n', '2024-01-22', 10),
(50, 'Photoshop ADV', 'Photoshop adv 24 days', 'afdsa.jpg', '300', 'Photoshop adv 24 days', 0, 0, 'Le Thanh', '2024-01-31', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `code_invoice` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_account` int(11) DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `issue_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `code_invoice`, `id_account`, `id_course`, `email`, `issue_date`, `total_price`) VALUES
(3, 'INV-001', 1, 1, 'nguyen01@gmail.com', '2024-01-22 07:19:36', 500000),
(4, 'INV-002', 2, 2, 'tran02@gmail.com', '2024-01-22 07:19:36', 700000),
(5, 'INV-003', 3, 3, 'le03@gmail.com', '2024-01-22 07:19:36', 900000),
(6, 'INV-004', 4, 4, 'pham04@gmail.com', '2024-01-22 07:19:36', 600000),
(7, 'INV-005', 5, 5, 'vu05@gmail.com', '2024-01-22 07:19:36', 400000),
(8, 'INV-006', 6, 6, 'nguyen06@gmail.com', '2024-01-22 07:19:36', 800000),
(9, 'INV-007', 7, 7, 'tran07@gmail.com', '2024-01-22 07:19:36', 700000),
(10, 'INV-008', 8, 8, 'le08@gmail.com', '2024-01-22 07:19:36', 600000),
(11, 'INV-009', 9, 9, 'pham09@gmail.com', '2024-01-22 07:19:36', 800000),
(12, 'INV-010', 10, 10, 'vu10@gmail.com', '2024-01-22 07:19:36', 1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `id_course` int(11) DEFAULT NULL,
  `num_lesson` int(11) NOT NULL,
  `lesson_title` varchar(255) NOT NULL,
  `lesson_content` text DEFAULT NULL,
  `link_source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`id`, `id_course`, `num_lesson`, `lesson_title`, `lesson_content`, `link_source`) VALUES
(1, 1, 1, 'Introduction to HTML', 'HTML is a markup language used to create hyperlinked text, used to build web pages.', 'https://www.youtube.com/embed/qz0aGYrrlhU?si=fkb_vGA2t524-kzV'),
(2, 1, 2, 'Basic HTML Tags', 'HTML tags are keywords enclosed in angle brackets, used to format content on a web page.', 'https://www.youtube.com/embed/rOPKC49gTkk?si=5vQ_1sOIwRzzIAtU'),
(3, 2, 1, 'Introduction to AndrIntroduction to HTMLoid Studio', 'Android Studio is an integrated development environment (IDE) for Android developers.', 'https://www.youtube.com/embed/wXUhTZpF_HQ?si=Sw1_sjGu5d1xnQIJ'),
(4, 2, 2, 'Creating a Simple Android App', 'This lesson will guide you on creating a simple Android app using Android Studio.', 'https://www.youtube.com/embed/EOfCEhWq8sg?si=Nap0v0f0ShgfyaSc'),
(5, 3, 1, 'Introduction to Unity', 'Unity is a game programming tool that allows you to create 2D and 3D games for various platforms.', 'https://www.youtube.com/embed/XtQMytORBmM?si=ccL4GZ2vw_HRdf6L'),
(6, 3, 2, 'Creating a Simple Shooting Game with Unity', 'This lesson will guide you on creating a simple shooting game with Unity, covering interface design, adding characters, adding weapons, and adding enemies.', 'https://www.youtube.com/embed/OFXvvuxqPNQ?si=x-lUJsYkv9jSAxtJ'),
(7, 4, 1, 'Introduction to Arduino', 'Arduino is an open-source hardware platform for programming and controlling embedded devices.', 'https://www.youtube.com/embed/1ENiVwk8idM?si=jKi3D0zrzG7fHp14'),
(8, 4, 2, 'Making a Blinking LED with Arduino', 'This lesson will guide you on making a blinking LED with Arduino, including connecting an LED to Arduino, writing Arduino code, and uploading the code to Arduino.', 'https://www.youtube.com/embed/I0ZIrzoI61g?si=Wym3sxFBfa50YINK'),
(9, 5, 1, 'Introduction to Python', 'Python is a simple and easy-to-learn programming language with clear and clean syntax.', 'https://www.youtube.com/embed/kqtD5dpn9C8?si=QtCmsiiZp5w208RA'),
(10, 5, 2, 'Basic Data Types in Python', 'Basic data types in Python include numbers, strings, lists, sets, and dictionaries.', 'https://www.youtube.com/embed/ppsCxnNm-JI?si=fpFXtCx56o9_LHKz'),
(11, 6, 1, 'Introduction to Java', 'Java is a powerful and widely-used programming language that can run on various platforms.', 'https://www.youtube.com/embed/VHbSopMyc4M?si=gjPSOvFVQoHXXzXH'),
(12, 6, 2, 'Data Types and Variables in Java', 'Data types and variables in Java are fundamental concepts for storing and manipulating data in a program.', 'https://www.youtube.com/embed/so1iUWaLmKA?si=GJS1ZN02wfBRbpJM'),
(13, 7, 1, 'Introduction to C++', 'C++ is a high-performance and versatile programming language that supports object-oriented programming, procedural programming, and template programming.', 'https://www.youtube.com/embed/OTroAxvRNbw?si=LZ6G8KnWp6jfageX'),
(14, 7, 2, 'Classes and Objects in C++', 'Classes and objects in C++ are core concepts of object-oriented programming, allowing you to create source code units with encapsulation, inheritance, and polymorphism.', 'https://www.youtube.com/embed/JaSy-Z1u7AY?si=XVCks9n5tKKPeg-a'),
(15, 8, 1, 'Introduction to Sockets', 'A socket is an application programming interface for sending and receiving data over a network using TCP/IP protocols.', 'https://www.youtube.com/embed/uagKTbohimU?si=e10YZjYIH9PDWs3l'),
(16, 8, 2, 'Creating a Simple Chat Application with Sockets', 'This lesson will guide you on creating a simple chat application with sockets, covering connection setup, sending and receiving messages, and handling exceptions.', 'https://www.youtube.com/embed/LD7q0ZgvDs8?si=Dq0xo8vNPnOzqJiA'),
(17, 9, 1, 'Introduction to OpenGL', 'OpenGL is an application programming interface for creating 2D and 3D graphics effects, widely used in graphics applications, games, and virtual reality.', 'https://www.youtube.com/embed/45MIykWJ-C4?si=6SS0dguyUzCtdgUI'),
(18, 9, 2, 'Drawing a Triangle with OpenGL', 'This lesson will guide you on drawing a triangle with OpenGL, including window initialization, setting up transformation matrices, and drawing the vertices of the triangle.', 'https://www.youtube.com/embed/6u1FkksyNCk?si=gILl2NnsbCOc1To0'),
(19, 10, 1, 'Introduction to TensorFlow', 'TensorFlow is an open-source software platform for building machine learning and deep learning models, developed by the Google Brain Team.', 'https://www.youtube.com/embed/tPYj3fFJGjk?si=STFiRYi0FAHBNeHz'),
(20, 10, 2, 'Creating a Neural Network for Handwritten Digit Recognition with TensorFlow', 'This lesson will guide you on creating a neural network for handwritten digit recognition with TensorFlow, covering data loading and preprocessing, model building and training, and evaluation and prediction.', 'https://www.youtube.com/embed/bte8Er0QhDg?si=wGJm9-q7XryTw_VL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qa_pairs`
--

CREATE TABLE `qa_pairs` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_course` (`id_course`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_course` (`id_course`);

--
-- Chỉ mục cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course` (`id_course`);

--
-- Chỉ mục cho bảng `qa_pairs`
--
ALTER TABLE `qa_pairs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `qa_pairs`
--
ALTER TABLE `qa_pairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`);

--
-- Các ràng buộc cho bảng `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`);

--
-- Các ràng buộc cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;