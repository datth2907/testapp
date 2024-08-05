<?php

namespace App\Providers;

use App\Models\Image;
use App\Models\User;
use App\Enums\Role;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
//use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        Gate::policy(Post::class, PostPolicy::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::define('update-image', function(User $user, Image $image){
            return $user->id === $image->user_id || $user->role === Role::EDITOR;
        });

        Gate::define('delete-image', function(User $user, Image $image){
            return $user->id === $image->user_id;
        });
        //
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
