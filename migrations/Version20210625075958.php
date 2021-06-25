<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210625075958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photograph_category (photograph_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_88028107D8BBBEC7 (photograph_id), INDEX IDX_8802810712469DE2 (category_id), PRIMARY KEY(photograph_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photograph_category ADD CONSTRAINT FK_88028107D8BBBEC7 FOREIGN KEY (photograph_id) REFERENCES photograph (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photograph_category ADD CONSTRAINT FK_8802810712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photograph ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE photograph ADD CONSTRAINT FK_D551C733A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_D551C733A76ED395 ON photograph (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE photograph_category');
        $this->addSql('ALTER TABLE photograph DROP FOREIGN KEY FK_D551C733A76ED395');
        $this->addSql('DROP INDEX IDX_D551C733A76ED395 ON photograph');
        $this->addSql('ALTER TABLE photograph DROP user_id');
    }
}
