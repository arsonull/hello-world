;
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Portfolios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<?php $__env->startSection('content'); ?>
<body>
<div>
	<div class="row">
    <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col-sm-2">
    		<form action="viewPortfolio" method="POST">
    		<?php echo e(csrf_field()); ?>

        		<div class="card">
        		<img src="/TogetherPeopleStrong/resources/img/monke<?php echo e(($loop->index % 5) + 1); ?>.jpg" class="card-img-top w-100 d-block" style="height: 200px">
                	<div class="card-body">
                        <h4 class="card-title"><?php echo e($portfolio->getName()); ?></h4><input type="hidden" id="name" name="name" value="<?php echo e($portfolio->getName()); ?>">
                        <p class="card-text">Last held postiton: <?php echo e($portfolio->getPosition()); ?></p><input type="hidden" id="position" name="position" value="<?php echo e($portfolio->getPosition()); ?>">
                        <input type="hidden" id="experience" name="experience" value="<?php echo e($portfolio->getExperience()); ?>">
            			<input type="hidden" id="proficiencies" name="proficiencies" value="<?php echo e($portfolio->getProficiencies()); ?>">
            			<input type="hidden" id="bio" name="bio" value="<?php echo e($portfolio->getBio()); ?>">
                        <button class="btn btn-primary btn-banana" type="submit">View Portfolio</button>
            		</div>
        		</div>
    		</form>
		</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\TogetherPeopleStrong\resources\views/portfolioViewAll.blade.php ENDPATH**/ ?>