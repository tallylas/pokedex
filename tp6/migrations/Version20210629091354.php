<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629091354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chasse (id INT AUTO_INCREMENT NOT NULL, pokemon_capture_id INT NOT NULL, dresseur_id INT NOT NULL, lieu_id INT NOT NULL, heure_entrainement DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dresseur (id INT AUTO_INCREMENT NOT NULL, dresseur_id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, coins INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu_capture (id INT AUTO_INCREMENT NOT NULL, lieu_id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon_ref (id INT AUTO_INCREMENT NOT NULL, pokemon_id INT NOT NULL, nom LONGTEXT NOT NULL, courbe_xp LONGTEXT NOT NULL, evolution TINYINT(1) NOT NULL, type1 INT NOT NULL, type2 INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemons_captures (id INT AUTO_INCREMENT NOT NULL, dresseur_id INT NOT NULL, pokemon_id INT NOT NULL, sexe VARCHAR(1) NOT NULL, niveau INT NOT NULL, xp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, pokemon_id INT NOT NULL, dresseur_id INT NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE chasse');
        $this->addSql('DROP TABLE dresseur');
        $this->addSql('DROP TABLE lieu_capture');
        $this->addSql('DROP TABLE pokemon_ref');
        $this->addSql('DROP TABLE pokemons_captures');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE vente');
    }
}
