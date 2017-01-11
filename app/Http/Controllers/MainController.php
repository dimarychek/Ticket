<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Sector;
use App\Row;
use App\Place;
use App\Reserv;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->all()) {
            $all = $request->all();
            foreach($all['reserv_place'] as $reserv) {
                $all['reserv_place'] = $reserv;
                Reserv::create($all);
            }

            return back()->with('message', 'Поздравляем, места забронированны!');

        } else {
            $sectors = Sector::get();
            $rows = Row::get();
            $places = Place::get();
            $reservs = Reserv::select('reserv_place')->get()->toArray();
            $reservs = array_flatten($reservs);

            $sectorsCount = Sector::count();
            $rowsCount = Row::count();
            $placesCount = Place::count();
            $reservsCount = Reserv::count();

            $all = $sectorsCount*$rowsCount*$placesCount - $reservsCount;

            return view('site.index', ['sectors' => $sectors, 'rows' => $rows, 'places' => $places, 'reservs' => $reservs, 'all' => $all]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
