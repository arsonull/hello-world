;
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Affinity Groups</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<?php $__env->startSection('content'); ?>
<body>
<div>
	<a class="btn btn-primary" style="align: center;" href="/TogetherPeopleStrong/addAffinity">Create Affinity</a>
    <div class="row">
    <?php $__currentLoopData = $affinities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affinity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-3">
            <div class="card" style="margin: 25px 50px;">
              <div class="card-body">
                <h5 class="card-title"><?php echo e($affinity->getTitle()); ?></h5>
                <br/>
                <a href="http://localhost/TogetherPeopleStrong/viewAffinity/<?php echo e($affinity->getId()); ?>" class="btn btn-primary">View Group</a>
              </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\TogetherPeopleStrong\resources\views/affinityView.blade.php ENDPATH**/ ?>