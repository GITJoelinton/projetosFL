async function carregarProdutos() {
    try {
        const resposta = await fetch("api/listar.php");
        const produtos = await resposta.json();

        let html = "";

        if (produtos.length === 0) {
            html = "<p class='vazio'>Nenhum produto cadastrado.</p>";
        } else {
            produtos.forEach(p => {
                html += `
                <div class="produto-card">
                    <span class="produto-nome">${p.nome}</span>
                    <span class="produto-categoria">${p.categoria}</span>
                    <span class="produto-quantidade">${p.quantidade} un.</span>
                </div>
                `;
            });
        }

        document.getElementById("estoque").innerHTML = html;
    } catch (erro) {
        document.getElementById("estoque").innerHTML = "<p class='erro'>Erro ao carregar produtos.</p>";
    }
}

document.getElementById("adicionarProduto").addEventListener("click", async function () {
    const nome = document.getElementById("nomeProduto").value.trim();
    const categoria = document.getElementById("categoriaProduto").value.trim();
    const quantidade = document.getElementById("quantidadeProduto").value.trim();

    if (!nome || !categoria || !quantidade) {
        alert("Preencha todos os campos antes de adicionar.");
        return;
    }

    const formData = new FormData();
    formData.append("nome", nome);
    formData.append("categoria", categoria);
    formData.append("quantidade", quantidade);

    try {
        const resposta = await fetch("api/adicionar.php", {
            method: "POST",
            body: formData
        });

        if (resposta.ok) {
            document.getElementById("nomeProduto").value = "";
            document.getElementById("categoriaProduto").value = "";
            document.getElementById("quantidadeProduto").value = "";
            carregarProdutos();
        } else {
            alert("Erro ao adicionar produto.");
        }
    } catch (erro) {
        alert("Erro na comunicação com o servidor.");
    }
});

carregarProdutos();
