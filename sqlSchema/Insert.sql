USE DriveLoc;

-- Insert roles
INSERT INTO roles (role_name) VALUES ('Admin'), ('User');

-- Insert users
INSERT INTO users (nom, prenom, email, password, fk_role_id) VALUES 
('Doe', 'John', 'john.doe@example.com', 'password123', 1),
('Smith', 'Jane', 'jane.smith@example.com', 'password456', 2);

-- Insert categories
INSERT INTO categories (categorie_nom) VALUES ('SUV'), ('Sedan'), ('Truck');

-- Insert vehicules
INSERT INTO vehicules (vehicule_prix, vehicule_disponibilite, vehicule_marque, vehicule_modele, vehicule_annee, fk_user_id, fk_categorie_id) VALUES 
(30000, 'Available', 'Toyota', 'RAV4', 2020, 1, 1),
(25000, 'Available', 'Honda', 'Civic', 2019, 2, 2),
(40000, 'NonAvailable', 'Ford', 'F-150', 2021, 1, 3);

-- Insert reservations
INSERT INTO reservation (reservation_status, reservation_date, reservation_lieux, fk_user_id, fk_vehicule_id) VALUES 
('Pending', '2023-10-01', 'JFK Airport', 2, 1),
('Approuve', '2023-10-02', 'LAX Airport', 1, 2),
('Reject', '2023-10-03', 'ORD Airport', 2, 3);

-- Insert avis
INSERT INTO avis (avis_rating, fk_user_id, fk_vehicule_id) VALUES 
(5, 2, 1),
(4, 1, 2),
(3, 2, 3);
