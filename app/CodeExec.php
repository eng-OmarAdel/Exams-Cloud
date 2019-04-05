<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Storage;
Class CodeExec extends Eloquent{

private $code ;
private $extension ;
private $compile_command ;
private $run_command ;
private $file_name ;
private $s ;

    function __construct($code_,$extension_) {
        $this->code=$code_;
        $this->extension=$extension_;
        $this->file_name = $this->create_file();
        $this->s = substr($this->file_name, 0, "-".(strlen($this->extension)+1));
        $this->compile_and_run_commands();
        $this->execute_code();
        $this->delete_files();
    }

    function create_file()
    {

    $file_name = \rand(0, mt_getrandmax()) . ".$this->extension";
    $txt = $this->code;

    Storage::disk('public')->put($file_name,$txt);


    return  asset('storage/'.$file_name);

;
    }

function execute_code()
    {
        // echo $this->compile_command;
    exec("C:\cygwin64\bin\bash.exe --login -c '".$this->compile_command."'", $output, $return_var);
    $x = "<span style='color: red'>Error</span>: ";
    foreach($output as $key => $value)
        {
        echo $x . $value . "<br />";
        $x = "";
        }
if(!isset($output[0])){
    exec($this->run_command, $output, $return_var);
    foreach($output as $key => $value)
        {
        echo $value . "<br />";
        }
    }}

function delete_files()
    {
    unlink($this->file_name);
    unlink(substr($this->file_name, 0, "-".(strlen($this->extension)+1)));
    }
function compile_and_run_commands()
    {
   
        if($this->extension== "c" || $this->extension== "cpp"){
            $this->compile_command="g++ $this->file_name -O3 -o  $this->s 2>&1";
            $this->run_command="./$this->s 2>&1";
        }else if($this->extension== "java"){
            echo "javac $this->file_name";
            $this->compile_command="javac $this->file_name";
            $this->run_command="java $this->s 2>&1";
        }

    }  
}
