<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once("../../view/Admin/link.php");
  include("../../dbConnect.php");

  $sql_tableRequest = "SELECT (ROW_NUMBER() OVER(ORDER BY sugid))AS Num ,date_send,suggestion,sugid FROM log_suggestion ";

  $sql_NumRequest = "SELECT COUNT(log_suggestion.sugid) AS numSuggestion FROM log_suggestion";

  $NumRequest = selectData($sql_NumRequest);
  $TableRequest = selectData($sql_tableRequest); ?>
  <title>ระบบยืมของภาควิชาคอม</title>

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
                  หน้ารวมข้อเสนอแนะ
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
                      <div class=" h6 font-weight-bold text-primary  mb-1">จำนวนข้อเสนอแนะ</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $NumRequest[1]['numSuggestion'] ?>ข้อเสนอแนะ</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-mail-bulk fa-2x "></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- จบส่วนของ card-->


          </div>
          <!-- จบ -->


          <!-- ส่วนของตาราง รายการขอยื่ม -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="h5 m-0 font-weight-bold text-primary">ข้อเสนอแนะ</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>วันที่</th>
                      <th>ข้อเสนอแนะ</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ลำดับ</th>
                      <th>วันที่</th>
                      <th>ข้อเสนอแนะ</th>
                      <th>จัดการ</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php for ($i = 0; $i < $TableRequest[0]['numrow']; $i++) { ?>
                      <tr role="row" class="odd" style="text-align:center;">
                        <td class="sorting_1">
                          <?php echo $TableRequest[$i + 1]['Num'] ?></td>
                        <td>
                          <?php echo $TableRequest[$i + 1]['date_send'] ?></td>
                        <td>
                          <?php echo $TableRequest[$i + 1]['suggestion'] ?></td>

                        <td style="text-align:center;">




                          <button type="button" class="btn btn-danger btn-sm tt" data-toggle="tooltip" title="" data-original-title="ลบข้อเสนอแนะ"><i class="far fa-trash-alt" aria-hidden="true"></i></button>
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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



</body>

</html>
<script>
  $(document).ready(function() {

    console.log("ready!");
    $('[data-toggle="tooltip"]').tooltip();



  });


  // function delfunction(title, sugid) {
  //   //alert(uid + " dddd")
  //   swal({
  //       title: "คุณต้องการลบ",
  //       text: title + "หรือไม่ ?",
  //       icon: "warning",
  //       buttons: true,
  //       dangerMode: true,
  //     })
  //     .then((willDelete) => {
  //       if (willDelete) {
  //         swal("ลบรายการสำเร็จเรียบร้อยแล้ว", {
  //           icon: "success",
  //           buttons: false
  //         });
  //         delete_1(sugid);
  //         setTimeout(function() {
  //           location.reload();
  //         }, 1500);
  //       } else {
  //         swal("การลบไม่สำเร็จ กรุณาทำรายการใหม่!");
  //       }
  //     });
  // }

  // function delete_1(sugid1) {
  //   $.ajax({
  //     type: "POST",
  //     data: {
  //       sugid1: sugid1,
  //       delete: "delete"
  //     },
  //     url: "./manage_sug.php",
  //     async: false,
  //     success: function(result) {}
  //   });
  // }
</script>