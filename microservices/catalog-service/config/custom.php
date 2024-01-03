<?php
// config/custom.php

return [
    'migration_path' => env('CUSTOM_MIGRATION_PATH', base_path('../common/database/migrations')),
    'seeder_path' => env('CUSTOM_SEEDER_PATH', '../common/database/seeders'),
];
?>
