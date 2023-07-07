<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datatable extends Component {
    
    public $title;
    public $crud;
    public $header;
    public $data;
    public $acoes;
    public $ativos;

    public function __construct($title, $crud, $header, $data, $acoes, $ativos) {

        $this->title = $title;   
        $this->crud = $crud;
        $this->header = $header;
        $this->data = $data;
        $this->acoes = $acoes;
        $this->ativos = $ativos;
    }

    public function render() {
        return view('components.datatable');
    }
}
