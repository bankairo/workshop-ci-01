<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= ($_layout_html_title) ? $_layout_html_title : "Backend AdminLTE 2 | Dashboard" ?></title>
    
    <?php $this->load->view('templates/frontend/html_header');?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      
      <!-- HEADER MENU -->
      <?php $this->load->view('templates/frontend/menu_header');?>
      <!-- END.HEADER MENU -->
      
      <!-- SIDEBAR MENU -->
      <?php $this->load->view('templates/frontend/menu_sidebar');?>
      <!-- END.SIDEBAR MENU -->
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php echo $_layout_content; ?>
      </div><!-- /.content-wrapper -->
      
      <!-- FOOTER -->
      <?php $this->load->view('templates/frontend/layout_footer');?>
      <!-- END.FOOTER -->
      
      <!-- CONFIG SIDEBAR -->
      <?php $this->load->view('templates/frontend/config_sidebar');?>
      <!-- END.CONFIG SIDEBAR -->
      
    </div><!-- ./wrapper -->

    <!-- HTML FOOTER -->
    <?php $this->load->view('templates/frontend/html_footer');?>
    <!-- END.HTML FOOOTER -->
    
  </body>
</html>
