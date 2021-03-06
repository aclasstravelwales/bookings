@can('customer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.customers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.customer.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.customer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-customernameCustomers">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.customername') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.pickup_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.pickup_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.where_from') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.where_to') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.driver') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.vehicle') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.wheelchair') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.updated_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.deleted_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $key => $customer)
                        <tr data-entry-id="{{ $customer->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $customer->id ?? '' }}
                            </td>
                            <td>
                                @foreach($customer->customernames as $key => $item)
                                    <span class="badge badge-info">{{ $item->first_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $customer->pickup_date ?? '' }}
                            </td>
                            <td>
                                {{ $customer->pickup_time ?? '' }}
                            </td>
                            <td>
                                {{ $customer->where_from ?? '' }}
                            </td>
                            <td>
                                {{ $customer->where_to ?? '' }}
                            </td>
                            <td>
                                {{ App\Customer::DRIVER_SELECT[$customer->driver] ?? '' }}
                            </td>
                            <td>
                                {{ $customer->vehicle ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $customer->wheelchair ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $customer->wheelchair ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $customer->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $customer->updated_at ?? '' }}
                            </td>
                            <td>
                                {{ $customer->deleted_at ?? '' }}
                            </td>
                            <td>
                                @can('customer_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.customers.show', $customer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('customer_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.customers.edit', $customer->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('customer_delete')
                                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('customer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.customers.massDestroy') }}",
    className: 'btn-danger',
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
    pageLength: 100,
  });
  let table = $('.datatable-customernameCustomers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection