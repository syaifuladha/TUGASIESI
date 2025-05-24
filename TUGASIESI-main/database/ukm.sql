CREATE DATABASE ukm;
USE ukm;

-- Users table with extended profile information
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    full_name VARCHAR(100),
    nim VARCHAR(20),
    fakultas VARCHAR(100),
    jurusan VARCHAR(100),
    phone VARCHAR(15),
    address TEXT,
    profile_image VARCHAR(255),
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- UKM Categories
CREATE TABLE ukm_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

-- UKM table
CREATE TABLE ukm (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category_id INT,
    description TEXT,
    max_members INT,
    registration_fee DECIMAL(10,2) DEFAULT 0.00,
    status ENUM('Aktif', 'Tidak Aktif') DEFAULT 'Aktif',
    FOREIGN KEY (category_id) REFERENCES ukm_categories(id)
);

-- UKM Memberships/Registrations
CREATE TABLE ukm_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    ukm_id INT,
    registration_number VARCHAR(20) UNIQUE,
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    payment_status ENUM('Unpaid', 'Pending', 'Paid') DEFAULT 'Unpaid',
    payment_proof VARCHAR(255),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    notes TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (ukm_id) REFERENCES ukm(id)
);

-- Update users table to include manager role
ALTER TABLE users 
MODIFY COLUMN role ENUM('admin', 'manager', 'user') DEFAULT 'user';

-- Create default manager account with unhashed password (like admin)
INSERT INTO users (
    username, 
    password, 
    email, 
    full_name, 
    role
) VALUES (
    'manager',
    'manager123',
    'manager@example.com',
    'UKM Manager',
    'manager'
);



-- Insert admin user
INSERT INTO users (username, password, email, full_name, nim, fakultas, jurusan, role) VALUES 
('admin', 'admin123', 'admin@example.com', 'Administrator', '12345678', 'Fakultas Ilmu Komputer', 'Teknik Informatika', 'admin');

-- Insert sample UKM categories
INSERT INTO ukm_categories (name, description) VALUES
('Olahraga', 'Unit Kegiatan Mahasiswa bidang Olahraga'),
('Seni', 'Unit Kegiatan Mahasiswa bidang Seni dan Budaya'),
('Akademik', 'Unit Kegiatan Mahasiswa bidang Akademik');

-- Insert sample UKMs
INSERT INTO ukm (name, category_id, description, max_members, registration_fee) VALUES
('UKM Basket', 1, 'Unit Kegiatan Mahasiswa Basket untuk pengembangan bakat dalam olahraga basket.', 50, 50000),
('UKM Teater', 2, 'Wadah kreativitas mahasiswa dalam seni peran dan drama.', 40, 35000),
('UKM Robotika', 3, 'Pengembangan teknologi robotika dan sistem otomasi.', 30, 75000);
