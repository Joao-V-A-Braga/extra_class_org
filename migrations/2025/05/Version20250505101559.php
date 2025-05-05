<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250505101559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE metrics (id INT AUTO_INCREMENT NOT NULL, classes INT NOT NULL, month_hours DOUBLE PRECISION NOT NULL, status VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, teacher_id INT DEFAULT NULL, approved_by_id INT DEFAULT NULL, rejected_by_id INT DEFAULT NULL, date DATETIME NOT NULL, system_hours DOUBLE PRECISION NOT NULL, declared_hours DOUBLE PRECISION NOT NULL, approved_hours DOUBLE PRECISION NOT NULL, situation VARCHAR(50) NOT NULL, is_approved TINYINT(1) NOT NULL, status VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_794381C641807E1D (teacher_id), INDEX IDX_794381C62D234F6A (approved_by_id), INDEX IDX_794381C6CBF05FC9 (rejected_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE school_subjects (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, classes INT NOT NULL, status VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE teachers (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, classes INT NOT NULL, pending_extra_classes INT NOT NULL, status VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_ED071FF6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE teacher_school_subject (teacher_id INT NOT NULL, school_subject_id INT NOT NULL, INDEX IDX_3E41F84941807E1D (teacher_id), INDEX IDX_3E41F849B79F5C75 (school_subject_id), PRIMARY KEY(teacher_id, school_subject_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review ADD CONSTRAINT FK_794381C641807E1D FOREIGN KEY (teacher_id) REFERENCES teachers (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review ADD CONSTRAINT FK_794381C62D234F6A FOREIGN KEY (approved_by_id) REFERENCES teachers (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review ADD CONSTRAINT FK_794381C6CBF05FC9 FOREIGN KEY (rejected_by_id) REFERENCES teachers (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE teachers ADD CONSTRAINT FK_ED071FF6A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE teacher_school_subject ADD CONSTRAINT FK_3E41F84941807E1D FOREIGN KEY (teacher_id) REFERENCES teachers (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE teacher_school_subject ADD CONSTRAINT FK_3E41F849B79F5C75 FOREIGN KEY (school_subject_id) REFERENCES school_subjects (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE review DROP FOREIGN KEY FK_794381C641807E1D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review DROP FOREIGN KEY FK_794381C62D234F6A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review DROP FOREIGN KEY FK_794381C6CBF05FC9
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE teachers DROP FOREIGN KEY FK_ED071FF6A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE teacher_school_subject DROP FOREIGN KEY FK_3E41F84941807E1D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE teacher_school_subject DROP FOREIGN KEY FK_3E41F849B79F5C75
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE metrics
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE review
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE school_subjects
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE teachers
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE teacher_school_subject
        SQL);
    }
}
