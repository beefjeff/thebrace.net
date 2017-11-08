<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'thebrace.net');

// Project repository
set('repository', 'git@thebrace.net:/var/git/thebrace.net.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', ['.env']);
add('shared_dirs', ['storage']);

// Writable dirs by web server 
add('writable_dirs', ['storage', 'vendor']);



// Servers

// Hosts

host('thebrace.net')
	->stage('production')
    ->set('deploy_path', '/var/www/{{application}}');

// Tasks
task('pwd', function(){
	$res = run('pwd');
	writeln('Current dir: $res');
});



task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

