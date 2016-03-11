      <!-- SIDEBAR MENU -->
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url();?>assets_admin_lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>John Warrior</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            
            <!--WORKSHOP-->
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-laptop"></i> <span>Worskhop</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="active treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Hari Ke-1 <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="active treeview-menu">
                      <li class="active"><a href="<?php echo base_url();?>welcome/index" target="_blank"><i class="fa fa-circle-o"></i> Welcome CI</a></li>
                    <li><a href="<?php echo base_url();?>welcome/bootstrap"  target="_blank"><i class="fa fa-circle-o"></i> Welcome Bootstrap</a></li>
                    <li><a href="<?php echo base_url();?>welcome/layout"  target="_blank"><i class="fa fa-circle-o"></i> Welcome Layout</a></li>
                    <li><a href="<?php echo base_url();?>welcome/template"><i class="fa fa-circle-o"></i> Welcome Template</a></li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Hari Ke-2<i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="active treeview-menu">
                        <li><a href="<?php echo base_url();?>person/index"  target="_blank"><i class="fa fa-circle-o"></i> CURD Ajax</a></li>
                        <li><a href="<?php echo base_url();?>person/template"><i class="fa fa-circle-o"></i> CURD Ajax Template</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Hari Ke-3<i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="active treeview-menu">
                        <li><a href="<?php echo base_url();?>wsclient/wsclient_soap/index"><i class="fa fa-circle-o"></i> SOAP Client</a></li>
                        <li><a href="<?php echo base_url();?>wsclient/wsclient_esb_soap/index"><i class="fa fa-circle-o"></i> ESB Soap Client</a></li>
                        <li><a href="<?php echo base_url();?>wsclient/wsclient_rest/index"><i class="fa fa-circle-o"></i> REST Client</a></li>
                        <li><a href="<?php echo base_url();?>wsclient/wsclient_esb_rest/index"><i class="fa fa-circle-o"></i> ESB Rest Client</a></li>
                    </ul>
                </li>
                
              </ul>
            </li>
            <!--END.WORKSHOP-->
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      
      <!-- END.SIDEBAR MENU -->
      