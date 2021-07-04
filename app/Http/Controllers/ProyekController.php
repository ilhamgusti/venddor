<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProyekRequest;
use App\Http\Transformers\ProyekTransformer;
use App\Models\Proyek;
use App\Models\Vendor;
use App\Models\Remarks;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Proyek::filter()->get();
        return view('web.proyek.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::all();
        return view('web.proyek.create', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProyekRequest $request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            $proyek = ProyekTransformer::toInstance($request->validated());
            $proyek->status = 1;
            $proyek->file_url = URL::asset('storage/' . $request->file_url->store('documents_timeline', 'public'));
            $proyek->save();

            $vendor = Vendor::findOrFail($request->vendor_id);
            
            $proyek->vendor()->associate($vendor)->save();

            $remarks = new Remarks;
            $remarks->remarks = $request->remarks;
            $remarks->status = 1;
            $remarks->user_id = \Auth::user()->id;

            $proyek->remarks()->save($remarks);

            DB::commit();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            return response()->json($ex->getMessage(), 409);
        }
        return redirect()->route('proyek.index')->with('success','Success Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function show(Proyek $proyek)
    {

        $latestRemarks = $proyek->remarks->first();
        return view('web.proyek.detail', ['data'=>$proyek, 'latestRemarks'=> $latestRemarks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modezzzzzzzls\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyek $proyek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyek $proyek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Proyek $proyek)
    {
        
        DB::beginTransaction();
        try {
            // $proyek = ProyekTransformer::getModel($request->proyek_id);
            
            $proyek->status = $request->status;
            $proyek->save();

            $remarks = new Remarks;
            $remarks->remarks = $request->remarks;
            $remarks->status = $request->status;
            $remarks->user_id = \Auth::user()->id;

            $proyek->remarks()->save($remarks);
            DB::commit();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            return response()->json($ex->getMessage(), 409);
        }
        return redirect()->route('proyek.index')->with('success','Success Data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyek $proyek)
    {
        //
    }



    private function setStatusByAuthLogin($status = true){

        if($status) return \Auth::user()->role;
        return 99;
    }
}
