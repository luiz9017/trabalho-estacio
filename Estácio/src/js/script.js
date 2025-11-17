// botão subir ao topo - comportamento
document.addEventListener('DOMContentLoaded', () => {
  const btn = document.getElementById('btn-top');
  if (!btn) return;

  // mostrar quando rolar 300px
  window.addEventListener('scroll', () => {
    if (window.scrollY > 300) btn.classList.add('show');
    else btn.classList.remove('show');
  });

  // rolar suavemente ao topo ao clicar
  btn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
});

// Gravar carrinho
const gravarCarrinho = (carrinho) => {
  localStorage.setItem("carrinho", JSON.stringify(carrinho));
};

// Ler carrinho
const lerCarrinho = () => {
  const bruto = localStorage.getItem("carrinho");
  return bruto ? JSON.parse(bruto) : [];
}

// Adicionar item
const adicionarAoCarrinho = (nome, preco, imagem = "") => {
  const precoValor = typeof preco === "number"
    ? preco
    : parseFloat(String(preco).replace(",", "."));

  const carrinho = lerCarrinho();
  carrinho.push({
    nome: String(nome),
    preco: precoValor,
    imagem: String(imagem)
  });

  gravarCarrinho(carrinho);
  alert(`${nome} adicionado ao carrinho!`);
};

// Remover item
const removerItem = (index) => {
  const carrinho = lerCarrinho();
  carrinho.splice(index, 1);
  gravarCarrinho(carrinho);
  exibirCarrinho();
};

// Esvaziar carrinho
const esvaziarCarrinho = () => {
  if (!confirm("Deseja esvaziar o carrinho?")) return;
  localStorage.removeItem("carrinho");
  exibirCarrinho();
};

// Total do carrinho
const totalCarrinho = () =>
  lerCarrinho().reduce((total, item) => total + (Number(item.preco) || 0), 0);

// Finalizar compra
const finalizarCompra = () => {
  const carrinho = lerCarrinho();

  if (!carrinho.length) {
    alert("Seu carrinho está vazio!");
    return;
  }

  // Salva total para a página de pagamento
  localStorage.setItem("totalCompra", totalCarrinho());

  window.location.href = "../pages/pagamento.html";
};

// Exibir carrinho
const exibirCarrinho = () => {
  const lista = document.getElementById("lista-carrinho");
  const totalVl = document.getElementById("total");
  const msgVazio = document.getElementById("mensagem-vazio");

  const carrinho = lerCarrinho();

  // Carrinho vazio
  if (!carrinho.length) {
    lista.innerHTML = "";
    if (msgVazio) msgVazio.style.display = "block";
    if (totalVl) totalVl.textContent = "";
    return;
  }

  if (msgVazio) msgVazio.style.display = "none";
  lista.innerHTML = "";

  let total = 0;

  carrinho.forEach((item, i) => {
    const preco = Number(item.preco) || 0;
    total += preco;

    const li = document.createElement("li");

    const esquerda = document.createElement("div");

    const img = document.createElement("img");
    img.src = item.imagem || "img/placeholder.png";
    img.alt = item.nome || "carros";

    const nomeSpan = document.createElement("span");
    nomeSpan.textContent = item.nome || "carros";

    esquerda.append(img, nomeSpan);

    const direita = document.createElement("div");

    const precoSpan = document.createElement("span");
    precoSpan.textContent = `R$ ${preco.toFixed(2)}`;

    const btnRemover = document.createElement("button");
    btnRemover.textContent = "❌";
    btnRemover.className = "remover-btn";
    btnRemover.addEventListener("click", () => removerItem(i));

    direita.append(precoSpan, btnRemover);

    li.append(esquerda, direita);
    lista.append(li);
  });

  if (totalVl) totalVl.textContent = `Total: R$ ${total.toFixed(2)}`;
};

const inicializar = () => {
  document.addEventListener("click", (e) => {
    let target = e.target;

    while (target && target !== document) {
      if (target.classList?.contains("btn-add")) break;
      target = target.parentNode;
    }

    if (!target || target === document) return;

    let carros = target;
    while (carros && !carros.classList.contains("carros"))
      carros = carros.parentNode;

    if (!carros) return;
    const nome = carros.dataset.nome;
    const preco = carros.dataset.preco;
    const imagem = carros.dataset.imagem;

    adicionarAoCarrinho(nome, preco, imagem);
  });

  // Botão limpar carrinho
  const limpar = document.getElementById("limpar-carrinho");
  if (limpar) limpar.addEventListener("click", esvaziarCarrinho);

  // Botão finalizar
  const finalizar = document.getElementById("finalizar");
  if (finalizar) finalizar.addEventListener("click", finalizarCompra);

  exibirCarrinho();

  console.log("Script inicializado. Carrinho atual:", lerCarrinho());
};

// Iniciar script
document.addEventListener("DOMContentLoaded", inicializar);

 // Validação dos campos
    const numeroCartao = document.getElementById("numeroCartao");
    const nomeCartao = document.getElementById("nomeCartao");
    const validade = document.getElementById("validade");
    const cvv = document.getElementById("cvv");

    nomeCartao.addEventListener("input", () => {
        nomeCartao.value = nomeCartao.value.replace(/[0-9]/g, "");
    });

    numeroCartao.addEventListener("input", () => {
        numeroCartao.value = numeroCartao.value.replace(/[^0-9]/g, "");
    });

    cvv.addEventListener("input", () => {
        cvv.value = cvv.value.replace(/[^0-9]/g, "");
    });

    validade.addEventListener("input", () => {
        let v = validade.value.replace(/[^0-9]/g, "");
        if (v.length >= 3) v = v.slice(0, 2) + "/" + v.slice(2, 4);
        validade.value = v;

        if (v.length !== 5) return;

        const mes = parseInt(v.slice(0, 2));
        const ano = parseInt("20" + v.slice(3, 5));

        if (mes < 1 || mes > 12) {
            validade.value = "";
            alert("Mês inválido!");
            return;
        }

        const agora = new Date();
        const anoAtual = agora.getFullYear();
        const mesAtual = agora.getMonth() + 1;

        if (ano < anoAtual || (ano === anoAtual && mes < mesAtual)) {
            validade.value = "";
            alert("Cartão vencido!");
            return;
        }
    });

document.getElementById("btnFinalizarPagamento").addEventListener("click", () => {
  const nome = nomeCartao.value.trim();
  const numero = numeroCartao.value.trim();
  const data = validade.value.trim();
  const codigo = cvv.value.trim();

// Verificar campos vazios
if (!nome || !numero || !data || !codigo) {
  alert("Preencha todos os campos antes de finalizar o pagamento.");
  return;
}

// Verificar número do cartão
if (numero.length < 13 || numero.length > 16) {
  alert("Número do cartão inválido!");
  return;
}

// Verificar CVV
if (codigo.length !== 3) {
  alert("CVV inválido!");
  return;
}
//finalizar pagamento
localStorage.removeItem("carrinho");
window.location.href = "../pages/confirmacao.html";
});
