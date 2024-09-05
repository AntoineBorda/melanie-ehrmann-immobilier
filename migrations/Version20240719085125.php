<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240719085125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'First migration';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, offer_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, mime_type VARCHAR(255) NOT NULL, INDEX IDX_C53D045F53C674EE (offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', type VARCHAR(4) NOT NULL, is_closed TINYINT(1) NOT NULL, title VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, zipcode INT DEFAULT NULL, city VARCHAR(50) DEFAULT NULL, district VARCHAR(50) DEFAULT NULL, rent_price INT DEFAULT NULL, rent_charge INT DEFAULT NULL, rent_deposit INT DEFAULT NULL, sale_price_incl_agency_fee INT DEFAULT NULL, sale_price_excl_agency_fee INT DEFAULT NULL, sale_charge INT DEFAULT NULL, property_tax INT DEFAULT NULL, buyer_fee DOUBLE PRECISION DEFAULT NULL, agency_fee INT DEFAULT NULL, inventory_fee INT DEFAULT NULL, has_furniture TINYINT(1) DEFAULT NULL, has_kitchen TINYINT(1) DEFAULT NULL, has_terrain TINYINT(1) DEFAULT NULL, has_terrace TINYINT(1) DEFAULT NULL, has_balcony TINYINT(1) DEFAULT NULL, has_garage TINYINT(1) DEFAULT NULL, has_cave TINYINT(1) DEFAULT NULL, has_parking TINYINT(1) DEFAULT NULL, has_elevator TINYINT(1) DEFAULT NULL, living_space INT DEFAULT NULL, official_space INT DEFAULT NULL, terrain_space INT DEFAULT NULL, floor INT DEFAULT NULL, room INT DEFAULT NULL, bathroom INT DEFAULT NULL, bedroom INT DEFAULT NULL, kitchen_type VARCHAR(20) DEFAULT NULL, heating_type VARCHAR(20) DEFAULT NULL, heating_mode VARCHAR(20) DEFAULT NULL, construction_year INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F53C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F53C674EE');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
