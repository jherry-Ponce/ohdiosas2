<?php

namespace App\Console;

use App\Models\Order;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        /* para produccion se necesita configurar un crome */
        $schedule->call(function () {
            /* toma la hora de hace 10 minutos */
            $hora = now()->subMinute(4);
            /* consulta las ordenes conb status 1 y menos a 10 minutos */
            $orders = Order::where('status', 1)->whereTime('created_at', '<=', $hora)->get();
            /* itera las ordenes */
            foreach ($orders as $order) {

                $items = json_decode($order->content);
                /* itera el json y si no hay pago regresa el stock */
                foreach ($items as $item) {
                    increase($item);
                }
                /* CAMBIA EL ESTADO DE LA ORDEN */
                $order->status = 5;

                $order->save();
            }
            /* HACE QUE SE EJECUTE CADA MINUTO */
        })->everyMinute();
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
