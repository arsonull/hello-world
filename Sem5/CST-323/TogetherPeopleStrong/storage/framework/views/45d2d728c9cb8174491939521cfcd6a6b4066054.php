<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Job Postings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<?php $__env->startSection('content'); ?>
<body>
    <div class="table-responsive">
        <table class="table">
            <thead class="text-truncate">
                <tr>
                    <th>Job Postings</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $postings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    	<form action="/TogetherPeopleStrong/admin/managePosting" method="post">
        					<?php echo e(csrf_field()); ?>

                    		<td><?php echo e($posting->getTitle()); ?>

                    		</td>
                    		<input type="hidden" id="id" name="id" value="<?php echo e($posting->getId()); ?>">
                    		<td><button name="edit_button" id="edit_button" class="btn btn-dark text-center" type="submit">Edit</button></td>
                    		<td><button name="delete_button" id="delete_button" class="btn btn-danger" type="submit">Delete</button></td>
                    	</form>
                 	</tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
<?php $__env->stopSection(); ?>
</html>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\TogetherPeopleStrong\resources\views/admin_postings.blade.php ENDPATH**/ ?>