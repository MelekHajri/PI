<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240508185426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_client (admin_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_9A8C35AC642B8210 (admin_id), INDEX IDX_9A8C35AC19EB6921 (client_id), PRIMARY KEY(admin_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flight (id INT AUTO_INCREMENT NOT NULL, airline VARCHAR(255) NOT NULL, departure DATE NOT NULL, destination VARCHAR(255) NOT NULL, duree INT NOT NULL, place_dispo INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotels (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(255) NOT NULL, prix NUMERIC(10, 3) NOT NULL, nom VARCHAR(255) NOT NULL, chambre_dispo INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payement (id INT AUTO_INCREMENT NOT NULL, payement_total NUMERIC(10, 3) NOT NULL, payement_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom_prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, numtel VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, sexe TINYINT(1) DEFAULT NULL, date_naisssance DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, tour_package_id INT NOT NULL, hotel_id INT DEFAULT NULL, payement_id INT NOT NULL, flight_id INT NOT NULL, type VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATE NOT NULL, INDEX IDX_42C8495519EB6921 (client_id), INDEX IDX_42C849551290BD60 (tour_package_id), INDEX IDX_42C849553243BB18 (hotel_id), UNIQUE INDEX UNIQ_42C84955868C0609 (payement_id), INDEX IDX_42C8495591F478C5 (flight_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, personne_id INT NOT NULL, comment VARCHAR(255) NOT NULL, nom_client VARCHAR(255) NOT NULL, INDEX IDX_794381C6A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour_package (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix NUMERIC(10, 3) NOT NULL, duree INT NOT NULL, place_dispo INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin_client ADD CONSTRAINT FK_9A8C35AC642B8210 FOREIGN KEY (admin_id) REFERENCES `admin` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admin_client ADD CONSTRAINT FK_9A8C35AC19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849551290BD60 FOREIGN KEY (tour_package_id) REFERENCES tour_package (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849553243BB18 FOREIGN KEY (hotel_id) REFERENCES hotels (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955868C0609 FOREIGN KEY (payement_id) REFERENCES payement (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495591F478C5 FOREIGN KEY (flight_id) REFERENCES flight (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_client DROP FOREIGN KEY FK_9A8C35AC642B8210');
        $this->addSql('ALTER TABLE admin_client DROP FOREIGN KEY FK_9A8C35AC19EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849551290BD60');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849553243BB18');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955868C0609');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495591F478C5');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6A21BD112');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE admin_client');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE flight');
        $this->addSql('DROP TABLE hotels');
        $this->addSql('DROP TABLE payement');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE tour_package');
    }
}
