<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160904150622 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, user_id INT DEFAULT NULL, dog_id INT DEFAULT NULL, bookingDate DATETIME NOT NULL, bookingTime DATETIME NOT NULL, INDEX IDX_E00CEDDE6BF700BD (status_id), INDEX IDX_E00CEDDEA76ED395 (user_id), INDEX IDX_E00CEDDE634DFEB (dog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services_bookings (booking_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_59B5A0413301C60 (booking_id), INDEX IDX_59B5A041ED5CA9E6 (service_id), PRIMARY KEY(booking_id, service_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE breed (id INT AUTO_INCREMENT NOT NULL, breedName VARCHAR(255) NOT NULL, breedDescription LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_F8AF884F48B90963 (breedName), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, user_id INT DEFAULT NULL, photo_id INT DEFAULT NULL, commentDate DATETIME NOT NULL, commentText LONGTEXT NOT NULL, INDEX IDX_9474526C6BF700BD (status_id), INDEX IDX_9474526CA76ED395 (user_id), INDEX IDX_9474526C7E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dog (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, user_id INT NOT NULL, breed_id INT NOT NULL, image_name VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, sex VARCHAR(255) NOT NULL, age INT NOT NULL, insertDate DATETIME NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_812C397D6BF700BD (status_id), INDEX IDX_812C397DA76ED395 (user_id), INDEX IDX_812C397DA8B4A30F (breed_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dogs_photos (dog_id INT NOT NULL, photo_id INT NOT NULL, INDEX IDX_DD92A991634DFEB (dog_id), INDEX IDX_DD92A9917E9E4C8C (photo_id), PRIMARY KEY(dog_id, photo_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ilike (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, photo_id INT DEFAULT NULL, dateLike DATETIME NOT NULL, INDEX IDX_DF277D8EA76ED395 (user_id), INDEX IDX_DF277D8E7E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, image_name VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_14B784186BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, duration INT NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_E19D9AD26BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, active TINYINT(1) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_ (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, image_name VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, activationDate DATETIME NOT NULL, UNIQUE INDEX UNIQ_265BC90A92FC23A8 (username_canonical), UNIQUE INDEX UNIQ_265BC90AA0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEA76ED395 FOREIGN KEY (user_id) REFERENCES user_ (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id)');
        $this->addSql('ALTER TABLE services_bookings ADD CONSTRAINT FK_59B5A0413301C60 FOREIGN KEY (booking_id) REFERENCES booking (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE services_bookings ADD CONSTRAINT FK_59B5A041ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user_ (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id)');
        $this->addSql('ALTER TABLE dog ADD CONSTRAINT FK_812C397D6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE dog ADD CONSTRAINT FK_812C397DA76ED395 FOREIGN KEY (user_id) REFERENCES user_ (id)');
        $this->addSql('ALTER TABLE dog ADD CONSTRAINT FK_812C397DA8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('ALTER TABLE dogs_photos ADD CONSTRAINT FK_DD92A991634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dogs_photos ADD CONSTRAINT FK_DD92A9917E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ilike ADD CONSTRAINT FK_DF277D8EA76ED395 FOREIGN KEY (user_id) REFERENCES user_ (id)');
        $this->addSql('ALTER TABLE ilike ADD CONSTRAINT FK_DF277D8E7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784186BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD26BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE services_bookings DROP FOREIGN KEY FK_59B5A0413301C60');
        $this->addSql('ALTER TABLE dog DROP FOREIGN KEY FK_812C397DA8B4A30F');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE634DFEB');
        $this->addSql('ALTER TABLE dogs_photos DROP FOREIGN KEY FK_DD92A991634DFEB');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7E9E4C8C');
        $this->addSql('ALTER TABLE dogs_photos DROP FOREIGN KEY FK_DD92A9917E9E4C8C');
        $this->addSql('ALTER TABLE ilike DROP FOREIGN KEY FK_DF277D8E7E9E4C8C');
        $this->addSql('ALTER TABLE services_bookings DROP FOREIGN KEY FK_59B5A041ED5CA9E6');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE6BF700BD');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C6BF700BD');
        $this->addSql('ALTER TABLE dog DROP FOREIGN KEY FK_812C397D6BF700BD');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784186BF700BD');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD26BF700BD');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEA76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE dog DROP FOREIGN KEY FK_812C397DA76ED395');
        $this->addSql('ALTER TABLE ilike DROP FOREIGN KEY FK_DF277D8EA76ED395');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE services_bookings');
        $this->addSql('DROP TABLE breed');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE dog');
        $this->addSql('DROP TABLE dogs_photos');
        $this->addSql('DROP TABLE ilike');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE user_');
    }
}
