<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629094045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokemons_captures_pokemon_ref DROP FOREIGN KEY FK_626DB3073B31F126');
        $this->addSql('DROP TABLE pokemons_captures');
        $this->addSql('DROP TABLE pokemons_captures_pokemon_ref');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokemons_captures (id INT AUTO_INCREMENT NOT NULL, dresseur_id INT NOT NULL, sexe VARCHAR(1) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, niveau INT NOT NULL, xp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pokemons_captures_pokemon_ref (pokemons_captures_id INT NOT NULL, pokemon_ref_id INT NOT NULL, INDEX IDX_626DB3073B31F126 (pokemons_captures_id), INDEX IDX_626DB3074D5E3DFD (pokemon_ref_id), PRIMARY KEY(pokemons_captures_id, pokemon_ref_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pokemons_captures_pokemon_ref ADD CONSTRAINT FK_626DB3073B31F126 FOREIGN KEY (pokemons_captures_id) REFERENCES pokemons_captures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokemons_captures_pokemon_ref ADD CONSTRAINT FK_626DB3074D5E3DFD FOREIGN KEY (pokemon_ref_id) REFERENCES pokemon_ref (id) ON DELETE CASCADE');
    }
}
