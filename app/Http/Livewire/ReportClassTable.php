<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReportClass;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;

class ReportClassTable extends Component
{
    public $month;
    public $page = 1;
    public $selectedMonth;
    public $confirmingDelete = false;
    //public $deleteId;
    public $selectedItems = [];


    protected $reportclasses;
    protected $listeners = ['updatedMonth' => 'getReportClasses'];
    protected $paginationTheme = 'bootstrap';

    use WithPagination;

    public function mount()
    {
       // $this->reportclasses = $this->getReportClasses();
        $this->months = ReportClass::distinct('month')->pluck('month');
    }

    public function updatedMonth($value)
    {
        $this->selectedMonth = $value;
        $this->month = $value;
        $this->resetPage();
        $this->reportclasses = $this->getReportClasses();
    }

    

    private function getReportClasses()
    {
     

        if ($this->month) {
            return ReportClass::where('month', $this->month)->paginate(10); // Change the "10" to the desired number of items per page
        } else {
            return ReportClass::where('month', '04-2022')->paginate(10);
        }
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = false;
    }

    public function delete()
    {
        ReportClass::find($this->deleteId)->delete();
        $this->reportclasses = $this->getReportClasses();
        $this->confirmingDelete = false;
    }

    public function selectAll()
    {
        $this->selectedItems = $this->reportclasses->pluck('id')->toArray();
      
    }

    public function downloadCSV()
    {
        $reportClasses = ReportClass::whereIn('id', $this->selectedItems)->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=report_classes.csv',
        ];

        $callback = function () use ($reportClasses) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Teacher', 'Registrar', 'Month', 'Created At', 'Class Name','Date','Total Hour', 
                             'Class Name 2','Date 2','Total Hour 2','Allowance']); // Add your desired columns here

            foreach ($reportClasses as $reportClass) {
                fputcsv($file, [
                    $reportClass->id,
                    $reportClass->created_by->name,
                    $reportClass->registrar->name,
                    $reportClass->month,
                    $reportClass->created_at,
                    $reportClass->class_name->name,
                    $reportClass->date,
                    $reportclass->total_hour,
                    $reportClass->class_name_2->name,
                    $reportClass->date_2,
                    $reportclass->total_hour_2,
                    $reportclass->allowance,




                ]); // Add your desired columns here
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }

    public function render()
    {
       // $this->reportclasses = $this->getReportClasses();

   // return view('livewire.report-class-table', [
      //  'reportclasses' => $this->reportclasses,
     //   'selectedMonth' => $this->month,
  //  ]);

    
  $reportclasses = $this->month 
  ? ReportClass::where('month', $this->month)->paginate(10)
  : ReportClass::where('month', '04-2022')->paginate(10);

return view('livewire.report-class-table', [
  'reportclasses' => $reportclasses,
  'selectedMonth' => $this->selectedMonth,
]);
    }
}
