<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Blade;
use Session;
use Illuminate\Pagination\Paginator;
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        Blade::directive('toastr', function ($expression) {

            return "<script>
            var baseUrl = '{{ url('/') }}';
              

                  
                        localStorage.setItem('baseUrl', baseUrl);
                    
                    toastr.{{ Session::get('alert-type') }}($expression)
                 </script>";
        });
    }
}
