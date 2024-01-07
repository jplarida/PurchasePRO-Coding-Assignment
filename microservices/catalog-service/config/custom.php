<?php
// config/custom.php

return [
    'migration_path' => env('CUSTOM_MIGRATION_PATH', base_path('database/migrations')),
    'seeder_path' => env('CUSTOM_SEEDER_PATH', base_path('database/seeders')),
];
?>
