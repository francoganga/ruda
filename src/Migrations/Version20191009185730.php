<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191009185730 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE persona (id VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rol_proyecto (id INT AUTO_INCREMENT NOT NULL, proyecto_id VARCHAR(255) DEFAULT NULL, nombre VARCHAR(50) NOT NULL, INDEX IDX_1C480C73F625D1BA (proyecto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE miembro_proyecto (id VARCHAR(255) NOT NULL, proyecto_id VARCHAR(255) DEFAULT NULL, persona_id VARCHAR(255) DEFAULT NULL, rol_proyecto_id INT DEFAULT NULL, INDEX IDX_4C8D984CF625D1BA (proyecto_id), INDEX IDX_4C8D984CF5F88DB9 (persona_id), INDEX IDX_4C8D984CE444958B (rol_proyecto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proyecto (id VARCHAR(255) NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rol_proyecto ADD CONSTRAINT FK_1C480C73F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE miembro_proyecto ADD CONSTRAINT FK_4C8D984CF625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE miembro_proyecto ADD CONSTRAINT FK_4C8D984CF5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
        $this->addSql('ALTER TABLE miembro_proyecto ADD CONSTRAINT FK_4C8D984CE444958B FOREIGN KEY (rol_proyecto_id) REFERENCES rol_proyecto (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE miembro_proyecto DROP FOREIGN KEY FK_4C8D984CF5F88DB9');
        $this->addSql('ALTER TABLE miembro_proyecto DROP FOREIGN KEY FK_4C8D984CE444958B');
        $this->addSql('ALTER TABLE rol_proyecto DROP FOREIGN KEY FK_1C480C73F625D1BA');
        $this->addSql('ALTER TABLE miembro_proyecto DROP FOREIGN KEY FK_4C8D984CF625D1BA');
        $this->addSql('DROP TABLE persona');
        $this->addSql('DROP TABLE rol_proyecto');
        $this->addSql('DROP TABLE miembro_proyecto');
        $this->addSql('DROP TABLE proyecto');
    }
}
