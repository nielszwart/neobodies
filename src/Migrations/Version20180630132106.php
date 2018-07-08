<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180630132106 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, profile_id INT DEFAULT NULL, genblueprint_id INT DEFAULT NULL, date_created DATETIME NOT NULL, date_confirmed DATETIME DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, postcode VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, free TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_7D3656A4A76ED395 (user_id), UNIQUE INDEX UNIQ_7D3656A4CCFA12B8 (profile_id), UNIQUE INDEX UNIQ_7D3656A4C9B7EE2E (genblueprint_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer (question VARCHAR(255) NOT NULL, genblueprint_id INT NOT NULL, green TINYINT(1) NOT NULL, blue TINYINT(1) NOT NULL, red TINYINT(1) NOT NULL, INDEX IDX_DADD4A25C9B7EE2E (genblueprint_id), PRIMARY KEY(genblueprint_id, question)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genblueprint (id INT AUTO_INCREMENT NOT NULL, date_changed DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, account_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, total_price NUMERIC(10, 2) NOT NULL, payment_method VARCHAR(255) DEFAULT NULL, payment_provider_id VARCHAR(255) DEFAULT NULL, date_created DATETIME NOT NULL, UNIQUE INDEX UNIQ_E52FFDEEFCDF7870 (payment_provider_id), INDEX IDX_E52FFDEE9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_line (id INT AUTO_INCREMENT NOT NULL, order_id INT DEFAULT NULL, product_id INT DEFAULT NULL, price NUMERIC(10, 2) NOT NULL, amount INT NOT NULL, size VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, INDEX IDX_9CE58EE18D9F6D38 (order_id), INDEX IDX_9CE58EE14584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT NOT NULL, locale VARCHAR(10) NOT NULL, slug VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, content LONGTEXT DEFAULT NULL, slide TINYINT(1) NOT NULL, slide_title VARCHAR(255) DEFAULT NULL, slide_text LONGTEXT DEFAULT NULL, button_text VARCHAR(255) DEFAULT NULL, slide_image VARCHAR(255) DEFAULT NULL, header VARCHAR(255) DEFAULT NULL, footer VARCHAR(255) DEFAULT NULL, call_to_action VARCHAR(255) DEFAULT NULL, call_to_action_link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id, locale)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE physical_test (id INT AUTO_INCREMENT NOT NULL, genblueprint_id INT DEFAULT NULL, bicep_curl_max INT DEFAULT NULL, bicep_curl_80 INT DEFAULT NULL, tricep_extension_max INT DEFAULT NULL, tricep_extension_80 INT DEFAULT NULL, leg_extension_max INT DEFAULT NULL, leg_extension_80 INT DEFAULT NULL, leg_curl_max INT DEFAULT NULL, leg_curl_80 INT DEFAULT NULL, chest_press_max INT DEFAULT NULL, chest_press_80 INT DEFAULT NULL, lat_pulley_max INT DEFAULT NULL, lat_pulley_80 INT DEFAULT NULL, shoulder_press_max INT DEFAULT NULL, shoulder_press_80 INT DEFAULT NULL, waist INT DEFAULT NULL, belly INT DEFAULT NULL, hip INT DEFAULT NULL, upper_arm INT DEFAULT NULL, chest INT DEFAULT NULL, neck INT DEFAULT NULL, upper_leg INT DEFAULT NULL, lower_leg INT DEFAULT NULL, chin INT DEFAULT NULL, cheek INT DEFAULT NULL, armpit_chest INT DEFAULT NULL, tricep INT DEFAULT NULL, bicep INT DEFAULT NULL, back_shoulderblade INT DEFAULT NULL, lower_back INT DEFAULT NULL, torso_upper_right INT DEFAULT NULL, waist_right INT DEFAULT NULL, waist_front_right INT DEFAULT NULL, belly_button INT DEFAULT NULL, knee INT DEFAULT NULL, calf INT DEFAULT NULL, upper_leg_front INT DEFAULT NULL, upper_leg_back INT DEFAULT NULL, UNIQUE INDEX UNIQ_BCE493C0C9B7EE2E (genblueprint_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, price NUMERIC(10, 2) NOT NULL, image VARCHAR(255) DEFAULT NULL, ebook VARCHAR(255) DEFAULT NULL, video VARCHAR(255) DEFAULT NULL, has_genblueprint TINYINT(1) NOT NULL, is_clothing TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, date_changed DATETIME NOT NULL, city_of_birth VARCHAR(255) DEFAULT NULL, birth_time VARCHAR(255) DEFAULT NULL, weight INT DEFAULT NULL, height INT DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, gender_open LONGTEXT DEFAULT NULL, feeling VARCHAR(255) DEFAULT NULL, last_sport VARCHAR(255) DEFAULT NULL, limits VARCHAR(255) DEFAULT NULL, limits_open LONGTEXT DEFAULT NULL, complaints VARCHAR(255) DEFAULT NULL, complaints_open LONGTEXT DEFAULT NULL, fysio VARCHAR(255) DEFAULT NULL, fysio_open LONGTEXT DEFAULT NULL, psychic_limits VARCHAR(255) DEFAULT NULL, psychic_limits_open LONGTEXT DEFAULT NULL, psychotherapy VARCHAR(255) DEFAULT NULL, psychotherapy_open LONGTEXT DEFAULT NULL, eating VARCHAR(255) DEFAULT NULL, eating_open LONGTEXT DEFAULT NULL, operations VARCHAR(255) DEFAULT NULL, operations_open LONGTEXT DEFAULT NULL, medication VARCHAR(255) DEFAULT NULL, medication_open LONGTEXT DEFAULT NULL, sleep_well TINYINT(1) DEFAULT NULL, not_falling_asleep TINYINT(1) DEFAULT NULL, awake_often TINYINT(1) DEFAULT NULL, hard_to_awaken TINYINT(1) DEFAULT NULL, easy_to_relax TINYINT(1) DEFAULT NULL, single TINYINT(1) DEFAULT NULL, living_together TINYINT(1) DEFAULT NULL, married TINYINT(1) DEFAULT NULL, children TINYINT(1) DEFAULT NULL, nine_till_five TINYINT(1) DEFAULT NULL, responsibilities TINYINT(1) DEFAULT NULL, shift_work TINYINT(1) DEFAULT NULL, shift_work_nights TINYINT(1) DEFAULT NULL, freelancer TINYINT(1) DEFAULT NULL, three_breaks TINYINT(1) DEFAULT NULL, jobless TINYINT(1) DEFAULT NULL, temporary_jobless TINYINT(1) DEFAULT NULL, stress_family TINYINT(1) DEFAULT NULL, stress_work TINYINT(1) DEFAULT NULL, daily_traffic_jam TINYINT(1) DEFAULT NULL, want_change_life TINYINT(1) DEFAULT NULL, walking TINYINT(1) DEFAULT NULL, no_full_agenda TINYINT(1) DEFAULT NULL, yoga TINYINT(1) DEFAULT NULL, meditate TINYINT(1) DEFAULT NULL, hobbies VARCHAR(255) DEFAULT NULL, hobbies_open LONGTEXT DEFAULT NULL, no_supplements TINYINT(1) DEFAULT NULL, multivitamins TINYINT(1) DEFAULT NULL, protein_shakes TINYINT(1) DEFAULT NULL, omega_3 TINYINT(1) DEFAULT NULL, other_supplements TINYINT(1) DEFAULT NULL, other_supplements_open LONGTEXT DEFAULT NULL, no_bread TINYINT(1) DEFAULT NULL, some_bread TINYINT(1) DEFAULT NULL, daily_bread TINYINT(1) DEFAULT NULL, some_fat_fish TINYINT(1) DEFAULT NULL, often_fat_fish TINYINT(1) DEFAULT NULL, no_fat_fish TINYINT(1) DEFAULT NULL, only_other_fish TINYINT(1) DEFAULT NULL, seaweed TINYINT(1) DEFAULT NULL, eat_out_often TINYINT(1) DEFAULT NULL, vegetarian TINYINT(1) DEFAULT NULL, allergies VARCHAR(255) DEFAULT NULL, allergies_open LONGTEXT DEFAULT NULL, intolerance VARCHAR(255) DEFAULT NULL, intolerance_open LONGTEXT DEFAULT NULL, bloated TINYINT(1) DEFAULT NULL, full TINYINT(1) DEFAULT NULL, farting TINYINT(1) DEFAULT NULL, burping TINYINT(1) DEFAULT NULL, stomach_acid TINYINT(1) DEFAULT NULL, digestion_open LONGTEXT DEFAULT NULL, swollen_belly TINYINT(1) DEFAULT NULL, obstipation TINYINT(1) DEFAULT NULL, diarrea TINYINT(1) DEFAULT NULL, sported_often TINYINT(1) DEFAULT NULL, group_lessons TINYINT(1) DEFAULT NULL, strength_training TINYINT(1) DEFAULT NULL, cardio_training TINYINT(1) DEFAULT NULL, sports_open LONGTEXT DEFAULT NULL, diet VARCHAR(255) DEFAULT NULL, diet_open LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tool (id INT NOT NULL, locale VARCHAR(10) NOT NULL, title VARCHAR(255) DEFAULT NULL, content LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, file VARCHAR(255) DEFAULT NULL, new_tab TINYINT(1) NOT NULL, PRIMARY KEY(id, locale)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(151) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(151) NOT NULL, is_active TINYINT(1) NOT NULL, role VARCHAR(20) NOT NULL, forgot_password_token VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4C9B7EE2E FOREIGN KEY (genblueprint_id) REFERENCES genblueprint (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25C9B7EE2E FOREIGN KEY (genblueprint_id) REFERENCES genblueprint (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE18D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE14584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE physical_test ADD CONSTRAINT FK_BCE493C0C9B7EE2E FOREIGN KEY (genblueprint_id) REFERENCES genblueprint (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE9B6B5FBA');
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A4C9B7EE2E');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25C9B7EE2E');
        $this->addSql('ALTER TABLE physical_test DROP FOREIGN KEY FK_BCE493C0C9B7EE2E');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE18D9F6D38');
        $this->addSql('ALTER TABLE order_line DROP FOREIGN KEY FK_9CE58EE14584665A');
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A4CCFA12B8');
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A4A76ED395');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE genblueprint');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE order_line');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE physical_test');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE tool');
        $this->addSql('DROP TABLE user');
    }
}
