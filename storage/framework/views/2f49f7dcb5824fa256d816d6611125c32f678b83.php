<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <h3>Messages</h3>

        </div>
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <?php foreach($to as $t): ?>
                <div class="row">
                   <div class="col-md-2">
                   <thumb>
                        <div class="thumb-latest-profile" style="width: 50px; height: 50px; line-height: inherit; background-color: transparent; font-size: 25px;">
                            <span class="helper"></span>
                          <thumb>
                                            <div class="thumb-latest-profile img-responsive" style="line-height: inherit; background-color: transparent; font-size: 25px;">
                                                <span class="helper"></span>
                                                <img src="../../<?php echo e($t->sender->pp==''?'pp/placeholder.png':$t->sender->pp); ?>">
                                            </div>
                                        </thumb>
                        </div>
                    </thumb>
                   </div>
                   <div class="col-md-10">
                   <div class="col-md-12 small">
                      <strong>
                        <?php echo e($t->sender->first_name); ?> <?php echo e($t->sender->last_name); ?>

                      </strong>
                   </div>
                  <div class="col-md-12 text-sm">
                       <?php echo e(substr($t->msg,0,25)); ?>...
                   </div>
                   <div class="col-md-12 text-sm text-right">
                       <?php echo e(date('m/d/Y g:i A',strtotime($t->created_at))); ?>

                   </div>
                   </div>

                    <div class="col-md-12">
                <hr/>
                </div>
                </div>
               

                <?php endforeach; ?>
                </div>
            </div>

        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-body">
                <div class="form-msg">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <?php echo e(Form::textArea('msg', '',['data-error'=>'Required','id'=>'msg', 'placeholder'=>'Message', 'required'=>'required', 'class'=>'conversation-msg form-control'])); ?>

                      </div>
                    </div>
                    <div class="col-md-12">
                     <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div><hr/>
                    </div>
                  </div>
                  </div>

                  <div class="row">

                    <?php foreach($obj as $msg): ?>
                     <div class="row">
                   <div class="col-md-1 text-right">
                   <thumb>
                        <div class="thumb-latest-profile text-right" style="width: 50px; height: 50px; line-height: inherit; background-color: transparent; font-size: 25px;">
                            <span class="helper"></span>
                          <thumb>
                                            <div class="thumb-latest-profile img-responsive text-right" style="line-height: inherit; background-color: transparent; font-size: 25px;">
                                                <span class="helper"></span>
                                                <img src="../../<?php echo e($msg->sender->pp==''?'pp/placeholder.png':$msg->sender->pp); ?>">
                                            </div>
                                        </thumb>
                        </div>
                    </thumb>
                   </div>
                   <div class="col-md-11">
                   <div class="col-md-12 small">
                      <strong>
                        <?php echo e($t->sender->first_name); ?> <?php echo e($t->sender->last_name); ?>

                      </strong>
                   </div>
                  <div class="col-md-12 text-sm">
                       <?php echo e($msg->msg); ?>...
                   </div>
                   <div class="col-md-12 text-sm text-right">
                       <?php echo e(date('m/d/Y g:i A',strtotime($t->created_at))); ?>

                   </div>
                   </div>

                    <div class="col-md-12">
                <hr/>
                </div>
                </div>
               

                            <?php if(count($msg->childs)): ?>
                                <?php echo e($msg->childs); ?>

                            <?php endif; ?>
                        
                    <?php endforeach; ?>
          
                  </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>