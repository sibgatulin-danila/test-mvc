import axios from 'axios';

import TaskItem from './templates/TaskItem';
import PaginateCurrentPageItem from './templates/PaginateCurrentPageItem';
import PaginatePageItem from './templates/PaginatePageItem';

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
        },
    }).then(function (response ) {
        return response.data;
    }).then(function (response) {
        if (response.success) {
            setPage(1)
                .then(() => {
                    $('.js-form-create-task').find('input, textarea').each(function () {
                        $(this).val('');
                    });
                });
        }
    });
});

$('.js-pagination-page').on('click', handleClickPage);

function handleClickPage(e) {
    e.preventDefault();
    let $this = $(this);
    let page = $this.data('page');

    setPage(page);
}

const renderPagination = (pagesCount, currentPage) => {
    let pagination = $('.pagination');
    pagination.html('');
    for (let i = 1; i <= pagesCount; i++) {
        if (i === +currentPage) {
            pagination.append(PaginateCurrentPageItem({page: i}));
        } else {
            pagination.append(PaginatePageItem({page: i}));
        }
    }
    $('.js-pagination-page').on('click', handleClickPage);
}

const renderTasks = (tasks) => {
    let tasksList = $('.tasks-list');
    tasksList.html('');
    if (tasks.length > 0) {
        tasksList.append(tasks.map(task => TaskItem(task)).join(''));
    }
}

const setPage = (page) => {
    return axios({
        url: 'api/task',
        method: 'GET',
        params: {
            page
        }
    }).then(response => {
        return response.data;
    }).then(response => {
        const {
            page_count,
            current_page,
            items,
        } = response;
        renderPagination(page_count, current_page);
        renderTasks(items);
    });
}
