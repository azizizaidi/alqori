<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyReportCardRequest;
use App\Http\Requests\StoreReportCardRequest;
use App\Http\Requests\UpdateRegistrarRequest;
use App\Models\ReportCard;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportCardController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('report_card_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       

        return view('admin.reportcard.index');
    }

    public function create()
    {
       
    }

    public function store(StoreReportCardRequest $request)
    {
       
    }

    public function edit(ReportCard $registrar)
    {
       
    }

    public function update(UpdateReportCardRequest $request, Registrar $registrar)
    {
       
    }

    public function show(ReportCard $registrar)
    {
       
    }

    public function destroy(ReportCard $registrar)
    {
       
    }

    public function massDestroy(MassDestroyReportCardRequest $request)
    {
        
    }
}
