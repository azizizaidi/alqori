<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReportClass;
use Livewire\WithPagination;

class ReportClassTable extends Component
{
    public $month;
    public $page = 1;
    public $selectedMonth;
    public $confirmingDelete = false;


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
