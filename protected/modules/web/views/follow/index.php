
<body>
  <?php $this->beginContent('../admin/nav');?>
  <?php $this->endContent();?> 

  <div class="container">
    <div class="row topheader">

        <div class="col-md-2"></div>

        <div class="col-md-8">

           <div class="row top">
             <div class="col-md-6">
               <label for="exampleInputName2">跟进日期 </label>
               <strong><?php echo $followInfo['followtime']; ?></strong>
            </div>
            <div class="col-md-6">
           </div>
         </div>

       <div class="row top">
           <div class="col-md-12">
             <label for="exampleInputName2">跟进情况 </label>
             <textarea id="content" name="content" class="form-control" rows="20" cols="80"><?php echo $followInfo['context']; ?></textarea>
           </div>
         </div><!--row 6 end-->

         <div class="row top">
           <div class="col-md-12">
             <label for="exampleInputName2">备注 </label>
             <textarea id="remark" name="remark" class="form-control" rows="5" cols="80"><?php echo $followInfo['remark']; ?></textarea>
           </div>
         </div><!--row 6 end-->

      </div><!-- col-md-8 end-->
      <div class="col-md-2"></div>
    </div>
  </div>

<script type="text/javascript">
  $('.form_date').datetimepicker({
    language: 'zh-CN',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });

  function myClick() {

    var realname = $('#realname').val();

    if (null == realname || undefined == realname || '' == realname) {
      alert('孩子姓名不能为空!');
      return;
    }

    var birthday = $('#birthday').val();

    if (null == birthday || undefined == birthday || '' == birthday) {
      alert('孩子生日不能为空!');
      return;
    } else {

      var starttime = new Date(birthday);
      var today = new Date();

      if (starttime.getTime() >= today.getTime()) {
        alert('出生日期大于当前时间，请检查');
        return;
      }
    }

    var sex = $('#sex').val();

    if (-1 == sex) {
      alert('请选择性别');
      return;
    }

    $('#addChildForm').submit();
  }
</script>

</body>