<?php

namespace App\Providers;

use App\Model\Article\Article;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot(Guard $auth)
    {
        Schema::defaultStringLength(191);

        view()->composer('*', function($view) use ($auth) {
            $user = $auth->user();
            
            if ($user) {
                $drafts = Article::orderBy('created_at', 'desc')
                    ->where('status', 'Draft')
                    ->where('author_id', $user->id)->get();
    
                $count_drafts = count($drafts);
    
                $limit_drafts = Article::orderBy('created_at', 'desc')
                            ->where('status', 'Draft')
                            ->where('author_id', $user->id)->limit(5)->get();
    
                View::share('count_drafts', $count_drafts);
                View::share('limit_drafts', $limit_drafts);
            }
        });
    }
}
