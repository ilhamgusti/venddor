<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use App\Models\Proyek;
use App\Models\Remarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kontrak::filter()->get();
        return view('web.kontrak.index', compact('data'));
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
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function show(Kontrak $kontrak)
    {
        // $latestRemarks = $kontrak->remarks->first();

        $proyek = Proyek::where('id', $kontrak->proyek_id)->first();
        $latestRemarks = $proyek->remarks->first();
        return view('web.kontrak.detail', ['data'=>$kontrak, 'proyek'=> $proyek, 'latestRemarks'=> $latestRemarks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontrak $kontrak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontrak $kontrak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Kontrak $kontrak)
    {
        DB::beginTransaction();
        try {
            $new_status = $request->status;
            error_log('newStatus '.$new_status);

            if (isset($request->file_url)) {
                $kontrak->file_url = URL::asset('storage/' . $request->file_url->store('documents_kontrak', 'public'));
            }
            $kontrak->status = $new_status;
            $kontrak->save();

            if (isset($request->remarks)) {
                error_log('remarks '.$request->remarks);
                $proyek = Proyek::where('id', $kontrak->proyek_id)->first();
                $remarks = new Remarks;
                $remarks->remarks = $request->remarks;
                $remarks->status = $new_status;
                $remarks->user_id = \Auth::user()->id;
                $proyek->remarks()->save($remarks);
            }

            if($request->status == 4) {
                $Tahapan = new Tahapan;
                // $Kontrak->tanggal_kontrak = date('Y-m-d');
                $Kontrak->file_url = '';
                $Kontrak->status = 0;
                $Kontrak->created_at = date('Y-m-d');
                $Kontrak->proyek_id = $proyek->id;
                $Kontrak->save();
            }

            DB::commit();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            return response()->json($ex->getMessage(), 409);
        }
        return redirect()->route('kontrak.index')->with('success','Success Data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontrak $kontrak)
    {
        //
    }
}
