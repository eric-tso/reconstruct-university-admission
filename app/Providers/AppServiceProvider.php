<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\File;
use App\Models\Application;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
        
        Gate::define('user', function(User $user){ 
            return $user->role == 'user';
        });

        Gate::define('officer', function(User $user){ 
            return $user->role == 'officer';
        });

        Gate::define('admin', function(User $user){
            return $user->role == 'admin';
        });
        
        Gate::define('edit-file', function (User $user, File $file) {
            return $user->id === $file->user_id;
        });    

        Gate::define('edit-application', function (User $user, Application $application) {
            return $user->id === $application->user_id;
        }); 


    }
}
