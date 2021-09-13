;
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Job Postings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<?php $__env->startSection('non-center-content'); ?>
<body class="text-left">
<?php 
	use App\Services\Businesses\MarkdownParserService;
	$description = MarkdownParserService::parse($portfolio->getBio());
?>
    <div>
        <div class="row">
			<p><h1 class="display-1 text-center"><?php echo e($portfolio->getName()); ?>'s Portfolio</h1></p>
    		<hr/>
    		<br/>
    		<div align="center">
    		<h2><?php echo e($portfolio->getPosition()); ?></h2>
    		<h3><?php echo e($portfolio->getExperience()); ?></h3>
    		<h4><?php echo e($portfolio->getProficiencies()); ?></h4>
    		</div>
    		<p class="text-left font-weight-normal"><?php echo $description; ?></p>
        
        </div>
    </div>
<?php $__env->stopSection(); ?>
</body>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\TogetherPeopleStrong\resources\views/portfolioView.blade.php ENDPATH**/ ?>