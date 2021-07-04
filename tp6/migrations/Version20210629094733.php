<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629094733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dresseur_pokemon_ref (dresseur_id INT NOT NULL, pokemon_ref_id INT NOT NULL, INDEX IDX_FEB72B3CA1A01CBE (dresseur_id), INDEX IDX_FEB72B3C4D5E3DFD (pokemon_ref_id), PRIMARY KEY(dresseur_id, pokemon_ref_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dresseur_pokemon_ref ADD CONSTRAINT FK_FEB72B3CA1A01CBE FOREIGN KEY (dresseur_id) REFERENCES dresseur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dresseur_pokemon_ref ADD CONSTRAINT FK_FEB72B3C4D5E3DFD FOREIGN KEY (pokemon_ref_id) REFERENCES pokemon_ref (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE dresseur_pokemon_ref');
    }
}
