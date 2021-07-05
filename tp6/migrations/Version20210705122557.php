<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705122557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ref_elementary_type');
        $this->addSql('DROP TABLE ref_pokemon');
        $this->addSql('ALTER TABLE dresseur ADD roles JSON NOT NULL, CHANGE coins coins INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ref_elementary_type (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ref_pokemon (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, evolution TINYINT(1) NOT NULL, starter TINYINT(1) DEFAULT \'0\' NOT NULL, type_courbe_niveau CHAR(1) CHARACTER SET utf8 DEFAULT \'P\' NOT NULL COLLATE `utf8_general_ci`, type_1 INT DEFAULT 0 NOT NULL, type_2 INT DEFAULT 0 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE dresseur DROP roles, CHANGE coins coins INT DEFAULT 5000 NOT NULL');
    }
}
