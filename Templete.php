<?php
	/**
	 * this is a templete page use as a path between your pages.
	 */
	class Templete{
		// path to templete
		protected $Templete;
		// vars passed In
		protected $vars = array();

		// construct
		public function __construct($Templete)
		{
			$this->Templete = $Templete;
		}

		public function __get($key){
			return $this->vars[$key];
		}

		public function __set($key,$value){
			$this->vars[$key]= $value ;
		}

		public function __toString(){
			extract($this->vars);              // by ( extract() ) you can use ($name;) or($title)  instead of ($Templete->name;) or
											   //  ($Templete->title;)
			chdir(dirname($this->Templete));      // ( chdir(dirname())  )  define the path name.
			ob_start();           // start a buffer to output the templete.
			include basename($this->Templete);    //   ( include basename()  ) include the base of the templete.
			return ob_get_clean();
		}
	}

?>