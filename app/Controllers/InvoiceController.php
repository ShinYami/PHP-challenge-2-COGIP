<?php

namespace App\Controllers;

use App\Models\Invoice;

class InvoiceController extends Controller
{

    public function invoice()
    {
        $invoices = (new Invoice())->readAll();
        return $this->view('app.invoice.listInvoice', compact('invoices'));
    }

    public function detailInvoice(int $id)
    {
        $invoiceDetail = (new Invoice())->invoicesNumberId($id);
        $invoiceCompany = (new Invoice())->readOneCompany($id);
        $invoiceContact = (new Invoice())->readOneContact($id);
        return $this->view('app.invoice.detailInvoice', compact('invoiceDetail', 'invoiceCompany', 'invoiceContact'));
    }

    public function newInvoice()
    {

        $invoiceAllCompany = (new Invoice())->readAllCompany();
        // je sais pas
        //$invoicePeopleByCompany = (new Invoice())->readAllPeopleByCompany($id);
        return $this->view('app.admin.newInvoice', compact('invoiceAllCompany', 'invoicePeopleByCompany'));
    }

    public function newInvoicePost()
    {

        var_dump($_POST);
        die;

        $invoice = (new Invoice())->create($_POST);
        $company = (new Invoice())->create($_POST);
        $people = (new Invoice())->create($_POST);
        if (!$result) {
            // pas bon
            return header('Location: /newInvoice');
        } else {
            // réussi
            return header('Location: /newInvoice');
        }
    }
}
