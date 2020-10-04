const TaskItem = (props) => {
    const {
        id,
        email,
        description,
        username,
        status_id,
    } = props;

    return `
        <li class="list-group-item" data-id="${id}">
            <form class="/">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input disabled value="${email}" type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Имя пользователя</label>
                            <input disabled value="${username}" name="username" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Описание задачи</label>
                    <textarea disabled class="form-control">${description}</textarea>
                </div>
            </form>
        </li>
    `;
}

export default TaskItem;