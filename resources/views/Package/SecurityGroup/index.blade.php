@extends('Templates.templates')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="panel ">
                @include('Package.SecurityGroup.partials.actions-group')
            </div>
            {{--table--}}
            <div class="panel panel-default">
                <div class="panel-heading">Groups</div>
                @include('Package.SecurityGroup.partials.table')
            </div>
            {{ $groups->links() }}
        </div>
    </div>
@endsection

