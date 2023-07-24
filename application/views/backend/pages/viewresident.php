<div class="container-fluid">
   <!-- Page Heading -->
   <center>
      <h1 class="h3 mb-2 text-gray-800">Resident List</h1>
   </center>
   <p class="mb-4">
      <a class="btn btn-primary" href="<?= base_url('index.php/dashboard/add-resident') ?>"> Add Resident </a>
   </p>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">List</h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" style="width: 300%; border-collapse: collapse;">
               <thead style="background-color: #f2f2f2;">
                  <tr>
                     <th scope="col" style="width: 30px; padding: 10px; text-align: center;">#</th>
                     <th scope="col" style="width: 10px; text-align: center; padding: 10px;">Image</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">Full Name</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">Address</th>
                     <th scope="col" style="width: 10px; text-align: center; padding: 10px;">Sex</th>
                     <th scope="col" style="width: 100px; text-align: center; padding: 10px;">Birth Date</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">Birth Place</th>
                     <th scope="col" style="width: 100px; text-align: center; padding: 10px;">Nationality</th>
                     <th scope="col" style="width: 100px; text-align: center; padding: 10px;">Civil Status</th>
                     <th scope="col" style="width: 100px; text-align: center; padding: 10px;">Religion</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">Total Household Members</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">Land Ownership Status</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">Household Ownership Status</th>
                     <th scope="col" style="width: 10px; text-align: center; padding: 10px;">Blood Type</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">Differently-Abled</th>
                     <th scope="col" style="width: 100px; text-align: center; padding: 10px;">Contact</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">Occupation</th>
                     <th scope="col" style="width: 150px; text-align: center; padding: 10px;">Monthly Income</th>
                     <th scope="col" style="width: 100px; text-align: center; padding: 10px;">Educational Attainment</th>
                     <th scope="col" style="width: 100px; text-align: center; padding: 10px;">Lightning Facilities</th>
                     <!-- Add styles for other columns as needed -->
                     <th scope="col" style="width: 100px; text-align: center; padding: 10px;">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <!-- Table body content -->
                  <?php foreach($resident_list as $resident):?>
                  <tr>
                  <th style=" auto; text-align: center;" scope="row"><?= $resident->resident_id ?></th>
                  <td style=" auto; text-align: center;"><img src="<?php echo base_url($resident->image); ?>" height="50 px" width="50px" alt="Resident Image"></td>
                 <td style=" auto; text-align: center;"> <?= $resident->first_name ?>, <?= $resident->middle_name ?>, <?= $resident->last_name ?>, <?= $resident->extname ?></td>
                <td style=" auto; text-align: center;"><?= $resident->purok ?>, <?= $resident->streetname ?>, <?= $resident->barangay ?></td>
                <td style=" auto; text-align: center;"><?= $resident->sex ?></td>
                <td style=" auto; text-align: center;"><?= $resident->birth_date ?></td>
                <td style=" auto; text-align: center;"><?= $resident->birth_place?></td>
                <td style=" auto; text-align: center;"><?= $resident->nationality ?></td>
                <td style=" auto; text-align: center;"><?= $resident->civil_status ?></td>
                <td style=" auto; text-align: center;"><?= $resident->religion ?></td>
                <td style=" auto; text-align: center;"><?= $resident->household_members ?></td>
                <td style=" auto; text-align: center;"><?= $resident->land_ownership ?></td>
                <td style=" auto; text-align: center;"><?= $resident->ownership_status ?></td>
                <td style=" auto; text-align: center;"><?= $resident->blood_type ?></td>
                <td style=" auto; text-align: center;"><?= $resident->disability ?></td>
                <td style=" auto; text-align: center;"><?= $resident->contact ?></td>
                <td style=" auto; text-align: center;"><?= $resident->occupation ?></td>
                <td style=" auto; text-align: center;"><?= $resident->monthly_income ?></td>
                <td style=" auto; text-align: center;"><?= $resident->education ?></td>
                <td style=" auto; text-align: center;"><?= $resident->lightning_facilities ?></td>
                     <td style="padding: 10px;">
                        <a style=" auto; text-align: center;" class="btn btn-danger " href="<?= base_url('index.php/dashboard/update-resident/'.$resident->resident_id); ?>" style="border-radius: 10px; background-color: #ffff00; color: #fff; padding: 5px 10px; text-decoration: none;">Edit</a>
                        <a style=" auto; text-align: center;" class="btn btn-primary " href="<?= base_url('index.php/dashboard/delete-resident/'.$resident->resident_id); ?>" style="border-radius: 10px; background-color: #d9534f; color: #fff; padding: 5px 10px; text-decoration: none; margin-right: 20px;">Delete</a>
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

