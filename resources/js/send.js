function sendData() {
    let date = document.getElementById('dateInput').value;
    axios.get('/horoscope/' + date + '/show', {
        param: {
            data: date.value
        }
    })
        .then(response =>
            window.location.href = '/horoscope/' + date + '/show');
}

export default sendData;
