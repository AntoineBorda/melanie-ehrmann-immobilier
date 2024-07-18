<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240718193428 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add Offer table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(4) NOT NULL, is_closed TINYINT(1) NOT NULL, title VARCHAR(255) NOT NULL, adress VARCHAR(255) DEFAULT NULL, zipcode INT DEFAULT NULL, city VARCHAR(50) DEFAULT NULL, district VARCHAR(50) DEFAULT NULL, rent_price INT DEFAULT NULL, rent_charge INT DEFAULT NULL, rent_deposit INT DEFAULT NULL, sale_price_incl_agency_fee INT DEFAULT NULL, sale_price_excl_agency_fee INT DEFAULT NULL, sale_charge INT DEFAULT NULL, property_tax INT DEFAULT NULL, buyer_fee DOUBLE PRECISION DEFAULT NULL, agency_fee INT DEFAULT NULL, inventory_fee INT DEFAULT NULL, has_furniture TINYINT(1) DEFAULT NULL, has_kitchen TINYINT(1) DEFAULT NULL, has_terrain TINYINT(1) DEFAULT NULL, has_terrace TINYINT(1) DEFAULT NULL, has_balcony TINYINT(1) DEFAULT NULL, has_garage TINYINT(1) DEFAULT NULL, has_cave TINYINT(1) DEFAULT NULL, has_parking TINYINT(1) DEFAULT NULL, has_elevator TINYINT(1) DEFAULT NULL, living_space INT DEFAULT NULL, official_space INT DEFAULT NULL, terrain_space INT DEFAULT NULL, floor INT DEFAULT NULL, room INT DEFAULT NULL, bathroom INT DEFAULT NULL, bedroom INT DEFAULT NULL, kitchen_type VARCHAR(20) DEFAULT NULL, heating_type VARCHAR(20) DEFAULT NULL, heating_mode VARCHAR(20) DEFAULT NULL, construction_year INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE offer');
    }
}
