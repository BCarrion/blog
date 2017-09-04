<div class="col-md-7">
    <div class="form-group">
        <label for="email">Category Name</label>
        {!! Form::text('name', old('name'),['class'=>'form-control','placeholder'=>'type a category name']) !!}
    </div>
    <div class="form-group">
        <label for="pwd">Description:</label>
        {!! Form::textarea('description', old('description'),['class'=>'form-control']) !!}
    </div>
</div>