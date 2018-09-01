@extends ('frontend.layouts.app')

@section ('title', trans('labels.frontend.relations.management') . ' | ' . trans('labels.frontend.relations.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.frontend.relations.management') }}
        <small>{{ trans('labels.frontend.relations.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($relation, ['route' => ['frontend.relations.relations.update', $relation], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-relation']) }}

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.frontend.relations.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('frontend.relations.partials.relations-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="form-group">
                {{-- Including Form blade file --}}
                @include("frontend.relations.form")
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
