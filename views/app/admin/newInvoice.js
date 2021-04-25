    /* https://nosmoking.developpez.com/tutoriels/javascript/listes-liees-entre-elles/ */

    /**
     * Fonction de rÃ©cupÃ©ration des donnÃ©es correspondant au critÃ¨re de recherche
     * @param   {String} condition - Chaine indiquant la condition Ã  remplir
     * @param   {Array}  table - Tableau contenant les donnÃ©es Ã  extraire
     * @returns {Array}  result - Tableau contenant les donnÃ©es extraites
     */
    function getDataFromTableCompany(condition, table) {
        // récupération de la clé et de la valeur
        var cde = condition.replace(/\s/g, '').split('='),
            key = cde[0],
            value = cde[1],
            result = [];

        // retour direct si *
        if (condition === '*') {
            return table.slice();
        }
        // retourne les éléments répondant à la condition
        result = table.filter(function(obj) {
            return obj[key] === value;
        });
        return result;
    }

    function getDataFromTablePeople(condition, table) {
        // récupération de la clé et de la valeur
        var cde = condition.replace(/\s/g, '').split('='),
            key = cde[0],
            value = cde[1][2],
            result = [];

        // retour direct si *
        if (condition === '*') {
            return table.slice();
        }
        // retourne les éléments répondant à la condition
        result = table.filter(function(obj) {
            return obj[key] === value;
        });
        return result;
    }
    /**
     * Affichage du nombre d'<option> présentes dans le <select>
     * @param {Object} obj - <select> parent
     * @param {Number} nb - nombre à afficher
     */
    function setNombre(obj, nb) {
        var oElem = obj.parentNode.querySelector('.nombre');
        if (oElem) {
            oElem.innerHTML = nb ? '(' + nb + ')' : '';
        }
    }
    /**
     * Fonction d'ajout des <option> à un <select>
     * @param   {String} id_select - ID du <select> à mettre à jour
     * @param   {Array}  liste - Tableau contenant les données à ajouter
     * @param   {String} valeur - Champ pris en compte pour la value de l'<option>
     * @param   {String} texte - Champ pris en compte pour le texte affiché de l'<option>
     * @returns {String} Valeur sélectionnée du <select> pour chainage
     */
    function updateSelect(id_select, liste, valeur, texte) {
        var oOption,
            oSelect = document.getElementById(id_select),
            i, nb = liste.length;
        // vide le select
        oSelect.options.length = 0;
        // désactive si aucune option disponible
        oSelect.disabled = nb ? false : true;
        // affiche info nombre options, facultatif
        setNombre(oSelect, nb);
        // ajoute 1st option
        if (nb) {
            oSelect.add(new Option('Choisir', ''));
            // focus sur le select
            oSelect.focus();
        }
        // création des options d'après la liste
        for (i = 0; i < nb; i += 1) {
            // création option
            oOption = new Option(liste[i][texte], liste[i][valeur]);
            // ajout de l'option en fin
            oSelect.add(oOption);
        }
        // si une seule option on la sélectionne
        oSelect.selectedIndex = nb === 1 ? 1 : 0;
        // on retourne la valeur pour le select suivant
        return oSelect.value;
    }
    /**
     * fonction de chainage des <select>
     * @param {String|Object} ID du <select> à traiter ou le <select> lui-même
     */
    function chainSelect(param) {
        // affectation par défaut
        param = param || $params['company'];
        var liste,
            id = param.id || param,
            valeur = param.value || '';

        // test à faire pour récupération de la value
        if (typeof id === 'string') {
            param = document.getElementById(id);
            valeur = param ? param.value : '';
        }

        switch (id) {
            case 'company':
                // récupération des données
                liste = getDataFromTableCompany('*', company);
                // mise à jour du select
                valeur = updateSelect($params['company_id'], liste, $params['company_id'], 'company_name');
                // chainage sur le select liÃ©
                chainSelect('people');
                break;

            case 'people':
                // affichage final
                liste = getDataFromTablePeople('people_id=' + valeur, people);
                // mise à jour du select
                valeur = updateSelect($params['people_id'], liste, $params['people_id'], 'people_from_company');
                break;

        }
    }
    // Initialisation après chargement du DOM
    document.addEventListener("DOMContentLoaded", function() {
        var oSelects = document.querySelectorAll('#liste select'),
            i, nb = oSelects.length;
        // affectation de la fonction sur le onchange
        for (i = 0; i < nb; i += 1) {
            oSelects[i].onchange = function() {
                chainSelect(this);
            };
        }
        // init du 1st select
        if (nb) {
            chainSelect('company');
        }
    });