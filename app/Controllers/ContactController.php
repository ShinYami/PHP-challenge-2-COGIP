<?php

namespace App\Controllers;

use App\Models\People;

class ContactController extends Controller
{

    public function listeContact()
    {
        $peoples = (new People())->all();
        return $this->view('app.contact.listeContact', compact('peoples'));
    }

    public function detailContact(int $id)
    {
        // faire la verification de la donnée
        $people = (new People())->findById($id);
        $invoices =  (new People())->allInvoiceFindById($id);
        return $this->view('app.contact.detailContact', compact('people', 'invoices'));
    }
}
