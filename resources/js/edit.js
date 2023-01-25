function edit(id, date, sign, description) {
    const myModal = new bootstrap.Modal('#editRecord', {
        keyboard: false
    });

    let date_input = document.getElementById('date_input');
    let sign_input = document.getElementById('sign_input');
    let desc_input = document.getElementById('desc_input');

    date_input.value = date;
    sign_input.value = sign;
    sign_input.innerText = sign;
    desc_input.value = description;

    let form = document.getElementById('form_edit');
    form.action = '/horoscope/'+id+'/update';

    myModal.show();
}

export default edit;
