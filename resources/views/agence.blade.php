@extends('layouts.layout')
@section('content')

<h5 class="c-grey-900">
    Gestion des Agences
</h5>
<div class="mT-30">

        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ url('users/create') }}">
                    add
                </a>
            </div>
        </div>

    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-User">
            <thead>
                <th>#</th>
                <th>Nom de l'agence</th>
                <th>Adresse</th>
                <th>Personne Responsable</th>
                <th>Telephone</th>
                <th>Email</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($agence as $agence)
                <tr data-entry-id="{{ $agence->id }}">
                    <td></td>
                    <td>{{ $agence->name }}</td>
                    <td>{{ $agence->adresse }}</td>
                    <td>{{ $agence->first_name }} {{ $agence->last_name }}</td>
                    <td>{{ $agence->telephone }}</td>
                    <td>{{ $agence->email }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ url('users', $agence->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a class="btn btn-xs btn-info" href="{{ url('users', $agence->id) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
