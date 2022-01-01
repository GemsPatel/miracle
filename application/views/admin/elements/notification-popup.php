<style>
#notificationModal .modal-footer{ padding:10px !important; margin:0 !important}
</style>

<a id="noti_popup_a" data-target="#notificationModal" data-toggle="modal"></a>
<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body b_color" id="modal_body"
				style="font-size: 14px">
				<div class="notification">
					<div></div>
				</div>
			</div>
			<div class="modal-footer">
				<input class="btn" type="button" data-dismiss="modal" value="OK" />
			</div>
		</div>
	</div>
</div>

<!-- Permission View Popup Model -->
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg hide permissionModal" data-toggle="modal" data-target="#permissionModal"></button>
    
    <!-- Modal -->
    <div id="permissionModal" class="modal fade" role="dialog">
    	<div class="modal-dialog text-center">
    		<!-- Modal content-->
    		<div class="modal-content" style="width: 60%; margin: 0 auto;">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h4 class="modal-title"><strong>Warning</strong></h4>
    			</div>
    			<div class="modal-body">
    				<p>Sorry! you don't have View permission.</p>
    			</div>
    			<div class="modal-footer" style="text-align: center;">
    				<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
    			</div>
    		</div>
    
    	</div>
    </div>
    
<!-- Delete View Popup Model -->
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg hide deleteModal" data-toggle="modal" data-target="#deleteModal"></button>
    
    <!-- Modal -->
    <div id="deleteModal" class="modal fade" role="dialog">
    	<div class="modal-dialog text-center">
    		<!-- Modal content-->
    		<div class="modal-content" style="width: 60%; margin: 0 auto;">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h4 class="modal-title"><strong>Warning</strong></h4>
    			</div>
    			<div class="modal-body">
    				<input type="hidden" name="delete" id="delete" value="">
    				<p>Are you sure want to <span id="deleteMessage" style="font-weight: 600;"></span> delete ?</p>
    			</div>
    			<div class="modal-footer" style="text-align: center;">
    				<button type="button" class="button button-red" id="delete_btn">
                		<i class="fa fa-trash" aria-hidden="true"></i> Delete
                	</button>
    			</div>
    		</div>
    
    	</div>
    </div>