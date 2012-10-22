<?php
    if (!defined('ELFINDER_DIR')) {
        define ('ELFINDER_DIR', APP  . DS);
    }
    if (!defined('ELFINDER_URL')) {
        define ('ELFINDER_URL', 'http://'.$_SERVER['HTTP_HOST'] .'/files/');
    }
    
    

	App::import('Vendor', 'Fileman.elFinder/elFinderConnector.class');
	App::import('Vendor', 'Fileman.elFinder/elFinder.class');
	App::import('Vendor', 'Fileman.elFinder/elFinderVolumeDriver.class');
	App::import('Vendor', 'Fileman.elFinder/elFinderVolumeLocalFileSystem.class');

    class FilemanController extends AppController {
    	public $uses = '';
    	public $components = array('RequestHandler');

		var $opts = array(
			'root'            => ELFINDER_DIR, // path to root directory
			'URL'             => ELFINDER_URL, // root directory URL
			'rootAlias'       => 'Home',       // display this instead of root directory name
			'uploadAllow'   => array('images/*'),
			'uploadDeny'    => array('all'),
			'uploadOrder'   => 'deny,allow',
			 'disabled'     => array(),       //list of not allowed commands
			 'dotFiles'     => false,         //display dot files
			 'dirSize'      => true,          //count total directories sizes
			 'fileMode'     => 0666,          //new files mode
			 'dirMode'      => 0777,         // new folders mode
			 'mimeDetect'   => 'internal',       // files mimetypes detection method (finfo, mime_content_type, linux (file -ib), bsd (file -Ib), internal (by extensions))
			 'uploadAllow'  => array(),       //mimetypes which allowed to upload
			 'uploadDeny'   => array(),       //mimetypes which not allowed to upload
			 'uploadOrder'  => 'deny,allow', // order to proccess uploadAllow and uploadAllow options
			 'imgLib'       => 'mogrify',     //   image manipulation library (imagick, mogrify, gd)
			 'tmbDir'       => '.tmb',       // directory name for image thumbnails. Set to "" to avoid thumbnails generation
			 'tmbCleanProb' => 1,            // how frequiently clean thumbnails dir (0 - never, 100 - every init request)
			 'tmbAtOnce'    => 5,            // number of thumbnails to generate per request
			 'tmbSize'      => 48,           // images thumbnails size (px)
			 'fileURL'      => true,         // display file URL in "get info"
			 'dateFormat'   => 'j M Y H:i',  // file modification date format
			 'logger'       => null,         // object logger
			 'defaults'     => array(        // default permisions
			 	'read'   => true,
			 	'write'  => true,
			 	'rm'     => true
			 	),
			 'perms'        => array(),      // individual folders/files permisions    
			 'debug'        => true,         // send debug to client
			 'archiveMimes' => array(),      // allowed archive's mimetypes to create. Leave empty for all available types.
			 'archivers'    => array() ,     //  info about archivers to use. See example below. Leave empty for auto detect
			 'archivers' => array(
			 	'create' => array(
			 		'application/x-gzip' => array(
			 			'cmd' => 'tar',
			 			'argc' => '-czf',
			 			'ext'  => 'tar.gz'
			 			)
			 		),
			 	'extract' => array(
			 		'application/x-gzip' => array(
			 			'cmd'  => 'tar',
			 			'argc' => '-xzf',
			 			'ext'  => 'tar.gz'
			 			),
			 		'application/x-bzip2' => array(
			 			'cmd'  => 'tar',
			 			'argc' => '-xjf',
			 			'ext'  => 'tar.bz'
			 			)
			 		)
			 	)
		);

	    public function beforeFilter()
	    {  
	        parent::beforeFilter();
	    }

		function access($attr, $path, $data, $volume) {
			return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
				? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
				:  null;                                    // else elFinder decide it itself
		}

	    public function admin_index() {
	    	
	        $this->set('title_for_layout', 'Filemanager');
	        $this->helpers[] = 'Fileman.Elfinder';

	        if($this->RequestHandler->isAjax() || $this->RequestHandler->isPost()) {
				$fm = new elFinder($this->opts); 
				$fm->run();
			}
	    }
}