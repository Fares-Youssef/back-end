<?php

namespace App\Providers;

use App\Models\Room;
use Illuminate\Support\Facades\DB;
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
        $this->app->bind('path.public', function() {
        return base_path('public_html');});
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function ($view) {
            if (auth()->user() != null) {
                if (auth()->user()->type == 1) {
                    $coll = count(DB::table('collections')->where('approve', 1)->get());
                    $building = count(DB::table('buildings')->where('approve', 2)->get());
                    $housing = count(DB::table('housings')->where('approve', 2)->get());
                    $out = count(DB::table('outs')->where('approve', 2)->get());
                } else if (auth()->user()->type == 2) {
                    $phpArray = json_decode(auth()->user()->attach, true);
                    $building = 0;
                    $coll = 0;
                    $housing = 0;
                    $out = 0;
                    foreach ($phpArray as $item) {
                        $collection = DB::table('collections')->where('region', $item)->where('approve', 0)->get();
                        foreach ($collection as $item) {
                            $coll += 1;
                        }
                        $buildings = DB::table('buildings')->where('region', $item)->where('approve', 1)->get();
                        foreach ($buildings as $item) {
                            $building += 1;
                        }
                        $housings = DB::table('housings')->where('region', $item)->where('approve', 1)->get();
                        foreach ($housings as $item) {
                            $housing += 1;
                        }
                        $region = DB::table('region')->where('id', $item)->first();
                        $outs = DB::table('outs')->where('region', $region->name)->where('approve', 1)->get();
                        foreach ($outs as $item) {
                            $out += 1;
                        }
                    }
                } else if (auth()->user()->type == 3) {
                    $phpArray = json_decode(auth()->user()->attach, true);
                    $coll = 0;
                    $building = 0;
                    $housing = 0;
                    $out = 0;
                    foreach ($phpArray as $item) {
                        $buildings = DB::table('buildings')->where('collectionId', $item)->where('approve', 0)->get();
                        foreach ($buildings as $item) {
                            $building += 1;
                        }
                        $housings = DB::table('housings')->where('collectionId', $item)->where('approve', 0)->get();
                        foreach ($housings as $item) {
                            $housing += 1;
                        }
                        $collection = DB::table('collections')->where('id', $item)->first();
                        $outs = DB::table('outs')->where('collection', $collection->name)->where('approve', 0)->get();
                        foreach ($outs as $item) {
                            $out += 1;
                        }
                    }
                }
            } else {
                $coll = null;
                $building = null;
                $housing = null;
                $out = null;
            }

            $view->with('coll', $coll)->with('building', $building)
                ->with('housing', $housing)->with('out', $out);
        });

        view()->composer('home', function ($view2) {
            $coll = count(DB::table('collections')->get());
            $building = count(DB::table('buildings')->get());
            $housing = count(DB::table('housings')->get());
            $rooms = Room::all();
            $room = 0;
            foreach ($rooms as $item) {
                $currentHousingRoom = \count(DB::table('housings')->where('approve', 3)->where('roomId', $item->id)->get());
                if($currentHousingRoom == 0){
                    $room += 1;
                }
            }
            $riyadh = count(DB::table('housings')->where('region',1)->get());
            $qassim = count(DB::table('housings')->where('region',4)->get());
            $tabouk = count(DB::table('housings')->where('region',7)->get());
            $sharqia = count(DB::table('housings')->where('region',5)->get());
            $asir = count(DB::table('housings')->where('region',6)->get());
            $mecca = count(DB::table('housings')->where('region',2)->get());
            $NEOM = count(DB::table('housings')->where('region',9)->get());
            $medina = count(DB::table('housings')->where('region',3)->get());
            $view2->with([
                'coll' => $coll,
                'building' => $building,
                'housing' => $housing,
                'room' => $room,
                'riyadh' => $riyadh,
                'qassim' => $qassim,
                'tabouk' => $tabouk,
                'sharqia' => $sharqia,
                'asir' => $asir,
                'mecca' => $mecca,
                'NEOM' => $NEOM,
                'medina' => $medina,
            ]);
        });
    }
}
