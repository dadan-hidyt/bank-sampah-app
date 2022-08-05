<?php
/**
 * Library cookie untuk menangani pembuatan halaman views
 * dan parsing html
 * @author dadan
 * @package library
 */
namespace Libs;
class View {
	private $layout = null;
    private $file = null;
    private $data = [];
    private $view_path;
    private $layout_surfix = '_layout';
    private $content_buffer;
    private $layout_buffer;
    public function __construct(string $file, array $data = [])
    {
        /**  view file */
        if(!$this->file) {
            $this->file = $file.'.php';
        }
        $this->data = $data;
        $this->view_path = ROOT_PATH.'view'.DS;
        return $this;
    }
    public function include($filename) {
        $file = $this->view_path.$filename.'.php'; 
        if (is_file($file)) {
            require $file;
        } else {
            throw new \Exception("{$file} file not found", 1);
        }
    }
    public function _find_view_file($file) {
        if (!empty($this->file)) {
            $file = $this->view_path.$file;
            if(is_file($file)) {
                return str_replace(['\\','/'],[DS,DS],$file);
            }
        }
        return false;
    }
    public function _render_layout() {
        if(is_file($this->layout) && null !== $this->layout) {
            $content = file_get_contents($this->layout);
            $this->layout_buffer = $this->_parsing($content);
            return true;
        }
        return false;
    }
    /**
     * untuk memparsing
     */
    public function _parsing($content) {
        $content = str_replace(['%@content%'],['<?= $this->get_content(); ?>'],$content);
        /**variabel parsing**/
        preg_match_all('/%([a-zA-Z0-9_-]*)%/',$content,$match,PREG_SET_ORDER);
        foreach ($match as $value) {
           $content = str_replace($value[0],isset($this->data[$value[1]]) ? $this->data[$value[1]] : '',$content);
        }
        /**
         * untuk memparsing @include() parsing 
         **/
        preg_match_all('/@include\((.*)\)/',$content,$match,PREG_SET_ORDER);
        foreach ($match as $value) {
           $file = trim($value[1]);
           $content = str_replace($value[0],'<?php $this->include('.$file.'); ?>',$content);
        }
        /** parsing {%function()} */
        preg_match_all('/@(|=)\{(.*)\}/',$content,$match,PREG_SET_ORDER);
        foreach ($match as $value) {
            $assgment = false;
            if($value[1] === '=') {
                $assgment = true;
            }
            if($assgment) {
                $php = "<?= $value[2] ?>";
            } else {
                $php = "<?php $value[2] ?>";
            }

            $content = str_replace($value[0],$php,$content);
        } 
        /**
         * untuk memparsing struktur logika
         * ------PATTERN---------------COMPILED-----------
         * 	  	@if(kondisi) 	  <?php if(kondisi): ?>
         * 	  	@else 	 		  <?php else: ?>
         * 	  	@endif 	 		  <?php endif: ?>
         * 		@for($i;$k;$i):	  <?php for($i;$k;$i): ?>
         * 		@endfor			  <?php endfor; ?>
         * */
        return $content;
    }
    public function _render_view() {
        if ($file = $this->_find_view_file($this->file)) {
            $content = file_get_contents($file);
            $content = str_replace('%@content%','',$content);
            $this->content_buffer = $this->_parsing($content);;
        }
    }
    /**
     * mendapatkan konten yang 
     * dihasilkan dari file view
     */
    private function get_content() {
        ob_start();
        eval('?>'.$this->content_buffer.'<?php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
	public function render() {
        extract($this->data);
        if(true === $this->_render_layout()) {
            $this->_render_layout();
            $this->_render_view();
            eval("?>".$this->layout_buffer."<?php");
       } else {
            $this->_render_view();
            eval("?>".$this->content_buffer."<?php");
       }

	}
    public function convert_camle_case($string){

    }
	public function set_layout($layout) {
		if (!$this->layout) {
            $layout = trim($layout,'');
			$layout = implode(DS,explode('.', $layout));
            $layout_path = $this->view_path.$layout.$this->layout_surfix.'.php';
            $this->layout = $layout_path;
		}
	}
}