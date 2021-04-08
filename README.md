# PHP-challenge-2-COGIP

## Team's members

* [Loris Conti](https://github.com/ShinYami)
* [Frédérique Baillais](https://github.com/FrederiqueBaillais)
* [Laura VLN](https://github.com/Laura-VLN)
* [Romain Mathieu](https://github.com/RomainM27)

## HTML Page

[Link to the project(not done)]()

## Used languages

> Whuttt?
> ...

## Mission :

<details close>
  <summary> Objectives :</summary>
  
We will evaluate your project based on:

- Use of different URL parameters and filename
- Use of **sanitization** to avoid **SQL injections**
- Validation of data
- Construction of a functional relational database
- Use of correct **joins** in **SQL**
- Use of **aliases** in your **SQL request**
- Implementation of a **CRUD** to read, add, modify and delete data

At the end of this challenge you should be able to:

- Crypt password in a database
- Use an **MVC** structure
- Use a **router**
- Setup a session
- Allow access to certain page in regards to **permissions**

</details>

<details close>
  <summary> To do :</summary>

The **COGIP** is a company which we don't know an all lot about apart that they
produce [Jean-Michel toys](http://dai.ly/x3a51) and that they are serious workers [check](https://www.dailymotion.com/video/x68i87). They also have incredible [employees](https://www.dailymotion.com/video/xabck6) within their rank.

**Jean-Christian Ranu** works in accounting at the **COGIP**. He has been using an
old, ugly and incomplete software for years, making him go between it and excels
sheet. **Jean-Christian** like paella, crosswords and his coworker **Muriel Perrache**.

We propose that you code a **web application** which will respond to the needs and
desire of **Jean-Christian**.

NOTE: Don't forget to add an **SQL file** containing the structure in the
repository, as well as, an entry within the README detailing what each person
did.

### Tips

- **Think about your strategy!** What are you going to start with? The database?
The SQL request? The connexion to the database? The design? You should all agree
on the procedure.
- **You should all do some CRUD**, you're 3 and there is 3 types of documents to
process (invoice, companies, people), just saying.
- **You should all read the briefing**, there are certainly informations you won't
have picked on your own and if it's still unclear, ask the client (coaches).
Understanding the vision of the client is also a big part of development.
- **Communication is important!** Between the members of the group, with the
client and even with other member of your startup.

### Instructions

#### Data needed by Jean-Christian

##### Tables

Some information must be into the database an *it is not negotiable*: the data
relating to people, companies and invoices. All this divided into four tables.

For the people, we will need:

- Their first name
- Their last name
- Their email

For companies, we will need:

- Name of the company
- Its country
- VAT number

For invoices, we will need:

- Number of the invoice
- Date of the invoice

For the type of company:

- The type (either client or provider)

NOTE: For clarity sake, a company of type **client** would buy something from the
**COGIP**, we'll send them an invoice, while a **provider** company is one the **COGIP** buys stuff from (products or services).

##### Relations

The relations between the table would be as follow:

- Company --- type
- Company --- invoice
- People --- invoice
- People --- company

#### The application

##### Welcome page

The welcome page should display:

- A welcome message for **Jean-Christian Ranu** (if logged in)
- The list of the last 5 invoices, ordered by date
- The list of the last 5 people encoded in the database
- The list of the last 5 companies encoded in the database
- A link to the providers page
- A link to the client page

##### Companies page

This page will **display a list** of all **companies** in alphabetical order. The
name of the company will be a link to a new page **detailing** the company, the
content will be generated with the **ID** of the chosen company.

##### Invoices page

This page will *display a list* of all the **invoices** from the most recent to
the oldest. Each invoice number will be a link to a new page **detailing** the
invoice, the content will be generated with the **ID** of the chosen invoice.

##### Contacts page

This page will **display a list** of all the **contacts** in alphabetical order.
Each contact name will be a link to a new page **detailing** the contact, the
content will be generated with the **ID** of the chosen contact.

##### Providers page

This page will **display a list** of all **providers** in alphabetical order. The
name of the provider will be a link to a new page **detailing** the provider, the
content will be generated with the **ID** of the chosen provider. (same detailing
page as for companies)

##### Clients page

This page will **display a list** of all the **clients** in alphabetical order.
Each client name will be a link to a new page **detailing** the contact, the
content will be generated with the **ID** of the chosen contact. (same detailing
page as for contacts)

##### Company details page

This page will display the following informations:

- Name of the company
- VAT number of the company
- List of invoices linked to the company
- List of contacts working for the company

##### Invoice details page

This page will display the following informations:

- Number
- Date
- Company linked to the invoice
- Type of company linked the invoice (provider or client)
- Contact linked to the invoice

##### Contact details page

This page will display the following informations:

- First and last name
- Email
- Name of the company where the person works
- The list of all invoices linked to that person

#### Administration part for Ranu

##### Informations

Make it so the parameter in the **URL** are **not the same** as the name of the **PHP file**.

For example: imagine a website with an URL to modify a recipe which would be
`recettes.com/?modifplat=17` but which would actually call a file named
**updaterecipe.php**.

##### What does Ranu need ?

Once you have done the **consultation** part of the accounting database for
**Jean-Christian**, you will have to create an interface of administration from
which he'll be able to input, modify and delete data.

He will need a **dashboard** in which he will have a direct access to the:

- Five last invoices (**number invoice, date, company**), by clicking the invoice number or the company, he will be able to edit them.
- Five last companies (**company name, its type**), by clicking the invoice the company name, he will be able to edit them.
- Five last contact (**first and last name, email, company name**), by clicking the contact name, the invoice number or the company name, he will be able to edit them.

On the same line as each element there should also be an **bin icon** to delete
it.

With the help of button there should also be quick access to:

- New invoice
- New contact
- New company

There must also be a custom message on the **welcome page** depending if **Muriel**
or **Jean-christian** is connected.

If the user as *god mode* access (by default: **Jean-Christian** as it, his
password is his last name) he will also have access to a button to manage the
users. This button will lead him to a dashboard showing the **members** (users who have an access to the application),
their **access right** and the power to modify them.

If the user as **moderator** access (by default: **Muriel**, her password is her
last name) he will have access to the admin dashboard, he can add **invoices**,
**companies** and **people** but can't either modify or delete elements from the
database.

#### Still unclear ?

This link [file](./mockup.md) resumes (with an ugly design) the pages and what
they should contain.

### Optional

Realise a nice and modern design for our friend **Jean-Christian**. Let's not
forget that he as been in accounting at the **COGIP** for more than 20 years! It's
high time to change his habits and make him enter the 21st century.

NOTE: It is imperative however that the slogan of the _COGIP_ (_vive la COGIP!_)
be in the footer.
</details>
