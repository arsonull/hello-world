<nav style="background-color: white;"class="navbar navbar-light navbar-expand-md navigation-clean-button border border-dark">
    <div class="container"><a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
	<img style="height:50px; width:100px; margin-right:25px;" alt="TogetherPeopleStrong" src="/TogetherPeopleStrong/resources/img/logo.png">
    <?php echo e(config('Together People Strong', 'Together People Strong')); ?>

    </a>
        <div class="collapse navbar-collapse" id="navcol-1">
        </div>
        	<div class="d-flex justify-content-start">
                <ul class="navbar-nav mr-auto">
                	<?php if(auth()->guard()->guest()): ?>
                    	<li class="nav-item"><a class="login btn btn-secondary" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                    <?php if(Route::has('register')): ?>
                    	<li class="nav-item"><a class="btn btn-light action-button" role="button" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
                    <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link active" href="/TogetherPeopleStrong/portfolio/create">Manage Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="/TogetherPeopleStrong/portfolio/viewAll">Portfolios</a></li>
                        <li class="nav-item"><a class="nav-link" href="/TogetherPeopleStrong/affinities">Affinity Groups</a></li>
                        <li class="nav-item"><a class="nav-link" href="/TogetherPeopleStrong/job_postings">Jobs</a></li>
        		</ul>
    		</div>
            <div class="d-flex justify-content-end navbar-text actions">
<!--                 <span class="navbar-text actions"> -->
                        <a class="nav-item btn btn-secondary" href="<?php echo e(route('logout')); ?>"
                           	onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>
                    <a  class="nav-link btn btn-light" href="/TogetherPeopleStrong/editUserInfo" role="button">
                        <?php echo e(Auth::user()->name); ?> 
                    </a>
<!--             	</span> -->
        	</div>
            <?php endif; ?>
        </div>
    </div>
    <form class="nav-item" id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
    </form>
</nav><?php /**PATH C:\MAMP\htdocs\TogetherPeopleStrong\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>