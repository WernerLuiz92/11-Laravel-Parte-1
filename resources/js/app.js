require('./bootstrap');

import { format, render, cancel, register } from 'timeago.js';
import pt_BR from 'timeago.js/lib/lang/pt_BR';
register('pt_BR', pt_BR);

const nodes = document.querySelectorAll('.timeago');

if (nodes.length > 0) {
    render(nodes, 'pt_BR');
}