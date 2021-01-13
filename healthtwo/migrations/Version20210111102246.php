<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210111102246 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recept (id INT AUTO_INCREMENT NOT NULL, medicijn_id INT NOT NULL, datum DATE NOT NULL, periode VARCHAR(255) NOT NULL, INDEX IDX_B92268A1DFC35CB (medicijn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recept ADD CONSTRAINT FK_B92268A1DFC35CB FOREIGN KEY (medicijn_id) REFERENCES medicijnen (id)');
        $this->addSql('DROP TABLE recepten');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recepten (id INT AUTO_INCREMENT NOT NULL, medicijn_id INT NOT NULL, datum DATE NOT NULL, periode VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_72C1CA2DFC35CB (medicijn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_72C1CA2DFC35CB FOREIGN KEY (medicijn_id) REFERENCES medicijnen (id)');
        $this->addSql('DROP TABLE recept');
    }
}
