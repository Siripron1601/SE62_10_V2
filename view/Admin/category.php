<!DOCTYPE html>
<html lang="en">

<head>

  <title>ระบบยืมของภาควิชาคอม</title>
  <?php
  include("link.php");
  include("../../dbConnect.php");

  $sql_tableRequest = "SELECT (ROW_NUMBER() OVER(ORDER BY cid))AS Num,cName,cid FROM `db_category`";

  $sql_NumRequest = "SELECT COUNT(db_category.cid) AS numCategory FROM db_category";
  $NumRequest = selectData($sql_NumRequest);
  $TableRequest = selectData($sql_tableRequest);
  ?>

</head>

<body id="page-top">
  <div id="wrapper">

    <!-- อันนี้ไว้เรียกใช้แท็บข้างๆๆ -->
    <?php include "logout1.php" ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="background-color: #EBF5FB;">

      <!-- Main Content -->
      <div id="content">

        <!-- อันนี้ไว้เรียกใช้แท็บบน -->
        <?php include "Topbar.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">



          <!-- เริ่ม -->
          <div class="row">

            <!-- ส่วนของคำว่า "หน้าหลัก" -->
            <div class="col-xl-12 col-12 mb-4">
              <div class="card">
                <div class="card-header card-bg  header-text-color" style="background-color:#fff;">
                  หน้าแก้ไขหมวดหมู่

                </div>


              </div>
            </div>
            <!-- จบ ส่วนของคำว่า "หน้าหลัก" -->

            <!-- เริ่มส่วนของ card-->

            <!--  card คำขอที่อนุมัติแล้ว -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class=" h6 font-weight-bold text-primary  mb-1">จำนวนที่หมวดหมู่</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $NumRequest[1]['numCategory'] ?> หมวดหมู่</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-mail-bulk fa-2x "></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--  card คำขอที่อนุมัติแล้ว -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="#" style="text-decoration: none">
                <div class="card border-left-info shadow h-100 py-2" id="addCategory">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class=" h6 font-weight-bold text-info  mb-1">เพิ่มหมวดหมู่</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">+ หมวดหมู่</div>
                      </div>
                      <div class="col-auto text-info">
                        <i class="fas fa-plus-circle fa-3x"></i>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </a>

            <!-- จบส่วนของ card-->


          </div>
          <!-- จบ -->


          <!-- ส่วนของตาราง รายการขอยื่ม -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="h5 m-0 font-weight-bold text-primary">หมวดหมู่ในระบบ</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr role="row" style="text-align:center;">
                      <th rowspan="1" colspan="1">ลำดับ</th>
                      <th rowspan="1" colspan="1">ชื่อหมวดหมู่</th>
                      <th rowspan="1" colspan="1">จัดการ</th>


                    </tr>
                  </thead>
                  <tfoot>
                    <tr role="row" style="text-align:center;">
                      <th rowspan="1" colspan="1">ลำดับ</th>
                      <th rowspan="1" colspan="1">ชื่อหมวดหมู่</th>
                      <th rowspan="1" colspan="1">จัดการ</th>


                    </tr>
                  </tfoot>
                  <tbody>

                    <?php for ($i = 0; $i < $TableRequest[0]['numrow']; $i++) { ?>
                      <tr role="row" class="odd" style="text-align:center;">
                        <td class="sorting_1">
                          <?php echo $TableRequest[$i + 1]['Num'] ?></td>
                        <td>
                          <?php echo $TableRequest[$i + 1]['cName'] ?></td>

                        <td style="text-align:center;">


                          <button type="button" class="btn btn-warning btn-sm " data-toggle="tooltip" title="" data-original-title="แก้ไข"><i class="fas fa-edit" aria-hidden="true"></i></button>


                          <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="" data-original-title="ลบหมวดหมู่"><i class="far fa-trash-alt" aria-hidden="true"></i></button>
                        </td>




                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- จบ ส่วนของตาราง รายการรออนุมัติ-->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <div id="modalAddCategory" class="modal fade">
    <form class="modal-dialog modal-lg " method="POST">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#3E49BB">
          <h4 class="modal-title" style="color:white">เพิ่มหมวดหมู่</h4>
        </div>
        <div class="modal-body" id="addModalBody">

          <div class="row mb-4">
            <div class="col-xl-3 col-12 text-right">
              <span>ชื่อหมวดหมู่ :</span>
            </div>
            <div class="col-xl-8 col-12">
              <input type="text" class="form-control" id="cName" name="cName" value="" placeholder="กรุณากรอกหมวดหมู่" maxlength="100">
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit">บันทึก</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
    </form>
  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



</body>

</html>
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $("#addCategory").on('click', function() {
      $("#modalAddCategory").modal('show');
    });
  });
</script>