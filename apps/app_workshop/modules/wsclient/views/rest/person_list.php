<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            REST Client
            <small>Web Services</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Web Services</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Web Services REST Client</h3>
                    </div><!-- /.box-header -->
                    
                    <div class="box-body">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="<?php echo base_url(uri_string());?>" method="GET">
                                <div class="row">
                                    <div class="form-group">                                                    
                                        <label class="col-md-2 control-label">First Name:</label>
                                        <div class="col-md-4">
                                            <input name="filter_search" type="text" class="form-control12" style="width:100%;" value="<?php echo set_value('filter_search',$_params['filter_search']); ?>">
                                        </div>
                                        <div class="col-md-1">
                                            <a href="#"><button class="btn btn-xs btn-default">Filter</button></a> 
                                        </div>
                                        <label class="col-md-5" style="text-align: left;">(<?php echo $_data_count->data_count; ?> rows found)</label>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        
                        <div class="col-md-12" style="margin-bottom: 10px;">
                            <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Person</button>
                        </div>
                        
                        <table id="table_ajax" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Date of Birth</th>
                                    <th style="width:125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($_data_count->data_count > 0){
                                    foreach ($_data_list as $key => $values) {
                                        //var_dump($values);
                                ?>
                                <tr>
                                    <td><?php echo $values->id; ?></td>
                                    <td><?php echo $values->firstName; ?></td>
                                    <td><?php echo $values->lastName; ?></td>
                                    <td><?php echo $values->gender; ?></td>
                                    <td><?php echo $values->address; ?></td>
                                    <td><?php echo $values->dob; ?></td>
                                    <td style="width:200px;">
                                        <a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('<?php echo $values->id;?>')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                        <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('<?php echo $values->id;?>')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                ?>
                                <tr><td colspan="7">Data is empty</td></tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        
                        <div class="col-md-12 text-center">
                            <?php echo $this->pagination->create_links();?>
                            </div>
                    </div>
                  </div>
              </div>
          </div>
        </section>
        
        
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">First Name</label>
                            <div class="col-md-9">
                                <input name="firstName" placeholder="First Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Last Name</label>
                            <div class="col-md-9">
                                <input name="lastName" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <select name="gender" class="form-control">
                                    <option value="">--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea name="address" placeholder="Address" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth</label>
                            <div class="col-md-9">
                                <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
