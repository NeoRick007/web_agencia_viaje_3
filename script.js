function seleccionarDestinoCarrito(destino) {
    const inputDestino = document.getElementById('package_id');
    inputDestino.value = destino;
}

function search() {
    const destino = document.getElementById('destination').value;
    const fechaInicio = document.getElementById('travel-start-date').value;
    const fechaFin = document.getElementById('travel-end-date').value;

    // Aquí puedes agregar la lógica para realizar la búsqueda utilizando AJAX si es necesario
    console.log(`Buscando destino: ${destino}, desde: ${fechaInicio}, hasta: ${fechaFin}`);
}

function clearFilters() {
    document.getElementById('destination').value = '';
    document.getElementById('travel-start-date').value = '';
    document.getElementById('travel-end-date').value = '';
}
