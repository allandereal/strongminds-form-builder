<?php

namespace App\Exports;

use App\Models\Form;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportForm implements FromCollection
{
    public $form;

    public function __construct($form)
    {
        $this->form = $form;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Form::find($this->form);
    }
}
