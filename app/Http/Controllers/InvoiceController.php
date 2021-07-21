<?php

namespace App\Http\Controllers;

use App\Models\Tahapan;
use App\Models\Invoice;
use App\Models\Kontrak;
use App\Models\Proyek;
use App\Models\Remarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Invoice::filter()->get();
        return view('web.invoice.index', compact('data'));
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
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $proyek = Proyek::where('id', $invoice->proyek_id)->first();
        $latestRemarks = $proyek->remarks->first();

        $tahapans = Tahapan::where('proyek_id', $invoice->proyek_id) -> orderBy('id', 'ASC') -> get();
        $kontrak = Kontrak::where('proyek_id', $invoice->proyek_id)->first();

        error_log('$kontrak');
        error_log($kontrak);

        return view('web.invoice.detail', ['data'=>$invoice, 'kontrak'=>$kontrak, 'tahapans' => $tahapans,'proyek'=> $proyek, 'latestRemarks'=> $latestRemarks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
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
    public function updateStatus(Request $request, Invoice $invoice)
    {
        DB::beginTransaction();
        try {
            $new_status = $request->status;
            if ($new_status == 4) {
                $new_status = 5; // direktur loncat ke keuangan
            }
            error_log('newStatus '.$new_status);

            $invoice->status = $new_status;

            if (isset($request->remarks)) {
                error_log('remarks '.$request->remarks);
                $proyek = Proyek::where('id', $invoice->proyek_id)->first();
                $remarks = new Remarks;
                $remarks->remarks = $request->remarks;
                $remarks->status = $new_status;
                $remarks->user_id = \Auth::user()->id;
                $proyek->remarks()->save($remarks);
            }

            $invoice->file_bukti = '';
            if (isset($request->file_bukti)) {
                error_log('file_bukti '.$request->file_bukti);
                $invoice->file_bukti = URL::asset('storage/' . $request->file_bukti->store('documents_kontrak', 'public'));
            }
            $invoice->save();

            DB::commit();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            return response()->json($ex->getMessage(), 409);
        }
        return redirect()->route('invoice.index')->with('success','Success Data berhasil di simpan');
    }

}
