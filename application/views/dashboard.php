<?php
/*echo "<pre>";
print_r($birthdays);
$toDay = new DateTime();
echo $toDay->format("d-m-Y")."<br>";
$birthday = new DateTime($birthdays[0]['birthday']);
echo $birthday->format("d-m-Y")."<br>";
foreach($birthdays as $birthday){
    if(date_diff(new DateTime($birthday['birthday']),$toDay)->format("%d") <= 30){
        echo date_diff(new DateTime($birthday['birthday']),$toDay)->format("%d");
        echo $birthday['first_name']."<br>";
    } else if(date_diff(new DateTime($birthday['spouse_birthday']),$toDay)->format("%d") <= 30){
        echo $birthday['spouse']."<br>";
    } else {
        echo date_diff(new DateTime($birthday['birthday']),$toDay)->format("%d")."<br>";
        echo date_diff(new DateTime($birthday['spouse_birthday']),$toDay)->format("%d")."<br>";
    }
}
exit;*/
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $hotel_cnt; ?><sup style="font-size: 20px"></sup></h3>
                  <p>Hotels</p>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-hotel"></i>
                </div>
                <a href="<?php echo base_url('hotel'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $customer_cnt; ?></h3>
                  <p>Customer</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url('customer'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $car_contact_cnt;?></h3>

                  <p>Car Contacts</p>
                </div>
                <div class="icon">
                  <i class="fa fa-fw fa-car"></i>
                </div>
                <a href="<?php echo base_url('car'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            
          </div>
        
        
        <div class="row">
            <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Upcomming Birthday</h3>
				  <button onclick="sendSMS()" value="Send SMS" class="btn btn-sm btn-success pull-right"><i class="fa fa-fw fa-send"></i> Send SMS</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin uc_birthday">
                      <thead>
                      <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Mobile</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach($birthdays as $birthday):
                          ?>
                      <tr>
                        <td><?php echo $birthday['name'];?></td>
                        <td><?php echo date('d F', strtotime($birthday['birthday']));?></td>
                        <td><?php echo $birthday['phone_no'];?></td>
                      </tr>
                          <?php
                          endforeach;
                          ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
              </div>
            </div>
            
            
            <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Upcomming Anniversary</h3>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>Name</th>
                        <th>Spouse</th>
                        <th>Date</th>
                        <th>Mobile</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach($anniversary as $ann):
                          ?>
                      <tr>
                        <td><?php echo $ann['name'];?></td>
                        <td><?php echo $ann['spouse'];?></td>
                        <td><?php echo date('d F', strtotime($ann['aniversary']));?></td>
                        <td><?php echo $ann['phone_no'];?></td>
                      </tr>
                          <?php
                          endforeach;
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Send SMS</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                    <?php echo $this->session->flashdata('success');?>
            <form role="form" action="user/sendSMS" method="post">
              <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Limit</label>
                    <input disabled  maxlength="3" size="3" value="160" id="counter">
                </div>
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Compose SMS</label>
                  <textarea name="message" class="form-control" onkeyup="textCounter(this,'counter',160);" required ></textarea>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
            </div>
        </div>
        
        
    </section>
</div>


<script>
function sendSMS(){
	var today = "<?php echo date('d');?>";

  $('.uc_birthday tr').each(function(){
    $.each(this.cells, function(){
        let html = $(this).html();
        html_arr = html.split(' ');
        if(html_arr[0] == today){
          console.log(html);
          let name = $(this).prev().html();
          let mobile = $(this).next().html();
          mobile_arr = mobile.split(',');
          //let message = "Hi "+name+" Happy Birthday.";
			let message = "Happy Birthday "+name+"! To make this special day more exciting contact us TODAY for special discount on packages. Akash Beyond Imagination."
          $.each( mobile_arr, function( key, value ) {
            console.log( key + ": " + value );
            $.ajax({
              url : "http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=akashbeyond&password=425685419&sendername=AKASHB&mobileno="+value+"&message="+message,
              type : "get",
              dataType: "jsonp",
              crossDomain:true,
              success : function(data){
                // console.log(data);
              }  
            })
          });
          
        }
    });
  })
}
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>