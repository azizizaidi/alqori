<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReportClass;

class ReportClassTable extends Component
{
    public $month;
    public $reportclasses;

    protected $listeners = ['updatedMonth' => 'getReportClasses'];

    public function mount()
    {
        $this->reportclasses = $this->getReportClasses();
    }

    public function updatedMonth($value)
    {
        $this->month = $value;
        $this->reportclasses = $this->getReportClasses();
    }

    private function getReportClasses()
    {
        // If a month has been selected, fetch classes for that month
        if ($this->month) {
            return ReportClass::where('month', $this->month)->get();
        }
        // Otherwise, fetch all classes
        else {
            return ReportClass::all();
        }
    }

    public function render()
    {
        $this->reportclasses = $this->getReportClasses();

    return view('livewire.report-class-table', [
        'reportclasses' => $this->reportclasses,
        'selectedMonth' => $this->month,
    ]);
    }
}
