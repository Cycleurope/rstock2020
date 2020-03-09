<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\UpdateProducts',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        // $schedule->command('dealers:update')->dailyAt('06:30');
        // $schedule->command('products:update')->dailyAt('06:25');
        // $schedule->command('products:update')->dailyAt('10:00');
        // $schedule->command('products:update')->dailyAt('12:30');
        // $schedule->command('products:update')->dailyAt('15:30');
        // $schedule->command('products:update')->dailyAt('19:00');

        // Lundi
        $schedule->command('products:update')->weeklyOn(1, '06:30');
        $schedule->command('products:update')->weeklyOn(1, '08:25');
        $schedule->command('products:update')->weeklyOn(1, '10:00');
        $schedule->command('products:update')->weeklyOn(1, '12:25');
        $schedule->command('products:update')->weeklyOn(1, '15:30');
        $schedule->command('products:update')->weeklyOn(1, '19:00');

        // Mardi
        $schedule->command('products:update')->weeklyOn(2, '06:30');
        $schedule->command('products:update')->weeklyOn(2, '08:25');
        $schedule->command('products:update')->weeklyOn(2, '10:00');
        $schedule->command('products:update')->weeklyOn(2, '12:25');
        $schedule->command('products:update')->weeklyOn(2, '15:30');
        $schedule->command('products:update')->weeklyOn(2, '19:00');

        // Mercredi
        $schedule->command('products:update')->weeklyOn(3, '06:30');
        $schedule->command('products:update')->weeklyOn(3, '08:25');
        $schedule->command('products:update')->weeklyOn(3, '10:00');
        $schedule->command('products:update')->weeklyOn(3, '12:25');
        $schedule->command('products:update')->weeklyOn(3, '15:30');
        $schedule->command('products:update')->weeklyOn(3, '19:00');

        // Jeudi
        $schedule->command('products:update')->weeklyOn(4, '06:30');
        $schedule->command('products:update')->weeklyOn(4, '08:25');
        $schedule->command('products:update')->weeklyOn(4, '10:00');
        $schedule->command('products:update')->weeklyOn(4, '12:25');
        $schedule->command('products:update')->weeklyOn(4, '15:30');
        $schedule->command('products:update')->weeklyOn(4, '19:00');

        // Vendredi
        $schedule->command('products:update')->weeklyOn(5, '06:30');
        $schedule->command('products:update')->weeklyOn(5, '08:25');
        $schedule->command('products:update')->weeklyOn(5, '10:00');
        $schedule->command('products:update')->weeklyOn(5, '12:25');
        $schedule->command('products:update')->weeklyOn(5, '15:30');
        $schedule->command('products:update')->weeklyOn(5, '19:00');

        // Samedi
        $schedule->command('products:update')->weeklyOn(6, '06:30');
        $schedule->command('products:update')->weeklyOn(6, '08:25');
        $schedule->command('products:update')->weeklyOn(6, '10:00');
        $schedule->command('products:update')->weeklyOn(6, '12:25');
        $schedule->command('products:update')->weeklyOn(6, '15:30');
        $schedule->command('products:update')->weeklyOn(6, '19:00');

        // Serveurs inactifs le dimanche donc pas de mise à jour.
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
