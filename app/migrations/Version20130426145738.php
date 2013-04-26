<?php

namespace app\migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130426145738 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE user_accounts (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) DEFAULT NULL, forgotPasswordKey VARCHAR(255) DEFAULT NULL, resetPasswordKey VARCHAR(255) DEFAULT NULL, salt VARCHAR(255) DEFAULT NULL, authToken VARCHAR(255) DEFAULT NULL, authTokenExpire DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_2A457AACF85E0677 (username), UNIQUE INDEX UNIQ_2A457AACEDF51E90 (authToken), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE useraccount_usergroup (useraccount_id INT NOT NULL, usergroup_id INT NOT NULL, INDEX IDX_BCCA9725D6177343 (useraccount_id), INDEX IDX_BCCA9725D2112630 (usergroup_id), PRIMARY KEY(useraccount_id, usergroup_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE user_providers (id INT AUTO_INCREMENT NOT NULL, user_account_id INT DEFAULT NULL, oauthProvider VARCHAR(255) NOT NULL, oauthUid VARCHAR(255) NOT NULL, INDEX IDX_E2C559F33C0C9956 (user_account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE user_groups (id INT AUTO_INCREMENT NOT NULL, identifier VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_953F224D772E836A (identifier), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE useraccount_usergroup ADD CONSTRAINT FK_BCCA9725D6177343 FOREIGN KEY (useraccount_id) REFERENCES user_accounts (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE useraccount_usergroup ADD CONSTRAINT FK_BCCA9725D2112630 FOREIGN KEY (usergroup_id) REFERENCES user_groups (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE user_providers ADD CONSTRAINT FK_E2C559F33C0C9956 FOREIGN KEY (user_account_id) REFERENCES user_accounts (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE useraccount_usergroup DROP FOREIGN KEY FK_BCCA9725D6177343");
        $this->addSql("ALTER TABLE user_providers DROP FOREIGN KEY FK_E2C559F33C0C9956");
        $this->addSql("ALTER TABLE useraccount_usergroup DROP FOREIGN KEY FK_BCCA9725D2112630");
        $this->addSql("DROP TABLE news");
        $this->addSql("DROP TABLE user_accounts");
        $this->addSql("DROP TABLE useraccount_usergroup");
        $this->addSql("DROP TABLE user_providers");
        $this->addSql("DROP TABLE user_groups");
    }
}
