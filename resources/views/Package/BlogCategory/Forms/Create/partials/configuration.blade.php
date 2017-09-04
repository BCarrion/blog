<div class="col-md-4">
    <div class="panel">
        <h4>Configuration <i class="fa fa-cogs" aria-hidden="true"></i></h4>
        {{--Configurations--}}
        {!! Configuration::categoriesRender('categories') !!}

        {!! Configuration::visibilityRender('visibility') !!}


        @include('Package.BlogCategory.Forms.Create.partials.groups')
        @include('Package.BlogCategory.Forms.Create.partials.colaborators')
    </div>
</div>
{{--Modal window--}}
@include('Package.BlogCategory.Forms.Create.partials.modal.modal')
@include('Package.BlogCategory.Forms.Create.partials.modal.modal-groups')