## xhprof ##

Profiling - analyser la performance de applications PHP.

Installation de l'extension PHP sur Debian :

	apt-get install php5-xhprof
	
	/etc/php5/mods-available/xhprof.ini
	extension=xhprof.so
	
	cd /etc/php5/apache2/conf.d/
	ln -s ../../mods-available/xhprof.ini 20-xhprof.ini

	apache2ctl graceful

Installation de GUI :

Dans un vhost (de site, que on debug, soit sur un vhost dédié)

	mkdir xhprof
	cd xhprof/
	wget http://pecl.php.net/get/xhprof-0.9.2.tgz
	gzip -d xhprof-0.9.2.tgz 
	tar -xvf xhprof-0.9.2.tar
	chown -R cergy:cergy xhprof

	apt-get install graphviz

Dans le script, que on debug :

Au debut de script - activation de profiling :

	xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

A la fin de script - arret de profiling :

	$xhprof_data = xhprof_disable();
	include_once "xhprof/xhprof-0.9.2/xhprof_lib/utils/xhprof_lib.php";
	include_once "xhprof/xhprof-0.9.2/xhprof_lib/utils/xhprof_runs.php";
	$xhprof_runs = new XHProfRuns_Default();
	$run_id = $xhprof_runs->save_run($xhprof_data, "cergy");

	// URL to the XHProf UI libraries (change the host name and path)
	$profiler_url = sprintf('http://VHOST/xhprof/xhprof-0.9.2/xhprof_html/index.php?run=%s&source=%s', $run_id, 'cergy');
	echo '<a href="'. $profiler_url .'" target="_blank">Profiler output</a>';
-
-
-
-
-
-
-
-
-
-
-
-
-
-
-
-
-
-
-
-

