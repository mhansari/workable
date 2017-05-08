<?php $__env->startSection('content'); ?>
<div class="">
<?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="row">
    <div class="col-md-12 list-col ">
      <?php echo $__env->make('employers::nav', array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>        
  </div>
  <div class="row">
    <div class="col-md-2">
      <div class="panel panel-default">
        <div class="panel-body status-menu-padding">
          <?php foreach($status as $s): ?>
          <div class="col-md-8 status-menu-item-padding">
          <a href="<?php echo e(strtolower($s->name)); ?>"><?php echo e($s->name); ?></a>
          <br />
          </div>
          <div class="col-md-1">
        <span class="badge"><?php echo e($s->applications->count()); ?></span>
       </div>
          <?php endforeach; ?>
        </div>
      </div>
  
     
      
    </div>
    <div class="col-md-10">
      <div class="panel panel-default">
          <div class="panel-heading">

            <h4>
             Applications for <?php echo e($job_title->job_title); ?>

            </h4>
          </div>
          <div class="panel-body ">
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





      <?php if($obj->count()<=0): ?>
No records returned.
      <?php else: ?>
      <?php echo e(Form::open(array('url'=> route('schedule-interview',array('country'=>$country,'id'=>$id)) ,'class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

        <div class="col-md-12 text-center ">

          <div class="btn-group">
            <button type="button" value="2" class="btn btn-primary btn-sm btn-toolbar-margin">Shortlist</button>
            <button type="button" value="3" class="btn btn-primary btn-sm btn-toolbar-margin">Reject</button>
            <button type="button" value="4" class="btn btn-primary btn-sm btn-toolbar-margin">Screened</button>
            <button type="button" value="5" class="btn btn-primary btn-sm btn-toolbar-margin">Offered</button>
            <button type="button" value="6" class="btn btn-primary btn-sm btn-toolbar-margin">Hired</button>
            <button type="button" value="7" class="btn btn-primary btn-sm btn-toolbar-margin">Junk</button>
            <!--button type="button" value="msg" class="btn btn-primary btn-sm btn-toolbar-margin">Message</button-->
            <!--button type="button" value="interview" class="btn btn-primary btn-sm btn-toolbar-margin" id="interview">Interview</button-->
            <!--a href="javascript:;" class="fil" id="filter2">Filter</a-->
          </div>
        </div>
        <br/>
        <br/> 
        <center>

         <div class="panel panel-default fi" id="f" style="display:none">
          <div class="panel-body status-menu-padding">

          <?php echo e(Form::open(array('url'=> route('schedule-interview',array('country'=>$country,'id'=>$id)) ,'class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

         
          <div class="col-md-6 status-menu-item-padding">
            <?php echo e(Form::input('text', 'keywords', '',['id'=>'keywords', 'placeholder'=>'Keywords', 'class'=>'form-control'])); ?>

          </div>
          <div class="col-md-6 status-menu-item-padding">  
            <?php echo e(Form::input('text', 'name', '',['id'=>'name', 'placeholder'=>'Name',  'class'=>'form-control'])); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">  
            <?php echo Form::select('ddl_degree', $degree, null, ['id'=>'ddl_degree','class'=>'form-control','placeholder'=>'Degree']); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">
            <?php echo e(Form::input('text', 'institute', '',['id'=>'institute', 'placeholder'=>'Institute','class'=>'form-control'])); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">
            <?php echo e(Form::input('text', 'jobtitle', '',['id'=>'jobtitle', 'placeholder'=>'Job Title','class'=>'form-control'])); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">
            <?php echo e(Form::input('text', 'org', '',['id'=>'org', 'placeholder'=>'Organization','class'=>'form-control'])); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">
            <?php echo e(Form::input('text', 'salary_min', '',['id'=>'salary_min', 'placeholder'=>'Salary Min','class'=>'form-control'])); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">
            <?php echo e(Form::input('text', 'salary_max', '',['id'=>'salary_max', 'placeholder'=>'Salary Max','class'=>'form-control'])); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">
            <?php echo Form::select('ddl_currency', $currencies, null, ['id'=>'ddl_currency','class'=>'form-control','placeholder'=>'Currency']); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">  
            <?php echo Form::select('gender', array('M'=>'Male','F'=>'Female'), null, ['id'=>'gender','class'=>'form-control','placeholder'=>'Gender']); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">
            <?php echo e(Form::input('text', 'exp_min', '',['id'=>'exp_min', 'placeholder'=>'Experiance Min','class'=>'form-control'])); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">
            <?php echo e(Form::input('text', 'exp_max', '',['id'=>'exp_max', 'placeholder'=>'Experiance Max','class'=>'form-control'])); ?>

          </div>
          <div class="col-md-6 status-menu-item-padding">  
            <?php echo Form::select('marital_status', $maritalstatus, null, ['id'=>'marital_status','class'=>'form-control','placeholder'=>'Marital Status']); ?>

            </div>
          <div class="col-md-3 status-menu-item-padding">
            <?php echo e(Form::input('text', 'skills', '',['id'=>'skills', 'placeholder'=>'Skills','class'=>'form-control'])); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">  
            <?php echo e(Form::input('text', 'age_min', '',['id'=>'age_min', 'placeholder'=>'Age Min','class'=>'form-control'])); ?>

          </div>
          <div class="col-md-3 status-menu-item-padding">
            <?php echo e(Form::input('text', 'age_max', '',['id'=>'age_max', 'placeholder'=>'Age Max','class'=>'form-control'])); ?>

          </div>
          
          
             <div class="col-md-3 status-menu-item-padding">
            <?php echo Form::select('ddl_status', $status_ddl, null, ['data-error'=>'Required', 'id'=>'ddl_status','class'=>'form-control','placeholder'=>'Status']); ?>

          </div>
 <div class="col-md-12 status-menu-item-padding text-center">  
            <button type="button" value="7" class="btn btn-primary btn-sm btn-toolbar-margin">Filter</button>
        </div>
          <?php echo Form::token(); ?> 
          <?php echo e(Form::close()); ?>

         </div>
        </div>
        <?php echo e(Form::open(array('class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

          <div class="col-md-12" style="display:none" id="msg">
            <div class="form-group col-md-6 col-md-offset-3">
              <label for="candidates" class="col-sm-3 control-label">Applicants</label>
              <?php echo Form::select('candidates[]', $candidates, '', ['data-error'=>'Required', 'id'=>'candidates','class'=>'input-width form-control','required'=>'required','multiple'=>"multiple"]); ?>

              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-6 col-md-offset-3">
              <label for="message" class="col-sm-3 control-label">Message</label>
              <?php echo e(Form::textArea('message', '',['data-error'=>'Required','id'=>'message', 'required'=>'required', 'class'=>'input-widt form-control'])); ?>

              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-6 col-md-offset-3">
              <center>
                <button type="button" value="send" class="btn btn-primary btn-sm btn-toolbar-margin" id="interview">Send</button>
              </center>
            </div>
          </div>
          <?php echo Form::token(); ?> 
        <?php echo e(Form::close()); ?>

        <div class="col-md-12">
          <div class="table-responsive table-top-padding"> 
            <table class="table table-bordered table-color">
              <thead>
                <tr>
                  <th>
                    <div class="checkbox checkbox-success checkbox-circle">
                      <input id="select_all" type="checkbox" >
                      <label for="select_all" ></label>
                    </div>
                  </th>
                  <th>Candidate</th>
                  <th>Education</th>
                  <th>Experience</th>
                  <th>Location</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($obj as $o): ?>
                <tr>
                  <td> 
                    <div class="checkbox checkbox-success checkbox-circle">
                      <input id="opt_<?php echo e($o->id); ?>" class="check" onclick="selectSingleApplicant(this)" type="checkbox" name="resume_id[]" value="<?php echo e($o->id); ?>">
                      <label for="<?php echo e($o->id); ?>" >
                    </div>
                  </td>
                  <td  style=" cursor: pointer; cursor: hand;" class="click" data-val="<?php echo e($o->resume_id); ?>" data-application="<?php echo e($o->id); ?>">
                    <?php echo e($o->personal_info[0]->first_name); ?> <?php echo e($o->personal_info[0]->last_name); ?> <br />
                    <?php echo e($o->jobs->job_title); ?> <br />
                    <?php echo e('Expected Salary: ' . $o->personal_info[0]->expected_salary . ' ' . $o->personal_info[0]->ExpectedSalaryCurrency->name); ?>

                    <span id="info_<?php echo e($o->id); ?>"></span>
                  </td>
                  <td class="appointment-cell-vertical-alignment click" style=" cursor: pointer; cursor: hand;" data-val="<?php echo e($o->resume_id); ?>" data-application="<?php echo e($o->id); ?>">
                    <?php /**/ $sep = '' /**/ ?> 
                    <?php foreach($o->education as $e): ?>

                    <?php if($sep != ''): ?>
                    <?php /**/ $sep = $sep . '<span>, </span> ' /**/ ?>

                    <?php endif; ?>
                    <?php /**/ $sep =  $sep . $e->degree /**/ ?>


                    <?php endforeach; ?>
                    <?php echo $sep; ?>

                  </td>
                  <td class="appointment-cell-vertical-alignment click" style=" cursor: pointer; cursor: hand;"  data-val="<?php echo e($o->resume_id); ?>" data-application="<?php echo e($o->id); ?>">
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
                  <td class="appointment-cell-vertical-alignment click" style=" cursor: pointer; cursor: hand;"  data-val="<?php echo e($o->resume_id); ?>"  data-application="<?php echo e($o->id); ?>">
                    <?php echo e($o->personal_info[0]->city->Name); ?>, <?php echo e($o->personal_info[0]->country->Name); ?>

                  </td>
                  <td class="appointment-cell-alignment appointment-cell-vertical-alignment">
                    <a  href="<?php echo e(route('schedule-interview',array('country'=>$country,'id'=>$o->id))); ?>" class="fa fa-calendar" data-placement="top" data-toggle="tooltip" data-original-title="Schedule an Interview" aria-hidden="true"></a>
                  </td>
                </tr>
                <?php endforeach; ?>
                <?php echo Form::token(); ?>

                <?php echo e(Form::close()); ?>

              </tbody>
            </table>
            
          </div>
        </div><?php endif; ?>
    </div>
      </div>
    </div>
    
  </div>
</div>
<script>
jQuery( document ).ready(function( $ ) {
$('.click').click(function(){
  window.location.href = "<?php echo e(route('emp.view.resume',array('country'=>$country))); ?>/" + $(this).data('val') + "/" +  $(this).data('application');;
}); 
$('td > a').tooltip();

  $('#candidates').multiselect({
      enableCaseInsensitiveFiltering:true,
      onChange: function(option, checked, select) {
         $('#opt_'+$(option).val()).prop("checked", checked);
      }
  });
});
$("#select_all").change(function(){  //"select all" change 
    var status = this.checked; // "select all" checked status
    $('.check').each(function(){ //iterate all listed checkbox items
        this.checked = status; //change ".checkbox" checked status
        selectApplicant(this.value,status);
    });
    $('#candidates').multiselect('refresh'); 
});
$('.fil').click(function(){
    $( "#f" ).slideToggle( "slow");
});
$('.btn-toolbar-margin').click(function() {

  if(this.value == 2)
  {
    var selected = [];
    $('.check:checked').each(function(index) {
        selected.push($(this).val());
    });
    var jsonString = JSON.stringify(selected.toString());
    ajax(jsonString,this.value,$(this).text());
  }
  else if(this.value == 3)
  {
    var selected = [];
    $('.check:checked').each(function(index) {
        selected.push($(this).val());
    });
    var jsonString = JSON.stringify(selected.toString());
    ajax(jsonString,this.value,$(this).text());
  }
  else if(this.value == 4)
  {
    var selected = [];
    $('.check:checked').each(function(index) {
        selected.push($(this).val());
    });
    var jsonString = JSON.stringify(selected.toString());
    ajax(jsonString,this.value,$(this).text());
  }
  else if(this.value == 5)
  {
    var selected = [];
    $('.check:checked').each(function(index) {
        selected.push($(this).val());
    });
    var jsonString = JSON.stringify(selected.toString());
    ajax(jsonString,this.value,$(this).text());
  }
  else if(this.value == 6)
  {
    var selected = [];
    $('.check:checked').each(function(index) {
        selected.push($(this).val());
    });
    var jsonString = JSON.stringify(selected.toString());
    ajax(jsonString,this.value,$(this).text());
  }
  else if(this.value == 7)
  {
    var selected = [];
    $('.check:checked').each(function(index) {
        selected.push($(this).val());
    });
    var jsonString = JSON.stringify(selected.toString());
    
    ajax(jsonString,this.value,$(this).text());
  }

  
  else if(this.value == 'interview')
  {
$( "#msg" ).hide();

    $( "#int" ).slideToggle( "slow", function() {
      // Animation complete.
    });
   // $('#suc').hide();
  }
  else if(this.value == 'send')
  {
    var selected = [];
    $('.check:checked').each(function(index) {
        selected.push($(this).val());
    });
   
    var jsonString = JSON.stringify(selected.toString());
    send(jsonString,<?php echo e(Auth::user()->id); ?>,$('#message').val())
    
  }
    
});
function selectApplicant(v,s)
{

  if(s)
  $('#candidates').multiselect('select', v);
  else
    $('#candidates').multiselect('deselect', v);

}

function selectSingleApplicant(v)
{
 
 if(v.checked)
  $('#candidates').multiselect('select', v.value);
  else
    $('#candidates').multiselect('deselect', v.value);
 
  $("#candidates").multiselect("refresh");
}
function send(to,from,msg)
{
  var a = $.parseJSON(to);
  a = a.split(',');
  $.ajax({
        type: "POST",
        url: "<?php echo e(route('send', array('country'=>$country))); ?>",
        data: {_token : "<?php echo e(csrf_token()); ?>", to : to, from : from, msg:msg}, 
        cache: false,

        success: function(data){
          $( "#msg" ).slideToggle( "slow", function() {
      // Animation complete.
    });
            $('#suc').html('<br /><small class="label label-success">Message sent to selected Applicants</small>');
             
        }
    });
}
function ajax(d,s,t)
{
  var a = $.parseJSON(d);
  a = a.split(',');
  $.ajax({
        type: "POST",
        url: "<?php echo e(route('changeStatus', array('country'=>$country))); ?>",
        data: {data : d,status:s,_token : "<?php echo e(csrf_token()); ?>"}, 
        cache: false,

        success: function(data){
            if(data >0)
            {
              for(i=0;i<a.length; i++){

                var j = '#info_' + a[i];
          
                if(s==2)
                {
                  $(j).html('<br /><small class="label label-success">Shortlisted</small>');
                }
                else if(s==3)
                {
                  $(j).html('<br /><small class="label label-danger">Rejected</small>');
                }
                else if(s==4)
                {
                  $(j).html('<br /><small class="label label-info">Screened</small>');
                }
                else if(s==5)
                {
                  $(j).html('<br /><small class="label label-info">Offered</small>');
                }
                else if(s== 6)
                {
                  $(j).html('<br /><small class="label label-info">Hired</small>');
                }
                else if(s==7)
                {
                  $(j).html('<br /><small class="label label-warning">Marked as Junked</small>');
                }
              }
            }
        }
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>