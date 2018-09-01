@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.relations.management') . ' | ' . trans('labels.backend.relations.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.relations.management') }}
        <small>{{ trans('labels.backend.relations.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($relation, ['route' => ['admin.relations.update', $relation], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-relation']) }}

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.relations.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.relations.partials.relations-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="form-group">
                {{-- Including Form blade file --}}
                @include("backend.relations.form")
                <div class="edit-form-btn">
                    {{ link_to_route('frontend.relations.relations.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                    <div class="clearfix"></div>
                </div><!--edit-form-btn-->
            </div><!--form-group-->
        </div><!--box-body-->
    </div><!--box box-success -->
    {{ Form::close() }}
@endsection
