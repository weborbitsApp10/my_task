<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('required_if_contains_numbers', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[^0-9.]/', $value) ? empty($value) : true;
        });
    }
}
