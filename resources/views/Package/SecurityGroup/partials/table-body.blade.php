@foreach($groups as $group)
    <tr>
        <td><input type="checkbox" value=""></td>
        <td>{{$group->name}}</td>
        <td>{{$group->created_at}}</td>
        <td>{{$group->updated_at}}</td>

        @include('Package.SecurityGroup.partials.actions-by-group')
    </tr>
@endforeach