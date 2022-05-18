<?php

namespace App\Http\Controllers;

use App\Models\AgentLivreur;
use App\Models\Device;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();
        return view('devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
//
        $agents = $this->getAllAgents();
        return view('devices.create', compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'imei'=>'required',
                'masterKey'=>'required',
                'agent_livreur_id'=>'required',
            ]
        );

        $device = new Device();

        $device->imei = $request->imei;
        $device->masterKey = $request->masterKey;
        $device->agent_livreur_id = $request->agent_livreur_id;

        $device->save();
        return redirect()->route('devices.index')->with('success','Appareil créé avec succès!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Device::find($id);
        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device= Device::findOrFail($id);
        return view('devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $device)
    {

        $validatedData = $request->validate(
            [
                'imei'=>'required',
                'masterKey'=>'required',
            ]
        );

        Device::where('id', $device)->update($validatedData);

        return redirect()->route('devices.index')->with('success','Appareil modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Device::whereId($id)->delete();

        return redirect()->route('devices.index')->withSuccess(__('Archivé supprimée avec succès.'));
    }

    public function getAllAgents()
    {
        return AgentLivreur::all();
    }
}
