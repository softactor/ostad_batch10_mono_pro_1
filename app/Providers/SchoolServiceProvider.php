<?php

namespace App\Providers;

use App\AttendanceRegister;
use App\StudentIdCard;
use Illuminate\Support\ServiceProvider;

class SchoolServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('student.id.card', function(){
            return new StudentIdCard();
        });
        
        $this->app->singleton('school.attendance', function(){
            return new AttendanceRegister();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
