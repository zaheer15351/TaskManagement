<?php
/**
 * Created by PhpStorm.
 * User: zaheer
 * Date: 6/27/2018
 * Time: 7:54 PM
 */

$installer = $this;
$installer->startSetup();
$installer->run("DROP TABLE IF EXISTS {$this->getTable('taskmanagement/tasks')};
CREATE TABLE {$this->getTable('taskmanagement/tasks')} (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `assigned_to` VARCHAR(255) NOT NULL,
  `status` enum('TODO','In Progress','Done') NOT NULL default 'TODO',
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();