<tr class="package_tr<?php echo e($key); ?> <?php echo e(check_package($package_name) === null?'warning':'success'); ?>">
  <td><?php echo e($package_name); ?></td>
  <td class="package_td<?php echo e($key); ?>">
    <?php if(check_package($package_name) === null): ?>
    
    Not Installed
    <?php else: ?>
    installed
    <?php endif; ?>
  </td>
  <td>
    <?php if(check_package($package_name) !== null): ?>
      <?php echo e(check_package($package_name)); ?>

    <?php else: ?>
    None
    <?php endif; ?>
  </td>
</tr><?php /**PATH /home/helplgvr/public_html/dream/vendor/phpanonymous/it/it/views/baboon/installed_package_tr.blade.php ENDPATH**/ ?>