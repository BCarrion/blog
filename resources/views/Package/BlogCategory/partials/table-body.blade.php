@foreach($blogCategories as $blogCategory)
    <tr>
        <td><input type="checkbox" value=""></td>
        <td>{{$blogCategory->name}}</td>
        <td>
            @if(count($blogCategory->groups)> 0)
                @foreach($blogCategory->groups as $group)
                    <span class="label label-default">{{$group->name}}</span>
                @endforeach
            @else
                <span class="label label-danger">No group assigned</span>
            @endif
        </td>
        <td>{{$blogCategory->created_at}}</td>
        <td>{{$blogCategory->updated_at}}</td>
        <td>
            @include('Package.BlogCategory.partials.action-by-group')
        </td>
    </tr>
@endforeach