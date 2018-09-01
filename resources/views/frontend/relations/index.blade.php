@extends ('frontend.layouts.app')

@section ('title', trans('labels.frontend.relations.management'))

@section('page-header')
    <h1>{{ trans('labels.frontend.relations.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.frontend.relations.management') }}</h3>

            <div class="box-tools pull-right">
                @include('frontend.relations.partials.relations-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-header with-border">
            {{--<button type="button" class="btn btn-info show-modal" data-form="_add_custom_url_form"
                    data-header="Add Custom URL"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Custom URL
            </button>--}}
        </div><!--box-header with-border-->


        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="relations-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.frontend.relations.table.id') }}</th>
                        <th>{{ trans('labels.frontend.relations.table.name') }}</th>
                        <th>{{ trans('labels.frontend.relations.table.createdat') }}</th>
                        <th>{{ trans('labels.frontend.relations.table.updatedat') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <thead class="transparent-bg">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>{{ trans('labels.frontend.relations.table.id') }}</th>
                        <th>{{ trans('labels.frontend.relations.table.name') }}</th>
                        <th>{{ trans('labels.frontend.relations.table.createdat') }}</th>
                        <th>{{ trans('labels.frontend.relations.table.updatedat') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </tfoot>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function () {
            var dataTable = $('#relations-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("frontend.relations.api.relations.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.relations.table')}}.id'},
                    {data: 'name', name: '{{config('module.relations.table')}}.name'},
                    {data: 'created_at', name: '{{config('module.relations.table')}}.created_at'},
                    {data: 'updated_at', name: '{{config('module.relations.table')}}.updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        {extend: 'copy', className: 'copyButton', exportOptions: {columns: [0, 1]}},
                        {extend: 'csv', className: 'csvButton', exportOptions: {columns: [0, 1]}},
                        {extend: 'excel', className: 'excelButton', exportOptions: {columns: [0, 1]}},
                        {extend: 'pdf', className: 'pdfButton', exportOptions: {columns: [0, 1]}},
                        {extend: 'print', className: 'printButton', exportOptions: {columns: [0, 1]}}
                    ]
                }
            });

            backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
