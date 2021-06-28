// Script fecha a tela de saída quando o botão cancelar é clicado
const telaSaida = document.getElementById('dropSaida');
console.log(telaSaida);

const botaoAbreTelaSaida = document.getElementById('botaoSair');
console.log(botaoAbreTelaSaida);

const botaoFechaTelaSaida = document.getElementById('botaoCancelar');
console.log(botaoFechaTelaSaida);


const AbreTelaSaida = botaoAbreTelaSaida.addEventListener('click', () => {
    telaSaida.style.display = 'flex';
});

const FechaTelaSaida = botaoFechaTelaSaida.addEventListener('click', () => {
    telaSaida.style.display = 'none';
});



