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
                
                <?php
                if($this->session->flashdata('success')):
                ?>                
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>Success !</h4>
                    <?php echo $this->session->flashdata('success');?>.
                </div>
                <?php
                endif;
                ?>
                
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Advance Search</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="box-body">
                        <form id="advance-search" method="post" action="" role="form">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="form_name">Room Types</label><br>
                                    <?php
                                        foreach($room_types as $room_type):
                                        ?>
                                        <span class="roomTypes">
                                        <label>
                                            <input type="checkbox" class="minimal" name="room_types[]" value="<?php echo $room_type['id'];?>">
                                        </label>
                                        <?php echo $room_type['name'];?>
                                        </span>
                                        <?php
                                        endforeach;
                                    ?>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="form_name">Parking Available</label><br>
                                    <span class="roomTypes">
                                    <label>
                                        <input type="radio" class="minimal" name="parking_available" value="Yes" >
                                    </label>
                                    Yes
                                    </span>

                                    <span class="roomTypes">
                                    <label>
                                        <input type="radio" class="minimal" name="parking_available" value="No">
                                    </label>
                                    No
                                    </span>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="form_name">Star Rating</label><br>
                                    <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="star_rating" value="1" >
                                            </label>
                                            1
                                            </span>
                                            
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="star_rating" value="2">
                                            </label>
                                            2
                                            </span>
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="star_rating" value="3">
                                            </label>
                                            3
                                            </span>
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="star_rating" value="4">
                                            </label>
                                            4
                                            </span>
                                            <span class="roomTypes">
                                            <label>
                                                <input type="radio" class="minimal" name="star_rating" value="5">
                                            </label>
                                            5
                                            </span>
                                            
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <i class="fa fa-fw fa-search"></i><input type="submit" name="advanceSearch" class="btn btn-success btn-send" value="Search">
<!--                                    <button type="reset" value="Reset" id="configreset">Reset</button>-->
                                </div>
                            </div>
                            
                            
                        </div>
                        </form>
                    </div>
                    
                </div>
                
                
                
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hotels</h3>
                        
                        <a href="<?php echo base_url('hotel/add');?>" class="btn btn-success btn-send pull-right"><i class="fa fa-fw fa-plus-circle"></i>Add New</a>
                    </div>
                    <div class="box-body">
                        
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Location</th>
                                  <th>Phone</th>
                                  <th>Address</th>
                                  <th>Action</th>
                                </tr>
                                </thead>
                            
                                <tbody>
                                    <?php 
                                    foreach($hotels as $hotel): 
                                    ?>
                                    <tr>
                                        <td><?php echo $hotel['name'];?></td>
                                        <td><?php echo $hotel['location'];?></td>
                                        <td><?php echo $hotel['phone_no'];?></td>
                                        <td><?php echo $hotel['address'];?></td>
                                        
                                        <td>
                                            <a title="Details" href="javascript:void(0)" data-toggle="modal" data-target="#modal-default" onclick='details(<?php echo json_encode($hotel);?>)'><i class="fa fa-fw fa-info-circle"></i></a>
                                            <a title="Edit" href="<?php echo base_url('hotel/edit/').$hotel['id'];?>"><i class="fa fa-fw fa-edit"></i></a>
                                            <a title="Delete" href="javascript:void(0)" class="deleteRow" id="<?php echo $hotel['id'];?>"><i class="fa fa-fw fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
</div>



<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Details Of : <span class="name"></span></h4>
      </div>
      <div class="modal-body">
          <table class="table table-bordered">
              <tr>
                  <th>Name</th>
                  <td class="name"></td>
              </tr>
              <tr>
                  <th>Region</th>
                  <td id="region"></td>
              </tr>
              <tr>
                  <th>Location</th>
                  <td id="location"></td>
              </tr>
              <tr>
                  <th>Phone</th>
                  <td id="phone_no"></td>
              </tr>
              <tr>
                  <th>Address</th>
                  <td id="address"></td>
              </tr>
              <tr>
                  <th>Contact Person</th>
                  <td id="contact_person"></td>
              </tr>
              <tr>
                  <th>Contact Person Mobile</th>
                  <td id="contact_person_no"></td>
              </tr>
              <tr>
                  <th>Room Types</th>
                  <td id="room_types"></td>
              </tr>
              <tr>
                  <th>Parking Available</th>
                  <td id="parking_available"></td>
              </tr>
              <tr>
                  <th>Star Rating</th>
                  <td><span id="star_rating"></span>-star hotel</td>
              </tr>
              
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!--        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>">
</script>

<link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css'); ?>">
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js');?>"></script>

<script src="<?php echo base_url('assets/plugins/swal/sweetalert.min.js');?>"></script>

<script>
    $(function () {
        $('#example1').DataTable();

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        });
        
        $('#configreset').click(function(){
            alert('sdafas');
            $('#advance-search')[0].reset();
        });
        
        $('.deleteRow').click(function(){
            var id = $(this).attr('id');
            deleteRow(id,$(this));
        })
    })
    
    function details(detail){
        console.log(detail);
        $(".name").html(detail.name);
        $("#region").html(detail.gr_name);
        $("#location").html(detail.location);
        $("#phone_no").html(detail.phone_no);
        $("#address").html(detail.address);

        $("#contact_person").html(detail.contact_person);
        $("#contact_person_no").html(detail.contact_person_no);
        $("#parking_available").html(detail.parking_available);
        $("#star_rating").html(detail.star_rating);
        
        var objRoomTypes = detail.roomTypes;
        console.log(objRoomTypes);
        var roomTypes = '';
        //for(key in objRoomTypes){
        $.each(objRoomTypes,function(key,value){
            console.log(value);
            roomTypes += "<span class='btn bg-orange margin'>"+value.name+"</span>";
        })
        
        $("#room_types").html(roomTypes);
    }
    
    function deleteHotel(){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Poof! Your contact has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
    }
    
    function deleteRow(id,thisObj){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url : "<?php echo base_url('hotel/deleteRow');?>",
                  type : "post",
                  data :{ 'id' : id},
                  success : function(){
                      thisObj.parent().parent().remove();
                      swal("Poof! Your imaginary file has been deleted!", {
                          icon: "success",
                        });
                  }
                     
              })
            
          }
        });
    }
</script>