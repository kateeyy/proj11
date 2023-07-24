<div class="container-fluid">
   <!-- Page Heading -->
   <center>
      <h1 class="h3 mb-2 text-gray-800">Record of Barangay Inhabitants</h1>
   </center>
   <br>
   <br>
   <br>
  
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">List</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" style="width: 250%; border-collapse: collapse;">
               <thead style="background-color: #f2f2f2;">
                  <tr>
                     <th scope="col" style="width: 30px; padding: 10px; text-align: center;">#</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">LAST NAME</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">FIRST NAME</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">MIDDLE NAME</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">EXT> NAME</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">NUMBER</th>
                     <th scope="col" style="width: 200px; text-align: center; padding: 10px;">STREET NAME</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">NAME OF SUBDIVISION/ZONES/SITIO/PUROK</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">PLACE OF BIRTH</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">DATE OF BIRTH</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">SEX</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">CIVIL STATUS</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">CITIZENSHIP</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">OCCUPATION</th>

  
                     <!-- Add styles for other columns as needed -->
                     <th scope="col" style="width: 100px; text-align: center; padding: 10px;">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <!-- Table body content -->
                  <?php foreach($rbi_list as $rbi):?>
                  <tr>
                  <th style=" auto; text-align: center;" scope="row"><?= $rbi->id ?></th>
                  <td style=" auto; text-align: center;"><?= $rbi->last_name ?></td>
                  <td style=" auto; text-align: center;"><?= $rbi->first_name ?></td>
                  <td style=" auto; text-align: center;"><?= $rbi->middle_name ?></td>
                  <td style=" auto; text-align: center;"><?= $rbi->extname ?></td>
                  <td style=" auto; text-align: center;"><?= $rbi->contact ?></td>
                  <td style=" auto; text-align: center;"><?= $rbi->streetname ?></td>
                  <td style=" auto; text-align: center;">Purok <?= $rbi->purok ?></td>
                  <td style=" auto; text-align: center;"><?= $rbi->birth_place?></td>
                  <td style=" auto; text-align: center;"><?= $rbi->birth_date ?></td>
                <td style=" auto; text-align: center;"><?= $rbi->sex ?></td>
                <td style=" auto; text-align: center;"><?= $rbi->civil_status ?></td>
                <td style=" auto; text-align: center;"><?= $rbi->nationality ?></td>
                <td style=" auto; text-align: center;"><?= $rbi->occupation ?></td>

                     <td style="padding: 10px;">
                        <a style=" auto; text-align: center;" class="btn btn-danger " href="<?= base_url('index.php/dashboard/update-rbi/'.$rbi->id); ?>" style="border-radius: 10px; background-color: #ffff00; color: #fff; padding: 5px 10px; text-decoration: none;">Edit</a>
                        <a style=" auto; text-align: center;" class="btn btn-primary " href="<?= base_url('index.php/dashboard/delete-rbi/'.$rbi->id); ?>" style="border-radius: 10px; background-color: #d9534f; color: #fff; padding: 5px 10px; text-decoration: none; margin-right: 20px;">Delete</a>
                     </td>
                     <?php endforeach;?>
                  </tr>
                  <!-- Add more table rows as needed -->
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<script>

   /* AJAX  */

    $(document).on('click','.edit-resident-btn',function(){

      var residentId = this.dataset.resident;

      $.ajax({
          url:'<?= base_url('index.php/dashboard/ajax-update-resident-form') ?>',
          method:'POST',
          data:{
            resident_id: residentId
          },
          success:function(response){
         
                bootbox.dialog({
                  title: 'Edit Resident',
                  message:' ',
                  size: 'extra-large'
                }).find('.bootbox-body').html(response);
          }

        });

    });

    $(document).on('click','.delete-official-btn',function(e){

      var officialId = this.dataset.official;

      bootbox.confirm('Are you sure you want to delete this official',function(answer){

            if(answer==true){

               window.location = '<?= base_url('index.php/dashboard/delete-officials/') ?>'+officialId;
               
            }

      });


   });

    

</script>

