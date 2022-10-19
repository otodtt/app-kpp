<?php

namespace odbh\Http\Controllers;

use Illuminate\Http\Request;

use odbh\Http\Requests;
use odbh\Http\Controllers\Controller;
use odbh\Http\Requests\InvoicesRequest;
use odbh\Invoice;
use odbh\QCertificate;
use odbh\User;
use Auth;
use Redirect;
use Session;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('quality.invoices.invoices', compact('invoices'));
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
    /** ФАКТУРИ ВНОС  */
    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function import_create($id)
    {
        $certificate = QCertificate::findOrFail($id);

        return view('quality.certificates.import.invoices.create', compact('certificate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|InvoicesRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function import_store(InvoicesRequest $request, $id)
    {
        $certificate = QCertificate::findOrFail($id);

        $data = [
            'invoice_for' => 1,
            'number_invoice' => $request->invoice,
            'date_invoice' =>strtotime(stripslashes($request->date_invoice)),
            'sum' => round($request->sum, 2),
            'certificate_id' => $certificate->id,
            'certificate_number' => $certificate->import,
            'importer_id' => $certificate->importer_id,
            'importer_name' => $certificate->importer_name,
            'identifier' => $certificate->stamp_number.'/'.$certificate->import,
            'date_create' => date('d.m.Y', time()),
            'created_by' => Auth::user()->id,
        ];

        $invoice = Invoice::create($data);
        $invoice_id = $invoice->id;

        // Добавяне данни към сертификата
        $invoice_data = [
            'invoice_id' => $invoice_id,
            'invoice_number' => $request->invoice,
            'invoice_date' => strtotime(stripslashes($request->date_invoice)),
            'sum' => round($request->sum, 2),
        ];

        $certificate->fill($invoice_data);
        $certificate->save();

        Session::flash('message', 'Записа е успешен!');
        return Redirect::to('/контрол/сертификат/'.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function import_edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $certificate =QCertificate::findOrFail($invoice->id);

        return view('quality.certificates.import.invoices.edit', compact('invoice', 'certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\InvoicesRequest|InvoicesRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function import_update(InvoicesRequest $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $data = [
            'number_invoice' => $request->invoice,
            'date_invoice' =>strtotime(stripslashes($request->date_invoice)),
            'sum' => round($request->sum, 2),
            'date_update' => date('d.m.Y', time()),
            'updated_at' => Auth::user()->id,
        ];
        $invoice->fill($data);
        $invoice->save();

        // Редактиране данни към сертификата
        $certificate = QCertificate::findOrFail($invoice->id);
        $invoice_data = [
            'invoice_number' => $request->invoice,
            'invoice_date' => strtotime(stripslashes($request->date_invoice)),
            'sum' => round($request->sum, 2),
        ];
        $certificate->fill($invoice_data);
        $certificate->save();

        Session::flash('message', 'Записа е успешен!');
        return Redirect::to('/контрол/сертификат/'.$certificate->id);
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
