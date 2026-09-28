php artisan config:publish cors

'paths' => ['api/*'],

'allowed_methods' => ['*'],

'allowed_origins' => ['http://localhost:5173'],

'allowed_headers' => ['*'],