<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-group" aria-hidden="true"></i> Customer
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
                        <h3 class="box-title">Add New Customer</h3>
                        
                        <a href="<?php echo base_url('customer');?>" class="btn btn-success btn-send pull-right"><i class="fa fa-fw fa-backward"></i> Back</a>
                    </div>
                    <div class="box-body">
                        <!-- We're going to place the form here in the next step addCustomer-->
                        <form id="contact-form" method="post" action="" role="form">

                            <div class="messages"></div>

                            <div class="controls">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Firstname *</label>
                                            <input id="" type="text" name="first_name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required." pattern="[A-Za-z\s]+" value="<?php echo set_value('first_name');?>">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">Lastname *</label>
                                            <input id="" type="text" name="last_name" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." pattern="[A-Za-z\s]+" value="<?php echo set_value('last_name');?>">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Email *</label>
                                            <input id="" type="email" name="email" class="form-control" placeholder="Please enter your email *" data-error="Valid email is required." value="<?php echo set_value('email');?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Phone * <i class="fa fa-fw fa-plus-circle add_phone" title="Add new phone no." style="cursor:pointer"></i></label>
                                            <span class="phoneContent">
                                                <div class="input-group my-colorpicker2 colorpicker-element">
                                            <input id="" type="text" name="phone_no[]" class="form-control" placeholder="Please enter your phone." required="required"  pattern="[6789][0-9]{9}"    value="<?php echo set_value('phone_no[0]');?>">
                                                    <div class="input-group-addon"><i class="fa fa-fw fa-minus-circle deleteNo"></i></div>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Address</label>
                                            <input id="form_email" type="text" name="address" class="form-control" placeholder="" value="<?php echo set_value('address');?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">City</label>
                                            <input id="form_email" type="text" name="city" class="form-control" placeholder="" data-error="Valid email is required." value="<?php echo set_value('city');?>">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Pin</label>
                                            <input id="form_email" type="text" name="pin" class="form-control" placeholder="" data-error="Valid email is required." value="<?php echo set_value('pin');?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Birhday</label>
                                            <input type="text" name="birthday"  class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" id="" value="<?php echo set_value('birthday');?>">
<!--                                            <input id="form_email" type="text" name="birthday" class="form-control" placeholder="" data-error="Valid email is required.">-->
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Spouse</label>
                                            <input id="" type="text" name="spouse" class="form-control" placeholder="" data-error="" value="<?php echo set_value('spouse');?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Spouse Mobile <i class="fa fa-fw fa-plus-circle add_spouse_phone" title="Add new phone no." style="cursor:pointer"></i></label>
                                            <span class="spousePhoneContent">
                                            <input id="" type="text" name="spouse_mobile[]" class="form-control"  placeholder="" value="<?php echo set_value('spouse_mobile[0]');?>">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Spouse Birthday</label>
                                            <input id="" type="text" name="spouse_birthday" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" placeholder="" data-error="" value="<?php echo set_value('spouse_birthday');?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Anniversary</label>
                                            <input id="" type="text" name="aniversary" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-error="" value="<?php echo set_value('aniversary');?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Child 1 Name</label>
                                            <input id="" type="text" name="child_1_name" class="form-control"  value="<?php echo set_value('child_1_name');?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Child 1 Birthday</label>
                                            <input id="" type="text" name="child_1_birthday" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-error="" value="<?php echo set_value('child_1_birthday');?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Child 2 Name</label>
                                            <input id="" type="text" name="child_2_name" class="form-control"  value="<?php echo set_value('child_2_name');?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Child 2 Birthday</label>
                                            <input id="" type="text" name="child_2_birthday" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-error="" value="<?php echo set_value('child_2_birthday');?>">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Preferred Start Date</label>
                                            <input id="" type="text" name="preferred_from_date_of_journey" class="form-control datepicker" placeholder=""  value="<?php echo set_value('preferred_from_date_of_journey');?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Preferred End Date</label>
                                            <input id="" type="text" name="preferred_to_date_of_journey" class="form-control datepicker" placeholder="" data-error="" value="<?php echo set_value('preferred_to_date_of_journey');?>">
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Preferred Location</label>
                                            <input id="" type="text" name="preferred_location" class="form-control" placeholder=""  value="<?php echo set_value('preferred_location');?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Total Family member</label>
                                            <input id="" type="text" name="no_of_family_member" class="form-control" placeholder="" data-error="" value="<?php echo set_value('no_of_family_member');?>">
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_message">Notes</label>
                                            <textarea id="form_message" name="notes" class="form-control" placeholder="" rows="4" data-error="Please, leave us a message." value=""><?php echo set_value('notes');?></textarea>
                                        </div>
                                    </div>
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

<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>

<script>
    $(function () {
        $('.datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
        });
        
//        $('.add_phone').click(function(){
//            var str = '<br><input id="" type="text" name="phone_no[]" class="form-control" placeholder="Please enter phone."  pattern="[6789][0-9]{9}"    value="">'
//            $('.phoneContent').append(str);
//        });
//        
//        $('.add_spouse_phone').click(function(){
//            var str = '<br><input id="" type="text" name="spouse_mobile[]" class="form-control" placeholder="Please enter phone."  pattern="[6789][0-9]{9}"    value="">'
//            $('.spousePhoneContent').append(str);
//        })
        
        $('.add_phone').click(function(){
            var str = '<div class="input-group my-colorpicker2 colorpicker-element phoneHolder"><input id="" type="text" name="phone_no[]" class="form-control" placeholder="Please enter phone."  pattern="[6789][0-9]{9}"    value=""><div class="input-group-addon"><i class="fa fa-fw fa-minus-circle deleteNo"></i></div></div>'
            $('.phoneContent').append(str);
        });
        
        $('.add_spouse_phone').click(function(){
            var str = '<div class="input-group my-colorpicker2 colorpicker-element phoneHolder"><input id="" type="text" name="spouse_mobile[]" class="form-control" placeholder="Please enter phone."  pattern="[6789][0-9]{9}"    value=""><div class="input-group-addon"><i class="fa fa-fw fa-minus-circle deleteNo"></i></div></div>'
            $('.spousePhoneContent').append(str);
        });
        
        $('#contact-form').on('click','.deleteNo',function(){
            $(this).parent().parent().remove();
        })
        
        
    })
    
    //Datemask2 mm/dd/yyyy
</script>

<style>
    .phoneHolder{
        margin-top: 15px;
    }
</style>
 