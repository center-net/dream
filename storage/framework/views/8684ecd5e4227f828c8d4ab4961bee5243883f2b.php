
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Package Name</th>
      <th>Status</th>
      <th>version</th>
    </tr>
  </thead>
  <tbody>
<?php
 $package_list = [
  'yajra/laravel-datatables-oracle',
  'yajra/laravel-datatables-fractal',
  'yajra/laravel-datatables-buttons',
  'yajra/laravel-datatables-editor',
  'yajra/laravel-datatables-html',
  'laravelcollective/html',
  'intervention/image',
  'spatie/laravel-honeypot',
  'tymon/jwt-auth',
  'unisharp/laravel-filemanager',
  'guzzlehttp/guzzle',
  'laravel/ui',
  'maatwebsite/excel',
  'mpdf/mpdf',
  'tecnickcom/tcpdf',
  'barryvdh/laravel-snappy',
  'fruitcake/laravel-cors',
  'dompdf/dompdf',
  'langnonymous/lang',
  'phpanonymous/c3js',
  'phpanonymous/it',
 ];
?>
<?php $__currentLoopData = $package_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('baboon.installed_package_tr',['package_name'=>$package,'key'=>$key], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table><?php /**PATH /home/helplgvr/public_html/dream/vendor/phpanonymous/it/it/views/baboon/installed_packages.blade.php ENDPATH**/ ?>