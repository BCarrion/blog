<table class="table">
    <tr >
        <th><label><input type="checkbox" value=""></label></th>
        <th>Categories name</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Actions</th>
    </tr>
    @include('Package.BlogCategory.partials-index.table-body')
</table>
<div>
    {{--verify if $paginateData is not empty --}}
    @if(!empty($paginate))
        {{--Show the links if the paginateData is not empty--}}
        {{$paginate->render()}}
    @endif
</div>