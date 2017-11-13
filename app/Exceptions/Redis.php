<?php

namespace App\Exceptions;

class RedisHandler implements SessionHandlerInterface
{

    // Register Session Handler in SessionServiceProvider
//<?php
//
//namespace App\Providers;
//
//    use App\Extensions\MongoSessionStore;
//    use Illuminate\Support\Facades\Session;
//    use Illuminate\Support\ServiceProvider;
//
//class SessionServiceProvider extends ServiceProvider
//{
//    /**
//     * Perform post-registration booting of services.
//     *
//     * @return void
//     */
//    public function boot()
//    {
//        Session::extend('mongo', function($app) {
//            // Return implementation of SessionHandlerInterface...
//            return new MongoSessionStore;
//        });
//    }
//
//    /**
//     * Register bindings in the container.
//     *
//     * @return void
//     */
//    public function register()
//    {
//        //
//    }
//}
    // return session data from storage by session id
    public function read($session_id)
    {
        // TODO: Implement read() method.
    }

    // remove session data from storage
    public function destroy($session_id)
    {
        // TODO: Implement destroy() method.
    }

    // Don't need to change
    public function close()
    {
        // TODO: Implement close() method.
    }

    // Write session data into the storage by session id
    public function write($session_id, $session_data)
    {
        // TODO: Implement write() method.
    }

    // Destroy the data from storage if lifetime was greater than maxlifetime
    public function gc($maxlifetime)
    {
        // TODO: Implement gc() method.
    }


    // Create file base on session system
    // Don't need to change
    public function open($save_path, $name)
    {
        // TODO: Implement open() method.
    }
}
