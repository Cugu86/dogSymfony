<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160904145717 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE breed (id INT AUTO_INCREMENT NOT NULL, breedName VARCHAR(255) NOT NULL, breedDescription LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_F8AF884F48B90963 (breedName), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dog ADD breed_id INT NOT NULL');
        $this->addSql('ALTER TABLE dog ADD CONSTRAINT FK_812C397DA8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('CREATE INDEX IDX_812C397DA8B4A30F ON dog (breed_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dog DROP FOREIGN KEY FK_812C397DA8B4A30F');
        $this->addSql('DROP TABLE breed');
        $this->addSql('DROP INDEX IDX_812C397DA8B4A30F ON dog');
        $this->addSql('ALTER TABLE dog DROP breed_id');
    }
}
