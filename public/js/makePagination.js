function makePagination(current, last, functionName, idPagination) {
    let arrPage = ["1"];

    if (current > 3) arrPage.push("...");
    if (current > 2) arrPage.push(`${current - 1}`);
    if (current != 1 && current != last) arrPage.push(`${current}`);
    if (current < last - 1) arrPage.push(`${current + 1}`);
    if (current < last - 2) arrPage.push("...");

    if (last != 1) arrPage.push(`${last}`);

    console.log(arrPage);

    let elementPagination = "";

    for (let i = 0; i < arrPage.length; i++) {
        if (arrPage[i] == current) {
            elementPagination += `
                        <div class="pagination active" onclick="${functionName}(${arrPage[i]})">
                            ${arrPage[i]}
                        </div>
                    `;
            continue;
        }
        elementPagination += `
                    <div class="pagination" onclick="${functionName}(${arrPage[i]})">
                        ${arrPage[i]}
                    </div>
                `;
    }

    $(idPagination).html(elementPagination);
}
