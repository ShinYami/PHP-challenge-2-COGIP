<?php
class Invoices {
/* Propriétés */
    public $invoice_id;
    public $invoice_number;
    public $invoice_date;

    public $company_id;
    public $people_id;
/* Fin des propriétés */

/* Constructeur */
    public function __construct($invoice_id, $invoice_number,$invoice_date, $company_id, $people_id){
        $this->invoice_id = $invoice_id;
        $this->invoice_number = $invoice_number;
        $this->invoice_date = $invoice_date;
        
        $this->company_id = $company_id;
        $this->people_id = $people_id;
    }
/* Fin du constructeur */

/* Méthodes */
    /* ajouter une nouvelle facture */
    public function create() {

    }

    /* afficher une facture */ /* page des factures */
    public function read() {
        //SELECT invoice_number, invoice_date, company_name, type_name FROM invoice, company, typeofcompany WHERE invoice.company_id=company.company_id AND company.type_id=typeofcompany.type_id ORDER BY invoice.invoice_date DESC;
        // renvoie $invoice_number, $invoice_date, $company_name, $type_name
    }

    /* modifier une facture */
    public function update() {

    }

    /* supprimer une facture */
    public function delete() {

    }
/* Fin des méthodes */
}




/* Requêtes nécessaires dans le projet */

/*
// 5 dernières factures
//SELECT invoice_number, invoice_date, company_name FROM invoice, company WHERE invoice.company_id=company.company_id ORDER BY invoice.invoice_date DESC LIMIT 0,5;
// renvoie $invoice_number, $invoice_date, $company_name
*/
/*
// 5 derniers contacts
//SELECT people_firstname, people_lastname, people_phone, people_email, company_name FROM people, company WHERE people.company_id=company.company_id ORDER BY people.people_id DESC LIMIT 0,5;
// renvoie $people_firstname, $people_lastname, $people_phone, $people_email, $company_name
*/
/*
// 5 dernières sociétés
//SELECT company_name, company_tva, company_country, type_name FROM company, typeofcompany WHERE company.type_id=typeofcompany.type_id ORDER BY company.company_id DESC LIMIT 0,5;
// renvoie $company_name, $company_tva, $company_country, $type_name
*/
/*
// Listing des sociétés
//SELECT type_name, company_name, company_tva, company_country FROM company, typeofcompany WHERE company.type_id=typeofcompany.type_id ORDER BY company.company_name ASC;
// renvoie $type_name, $company_name, $company_tva, $company_country
*/
/*
// Listing des factures
//SELECT invoice_number, invoice_date, company_name, type_name FROM invoice, company, typeofcompany WHERE invoice.company_id=company.company_id AND company.type_id=typeofcompany.type_id ORDER BY invoice.invoice_date DESC;
// renvoie $invoice_number, $invoice_date, $company_name, $type_name
*/
/*
// Listing des contacts
//SELECT people_firstname, people_lastname, people_phone, people_email, company_name FROM people, company WHERE people.company_id=company.company_id ORDER BY people.people_lastname ASC;
// renvoie $people_firstname, $people_lastname, $people_phone, $people_email, $company_name
*/
/*
// Listing des fournisseurs
//SELECT company_name, company_tva, company_country FROM company, typeofcompany WHERE company.type_id=typeofcompany.type_id AND typeofcompany.type_name="fournisseur" ORDER BY company.company_name ASC;
// renvoie $type_name, $company_name, $company_tva, $company_country
*/
/*
// Listing des clients
//SELECT company_name, company_tva, company_country FROM company, typeofcompany WHERE company.type_id=typeofcompany.type_id AND typeofcompany.type_name="client" ORDER BY company.company_name ASC;
// renvoie $type_name, $company_name, $company_tva, $company_country
*/
/*
// Détail de société
//SELECT company_name, company_tva, type_name, people_firstname, people_lastname, people_phone, people_email, invoice_number, invoice_date, people_email FROM company, typeofcompany, people, invoice WHERE company.type_id=typeofcompany.type_id AND company.company_id=people.company_id AND company.company_id=invoice.company_id AND invoice.people_id=people.people_id AND invoice.people_id=people.people_id AND company.company_name="Dunder Mifflin";
// renvoie $company_name, $company_tva, $type_name, $people_firstname, $people_lastname, $people_phone, $people_email, $invoice_number, $invoice_date, $people_email
*/
/*
// Détail de facture
//SELECT invoice_number, invoice_date, company_name, company_tva, type_name, people_firstname, people_lastname, people_email, people_phone FROM `invoice`,`company`,`typeofcompany`,`people` WHERE invoice.company_id=company.company_id AND company.type_id=typeofcompany.type_id AND invoice.people_id=people.people_id AND invoice_number="F20190404-004";
// renvoie $invoice_number, $company_name, $company_tva, $type_name, $people_firstname, $people_lastname, $people_email, $people_phone
*/
/*
// Détail de contact
//SELECT people_firstname, people_lastname, company_name, people_email, people_phone, invoice_number, invoice_date FROM people, company, invoice WHERE people.company_id=company.company_id AND people.people_id=invoice.people_id AND people.people_firstname="Bertram" AND people.people_lastname="Gilfoyle";
// renvoie $people_firstname, $people_lastname, $company_name, $people_email, $people_phone, $invoice_number, $invoice_date
*/











/* Fin des requêtes */




?>