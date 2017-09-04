<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 30/08/2017
 * Time: 14:58
 */
?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Groups</h4>
            </div>
            <div class="modal-body">
                <h6>Select the group or groups</h6>

                {!! Configuration::groupsRender("colaborators") !!}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" >ok</button>
            </div>
        </div>

    </div>
</div>


