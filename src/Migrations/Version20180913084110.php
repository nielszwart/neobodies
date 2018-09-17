<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180913084110 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE physical_test CHANGE bicep_curl_max bicep_curl_max NUMERIC(10, 1) DEFAULT NULL, CHANGE bicep_curl_80 bicep_curl_80 NUMERIC(10, 1) DEFAULT NULL, CHANGE tricep_extension_max tricep_extension_max NUMERIC(10, 1) DEFAULT NULL, CHANGE tricep_extension_80 tricep_extension_80 NUMERIC(10, 1) DEFAULT NULL, CHANGE leg_extension_max leg_extension_max NUMERIC(10, 1) DEFAULT NULL, CHANGE leg_extension_80 leg_extension_80 NUMERIC(10, 1) DEFAULT NULL, CHANGE leg_curl_max leg_curl_max NUMERIC(10, 1) DEFAULT NULL, CHANGE leg_curl_80 leg_curl_80 NUMERIC(10, 1) DEFAULT NULL, CHANGE chest_press_max chest_press_max NUMERIC(10, 1) DEFAULT NULL, CHANGE chest_press_80 chest_press_80 NUMERIC(10, 1) DEFAULT NULL, CHANGE lat_pulley_max lat_pulley_max NUMERIC(10, 1) DEFAULT NULL, CHANGE lat_pulley_80 lat_pulley_80 NUMERIC(10, 1) DEFAULT NULL, CHANGE shoulder_press_max shoulder_press_max NUMERIC(10, 1) DEFAULT NULL, CHANGE shoulder_press_80 shoulder_press_80 NUMERIC(10, 1) DEFAULT NULL, CHANGE waist waist NUMERIC(10, 1) DEFAULT NULL, CHANGE belly belly NUMERIC(10, 1) DEFAULT NULL, CHANGE hip hip NUMERIC(10, 1) DEFAULT NULL, CHANGE upper_arm upper_arm NUMERIC(10, 1) DEFAULT NULL, CHANGE chest chest NUMERIC(10, 1) DEFAULT NULL, CHANGE neck neck NUMERIC(10, 1) DEFAULT NULL, CHANGE upper_leg upper_leg NUMERIC(10, 1) DEFAULT NULL, CHANGE lower_leg lower_leg NUMERIC(10, 1) DEFAULT NULL, CHANGE chin chin NUMERIC(10, 1) DEFAULT NULL, CHANGE cheek cheek NUMERIC(10, 1) DEFAULT NULL, CHANGE armpit_chest armpit_chest NUMERIC(10, 1) DEFAULT NULL, CHANGE tricep tricep NUMERIC(10, 1) DEFAULT NULL, CHANGE bicep bicep NUMERIC(10, 1) DEFAULT NULL, CHANGE back_shoulderblade back_shoulderblade NUMERIC(10, 1) DEFAULT NULL, CHANGE lower_back lower_back NUMERIC(10, 1) DEFAULT NULL, CHANGE torso_upper_right torso_upper_right NUMERIC(10, 1) DEFAULT NULL, CHANGE waist_right waist_right NUMERIC(10, 1) DEFAULT NULL, CHANGE waist_front_right waist_front_right NUMERIC(10, 1) DEFAULT NULL, CHANGE belly_button belly_button NUMERIC(10, 1) DEFAULT NULL, CHANGE knee knee NUMERIC(10, 1) DEFAULT NULL, CHANGE calf calf NUMERIC(10, 1) DEFAULT NULL, CHANGE upper_leg_front upper_leg_front NUMERIC(10, 1) DEFAULT NULL, CHANGE upper_leg_back upper_leg_back NUMERIC(10, 1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE physical_test CHANGE bicep_curl_max bicep_curl_max INT DEFAULT NULL, CHANGE bicep_curl_80 bicep_curl_80 INT DEFAULT NULL, CHANGE tricep_extension_max tricep_extension_max INT DEFAULT NULL, CHANGE tricep_extension_80 tricep_extension_80 INT DEFAULT NULL, CHANGE leg_extension_max leg_extension_max INT DEFAULT NULL, CHANGE leg_extension_80 leg_extension_80 INT DEFAULT NULL, CHANGE leg_curl_max leg_curl_max INT DEFAULT NULL, CHANGE leg_curl_80 leg_curl_80 INT DEFAULT NULL, CHANGE chest_press_max chest_press_max INT DEFAULT NULL, CHANGE chest_press_80 chest_press_80 INT DEFAULT NULL, CHANGE lat_pulley_max lat_pulley_max INT DEFAULT NULL, CHANGE lat_pulley_80 lat_pulley_80 INT DEFAULT NULL, CHANGE shoulder_press_max shoulder_press_max INT DEFAULT NULL, CHANGE shoulder_press_80 shoulder_press_80 INT DEFAULT NULL, CHANGE waist waist INT DEFAULT NULL, CHANGE belly belly INT DEFAULT NULL, CHANGE hip hip INT DEFAULT NULL, CHANGE upper_arm upper_arm INT DEFAULT NULL, CHANGE chest chest INT DEFAULT NULL, CHANGE neck neck INT DEFAULT NULL, CHANGE upper_leg upper_leg INT DEFAULT NULL, CHANGE lower_leg lower_leg INT DEFAULT NULL, CHANGE chin chin INT DEFAULT NULL, CHANGE cheek cheek INT DEFAULT NULL, CHANGE armpit_chest armpit_chest INT DEFAULT NULL, CHANGE tricep tricep INT DEFAULT NULL, CHANGE bicep bicep INT DEFAULT NULL, CHANGE back_shoulderblade back_shoulderblade INT DEFAULT NULL, CHANGE lower_back lower_back INT DEFAULT NULL, CHANGE torso_upper_right torso_upper_right INT DEFAULT NULL, CHANGE waist_right waist_right INT DEFAULT NULL, CHANGE waist_front_right waist_front_right INT DEFAULT NULL, CHANGE belly_button belly_button INT DEFAULT NULL, CHANGE knee knee INT DEFAULT NULL, CHANGE calf calf INT DEFAULT NULL, CHANGE upper_leg_front upper_leg_front INT DEFAULT NULL, CHANGE upper_leg_back upper_leg_back INT DEFAULT NULL');
    }
}
