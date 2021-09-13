<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Information')); ?></div>

                <div class="card-body">
                    <form method="POST" action="userInfoUpdate">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($user->getUsername()); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Email')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="<?php echo e($user->getEmail()); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ssn" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Social Security Number')); ?></label>

                            <div class="col-md-6">
                                <?php if($exists): ?><input id="ssn" type="text" class="form-control" name="ssn" value="<?php echo e($user->getSsn()); ?>">
                                <?php else: ?> <input id="ssn" type="text" class="form-control" name="ssn" value="<?php echo e($user->getSsn()); ?>" readonly>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="addSsn" name="addSsn" type="submit" class="btn btn-primary">
                                    <?php echo e(__('Update')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\TogetherPeopleStrong\resources\views/editUserInfo.blade.php ENDPATH**/ ?>