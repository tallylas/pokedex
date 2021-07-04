<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629095837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokemon_ref CHANGE type1 type1 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pokemon_ref ADD CONSTRAINT FK_BEF5AC87C1E2A98C FOREIGN KEY (type1) REFERENCES type (id)');
        $this->addSql('ALTER TABLE pokemon_ref ADD CONSTRAINT FK_BEF5AC8758EBF836 FOREIGN KEY (type2) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_BEF5AC87C1E2A98C ON pokemon_ref (type1)');
        $this->addSql('CREATE INDEX IDX_BEF5AC8758EBF836 ON pokemon_ref (type2)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokemon_ref DROP FOREIGN KEY FK_BEF5AC87C1E2A98C');
        $this->addSql('ALTER TABLE pokemon_ref DROP FOREIGN KEY FK_BEF5AC8758EBF836');
        $this->addSql('DROP INDEX IDX_BEF5AC87C1E2A98C ON pokemon_ref');
        $this->addSql('DROP INDEX IDX_BEF5AC8758EBF836 ON pokemon_ref');
        $this->addSql('ALTER TABLE pokemon_ref CHANGE type1 type1 INT NOT NULL');
    }
}
