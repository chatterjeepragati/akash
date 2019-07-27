<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-car" aria-hidden="true"></i> Car Model
        <small>Management</small>
      </h1>
    </section>

    <section class="content">
        <div class="row">

            <div class="col-sm-12 col-xl-8 offset-xl-2 py-5">
                
                
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>'); ?>.
                
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Car Model</h3>
                        
                        <a href="<?php echo base_url('carmodel');?>" class="btn btn-success btn-send pull-right"><i class="fa fa-fw fa-backward"></i> Back</a>
                    </div>
                    <div class="box-body">
                        <!-- We're going to place the form here in the next step addCustomer-->
                        <form id="contact-form" method="post" action="" role="form">

                            <div class="messages"></div>

                            <div class="controls">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Model Name *</label>
                                            <input id="" type="text" name="model" class="form-control" placeholder="Car Model Name" required="required"  value="<?php echo set_value('model');?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">No Of Seat</label>
                                            <input id="" type="number" name="no_of_seat" class="form-control" placeholder=""  value="<?php echo set_value('no_of_seat');?>">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Type</label><br>
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="type" value="AC">
                                            </label>
                                            AC
                                            </span>
                                            
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="type" value="Non AC">
                                            </label>
                                            Non AC
                                            </span>
                                                
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-success btn-send" value="Save">
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-muted">
                                            <strong>*</strong> These fields are required.</p>
                                    </div>
                                </div>
                            </div>

                        </form> 
                    </div>
                </div> <!-- box box-primary -->

            </div>
        </div>
    </section>


</div>

<link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css'); ?>">
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js');?>"></script>

<script>
    $(function () {
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })
        
        
        $('#contact-form').on('click','.deleteNo',function(){
            $(this).parent().parent().remove();
        })
    })
    
    //Datemask2 mm/dd/yyyy
</script>

<style>
    .roomTypes{
        margin:5px;
    }
    .phoneHolder{
        margin-top: 15px;
    }
</style>
 