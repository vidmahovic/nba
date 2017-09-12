<?php

namespace Nba\Providers;

use CartHook\Entities\FileEntity;
use CartHook\Entities\Player;
use CartHook\Entities\Resources\FileResource;
use CartHook\Entities\Resources\Resource;
use CartHook\Entities\Team;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(Player::class)
                  ->needs(Resource::class)
                  ->give(FileResource::class);

        $this->app->when(Team::class)
                   ->needs(Resource::class)
                   ->give(FileResource::class);

//        $this->app->when(FileEntity::class)
//            ->needs(Resource::class)
//            ->give(FileResource::class);

        // TODO: Naredi SP tako, da taggaš entities, ki so file-based in tiste, ki so api-based. Pri testiranju pa vsili
        // TODO: (new TestResource)->apply()!
    }
}
