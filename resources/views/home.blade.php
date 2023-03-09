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
                     
                        <div class="col-lg-10">
                          <div class="card text-grey bg-white rounded-3 shadow p-1">
                            <div class="body">
                            <canvas id="myChart" class="chartjs" data-height="400" height="500" style="display: block; box-sizing: border-box; height: 400px; width: 592.8px;" width="741"></canvas>
                            </div>
                          
                          </div>
                       
                      </div>
                        
                               
            
                       
                     
                     @elseif(Auth::user()->roles->contains(2))
                     
                     

                      <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Makluman Guru</h4>
                      <ul>
                        <li>Laporan bulan februari 2023 sudah boleh diisi</li>
                        <li>Jika ada data laporan guru bagi bulan-bulan yang lepas terpadam,sila maklumkan kepada encik azizi. </li>
                       
                      </ul>
                      </div>
                     
                
                   
                     <!----------2nd col------->
                    <!-- <div class="col-lg-4">
                     <div class="card card-dashboard bg-warning text-black  " style="width: 18rem;">
                       <div class="card-body">
                           <h5 class="card-title">RM{{ $reportclasses->where('month','sep2022')->sum('allowance') ?? '' }}</h5>
                      
                             <p class="card-text">Total Allowance September 22</p>
                           
                         </div>
                    
                     </div>
                     </div>
                   
                     </div>
                     
                     <!-----------------row 2nd-------->
                     
                      <!-- <div class="row">
                      <div class="col-lg-4">
                   <div class="card card-dashboard bg-danger text-white " style="width: 18rem;">
                       <div class="card-body">
                      
                           <h5 class="card-title">RM{{ $reportclasses->where('month','oct2022')->sum('fee_student') ?? '' }}</h5>
                      
                             <p class="card-text">Total Sales October 22</p>
                           
                         </div>
                    
                     </div>
                     </div>
                     <!----------2nd col------->
                    <!-- <div class="col-lg-4">
                     <div class="card card-dashboard bg-warning text-black  " style="width: 18rem;">
                       <div class="card-body">
                           <h5 class="card-title">RM{{ $reportclasses->where('month','oct2022')->sum('allowance') ?? '' }}</h5>
                      
                             <p class="card-text">Total Allowance October 22</p>
                           
                         </div>
                    
                     </div>
                     </div>
                   
                     </div>-->
                     

                 
                   @else
                   @endif

              
@endsection

@section('scripts')

  

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
<script>
var xValues = ['mar22','apr22','may22','jun22','jul22','ogs22','sep22','oct22','nov22','dec22','jan23','feb23'];





var feemar22 = <?php echo $reportclasses->where('month','mar2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feeapr22 = <?php echo $reportclasses->where('month','apr2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feemay22 = <?php echo $reportclasses->where('month','may2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feejun22 = <?php echo $reportclasses->where('month','june2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feejul22 = <?php echo $reportclasses->where('month','jul2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feeogs22 = <?php echo $reportclasses->where('month','ogs2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feesep22 = <?php echo $reportclasses->where('month','sep2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feeoct22 = <?php echo $reportclasses->where('month','oct2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feenov22 = <?php echo $reportclasses->where('month','nov2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feedec22 = <?php echo $reportclasses->where('month','dec2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feejan23 = <?php echo $reportclasses->where('month','jan2023')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
var feefeb23 = <?php echo $reportclasses->where('month','feb2023')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;



var alwmar22 = <?php echo $reportclasses->where('month','mar2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwapr22 = <?php echo $reportclasses->where('month','apr2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwmay22 = <?php echo $reportclasses->where('month','may2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwjun22 = <?php echo $reportclasses->where('month','june2022')->whereNull('deleted_at')->sum('allowance') ?? ''?>;
var alwjul22 = <?php echo $reportclasses->where('month','jul2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwogs22 = <?php echo $reportclasses->where('month','ogs2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwsep22 = <?php echo $reportclasses->where('month','sep2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwoct22 = <?php echo $reportclasses->where('month','oct2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwnov22 = <?php echo $reportclasses->where('month','nov2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwdec22 = <?php echo $reportclasses->where('month','dec2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwjan23 = <?php echo $reportclasses->where('month','jan2023')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwfeb23 = <?php echo $reportclasses->where('month','feb2023')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: [feemar22,feeapr22,feemay22,feejun22,feejul22,feeogs22,feesep22,feeoct22,feenov22,feedec22,feejan23,feefeb23],
      label:'Total Fees',
    },{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(255, 99, 71, 1)",
      borderColor: "rgba(255, 108, 49, 0.3)",
      data: [alwmar22,alwapr22,alwmay22,alwjun22,alwjul22,alwogs22,alwsep22,alwoct22,alwnov22,alwdec22,alwjan23,alwfeb23],
      label:'Total Allowance',
    }
  ]
  },
  options: {
    maintainAspectRatio:false,
    legend: {
      display: true,
      
      
    },
    scales: {
      yAxes: [{ticks: {min: 0, max:50000}}],
    }
  }
});
</script>
@parent

@endsection