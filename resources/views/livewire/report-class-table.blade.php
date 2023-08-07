<div>
    <select wire:model="month">
        <option value="">Select a month</option>
        <!-- You may want to dynamically generate these options -->
        @foreach($months as $month)
            <option value="{{ $month }}">{{ $month }}</option>
        @endforeach
        <!-- and so on -->
    </select>
    <div wire:loading wire:target="selectedMonth">
        Loading...
    </div>

    <div wire:loading.remove>
    @if ($selectedMonth)
<br>
 <div class="">
 <button wire:click="selectAll" class="btn btn-primary">Select All</button>
    <button wire:click="downloadCSV" class="btn btn-success">Download CSV</button>
 </div>
<br>
            <table id="data" class="table table-bordered rounded table-striped table-hover">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.reportClass.fields.id') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.teacher') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.registrar') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.month') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.created_at') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.classname') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.date') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.total_hour') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.classname_2') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.date_2') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.total_hour_2') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.allowance') }}</th>
                       
                        @can('report_class_delete')
                            <th>{{ trans('cruds.reportClass.fields.note') }}</th>
                 
                        <th>{{trans('global.action')}}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportclasses as $reportclass)
                        <tr>
                            <td><input type="checkbox" wire:model="selectedItems" value="{{ $reportclass->id }}"></td>
                            <td>{{ $reportclass->id }}</td>
                            <td>{{ optional($reportclass->created_by)->name }}</td>
                            <td>{{ optional($reportclass->registrar)->name }}</td>
                            <td>{{ $reportclass->month }}</td>
                            <td>{{ $reportclass->created_at }}</td>
                            <td>{{ optional($reportclass->class_name)->name }}</td>
                            <td>{{ $reportclass->date }}</td>
                            <td>{{ $reportclass->total_hour }}</td>
                            <td>{{ optional($reportclass->class_name_2)->name }}</td>
                            <td>{{ $reportclass->date_2 }}</td>
                            <td>{{ $reportclass->total_hour_2 }}</td>
                            <td>{{ $reportclass->allowance }}</td>
                            
                            @can('report_class_delete')
                                <td>{{ $reportclass->note }}</td>
                          
                            <td>
                               <button wire:click="confirmDelete({{ $reportclass->id }})" class="btn btn-danger">Delete</button>
                            </td>
                                @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($confirmingDelete)
    <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="cancelDelete">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="cancelDelete">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endif
            
    {{ $reportclasses->links() }}


        @endif
    </div>
    
</div>
<!--
<div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
        <div class="py-3 px-4">
          <div class="relative max-w-xs">
            <label for="hs-table-with-pagination-search" class="sr-only">Search</label>
            <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="p-3 pl-10 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="Search for items">
            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4">
              <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
              <tr class="divide-x divide-gray-200 ">
                <th scope="col" class="py-3 px-4 pr-0 w-12">
                  <div class="flex items-center h-5">
                    <input id="hs-table-pagination-checkbox-all" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="hs-table-pagination-checkbox-all" class="sr-only">Checkbox</label>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-48">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-24">Age</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase ">Address</th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase w-24">Action</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
              <tr class="odd:bg-white even:bg-gray-100 divide-x divide-gray-200">
                <td class="py-3 pl-4">
                  <div class="flex items-center h-5">
                    <input id="hs-table-pagination-checkbox-1" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="hs-table-pagination-checkbox-1" class="sr-only">Checkbox</label>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">John Brown</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">45</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">New York No. 1 Lake Park</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                </td>
              </tr>

              <tr class="odd:bg-white even:bg-gray-100 divide-x divide-gray-200">
                <td class="py-3 pl-4">
                  <div class="flex items-center h-5">
                    <input id="hs-table-pagination-checkbox-2" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="hs-table-pagination-checkbox-2" class="sr-only">Checkbox</label>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">Jim Green</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">27</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">London No. 1 Lake Park</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                </td>
              </tr>

              <tr class="odd:bg-white even:bg-gray-100 divide-x divide-gray-200">
                <td class="py-3 pl-4">
                  <div class="flex items-center h-5">
                    <input id="hs-table-pagination-checkbox-3" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="hs-table-pagination-checkbox-3" class="sr-only">Checkbox</label>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">Joe Black</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">31</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">Sidney No. 1 Lake Park</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                </td>
              </tr>

              <tr class="odd:bg-white even:bg-gray-100 divide-x divide-gray-200">
                <td class="py-3 pl-4">
                  <div class="flex items-center h-5">
                    <input id="hs-table-pagination-checkbox-4" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="hs-table-pagination-checkbox-4" class="sr-only">Checkbox</label>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">Edward King</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">16</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">LA No. 1 Lake Park</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                </td>
              </tr>

              <tr class="odd:bg-white even:bg-gray-100 divide-x divide-gray-200">
                <td class="py-3 pl-4">
                  <div class="flex items-center h-5">
                    <input id="hs-table-pagination-checkbox-5" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                    <label for="hs-table-pagination-checkbox-5" class="sr-only">Checkbox</label>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">Jim Red</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">45</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">Melbourne No. 1 Lake Park</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="py-1 px-4">
          <nav class="flex items-center space-x-2">
            <a class="text-gray-400 hover:text-blue-600 p-4 inline-flex items-center gap-2 font-medium rounded-md" href="#">
              <span aria-hidden="true">«</span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="w-10 h-10 bg-blue-500 text-white p-4 inline-flex items-center text-sm font-medium rounded-full" href="#" aria-current="page">1</a>
            <a class="w-10 h-10 text-gray-400 hover:text-blue-600 p-4 inline-flex items-center text-sm font-medium rounded-full" href="#">2</a>
            <a class="w-10 h-10 text-gray-400 hover:text-blue-600 p-4 inline-flex items-center text-sm font-medium rounded-full" href="#">3</a>
            <a class="text-gray-400 hover:text-blue-600 p-4 inline-flex items-center gap-2 font-medium rounded-md" href="#">
              <span class="sr-only">Next</span>
              <span aria-hidden="true">»</span>
            </a>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>-->