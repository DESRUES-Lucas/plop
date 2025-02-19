CREATE TABLE `zeapps_project_tasks` (
  `id` int(10) unsigned NOT NULL,
  `id_project` int(10) unsigned NOT NULL DEFAULT '0',
  `id_section` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `completed` enum('Y','N') NOT NULL DEFAULT 'N',
  `progress` tinyint(3) unsigned NOT NULL,
  `order_section` int(10) unsigned NOT NULL,
  `id_assigned_to` int(10) unsigned NOT NULL DEFAULT '0',
  `name_assigned_to` varchar(100) NOT NULL,
  `due_date` date NOT NULL,
  `estimated_time_hours` decimal(7,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `zeapps_project_tasks`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `zeapps_project_tasks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;