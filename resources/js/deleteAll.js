function deleteAll() {
    const myModal = new bootstrap.Modal('#confirmDelete', {
        keyboard: false
    });

    let question = document.getElementById('ask-confirm');
    question.innerText = 'You want to delete all the records?';
    let form = document.getElementById('form_delete');
    form.action = '/horoscope/ALL/delete';

    myModal.show();
}

export default deleteAll;
