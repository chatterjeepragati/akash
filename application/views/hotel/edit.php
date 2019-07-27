<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-hotel" aria-hidden="true"></i> Hotel
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
                        <h3 class="box-title">Edit Hotel</h3>
                        
                        <a href="<?php echo base_url('hotel');?>" class="btn btn-success btn-send pull-right"><i class="fa fa-fw fa-backward"></i> Back</a>
                    </div>
                    <div class="box-body">
                        <!-- We're going to place the form here in the next step addCustomer-->
                        <form id="contact-form" method="post" action="" role="form">
                            <input type="hidden" name="id" value="<?php echo $hotel['id'];?>">
                            <div class="messages"></div>

                            <div class="controls">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Hotel Name *</label>
                                            <input id="" type="text" name="name" class="form-control" placeholder="Hotel Name" required="required" data-error="Firstname is required." pattern="[A-Za-z\s]+" value="<?php echo set_value('name',$hotel['name']);?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">Region</label>
                                            <select name="region" class="form-control">
                                                <option value="">Select One</option>
                                                <?php
                                                foreach($regions as $region):
                                                ?>
                                                <option value="<?php echo $region['id']; ?>" <?php echo  ($region['id'] == $hotel['region']) ? 'selected' : ''; ?>>
                                                    <?php echo $region['name']; ?>
                                                </option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Location</label>
                                            <input id="" type="text" name="location" class="form-control" placeholder="Please enter Location"  value="<?php echo set_value('location',$hotel['location']);?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Phone <i class="fa fa-fw fa-plus-circle add_phone" title="Add new phone no." style="cursor:pointer"></i></label>
                                            <span class="phoneContent">
                                            <?php 
                                            $i = 0;
                                            foreach($hotel['phone_no'] as $no):
                                            ?>
                                            <div class="input-group my-colorpicker2 colorpicker-element <?php  if($i > 0){ echo "phoneHolder"; } ?>">   
                                            <input id="" type="text" name="phone_no[]" class="form-control" placeholder="Please enter phone."  pattern="[6789][0-9]{9}" value="<?php echo set_value('phone_no[0]',$no);?>">
                                            <div class="input-group-addon"><i class="fa fa-fw fa-minus-circle deleteNo"></i></div>
                                            </div>
                                            <?php
                                            $i++;
                                            endforeach;
                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Address</label>
                                            <input id="" type="text" name="address" class="form-control" placeholder="" value="<?php echo set_value('address',$hotel['address']);?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Contact Person</label>
                                            <input id="" type="text" name="contact_person" class="form-control" placeholder=""  value="<?php echo set_value('contact_person',$hotel['contact_person']);?>">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Contact Person Mobile</label>
                                            <input id="" type="text" name="contact_person_no" class="form-control"  placeholder="" data-error="" value="<?php echo set_value('contact_person_no',$hotel['contact_person_no']);?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Room Types</label><br>
                                            
                                            <?php
                                            $i = 0;
                                            foreach($room_types as $room_type):
                                            ?>
                                            <span class="roomTypes">
                                            <label>
                                                <input type="checkbox" class="minimal" name="room_types[]" value="<?php echo $room_type['id'];?>" <?php echo in_array($room_type['name'], $hotel['roomTypes']) ? 'checked' : ''; ?>>
                                            </label>
                                            <?php echo $room_type['name'];?>
                                            </span>
                                            <?php
                                            $i++;
                                            endforeach;
                                            ?>
                                                
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Star Rating</label><br>
                                            
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="star_rating" value="1" <?php echo $hotel['star_rating'] == 1 ? 'checked' : ''; ?>>
                                            </label>
                                            1
                                            </span>
                                            
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="star_rating" value="2" <?php echo $hotel['star_rating'] == 2 ? 'checked' : ''; ?>>
                                            </label>
                                            2
                                            </span>
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="star_rating" value="3" <?php echo $hotel['star_rating'] == 3 ? 'checked' : ''; ?>>
                                            </label>
                                            3
                                            </span>
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="star_rating" value="4" <?php echo $hotel['star_rating'] == 4 ? 'checked' : ''; ?>>
                                            </label>
                                            4
                                            </span>
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="star_rating" value="5" <?php echo $hotel['star_rating'] == 5 ? 'checked' : ''; ?>>
                                            </label>
                                            5
                                            </span>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Parking Available</label><br>
                                            
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="parking_available" value="Yes" <?php echo $hotel['parking_available'] == 'Yes' ? 'checked' : ''; ?> >
                                            </label>
                                            Yes
                                            </span>
                                            
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="parking_available" value="No" <?php echo $hotel['parking_available'] == 'No' ? 'checked' : ''; ?>>
                                            </label>
                                            No
                                            </span>
                                            
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

<link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css'); ?>">
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js');?>"></script>

<script>
    $(function () {
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })
        
//        $('.add_phone').click(function(){
//            var str = '<br><input id="" type="text" name="phone_no[]" class="form-control" placeholder="Please enter phone."  pattern="[6789][0-9]{9}"    value="">'
//            $('.phoneContent').append(str);
//        })
        
        $('.add_phone').click(function(){
            var str = '<div class="input-group my-colorpicker2 colorpicker-element phoneHolder"><input id="" type="text" name="phone_no[]" class="form-control" placeholder="Please enter phone."  pattern="[6789][0-9]{9}"    value=""><div class="input-group-addon"><i class="fa fa-fw fa-minus-circle deleteNo"></i></div></div>'
            $('.phoneContent').append(str);
        });
        
        
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

 