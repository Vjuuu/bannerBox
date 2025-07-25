<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;

echo "JWT Class Exists? ";
echo class_exists(JWT::class) ? "✅ YES" : "❌ NO";
