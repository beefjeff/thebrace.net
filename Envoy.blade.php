@servers(['production' => 'thebrace.net'])
<?php
$repo = 'git@thebrace.net:/var/git/thebrace.net.git';
$release_dir = '/var/www/releases';
$app_dir = '/var/www/thebrace.net';
$release = 'release_' . date('YmdHis');

        ?>


@macro('deploy', [ 'on' => 'production' ])
	fetch_repo
	run_composer
	update_permissions
	update_symlinks
@endmacro

@task('fetch_repo')
    [ -d {{ $release_dir }} ] || mkdir {{ $release_dir }}
	cd {{ $release_dir }};
	git clone -b master {{ $repo }} {{ $release }}
@endtask

@task('run_composer')
    cd {{ $release_dir }}/{{$release}};
	composer install --prefer-dist
@endtask

@task('update_permissions')
    cd {{ $release_dir }};
	chgrp -R www-data {{ $release }};
	chmod -R ug+rwx {{ $app_dir }};
@endtask

@task('update_symlinks')
    ln -nfs {{ $release_dir }}/{{ $release }} {{ $app_dir }};
	chgrp -h www-data {{ $app_dir }};
	sudo service php-fpm7.1
@endtask


