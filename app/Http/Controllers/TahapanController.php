<?php

namespace App\Http\Controllers;

use App\Models\Tahapan;
use App\Models\Kontrak;
use App\Models\Proyek;
use App\Models\Invoice;
use App\Models\Remarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class TahapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kontrak::filter()->get();
        error_log($data);
        return view('web.tahapan.index', compact('data'));
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
     * @param  \App\Models\Tahapan  $tahapan
     * @return \Illuminate\Http\Response
     */
    public function show(Kontrak $tahapan)
    {
        error_log($tahapan);
        $proyek = Proyek::where('id', $tahapan->proyek_id)->first();
        $tahapans = Tahapan::where('proyek_id', $tahapan->proyek_id) -> get();
        error_log($tahapans);
        error_log($proyek);
        $latestRemarks = $proyek->remarks->first();
        return view('web.tahapan.detail', ['data'=>$tahapan, 'tahapans' => $tahapans,'proyek'=> $proyek, 'latestRemarks'=> $latestRemarks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tahapan  $tahapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontrak $tahapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tahapan  $tahapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontrak $tahapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tahapan  $tahapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontrak $tahapan)
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
    public function updateStatus(Request $request, Kontrak $tahapan)
    {
        DB::beginTransaction();
        try {
            error_log($request->tahapan_1);
            error_log($request->file_url_1);
            error_log('kontrak '.$tahapan);

            $new_status = $request->status;
            $tahapan->status = $new_status;
            $tahapan->save();

            $proyek = Proyek::where('id', $tahapan->proyek_id)->first();

            Tahapan::where('proyek_id', $tahapan->proyek_id)->delete();

            $tahapan1 = new Tahapan;
            $tahapan1->proyek_id = $tahapan->proyek_id;
            $tahapan1->label = $request->tahapan_1;
            $tahapan1->file_url = '';
            if ($new_status == 92 && isset($request->file_url_1)) {
                $tahapan1->file_url =   URL::asset('storage/' . $request->file_url_1->store('documents_kontrak', 'public'));
            }
            $tahapan1->keterangan = isset($request->keterangan_1) ? $request->keterangan_1 : '';
            $tahapan1->status = 1;
            $tahapan1->save();

            $tahapan2 = new Tahapan;
            $tahapan2->proyek_id = $tahapan->proyek_id;
            $tahapan2->label = $request->tahapan_2;
            $tahapan2->file_url = '';
            if ($new_status == 92 && isset($request->file_url_2)) {
                $tahapan2->file_url = URL::asset('storage/' . $request->file_url_2->store('documents_kontrak', 'public'));
            }
            $tahapan2->keterangan = isset($request->keterangan_2) ? $request->keterangan_2 : '';
            $tahapan2->status = 1;
            $tahapan2->save();

            $tahapan3 = new Tahapan;
            $tahapan3->proyek_id = $tahapan->proyek_id;
            $tahapan3->label = $request->tahapan_3;
            $tahapan3->file_url = '';
            if ($new_status == 92 && isset($request->file_url_3)) {
                $tahapan3->file_url =  URL::asset('storage/' . $request->file_url_3->store('documents_kontrak', 'public'));
            }
            $tahapan3->keterangan = isset($request->keterangan_3) ? $request->keterangan_3 : '';
            $tahapan3->status = 1;
            $tahapan3->save();

            $new_status = $request->status;
            if ($new_status == 92) {
                $invoice = new Invoice;
                $invoice->proyek_id = $tahapan->proyek_id;
                $invoice->kode_invoice = date('Ymd_hi');
                $invoice->file_url =  URL::asset('storage/' . $request->file_invoice->store('documents_kontrak', 'public'));
                $invoice->total_tagihan = $request->nominal;
                $invoice->keterangan = $request->keterangan_invoice;
                $invoice->status = 0;
                $invoice->save();
            }

            DB::commit();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            return response()->json($ex->getMessage(), 409);
        }
        return redirect()->route('kontrak.index')->with('success','Success Data berhasil di simpan');
    }
}
