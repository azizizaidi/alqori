@extends('layouts.admin')

@section('content')
@can('report_class_create')

<div>
        <label for="year">Select Year:</label>
        <select id="yearSelect" onchange="updateChart()">
        <option value="">select year</option>
       <option value="2022">2022</option>
       <option value="2023">2023</option>
</select>
    </div>
<div>
<canvas id="myChart" style="width:100%;max-width:700px"></canvas>
</div>
<br>

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.report-classes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.reportClass.title_singular') }}
            </a>
           
            @include('csvImport.modal', ['model' => 'ReportClass', 'route' => 'admin.report-classes.parseCsvImport'])
        </div>
    </div>
@endcan



<div class="card border shadow p-1">
    <div class="card-header">
        {{ trans('cruds.reportClass.title_singular') }} {{ trans('global.list') }}
    </div>
    

    <div class="card-body">
        <div class="table-responsive">
     
            @livewire('report-class-table')

        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent




<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('report_class_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.report-classes.massDestroy') }}",
    className: 'btn-danger rounded ',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-ReportClass:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})




</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>


//var feejan22 = <?php echo $reportclasses->where('month',null)->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feefeb22 = <?php echo $reportclasses->where('month','02-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;  
//var feemar22 = <?php echo $reportclasses->where('month','03-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feeapr22 = <?php echo $reportclasses->where('month','04-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feemay22 = <?php echo $reportclasses->where('month','05-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feejun22 = <?php echo $reportclasses->where('month','06-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feejul22 = <?php echo $reportclasses->where('month','07-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feeogs22 = <?php echo $reportclasses->where('month','08-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feesep22 = <?php echo $reportclasses->where('month','09-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feeoct22 = <?php echo $reportclasses->where('month','10-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feenov22 = <?php echo $reportclasses->where('month','11-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feedec22 = <?php echo $reportclasses->where('month','12-2022')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feejan23 = <?php echo $reportclasses->where('month','01-2023')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;
//var feefeb23 = <?php echo $reportclasses->where('month','02-2023')->whereNull('deleted_at')->sum('fee_student') ?? ''; ?>;


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
var alwmay23 = <?php echo $reportclasses->where('month','05-2023')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwjun23 = <?php echo $reportclasses->where('month','06-2023')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;

  // Define the chart data and options
  var chartData = {
    labels: ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november','december'],
    datasets: [{
     // fill: false,
    //  lineTension: 0,
     // backgroundColor: 'rgba(0,0,255,1.0)',
     // borderColor: 'rgba(0,0,255,0.1)',
    //  data: [],
    //  label: 'Total Fees(RM)',
   // }, {
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
   // var feeData = [];
    var allowanceData = [];

    // Retrieve the data for the selected year
    switch (selectedYear) {
      case '2022':
        //feeData = [feejan22,feefeb22,feemar22, feeapr22, feemay22, feejun22, feejul22, feeogs22, feesep22, feeoct22, feenov22, feedec22];
        allowanceData = [alwjan22,alwfeb22,alwmar22, alwapr22, alwmay22, alwjun22, alwjul22, alwogs22, alwsep22, alwoct22, alwnov22, alwdec22];
        break;
      case '2023':
       // feeData =[feejan23,feefeb23];
        allowanceData =[alwjan23,alwfeb23,alwmar23, alwapr23, alwmay23, alwjun23];
        break;
      default:
        // Handle default case or show an error message
        break;
    }

    // Update the chart data
    //chart.data.datasets[0].data = feeData;
    chart.data.datasets[0].data = allowanceData;
    chart.update();
  }
</script>
<!--
<script>
$(document).ready(function() {
    $('#loadData').click(function() {
        var month = $('#month').val();

        $.ajax({
            type: "POST",
            url: "/admin/report/get-data",
            data: {
                month: month,
                _token: "{{ csrf_token() }}"
            },
            success: function (data) {
                var thead = `
                    <thead>
                        <tr>
                            <th></th>
                            <th>Id</th>
                            <th>Teacher</th>
                            <th>Registrar</th>
                            <th>Month</th>
                            <th>Created at</th>
                            <th>Class Name</th>
                            <th>Date</th>
                            <th>Total Hour</th>
                            <th>Class Name 2</th>
                            <th>Date 2</th>
                            <th>Total Hour 2</th>
                            <th>Allowance</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>`;
                
                $.each(data, function(key, item){
                    var createdAt = new Date(item.created_at);
                    createdAt.setHours(createdAt.getHours() + 8);
                    var options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
                    var dateStr = createdAt.toLocaleString('en-US', options);
                    
                    thead += '<tr>';
                    thead += '<td></td>'; 
                    thead += '<td>'+ item.id +'</td>'; 
                    thead += '<td>'+ item.created_by.name +'</td>'; 
                    thead += '<td>' + (item.registrar ? (item.registrar.name + '&nbsp;' + item.registrar.code) : '') + '</td>';
                    thead += '<td>'+ item.month +'</td>'; 
                    thead += '<td>'+ dateStr +'</td>'; 
                    thead += '<td>'+ item.class_name.name +'</td>'; 
                    thead += '<td>'+ item.date +'</td>'; 
                    thead += '<td>'+ item.total_hour +'</td>'; 
                    thead += '<td>'+ (item.class_name_2 ? item.class_name_2.name : 'null') +'</td>'; 
                    thead += '<td>'+ item.date_2 +'</td>'; 
                    thead += '<td>'+ item.total_hour_2 +'</td>'; 
                    thead += '<td>'+ 'RM'+item.allowance +'</td>'; 
                    thead += '<td>'+ item.note +'</td>'; 
                    thead += '</tr>';
                });

                thead += '</tbody>';
                $('#data').html(thead);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
</script>-->



@endsection