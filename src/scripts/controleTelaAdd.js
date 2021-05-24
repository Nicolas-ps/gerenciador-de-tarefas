// Script fecha a tela de adicionar tarefas quando o botão é clicado
const botaoFechaTelaAdd = document.getElementById('botao');
const telaAddAtividade = document.getElementById('telaAddAtividade');


const fechaTelaAdd = botaoFechaTelaAdd.addEventListener('click', () => {
    telaAddAtividade.style.display = 'none';
});

//Script abre a tela de adicionar tarefas quando o botão é clicado
const botaoAbreTelaAdd = document.getElementById('botaoDrop');

const abreTelaAdd = botaoAbreTelaAdd.addEventListener('click', () => {
    telaAddAtividade.style.display = 'block';
});
