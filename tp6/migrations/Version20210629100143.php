<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629100143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chasse CHANGE pokemon_capture_id pokemon_capture_id INT DEFAULT NULL, CHANGE dresseur_id dresseur_id INT DEFAULT NULL, CHANGE lieu_id lieu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chasse ADD CONSTRAINT FK_7A071956B90C7F93 FOREIGN KEY (pokemon_capture_id) REFERENCES pokemon_ref (id)');
        $this->addSql('ALTER TABLE chasse ADD CONSTRAINT FK_7A071956A1A01CBE FOREIGN KEY (dresseur_id) REFERENCES dresseur (id)');
        $this->addSql('ALTER TABLE chasse ADD CONSTRAINT FK_7A0719566AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu_capture (id)');
        $this->addSql('CREATE INDEX IDX_7A071956B90C7F93 ON chasse (pokemon_capture_id)');
        $this->addSql('CREATE INDEX IDX_7A071956A1A01CBE ON chasse (dresseur_id)');
        $this->addSql('CREATE INDEX IDX_7A0719566AB213CC ON chasse (lieu_id)');
        $this->addSql('ALTER TABLE vente ADD pokemon_capture_id INT DEFAULT NULL, DROP pokemon_id, CHANGE dresseur_id dresseur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CB90C7F93 FOREIGN KEY (pokemon_capture_id) REFERENCES pokemon_ref (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CA1A01CBE FOREIGN KEY (dresseur_id) REFERENCES dresseur (id)');
        $this->addSql('CREATE INDEX IDX_888A2A4CB90C7F93 ON vente (pokemon_capture_id)');
        $this->addSql('CREATE INDEX IDX_888A2A4CA1A01CBE ON vente (dresseur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chasse DROP FOREIGN KEY FK_7A071956B90C7F93');
        $this->addSql('ALTER TABLE chasse DROP FOREIGN KEY FK_7A071956A1A01CBE');
        $this->addSql('ALTER TABLE chasse DROP FOREIGN KEY FK_7A0719566AB213CC');
        $this->addSql('DROP INDEX IDX_7A071956B90C7F93 ON chasse');
        $this->addSql('DROP INDEX IDX_7A071956A1A01CBE ON chasse');
        $this->addSql('DROP INDEX IDX_7A0719566AB213CC ON chasse');
        $this->addSql('ALTER TABLE chasse CHANGE pokemon_capture_id pokemon_capture_id INT NOT NULL, CHANGE dresseur_id dresseur_id INT NOT NULL, CHANGE lieu_id lieu_id INT NOT NULL');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4CB90C7F93');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4CA1A01CBE');
        $this->addSql('DROP INDEX IDX_888A2A4CB90C7F93 ON vente');
        $this->addSql('DROP INDEX IDX_888A2A4CA1A01CBE ON vente');
        $this->addSql('ALTER TABLE vente ADD pokemon_id INT NOT NULL, DROP pokemon_capture_id, CHANGE dresseur_id dresseur_id INT NOT NULL');
    }
}
