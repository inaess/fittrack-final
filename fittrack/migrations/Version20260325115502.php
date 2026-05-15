<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260325115502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, couleur VARCHAR(10) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE exercice (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(150) NOT NULL, description LONGTEXT DEFAULT NULL, image_file VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE programme (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, niveau VARCHAR(50) DEFAULT NULL, categorie_id INT DEFAULT NULL, INDEX IDX_3DDCB9FFBCF5E72D (categorie_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE seance (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, duree INT NOT NULL, notes LONGTEXT DEFAULT NULL, programme_id INT DEFAULT NULL, INDEX IDX_DF7DFD0E62BB7AEE (programme_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE seance_exercice (id INT AUTO_INCREMENT NOT NULL, series INT NOT NULL, repetitions INT NOT NULL, poids DOUBLE PRECISION DEFAULT NULL, seance_id INT NOT NULL, exercice_id INT NOT NULL, INDEX IDX_8A34735E3797A94 (seance_id), INDEX IDX_8A3473589D40298 (exercice_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE programme ADD CONSTRAINT FK_3DDCB9FFBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E62BB7AEE FOREIGN KEY (programme_id) REFERENCES programme (id)');
        $this->addSql('ALTER TABLE seance_exercice ADD CONSTRAINT FK_8A34735E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id)');
        $this->addSql('ALTER TABLE seance_exercice ADD CONSTRAINT FK_8A3473589D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE programme DROP FOREIGN KEY FK_3DDCB9FFBCF5E72D');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E62BB7AEE');
        $this->addSql('ALTER TABLE seance_exercice DROP FOREIGN KEY FK_8A34735E3797A94');
        $this->addSql('ALTER TABLE seance_exercice DROP FOREIGN KEY FK_8A3473589D40298');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE exercice');
        $this->addSql('DROP TABLE programme');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE seance_exercice');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
