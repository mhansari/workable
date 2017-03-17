     <div id="tree"></div>                


<script>

function getTree() {

  var tree = [
                  {
                        text: "Create Resume",
                        href: "<?php echo e(asset($country . '/seekers/manage/upload-resume')); ?>",

                  },
                  <?php /**/ $sep = '' /**/ ?>
                  <?php /**/ $exp = 'false' /**/ ?>

                  <?php foreach($obj as $o): ?>
                  {

                        <?php /**/ $sep = $sep + 1 /**/ ?>
                        <?php if($o->id == (isset($resumeid)?$resumeid:0)): ?>
                             <?php /**/ $exp = 'true' /**/ ?>
                        <?php else: ?>
                              <?php /**/ $exp = 'false' /**/ ?>
                        <?php endif; ?>
                        text: "<?php echo e($o->title); ?>",
                        state :{expanded : <?php echo e($exp); ?>},
                        nodes: [
                              <?php foreach($sections as $s): ?>
                                    {

                                      text: "<?php echo e(($s->append_update_text?'Update ':'').$s->title); ?>",
                                      href: "<?php echo e(asset($country . '/' . $s->url)); ?>/<?php echo e($o->id); ?>",
                                      <?php if(\Request::is('*'.str_replace(' ','-',strtolower($s->title)).'*') && $o->id == (isset($resumeid)?$resumeid:0)): ?>
                                      state :{selected : true,selectedBackColor:'#cccccc'}
                                      <?php endif; ?>
                                    },
                              <?php endforeach; ?>
                               ]
                  },
                  <?php endforeach; ?>
  
            ];
  return tree;
}

$('#tree').treeview({levels: 1,enableLinks: true,data: getTree()});
</script>