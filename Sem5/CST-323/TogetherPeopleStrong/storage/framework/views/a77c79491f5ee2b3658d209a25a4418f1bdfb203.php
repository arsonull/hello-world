<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Job Postings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<?php $__env->startSection('content'); ?>
<div>
<table class="table" style="width:100%">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Suspend</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        	<form action="manageUser" method="post">
        		<?php echo e(csrf_field()); ?>

        		<td><?php echo e($user->getUsername()); ?><input type="hidden" id="name" name="name" value="<?php echo e($user->getUsername()); ?>"></td>
        		<td><?php echo e($user->getEmail()); ?><input type="hidden" id="email" name="email" value="<?php echo e($user->getUsername()); ?>">
        			<input type="hidden" id="password" name="password" value="<?php echo e($user->getPassword()); ?>">
        			<input type="hidden" id="ssn" name="ssn" value="<?php echo e($user->getSsn()); ?>">
        		</td>
        		<td><button id="suspend_button" name="suspend_button" type="submit">Suspend</button></td>
        		<td><button id="delete_button" name="delete_button" type="submit">Delete</button></td>
        	</form>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\TogetherPeopleStrong\resources\views/AdminPortal.blade.php ENDPATH**/ ?>