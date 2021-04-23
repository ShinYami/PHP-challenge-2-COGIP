<?php

namespace App\Controllers;

use App\Models\Invoice;

class InvoiceController extends Controller
{
    /* affiche toutes les infos des factures */
    public function invoice()
    {
        $invoices = (new Invoice())->readAll();
        return $this->view('app.invoice.listInvoice', compact('invoices'));
    }

    /* affiche les détails d'une facture en particulier */
    public function detailInvoice(int $id)
    {
        $invoiceDetail = (new Invoice())->invoicesNumberId($id);
        $invoiceCompany = (new Invoice())->readOneCompany($id);
        $invoiceContact = (new Invoice())->readOneContact($id);
        return $this->view('app.invoice.detailInvoice', compact('invoiceDetail', 'invoiceCompany', 'invoiceContact'));
    }

    /* affiche pour une nouvelle facture */
    public function newInvoice()
    {
        $invoiceAllCompany = (new Invoice())->readAllCompany();
        // essayer d'affiner les contacts an fonction de la société choisie au-dessus
        $invoicePeople = (new Invoice())->readAllPeople();
        return $this->view('app.admin.newInvoice', compact('invoiceAllCompany', 'invoicePeople'));
    }

    /* affiche les informations pour une nouvelle facture en méthode POST */
    public function newInvoicePost()
    {
        /*// nettoyage des informations
        if (isset($_POST['button'])) {
            // vérification (sanitize et validate) des entrées invoice_number
            if (isset($_POST['invoice_number'])) {
                $invoice_number = filter_var($_POST['invoice_number'], FILTER_SANITIZE_STRING);
                //garde uniquement les lettres
                $patterninvoice_number = "/^[A-Z-0-9]*$/";
                preg_match($patterninvoice_number, $invoice_number);
                //fin de regex
                if (!preg_match($patterninvoice_number, $invoice_number)) {
                    $msg = "Mauvaise entrée dans le numéro de facture";
                    $valid = false;
                }
            }
            // vérification (sanitize et validate) des entrées invoice_date
            if (isset($_POST['invoice_date'])) {
                $invoice_date = filter_var($_POST['invoice_date'], FILTER_SANITIZE_STRING);
                // regex date
                $patterninvoice_date = "/^[0-9\/]*$/";
                preg_match($patterninvoice_date, $invoice_date);
                // fin regex
                if (!preg_match($patterninvoice_date, $invoice_date)) {
                    $msg = "Mauvaise entrée dans la date";
                    $valid = false;
                }
            }
            // vérification qu'il y a bien une entrée dans la company_name
            if (isset($_POST['company_name'])) {
                $valid = true;
            } else {
                $valid = false;
            }
            // vérification qu'il y a bien une entrée dans le people_firstlastname
            if (isset($_POST['people_firstlastname'])) {
                $valid = true;
            } else {
                $valid = false;
            }
            // si les données ont bien été validées et sont correctes
            if ($valid == true) {
                // lancer la function newInvoicePost() contenue dans invoiceController.php
                $createInvoice = (new Invoice())->newInvoicePost();
            } else { // si $valid == false
                // rechargement de la page
                return header('Location: /newInvoice');
            }
        }*/

        $result = (new Invoice())->create($_POST);

        if (!$result) {
            // errur
            return header('Location: /newInvoice');
        } else {
            // bon
            return header('Location: /newInvoice');
        }
    }
}
