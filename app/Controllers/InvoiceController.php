<?php

namespace App\Controllers;

use App\Models\Invoice;

class InvoiceController extends Controller {

    public function invoice() {
        $invoices = (new Invoice())->readAll();
        return $this->view('app.invoice.listInvoice', compact('invoices'));
    }

    public function detailInvoice(int $id) {
        $invoiceCompany = (new Invoice())->readOneCompany($id);
        $invoiceContact = (new Invoice())->readOneContact($id);
        return $this->view('app.invoice.detailInvoice', compact('invoiceCompany', 'invoiceContact'));
    }

    public function newInvoice() {
        $invoice = (new Invoice())->invoicesNumberId();
        return $this->view('app.admin.newInvoice', compact('invoice'));
    }

    public function newInvoicePost() {
        $invoice = (new Invoice())->create($_POST);
        if (!$result) {
            // pas bon
            return header('Location: /newInvoice');
        } else {
            // réussi
            return header('Location: /newInvoice');
        }
    }
}
