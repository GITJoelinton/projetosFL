async function carregarProdutos(){

const resposta = await fetch("api/listar.php")

const produtos = await resposta.json()

let html = ""

produtos.forEach(p => {

html += `
<p>
${p.nome} - ${p.categoria} - ${p.quantidade}
</p>
`

})

document.getElementById("estoque").innerHTML = html

}

carregarProdutos()