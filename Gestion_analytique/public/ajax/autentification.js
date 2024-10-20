import Ajax from './Ajax.js';
const ajax = new Ajax();

const formConfig = {
    login: {
        url: 'login',
        fields: ['nom','password']
    }
};

document.getElementById('login').addEventListener('submit', ajax.soumissionFormulaireGenerique('login', formConfig));