<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 30/08/2017
 * Time: 17:23
 */
?>
<div class="form-group">
    <label for="sel1">Assign groups to this category</label>
    <div>
        <a data-toggle="modal"
           data-target="#myGroup"
           class=" btn btn-danger "
           role="button">Add Group
            <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
    </div>

    <div v-for="(group, index) in groups">
    <span class="label label-warning">@{{ JSON.parse(group).name }}
        <i class="fa fa-window-close" aria-hidden="true" v-on:click="deleteItem(index,'groups')"></i></span>
        <input type="text" name="groups[]" hidden="hidden" :value="group">
    </div>

</div>