function fecharPopup() {
    document.getElementById('popup').style.display = 'none';
    window.location.assign('index.php')
}

function imprimir() {
    window.print()
    var printStarted = false;
    
    window.onbeforeprint = function() {
      console.log("A impressão foi acionada.");
      printStarted = true;
    };
  
    window.onafterprint = function() {
      console.log("A impressão foi finalizada.");
  
      if (printStarted) {
        window.history.back(1);
      }
    };
};

function voltarPaginaAnterior() {
  window.history.back();
}

function enviarEmail() {
    alert('Função de envio de e-mail não implementada.');
};

function voltarPaginaInicial() {
  var mensagem = document.createElement('div');
  mensagem.textContent = "Nenhum registro de compra encontrado.";
  document.body.appendChild(mensagem);
  setTimeout(function() {
    window.history.back();
  }, 3500);
}





