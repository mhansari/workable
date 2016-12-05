<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="col-md-12 text-center">
    <ul class="nav nav-pills">
      <li><a href="<?php echo e(asset('seekers/dashboard')); ?>">Job Seekers</a></li>
      <li class="active"><a href="<?php echo e(asset('employers/dashboard')); ?>">Employers</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12 list-col ">
      <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $__env->make('employers::nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>        
        <div class="panel-body ">
        
          <div class="col-md-12">
            <?php if(Session::has('flash_message')): ?>
              <div class="alert alert-success">
                  <?php echo e(Session::get('flash_message')); ?>

              </div>
            <?php endif; ?>
            <?php if($errors->has()): ?>
               <?php foreach($errors->all() as $error): ?>
                  <div class="alert alert-danger"><?php echo e($error); ?></div>
              <?php endforeach; ?>
            <?php endif; ?>
            <div class="col-md-12 text-center ">
              <div class="btn-group">
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Shortlist</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Reject</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Screened</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Offered</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Hired</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Junk</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Message</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Interview</button>
              </div>
              
            </div>
            <div class="col-md-12">
               <div class="table-responsive table-top-padding"> 
        <table class="table table-bordered table-color">
            <thead>
                <tr>
                    <th><input type="checkbox" /></th>
                    <th>Candidate</th>
                    <th>Education</th>
                    <th>Experience</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($obj as $o): ?>
                <tr>
                    <td><input type="checkbox" /></td>
                    <td>
                      <?php echo e($o->personal_info[0]->first_name); ?> <?php echo e($o->personal_info[0]->last_name); ?> <br />
                      <?php echo e($o->jobs->job_title); ?> <br />
                      <?php echo e('Expected Salary: ' . $o->personal_info[0]->expected_salary . ' ' . $o->personal_info[0]->ExpectedSalaryCurrency->name); ?>

                    </td>
                    <td>
                      <?php /**/ $sep = '' /**/ ?> 
                      <?php foreach($o->education as $e): ?>
                      
                          <?php if($sep != ''): ?>
                              <?php /**/ $sep = $sep . '<span>, </span> ' /**/ ?>
                              
                          <?php endif; ?>
                          <?php /**/ $sep =  $sep . $e->degree /**/ ?>
                        
                      
                      <?php endforeach; ?>
                      <?php echo $sep; ?>

                    </td>
                    <td>
                      <?php /**/ $start = '' /**/ ?> 
                      <?php /**/ $end = '' /**/ ?> 
                      <?php foreach($o->experiance as $e): ?>
                        <?php if($start != ''): ?>
                          <?php /**/ $start = $start . ',' /**/ ?>
                        <?php endif; ?>
                        <?php if($end != ''): ?>
                          <?php /**/ $end = $end . ',' /**/ ?>
                        <?php endif; ?>
                      <?php /**/ $start =  $start . $e->start_date /**/ ?>
                      <?php /**/ $end =  $end . $e->end_date /**/ ?>
                      
                      <?php endforeach; ?>
                      <?php echo e(\App\Applied::getYears($start,$end )); ?> <br/>
                      <?php /**/ $positions = '' /**/ ?> 
                      <?php foreach($o->experiance as $e): ?>
                      
                          <?php if($positions != ''): ?>
                              <?php /**/ $positions = $positions . '<span>, </span> ' /**/ ?>
                              
                          <?php endif; ?>
                          <?php /**/ $positions =  $positions . $e->job_title /**/ ?>
                        
                      
                      <?php endforeach; ?>
                      <?php echo $positions; ?>

                    </td>
                    <td>
                      <?php echo e($o->personal_info[0]->city->Name); ?>, <?php echo e($o->personal_info[0]->country->Name); ?>

                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>