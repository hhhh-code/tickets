function editar(id, descripcion) {
    const modal = document.getElementById("staticBackdrop");
    const inputs = modal.querySelectorAll("input");

    inputs[0].value = id;
    inputs[1].value = descripcion;
}

