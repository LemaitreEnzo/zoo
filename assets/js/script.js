function openModal(type, id) {
    document.getElementById('modal' + type).style.display = 'flex';
    document.querySelector('.confirmDelete' + type).onclick = function () {
        document.getElementById('form-' + id + '-' + type).submit();
    };
}

function closeModal(type) {
    document.getElementById('modal' + type).style.display = 'none';
}
