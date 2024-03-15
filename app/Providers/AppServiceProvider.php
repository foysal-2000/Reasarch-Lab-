<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('username', function ($attribute, $value, $parameters, $validator) {
            // Define your validation logic for the username here
            // For example, if you want to allow only alphanumeric characters and underscores
            return preg_match('/^[a-zA-Z0-9_]+$/', $value);
        });

        // Optional: Define a custom error message for the username rule
        Validator::replacer('username', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute must contain only letters, numbers, and underscores.');
        });
    }
}
