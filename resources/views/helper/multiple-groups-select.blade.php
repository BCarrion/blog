<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 31/08/2017
 * Time: 11:25
 */
?>

<select multiple class="form-control" v-model="{{$name}}">
    @foreach($groups as $group)
        <option value='{"id":{{$group['id']}},"name":"{{$group['name']}}"}'>
            {{$group['name']}}
        </option>
    @endforeach
</select>
