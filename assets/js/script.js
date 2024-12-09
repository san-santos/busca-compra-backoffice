function verificarCampos() {
  const nome = document.getElementById("nome").value.trim();
  const cpf = document.getElementById("cpf").value.trim();
  const data = document.getElementById("data").value.trim();

  const botao = document.getElementById("botaoBuscar");

  if (nome !== "" && cpf !== "" && data !== "") {
    botao.disabled = false;
  } else {
    botao.disabled = true;
  }
}

window.onload = function () {
  console.log("FUNCIONA!");

  document.getElementById("nome").addEventListener("input", verificarCampos);
  document.getElementById("cpf").addEventListener("input", verificarCampos);
  document.getElementById("data").addEventListener("input", verificarCampos);
};
