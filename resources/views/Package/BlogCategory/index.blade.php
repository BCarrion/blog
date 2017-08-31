@extends('Templates.templates')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="panel ">
                @include('Package.BlogCategory.partials-index.actions-group')
            </div>
            {{--table--}}
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>
                @include('Package.BlogCategory.partials-index.table')
            </div>
            {{ $blogCategories->links() }}
        </div>
    </div>
@endsection

