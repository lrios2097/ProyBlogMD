<?php
// si vamos a utilizar namespace, este archivo debe llevar mayuscula en la primera letra
namespace Proyphp\Blog\model;
use League\CommonMark\CommonMarkConverter;
use Error;

class Post{

    public function __construct(private string $file)
    {
        //$this->getFileName();
    }

    public function getContent(){
        $converter = new CommonMarkConverter(['html_input' => 'escape', 'allow_unsafe_links' => false]); // SAle error por la librería, pero funciona bien 1:34:52
        

        if(file_exists($this->getFileName())){
        $stream=fopen($this->getFileName(), 'r'); //permite generar un string basado en la direccion del archivo
        $content = fread($stream, filesize($this->getFileName()));
        return $converter->convert($content);  //fx para que aprezcan los saltos de linea archivos md
        }else{
            $this->getFileNameWithoutDash();
            if(file_exists($this->getFileName())){
            $stream=fopen($this->getFileName(), 'r');
            $content = fread($stream, filesize($this->getFileName()));
            return $converter->convert($content);;
            }
        }
        throw new Error('File does not exist');
        
        
    }

    public function getFileName(){
        $dir = Url::getRootPath();
        $fileName = "{$dir}/entries/{$this->file}";

        return $fileName;
    }

    
    public static function getPosts(){
        $posts = [];
        $files = scandir(Url::getRootPath().'/entries');

        foreach ($files as $file) {
            if (strpos($file, '.md')>0) { // estoy validando que sean archivos .md
                $post = new Post($file);
                array_push($posts, $post);
            }
        }
        
        return $posts;
    }

    //Con esta f modifico la utl para que tengo _ en los " "
    public function getUrl(){
        $url = substr($this->file, 0 , strpos($this->file, '.md')); // busco el nombre del archivo sin la extencion
        $title = str_replace(' ', '-', $url); // esto es para evitar que los espacios salgan como %20%
        return "http://localhost/Proyectosphp/ProyBlog/?post={$title}";
    }

    //funcion oppuesta a Get URI
    private function getFileNameWithoutDash(){ 

        $title = str_replace('-', ' ', $this->file);
        $this->file = $title;
        return $title;
    }

    public function getPostName(){
        $title=$this->file;
        $title = str_replace('-', ' ', $this->file);
        $title = str_replace('.md', ' ', $this->file);

        return $title;
    }
}