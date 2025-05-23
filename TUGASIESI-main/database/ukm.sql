-- Create database
CREATE DATABASE IF NOT EXISTS ukm;
USE ukm;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    nim VARCHAR(20) UNIQUE NOT NULL,
    fakultas VARCHAR(100),
    jurusan VARCHAR(100),
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- UKM Categories
CREATE TABLE ukm_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- UKM table
CREATE TABLE ukm (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category_id INT,
    description TEXT,
    icon VARCHAR(50),
    status ENUM('Aktif', 'Tidak Aktif') DEFAULT 'Aktif',
    registration_fee DECIMAL(10,2) DEFAULT 35000.00,
    max_members INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES ukm_categories(id)
);

-- UKM Memberships
CREATE TABLE ukm_memberships (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    ukm_id INT,
    status ENUM('Pending', 'Active', 'Rejected', 'Expired') DEFAULT 'Pending',
    registration_number VARCHAR(20) UNIQUE,
    joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    expired_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (ukm_id) REFERENCES ukm(id)
);

-- Payments
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    membership_id INT,
    amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('QRIS', 'Bank Transfer') NOT NULL,
    payment_status ENUM('Pending', 'Completed', 'Failed') DEFAULT 'Pending',
    transaction_id VARCHAR(100) UNIQUE,
    payment_proof VARCHAR(255),
    bank_name VARCHAR(50),
    account_number VARCHAR(50),
    account_name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    completed_at TIMESTAMP,
    FOREIGN KEY (membership_id) REFERENCES ukm_memberships(id)
);

-- User Interests (for recommendations)
CREATE TABLE user_interests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    category_id INT,
    interest_level INT CHECK (interest_level BETWEEN 1 AND 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES ukm_categories(id)
);

-- UKM Activities
CREATE TABLE ukm_activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ukm_id INT,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    activity_date TIMESTAMP,
    location VARCHAR(200),
    status ENUM('Upcoming', 'Ongoing', 'Completed', 'Cancelled') DEFAULT 'Upcoming',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ukm_id) REFERENCES ukm(id)
);

-- Activity Participants
CREATE TABLE activity_participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    activity_id INT,
    user_id INT,
    attendance_status ENUM('Registered', 'Present', 'Absent') DEFAULT 'Registered',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (activity_id) REFERENCES ukm_activities(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert sample admin user
INSERT INTO users (username, password, email, full_name, nim, fakultas, jurusan, role) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@example.com', 'Administrator', '00000000', 'Admin', 'Admin', 'admin');

-- Insert default categories
INSERT INTO ukm_categories (name, description) VALUES
('Olahraga', 'Kegiatan yang berfokus pada aktivitas fisik dan olahraga'),
('Seni', 'Kegiatan yang berfokus pada pengembangan seni dan budaya'),
('Akademik', 'Kegiatan yang berfokus pada pengembangan akademik dan keilmuan');

-- Insert sample UKMs
INSERT INTO ukm (name, category_id, description, icon, status) VALUES
('UKM Basket', 1, 'Unit Kegiatan Mahasiswa Basket untuk pengembangan bakat dalam olahraga basket.', 'fas fa-basketball-ball', 'Aktif'),
('UKM Teater', 2, 'Wadah kreativitas mahasiswa dalam seni peran dan drama.', 'fas fa-theater-masks', 'Aktif'),
('UKM Robotika', 3, 'Pengembangan teknologi robotika dan sistem otomasi.', 'fas fa-robot', 'Aktif'),
('UKM Fotografi', 2, 'Eksplorasi seni fotografi dan videografi.', 'fas fa-camera-retro', 'Aktif'),
('UKM Pencak Silat', 1, 'Pengembangan bela diri tradisional Indonesia.', 'fas fa-fist-raised', 'Aktif'),
('UKM Programming', 3, 'Pengembangan skill pemrograman dan software development.', 'fas fa-code', 'Aktif');
