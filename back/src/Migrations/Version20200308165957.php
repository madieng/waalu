<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200308165957 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_77E0ED58B03A8386');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ad AS SELECT id, created_by_id, title, description, content, created_at FROM ad');
        $this->addSql('DROP TABLE ad');
        $this->addSql('CREATE TABLE ad (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, created_by_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, description CLOB NOT NULL COLLATE BINARY, content CLOB NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, slug VARCHAR(255) NOT NULL, CONSTRAINT FK_77E0ED58B03A8386 FOREIGN KEY (created_by_id) REFERENCES repairman (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO ad (id, created_by_id, title, description, content, created_at) SELECT id, created_by_id, title, description, content, created_at FROM __temp__ad');
        $this->addSql('DROP TABLE __temp__ad');
        $this->addSql('CREATE INDEX IDX_77E0ED58B03A8386 ON ad (created_by_id)');
        $this->addSql('DROP INDEX IDX_9474526CB03A8386');
        $this->addSql('DROP INDEX IDX_9474526CC9E457F8');
        $this->addSql('CREATE TEMPORARY TABLE __temp__comment AS SELECT id, repairman_id, created_by_id, title, content, created_at FROM comment');
        $this->addSql('DROP TABLE comment');
        $this->addSql('CREATE TABLE comment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, repairman_id INTEGER DEFAULT NULL, created_by_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, content CLOB NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, CONSTRAINT FK_9474526CC9E457F8 FOREIGN KEY (repairman_id) REFERENCES repairman (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9474526CB03A8386 FOREIGN KEY (created_by_id) REFERENCES customer (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO comment (id, repairman_id, created_by_id, title, content, created_at) SELECT id, repairman_id, created_by_id, title, content, created_at FROM __temp__comment');
        $this->addSql('DROP TABLE __temp__comment');
        $this->addSql('CREATE INDEX IDX_9474526CB03A8386 ON comment (created_by_id)');
        $this->addSql('CREATE INDEX IDX_9474526CC9E457F8 ON comment (repairman_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_77E0ED58B03A8386');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ad AS SELECT id, created_by_id, title, description, content, created_at FROM ad');
        $this->addSql('DROP TABLE ad');
        $this->addSql('CREATE TABLE ad (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, created_by_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, description CLOB NOT NULL, content CLOB NOT NULL, created_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO ad (id, created_by_id, title, description, content, created_at) SELECT id, created_by_id, title, description, content, created_at FROM __temp__ad');
        $this->addSql('DROP TABLE __temp__ad');
        $this->addSql('CREATE INDEX IDX_77E0ED58B03A8386 ON ad (created_by_id)');
        $this->addSql('DROP INDEX IDX_9474526CC9E457F8');
        $this->addSql('DROP INDEX IDX_9474526CB03A8386');
        $this->addSql('CREATE TEMPORARY TABLE __temp__comment AS SELECT id, repairman_id, created_by_id, title, content, created_at FROM comment');
        $this->addSql('DROP TABLE comment');
        $this->addSql('CREATE TABLE comment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, repairman_id INTEGER DEFAULT NULL, created_by_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, content CLOB NOT NULL, created_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO comment (id, repairman_id, created_by_id, title, content, created_at) SELECT id, repairman_id, created_by_id, title, content, created_at FROM __temp__comment');
        $this->addSql('DROP TABLE __temp__comment');
        $this->addSql('CREATE INDEX IDX_9474526CC9E457F8 ON comment (repairman_id)');
        $this->addSql('CREATE INDEX IDX_9474526CB03A8386 ON comment (created_by_id)');
    }
}
