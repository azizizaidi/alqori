@extends('layouts.admin')
@section('content')


                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->roles->contains(1 ))
                  
                    <div class="row">
                      <div class="col-lg-4">
                   <div class="card text-grey bg-white rounded-3 shadow p-1 " style="width: 18rem;">
                       <div class="card-body">
                      
                           <h5 class="card-title text-bold">{{ $registrars->count('id') ?? '' }}</h5>
                           <img src="{{ url('/Image/linechart.png') }}" class="float-right  ">
                      
                             <p class="card-text ">Total Registrars</p>
                           
                         </div>
                    
                     </div>
                     </div>
                     <!----------2nd col------->
                     <div class="col-lg-4">
                   <div class="card text-grey bg-white rounded-3 shadow p-1 " style="width: 18rem;">
                       <div class="card-body">
                      
                           <h5 class="card-title text-bold">{{ $teachers->count('id') ?? '' }}</h5>
                           <img src="{{ url('/Image/linechart2.png') }}" class="float-right  ">
                      
                             <p class="card-text ">Total Teachers</p>
                           
                         </div>
                    
                     </div>
                     </div>
                      <!----------3rd col------->
                      <div class="col-lg-4">
                   <div class="card text-grey bg-white rounded-3 shadow p-1 " style="width: 18rem;">
                       <div class="card-body">
                      
                           <h5 class="card-title text-bold">{{ $students->count('id') ?? '' }}</h5>
                           <img src="{{url('/Image/linechart3.png')}}" class="float-right  ">
                      
                             <p class="card-text ">Total Students</p>
                           
                         </div>
                    
                     </div>
                     </div>
                     </div>
                     
                        
                        
<div>
        <label for="year">Select Year:</label>
 <select id="yearSelect" onchange="updateChart()">
        <option value="">select year</option>
       <option value="2022">2022</option>
       <option value="2023">2023</option>
</select>
    </div>
  
                         <div class="col-lg-10">
                          <div class="card text-grey bg-white rounded-3 shadow p-1">
                            <div class="body">
                            <canvas id="myChart" class="chartjs" data-height="400" height="500" style="display: block; box-sizing: border-box; height: 400px; width: 592.8px;" width="741"></canvas>
                            </div>
                          
                          </div>
                       
                      </div>          
-->
                       
                     
                     @elseif(Auth::user()->roles->contains(2))
                     
                     

                      <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Makluman Guru</h4>
                      <ul>
                        <li>Laporan bulan mei 2023 sudah boleh diisi</li>
                        <li>Jika ada data laporan guru bagi bulan-bulan yang lepas terpadam,sila maklumkan kepada encik azizi. </li>
                       
                      </ul>
                      </div>
                     
                
                 
                     

                 @elseif(Auth::user()->roles->contains(4 ))

                 <div class="row">
                      <div class="col-lg-4">
                   <div class="card text-grey bg-white rounded-3 shadow p-1 " style="width: 18rem;">
                       <div class="card-body">
                      
                           <h5 class="card-title text-bold">RM{{ $reportclasses->where('registrar_id',Auth::user()->id)->where('status',0)->sum('fee_student') ?? '' }}</h5>
                           <img src="{{ url('/Image/pay2.png') }}" class="float-right  " width="100px" >
                             <p class="card-text ">Total Unpaid</p>
                            


                    
                     </div>
                     </div>
                     </div>

                   @else
                   @endif

              
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>


var feejan22 = <?php echo $reportclasses->where('month',null)->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feefeb22 = <?php echo $reportclasses->where('month','02-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;  
var feemar22 = <?php echo $reportclasses->where('month','03-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feeapr22 = <?php echo $reportclasses->where('month','04-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feemay22 = <?php echo $reportclasses->where('month','05-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feejun22 = <?php echo $reportclasses->where('month','06-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feejul22 = <?php echo $reportclasses->where('month','07-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feeogs22 = <?php echo $reportclasses->where('month','08-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feesep22 = <?php echo $reportclasses->where('month','09-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feeoct22 = <?php echo $reportclasses->where('month','10-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feenov22 = <?php echo $reportclasses->where('month','11-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feedec22 = <?php echo $reportclasses->where('month','12-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feejan23 = <?php echo $reportclasses->where('month','01-2023')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feefeb23 = <?php echo $reportclasses->where('month','02-2023')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feemar23 = <?php echo $reportclasses->where('month','03-2023')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feeapr23 = <?php echo $reportclasses->where('month','04-2023')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;


var alwjan22 = <?php echo $reportclasses->where('month',null)->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwfeb22 = <?php echo $reportclasses->where('month','02-2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwmar22 = <?php echo $reportclasses->where('month','03-2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwapr22 = <?php echo $reportclasses->where('month','04-2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwmay22 = <?php echo $reportclasses->where('month','05-2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwjun22 = <?php echo $reportclasses->where('month','06-2022')->whereNull('deleted_at')->sum('allowance') ?? ''?>;
var alwjul22 = <?php echo $reportclasses->where('month','07-2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwogs22 = <?php echo $reportclasses->where('month','08-2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwsep22 = <?php echo $reportclasses->where('month','09-2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwoct22 = <?php echo $reportclasses->where('month','10-2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwnov22 = <?php echo $reportclasses->where('month','11-2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwdec22 = <?php echo $reportclasses->where('month','12-2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwjan23 = <?php echo $reportclasses->where('month','01-2023')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwfeb23 = <?php echo $reportclasses->where('month','02-2023')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwmar23 = <?php echo $reportclasses->where('month','03-2023')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwapr23 = <?php echo $reportclasses->where('month','04-2023')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;

  // Define the chart data and options
  var chartData = {
    labels: ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november','december'],
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: 'rgba(0,0,255,1.0)',
      borderColor: 'rgba(0,0,255,0.1)',
      data: [],
      label: 'Total Fees(RM)',
    }, {
      fill: false,
      lineTension: 0,
      backgroundColor: 'rgba(255, 99, 71, 1)',
      borderColor: 'rgba(255, 108, 49, 0.3)',
      data: [],
      label: 'Total Allowance(RM)',
    }]
  };

  var chartOptions = {
    maintainAspectRatio: false,
    legend: {
      display: true,
    },
    scales: {
      yAxes: [{ ticks: { min: 0, max: 50000 } }],
    }
  };

  // Create an empty chart instance
  var chart = new Chart(document.getElementById('myChart'), {
    type: 'line',
    data: chartData,
    options: chartOptions
  });

  // Function to update the chart based on the selected year
  function updateChart() {
    var selectedYear = document.getElementById('yearSelect').value;
    var feeData = [];
    var allowanceData = [];

    // Retrieve the data for the selected year
    switch (selectedYear) {
      case '2022':
        feeData = [feejan22,feefeb22,feemar22, feeapr22, feemay22, feejun22, feejul22, feeogs22, feesep22, feeoct22, feenov22, feedec22];
        allowanceData = [alwjan22,alwfeb22,alwmar22, alwapr22, alwmay22, alwjun22, alwjul22, alwogs22, alwsep22, alwoct22, alwnov22, alwdec22];
        break;
      case '2023':
        feeData =[feejan23,feefeb23,feemar23,feeapr23];
        allowanceData =[alwjan23,alwfeb23,alwmar23,alwapr23];
        break;
      default:
        // Handle default case or show an error message
        break;
    }

    // Update the chart data
    chart.data.datasets[0].data = feeData;
    chart.data.datasets[1].data = allowanceData;
    chart.update();
  }
</script>


@parent

@endsection