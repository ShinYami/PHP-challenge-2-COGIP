<?php

namespace App\Controllers;

use App\Models\Invoice;

class UserController extends Controller {

    public function home() {

        return $this->view('app.home');
    }

    public function invoice() {

        $invoice = (new Invoice())->readAll();
        return $this->view('app.bonjour', compact('invoice'));
    }

    public function invoicePost() {

        $invoice = (new Invoice())->readAll();
        return $this->view('app.bonjour', compact('invoice'));
    }

    public function newInvoice() {
        $invoice = (new Invoice())->invoicesNumberId();
        return $this->view('app.admin.newInvoice', compact('invoice'));
    }

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
?>