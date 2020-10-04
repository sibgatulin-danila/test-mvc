const PaginateCurrentPageItem = (props) => {
    const {
        page,
    } = props;

    return `
        <li class="page-item active" aria-current="page" data-page="${page}">
            <span class="page-link">
                ${page}
                <span class="sr-only">(current)</span>
            </span>
        </li>
    `;
}

export default PaginateCurrentPageItem;