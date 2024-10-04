function filtrarTabela() {
    const input = document.getElementById('pesquisaInput');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('tabelas_consultas');
    const tr = table.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
        const tdNome = tr[i].getElementsByTagName('td')[1];
        if (tdNome) {
            const txtValue = tdNome.textContent || tdNome.innerText;
            tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? '' : 'none';
        }
    }
}