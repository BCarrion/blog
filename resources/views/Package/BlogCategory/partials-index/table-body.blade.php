@foreach($paginate as $blogCategory)
    <tr>
        <td><input type="checkbox" value=""></td>
        <td>{{$blogCategory['spaces'].$blogCategory['object']->name}}</td>
        <td>{{$blogCategory['object']->created_at}}</td>
        <td>{{$blogCategory['object']->updated_at}}</td>
        <td>
            @include('Package.BlogCategory.partials-index.action-by-group')
        </td>
    </tr>
@endforeach


