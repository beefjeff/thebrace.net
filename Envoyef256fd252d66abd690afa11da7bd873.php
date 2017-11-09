<?php $release_link = isset($release_link) ? $release_link : null; ?>
<?php $release = isset($release) ? $release : null; ?>
<?php $app_dir = isset($app_dir) ? $app_dir : null; ?>
<?php $release_dir = isset($release_dir) ? $release_dir : null; ?>
<?php $repo = isset($repo) ? $repo : null; ?>
<?php $__container->servers(['web' => 'thebrace.net']); ?>

<?php
$repo = '/var/git/thebrace.net.git';
$release_dir = '/var/www/releases';
$app_dir = '/var/www/thebrace.net';
$release = 'release_' . date('M/d/Y_H:i.s');

$release_link = $app_dir.'/app';
?>

<?php $__container->startMacro('deploy', ['on' => 'web']); ?>
	identify
	fetch_repo
	run_composer
	update_permissions
	update_symlinks
<?php $__container->endMacro(); ?>

<?php $__container->startMacro('rollback', ['on' => 'web'); ?>
    list_releases
<?php $__container->endMacro(); ?>


<?php $__container->startTask('identify'); ?>
	echo "logged into $(hostname) as $(whoami)"
<?php $__container->endTask(); ?>

<?php $__container->startTask('list_releases'); ?>
	ls <?php echo $release_dir; ?>


<?php $__container->endTask(); ?>
<?php $__container->startTask('fetch_repo'); ?>
	[ -d <?php echo $release_dir; ?> ] || mkdir <?php echo $release_dir; ?>;
	cd <?php echo $release_dir; ?>;
	git clone -b master <?php echo $repo; ?> <?php echo $release; ?>;
<?php $__container->endTask(); ?>

<?php $__container->startTask('run_composer'); ?>
	cd <?php echo $release_dir; ?>/<?php echo $release; ?>;
	composer install --prefer-dist --no-scripts --no-dev;
	php artisan clear-compiled --env=production;
	php artisan optimize --env=production;
<?php $__container->endTask(); ?>

<?php $__container->startTask('update_permissions'); ?>
	cd <?php echo $release_dir; ?>;
	sudo chmod -R ug+rwx <?php echo $release; ?>;
	sudo chgrp -R www-data <?php echo $release; ?>;
<?php $__container->endTask(); ?>

<?php $__container->startTask('update_symlinks'); ?>
	ln -nfs <?php echo $release_dir; ?>/<?php echo $release; ?> <?php echo $release_link; ?>;
	chgrp -hR www-data <?php echo $app_dir; ?>;

	cd <?php echo $release_link; ?>;
	ln -nfs <?php echo $app_dir; ?>/.env <?php echo $release_link; ?>/.env;
	chgrp -h www-data .env;

	rm -r <?php echo $release_dir; ?>/<?php echo $release; ?>/storage/logs;
	cd <?php echo $release_dir; ?>/<?php echo $release; ?>/storage;

	mkdir -p <?php echo $app_dir; ?>/logs
	ln -nfs <?php echo $app_dir; ?>/logs <?php echo $release_link; ?>/storage/logs;
	chgrp -h www-data logs;

	sudo service php7.1-fpm reload;
<?php $__container->endTask(); ?>