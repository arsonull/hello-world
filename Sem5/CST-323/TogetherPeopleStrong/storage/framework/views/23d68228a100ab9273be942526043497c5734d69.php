<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Add Affinity')); ?></div>

                <div class="card-body">
                    <form method="POST" action="createAffinity">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="affinity" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Enter the title of the group you want to add')); ?></label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Create')); ?>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\TogetherPeopleStrong\resources\views/affinityAdd.blade.php ENDPATH**/ ?>