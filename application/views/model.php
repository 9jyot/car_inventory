<script src="js/angular-validation/add-model.js"></script>
<link href="css/plugin/fileup.css" rel="stylesheet" type="text/css">
<!-- Page Content -->
	<div id="page-content-wrapper" style="padding-left: 260px;" ng-app="addModel" ng-controller="mdlController">
       
            <div class="container-fluid">
                <h3>Model</h3>
               	<form name="ModelForm" id="modelForm">
	                <fieldset>
	                    <div class="m-b-20">
	                        <div class="form-group form-inline">
		                        <label class="control-label col-sm-2">Model Name</label>
		                        <div class="col-sm-4">
			                        <input type="text" class="form-control m-b-20" name="model" ng-model="modelForm.required" validator="required,minlength" minlength = "3"  message-id="model" />
			                        <span id="model"></span><span class="validation-invalid">{{errorMessage.modlnm }}</span>
		                        </div>
		                        <label class="control-label col-sm-2">Manufacturer Name</label>
		                        <div class="col-sm-4">
			                        <select class="form-control" name="manufacturer" ng-model="modelForm.manufacturerName" validator="required" message-id="manufacturer">
		                            <option value="">Select Manufacturer Name</option>
		                            
	                                <?php foreach($manufacturer_data as $row){ ?>
	                                    <option value="<?php echo $row['manufacturer_id']; ?>"><?php echo strtoupper($row['name']); ?></option>
	                                <?php } ?>
		                        </select>
		                        <span id="manufacturer"></span>
		                        </div>
                           	</div>
                           	<div class="form-group form-inline">
		                        <label class="control-label col-sm-2">Color</label>
		                        <div class="col-sm-4">
			                        <input type="text" class="form-control m-b-20" name="color" ng-model="modelForm.modelColor" validator="required"  message-id="color"/>
			                        <span id="color"></span><span class="validation-invalid">{{errorMessage }}</span>
		                        </div>
		                        
                           	</div>
                           	<div class="form-group form-inline">
		                        <label class="control-label col-sm-2">Manufacturing Year</label>
		                        <div class="col-sm-4">
			                      <select ng-model="modelForm.modelMfgYear" name="manufacturing_year" class="yrselectdesc form-control">
								  <option ng-for= ></option>
								  </select>
			                        
		                        </div>
		                        
                           	</div>
                           	<div class="form-group form-inline">
		                        <label class="control-label col-sm-2">Registration Number</label>
		                        <div class="col-sm-4">
			                        <input type="text" class="form-control m-b-20" name="registrationNo" ng-model="modelForm.modelRegNo" min="10" max="10" validator="required" valid-method="submit-only" message-id="registrationNo"/>
			                        <span id="registrationNo"></span><span class="validation-invalid">{{errorMessage }}</span>
		                        </div>
		                        
                           	</div>  
                           	<div class="form-group form-inline">
		                        <label class="control-label col-sm-2">Note</label>
		                        <div class="col-sm-8">
			                        <textarea style="overflow:auto;resize:none" rows="3" cols="20" name="note" ng-model="modelForm.modelNote"  valid-method="submit-only"></textarea>
			                        
		                        </div>
		                        
                           	</div>
                           	<div class="form-group form-inline">
		                        <label class="control-label col-sm-2">Image</label>
		                        <div class="col-sm-8">
			                        <button type="button" class="btn btn-success fileup-btn">
								        Select files
								        <input ng-model="modelForm.modelImage" type="file" name="image" id="upload-2" multiple accept="image/*"  message-id="image" >
								    </button>
								        <span id="image"></span><span class="validation-invalid">{{errorMessage }}</span>

								    <!-- <a class="control-button btn btn-link" style="display: none"
								       href="javascript:$.fileup('upload-2', 'upload', '*')">Upload all</a> -->
								    <a class="control-button btn btn-link" style="display: none"
								       href="javascript:$.fileup('upload-2', 'remove', '*')">Remove all</a>

								    <div id="upload-2-queue" class="queue"></div>
			                        
		                        </div>
		                        
                           	</div>                      

	                    </div>
	                    <div class="btn-group" role="group">
	                        <button type="button" class="btn btn-success" ng-click="modelForm.submit(ModelForm)">Submit</button>
	                        <button class="btn btn-danger" ng-click="modelForm.reset(ModelForm)">Reset</button>
	                        
	                    </div>
						<pre>{{ modelForm |json }}</pre>
	                </fieldset>
	            </form> 
            </div>
        
    </div>
        <!-- /#page-content-wrapper -->
         <script src="js/angular-validation/add-model.js"></script>
        <script src="js/plugin/fileup.js"></script> 
        
<script>
       
		$.fileup({
            url: 'upload.php',
            inputID: 'upload-2',
            dropzoneID: 'upload-2-dropzone',
            queueID: 'upload-2-queue',
            onSelect: function(file) {
                $('#modelForm .control-button').show();
            },
            onRemove: function(file, total) {
                console.log(total);
                if (file === '*' || total === 1) {
                    $('#modelForm .control-button').hide();
                }
            },
            onSuccess: function(response, file_number, file) {
                console.log(response);
                $.growl.notice({ title: "Upload success!", message: file.name });
            },
            onError: function(event, file, file_number) {
                $.growl.error({ message: "Upload error!" });
            }
        });
		
		 

    </script>
        <script src="js/plugin/year-select.js"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {
               // $('.yearselect').yearselect();

               // $('.yrselectdesc').yearselect({step: 1, order: 'desc'});
                //$('.yrselectasc').yearselect({order: 'asc'});
            });
        </script>