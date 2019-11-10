<?php
    require_once('../config/config.php');

    class Migrations {
        public $id;
        public $migration;
        public $migrations;
        public $count;
        public $insertedCount;

        function __construct()
        {
            $this->getMigrations();
            $this->getInsertedCount();
        }

        function insertMigration($migration)
        {
            $start = microtime(true);
            global $config;

            $queries = array();
            require_once($migration);
            $migrationId = basename($migration, ".php");
            $isMigrated = $this->checkMigration($migrationId);
            if($isMigrated)
                return false;
            echo("Executing migration #$migrationId<br/>");
            $migrationQuery = "INSERT INTO `migrations` (`id`, `migration`) VALUES (NULL, '$migrationId')";
            // $migrationContent = fopen($migration, 'r');
            foreach($queries as $query)
            {
                $execute = $config['mysqlconn']->query($query);
                if ($execute === false) {
                    throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
                }

            }

            $config['mysqlconn']->query($migrationQuery);
            $end = round(microtime(true) - $start, 3);
            echo("Execution completed (execution time $end ms)<br/><br/>");
            return true;
        }

        function checkMigration($migrationId)
        {
            global $config;
            $checkQuery = "SELECT COUNT(*) AS `exists` FROM `migrations` WHERE `migration` = $migrationId";
            $query = $config['mysqlconn']->query($checkQuery);
            if ($query === false) {
                throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
            }

            $row = $query->fetch_object();
            $migrationExists = (bool) $row->exists;
            return $migrationExists;
        }

        function checkMigrationDB()
        {
            global $config;

            $sql = 'SELECT COUNT(*) AS `exists` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = "'.$config['mysqlname'].'" AND table_name = "migrations";';

            $query = $config['mysqlconn']->query($sql);
            if ($query === false) {
                throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
            }

            $row = $query->fetch_object();
            $dbExists = (bool) $row->exists;
            if($dbExists)
                return true;

            $queries = array();
            $queries[0] = "CREATE TABLE `migrations`( `id` int(20) NOT NULL, `migration` BIGINT(20) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            $queries[1] = "ALTER TABLE `migrations` ADD PRIMARY KEY (`id`);";
            $queries[2] = "ALTER TABLE `migrations` MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
            $queries[3] = "ALTER TABLE `migrations` ADD UNIQUE(`migration`);";

            foreach($queries as $query)
            {
                $config['mysqlconn']->query($query);
            }
        }

        function getInsertedCount()
        {
            global $config;
            $checkQuery = "SELECT COUNT(*) AS `count` FROM `migrations`;";
            $query = $config['mysqlconn']->query($checkQuery);
            if ($query === false) {
                throw new Exception($config['mysqlconn']->error, $config['mysqlconn']->errno);
            }

            $row = $query->fetch_object();
            $migrationsCount = $row->count;
            $this->insertedCount = $migrationsCount;
            return $migrationsCount;
        }

        function getMigrations()
        {
            $migrations = glob('../sql/*.php');

            if(!$migrations)
                return false;
            
            $this->count = count($migrations);
            $this->migrations = $migrations;
        }

        function getMigrationsCount()
        {
            echo("$this->count|$this->insertedCount");
            return true;
        }

        function checkMigrations()
        {
            global $config;
            $this->checkMigrationDB();

            $migrations = $this->migrations;

            usort($migrations, function($a, $b) {
                return filemtime($a) > filemtime($b);
            });
            $migrationCount = 0;
            foreach($migrations as $migration)
            {
                $result = $this->insertMigration($migration);
                if($result)
                    $migrationCount++;
            }

            $migrationText;

            if($migrationCount)
            {
                $migrationText = "<span class='text-warning'>$migrationCount</span> migrations executed.";
            } else {
                $migrationText = "No migrations executed.";
            }
            $migrationText = "<span class='text-info'>$migrationText</span>";
            echo $migrationText;
        }
    }
?>