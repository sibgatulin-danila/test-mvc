import axios from 'axios';

$('.js-form-create-task').on('submit', function (e) {
    e.preventDefault();
    const formData = $(this).serializeArray().reduce((reducer, item) => {
        reducer[item.name] = item.value;
        return reducer;
    }, {});

    axios({
        method: 'POST',
        url: 'api/task/create',
        data: formData,
        headers: {
            'Content-Type': 'application/json'
        }
    });
});