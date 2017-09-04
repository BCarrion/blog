<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 30/08/2017
 * Time: 17:10
 */
?>
<div class="form-group">
    <label for="sel1">Assign collaborators to this category</label>
    <div>
        <a data-toggle="modal"
           data-target="#myModal"
           class=" btn btn-danger "
           role="button">Add Group
            <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
    </div>

    <div v-for="(colaborator, index) in colaborators">
    <span class="label label-warning">@{{ JSON.parse(colaborator).name }}
        <i class="fa fa-window-close" aria-hidden="true"
           v-on:click="deleteItem(index,'colaborators')"></i></span>
        <input type="text" name="colaborators[]" hidden="hidden" :value="colaborator">
    </div>

</div>