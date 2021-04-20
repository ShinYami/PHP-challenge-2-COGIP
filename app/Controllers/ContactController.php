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

    // pour formulaire + info des company
    public function newContact()
    {
        $compagny = (new People())->allCompagnyNameAndId();
        return $this->view('app.admin.newContact', compact('compagny'));
    }

    public function newContactPost()
    {
        // pour voir ce que le formulaire m'envoie
        // var_dump($_POST);
        // die;
        $result = (new People())->createPeople($_POST);

        if (!$result) {
            // pas bon
            return header('Location: /newContact');
        } else {
            // réussi
            return header('Location: /newContact');
        }
    }
}
