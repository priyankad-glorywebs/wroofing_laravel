-- Adminer 4.8.1 MySQL 8.0.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `contractors`;
CREATE TABLE `contractors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contractor_portfolio` json DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `contractors` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `contact_number`, `profile_image`, `zip_code`, `company_name`, `contractor_portfolio`, `facebook_id`, `google_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(40,	'Monika',	'monika@example.com',	'2024-01-02 04:28:23',	'$2y$12$YQvmLg8FxaM.23/Bim6QFOUlJGhUfy7ca0WrzLMive3ptGpHbl/4m',	NULL,	NULL,	'4654646545644',	'uploads/contractor_profile/1706678094_8.png',	NULL,	'',	'[]',	NULL,	NULL,	'2024-01-30 23:44:55',	'2024-01-30 23:44:55',	NULL,	NULL),
(41,	'Monika',	'monika@example.com',	NULL,	'$2y$12$UPQp2XEMkiitbq65IKnaEuo1TaUui1qLROHfQGfFYnYGmZL07tkrS',	NULL,	NULL,	'76456465464',	'uploads/contractor_profile/1706678291_8.png',	NULL,	'',	'[]',	NULL,	NULL,	'2024-01-30 23:48:11',	'2024-01-30 23:48:11',	NULL,	NULL),
(42,	'rootdjhasgdj',	'bdhjwasb@vdjhaa.sbkj',	NULL,	'$2y$12$qAIVozISjD5fEBeWinbvMesRdEzgpKpnIry5YBWof47ZC3k5OtgmO',	NULL,	NULL,	'4654564654545',	'uploads/contractor_profile/1706678370_8.png',	NULL,	'',	'[\"uploads/contractor_portfolio/1706678370_8.png\", \"uploads/contractor_portfolio/1706678370_9.png\"]',	NULL,	NULL,	'2024-01-30 23:49:31',	'2024-01-30 23:49:31',	NULL,	NULL);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2024_01_05_122054_create_password_resets_table',	1),
(6,	'2024_01_08_072119_create_contractors_table',	1),
(9,	'2024_01_11_171914_create_project_documents_table',	2);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `project_documents`;
CREATE TABLE `project_documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint unsigned NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_keys` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_documents_project_id_foreign` (`project_id`),
  KEY `project_documents_created_by_foreign` (`created_by`),
  KEY `project_documents_updated_by_foreign` (`updated_by`),
  CONSTRAINT `project_documents_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `project_documents_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  CONSTRAINT `project_documents_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `project_documents` (`id`, `project_id`, `document_name`, `document_file`, `file_keys`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(304,	52,	'insurancedocuments',	'project_documents_laststage/aBL17065025678.png',	NULL,	'2024-01-25 01:40:26',	'2024-01-28 22:59:27',	1,	1),
(306,	52,	'contractordocuments',	'project_documents_laststage/31P170650262787B04EEB-58C7-457A-8C5A-9185113E2D67 copy.jpg',	NULL,	'2024-01-25 01:40:26',	'2024-01-28 23:00:27',	1,	1),
(309,	52,	'documents',	'project_documents_laststage/VsR17065028832023_12_22_10_08_04.pdf',	NULL,	'2024-01-25 05:10:08',	'2024-01-28 23:04:43',	1,	1),
(310,	53,	'documents',	'project_documents_laststage/sWr17061814987.png',	NULL,	'2024-01-25 05:48:18',	'2024-01-25 05:48:18',	17,	17),
(311,	53,	'insurancedocuments',	'project_documents_laststage/9Gu17061814989.png',	NULL,	'2024-01-25 05:48:18',	'2024-01-25 05:48:18',	17,	17),
(312,	53,	'mortgagedocuments',	'project_documents_laststage/oib17061814988.png',	NULL,	'2024-01-25 05:48:18',	'2024-01-25 05:48:18',	17,	17),
(314,	53,	'contractordocuments',	'project_documents_laststage/tcV17061828456433378_face_joy_of_tears_with_icon.png',	NULL,	'2024-01-25 06:10:45',	'2024-01-25 06:10:45',	17,	17),
(322,	54,	'insurancedocuments',	'project_documents_laststage/eLJ17061857178.png',	NULL,	'2024-01-25 06:58:37',	'2024-01-25 06:58:37',	17,	17),
(323,	54,	'mortgagedocuments',	'project_documents_laststage/Me417061857179.png',	NULL,	'2024-01-25 06:58:37',	'2024-01-25 06:58:37',	17,	17),
(324,	54,	'contractordocuments',	'project_documents_laststage/0mV17061857171EC0D3CF-D69E-4F99-9C1A-4CA1639D2035 copy.jpg',	NULL,	'2024-01-25 06:58:37',	'2024-01-25 06:58:37',	17,	17),
(326,	54,	'documents',	'project_documents_laststage/VEx17061859608.png',	NULL,	'2024-01-25 07:02:40',	'2024-01-25 07:02:40',	17,	17),
(329,	52,	'mortgagedocuments',	'project_documents_laststage/RQP17065035629.png',	NULL,	'2024-01-28 23:16:02',	'2024-01-28 23:16:02',	1,	1),
(330,	55,	'documents',	'project_documents_laststage/BB917065051639.png',	NULL,	'2024-01-28 23:42:43',	'2024-01-28 23:42:43',	1,	1),
(331,	55,	'insurancedocuments',	'project_documents_laststage/yaR17065051638.png',	NULL,	'2024-01-28 23:42:43',	'2024-01-28 23:42:43',	1,	1),
(332,	55,	'mortgagedocuments',	'project_documents_laststage/aJe17065051638.png',	NULL,	'2024-01-28 23:42:43',	'2024-01-28 23:42:43',	1,	1),
(333,	55,	'contractordocuments',	'project_documents_laststage/PEh17065051638.png',	NULL,	'2024-01-28 23:42:43',	'2024-01-28 23:42:43',	1,	1),
(334,	59,	'documents',	'project_documents_laststage/CBp17065964888.png',	NULL,	'2024-01-30 01:04:48',	'2024-01-30 01:04:48',	1,	1),
(335,	59,	'insurancedocuments',	'project_documents_laststage/aZN170659648881E94738-71CC-489D-86C6-75F341E6B884 copy (1).jpg',	NULL,	'2024-01-30 01:04:48',	'2024-01-30 01:04:48',	1,	1),
(336,	59,	'mortgagedocuments',	'project_documents_laststage/UEY17065964887.png',	NULL,	'2024-01-30 01:04:48',	'2024-01-30 01:04:48',	1,	1),
(337,	59,	'contractordocuments',	'project_documents_laststage/pIF17065964888.png',	NULL,	'2024-01-30 01:04:48',	'2024-01-30 01:04:48',	1,	1),
(338,	57,	'documents',	'project_documents_laststage/ctG17066009259.png',	NULL,	'2024-01-30 02:18:45',	'2024-01-30 02:18:45',	1,	1),
(339,	57,	'insurancedocuments',	'project_documents_laststage/n6R17066009259.png',	NULL,	'2024-01-30 02:18:45',	'2024-01-30 02:18:45',	1,	1),
(340,	57,	'mortgagedocuments',	'project_documents_laststage/vRc17066009259.png',	NULL,	'2024-01-30 02:18:45',	'2024-01-30 02:18:45',	1,	1),
(341,	57,	'contractordocuments',	'project_documents_laststage/6xn17066009257.png',	NULL,	'2024-01-30 02:18:45',	'2024-01-30 02:18:45',	1,	1),
(342,	62,	'documents',	'project_documents_laststage/yoe1706681095FbJ170616892781E94738-71CC-489D-86C6-75F341E6B884 copy.jpg',	NULL,	'2024-01-31 00:34:55',	'2024-01-31 00:34:55',	1,	1),
(346,	61,	'documents',	'project_documents_laststage/gj21706681466FbJ170616892781E94738-71CC-489D-86C6-75F341E6B884 copy.jpg',	NULL,	'2024-01-31 00:41:06',	'2024-01-31 00:41:06',	1,	1),
(347,	62,	'contractordocuments',	'project_documents_laststage/5Cl1706681490oib17061814988.png',	NULL,	'2024-01-31 00:41:30',	'2024-01-31 00:41:30',	1,	1),
(348,	62,	'insurancedocuments',	'project_documents_laststage/lU61706682201sWr17061814987.png',	NULL,	'2024-01-31 00:53:21',	'2024-01-31 00:53:21',	1,	1),
(349,	62,	'mortgagedocuments',	'project_documents_laststage/wSt1706682214Nuy17061814987.png',	NULL,	'2024-01-31 00:53:34',	'2024-01-31 00:53:34',	1,	1);

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_image` json DEFAULT NULL,
  `roofandgutterdesign` text COLLATE utf8mb4_unicode_ci,
  `rooftypeandrating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guttertypeaccessories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guttertypeaccessories1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_agency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mortgage_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_status` enum('Approve','Request','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Request',
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `updated_by` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_user_id_foreign` (`user_id`),
  CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `projects` (`id`, `title`, `project_image`, `roofandgutterdesign`, `rooftypeandrating`, `guttertypeaccessories`, `guttertypeaccessories1`, `user_id`, `name`, `address`, `insurance_company`, `insurance_agency`, `billing`, `mortgage_company`, `project_status`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(52,	'test',	'[\"1706512665_OrF_8.png\"]',	NULL,	NULL,	NULL,	NULL,	1,	'Test',	'Test',	'tset',	'test',	'test',	'test',	'Request',	0,	'2024-01-25 01:38:10',	'2024-01-29 01:47:45',	1,	1),
(53,	'Test Project',	'[\"1706180163_gL2_8.png\", \"1706180163_EwU_8.png\", \"1706180163_nov_1EC0D3CF-D69E-4F99-9C1A-4CA1639D2035 copy.jpg\", \"1706184500_Mm0_8.png\"]',	NULL,	NULL,	NULL,	NULL,	17,	'Test Project',	'Test Address',	'Test',	'tset',	'test',	'test',	'Request',	0,	'2024-01-25 05:02:54',	'2024-01-25 06:38:20',	17,	17),
(54,	'TEST DATA',	'[\"1706185459_7CB_9.png\"]',	NULL,	NULL,	NULL,	NULL,	17,	'TEST DATA',	'Test',	'tstrt',	'fdhtg',	'fdhwg',	'gjdhg',	'Request',	0,	'2024-01-25 06:54:04',	'2024-01-25 06:54:19',	17,	17),
(55,	'roof project1',	'[\"1706505146_ueX_7.png\", \"1706505146_PsO_8.png\", \"1706505146_gdO_9.png\", \"1706505146_Gvo_87B04EEB-58C7-457A-8C5A-9185113E2D67 copy (1).jpg\"]',	NULL,	NULL,	NULL,	NULL,	1,	'roof project1',	'Roof',	'Roof project1',	'Roof Project1',	'Roof Project 1',	'Roof Project 1',	'Request',	0,	'2024-01-28 23:41:45',	'2024-01-28 23:42:26',	1,	1),
(56,	'TEST!!!',	NULL,	NULL,	NULL,	NULL,	NULL,	1,	'TEST!!!',	'TEST',	'TEST',	'test',	'test',	'test',	'Request',	0,	'2024-01-29 01:48:10',	'2024-01-29 01:50:08',	1,	1),
(57,	'TEST1111',	'[\"1706600913_drb_9.png\"]',	NULL,	NULL,	NULL,	NULL,	1,	'TEST1111',	'djwn',	'\'dsqaBDB',	'BKDWS',	'BMSQA',	'NDJKWS,',	'Request',	0,	'2024-01-29 02:32:48',	'2024-01-30 02:18:33',	1,	1),
(58,	'TESTS',	NULL,	NULL,	NULL,	NULL,	NULL,	1,	'TESTS',	NULL,	NULL,	NULL,	NULL,	NULL,	'Request',	0,	'2024-01-30 00:54:38',	'2024-01-30 00:54:38',	1,	1),
(59,	'Test333',	'[\"1706596515_XD8_9.png\"]',	NULL,	NULL,	NULL,	NULL,	1,	'Test333',	'rbkjmebrjke',	'rfehkj',	'bfjkedks',	'nde,sja',	'nfesd',	'Request',	0,	'2024-01-30 01:04:09',	'2024-01-30 01:05:43',	1,	1),
(60,	'Test555',	'[]',	NULL,	NULL,	NULL,	NULL,	1,	'Test555',	'tetsr',	'TEST',	'test',	'test',	'test',	'Request',	0,	'2024-01-30 22:45:26',	'2024-01-30 22:50:54',	1,	1),
(61,	'TEST122',	'[]',	NULL,	NULL,	NULL,	NULL,	1,	'TEST122',	NULL,	NULL,	NULL,	NULL,	NULL,	'Request',	0,	'2024-01-31 00:27:46',	'2024-01-31 04:53:47',	1,	1),
(62,	'abc',	'[\"1706682264_abA_Nuy17061814987.png\", \"1706682264_DJa_9Gu17061814989.png\"]',	NULL,	NULL,	NULL,	NULL,	1,	'abc',	'test',	'd',	're',	'd',	'r',	'Request',	0,	'2024-01-31 00:29:51',	'2024-01-31 00:54:24',	1,	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contractor_portfolio` text COLLATE utf8mb4_unicode_ci,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `updated_by` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `contact_number`, `profile_image`, `zip_code`, `company_name`, `contractor_portfolio`, `facebook_id`, `google_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1,	'Anil',	'anil.test341@gmail.com',	'2024-01-18 04:09:14',	'$2y$12$SKaZtJfk7JTUXOeuILF3ZeH6dUJV.ijbEMvVO/8c5rFIBfa6n6xoa',	'Active',	'qcX5rMcBKo8fjo1VAGyoiWqOLOdWj0vi912qvv0JS9ldYlpEXoA4T5NwKx3a',	'9876452365',	'uploads/customer_profile/1705570601.png',	'675423',	NULL,	NULL,	NULL,	NULL,	'2024-01-18 04:06:41',	'2024-01-18 04:09:14',	0,	0),
(2,	'anil',	'anil.test34@gmail.com',	NULL,	'$2y$12$F.gNGNi.vkvHcBNpXJbKoud0hJFHjDsRkyJJPfsHYTKolDEGB.9BK',	'Active',	NULL,	'42424242424',	'uploads/customer_profile/1705995662.png',	'434335553',	NULL,	NULL,	NULL,	NULL,	'2024-01-23 02:11:02',	'2024-01-23 02:11:02',	0,	0),
(3,	'anil',	'anil.test3412@gmail.com',	'2024-01-23 02:13:33',	'$2y$12$J4LCa4NU9e65HAI0WRbTg.OP23v0wtithbhyLvyVLabRF0twRdWBm',	'Active',	NULL,	'435353533653',	'uploads/customer_profile/1705995783.png',	'4423434',	NULL,	NULL,	NULL,	NULL,	'2024-01-23 02:13:03',	'2024-01-23 02:13:33',	0,	0),
(4,	'test',	'test@example.com',	'2024-01-23 02:59:44',	'$2y$12$Osw.3lAHVHn9.wJ2BkzrUuEG6hzMXVkpz6wCOo8qsgi3QlD1mUG9O',	'Active',	NULL,	'69873653658736',	'customer_profile1705998569.png',	'564378',	NULL,	NULL,	NULL,	NULL,	'2024-01-23 02:59:29',	'2024-01-23 02:59:44',	0,	0),
(5,	'priyanka',	'priyanka@gmail.com',	NULL,	'$2y$12$EFdr/foqF9G3HvJXwthEHOYtsNkiHxzIfMxhZU2pZs4rfMRS6B62u',	'Active',	NULL,	'6876786868686',	'customer_profile/1706003152.png',	'7686868',	NULL,	NULL,	NULL,	NULL,	'2024-01-23 04:15:52',	'2024-01-23 04:15:52',	0,	0),
(16,	'Testuser',	'test1@example.com',	'2024-01-24 01:07:58',	'$2y$12$RA0xqhhtIVRqesmpEXMdae.9HKj70usk4YpVhhg3tmuIocmF7RLVm',	'Active',	NULL,	'987654345',	'customer_profile/1706078199.jpg',	'887777',	NULL,	NULL,	NULL,	NULL,	'2024-01-24 01:06:39',	'2024-01-24 01:07:58',	0,	0),
(17,	'shreya',	'shreya@gmail.com',	'2024-01-24 22:45:55',	'$2y$12$X6eW1lVH2O.JE.02A9WwKO9tuaKafFUwv/ZGrqPfOJXD8SQaIsNfe',	'Active',	NULL,	'5687467565',	'customer_profile/1706156111.png',	'54767657',	NULL,	NULL,	NULL,	NULL,	'2024-01-24 22:45:11',	'2024-01-29 00:07:41',	0,	0),
(33,	'GSYHJ',	'dvbjhae@bdff.fds',	NULL,	'$2y$12$OSg8.eGuLcLhp5CrCwMr7ODlezzn4rEBSPdrb3JqZKXt8ErYrsyQW',	'Active',	NULL,	'57632547654',	NULL,	'547435',	NULL,	NULL,	NULL,	NULL,	'2024-01-31 02:07:19',	'2024-01-31 02:07:19',	0,	0),
(34,	'Test',	'fgjeh@gjhfe.fedhv',	NULL,	'$2y$12$.h/dD1caRKMyHwfch2x9te6lvA6meIfaeDje1sJ4ci9yoK1Ltl3OW',	'Active',	NULL,	'6538658935675',	NULL,	'4356337',	NULL,	NULL,	NULL,	NULL,	'2024-01-31 05:40:21',	'2024-01-31 05:40:21',	0,	0);

-- 2024-01-31 11:54:47
