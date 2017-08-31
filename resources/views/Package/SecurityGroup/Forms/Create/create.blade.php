@extends('Templates.templates')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>New Category</h4>
                <h6>In this section you can create a new category</h6></div>
                <br>
                <div class="container-fluid">
                    {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                        <div class="row">
                            @include('Package.BlogCategory.Forms.create.partials.basic-information')
                            @include('Package.BlogCategory.Forms.create.partials.configuration')            
                        </div> 
                        <button type="submit" class="btn btn-default">Submit</button>
                    {!! Form::close() !!}
                </div>                           
            </div>
        </div>
    </div>
@endsection