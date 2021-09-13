<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Information')); ?></div>

                <div class="card-body">
                    <form method="POST" action="userInfo">
                        <?php echo csrf_field(); ?>
						<?php if($exists): ?>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" value="<?php echo e(Auth::user()->name); ?>" readonly>

                                <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Current Position Or Last Held Position')); ?></label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position" value="<?php echo e($portfolio->getPosition()); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="experience" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Work Experience')); ?></label>

                            <div class="col-md-6">
                                <input id="experience" type="text" class="form-control" name="experience" value="<?php echo e($portfolio->getExperience()); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="proficiencies" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Proficiencies')); ?></label>

                            <div class="col-md-6">
                                <input id="proficiencies" type="text" class="form-control" name="proficiencies" value="<?php echo e($portfolio->getProficiencies()); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right"><?php echo e(__('User Bio')); ?></label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="bio" name="bio" placeholder="User Bio" rows="5"><?php echo e($portfolio->getBio()); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Update')); ?>

                                </button>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" value="<?php echo e(Auth::user()->name); ?>" readonly>

                                <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Current Position Or Last Held Position')); ?></label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control" name="position">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="experience" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Work Experience')); ?></label>

                            <div class="col-md-6">
                                <input id="experience" type="text" class="form-control" name="experience">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="proficiencies" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Proficiencies')); ?></label>

                            <div class="col-md-6">
                                <input id="proficiencies" type="text" class="form-control" name="proficiencies">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right"><?php echo e(__('User Bio')); ?></label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="bio" name="bio" placeholder="User Bio" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Create')); ?>

                                </button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\TogetherPeopleStrong\resources\views/User_Information.blade.php ENDPATH**/ ?>