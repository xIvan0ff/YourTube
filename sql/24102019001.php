<?php
    $queries[0] = "CREATE TABLE `accounts`( `id` int(11) NOT NULL, `username` varchar(255) NOT NULL, `email` varchar(255) NOT NULL, `password` varchar(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
    $queries[1] = "ALTER TABLE `accounts` ADD PRIMARY KEY(`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);";
    $queries[2] = "ALTER TABLE `accounts` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
?>