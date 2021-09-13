;
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Affinity Groups</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<?php $__env->startSection('content'); ?>
<body>
	<h1><?php echo e($affinity->getTitle()); ?> Group</h1>
<div>
	<div class="row">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-3">
            <div class="card" style="margin: 25px 50px;">
              <div class="card-body" >
                <h5 class="card-title"><?php echo e($user->getName()); ?></h5>
                <br/>
                <p><?php echo e($user->getEmail()); ?></p>
              </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php if(!$owner): ?>
        <?php if(!$joined): ?>
        	<form action="/TogetherPeopleStrong/viewAffinity/addThisAffinity" method="get">
        	<button type="submit" class="btn btn-primary">Join Group</button>
        	</form>
        <?php else: ?>
        	<form action="/TogetherPeopleStrong/viewAffinity/removeThisAffinity" method="get">
        	<button type="submit" class="btn btn-danger">Leave Group</button>
        	</form>
        <?php endif; ?>
    <?php else: ?>
    	<form action="/TogetherPeopleStrong/viewAffinity/editThisAffinity" method="get">
        	<button type="submit" class="btn btn-primary">Edit Group</button>
    	</form>
    	<form action="/TogetherPeopleStrong/viewAffinity/deleteThisAffinity" method="get">
        	<button type="submit" class="btn btn-danger">Delete Group</button>
    	</form>
	<?php endif; ?>
</div>
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\TogetherPeopleStrong\resources\views/affinityDetails.blade.php ENDPATH**/ ?>