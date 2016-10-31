<?php
/**
 * Auto create .css file from Theme Options
 * @author 
 * @version 1.0.0
 */
 
class Theme_StaticCss
{
    public $scss;
    function __construct()
    {
        $this->scss = new scssc();
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');
        $this->generate_file();
    }


    public function generate_file()
    {
        $css = $this->scss_render();
        $css = minify_css($css);
        $file = get_template_directory() . '/assets/css/main.css';
        if (!file_put_contents( $file, $css, 0644) ) {
            _e( 'Error saving file!', '' );
        }
    }

    /**
     * scss compile
     */
    public function scss_render(){
        return $this->scss->compile('@import "master.scss"');
    }
}

new Theme_StaticCss();
