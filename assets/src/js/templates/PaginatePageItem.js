const PaginateCurrentPageItem = (props) => {
    const {
        page,
    } = props;

    return `
        <li class="page-item js-pagination-page" data-page="${page}">
            <a class="page-link" href="#">
                ${page}
            </a>
        </li>
    `;
}

export default PaginateCurrentPageItem;