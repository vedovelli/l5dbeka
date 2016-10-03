<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Storage;
use Illuminate\Support\Facades\DB;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if (env('APP_DEBUG')) {
            DB::listen(function ($query) {
                $fullQuery = vsprintf(str_replace(array('%', '?'), array('%%', '%s'), $query->sql), $query->bindings);

                $logString = "Connection: {$query->connectionName}
    Execution time: {$query->time}ms
    Query: ${fullQuery}
    ---------------------" . PHP_EOL;

                /**
                * Use no Terminal `tail -f storage/app/logs/queries.log`
                */
                Storage::append('logs/queries.log', $logString);
            });
        }

    }
}
