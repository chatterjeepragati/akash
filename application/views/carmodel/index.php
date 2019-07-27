<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-car" aria-hidden="true"></i> Car Models
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
                        <h3 class="box-title">Car Models</h3>
                        
                        <a href="<?php echo base_url('carmodel/add');?>" class="btn btn-success btn-send pull-right"><i class="fa fa-fw fa-plus-circle"></i>Add New</a>
                    </div>
                    <div class="box-body">
                        
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>No Of Seat</th>
                                  <th>Type</th>
                                  <th>Action</th>
                                </tr>
                                </thead>
                            
                                <tbody>
                                    <?php 
                                    foreach($models as $model): 
                                    ?>
                                    <tr>
                                        <td><?php echo $model['model'];?></td>
                                        <td><?php echo $model['no_of_seat'];?></td>
                                        <td><?php echo $model['type'];?></td>
                                        
                                        <td>
                                            <a title="Delete" href="javascript:void(0)" class="deleteRow" id="<?php echo $model['id'];?>"><i class="fa fa-fw fa-trash-o"></i></a>
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
                  url : "<?php echo base_url('carmodel/deleteRow');?>",
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