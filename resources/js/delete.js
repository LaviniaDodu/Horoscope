function deleteRecord(id, date, sign) {
    const myModal = new bootstrap.Modal('#confirmDelete', {
        keyboard: false
    });

    let question = document.getElementById('ask-confirm');
    question.innerText = 'You want to delete the record from ' + date + ', sign ' + sign + '?';
    let form = document.getElementById('form_delete');
    form.action = '/horoscope/'+id+'/delete';

    myModal.show();
}
export default deleteRecord;
