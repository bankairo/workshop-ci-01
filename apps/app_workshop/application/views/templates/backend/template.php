<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= ($_wad_template_html_title) ? $_wad_template_html_title : "Backend AdminLTE 2 | Dashboard" ?></title>
    <!-- HEADER -->
    <?php $this->load->view('templates/backend/html_header');?>
    <!-- END.HEADER -->
      
    <?php
        /* html header if exist */
        if (!empty($_wad_template_html_header)) {
            foreach ($_wad_template_html_header as $_key => $_value) {
                echo $_value;
            }
        }
    ?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      
      <?php
        /* views before content if exists  */
        if (!empty($_wad_template_before)) {
            foreach ($_wad_template_before as $_key => $_value) {
                echo $_value;
            }
        }
      ?>
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <?php /* content */
        echo $_wad_template_content;
      ?>
      </div><!-- /.content-wrapper -->
      

      <!-- FOOTER -->
      <?php $this->load->view('templates/backend/layout_footer');?>
      <!-- END.FOOTER -->
      
      <!-- CONFIG SIDEBAR -->
      <?php $this->load->view('templates/backend/config_sidebar');?>
      <!-- END.CONFIG SIDEBAR -->
      
    </div><!-- ./wrapper -->
    
    <?php
        /* views after content if exist */
        if (!empty($_wad_template_after)) {
            foreach ($_wad_template_after as $_key => $_value) {
                echo $_value;
            }
        }
    ?>
    <?php
    /* html footer if exist */
    if (!empty($_wad_template_html_footer)) {
        foreach ($_wad_template_html_footer as $_key => $_value) {
            echo $_value;
        }
    }
    ?>
  </body>
</html>
