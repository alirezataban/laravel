<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Jetstream::ignoreRoutes();
        $this->JetstreamRegisterRoutes();

        $loader = AliasLoader::getInstance();
            $loader->alias('Laravel\Jetstream\Http\Livewire\ApiTokenManager', 'App\Http\Livewire\ApiTokenManager');
            $loader->alias('Laravel\Jetstream\Http\Livewire\CreateTeamForm', 'App\Http\Livewire\CreateTeamForm');
            $loader->alias('Laravel\Jetstream\Http\Livewire\DeleteTeamForm', 'App\Http\Livewire\DeleteTeamForm');
            $loader->alias('Laravel\Jetstream\Http\Livewire\DeleteUserForm', 'App\Http\Livewire\DeleteUserForm');
            $loader->alias('Laravel\Jetstream\Http\Livewire\LogoutOtherBrowserSessionsForm', 'App\Http\Livewire\LogoutOtherBrowserSessionsForm');
            $loader->alias('Laravel\Jetstream\Http\Livewire\NavigationDropdown', 'App\Http\Livewire\NavigationDropdown');
            $loader->alias('Laravel\Jetstream\Http\Livewire\TeamMemberManager', 'App\Http\Livewire\TeamMemberManager');
            $loader->alias('Laravel\Jetstream\Http\Livewire\TwoFactorAuthenticationForm', 'App\Http\Livewire\TwoFactorAuthenticationForm');
            $loader->alias('Laravel\Jetstream\Http\Livewire\UpdatePasswordForm', 'App\Http\Livewire\UpdatePasswordForm');
            $loader->alias('Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm', 'App\Http\Livewire\UpdateProfileInformationForm');
            $loader->alias('Laravel\Jetstream\Http\Livewire\UpdateTeamNameForm', 'App\Http\Livewire\UpdateTeamNameForm');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Vite::prefetch(concurrency: 3);
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
    private function JetstreamRegisterRoutes() {
        Route::group([
            'namespace' => 'Laravel\Jetstream\Http\Controllers',
            'domain' => config('jetstream.domain', null),
            'prefix' => config('jetstream.prefix', config('jetstream.path')),
        ], function () {
            $this->loadRoutesFrom(base_path('routes/users/route.php'));
        });
    }
}
