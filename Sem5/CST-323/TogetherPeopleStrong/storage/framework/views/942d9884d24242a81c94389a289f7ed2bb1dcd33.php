<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Update Affinity')); ?></div>

                <div class="card-body">
                    <form method="POST" action="processEditAffinity">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="affinity" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Enter the new title of the group')); ?></label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="<?php echo e($affinity->getTitle()); ?>">
                                <input id="id" type="hidden" name="id" value="<?php echo e($affinity->getId()); ?>">
                                <input id="ownerID" type="hidden" name="ownerID" value="<?php echo e($affinity->getOwner()); ?>">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\TogetherPeopleStrong\resources\views/affinityEdit.blade.php ENDPATH**/ ?>