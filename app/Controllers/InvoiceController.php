<?php

namespace App\Controllers;

use App\Models\Invoice;

class InvoiceController extends Controller {

    public function invoice() {
        $invoices = (new Invoice())->readAll();
        return $this->view('app.invoice.listInvoice', compact('invoices'));
    }

    public function detailInvoice(int $id) {
        $invoice = (new Invoice())->readOne($id);
        return $this->view('app.invoice.detailInvoice', compact('invoice'));
    }

    public function newInvoice() {
        $invoice = (new Invoice())->invoicesNumberId();
        return $this->view('app.admin.newInvoice', compact('invoice'));
    }

    /*public function newInvoicePost() {
        $invoice = (new Invoice())->invoicesNumberId();
    }*/

    public function updateInvoicePost() {
        $result = (new Invoice())->update($_POST);

        if (!$result) {
            // pas bon
            return header('Location: /newInvoice');
        } else {
            // réussi
            return header('Location: /newInvoice');
        }
    }
}
