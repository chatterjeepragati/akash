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
                
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customers</h3>
                        
                        <a href="<?php echo base_url('customer/add');?>" class="btn btn-success btn-send pull-right"><i class="fa fa-fw fa-plus-circle"></i>Add New</a>
                    </div>
                    <div class="box-body">
                        
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Phone</th>
                                  <th>Journey Plan</th>
                                  <th>Location</th>
                                  <th>Birthday</th>
                                  <th>Anniversary</th>
                                  <th>Action</th>
                                </tr>
                                </thead>
                            
                                <tbody>
                                    <?php 
                                    foreach($customers as $customer): 
                                    ?>
                                    <tr>
                                        <td><?php echo $customer['first_name']." ".$customer['last_name'];?></td>
                                        <td><?php echo $customer['phone_no'];?></td>
                                        <td><?php echo is_null($customer['preferred_from_date_of_journey']) ? '' : date('F y',strtotime($customer['preferred_from_date_of_journey']));?></td>
                                        <td><?php echo $customer['preferred_location'];?></td>
                                        <td><?php echo showDate($customer['birthday'],'d/m/Y')?></td>
                                        <td><?php echo showDate($customer['aniversary'],'d/m/Y');?></td>
                                        <td>
                                            <a title="Details" href="javascript:void(0)" data-toggle="modal" data-target="#modal-default" onclick='details(<?php echo json_encode($customer);?>)'><i class="fa fa-fw fa-info-circle"></i></a>
                                            <a title="Edit" href="<?php echo base_url('customer/edit/').$customer['id'];?>"><i class="fa fa-fw fa-edit"></i></a>
                                            <a title="Delete" href="javascript:void(0)" class="deleteRow" id="<?php echo $customer['id'];?>"><i class="fa fa-fw fa-trash-o"></i></a>
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
        <h4 class="modal-title">Customer Details</h4>
      </div>
      <div class="modal-body">
          <table class="table table-bordered">
              <tr>
                  <th>First Name</th>
                  <td id="first_name"></td>
              </tr>
              <tr>
                  <th>Last Name</th>
                  <td id="last_name"></td>
              </tr>
              <tr>
                  <th>Phone</th>
                  <td id="phone"></td>
              </tr>
              <tr>
                  <th>Email</th>
                  <td id="email"></td>
              </tr>
              <tr>
                  <th>Address</th>
                  <td id="address"></td>
              </tr>
              <tr>
                  <th>City</th>
                  <td id="city"></td>
              </tr>
              <tr>
                  <th>Pin</th>
                  <td id="pin"></td>
              </tr>
              <tr>
                  <th>Birthday</th>
                  <td id="birthday"></td>
              </tr>
              <tr>
                  <th>Spouse</th>
                  <td id="spouse"></td>
              </tr>
              <tr>
                  <th>Spouse Mobile</th>
                  <td id="spouse_mobile"></td>
              </tr>
              <tr>
                  <th>Spouse Birthday</th>
                  <td id="spouse_birthday"></td>
              </tr>
              
              
              <tr>
                  <th>Anniversary</th>
                  <td id="aniversary"></td>
              </tr>
              <tr>
                  <th>Child 1 Name</th>
                  <td id="child_1_name"></td>
              </tr>
              <tr>
                  <th>Child 1 Birthday</th>
                  <td id="child_1_birthday"></td>
              </tr>
              <tr>
                  <th>Child 2 Name</th>
                  <td id="child_2_name"></td>
              </tr>
              <tr>
                  <th>Child 2 Birthday</th>
                  <td id="child_2_birthday"></td>
              </tr>
              
              <tr>
                  <th>Total Family member</th>
                  <td id="no_of_family_member"></td>
              </tr>
              <tr>
                  <th>Preferred Start Date</th>
                  <td id="preferred_from_date_of_journey"></td>
              </tr>
              <tr>
                  <th>Preferred End Date</th>
                  <td id="preferred_to_date_of_journey"></td>
              </tr>
              <tr>
                  <th>Preferred Location</th>
                  <td id="preferred_location"></td>
              </tr>
              <tr>
                  <th>Notes</th>
                  <td id="notes"></td>
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
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/swal/sweetalert.min.js');?>"></script>
<script>
  $(function () {
    $('#example1').DataTable();
      
    $('.deleteRow').click(function(){
        var id = $(this).attr('id');
        deleteRow(id,$(this));
    });
  })
    
    function details(detail){
        console.log(detail);
        $("#first_name").html(detail.first_name);
        $("#last_name").html(detail.last_name);
        $("#phone").html(detail.phone_no);
        $("#email").html(detail.email);
        $("#address").html(detail.address);
        $("#city").html(detail.city);
        $("#pin").html(detail.pin);
        $("#birthday").html(detail.birthday);
        $("#spouse").html(detail.spouse);
        $("#spouse_mobile").html(detail.spouse_mobile);
        
        $("#aniversary").html(detail.aniversary);        
        $("#child_1_name").html(detail.child_1_name);
        $("#child_1_birthday").html(detail.child_1_birthday);
        $("#child_2_name").html(detail.child_2_name);
        $("#child_2_birthday").html(detail.child_2_birthday);
        
        $("#spouse_birthday").html(detail.spouse_birthday);
        $("#no_of_family_member").html(detail.no_of_family_member);
        $("#preferred_from_date_of_journey").html(detail.preferred_from_date_of_journey);
        $("#preferred_to_date_of_journey").html(detail.preferred_to_date_of_journey);
        $("#preferred_location").html(detail.preferred_location);
        $("#notes").html(detail.notes);
        
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
                  url : "<?php echo base_url('customer/deleteRow');?>",
                  type : "post",
                  data :{ 'id' : id},
                  success : function(){
                      thisObj.parent().parent().remove();
                      swal("Poof! Your contact has been deleted!", {
                          icon: "success",
                        });
                  }
                     
              })
            
          }
        });
    }
</script>