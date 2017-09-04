<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 31/08/2017
 * Time: 12:37
 */
?>
<div class="form-group">
    <label for="sel1">Visibility</label>
    {!! Form::select('visibility', $items, null,
    array('class' => 'form-control'))
    !!}
</div>

<div class="form-group">
    <label for="sel1">Category order</label>

    <select class="form-control" id="sel1" name="parent_name">
        <option value="0" selected>Main</option>
        @foreach($categories as $category)
            <option value="{{$category['object']->id}}" {{Configuration::selected($category['object']->id, old('parent_name'))}}>
                {{$category['spaces'].$category['object']->name}}
            </option>
        @endforeach
    </select>
</div>
